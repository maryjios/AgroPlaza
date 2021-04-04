<?php namespace App\Models;

use CodeIgniter\Model;

class ChatModel extends Model {
    protected $table      = 'chat';
    protected $primaryKey = 'id';

    protected $useAutoIncrement = true;

    protected $returnType = 'array';
    protected $useSoftDeletes = false;

    protected $allowedFields = ['pedido', 'usuario', 'mensaje'];

    protected $useTimestamps = false;
    protected $createdField  = 'fecha';
    protected $updatedField  = '';
    protected $deletedField  = '';

    protected $validationRules    = [];
    protected $validationMessages = [];
    protected $skipValidation     = false;
}