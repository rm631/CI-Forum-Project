<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Message extends CI_Controller {
	
	/* 
		loads the post view if logged in
		redirects to /user/login if not
	*/
	public function index() {
		$loggedin = $this->session->userdata("username");
		
		if($loggedin != null) {
			$this->load->view('Post');
		} else {
			redirect('/user/login');
		}
	}
	
	/*
		If logged in, a typed message and session data
		is passed into Messages_model->insertMessage function
		If not logged in, the page redirects to /user/login
	*/
	public function doPost() {
		$loggedin = $this->session->userdata("username");
		
		if($loggedin != null) {
			$this->load->model('Messages_model');
			
			$username = $this->session->userdata("username");
			$message = $this->input->post('Message');
			
			$this->Messages_model->insertMessage($username, $message);
			
			redirect('/user/view/'.$username);
		} else {
			redirect('/user/login');
		}
	}
	
}
