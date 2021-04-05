<?php

namespace App\Controllers\ModuloPedidos;

use CodeIgniter\Controller;
use App\Controllers\BaseController;
use App\Models\PedidosModel;
use App\Models\UsuariosModel;
use App\Models\PublicacionesModel;

class GestionPedidosMovil extends BaseController
{

    public function generarPedido()
    {
        $direccion = $this->request->getPostGet('direccion');
        $documento = $this->request->getPostGet('documento');
        $id_usuario = $this->request->getPostGet('id_usuario');

        $usuarios = new UsuariosModel();
        $verificar = $usuarios->where('documento', $documento)->where('id', $id_usuario)->find();

        $doc_valido = true;

        if (!$verificar) {
            $verificar = $usuarios->where('documento', $documento)->find();

            if ($verificar) {
                $doc_valido = false;
            }
        }

        if ($doc_valido == true) {
            $usuarios->set([
                'documento' => $documento,
                'direccion' => $direccion
            ])->where('id', $id_usuario)->update();

            $cantidad = ($this->request->getPostGet('cantidad') != "0") ? $this->request->getPostGet('cantidad') : null;
            $valor_compra = $this->request->getPostGet('valor_compra');
            $descuento = $this->request->getPostGet('descuento');
            $valor_total = $this->request->getPostGet('valor_total');
            $id_publicacion = $this->request->getPostGet('id_publicacion');

            $pedidos = new PedidosModel();

            $data = $pedidos->insert([
                'cantidad' => $cantidad,
                'valor_compra' => $valor_compra,
                'descuento' => $descuento,
                'valor_total' => $valor_total,
                'direccion' => $direccion,
                'id_usuario' => $id_usuario,
                'id_publicacion' => $id_publicacion,
                'estado' => 'SOLICITADO'
            ]);

            if ($data) {
                echo json_encode("OK##DATA##INSERT");
            } else {
                echo json_encode("ERROR##INSERT");
            }
        } else {
            echo json_encode("INVALID##DOCUMENT");
        }
    }

    public function getPedidos()
    {
        $user = $this->request->getPostGet('id_usuario');

        $db_pedidos = new PedidosModel();
        $sentencia['pedidosUser'] = $db_pedidos->select("pedidos.id AS id_p, pedidos.id_publicacion, publicaciones.titulo AS titulo_p, 
        publicaciones.id AS id_publicacion, pedidos.fecha_insert AS fecha_p, 
        pedidos.estado AS estado_p")
            ->join('publicaciones', 'publicaciones.id = pedidos.id_publicacion')
            ->where('pedidos.id_usuario', $user)
            ->orderBy('pedidos.id','desc')
            ->findAll();

        echo json_encode($sentencia);
    }

    public function detallePedido(){
        
        $pedido = $this->request->getPostGet('pedido');
        $db_pedidos = new PedidosModel();
        
        $sentencia['datos'] = $db_pedidos->select('p.titulo AS titulo_p, p.precio AS precio_p, p.envio AS envio_p, pedidos.descuento AS descuento_p, 
        concat(u.nombres," ",u.apellidos) AS nombre_vendedor, pedidos.valor_total AS total_p, pedidos.cantidad AS cantidad_p')
        ->join('publicaciones p', 'p.id = pedidos.id_publicacion')
        ->join('usuarios u', 'u.id = p.id_usuario')->where('pedidos.id', $pedido)->findAll();

        echo json_encode($sentencia);
    }
}
