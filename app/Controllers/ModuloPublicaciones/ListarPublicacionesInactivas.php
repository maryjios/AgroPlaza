<?php

namespace App\Controllers\ModuloPublicaciones;

use CodeIgniter\Controller;
use App\Controllers\BaseController;
use App\Models\PublicacionesModel;
use App\Models\ImagenesModel;

class ListarPublicacionesInactivas extends BaseController
{

	public function index()
	{
		$id = $_SESSION['id'];
		$tipo_usuario = $_SESSION['tipo_usuario'];

		$publicaciones = new PublicacionesModel();
		if ($tipo_usuario == "ADMINISTRADOR") {
			$consulta['datos'] = $publicaciones->select('publicaciones.id as id_publicacion, publicaciones.titulo as titulo, publicaciones.tipo_publicacion as tipo_publicacion, publicaciones.fecha_insert as fecha_publicacion,publicaciones.estado as estado_publicacion, concat(usuarios.nombres," ",usuarios.apellidos)nombre_usuario, imagenes.imagen')
				->join('usuarios', 'publicaciones.id_usuario = usuarios.id')
				->join('imagenes', 'imagenes.id_publicacion =publicaciones.id')
				->where('publicaciones.estado', 'INACTIVA')
				->groupBy('imagenes.id_publicacion')
				->findAll();
		} else {
			$consulta['datos'] = $publicaciones->select('publicaciones.id as id_publicacion, publicaciones.titulo as titulo, publicaciones.tipo_publicacion as tipo_publicacion, publicaciones.fecha_insert as fecha_publicacion,publicaciones.estado as estado_publicacion, concat(usuarios.nombres," ",usuarios.apellidos)nombre_usuario, imagenes.imagen')
				->join('usuarios', 'publicaciones.id_usuario = usuarios.id')
				->join('imagenes', 'imagenes.id_publicacion =publicaciones.id')
				->where('publicaciones.estado', 'INACTIVA')
				->where('publicaciones.id_usuario', $id)
				->groupBy('imagenes.id_publicacion')
				->findAll();
		}

		$data['modulo_selected'] = "Publicaciones";
		$data['opcion_selected'] = "ListarPublicaciones";

		echo view('template/header', $data);
		echo view('ModuloPublicaciones/listar_publicaciones_inactivas', $consulta);
		echo view('template/footer');
	}


	public function consultarId()
	{
		$publicaciones = new PublicacionesModel();

		$id = $this->request->getPostGet('id');
		$datos = $publicaciones->where('id', $id)->find();

		if ($datos) {
			echo json_encode($datos);
		} else {
			echo json_encode("Error");
		}
	}

	public function consultarImagenes()
	{
		$imagenes = new ImagenesModel();

		$id = $this->request->getPostGet('id');
		$datos = $imagenes->select('imagen')
			->where('id_publicacion', $id)->find();


		if ($datos) {
			echo json_encode($datos);
		} else {
			echo json_encode("Error");
		}
	}

	public function detallePublicacion()
	{
		$publicaciones = new PublicacionesModel();

		$id = $this->request->getPostGet('id');
		$datos = $publicaciones->where('id', $id)->first();

		$data['modulo_selected'] = "Publicaciones";
		$data['opcion_selected'] = "ListarPublicaciones";

		echo view('template/header', $data);
		echo view('ModuloPublicaciones/detalle_publicacion', $datos);
		echo view('template/footer');
	}


	public function activarPublicacion()
	{
		$publicaciones = new PublicacionesModel();

		$id = $this->request->getPostGet('id');

		$publicaciones->update($id, ['estado' => 'ACTIVA']);

		if ($publicaciones) {
			$mensaje = "Actualizado";
		} else {
			$mensaje = "Error";
		}

		echo $mensaje;
	}
}
