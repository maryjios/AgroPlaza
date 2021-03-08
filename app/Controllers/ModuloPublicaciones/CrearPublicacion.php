<?php namespace App\Controllers\ModuloPublicaciones;

use CodeIgniter\Controller;
use App\Controllers\BaseController;
use App\Models\UnidadesModel;

class CrearPublicacion extends BaseController {

	public function index(){
		$data['modulo_selected'] = "Publicaciones";
		$data['opcion_selected'] = "CrearPublicacion";


		$unidades_db = new UnidadesModel();

		$unidades = $unidades_db->findAll();

		$data['unidades'] = $unidades;

		echo view('template/header', $data);
		echo view('ModuloPublicaciones/crear_publicacion');
		echo view('template/footer');
	}


	public function insertar(){
		
	}

}