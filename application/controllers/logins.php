<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Logins extends CI_Controller {
	public function __construct(){
		parent:: __construct();
		$this->load->model('Login');
	}

	public function index() {
		$this->session->set_flashdata('oops', "I'm sorry I wasn't listening, say that again?");
		redirect('/');
	}
	public function signin(){
		$info = array('userinfo'=>$this->session->userdata('loggedin'));
		$this->load->view('login', $info);
	}
	public function check(){//check if the user exists
		$exists = $this->Login->get_user_by_email($this->input->post('email'));
		if($exists){//if the email is there, check the password
			$userpassword = $this->input->post('password');
			if($exists['password']==md5($userpassword . ''. $exists['salt'])){//if the password matches
				$usersession = array(
					'id'=>$exists['id'],
					'first_name' => $exists['first_name'],
					'last_name' => $exists['last_name'],
					'email' => $exists['email'],
					'is_logged_in' => true
					);
				$this->session->set_userdata('loggedin', $usersession);
				redirect('/logins/signin');
			}
			else { //if the password doesn't match, send back to index with flashdata
				$this->session->set_flashdata('loginfail', "Sorry, you could not be logged in.");
				redirect('/');
			}
		}
		else {//else we'll have to redirect, flashdata of sorry, can't log in, redirect to index
			$this->session->set_flashdata('loginfail', "Sorry, you could not be logged in.");
			redirect('/');
		}
	}
	public function destroy(){
		$this->session->set_flashdata('destroy', "You have been logged off.");
		$this->session->sess_destroy();
		redirect('/');
	}


}
