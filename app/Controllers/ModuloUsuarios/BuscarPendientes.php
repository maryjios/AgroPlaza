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

	public function buscarinactivoId(){
		$usuarios = new UsuariosModel();
		$id = $this->request->getPostGet('id');
		$dato = $usuarios->where('id',$id)->find();

		if ($dato) {
			echo json_encode($dato);
		   
	   } else {
		   echo json_encode('error');
	   
	   }
	}
  
}