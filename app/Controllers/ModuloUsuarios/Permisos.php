<?php namespace App\Controllers\ModuloUsuarios;

use CodeIgniter\Controller;
use App\Controllers\BaseController;

class Permisos extends BaseController {

	public function index(){
		$data['modulo_selected'] = "Usuarios";
		$data['opcion_selected'] = "Permisos";

		echo view('template/header', $data);
		echo view('ModuloUsuarios/permisos');
		echo view('template/footer');
	}

}