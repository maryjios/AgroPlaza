<?php

namespace App\Controllers\ModuloPedidos;

use CodeIgniter\Controller;
use App\Controllers\BaseController;
use App\Models\EspecializacionModel;
use App\Models\PedidosModel;
use App\Models\UsuariosModel;
use App\Models\ValoracionesModel;

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
            ->orderBy('pedidos.id', 'desc')
            ->findAll();

        echo json_encode($sentencia);
    }

    public function detallePedido()
    {

        $pedido = $this->request->getPostGet('pedido');
        $db_pedidos = new PedidosModel();

        $sentencia['datos'] = $db_pedidos->select('p.id AS id_publicacion, p.titulo AS titulo_p, p.precio AS precio_p, p.envio AS envio_p, pedidos.descuento AS descuento_p, v.id AS id_valoracion,
        concat(u.nombres," ",u.apellidos) AS nombre_vendedor, u.tipo_usuario AS tipo_v, u.id AS id_u, c.nombre AS ciudad_v, d.nombre AS departamento_v,  pedidos.valor_total AS total_p, pedidos.cantidad AS cantidad_p')
            ->join('publicaciones p', 'p.id = pedidos.id_publicacion')
            ->join('usuarios u', 'u.id = p.id_usuario')
            ->join('ciudad c', 'c.id = u.id_ciudad')
            ->join('valoraciones v', 'p.id = v.id_publicacion')
            ->join('departamento d', 'd.id = c.id_departamento')->where('pedidos.id', $pedido)->findAll();

        echo json_encode($sentencia);
    }

    public function getEspecializacionVendedor()
    {

        $user = $this->request->getPostGet('usuario');
        $db_usuario = new UsuariosModel();

        $dato = $db_usuario->select('e.nombre')
            ->join('especializacion e', 'e.id_usuario = usuarios.id')->where(['usuarios.id' => $user, 'usuarios.tipo_usuario' => 'VENDEDOR_ESPECIALISTA'])->first();

        if ($dato) {
            echo json_encode($dato);
        } else {
            echo json_encode("El vendedor no es especialista");
        }
    }

    public function estadoFinalizadoPedido()
    {
        $id_pedido = $this->request->getPostGet('pedido');

        $pedidos = new PedidosModel();

        $data = $pedidos->set([
            'estado' => 'FINALIZADO'
        ])->where('id', $id_pedido)->update();

        if ($data) {
            echo json_encode("OK##STATUS##UPDATE");
        } else {
            echo json_encode("ERROR##UPDATE");
        }
    }

    public function calificarPublicacion()
    {
        $id_publicacion = $this->request->getPostGet('id_publicacion');
        $id_usuario = $this->request->getPostGet('id_usuario');
        $valoracion = $this->request->getPostGet('valoracion');
        $descripcion = $this->request->getPostGet('descripcion');
        $imagen = $this->request->getPostGet('imagen');

        if ($imagen != "") {
            $foto = base64_decode($imagen);

            $nom_foto = "valoracion_user_" . $id_usuario . ".jpeg";
        } else {
            $nom_foto = "";
        }

        $valoraciones = new ValoracionesModel();

        $data = $valoraciones->insert([
            'valoracion' => $valoracion,
            'descripcion' => $descripcion,
            'foto' => $nom_foto,
            'id_usuario' => $id_usuario,
            'id_publicacion' => $id_publicacion
        ]);

        if ($data) {
            $ruta = "./public/dist/img/publicaciones/publicacion" . $id_publicacion . "/valoraciones";

            if (!file_exists($ruta)) {
                mkdir($ruta, 0777, false);
            }

            if ($imagen != "") {
                $ruta_valoracion = $ruta . "/" . $nom_foto;

                file_put_contents($ruta_valoracion, $foto);
            }

            echo json_encode("OK##INSERT");
        } else {
            echo json_encode("ERROR##INSERT");
        }
    }
}
