<?php namespace App\Controllers\ModuloUsuarios;

use CodeIgniter\Controller;
use App\Controllers\BaseController;
use App\Models\UsuariosModel;

class BuscarUsuarios extends BaseController {
 
	public function index(){
		$this->usuarios = new UsuariosModel();
        $usuarios = $this->usuarios->select('*')->where('estado','ACTIVO')->findAll();
		 $personas =['datos' => $usuarios];
		// $usuarios = $this->$usuarios->select('*')->where('estado','ACTIVO')->findAll();
		// $personas =['personas' => $usuarios];

		$data['modulo_selected'] = "Usuarios";
		$data['opcion_selected'] = "BuscarUsuarios";

		echo view('template/header', $data);
		echo view('ModuloUsuarios/buscar_usuarios',$personas);
		echo view('template/footer');
	}

	public function buscarporId(){
		$usuarios = new UsuariosModel();
		$doc = $this->request->getPostGet('doc');
		$data = $usuarios->where('id',$doc)->find();

		if ($data) {
	    echo view('template/header',);
		echo view('ModuloUsuarios/detalles_usuario',$data);
		echo view('template/footer');
		   
	   } else {
		   echo json_encode('error');
	   
	   }
	}
	// public function actualizarest(){
	// 	$usuarios = new UsuariosModel();
	// 	$doc = $this->request->getPostGet('doc');
	// 	$new_estado = $this->request->getPostGet('new_estado');

	// 	$dato=$usuarios->set('estado', $new_estado)->where('documento', $doc)->update();
	// 	if ($dato) {
	// 		$mensaje ='EL#USUARIO#ESTA#ACTUALIZADO';
	// 	}else{
	// 		$mensaje = "ERROR#DE#INACTIVAR#";
	// 	}

	// 	echo $mensaje;
	// }



	public function inactivarusuario(){
		$usuarios = new UsuariosModel();
		$doc = $this->request->getPostGet('doc');
		$datos=$usuarios->set('estado', 'INACTIVO')->where('id', $doc)->update();

		if ($datos) {
			$mensaje = "OK#UPDATE";
		}else{
			$mensaje = "NO#UPDATE";
		}

		echo $mensaje;
	}


}

