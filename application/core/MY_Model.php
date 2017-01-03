<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MY_Model extends CI_Model {

	private $table;

	public function __construct($table){
		$this->table = $table;
		parent::__construct();
	}

	public function insertData($data){
		try {
			$this->db->insert($this->table,$data);
			if($this->db->affected_rows() > 0){
				return true;
			}else{
				return false;
			}

		} catch (Exception $e) {
			return false;
		}
	}

	public function updateData($data,$field,$value){
		try {
			$this->db->where($field,$value);
			$this->db->update($this->table,$data);

			if($this->db->affected_rows() > 0){
				return true;
			}else{
				return false;
			}
		} catch (Exception $e) {
			return false;
		}
	}

	public function selectData(){
		try {
			$query = $this->db->get($this->table);

			if($query->num_rows() > 0){
				$data = $query->row_array();
				return $data;
			}

			return false;

		} catch (Exception $e) {
			return false;
		}

		
	}

	public function selectById($field,$value){
		try {
			$this->db->where($field,$value);
			$query = $this->db->get($this->table);

			if($query->num_rows() > 0){
				$data = $query->row_array();
				return $data;
			}

			return false;

		} catch (Exception $e) {
			return false;
		}
	}

	public function deleteData($field,$value){
		try {
			$this->db->where($field,$value);
			$this->db->delete($this->table);

			if($this->db->affected_rows() > 0){
				return true;
			}else{
				return false;
			}

		} catch (Exception $e) {
			return false;
		}
	}

}

/* End of file MY_Model.php */
/* Location: ./application/core/MY_Model.php */