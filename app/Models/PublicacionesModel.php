<?php namespace App\Models;

use CodeIgniter\Model;

class PublicacionesModel extends Model {
    protected $table      = 'publicaciones';
    protected $primaryKey = 'id_publicaciones';

    protected $useAutoIncrement = true;

    protected $returnType = 'array';
    protected $useSoftDeletes = false;

    protected $allowedFields = ['titulo', 'descripcion','tipo_publicacion','stock','id_unidad','precio','precio_envio','descuento','id_ciudad', 'id_usuario','estado_publicacion'];

    protected $useTimestamps = false;
    protected $createdField  = '';
    protected $updatedField  = '';
    protected $deletedField  = '';

    protected $validationRules    = [];
    protected $validationMessages = [];
    protected $skipValidation     = false;
}