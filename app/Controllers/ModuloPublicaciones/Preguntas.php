<?php 

    namespace App\Controllers\ModuloPublicaciones;

    use CodeIgniter\Controller;
    use App\Controllers\BaseController;
    use App\Models\PreguntasModel;
	use App\Models\RespuestasModel;

    class Preguntas extends BaseController{

    	public function listarPreguntas(){
    		$preguntas = new PreguntasModel();
    		$id = $this->request->getPostGet('id');

    		$preguntas_publicacion = $preguntas->select('preguntas.id as id_pregunta,preguntas.descripcion as pregunta,concat(usuarios.nombres," ",usuarios.apellidos)nombre_usuario,preguntas.fecha_insert as fecha')
    		->join('usuarios', 'preguntas.id_usuario = usuarios.id')
    		->where('preguntas.id_publicacion',$id)
    		->findAll();
    		echo json_encode($preguntas_publicacion);
    	}


    	public function consultarPregunta()
    	{
    		$preguntas = new PreguntasModel();
    		$id = $this->request->getPostGet('id');

    		$pregunta = $preguntas->select('preguntas.id as id_pregunta,preguntas.descripcion as pregunta')
    		->where('preguntas.id',$id)
    		->find();

    		echo json_encode($pregunta);
    	}


    	public function guardarRespuesta()
    	{
    		$respuesta = new RespuestasModel();

    		$id_pregunta = $this->request->getPostGet('id');
    		$descripcion = $this->request->getPostGet('descripcion');

    		$respuesta ->save(['descripcion'=>$descripcion, 'id_pregunta' =>$id_pregunta]);

    		if ($respuesta) {
    			$mensaje = "Ok##insert";
    		}else {
    			$mensaje = "Error##insert";
    		}

    		echo $mensaje;
    	}

    }


   




?>






