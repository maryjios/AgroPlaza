<?php

namespace App\Controllers\ModuloPublicaciones;

use CodeIgniter\Controller;
use App\Controllers\BaseController;
use App\Models\PublicacionesModel;
use App\Models\ImagenesModel;
use App\Models\UnidadesModel;
use App\Models\CiudadesModel;
use App\Models\DepartamentosModel;


class CrearPublicacion extends BaseController
{

	public function index()
	{
		$data['modulo_selected'] = "Publicaciones";
		$data['opcion_selected'] = "CrearPublicacion";

		$unidades_db = new UnidadesModel();

		$unidades = $unidades_db->findAll();

		$registros['unidades'] = $unidades;

		$departamentos_db = new DepartamentosModel();

        $registros['departamentos'] = $departamentos_db->select()->findAll();

		echo view('template/header', $data);
		echo view('ModuloPublicaciones/crear_publicacion', $registros);
		echo view('template/footer');
	}

	public function getCiudades()
    {
        $valor_departamento = $this->request->getPostGet('departamento');
        $ciudades_db = new CiudadesModel();
        $registros = $ciudades_db->where(["id_departamento" => $valor_departamento]);
        $registros = $ciudades_db->findAll();

        echo json_encode($registros);
    }


	public function insertar()
	{
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

		$db_publicaciones = new PublicacionesModel();
		$registros = $db_publicaciones->insert([
			'titulo' => $titulo, 'descripcion' => $descripcion, 'tipo_publicacion' => $tipo_publicacion, 'stock' => $stock, 'id_unidad' => $id_unidad, 'precio' => $precio, 'envio' => $envio,
			'descuento' => $descuento, 'id_ciudad' => $ciudad, 'id_usuario' => $id_usuario
		]);



		if ($registros) {

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
		}

		echo $mensaje;
	}
}
