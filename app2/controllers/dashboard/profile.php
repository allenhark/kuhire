<?php

class Profile extends CI_Controller {

	public function index () {
		$data ['main'] = 'profile';
		$data['title'] = 'My Profile';
		$this->db->where ('user_id', '1');
       $data ['query'] = $this->db->get('user');    
       $this->load->view('dashboard/loader', $data);
	}

	public function update () {
		echo 'we got something here';
	}
}

?>