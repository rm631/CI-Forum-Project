<?php
class Messages_model extends CI_Model {
	
	public function __construct() { $this->load->database(); }
	
	// Searches Messages database, grabbing all posts by the passed username
	public function getMessagesByPoster($name) {
		$query = $this->db->order_by('posted_at', 'DESC')->get_where('Messages', array('user_username' => $name)
		);
			
		return $query->result_array();
	}
	
	// Search Messages database, based on passed string, return them as an array
	public function searchMessages($string) {
		$query = $this->db->order_by('posted_at', 'DESC')->like('text', $string);
		
		$query = $this->db->get("Messages");
		return $query->result_array();
	}
	/*
	public function getFollowedMessages($name) {
		$sql = "SELECT * FROM Messages 
			INNER JOIN Users ON Users.username = ?
			INNER JOIN Users ON User_Follows.follower_username = Users.username
			WHERE user_username = ?";
		$query = $this->db->query($sql);
		
		return $query->result_array();
	}
	*/
	
	
	// Inserts message into the database
	public function insertMessage($poster, $string) {
		// creates an array with the necessary data for a post
		$data = array(
			'user_username' => $poster,
			'text' => $string,
			'posted_at' => date('Y-m-d H:i:s') // gets the current time, as seen in the existing database entries
		);
		
		$this->db->insert("Messages", $data);
	}
	
}