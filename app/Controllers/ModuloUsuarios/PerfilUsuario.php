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

		$data['modulo_selected'] = "Perfil";
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

	public function consultarNombreCiudad()
	{
		$ciudad = $this->request->getPostGet('ciudad');

		if (!empty($ciudad)) {
			$db_ciudades = new CiudadesModel();

			$datos['nCiudadyDepartamento'] = $db_ciudades->select('ciudad.nombre AS la_ciudad, departamento.nombre AS el_departamento, departamento.id AS id_departamento')
				->join('departamento', 'departamento.id=ciudad.id_departamento')
				->where('ciudad.id', $ciudad)
				->findAll();
		} else {
			$datos['nCiudadyDepartamento'] = "Erro en el envio de datos";
		}
		echo json_encode($datos);
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

	public function editarDatosMovil()
	{
		$usuarios = new UsuariosModel();
		$id_perfil = $this->request->getPostGet('id_perfil');
		$documento = (empty($this->request->getPostGet('documento'))) ? null : $this->request->getPostGet('documento');
		$existe = false;

		if ($documento != null) {
			$verificar = $usuarios->where('documento', $documento)->find();

			if ($verificar) {
				$verificar = $usuarios->where('documento', $documento)->where('id', $id_perfil)->find();

				if (!$verificar) {
					$existe = true;
				}
			}
		}

		if ($existe == false) {
			$nombres = $this->request->getPostGet('nombres');
			$apellidos = $this->request->getPostGet('apellidos');
			$direccion = (empty($this->request->getPostGet('direccion'))) ? null : $this->request->getPostGet('direccion');
			$telefono = $this->request->getPostGet('telefono');

			$data = $usuarios->set([
				'documento' => $documento,
				'nombres' => $nombres,
				'apellidos' => $apellidos,
				'direccion' => $direccion,
				'telefono' => $telefono,
			])->where('id', $id_perfil)->update();

			if ($data) {
				echo json_encode("OK##DATA##UPDATE");
			} else {
				echo json_encode("ERROR##UPDATE");
			}
		} else {
			echo json_encode("INVALID##DOCUMENT");
		}
	}

	public function editarCorreoMovil()
	{
		$usuarios = new UsuariosModel();
		$id_perfil = $this->request->getPostGet('id_perfil');
		$email = $this->request->getPostGet('email');
		$password = md5($this->request->getPostGet('password'));

		$verificar = $usuarios->where('email', $email)->find();

		if (!$verificar) {
			$verificar = $usuarios->where('password', $password)->where('id', $id_perfil)->find();

			if ($verificar) {
				$data = $usuarios->set([
					'email' => $email,
				])->where('id', $id_perfil)->update();

				if ($data) {
					echo json_encode('OK##EMAIL##UPDATE');
				} else {
					echo json_encode('ERROR##UPDATE');
				}
			} else {
				echo json_encode('INVALID##PASSWORD');
			}
		} else {
			echo json_encode('INVALID##EMAIL');
		}
	}

	public function editarPasswordMovil()
	{
		$usuarios = new UsuariosModel();
		$id_perfil = $this->request->getPostGet('id_perfil');
		$pass_actual = md5($this->request->getPostGet('pass_actual'));
		$password = md5($this->request->getPostGet('password'));

		$verificar = $usuarios->where('password', $pass_actual)->where('id', $id_perfil)->find();

		if ($verificar) {
			$data = $usuarios->set([
				'password' => $password,
			])->where('id', $id_perfil)->update();

			if ($data) {
				echo json_encode('OK##PASSWORD##UPDATE');
			} else {
				echo json_encode('ERROR##UPDATE');
			}
		} else {
			echo json_encode('INVALID##PASSWORD');
		}
	}

	public function desactivarUsuarioMovil()
	{
		$usuarios = new UsuariosModel();
		$id_perfil = $this->request->getPostGet('id_perfil');

		$data = $usuarios->set(['estado' => 'INACTIVO'])->where('id', $id_perfil)->update();

		if ($data) {
			echo json_encode('OK##STATUS##UPDATE');
		} else {
			echo json_encode('ERROR##UPDATE');
		}
	}

	public function editarAvatarMovil()
	{
		$usuarios = new UsuariosModel();

		$id_perfil = $this->request->getPostGet('id_perfil');
		$imagen_base64 = $this->request->getPostGet('imagen');

		$imagen = base64_decode($imagen_base64);

		$nombre_avatar = 'avatar_user_' . $id_perfil . '.png';

		$data = $usuarios->set(['avatar' => $nombre_avatar])->where('id', $id_perfil)->update();

		if ($data) {
			$extensiones = array('png', 'jpg', 'jpeg', 'PNG', 'JPG', 'JPEG');
				foreach ($extensiones as $elemento) {
					$ruta_avatar = "public/dist/img/avatar/avatar_user_" . $id_perfil . '.' . $elemento;
					if (file_exists($ruta_avatar)) {
						unlink($ruta_avatar);
					}
				}

			$ruta_avatar = './public/dist/img/avatar/' . $nombre_avatar;

			file_put_contents($ruta_avatar, $imagen);

			echo json_encode("OK##IMAGE##UPDATE");
		} else {
			echo json_encode('ERROR##UPDATE');
		}
	}
}
