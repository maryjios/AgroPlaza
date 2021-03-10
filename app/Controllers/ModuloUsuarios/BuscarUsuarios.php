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
		$doc = $this->request->getPostGet('doc');
		$data = $usuarios->where('documento',$doc)->find();

		if ($data) {
			echo json_encode($data);
		   
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
		$datos=$usuarios->set('estado', 'INACTIVO')->where('documento', $doc)->update();

		if ($datos) {
			$mensaje = "OK#UPDATE";
		}else{
			$mensaje = "NO#UPDATE";
		}

		echo $mensaje;
	}


}

