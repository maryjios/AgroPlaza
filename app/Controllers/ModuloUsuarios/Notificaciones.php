<?php

namespace App\Controllers\ModuloUsuarios;

use CodeIgniter\Controller;
use App\Controllers\BaseController;
use App\Models\NotificacionesModel;

class Notificaciones extends BaseController{

	public function infoNotificaciones(){

		$notificaciones = new NotificacionesModel();

		/*$id_usuario = $this->request->getPostGet('id_usuario');

		$info_notifi = $notificaciones->select('notificaciones.id as id_notificacion, notificaciones.mensaje as mensaje, notificaciones.estado estado_noti, notificaciones.leido as leido, notificaciones.fecha_insert as noti_fecha, concat(usuarios.nombres," ",usuarios.apellidos)nombre_usuario, publicaciones.titulo as titulo')
			->join('usuarios', 'notificaciones.id_usuario = usuarios.id')
			->join('publicaciones', 'notificaciones.id_publicacion= publicaciones.id')
			->where('notificaciones.id_usuario', $id_usuario)
			->findAll();*/

		echo "hola";
	}
	
}
