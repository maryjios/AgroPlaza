<?php namespace App\Controllers\ModuloPublicaciones;

use CodeIgniter\Controller;
use App\Controllers\BaseController;
use App\Models\PublicacionesModel;

class ListarPublicaciones extends BaseController {

	public function index(){

		$data['modulo_selected'] = "Publicaciones";
		$data['opcion_selected'] = "ListarPublicaciones";

		echo view('template/header', $data);
		echo view('ModuloPublicaciones/listar_publicaciones');
		echo view('template/footer');
	}

	public function consultarTodo()
	{
		$publicaciones = new PublicacionesModel();

		$datos = $publicaciones->select('Publicaciones.*,usuarios.nombres AS nombre_usuario, usuarios.apellidos as apellido_usuario')
							   ->where('estado_publicacion','ACTIVA')
							   ->join('usuarios','publicaciones.id_usuario = usuarios.id')
							   ->findAll();

		if ($datos) {
			echo json_encode($datos);
		}else{
			echo json_encode("Error");
		}
	}


	public function consultarId()
	{
		$publicaciones = new PublicacionesModel();

		$id = $this->request->getPostGet('id');
		$datos = $publicaciones->where('id_publicaciones',$id)->find();

		if ($datos) {
			echo json_encode($datos);
		}else{
			echo json_encode("Error");
		}
	}

	public function detallePublicacion()
	{
		echo view('template/header');
		echo view('ModuloPublicaciones/detalle_publicacion');
		echo view('template/footer');
	}

}