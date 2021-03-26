<?php namespace App\Models;

use CodeIgniter\Model;

class PedidosModel extends Model {
    protected $table      = 'pedidos';
    protected $primaryKey = 'id';

    protected $useAutoIncrement = true;

    protected $returnType = 'array';
    protected $useSoftDeletes = false;

    protected $allowedFields = ['cantidad', 'valor_compra','valor_envio','descuento','valor_total','direccion','evidencia_pedido','id_usuario','id_publicacion','estado'];

    protected $useTimestamps = false;
    protected $createdField  = 'fecha_insert';
    protected $updatedField  = 'fecha_edit';
    protected $deletedField  = '';

    protected $validationRules    = [];
    protected $validationMessages = [];
    protected $skipValidation     = false;
}