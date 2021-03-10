<?php namespace App\Controllers\ModuloPublicaciones;

use CodeIgniter\Controller;
use App\Controllers\BaseController;
use App\Models\PublicacionesModel;

class ListarPublicacionesInactivas extends BaseController {

	public function index(){
		$publicaciones = new PublicacionesModel();
		$consulta['datos']= $publicaciones->select('Publicaciones.*,concat(usuarios.nombres," ",usuarios.apellidos)nombre_usuario, imagenes.imagen')
							->join('usuarios', 'publicaciones.id_usuario = usuarios.id')
							->join('imagenes','imagenes.id_publicacion = publicaciones.id_publicaciones')
							->where('estado_publicacion','INACTIVA')
							->groupBy('id_publicacion')
							->findAll();

		$data['modulo_selected'] = "Publicaciones";
		$data['opcion_selected'] = "ListarPublicaciones";

		echo view('template/header', $data);
		echo view('ModuloPublicaciones/listar_publicaciones_inactivas',$consulta);
		echo view('template/footer');
	}


	public function consultarId(){
		$publicaciones = new PublicacionesModel();

		$id = $this->request->getPostGet('id');
		$datos = $publicaciones->where('id_publicaciones',$id)->find();

		if ($datos) {
			echo json_encode($datos);
		}else{
			echo json_encode("Error");
		}
	}

	public function consultarImagenes(){
		$imagenes = new ImagenesModel();

		$id = $this->request->getPostGet('id');
		$datos = $imagenes->select('imagen')
		->where('id_publicacion',$id)->find();


		if ($datos) {
			echo json_encode($datos);
		}else{
			echo json_encode("Error");
		}
	}

	public function detallePublicacion(){
		$publicaciones = new PublicacionesModel();

		$id = $this->request->getPostGet('id');
		$datos = $publicaciones->where('id_publicaciones',$id)->first();

		echo view('template/header', $data);
		echo view('ModuloPublicaciones/detalle_publicacion',$id);
		echo view('template/footer');	
	}


	public function activarPublicacion(){
		$publicaciones = new PublicacionesModel();

		$id = $this->request->getPostGet('id');

		$publicaciones->update($id,['estado_publicacion'=>'ACTIVA']);

		if ($publicaciones) {
			$mensaje = "Actualizado";
		}else{
			$mensaje = "Error";
		}

		echo $mensaje;
	}

}