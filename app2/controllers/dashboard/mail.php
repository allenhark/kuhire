<?php

class Mail extends CI_Controller {

	public function index () {
		$data ['main'] = 'msg';
		$data ['title'] = 'MailBox';
		$this->db->where ('reciever_id', $this -> session -> userdata('user_id'));
			$data ['query'] = $this->db->get('msg_server');
		$this->load->view('dashboard/loader', $data);
	}

	public function view () {
		$data['main'] ='msg_view';
		$data['title'] = 'Inbox';
		$this->db->where ('msg_id', $this->uri->segment(4));
        $data ['query'] = $this->db->get('msg_server');
		$this->load->view('dashboard/loader', $data);

	}

	public function reply () {
		echo 'We will reply shortly';
	}

	public function delete () {
		$this->db->where ('msg_id', $this->uri->segment(4));
		$update = array ('status' => '4');
    	$this->db->where('msg_id', $this->uri->segment(4));
    	$this->db->update('msg_server', $update);
		redirect ('dashboard/mail');
	}
}
?>