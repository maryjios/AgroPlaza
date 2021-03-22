<?php namespace App\Controllers\ModuloUsuarios;

use CodeIgniter\Controller;
use App\Controllers\BaseController;
use App\Models\EspecializacionModel;
use App\Models\UsuariosModel;
use App\Models\CertificadosModel;

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
		$especializaciones = new EspecializacionModel();

		$id = $this->request->getPostGet('doc');
		$usuario = $usuarios->select('usuarios.id,usuarios.email,usuarios.documento,usuarios.nombres,usuarios.apellidos,
		                              usuarios.id_ciudad,usuarios.direccion,usuarios.telefono,usuarios.genero,usuarios.tipo_usuario,
									  usuarios.estado,usuarios.avatar,usuarios.fecha_insert,ciudad.nombre')
							 ->join('ciudad', 'ciudad.id=usuarios.id_ciudad')
							 ->where('usuarios.id', $id)
							 ->first();
		$especializacion = $especializaciones->select('especializacion.id,especializacion.nombre,especializacion.descripcion,
		                                              especializacion.id_usuario,certificados.id,
		                                              certificados.certificado,certificados.id_especializacion')
											 ->join('certificados', 'especializacion.id=certificados.id_especializacion')
											 ->where('especializacion.id_usuario', $id)
											 ->first();

		$data=['datos' => $usuario, 'especialidad' => $especializacion];
		
		echo view('template/header',);
		echo view('ModuloUsuarios/detalles_pend',$data);
		echo view('template/footer');

		
	}

	public function actualizarpen(){
		$usuarios = new UsuariosModel();
		$id = $this->request->getPostGet('id_pen');
		$new_estado = $this->request->getPostGet('new_estado');

		$dato=$usuarios->set('estado', $new_estado)->where('id', $id)->update();
		if ($dato) {
			$mensaje ='USUARIO#ACTUALIZADO';
		}else{
			$mensaje = "ERROR#ACTUALIZAR#DATOS";
		}

		echo $mensaje;
	}
  
}