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

        	$unidades = new UnidadesModel();

			$consulta['datos'] = $unidades->where('estado','ACTIVA')->findAll();

            $data['modulo_selected'] = "Publicaciones";
            $data['opcion_selected'] = "Unidades";
    
    
            echo view('template/header', $data);
            echo view('ModuloPublicaciones/unidades',$consulta);
            echo view('template/footer');
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

    public function actualizarUnidades()
    {
        $unidades = new UnidadesModel();
        $id = $this->request->getPostGet('id');
		$nombre = $this->request->getPostGet('nombre');
        $abreviatura = $this->request->getPostGet('abreviatura');
		

        $datos = $unidades->set(['nombre'=>$nombre, 'abreviatura'=>$abreviatura])
        				  ->where('id', $id)
        				  ->update();

		if ($datos) {
			$mensaje ='##Ok#Edit';
		}else{
			$mensaje = "##Error#Edit";
		}

		echo $mensaje;
    }

    public function eliminarUnidades(){
		$unidades = new UnidadesModel();

		$id = $this->request->getPostGet('id');
		$datos = $unidades->update($id,['estado'=>'INACTIVA']);

		if ($datos) {
			$mensaje = "Eliminado";
		}else{
			$mensaje = "No##eliminado";
		}

		echo $mensaje;
	}


    public function registrarUnidades(){

    	$unidades = new UnidadesModel();

		$nombre = $this->request->getPostGet('nombre_nuevo');
		$abreviatura = $this->request->getPostGet('abreviatura_nuevo');


		$consulta = $unidades->insert(['nombre' => $nombre,'abreviatura'=>$abreviatura]);

		if ($consulta) {
			$mensaje = "##Ok##insert";
		}else {
			$mensaje = "##No##insert";
		}

		echo $mensaje;
	}

	


    }


   




?>






