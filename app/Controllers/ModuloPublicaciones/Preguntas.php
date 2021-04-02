<?php 

    namespace App\Controllers\ModuloPublicaciones;

    use CodeIgniter\Controller;
    use App\Controllers\BaseController;
    use App\Models\PreguntasModel;
	use App\Models\RespuestasModel;

    class Preguntas extends BaseController{


        public function eliminarPregunta(){
            $preguntas = new PreguntasModel();

            $id = $this->request->getPostGet('id');

            $preguntas->delete($id);

            if ($preguntas) {
                $mensaje = "Ok##delete";
            }else{
                $mensaje = "Error##delete";
            }

            echo $mensaje;
        }

        public function eliminarPregunta_Respuesta(){
            $preguntas = new PreguntasModel();
            $respuesta = new RespuestasModel();

            $id_pregunta = $this->request->getPostGet('id_pregunta');
            $id_respuesta = $this->request->getPostGet('id_respuesta');

            $respuesta->delete($id_respuesta);
            $preguntas->delete($id_pregunta);
            

            if ($respuesta && $preguntas) {
                $mensaje = "Ok##delete";
            }else{
                $mensaje = "Error##delete";
            }

            echo $id_pregunta." ".$id_respuesta;
        }


    	public function guardarRespuesta()
    	{
    		$respuesta = new RespuestasModel();

    		$id_pregunta = $this->request->getPostGet('id');
    		$descripcion = $this->request->getPostGet('descripcion');

    		$respuesta ->save(['descripcion'=>$descripcion, 'id_pregunta' =>$id_pregunta]);

    		if ($respuesta) {
    			$dato = $respuesta->where('id_pregunta',$id_pregunta)->find();
    		}else {
    			$dato = "Error##insert";
    		}

    		echo json_encode($dato);
    	}

    	public function consultarRespuesta()
    	{
    		$respuesta = new RespuestasModel();

    		$id_pregunta = $this->request->getPostGet('id');
 
    		$respuesta = $respuesta ->where('id_pregunta',$id_pregunta)->findAll();

    		echo json_encode($respuesta);
    	}


        public function editarRespuesta(){
            $respuesta = new RespuestasModel();

            $id = $this->request->getPostGet('id');
            $descripcion = $this->request->getPostGet('descripcion');

            $respuesta ->update($id, ['descripcion'=>$descripcion]);

            if ($respuesta) {
                $mensaje = "Ok##insert";
            }else {
                $mensaje = "Error##insert";
            }

            echo $mensaje;
        }

    }


   




?>






