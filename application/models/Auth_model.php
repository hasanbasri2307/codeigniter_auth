<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth_model extends MY_Model {

	private $table;
	private $field_username;
	private $field_password;

	public function __construct(){
		$this->config->load('auth_config');
		parent::__construct($this->config->item("table_name"));
		
		$this->table = $this->config->item("table_name");
		$this->field_username = $this->config->item("field_username");
		$this->field_password = $this->config->item("field_password");
		
	}

	public function getAuth($username,$password){
		try {
			//check available username
			if($this->checkUsername($username) == 0){
				return false;
			}

			if($this->checkPassword($password) == 0){
				return false;
			}

			$this->db->where($this->field_username,$username);
			$this->db->where($this->field_password,$password);
			$query = $this->db->get($this->table)->row_array();
			
			return $query;

		} catch (Exception $e) {
			return false;
		}
	}

	private function checkUsername($username){
		try {
			$this->db->where($this->field_username,$username);
			$query = $this->db->count_all_results($this->table);
		} catch (Exception $e) {
			return false;
		}

		return $query;
	}

	private function checkPassword($password){
		try {
			$this->db->where($this->field_password,$password);
			$query = $this->db->count_all_results($this->table);
		} catch (Exception $e) {
			return false;
		}

		return $query;
	}

}

/* End of file Auth_model.php */
/* Location: ./application/models/Auth_model.php */