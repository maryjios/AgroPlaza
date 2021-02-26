<?php namespace App\Controllers\ModuloPublicaciones;

use CodeIgniter\Controller;
use App\Controllers\BaseController;

class CrearPublicacion extends BaseController {

	public function index(){
		$data['modulo_selected'] = "Publicaciones";
		$data['opcion_selected'] = "CrearPublicacion";


		echo view('template/header', $data);
		echo view('ModuloPublicaciones/crear_publicacion');
		echo view('template/footer');
	}

}