<?php

namespace App\Controllers;

use App\Models\UsuariosModel;

class Administrador extends BaseController
{
	protected $usuarios;

	protected $reglas;

	public function __construct(){
		helper(['form']);

		$this->reglas = [
		  'documento' =>[
		    'rules'=>'required',
		    'errors'=>[
		      'required' => 'El campo {field} es obligatorio.'
		    ]
		  ], 
		  'nombres'=>[
		    'rules'=>'required',
		    'errors'=>[
		      'required' => 'El campo {field} es obligatorio.'
		    ]
		  ],
		  'apellidos'=>[
		    'rules'=>'required',
		    'errors'=>[
		      'required' => 'El campo {field} es obligatorio.'
		    ]
		  ],
		  'direccion'=>[
		    'rules'=>'required',
		    'errors'=>[
		      'required' => 'El campo {field} es obligatorio.'
		    ]
		  ],
		  'telefono'=>[
		    'rules'=>'required',
		    'errors'=>[
		      'required' => 'El campo {field} es obligatorio.'
		    ]
		  ],
		  'correo'=>[
		    'rules'=>'required',
		    'errors'=>[
		      'required' => 'El campo {field} es obligatorio.'
		    ]
		  ]
		];
	}

	
	public function index()
	{
		echo view('admin/header');
		echo view('admin/index');
		echo view('admin/footer');
	}

	public function nuevo()
    {
        echo view('admin/header');
        echo view('admin/nuevo');
        echo view('admin/footer');
    }
	

    public function insertar()
    {
		$email = $this->request->getPostGet('email');
        $documento = $this->request->getPostGet('documento');
        $nombres = $this->request->getPostGet('nombres');
		$apellidos = $this->request->getPostGet('apellidos');
		$direccion = $this->request->getPostGet('direccion');
		$telefono = $this->request->getPostGet('telefono');
		$genero = $this->request->getPostGet('genero');	

		$usuarios = new UsuariosModel();
		$registros = $usuarios->save(['email' => $email, 'password' => md5($documento), 'documento' => $documento, 'nombres' => $nombres, 'apellidos' => $apellidos, 'id_ciudad' => 1, 'direccion' => $direccion,
		'telefono' => $telefono, 'genero' => $genero, 'avatar' => 'avatar.png', 'tipo_usuario' => 'ADMINISTRADOR']);

		if ($registros) {
			$mensaje = "OK#CORRECT#DATA";
		} else {			
			$mensaje = "OK#INVALID#DATA";
		}
		echo $mensaje;
    }

}
