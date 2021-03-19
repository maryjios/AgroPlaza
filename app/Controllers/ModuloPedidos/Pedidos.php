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
    public function historial()
    {
        $data['modulo_selected'] = "Pedidos";
        $data['opcion_selected'] = "Historial";

        echo view('template/header', $data);
        echo view('ModuloPedidos/historial');
        echo view('template/footer');
    }
}
