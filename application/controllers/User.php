<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {
	
	// loads the login view
	public function login() {
		$this->load->view('Login');
	}
	
	/* 
		Checks the supplied username/password through post 
		Either sets the session data and redirects
		or redirects with an error
	*/
	public function doLogin() {
		$this->load->model('User_model');
		
		$username = $this->input->post('Username');
		$pass = $this->input->post('Password');
		$this->load->library('encrypt'); // loads the encryption libary needed in User_model
		$check = $this->User_model->checkLogin($username, $pass);
		
		if($check == true) {
			// if user/pass are correct, take the user to their page & set session variable
			$this->session->set_userdata("username", $username);
			$this->view($username);
		} else {
			// Redirect back to the login view, with an error message
			$data['error']="Error: Username and/or password were incorrect! Please try again.";
			$this->load->view('Login', $data);
		}
	}
	
	// Removes the session data and redirects to login page
	public function logout() {
		$this->session->unset_userdata("username");
		
		redirect('/user/login');
	}
	
	/*
		Loads the ViewMessages view with all the messages
		from the passed in username, using the Messages_model
		to retrieve them
	*/
	public function view($name) {
		$this->load->model('Messages_model');
		$data = $this->Messages_model->getMessagesByPoster($name);
		
		if(count($data) == 0) { echo "No rows found"; return; }
		
		$viewData = array("results" => $data); // data for the view
		$this->load->view('ViewMessages', $viewData);
	}
}
