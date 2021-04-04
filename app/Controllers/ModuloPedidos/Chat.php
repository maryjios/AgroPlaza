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

        $data = $chat->save(['pedido' => $id_pedido, 'usuario' => $id_usuario, 'mensaje' => $mensaje]);

        if ($data) {
            $mensaje = "OK##INSERT##CHAT";
        } else {
            $mensaje = "ERROR##INSERT";
        }

        json_encode($mensaje);
    }
}
