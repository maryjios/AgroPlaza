<?php

namespace App\Controllers\ModuloPublicaciones;

use CodeIgniter\Controller;
use App\Controllers\BaseController;
use App\Models\PublicacionesModel;

class ListarPublicaciones extends BaseController
{

	public function getImagenesPublicacion(){
		$id = $this->request->getPostGet('id');

		$imagenes_db = new ImagenesModel();

		$query['imagenes'] = $imagenes_db->select('imagen')->where('id_publicacion', $id)->findAll(); 

		echo json_encode($query);

	}
}
