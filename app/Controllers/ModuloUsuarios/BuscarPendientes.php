<?php namespace App\Controllers\ModuloUsuarios;

use CodeIgniter\Controller;
use App\Controllers\BaseController;
use App\Models\UsuariosModel;

class BuscarPendientes extends BaseController {

	public function index(){

		$this->usuarios = new UsuariosModel();
        $usuarios = $this->usuarios->select('*')->where('estado','PENDIENTE')->findAll();
		 $personas =['datos' => $usuarios];
		$data['modulo_selected'] = "Usuarios";
		$data['opcion_selected'] = "BuscarPendientes";

		echo view('template/header', $data);
		echo view('ModuloUsuarios/buscar_pendientes',$personas);
		echo view('template/footer');
	}


	// public function listarPendientes(){
	// 	$usuarios = new UsuariosModel();
	// 	$usuarios = $usuarios->select('*')->where('estado','PENDIENTE')->findAll();
	// 	if ($usuarios) {
	// 		 echo json_encode($usuarios);
			
	// 	} else {
	// 		echo json_encode('error');
		
	// 	}
	// }

	public function buscarpenId(){
		$usuarios = new UsuariosModel();
		$docPen = $this->request->getPostGet('doc');
		$data = $usuarios->where('id',$docPen)->find();

		if ($data) {

		echo view('template/header',);
		echo view('ModuloUsuarios/detalles_usuario',$data);
		echo view('template/footer');
			
		   
	   } else {
		   echo json_encode('error');
	   
	   }	
	}

	public function actualizarpen(){
		$usuarios = new UsuariosModel();
		$doc = $this->request->getPostGet('doc');
		$new_estado = $this->request->getPostGet('new_estado');

		$dato=$usuarios->set('estado', $new_estado)->where('documento', $doc)->update();
		if ($dato) {
			$mensaje ='USUARIO#ACTUALIZADO';
		}else{
			$mensaje = "ERROR#ACTUALIZAR#DATOS";
		}

		echo $mensaje;
	}
  
}