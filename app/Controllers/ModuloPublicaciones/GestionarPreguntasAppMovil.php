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
}
