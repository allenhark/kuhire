<?php

class Roadblock extends CI_Controller {

public function index (){
	echo '<h1> acess denied.</h1><br> Php ware server at htt://cloud.telekenya.com:9906';
}

public function id () {
	
	$data ['title'] ="Warning, We require your id number";
	$data ['main'] = 'roadblock';
	$this->load->view('dashboard/header', $data);
	$this->load->view('dashboard/id');
}

public function iupdate() {
	$data =  array (
		'id_no' => $_POST['id']
		);
	$this->db->where('user_id', $this->session->userdata('user_id'));
	$this->db->update('user', $data);
	redirect(base_url('dashboard/home'));
}

}
?>