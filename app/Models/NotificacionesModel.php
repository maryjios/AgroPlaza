<?php namespace App\Models;

use CodeIgniter\Model;

class UnidadesModel extends Model {
    protected $table      = 'notificaciones';
    protected $primaryKey = 'id';

    protected $useAutoIncrement = true;

    protected $returnType = 'array';
    protected $useSoftDeletes = false;

    protected $allowedFields = ['mensaje', 'id_usuario','id_publicacion','estado','leido'];

    protected $useTimestamps = false;
    protected $createdField  = 'fecha_insert';
    protected $updatedField  = '';
    protected $deletedField  = '';

    protected $validationRules    = [];
    protected $validationMessages = [];
    protected $skipValidation     = false;
}