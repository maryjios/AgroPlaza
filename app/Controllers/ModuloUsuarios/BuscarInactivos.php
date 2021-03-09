<?php namespace App\Controllers\ModuloUsuarios;

use CodeIgniter\Controller;
use App\Controllers\BaseController;
use App\Models\UsuariosModel;

class BuscarInactivos extends BaseController {

	public function index(){
		$data['modulo_selected'] = "Usuarios";
		$data['opcion_selected'] = "BuscarInactivos";

		echo view('template/header', $data);
		echo view('ModuloUsuarios/buscar_inactivos');
		echo view('template/footer');
	}	
	public function listarinactivos(){
		$usuarios = new UsuariosModel();
		$usuarios = $usuarios->select('*')->where('estado','INACTIVO')->findAll();
		if ($usuarios) {
			 echo json_encode($usuarios);
			
		} else {
			echo json_encode('error');
		
		}
	}

	public function buscarinacId(){
		$usuarios = new UsuariosModel();
		$docum = $this->request->getPostGet('docum');
		$data = $usuarios->where('documento',$docum)->find();

		if ($data) {
			echo json_encode($data);
		   
	   } else {
		   echo json_encode('error');
	   
	   }
	}

	public function restaurarestado(){
		$usuarios = new UsuariosModel();
		$doc = $this->request->getPostGet('doc');
		$data = $usuarios->update($doc,['estado'=>'ACTIVO']);

		if ($data) {
			$mensaje = "El usuario ha sido activado ";
		}else{
			$mensaje = "No se ha podido modificar el estado de usuario";
		}

		echo $mensaje;
	}
  
}