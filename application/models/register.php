<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
date_default_timezone_set('America/Los_Angeles');
class Register extends CI_Model {
	
	function __construct() {
		parent::__construct();
		$this->load->library("form_validation");
	}

	function get_all_users(){
		return $this->db->query("SELECT * FROM users")->result_array();
	}

	function get_user_by_email($email){
		return $this->db->query("SELECT * FROM users where email=?", array($email))->row_array();
	}

	function add_user($info){
		$this->form_validation->set_rules("email", "Email", "trim|required|valid_email|is_unique[users.email]");//email rules
		if($this->form_validation->run()===FALSE){//if any requirements fail
			$this->session->set_flashdata('bademail', "You have either a lousy email or it's already been taken.");//set flashdata
			return FALSE;//return false to the controller
		}
		$this->form_validation->set_rules("password", "password", "trim|required|min_length[8]|matches[conpassword]");	//password rules
		if($this->form_validation->run()===FALSE){//if any requirements fail
			$this->session->set_flashdata('badpassword', "Be sure your password is at least 8 characters long and matches the confirmation field.");//set flashdata
			return FALSE;//return false to the controller
		}	
		else {
		$salt = bin2hex(openssl_random_pseudo_bytes(22));
		$enc_password=md5($info['password'] . '' . $salt);
		$query = "INSERT INTO users(first_name, last_name, email, password, created_at, updated_at, salt) values (?,?,?,'$enc_password', '$salt', NOW(), NOW())";
		$values = array($info['first_name'], $info['last_name'], $info['email']);
		return $this->db->query($query, $values);
		}
	}


}