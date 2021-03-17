<?php 

namespace App\Controllers\ModuloPublicaciones;

use CodeIgniter\Controller;
use App\Controllers\BaseController;
use App\Models\UnidadesModel;

class UnidadesInactivas extends BaseController{


	public function index(){
		$unidades = new UnidadesModel();

		$datos['unidades']= $unidades->select('id,nombre,abreviatura')
									 ->where('estado','INACTIVA')
									 ->findAll();


		echo view('template/header');
		echo view('ModuloPublicaciones/unidades_inactivas',$datos);
		echo view('template/footer');
	}


	public function activarUnidades(){
		$unidades = new UnidadesModel();

		$id = $this->request->getPostGet('id');

		$unidades->update($id,['estado'=>'ACTIVA']);

		if ($publicaciones) {
			$mensaje = "Actualizado";
		}else{
			$mensaje = "Error";
		}

		echo $mensaje;
	}


}
?>






