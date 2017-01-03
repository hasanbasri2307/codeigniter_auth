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

			$this->db->where($this->field_username,$username);
			$query = $this->db->get($this->table);

			if($query->num_rows() > 0){
				$data = $query->row_array();
				if($data[$this->field_password] != $password){
					return false;
				}

				return $data;
			}

			return false;

		} catch (Exception $e) {
			return false;
		}
	}

}

/* End of file Auth_model.php */
/* Location: ./application/models/Auth_model.php */