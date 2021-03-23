<?php namespace App\Models;

use CodeIgniter\Model;

class ValoracionesModel extends Model {
    protected $table      = 'valoraciones';
    protected $primaryKey = 'id';

    protected $useAutoIncrement = true;

    protected $returnType = 'array';
    protected $useSoftDeletes = false;

    protected $allowedFields = ['valoracion', 'descripcion','foto','id_publicacion','id_usuario'];

    protected $useTimestamps = false;
    protected $createdField  = 'fecha_insert';
    protected $updatedField  = '';
    protected $deletedField  = '';

    protected $validationRules    = [];
    protected $validationMessages = [];
    protected $skipValidation     = false;
}