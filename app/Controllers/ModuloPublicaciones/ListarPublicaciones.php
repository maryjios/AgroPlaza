<?php namespace App\Controllers\ModuloPublicaciones;

use CodeIgniter\Controller;
use App\Controllers\BaseController;
use App\Models\PublicacionesModel;

class ListarPublicaciones extends BaseController {

	public function index($estado = 'ACTIVA'){
		$publicaciones = new PublicacionesModel();

		$datos['resultados'] = $publicaciones->select('*','usuarios.nombres','usuarios.apellidos')
							   ->where('estado_publicacion',$estado)
							   ->join('usuarios','publicaciones.id_usuario = usuarios.id')
							   ->findall();

		$data['modulo_selected'] = "Publicaciones";
		$data['opcion_selected'] = "ListarPublicaciones";


		echo view('template/header', $data);
		echo view('ModuloPublicaciones/listar_publicaciones',$datos);
		echo view('template/footer');
	}

}