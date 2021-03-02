<?php 

    namespace App\Controllers\ModuloPublicaciones;

    use CodeIgniter\Controller;
    use App\Controllers\BaseController;
    use App\Models\UnidadesModel;

    class Unidades extends BaseController{

        protected $unidades;

        public function __construct()
        {
            helper(['form']); 
        }


        public function index(){
            $data['modulo_selected'] = "Publicaciones";
            $data['opcion_selected'] = "Unidades";
    
    
            echo view('template/header', $data);
            echo view('ModuloPublicaciones/Unidades');
            echo view('template/footer');
        }

        public function listarunidades(){
            $unidades = new UnidadesModel();
            $consulta = $unidades->where(['id' => $id])->find();
            if ($unidades) {
                 echo json_encode($unidades);
                
            } else {
                echo json_encode('error');
            
            }
            
           
            
        }
    }


   




?>






