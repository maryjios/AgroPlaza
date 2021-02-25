<?php namespace App\Controllers\ModuloPublicaciones;

use CodeIgniter\Controller;
use App\Controllers\BaseController;

class ListarPublicaciones extends BaseController {

	public function index(){
		$data['modulo_selected'] = "Publicaciones";
		$data['opcion_selected'] = "ListarPublicaciones";

		echo view('template/header', $data);
		echo view('ModuloPublicaciones/listar_publicaciones');
		echo view('template/footer');
	}

}