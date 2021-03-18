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
            echo view('ModuloPublicaciones/unidades');
            echo view('template/footer');
        }

        public function consultarTodo()
{
		$unidades = new UnidadesModel();

		$datos = $unidades->findAll();

		if ($datos) {
			echo json_encode($datos);
		}else{
			echo json_encode("Error");
		}
	}

    public function consultarId()
	{
		$unidades = new UnidadesModel();

		$id = $this->request->getPostGet('id');
		$datos = $unidades->where('id',$id)->find();

		if ($datos) {
			echo json_encode($datos);
		}else{
			echo json_encode("Error");
		}
	}

    public function actualizarUni()
    {
        $unidades = new UnidadesModel();
        $id = $this->request->getPostGet('id');
		$nombre = $this->request->getPostGet('nombre');
        $abreviatura = $this->request->getPostGet('abreviatura');
		

        $datos = $unidades->set('nombre', $nombre, 'abreviatura', $abreviatura)->where('id', $id)->update();
		if ($datos) {
			$mensaje ='La unidad ah sido actualizada ';
		}else{
			$mensaje = "Error al actualizar unidad";
		}
    }

    public function eliminarUnidades(){
		$unidades = new UnidadesModel();

		$id = $this->request->getPostGet('id');
		$datos = $unidades->update('id', $id);

		if ($datos) {
			$mensaje = "Eliminado";
		}else{
			$mensaje = "No##eliminado";
		}

		echo $mensaje;
	}


    public function registrarUnidades(){

		$nombre = $this->request->getPostGet('nombre_nuevo');
		$abreviatura = $this->request->getPostGet('abreviatura_nuevo');
	}


    }


   




?>






