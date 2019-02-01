<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Access extends CI_Controller {
	function __construct() {
		parent :: __construct();
		$this->load->model('Accesos_model');
	}

	function _load_layout($template){
		$this->load->view('plantilla/header');
		$this->load->view($template);
    //$this->load->view('plantilla/footer');
	}

	public function index(){
		redirect('/');
	}
	
	public function in(){
		$data['actividades']=$this->Accesos_model->get_actividades();
		$this->load->vars($data);
		$this->_load_layout('access/login',$data);
	}

	public function new_access(){

		$matricula = $_POST['matricula'];
		$idAlumno = $this->Accesos_model->get_idAlumno($matricula);
		
		if ($idAlumno<1) {
			die('User not found');
		}

		$data['idAccesos'] = NULL;
		$data['Persona'] = $idAlumno;
		$data['Actividad'] = $_POST['accion'];
		$data['Fecha'] = date('Y-m-d');
		$data['Entrada'] = date('H:i:s');
		$data['Salida'] = '00:00:00';
		$data['Tiempo'] = '00:00:00';
		$id = $this->Accesos_model->new_registro($data);
		echo 'ok';

	}

	public function out(){
		$this->_load_layout('access/logout');

	}

	public function logout(){
		$matricula = $_POST['matricula'];
		$idPersona = $this->Accesos_model->get_idAlumno($matricula);
		if ($idPersona<1) {
			die('User dont Found');
		}
		$ultimoAcceso = $this->Accesos_model->get_last_login($idPersona);
		if ($ultimoAcceso<1) {
			die('Dont have open session');
		}

		$res = $this->Accesos_model->registrar_salida($ultimoAcceso);

		//echo $res;
		echo $res;
	}

	public function adm(){
		$this->_load_layout('access/adm');
	}

	public function go(){
		$res = $this->Accesos_model->get_hash_adm($_POST['user']);
		if (password_verify($_POST['password'],$res['Password'])) {
			$_SESSION['IdAdm']=$res['IdAdm'];
			redirect('/adm');
		}
		else{
			redirect('/');
		}
	}

	public function exit(){
		session_destroy();
		redirect('/');
	}
}
?>