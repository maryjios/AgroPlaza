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
		if (sizeof($usuarios)==0) {
			 echo json_encode('error');
			
		} else {
			echo json_encode($usuarios);
		
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
		$sql=$usuarios->set('estado', 'ACTIVO')->where('id', $doc)->update();

		if ($sql) {
			$mensaje = "OK#UPDATE";
		}else{
			$mensaje = "NO#UPDATE";
		}

		echo $mensaje;
	}
  
}