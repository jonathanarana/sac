<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Adm extends CI_Controller {
	function __construct() {
		parent :: __construct();
		if ($this->session->userdata('IdAdm')<1) {
			redirect('/');
		}
    	$this->load->model('Reportes_model');	
	}

	function _load_layout($template){
		$this->load->view('plantilla/header');
		$this->load->view('plantilla/nav');	
		$this->load->view($template);
		//$this->load->view('plantilla/footer');
	}

	public function index(){
		$data['nusers']=$this->Reportes_model->get_nusers();
		$this->load->vars($data);
		$this->_load_layout('adm/main_adm.php',$data);
	}

	public function lista(){
		$data['lusers']=$this->Reportes_model->get_lusers();
		$this->load->vars($data);
		$this->_load_layout('adm/lista_adm.php',$data);		
	}

	public function buscar($matricula="0",$inicio="0",$fin="0"){
		$data['matricula']=$matricula;
		$data['inicio']=$inicio;
		$data['fin']=$fin;
		$data['summary']=$this->Reportes_model->get_summary($matricula,$inicio,$fin);
		
		$this->load->vars($data);
		$this->_load_layout('adm/search_adm.php',$data);		
	}
}
?>