<?php
/*
 * Regions contloller
 */
class Hood extends CI_Controller {
		public function index() {
		$this -> db -> where('hood_ext', $this->uri->segment('4'));
		$this -> db -> or_where('hood_id', $this->uri->segment('4'));
		$data['item_query'] = $this -> db -> get('hoods');
		$data['main'] = 'city';
		$data['lmain'] = 'hood';
		$data['title'] = 'Browse by Hoods';
		$this -> load -> view('main/loader', $data);
	}
	
}

?>
