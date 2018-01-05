<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Search extends CI_Controller {
	
	// Index displays the Search view
	public function index() {
		$this->load->view('Search');
	}
	
	// View all posts by $name
	public function view($name) {
		$this->load->model('Messages_model');
		$data = $this->Messages_model->getMessagesByPoster($name);
		
		if(count($data) == 0) { echo "No rows found"; return; }
		
		$viewData = array("results" => $data); // data for the view
		$this->load->view('ViewMessages', $viewData);
	}
	
	/*
		Uses GET to grab the input search terms
		Passes them into Messages_model->searchMessages()
		passes the array of results into ViewMessages view
	*/
	public function dosearch() {
		$this->load->model('Messages_model');
		
		$searchString = $this->input->get('Search');
		$data = $this->Messages_model->searchMessages($searchString);
		
		if(count($data) == 0) { echo "No rows found"; return; }
		
		$viewData = array(
				"search" => true,
				"results" => $data
				);
				
		$this->load->view('ViewMessages', $viewData);
	}
	
}
