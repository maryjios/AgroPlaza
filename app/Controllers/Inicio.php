<?php

namespace App\Controllers;

use App\Models\UsuariosModel;

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
		if ($this->session->get("tipo_usuario") == "ADMINISTRADOR") {
			echo view('admin/header');
			echo view('admin/index');
			echo view('admin/footer');
		} else if ($this->session->get("tipo_usuario") == "VENDEDOR") {
			echo view('Vendedor/header');
			echo view('Vendedor/vendedor_inicio');
			echo view('Vendedor/footer');
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

}
