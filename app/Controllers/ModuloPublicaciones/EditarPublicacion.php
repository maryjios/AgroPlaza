<?php

namespace App\Controllers\ModuloPublicaciones;

use CodeIgniter\Controller;
use App\Controllers\BaseController;
use App\Models\PublicacionesModel;
use App\Models\ImagenesModel;
use App\Models\UnidadesModel;
use App\Models\CiudadesModel;
use App\Models\DepartamentosModel;


class EditarPublicacion extends BaseController
{

	public function index()
	{
		$id = $this->request->getPostGet('id');
		$publicaciones = new PublicacionesModel();
		$departamentos = new DepartamentosModel();
		$ciudades      = new CiudadesModel();
		$unidades      = new UnidadesModel();

		$id_ciudad          = $publicaciones->select('id_ciudad')->where('id',$id)->first();
		$id_departamento    = $publicaciones->select('departamento.id as id_departamento')
										 ->join('ciudad', 'publicaciones.id_ciudad = ciudad.id')
										 ->join('departamento', 'ciudad.id_departamento = departamento.id')
										 ->where('publicaciones.id_ciudad',$id_ciudad)
										 ->first();
		$id_unidad          =  $publicaciones->select('id_unidad')->where('id',$id)->first();

		$info_publicacion   = $publicaciones->where('id',$id)->first();
		$info_departamentos = $departamentos->select('id,nombre')->orderBy('nombre')->findAll();
		$info_ciudades      = $ciudades->select('id, nombre')
									   ->orderBy('nombre')
									   ->where('id_departamento',$id_departamento)
									   ->find();

		$info_unidades      = $unidades->select('id,nombre')
									   ->orderBy('nombre')
									   ->findAll();
		
		$data= ['publicacion'	  =>$info_publicacion,
				'departamentos'   =>$info_departamentos,
				'id_departamento' =>$id_departamento,
				'ciudades'        =>$info_ciudades,
				'id_ciudad'       =>$id_ciudad,
				'unidades'        =>$info_unidades,
				'id_unidad'       =>$id_unidad
 				];
        
		echo view('template/header');
		echo view('ModuloPublicaciones/editar_publicacion',$data);
		echo view('template/footer');
	}

	public function editar()
	{
		$id_publicacion = $this->request->getPostGet('id_publicacion');
		$titulo = $this->request->getPostGet('titulo');
		$descripcion = $this->request->getPostGet('descripcion');

		$tipoUser = $this->request->getPostGet('tipoUser');
		$tipo_publicacion = "";
		if ($tipoUser == "VENDEDOR") {
			$tipo_publicacion = "PRODUCTO";
		} else {
			$tipo_publicacion = $this->request->getPostGet('tipo_publicacion');;
		}

		$stock = ($this->request->getPostGet('stock') != null) ? $this->request->getPostGet('stock') : null;
		$id_unidad = ($this->request->getPostGet('unidad') != null) ? $this->request->getPostGet('unidad') : null;
		$precio = $this->request->getPostGet('precio');
		$descuento = $this->request->getPostGet('descuento');
		$envio = ($this->request->getPostGet('envio') != null) ? $this->request->getPostGet('envio') : "NO";
		$id_usuario = $this->request->getPostGet('id_usuario');
		$ciudad = $this->request->getPostGet('ciudad');

		$imagefile = $this->request->getFiles()['fotos'];

		$publicaciones = new PublicacionesModel();

		$registros = $publicaciones->set([
			'titulo'           => $titulo,
			'descripcion'      => $descripcion, 
			'tipo_publicacion' => $tipo_publicacion, 
			'stock'            => $stock, 
			'id_unidad'        => $id_unidad, 
			'precio'           => $precio, 
			'envio'            => $envio,
			'descuento'        => $descuento, 
			'id_ciudad'        => $ciudad, 
			'id_usuario'       => $id_usuario
		])->where('id',$id_publicacion)->update();

		/*if ($registros) {

			$files = $this->request->getFileMultiple('fotos');

			$contador = 1;
			foreach ($files as $file) {

				$extension = $file->getExtension();

				if (in_array($extension, array('png', 'jpg', 'jpeg', 'PNG', 'JPG', 'JPEG'))) {

					$nombre_foto = 'foto_' . $contador.'.'.$extension;

					$db_imagenes = new ImagenesModel();
					$isnertada = $db_imagenes->insert([
						'imagen' => $nombre_foto,
						'id_publicacion' => $db_publicaciones->getInsertID()
					]);



					$ruta = "./public/dist/img/publicaciones/publicacion".$db_publicaciones->getInsertID();

					if (!file_exists($ruta)) {
						mkdir($ruta, 0777, false);
					}

					$file->move('./public/dist/img/publicaciones/publicacion' . $db_publicaciones->getInsertID(), $nombre_foto);

					if ($isnertada) {
						$mensaje = "OK#CORRECTO";
					}
				}

				$contador++;
			}
		} else {
			$mensaje = "OK#INVALID#DATA";
		}*/

		if ($registros) {
			$mensaje = "Se actualizo";
		}else{
			$mensaje = "Error";
		}

		echo $mensaje;
	}
}
