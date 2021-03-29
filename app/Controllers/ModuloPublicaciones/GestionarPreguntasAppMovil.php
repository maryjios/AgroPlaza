<?php

namespace App\Controllers\ModuloPublicaciones;

use CodeIgniter\Controller;
use App\Controllers\BaseController;
use App\Models\PreguntasModel;



class GestionarPreguntasAppMovil extends BaseController
{

    public function InsertarPregunta()
    {

        $preguntas_db = new PreguntasModel();

        $id_publicacion = $this->request->getPostGet('id_publicacion');
        $descripcion = $this->request->getPostGet('pregunta');
        $cliente = $this->request->getPostGet('id_usuario');

        $consulta = $preguntas_db->insert(['id_publicacion' => $id_publicacion, 'descripcion' => $descripcion, 'id_usuario'=> $cliente]);

        if ($consulta) {
            $mensaje = "##Ok##insert";
        } else {
            $mensaje = "##No##insert";
        }

        echo $mensaje;
    }

    public function getPreguntas()
    {

        $preguntas_db = new PreguntasModel();

        $id_publicacion = $this->request->getPostGet('publicacion');

		$consulta['registros_preguntas'] = $preguntas_db->select('preguntas.descripcion as pregunta_c,
        preguntas.fecha_insert as fecha_pregunta_c,
        preguntas.id AS id_c, respuestas.id AS id_v,
				respuestas.descripcion as respuesta_v,
				respuestas.fecha_insert as fecha_pregunta_v')
			->join('respuestas', 'respuestas.id_pregunta = preguntas.id')
			->where('preguntas.id_publicacion', $id_publicacion)
			->findAll();

        echo json_encode($consulta);
    }
}
