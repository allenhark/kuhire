<?php 

class Contact extends CI_Controller{
	
		public function index() {
		$data['main'] = 'contact';
		$data['title'] = 'contact us';
		$this -> load -> view('main/loader', $data);
	}
}

?>