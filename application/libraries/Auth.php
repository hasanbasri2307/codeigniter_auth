<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth {
	
	private $ci;

	public function __construct()
	{
		$this->ci = & get_instance();
		$this->ci->load->model('Auth_model');
	}

	public function login($username,$password){
		$login = $this->ci->Auth_model->getAuth($username,$password);
		if($login != false){
			if(!empty($login)){
				$this->ci->session->set_userdata('is_login',1);
				$this->ci->session->set_userdata('userdata',$login);
			}

			return true;
		}

		return false;
	}

	public function logout(){
		$this->ci->session->unset_userdata('is_login');
		$this->ci->session->unset_userdata('userdata');
		return true;
	}

	public function getUserInfo(){
		if(!empty($this->ci->session->userdata('is_login'))){
			return $this->ci->session->userdata('userdata');
		}

		return false;
	}

}

/* End of file Auth.php */
/* Location: ./application/libraries/Auth.php */