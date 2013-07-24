<?php

class View extends  CI_Controller {
	public function index() {
		$data['main'] = 'msg_view';
		$data['title'] = 'Inbox';
		$this -> db -> where('msg_id', $this -> uri -> segment(3));
		$data['query'] = $this -> db -> get('msg_server');
		$this -> load -> view('dashboard/loader', $data);

	}

	public function delete() {
		$this -> db -> where('msg_id', $this -> uri -> segment(4));
		$data['query'] = $this -> db -> get('msg_server');
		echo $this -> uri -> segment(4);
	}

	public function reply() {

	}

}
?>