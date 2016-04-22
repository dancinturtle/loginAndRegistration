<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Registers extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->model("Register");
	}

	public function index() {
		var_dump($this->input->post());
	}
	public function add(){
		$info = $this->input->post();
		$user_added = $this->Register->add_user($info);
		if($user_added){//if the user was successfully added, set their session
			$info['is_logged_in'] = true;
			$this->session->set_userdata('loggedin', $info);
			redirect('/logins/signin');
		}
		else {//if the user was not added
			if($this->session->flashdata('bademail')||$this->session->flashdata('badpassword')){//and if the flashdata from the validation checks were set
				redirect('/');
			}
			else{
				$this->session->set_flashdata('notregistered', 'Sorry, your registration failed.'); //something else failed, send them back to index with a generic flashdata
				redirect('/');
			}
		}
	}




}