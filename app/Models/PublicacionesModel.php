<?php namespace App\Models;

use CodeIgniter\Model;

class PublicacionesModel extends Model {
    protected $table      = 'publicaciones';
    protected $primaryKey = 'id_publicaciones';

    protected $useAutoIncrement = true;

    protected $returnType = 'array';
    protected $useSoftDeletes = false;

    protected $allowedFields = ['titulo', 'descripcion','tipo_publicacion','stock','id_unidad','precio','envio','descuento','id_ciudad', 'id_usuario','estado_publicacion'];

    protected $useTimestamps = false;
    protected $createdField  = 'fecha_insert';
    protected $updatedField  = 'fecha_edit';
    protected $deletedField  = '';

    protected $validationRules    = [];
    protected $validationMessages = [];
    protected $skipValidation     = false;
}