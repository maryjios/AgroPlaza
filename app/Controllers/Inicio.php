<?php

namespace App\Controllers;

use App\Models\CiudadesModel;
use App\Models\UsuariosModel;
use App\Models\DepartamentosModel;


class Inicio extends BaseController
{

	public function index()
	{
		return view('login');
	}

	public function validarDatosIngreso()
	{
		$valor_email = $this->request->getPostGet('email');
		$valor_pass =  md5($this->request->getPostGet('password'));

		$usuarios_db = new UsuariosModel();
		$registros = $usuarios_db->where(['email' => $valor_email, 'password' => $valor_pass])->find();

		if (sizeof($registros) == 0) {
			$mensaje = 'ERROR##INVALID##DATA';
		} else {
			unset($registros[0]['password']);

			$this->session->set($registros[0]);
			$mensaje = 'OK##DATA##LOGIN';
		}
		echo $mensaje;
	}

	public function cargarVistaInicio()
	{
		if ($this->session->has("tipo_usuario")) {
			echo view('template/header');
			echo view('ModuloUsuarios/perfil');
			echo view('template/footer');
		} else {
			return view('login');
		}
	}

	public function cerrarSession()
	{
		$this->session->destroy();
		header("Location:" . base_url());
		die();
	}

	public function getCiudades()
	{
		$valor_departamento = $this->request->getPostGet('departamento');
		$ciudades_db = new CiudadesModel();
		$registros = $ciudades_db->where(["id_departamento" => $valor_departamento]);
		$registros =  $ciudades_db->findAll();

		echo json_encode($registros);
	}
	

	public function RegistrarVendedor()
	{
		$departamentos_db = new DepartamentosModel();

		$registros['departamentos'] = $departamentos_db->select()->findAll();
		echo view('registrar_vendedor', $registros);
	}

	public function InsertarVendedor()
	{


		$email = $this->request->getPostGet('email');
		$documento = $this->request->getPostGet('documento');
		$nombres = $this->request->getPostGet('nombres');
		$apellidos = $this->request->getPostGet('apellidos');
		$direccion = $this->request->getPostGet('direccion');
		$telefono = $this->request->getPostGet('telefono');
		$genero = $this->request->getPostGet('genero');
		$ciudad = $this->request->getPostGet('ciudad');
		$password = $this->request->getPostGet('password');



		$usuarios = new UsuariosModel();

		$consulta = $usuarios->where(['documento' => $documento])->find();

		if (sizeof($consulta) > 0) {

			$mensaje = "FAIL#DOCUMENTO";
		} else {

			$consulta = $usuarios->where(['email' => $email])->find();

			if (sizeof($consulta) > 0) {
				$mensaje = "FAIL#EMAIL";
			} else {
				$registros = $usuarios->save([
					'email' => $email, 'password' => md5($password), 'documento' => $documento, 'nombres' => $nombres, 'apellidos' => $apellidos, 'id_ciudad' => $ciudad, 'direccion' => $direccion,
					'telefono' => $telefono, 'genero' => $genero, 'avatar' => 'avatar.png', 'tipo_usuario' => 'VENDEDOR'
				]);

				if ($registros) {
					$mensaje = "OK#CORRECT#DATA";
				} else {
					$mensaje = "OK#INVALID#DATA";
				}
			}
		}

		echo $mensaje;
	}

	public function RegistrarDatosEspecializacion()
	{

		$data['vendedor'] = $_GET['vendedor'];
		return view('registrar_datos_especializacion', $data);
	}
}
