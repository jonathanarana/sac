<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {
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
		$this->_load_layout('welcome');
	}
	

}
?>