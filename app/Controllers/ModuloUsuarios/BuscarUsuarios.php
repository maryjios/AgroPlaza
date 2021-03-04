<?php namespace App\Controllers\ModuloUsuarios;

use CodeIgniter\Controller;
use App\Controllers\BaseController;
use App\Models\UsuariosModel;

class BuscarUsuarios extends BaseController {

	public function index(){
		$data['modulo_selected'] = "Usuarios";
		$data['opcion_selected'] = "BuscarUsuarios";

		echo view('template/header', $data);
		echo view('ModuloUsuarios/buscar_usuarios');
		echo view('template/footer');
	}
    public function listarusuarios(){
		$usuarios = new UsuariosModel();
		$usuarios = $usuarios->select('*')->where('estado','ACTIVO')->findAll();
		if ($usuarios) {
			 echo json_encode($usuarios);
			
		} else {
			echo json_encode('error');
		
		}
	}
	public function buscarporId(){
		$usuarios = new UsuariosModel();
		$id = $this->request->getPostGet('id');
		$dato = $usuarios->select('*')->where('id',$id)->find();

		if ($dato) {
			echo json_encode($dato);
		   
	   } else {
		   echo json_encode('error');
	   
	   }
	}

}

