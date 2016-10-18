<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Autentica extends CI_Controller {
	//Contrutor
	function __construct(){
		parent::__construct();
		
		//Carregar a model usuario, busca os dados do banco para validar através do controller
		$this->load->model('model_usuario', TRUE);
		$this->load->helper('url');
	}
	
	function index(){
		$this->load->library('form_validation');
		
		$this->form_validation->set_message('required', 'Campo %s obrigatório');
		$this->form_validation->set_rules('email', 'E-mail ou Usuário', 'trim|required');
		$this->form_validation->set_rules('password', 'Senha', 'trim|required|callback_check_database');
	
	
		if($this->form_validation->run() == FALSE){
			
		}else{
			
		}
	
	}
}