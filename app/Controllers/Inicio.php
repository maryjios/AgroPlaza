<?php

namespace App\Controllers;

use App\Models\CertificadosModel;
use App\Models\CiudadesModel;
use App\Models\DepartamentosModel;
use App\Models\EspecializacionModel;
use App\Models\UsuariosModel;

class Inicio extends BaseController
{

   public function index()
   {
      return view('login');
   }

   public function validarDatosIngreso()
   {
      $valor_email = $this->request->getPostGet('email');
      $valor_pass = md5($this->request->getPostGet('password'));

      $usuarios_db = new UsuariosModel();
      $registros = $usuarios_db->where(['email' => $valor_email, 'password' => $valor_pass])->find();

      if (sizeof($registros) == 0) {
         $mensaje = 'ERROR##INVALID##DATA';
      } else {
         if ($registros[0]["tipo_usuario"] == "CLIENTE") {
            $mensaje = 'NOT##ACCESS';
         } else if ($registros[0]["estado"] == "PENDIENTE") {
            $mensaje = 'NOT##STATUS';
         } else {
            unset($registros[0]['password']);

            $this->session->set($registros[0]);
            $mensaje = 'OK##DATA##LOGIN';
         }
      }
      echo $mensaje;
   }

   public function validarDatosIngresoMovil()
   {
      $valor_email = $this->request->getPostGet('email');
      $valor_pass = md5($this->request->getPostGet('password'));

      $usuarios_db = new UsuariosModel();
      $registros = $usuarios_db->where(['email' => $valor_email, 'password' => $valor_pass])->find();

      if (sizeof($registros) == 0) {
         $mensaje = 'ERROR##INVALID##DATA';
      } else {
         if ($registros[0]["tipo_usuario"] != "CLIENTE") {
            $mensaje = 'NOT##ACCESS';
         } else if ($registros[0]["estado"] == "INACTIVO") {
            $mensaje = 'NOT##STATUS';
         } else {
            $mensaje = 'OK##DATA##LOGIN#&&#' . $registros[0]["id"] . "##" . $registros[0]["email"] . "##" . $registros[0]["documento"] . "##" . $registros[0]["nombres"] . "##" . $registros[0]["apellidos"] . "##" . $registros[0]["id_ciudad"] . "##" . $registros[0]["direccion"] . "##" . $registros[0]["telefono"] . "##" . $registros[0]["genero"] . "##" . $registros[0]["avatar"];
         }

      }
      echo $mensaje;
   }

   public function cargarVistaInicio()
   {
      if ($this->session->has("tipo_usuario")) {
         echo view('template/header');
         echo view('ModuloUsuarios/perfil');
         echo view('template/footer');
      } else {
         return view('login');
      }
   }

   public function cerrarSession()
   {
      $this->session->destroy();
      header("Location:" . base_url());
      die();
   }

   public function getCiudades()
   {
      $valor_departamento = $this->request->getPostGet('departamento');
      $ciudades_db = new CiudadesModel();
      $registros = $ciudades_db->where(["id_departamento" => $valor_departamento]);
      $registros = $ciudades_db->orderBy("nombre", "ASC")->findAll();

      echo json_encode($registros);
   }

   public function RegistrarVendedor()
   {
      $departamentos_db = new DepartamentosModel();

      $registros['departamentos'] = $departamentos_db->select()->findAll();
      echo view('registrar_vendedor', $registros);
   }

