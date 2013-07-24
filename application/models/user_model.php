<?php

class User_model extends CI_Model{
	
	public function __construct() {
        parent::__construct();
		
	}

	function register ()
	{
		$email = $_POST['email'];
		$pass = $_POST['password'];

		$this->db->insert('user', $_POST);
		
		$this->notifications->sign_up ();
		$this->notifications->get_started_guide ();

	}

}
?>