<?php

namespace App\Controllers\ModuloUsuarios;

use CodeIgniter\Controller;
use App\Controllers\BaseController;
use App\Models\UsuariosModel;
use App\Models\CiudadesModel;
use App\Models\DepartamentosModel;

class PerfilUsuario extends BaseController
{

	public function index()
	{
		$this->departamento = new DepartamentosModel();
		$departamentos_sql = $this->departamento->select('*')->findAll();
		$departamentos = ['departamentos' => $departamentos_sql];

		$data['modulo_selected'] = "Usuarios";
		$data['opcion_selected'] = "PerfilUsuario";

		echo view('template/header', $data);
		echo view('ModuloUsuarios/perfil_usuario', $departamentos);
		echo view('template/footer');
	}

	public function buscar_session()
	{
		$db_usuarios = new UsuariosModel();
		$id_perfil = $this->request->getPostGet('id_perfil');
		$data = $db_usuarios->select('usuarios.id,usuarios.email,usuarios.documento,usuarios.nombres,usuarios.apellidos,
									usuarios.id_ciudad,usuarios.direccion,usuarios.telefono,usuarios.genero,usuarios.tipo_usuario,
									usuarios.estado,usuarios.fecha_insert,ciudad.nombre')
			->join('ciudad', 'ciudad.id=usuarios.id_ciudad')
			->where('usuarios.id', $id_perfil)
			->findAll();
		if ($data) {
			echo json_encode($data);
		} else {
			echo json_encode('error no encontrado');
		}
	}

	public function enviarnewdatos()
	{
		$usuarios = new UsuariosModel();
		$id_perfil = $this->request->getPostGet('id_perfil');
		$nombre_edit = $this->request->getPostGet('nombre_edit');
		$apellido_edit = $this->request->getPostGet('apellido_edit');
		$direccion_edit = $this->request->getPostGet('direccion_edit');
		$telefono_edit = $this->request->getPostGet('tel_edit');
		$id_ciudad = $this->request->getPostGet('id_ciudad');

		$data = $usuarios->set(['nombres' => $nombre_edit, 'apellidos' => $apellido_edit, 'direccion' => $direccion_edit, 'telefono' => $telefono_edit, 'id_ciudad' => $id_ciudad])->where('id', $id_perfil)->update();

		if ($data) {
			echo json_encode($data);
		} else {
			echo json_encode('ERROR#UPDATE');
		}
	}
	public function getCiudades()
	{
		$ciudades_db = new CiudadesModel();
		$departamento = $this->request->getPostGet('departamento');
		$data = $ciudades_db->where(["id_departamento" => $departamento])->findAll();
		echo json_encode($data);
	}

	public function editarAvatar()
	{
		$user = $this->request->getPostGet('id_user');

		$extension = explode(".", $_FILES['photo']['name']);
		$extension = strtolower($extension[sizeof($extension) - 1]);
		$nombre_archivo = 'avatar_user_' . $user;
		$nombre_avatar = 'avatar_user_' . $user . '.' . $extension;

		if (in_array($extension, array('png', 'jpg', 'jpeg', 'PNG', 'JPG', 'JPEG'))) {
			$file = $this->request->getFiles()['photo'];

			if ($file->isValid() && !$file->hasMoved()) {

				$db_usuarios = new UsuariosModel();
				$datos = $db_usuarios->set('avatar', $nombre_avatar)->where('id', $user)->update();

				$extensiones = array('png', 'jpg', 'jpeg', 'PNG', 'JPG', 'JPEG');
				foreach ($extensiones as $elemento) {
					$ruta_avatar = "public/dist/img/avatar/" . $nombre_archivo . '.' . $elemento;
					if (file_exists($ruta_avatar)) {
						unlink($ruta_avatar);
					}
				}

				// Subiendo foto al servidor
				$moveresponse = $file->move('./public/dist/img/avatar/', $nombre_avatar);
				if ($datos && $moveresponse) {

					$_SESSION['avatar'] = $nombre_avatar;
					$avatar['respuesta'] = 'OK#UPDATE';

					$avatar['ruta'] = $nombre_avatar;
				} else {
					$avatar['respuesta'] = 'ERROR#UPDATE';
				}
			} else {
				$avatar['respuesta'] = 'NO#VALID';
			}
		} else {

			$avatar['respuesta'] = 'FORMAT#INCORRECT';
		}

		echo json_encode($avatar);
	}

	public function editarCiudadMovil()
	{
		$usuarios = new UsuariosModel();
		$id_perfil = $this->request->getPostGet('id_perfil');
		$id_ciudad = $this->request->getPostGet('id_ciudad');

		$data = $usuarios->set(['id_ciudad' => $id_ciudad])->where('id', $id_perfil)->update();

		if ($data) {
			echo json_encode("OK##CIUDAD##UPDATE");
		} else {
			echo json_encode("ERROR##UPDATE");
		}
	}
}
