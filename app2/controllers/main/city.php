<?php
class City extends CI_Controller{
	public function index() {
		$this -> db -> where('city_ext', $this->uri->segment('4'));
		$this -> db -> or_where('city_id', $this->uri->segment('4'));
		$data['item_query'] = $this -> db -> get('cities');
		$data['main'] = 'city';
		$data['lmain'] = 'city';
		$data['title'] = 'Browse by cities';
		$this -> load -> view('main/loader', $data);
	}
	
}
?>