<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Autentica extends CI_Controller {
	//Contrutor
	function __construct(){
		parent::__construct();
		
		//Carregar a model usuario, busca os dados do banco para validar através do controller
		$this->load->model('model_usuario');
		$this->load->helper('url');
	}
	
	function index(){
		//$this->load->library('form_validation');
		
		$this->form_validation->set_message('required', 'Campo %s obrigatório');
		$this->form_validation->set_rules('email', 'E-mail ou Usuário', 'trim|required');
		$this->form_validation->set_rules('password', 'Senha', 'trim|required|callback_check_database');
	
	
		//Se a validação for false, o usuário irá permanecer na tela de login
		if($this->form_validation->run() == FALSE){
			$this->load->view('view_login');
		}else{
			//class controller home/função dashboard
			redirect('home/dashboard', 'refresh');
		}
	}
	
	function check_database($senha){
		$login = $this->input->post('email');
		var_dump($login);
		var_dump($senha);
		
		$result = $this->model_usuario->login($login, $senha);
		$usarioId = "";
		$usuarioNome = "";
		
		if($result){
			foreach ($result as $linha){
				$dados['usuarioId'] = $linha->id;
				$dados['usuarioNome'] = $linha->nome;
			}
			
		}else{
			$this->form_validation->set_message('check_database', 'Erro ao validar o banco/tabela usuário');
		}
	}
}