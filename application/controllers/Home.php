<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	function __construct(){
	
		parent::__construct();
		
		//Help padrão do CondeIgniter
		$this->load->helper('url');
		
		//Biblioteca de validação de formulário
		$this->load->library('form_validation');
		
		//Help de formulário
		$this->load->helper('form');
		
		//Definição do padrão de data dateTimeZone
		date_default_timezone_set('America/Sao_Paulo');
	}
	
	//Função para direcionar para tela de login.php
	public function index(){
		$this->load->helper(array('form'));
		$this->load->view('view_login');
	}
	
	public function loginponto(){
		$this->load->helper(array('form'));
		$this->load->view('view_login');
	}
}
