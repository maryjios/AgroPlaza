<?php

namespace App\Controllers\ModuloPedidos;

use CodeIgniter\Controller;
use App\Controllers\BaseController;

class Pedidos extends BaseController
{

    public function index()
    {
        $data['modulo_selected'] = "Pedidos";
        $data['opcion_selected'] = "PedidosLista";

        echo view('template/header', $data);
        echo view('ModuloPedidos/pedidos');
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
