<?php

namespace App\Controllers\ModuloUsuarios;

use CodeIgniter\Controller;
use App\Controllers\BaseController;
use App\Models\UsuariosModel;

class PerfilUsuario extends BaseController
{

	public function index()
	{
		$data['modulo_selected'] = "Usuarios";
		$data['opcion_selected'] = "PerfilUsuario";

		echo view('template/header', $data);
		echo view('ModuloUsuarios/perfil_usuario');
		echo view('template/footer');
	}

	public function editarAvatar()
	{
		$user = $this->request->getPostGet('id_user');


		$extension = explode(".", $_FILES['img_avatar']['name']);
		$extension = strtolower($extension[sizeof($extension) - 1]);
		$nombre_avatar = 'avatar_user_' . $user;

		if (in_array($extension, array('png', 'jpg', 'jpeg', 'PNG', 'JPG', 'JPEG'))) {
			$file = $this->request->getFiles()['img_avatar'];

			if ($file->isValid() && !$file->hasMoved()) {


				$db_usuarios = new UsuariosModel();
				$db_usuarios->set('avatar', $nombre_avatar)->where('id', $user)->update();

				$ruta_avatar = "public/dist/img/avatar/". $nombre_avatar;

				if (file_exists($ruta_avatar)) {
					unlink($ruta_avatar);
				}

				// Subiendo foto al servidor
				$file->move('./public/dist/img/avatar/', $nombre_avatar);

				echo "OK#CORRECT#DATA";
				
			}else{
				echo "MALO#INCORRECT#DATA";

			}
		}else{

			echo "FORMAT#INCORRECT";

		}
	}
}
