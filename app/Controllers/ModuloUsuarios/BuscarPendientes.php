<?php namespace App\Controllers\ModuloUsuarios;

use CodeIgniter\Controller;
use App\Controllers\BaseController;
use App\Models\UsuariosModel;

class BuscarPendientes extends BaseController {

	public function index(){
		$data['modulo_selected'] = "Usuarios";
		$data['opcion_selected'] = "BuscarPendientes";

		echo view('template/header', $data);
		echo view('ModuloUsuarios/buscar_pendientes');
		echo view('template/footer');
	}	
	public function listarPendientes(){
		$usuarios = new UsuariosModel();
		$usuarios = $usuarios->select('*')->where('estado','PENDIENTE')->findAll();
		if ($usuarios) {
			 echo json_encode($usuarios);
			
		} else {
			echo json_encode('error');
		
		}
	}

	public function buscarpenId(){
		$usuarios = new UsuariosModel();
		$docPen = $this->request->getPostGet('docPen');
		$data = $usuarios->where('documento',$docPen)->find();

		if ($data) {
			echo json_encode($data);
		   
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