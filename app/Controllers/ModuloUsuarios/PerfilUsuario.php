<?php namespace App\Controllers\ModuloUsuarios;

use CodeIgniter\Controller;
use App\Controllers\BaseController;
use App\Models\UsuariosModel;
use App\Models\CiudadesModel;
use App\Models\DepartamentosModel;

class PerfilUsuario extends BaseController {

	public function index(){
		$this->departamento = new DepartamentosModel();
		$departamentos_sql= $this->departamento->select('*')->findAll();
		$departamentos =['departamentos' => $departamentos_sql];


		$data['modulo_selected'] = "Usuarios";
		$data['opcion_selected'] = "PerfilUsuario";
        
		echo view('template/header', $data);
		echo view('ModuloUsuarios/perfil_usuario', $departamentos);
		echo view('template/footer');
	}

	public function buscar_session(){
		$usuarios = new UsuariosModel();
		$doc = $this->request->getPostGet('doc');
		$data = $usuarios->where('id',$doc)->find();

		if ($data) {
	    echo json_encode($data);
		   
	   } else {
		   echo json_encode('error');
	   
	   }
	}
	public function getCiudades()
    {
        $valor_departamento = $this->request->getPostGet('departamento');
        $ciudades_db = new CiudadesModel();
        $registros = $ciudades_db->where(["id_departamento" => $valor_departamento]);
        $registros = $ciudades_db->findAll();

        echo json_encode($registros);
    }

}   
