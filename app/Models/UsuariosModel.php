<?php namespace App\Models;

use CodeIgniter\Model;

class UsuariosModel extends Model {
    protected $table      = 'usuarios';
    protected $primaryKey = 'id';

    protected $useAutoIncrement = true;


    protected $returnType = 'array';
    protected $useSoftDeletes = false;

    protected $allowedFields = ['email', 'password', 'documento', 'nombres', 'apellidos', 'id_ciudad', 'direccion', 'telefono', 'genero', 'avatar', 'tipo_usuario'];

    protected $useTimestamps = false;
    protected $createdField  = 'fecha_insert';
    protected $updatedField  = 'fecha_edit';
    protected $deletedField  = '';

    protected $validationRules    = [];
    protected $validationMessages = [];
    protected $skipValidation     = false;
}