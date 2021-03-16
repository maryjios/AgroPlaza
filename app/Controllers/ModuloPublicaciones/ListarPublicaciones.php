<?php namespace App\Controllers\ModuloPublicaciones;

use CodeIgniter\Controller;
use App\Controllers\BaseController;
use App\Models\PublicacionesModel;
use App\Models\ImagenesModel;

class ListarPublicaciones extends BaseController {

	public function index(){
		$publicaciones = new PublicacionesModel();
		$consulta['datos']= $publicaciones->select('publicaciones.id as id_publicacion, publicaciones.titulo as titulo, publicaciones.tipo_publicacion as tipo_publicacion, publicaciones.fecha_insert as fecha_publicacion,publicaciones.estado as estado_publicacion, concat(usuarios.nombres," ",usuarios.apellidos)nombre_usuario, imagenes.imagen')
							->join('usuarios', 'publicaciones.id_usuario = usuarios.id')
							->join('imagenes','imagenes.id_publicacion =publicaciones.id')
							->where('publicaciones.estado','ACTIVA')
							->groupBy('imagenes.id_publicacion')
							->findAll();

		$data['modulo_selected'] = "Publicaciones";
		$data['opcion_selected'] = "ListarPublicaciones";

		echo view('template/header', $data);
		echo view('ModuloPublicaciones/listar_publicaciones',$consulta);
		echo view('template/footer');
	}


	public function consultarId(){
		$publicaciones = new PublicacionesModel();

		$id = $this->request->getPostGet('id');
		$datos = $publicaciones->where('id',$id)->find();

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
		$imagenes = new ImagenesModel();

		$id = $this->request->getPostGet('file');
		$info_publicaciones= $publicaciones->select('publicaciones.*, unidades.abreviatura as unidad, concat(usuarios.nombres," ",usuarios.apellidos)nombre_usuario, ciudad.nombre as ciudad, departamento.nombre as departamento')
							->join('unidades', 'publicaciones.id_unidad = unidades.id')
							->join('usuarios', 'publicaciones.id_usuario = usuarios.id')
							->join('ciudad','publicaciones.id_ciudad =ciudad.id')
							->join('departamento','ciudad.id_departamento =departamento.id')
							->where('publicaciones.id',$id)
							->first();

		$img = $imagenes->select('id, imagen')
						->where('id_publicacion',$id)
						->groupBy('imagenes.id_publicacion')
						->first(); 
		
		$datos = ['publicacion'=>$info_publicaciones, 'img'=>$img];

		echo view('template/header');
		echo view('ModuloPublicaciones/detalle_publicacion',$datos);
		echo view('template/footer');	
	}

	public function eliminarPublicacion(){
		$publicaciones = new PublicacionesModel();

		$id = $this->request->getPostGet('id');

		$publicaciones->update($id,['estado'=>'INACTIVA']);

		if ($publicaciones) {
			$mensaje = "Eliminado";
		}else{
			$mensaje = "Error";
		}

		echo $mensaje;
	}

}