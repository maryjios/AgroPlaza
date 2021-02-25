<?php

namespace App\Controllers;

use App\Models\UsuariosModel;

class Inicio extends BaseController{

	public function index(){
		return view('login');
	}

	public function validarDatosIngreso(){
		$valor_email = $this->request->getPostGet('email');
		$valor_pass =  md5($this->request->getPostGet('password'));

		$usuarios_db = new UsuariosModel();
		$registros = $usuarios_db->where(['email' => $valor_email, 'password' => $valor_pass])->find();

		if (sizeof($registros) == 0) {
			$mensaje = 'ERROR##INVALID##DATA';
		} else {
			unset($registros[0]['password']);
			$reg_permisos = $usuarios_db->select(['permisos.id', 'permisos.nombre'])
							->join('permisos_temp', 'usuarios.id = permisos_temp.id_usuario', 'inner')
							->join('permisos', 'permisos_temp.id_permiso = permisos.id', 'inner')
							->where(['usuarios.id' => $registros[0]['id'], 'permisos_temp.estado'=>'ACTIVO'])
							->find();
			$registros[0]['lista_permisos'] = array();
			foreach ($reg_permisos as $key => $value) {
				array_push($registros[0]['lista_permisos'], $value['nombre']);
			}

			$this->session->set($registros[0]);
			$mensaje = 'OK##DATA##LOGIN';
		}
		echo $mensaje;
	}

	public function cargarVistaInicio(){
		if ($this->session->has("tipo_usuario")) {
			echo view('template/header');
			echo view('ModuloUsuarios/perfil');
			echo view('template/footer');
		} else {
			return view('login');
		}
	}

	public function cerrarSession(){
		$this->session->destroy();
		header("Location:" . base_url());
		die();
	}

}
