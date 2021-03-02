<?php 

    namespace App\Controllers\ModuloPublicaciones;

    use CodeIgniter\Controller;
    use App\Controllers\BaseController;

    class Unidades extends BaseController{

        protected $unidades;

        public function __construct()
        {
            helper(['form']); 
        }


        public function index(){
            $data['modulo_selected'] = "Publicaciones";
            $data['opcion_selected'] = "CrearPublicacion";
    
    
            echo view('template/header', $data);
            echo view('ModuloPublicaciones/crear_publicacion');
            echo view('template/footer');
        }
    }







?>






