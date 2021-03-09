<?php namespace App\Controllers\ModuloUsuarios;

use CodeIgniter\Controller;
use App\Controllers\BaseController;

class PerfilUsuario extends BaseController {

	public function index(){
		$data['modulo_selected'] = "Usuarios";
		$data['opcion_selected'] = "PerfilUsuario";

		echo view('template/header', $data);
		echo view('ModuloUsuarios/perfil_usuario');
		echo view('template/footer');
	}

}
