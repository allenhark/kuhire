<?php
/*
 * Country controllers.
 */
class Country extends CI_Controller{
	
		public function index() {
		$this -> db -> where('country_ext', $this->uri->segment('4'));
		$this -> db -> or_where('country_id', $this->uri->segment('4'));
		$data['item_query'] = $this -> db -> get('countries');
		$data['main'] = 'country';
		$data['title'] = 'Browse by Regions';
		$this -> load -> view('main/loader', $data);
	}
	
	
}
?>