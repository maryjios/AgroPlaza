<?php

namespace App\Controllers\ModuloPublicaciones;

use CodeIgniter\Controller;
use App\Controllers\BaseController;
use App\Models\PublicacionesModel;
use App\Models\ImagenesModel;
use App\Models\UnidadesModel;
use App\Models\ValoracionesModel;
use App\Models\PreguntasModel;
use App\Models\RespuestasModel;

class ListarPublicaciones extends BaseController
{

	public function index()
	{
		$publicaciones = new PublicacionesModel();

		$id = $_SESSION['id'];
		$tipo_usuario = $_SESSION['tipo_usuario'];

		if ($tipo_usuario == "ADMINISTRADOR") {
			$consulta['datos'] = $publicaciones->select('publicaciones.id as id_publicacion, publicaciones.titulo as titulo, publicaciones.tipo_publicacion as tipo_publicacion, publicaciones.fecha_insert as fecha_publicacion,publicaciones.estado as estado_publicacion, concat(usuarios.nombres," ",usuarios.apellidos)nombre_usuario, imagenes.imagen')
				->join('usuarios', 'publicaciones.id_usuario = usuarios.id')
				->join('imagenes', 'imagenes.id_publicacion =publicaciones.id')
				->where('publicaciones.estado', 'ACTIVA')
				->groupBy('imagenes.id_publicacion')
				->findAll();
		} else {
			$consulta['datos'] = $publicaciones->select('publicaciones.id as id_publicacion, publicaciones.titulo as titulo, publicaciones.tipo_publicacion as tipo_publicacion, publicaciones.fecha_insert as fecha_publicacion,publicaciones.estado as estado_publicacion, concat(usuarios.nombres," ",usuarios.apellidos)nombre_usuario, imagenes.imagen')
				->join('usuarios', 'publicaciones.id_usuario = usuarios.id')
				->join('imagenes', 'imagenes.id_publicacion =publicaciones.id')
				->where('publicaciones.estado', 'ACTIVA')
				->where('publicaciones.id_usuario', $id)
				->groupBy('imagenes.id_publicacion')
				->findAll();
		}

		$data['modulo_selected'] = "Publicaciones";
		$data['opcion_selected'] = "ListarPublicaciones";

		echo view('template/header', $data);
		echo view('ModuloPublicaciones/listar_publicaciones', $consulta);
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
		$imagenes = new ImagenesModel();
		$valoraciones = new ValoracionesModel();
		$unidades = new UnidadesModel();
		$preguntas = new PreguntasModel();
		$respuestas = new RespuestasModel();


		$id = $this->request->getPostGet('file');

		$tipo_publicacion = $publicaciones->select('tipo_publicacion')
			->where('id', $id)
			->first();
		$id_unidad = $publicaciones->select('id_unidad')
			->where('id', $id)
			->first();

		$total_valoraciones = $valoraciones->select('valoracion, descripcion,foto, concat(usuarios.nombres," ",usuarios.apellidos)nombre_usuario, valoraciones.fecha_insert as fecha_valoracion')
			->join('usuarios', 'valoraciones.id_usuario = usuarios.id')
			->where('id_publicacion', $id)
			->findAll();



		$info_publicaciones = $publicaciones->select('publicaciones.*,concat(usuarios.nombres," ",usuarios.apellidos)nombre_usuario, ciudad.nombre as ciudad, departamento.nombre as departamento')
			->join('usuarios', 'publicaciones.id_usuario = usuarios.id')
			->join('ciudad', 'publicaciones.id_ciudad =ciudad.id')
			->join('departamento', 'ciudad.id_departamento =departamento.id')
			->where('publicaciones.id', $id)
			->first();

		$img = $imagenes->select('id, imagen')
			->where('id_publicacion', $id)
			->groupBy('imagenes.id_publicacion')
			->first();

		$unidad = $unidades->select('abreviatura, cantidad*unidad')
			->where('id', $id_unidad)
			->first();

		$preguntas_publicacion = $preguntas->select('preguntas.id as id_pregunta,preguntas.descripcion as pregunta,concat(usuarios.nombres," ",usuarios.apellidos)nombre_usuario, usuarios.avatar,preguntas.fecha_insert as fecha')
			->join('usuarios', 'preguntas.id_usuario = usuarios.id')
			->where('preguntas.id_publicacion', $id)
			->findAll();



		$respuestas_publicacion = $respuestas->select('id, descripcion, id_pregunta, fecha_insert')
			->findAll();


		$datos = [
			'publicacion' => $info_publicaciones,
			'img' => $img,
			'unidad' => $unidad,
			'valoraciones' => $total_valoraciones,
			'preguntas' => $preguntas_publicacion,
			'respuestas' => $respuestas_publicacion
		];

		echo view('template/header');
		echo view('ModuloPublicaciones/detalle_publicacion', $datos);
		echo view('template/footer');
	}


