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
		$id = $this->request->getPostGet('doc');
		$usuario = $usuarios->select('usuarios.id,usuarios.email,usuarios.documento,usuarios.nombres,usuarios.apellidos,
		                              usuarios.id_ciudad,usuarios.direccion,usuarios.telefono,usuarios.genero,usuarios.tipo_usuario,
									  usuarios.estado,usuarios.avatar,usuarios.fecha_insert,ciudad.nombre')
							 ->join('ciudad', 'ciudad.id=usuarios.id_ciudad')
							 ->where('usuarios.id', $id)
							 ->first();
		$data=['datos' => $usuario];
		
		echo view('template/header',);
		echo view('ModuloUsuarios/detalle_usuario',$data);
		echo view('template/footer');
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


	public function totalUsuarios (){
		$usuarios = new UsuariosModel();

		$datos=$usuarios
		  //->where('estado',"ACTIVO")
		  ->from("id")
		  ->countAll();

		  echo $datos;
	}

	public function totalPendientes(){
		$usuarios = new UsuariosModel();

		$datos=$usuarios->where('estado','PENDIENTE')->countAll();

		  echo $datos;
	}

}