   public function InsertarVendedor()
   {
      $email = $this->request->getPostGet('email');
      $documento = $this->request->getPostGet('documento');
      $nombres = $this->request->getPostGet('nombres');
      $apellidos = $this->request->getPostGet('apellidos');
      $direccion = $this->request->getPostGet('direccion');
      $telefono = $this->request->getPostGet('telefono');
      $genero = $this->request->getPostGet('genero');
      $ciudad = $this->request->getPostGet('ciudad');
      $password = $this->request->getPostGet('password');
      $n_especializacion = $this->request->getPostGet('n_especializacion');
      $descripcion = $this->request->getPostGet('descripcion');

      $loQueVaAVender = $this->request->getPostGet('loQueVaAVender');

      $tipo_usuario = "";
      if ($loQueVaAVender == 'Productos') {
         $tipo_usuario = "VENDEDOR";

         // Creando usuario
         $usuarios = new UsuariosModel();
         $consulta = $usuarios->where(['documento' => $documento])->find();
         if (sizeof($consulta) > 0) {
            $mensaje = "FAIL#DOCUMENTO";
         } else {
            $consulta = $usuarios->where(['email' => $email])->find();
            if (sizeof($consulta) > 0) {
               $mensaje = "FAIL#EMAIL";
            } else {
               $registros = $usuarios->insert([
                  'email' => $email, 'password' => md5($password), 'documento' => $documento, 'nombres' => $nombres, 'apellidos' => $apellidos, 'id_ciudad' => $ciudad, 'direccion' => $direccion,
                  'telefono' => $telefono, 'genero' => $genero, 'avatar' => 'avatar.png', 'tipo_usuario' => $tipo_usuario,
               ]);

               if ($registros) {
                  $mensaje = "OK#CORRECT#DATA";
               } else {
                  $mensaje = "OK#INVALID#DATA";
               }
            }
         }

      } else if ($loQueVaAVender == 'Productos y Servicios' || $loQueVaAVender == 'Servicios') {
         $tipo_usuario = "VENDEDOR_ESPECIALISTA";

         date_default_timezone_set('America/Bogota');

         $extension = explode(".", $_FILES['foto_certificado']['name']);
         $extension = strtolower($extension[sizeof($extension) - 1]);
         $nombre_certificado = date("d-m-Y_h_i_s_") . $documento . '.' . $extension;

         if (in_array($extension, array('png', 'jpg', 'jpeg', 'PNG', 'JPG', 'JPEG'))) {
            $file = $this->request->getFiles()['foto_certificado'];

            if ($file->isValid() && !$file->hasMoved()) {

               // Creando usuario
               $usuarios = new UsuariosModel();
               $consulta = $usuarios->where(['documento' => $documento])->find();
               if (sizeof($consulta) > 0) {
                  $mensaje = "FAIL#DOCUMENTO";
               } else {
                  $consulta = $usuarios->where(['email' => $email])->find();
                  if (sizeof($consulta) > 0) {
                     $mensaje = "FAIL#EMAIL";
                  } else {

                     $registros = $usuarios->insert([
                        'email' => $email, 'password' => md5($password), 'documento' => $documento, 'nombres' => $nombres, 'apellidos' => $apellidos, 'id_ciudad' => $ciudad, 'direccion' => $direccion,
                        'telefono' => $telefono, 'genero' => $genero, 'avatar' => 'avatar_default.png', 'tipo_usuario' => $tipo_usuario, 'estado' => 'PENDIENTE',
                     ]);

                     if ($registros) {

                        // Creando especializacion||
                        $db_especializacion = new EspecializacionModel();
                        $db_especializacion->insert([
                           'nombre' => $n_especializacion,
                           'descripcion' => $descripcion,
                           'id_usuario' => $usuarios->getInsertID(),
                        ]);

                        $db_certificados = new CertificadosModel();
                        $db_certificados->insert([
                           'certificado' => $nombre_certificado,
                           'id_especializacion' => $db_especializacion->getInsertID(),
                        ]);

                        // Subiendo foto al servidor
                        $file->move('./public/dist/img/certificados/', $nombre_certificado);

                        $mensaje = "OK#CORRECT#DATA";
                     } else {
                        $mensaje = "OK#INVALID#DATA";
                     }
                  }
               }
            } else {
               $mensaje = "ERROR#SUBIENDO#CERTIFICADO";
            }
         } else {
            $mensaje = "ERROR#TIPO#INCORRECTO";
         }
      }

      echo $mensaje;
   }
}
