<?php
/*
 * Companies drivers, driven by luna control center,
 * This is a premium feature probably rolled out for special companies.
 */

 class Company extends CI_Controller {
	public function index() 
	
	{
		echo 'company home';
		
	}
	
	private function u () 
	{
		$data['main'] = 'paged';
		$data['title'] = 'Company | Scrobber Luna Version';
		$data['keywords'] = '';
		$data['description'] = '';
		$this -> load -> view('beta/loader', $data);
	}
	
	public function home() {

		$data['main'] = 'index';
		$data['title'] = 'Scrobber Beta Version';
		$data['keywords'] = '';
		$data['description'] = '';
		$this -> db -> where('status', '1');
		$this -> db -> or_where('status', '3');
		$this -> db -> order_by('name', 'asc');
		$this -> db -> limit('6');
		$data['item'] = $this -> db -> get('item');
		$this -> load -> view('beta/loader', $data);

	}

	

 }
 
?>