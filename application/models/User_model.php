<?php
class User_model extends CI_Model{
	
	public function __construct() { $this->load->database(); }
	
	public function getMessages($id) {
		$sql = 'SELECT id, text FROM Messages WHERE id = ? LIMIT 1';
			$query = $this->db->query($sql, array($id)
			);
		return $query->result_array();
	}
	
	// Checks the username and password, returns true if user/pass combo exists
	public function checkLogin($username, $pass) {
		// hash the password with sha1
		$hash = sha1($pass);
		
		// store the $username parameter and the sha1 password
		$data = array(
					'username' => $username,
					'password' => $hash
				);	
		
		$sql = "SELECT username From Users WHERE username = ? AND password = ? LIMIT 1";
			$query = $this->db->query($sql, $data
			);
			
		if($query -> num_rows() == 0) { // if query is empty..
			return false;
		} else{
			return true;
		}
	}
	
	public function isFollowing($follwer, $followed) {
		$isFollowing = $this->db->query();
	}
	
}