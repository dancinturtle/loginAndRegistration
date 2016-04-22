<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
date_default_timezone_set('America/Los_Angeles');

class Login extends CI_Model {

	function __construct() {
		parent::__construct();
		$this->load->library("form_validation");
		// $this->form_validation->set_rules("email", "Email", "trim|required|valid_email|");
		// if($this->form_validation->run()===FALSE){
		// 	$this->session->set_flashdata('bademail', "Unacceptable.");
		// 	redirect('/');
		// }
	}

function get_user_by_email($email){
		return $this->db->query("SELECT * FROM users where email=?", array($email))->row_array();
	}


}