<?php

namespace App\Controllers\ModuloPedidos;

use CodeIgniter\Controller;
use App\Controllers\BaseController;
use App\Models\ChatModel;

class Chat extends BaseController
{

    public function insertarMensaje()
    {
        $id_pedido = $this->request->getPostGet('pedido');
        $id_usuario = $this->request->getPostGet('usuario');
        $mensaje = $this->request->getPostGet('mensaje');

        $chat = new ChatModel();

        $data = $chat->insert(['pedido' => $id_pedido, 'usuario' => $id_usuario, 'mensaje' => $mensaje]);

        if ($data) {
            $mensaje = "OK##INSERT##CHAT";
        } else {
            $mensaje = "ERROR##INSERT";
        }

        echo json_encode($mensaje);
    }

    public function cargarMensajes()
    {
        $id_pedido = $this->request->getPostGet('pedido');

        $chat = new ChatModel();

        $consulta = $chat->select('chat.usuario, chat.mensaje, chat.fecha, usuarios.id as id_usuario, SUBSTRING_INDEX(usuarios.nombres, " ", 1) as nombre, SUBSTRING_INDEX(usuarios.apellidos, " ", 1) as apellido, usuarios.avatar')
                ->join('usuarios', 'chat.usuario = usuarios.id')
                ->where('chat.pedido', $id_pedido)
                ->findAll();

        echo json_encode($consulta);
    }

    public function cargarMensajesMovil()
    {
        $id_pedido = $this->request->getPostGet('pedido');

        $chat = new ChatModel();

        $consulta['registros'] = $chat->select('chat.usuario as usuario, chat.mensaje, chat.fecha, SUBSTRING_INDEX(usuarios.nombres, " ", 1) as nombre, SUBSTRING_INDEX(usuarios.apellidos, " ", 1) as apellido, usuarios.avatar')
                ->join('usuarios', 'chat.usuario = usuarios.id')
                ->where('chat.pedido', $id_pedido)
                ->findAll();

        echo json_encode($consulta);
    }
}