	public function eliminarPublicacion()
	{
		$publicaciones = new PublicacionesModel();

		$id = $this->request->getPostGet('id');

		$publicaciones->update($id, ['estado' => 'INACTIVA']);

		if ($publicaciones) {
			$mensaje = "Eliminado";
		} else {
			$mensaje = "Error";
		}

		echo $mensaje;
	}


	public function ListarPublicacionesMovil()
	{
		$departamento = $this->request->getPostGet('departamento');

		$publicaciones = new PublicacionesModel();
		$consulta['registros_publicaciones'] = $publicaciones->select('publicaciones.id as id_publicacion,
				publicaciones.titulo as titulo,
				publicaciones.tipo_publicacion as tipo_publicacion,
				publicaciones.fecha_insert as fecha_publicacion, unidades.abreviatura, unidades.cantidad*unidad as valor_unidad,
				publicaciones.estado as estado_publicacion, 
				publicaciones.precio, concat(usuarios.nombres," ",usuarios.apellidos)nombre_usuario,
				imagenes.imagen, publicaciones.envio,
				publicaciones.descuento,
				publicaciones.descripcion, publicaciones.stock')
			->join('usuarios', 'publicaciones.id_usuario = usuarios.id')
			->join('imagenes', 'imagenes.id_publicacion =publicaciones.id')
			->join('ciudad', 'ciudad.id =publicaciones.id_ciudad')
			->join('unidades', 'unidades.id=publicaciones.id_unidad')
			->where('publicaciones.estado', 'ACTIVA')
			->where('ciudad.id_departamento', $departamento)
			->groupBy('imagenes.id_publicacion')
			->findAll();

		echo json_encode($consulta);
	}

	public function getImagenesPublicacion()
	{
		$id = $this->request->getPostGet('id');

		$imagenes_db = new ImagenesModel();

		$query['imagenes'] = $imagenes_db->select('imagen')->where('id_publicacion', $id)->findAll();

		echo json_encode($query);
	}

	public function ListarProductosMovil()
	{
		$departamento = $this->request->getPostGet('departamento');

		$publicaciones = new PublicacionesModel();
		$consulta['registros_publicaciones'] = $publicaciones->select('publicaciones.id as id_publicacion,
				publicaciones.titulo as titulo,
				publicaciones.tipo_publicacion as tipo_publicacion,
				publicaciones.fecha_insert as fecha_publicacion, unidades.abreviatura, unidades.cantidad*unidad as valor_unidad
				publicaciones.estado as estado_publicacion, 
				publicaciones.precio, concat(usuarios.nombres," ",usuarios.apellidos)nombre_usuario,
				imagenes.imagen, publicaciones.envio,
				publicaciones.descuento,
				publicaciones.descripcion, publicaciones.stock')
			->join('usuarios', 'publicaciones.id_usuario = usuarios.id')
			->join('imagenes', 'imagenes.id_publicacion =publicaciones.id')
			->join('ciudad', 'ciudad.id =publicaciones.id_ciudad')
			->join('unidades', 'unidades.id =publicaciones.id_unidad')
			->where('(publicaciones.estado = "ACTIVA" AND publicaciones.tipo_publicacion = "PRODUCTO")')
			->where('ciudad.id_departamento', $departamento)
			->groupBy('imagenes.id_publicacion')
			->findAll();

		echo json_encode($consulta);
	}

	public function ServiciosPublicacionesMovil()
	{
		$departamento = $this->request->getPostGet('departamento');

		$publicaciones = new PublicacionesModel();
		$consulta['registros_publicaciones'] = $publicaciones->select('publicaciones.id as id_publicacion,
				publicaciones.titulo as titulo,
				publicaciones.tipo_publicacion as tipo_publicacion,
				publicaciones.fecha_insert as fecha_publicacion, 
				publicaciones.estado as estado_publicacion, 
				publicaciones.precio, concat(usuarios.nombres," ",usuarios.apellidos)nombre_usuario,
				imagenes.imagen, publicaciones.envio,
				publicaciones.descuento,
				publicaciones.descripcion')
			->join('usuarios', 'publicaciones.id_usuario = usuarios.id')
			->join('imagenes', 'imagenes.id_publicacion =publicaciones.id')
			->join('ciudad', 'ciudad.id =publicaciones.id_ciudad')
			->join('unidades', 'unidades.id =publicaciones.id_unidad')
			->where('publicaciones.estado = "ACTIVA" AND publicaciones.tipo_publicacion = "SERVICIOS"')
			->where('ciudad.id_departamento', $departamento)
			->groupBy('imagenes.id_publicacion')
			->findAll();

		echo json_encode($consulta);
	}

	public function traerDatosParaCompra()
	{
		$id = $this->request->getPostGet('id');

		$publicaciones = new PublicacionesModel();

		$consulta['datos_publicacion'] = $publicaciones->select('publicaciones.titulo as titulo,
			publicaciones.tipo_publicacion as tipo_publicacion, unidades.abreviatura, 
			publicaciones.precio, imagenes.imagen, 
			concat(usuarios.nombres," ",usuarios.apellidos) nombre_usuario,
			publicaciones.envio, publicaciones.descuento')
			->join('usuarios', 'publicaciones.id_usuario = usuarios.id')
			->join('imagenes', 'imagenes.id_publicacion = publicaciones.id')
			->join('unidades', 'unidades.id = publicaciones.id_unidad')
			->where('publicaciones.id', $id)
			->groupBy('imagenes.id_publicacion')
			->findAll();

		echo json_encode($consulta);
	}

	public function ListarPublicacionesPerfilMovil()
	{
		$user = $this->request->getPostGet('user');

		$publicaciones = new PublicacionesModel();
		$consulta['registros_publicaciones'] = $publicaciones->select('publicaciones.id as id_publicacion,
				publicaciones.titulo as titulo,
				publicaciones.tipo_publicacion as tipo_publicacion,
				publicaciones.fecha_insert as fecha_publicacion, unidades.abreviatura,
				publicaciones.estado as estado_publicacion, 
				publicaciones.precio, concat(usuarios.nombres," ",usuarios.apellidos)nombre_usuario,
				imagenes.imagen, publicaciones.envio,
				publicaciones.descuento,
				publicaciones.descripcion, publicaciones.stock')
			->join('usuarios', 'publicaciones.id_usuario = usuarios.id')
			->join('imagenes', 'imagenes.id_publicacion =publicaciones.id')
			->join('ciudad', 'ciudad.id =publicaciones.id_ciudad')
			->join('unidades', 'unidades.id=publicaciones.id_unidad')
			->where(['publicaciones.estado' => 'ACTIVA', 'publicaciones.id_usuario' => $user])
			->groupBy('imagenes.id_publicacion')
			->limit(5)
			->findAll();

		echo json_encode($consulta);
	}

	public function getValoracionesPublicacion()
	{
		$id = $this->request->getPostGet('publicacion');

		$valoraciones = new ValoracionesModel();
		$consulta['registro'] = $valoraciones->select('concat(usuarios.nombres," ",usuarios.apellidos) as nombre_usuario, valoraciones.valoracion, valoraciones.		fecha_insert, valoraciones.descripcion, valoraciones.foto')
			->join('usuarios', 'usuarios.id = valoraciones.id_usuario')
			->where('id', $id)
			->findAll();

		echo json_encode($consulta);
	}
}
