<?php

class Max extends CI_Controller {

	public function index () {
		$string = read_file(APPPATH.'/FI.txt');
                $s = explode("\n", $string);
					print_r("<pre>");
					print_r($s);				
									
                
	}

	public function get () {
		if(!$_GET):
			$this->index ();
		else:
			$msg = "Hi there, am sorry am on leave right now. I took a vacation. Its kind of tiresome sitted here each day.";
			$data = array(
			'subject' => 'Am on leave',
			'message' => $msg,
			'priority' => 3,
			'thread_unique' =>  random_string('alnum', 16),
			'reciever' => $this->session->userdata('user_id')
			);
		$this->db->insert('sys_inbox', $data);
		endif;
	}
}

?>