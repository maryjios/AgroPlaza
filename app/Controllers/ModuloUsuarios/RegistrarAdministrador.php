<?php

namespace App\Controllers\ModuloUsuarios;

use CodeIgniter\Controller;
use App\Controllers\BaseController;
use App\Models\UsuariosModel;

class RegistrarAdministrador extends BaseController
{

	protected $usuarios;
	protected $reglas;

	public function __construct()
	{
		helper(['form']);
	}


	public function index()
	{
		echo view('template/header');
		echo view('ModuloUsuarios/perfil');
		echo view('template/footer');
	}

	public function registrarAdmin()
	{
		$data['modulo_selected'] = "Usuarios";
		$data['opcion_selected'] = "RegistrarAdministrador";

		echo view('template/header', $data);
		echo view('ModuloUsuarios/registrar_admin');
		echo view('template/footer');
	}


	public function insertar()
	{

		$email = $this->request->getPostGet('email');
		$documento = $this->request->getPostGet('documento');
		$nombres = $this->request->getPostGet('nombres');
		$apellidos = $this->request->getPostGet('apellidos');
		$direccion = $this->request->getPostGet('direccion');
		$telefono = $this->request->getPostGet('telefono');
		$genero = $this->request->getPostGet('genero');

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
					'email' => $email, 'password' => md5($documento), 'documento' => $documento, 'nombres' => $nombres, 'apellidos' => $apellidos, 'id_ciudad' => 1, 'direccion' => $direccion,
					'telefono' => $telefono, 'genero' => $genero, 'avatar' => 'avatar.png', 'tipo_usuario' => 'ADMINISTRADOR'
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
}
