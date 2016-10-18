<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_usuario extends CI_Model{
	
	function login($email, $senha){
		$this->db->select('id', 'nome');
		$this->db->from('usuarios');
		$this->db->where('email', $email);
		$this->db->where('senha', $senha);
		$this->db->where('ativo', 1);
		$this->db->limit(1);
		
		$query = $this->db->get();
		
		if($query->num_rows() == 1){
			return $query->result();
		}else{
			return FALSE;
		}
	}
}