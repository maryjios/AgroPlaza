<?php

namespace App\Controllers\ModuloPedidos;

use CodeIgniter\Controller;
use App\Controllers\BaseController;
use App\Models\PedidosModel;

class Pedidos extends BaseController
{

    public function index()
    {
        $pedidos = new PedidosModel();
        $consulta['pedidos'] = $pedidos->select('pedidos.id, pedidos.cantidad, pedidos.valor_total, pedidos.estado as estado_pedido,pedidos.fecha_insert, concat(usuarios.nombres," ",usuarios.apellidos)nombre_usuario,publicaciones.titulo')
                            ->join('usuarios', 'pedidos.id_usuario = usuarios.id')
                            ->join('publicaciones','pedidos.id_publicacion = publicaciones.id')
                            ->where('pedidos.estado','SOLICITADO')
                            ->findAll();

        $data['modulo_selected'] = "Pedidos";
        $data['opcion_selected'] = "PedidosLista";

        echo view('template/header', $data);
        echo view('ModuloPedidos/pedidos',$consulta);
        echo view('template/footer');
    }

    public function enProceso()
    {
        $pedidos = new PedidosModel();
        $consulta['pedidos'] = $pedidos->select('pedidos.id, pedidos.cantidad, pedidos.valor_total, pedidos.estado as estado_pedido,pedidos.fecha_insert, concat(usuarios.nombres," ",usuarios.apellidos)nombre_usuario,publicaciones.titulo')
                            ->join('usuarios', 'pedidos.id_usuario = usuarios.id')
                            ->join('publicaciones','pedidos.id_publicacion = publicaciones.id')
                            ->where('pedidos.estado','EN PROCESO')
                            ->findAll();

        $data['modulo_selected'] = "Pedidos";
        $data['opcion_selected'] = "PedidosLista";

        echo view('template/header', $data);
        echo view('ModuloPedidos/pedidos_en_proceso',$consulta);
        echo view('template/footer');
    }


    public function entregados()
    {
        $pedidos = new PedidosModel();
        $consulta['pedidos'] = $pedidos->select('pedidos.id, pedidos.cantidad, pedidos.valor_total, pedidos.estado as estado_pedido,pedidos.fecha_insert, concat(usuarios.nombres," ",usuarios.apellidos)nombre_usuario,publicaciones.titulo')
                            ->join('usuarios', 'pedidos.id_usuario = usuarios.id')
                            ->join('publicaciones','pedidos.id_publicacion = publicaciones.id')
                            ->where('pedidos.estado','ENTREGADO')
                            ->findAll();

        $data['modulo_selected'] = "Pedidos";
        $data['opcion_selected'] = "PedidosLista";

        echo view('template/header', $data);
        echo view('ModuloPedidos/pedidos_entregados',$consulta);
        echo view('template/footer');
    }

    public function pasar_a_Proceso()
    {
        $pedidos = new PedidosModel();

        $id = $this->request->getPostGet('id');

        $pedidos->update($id, ['estado' => 'EN PROCESO']);

        if ($pedidos) {
            $mensaje = "Ok";
        } else {
            $mensaje = "Error";
        }

        echo $mensaje;
    }

    public function pasar_a_Entregado()
    {
        $pedidos = new PedidosModel();

        $id = $this->request->getPostGet('id');

        $pedidos->update($id, ['estado' => 'ENTREGADO']);

        if ($pedidos) {
            $mensaje = "Ok";
        } else {
            $mensaje = "Error";
        }

        echo $mensaje;
    }


    public function pasar_a_Finalizado()
    {
        $pedidos = new PedidosModel();

        $id = $this->request->getPostGet('id');

        $pedidos->update($id, ['estado' => 'FINALIZADO']);

        if ($pedidos) {
            $mensaje = "Ok";
        } else {
            $mensaje = "Error";
        }

        echo $mensaje;
    }


    public function pasar_a_Cancelado()
    {
        $pedidos = new PedidosModel();

        $id = $this->request->getPostGet('id');

        $pedidos->update($id, ['estado' => 'CANCELADO']);

        if ($pedidos) {
            $mensaje = "Ok";
        } else {
            $mensaje = "Error";
        }

        echo $mensaje;
    }

    public function historial()
    {

        $pedidos = new PedidosModel();
        $consulta['pedidos'] = $pedidos->select('pedidos.id, pedidos.cantidad, pedidos.valor_total, pedidos.estado as estado_pedido,pedidos.fecha_insert, concat(usuarios.nombres," ",usuarios.apellidos)nombre_usuario,publicaciones.titulo')
                            ->join('usuarios', 'pedidos.id_usuario = usuarios.id')
                            ->join('publicaciones','pedidos.id_publicacion = publicaciones.id')
                            ->where('(pedidos.estado = "CANCELADO" OR pedidos.estado = "FINALIZADO")')
                            ->findAll();


        $data['modulo_selected'] = "Pedidos";
        $data['opcion_selected'] = "Historial";

        echo view('template/header', $data);
        echo view('ModuloPedidos/historial',$consulta);
        echo view('template/footer');
    }
}
