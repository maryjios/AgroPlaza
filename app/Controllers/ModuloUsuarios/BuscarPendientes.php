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
		$id = $this->request->getPostGet('doc');
		$usuario = $usuarios->select('usuarios.id,usuarios.email,usuarios.documento,usuarios.nombres,usuarios.apellidos,
		                              usuarios.id_ciudad,usuarios.direccion,usuarios.telefono,usuarios.genero,usuarios.tipo_usuario,
									  usuarios.estado,usuarios.avatar,usuarios.fecha_insert,ciudad.nombre')
							 ->join('ciudad', 'ciudad.id=usuarios.id_ciudad')
							 ->where('usuarios.id', $id)
							 ->first();
		$data=['datos' => $usuario];
		
		echo view('template/header',);
		echo view('ModuloUsuarios/detalles_usuario',$data);
		echo view('template/footer');

		
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