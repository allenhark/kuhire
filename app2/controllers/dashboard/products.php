<?php

/*
 * Products controller
 * Functions
 * Product view
 * Product edit
 * Product delete
 * Hired stsatus update 
 */
 
class Products extends CI_Controller {

	public function index () {
		$data ['main'] = 'products';
		$data ['title'] = 'My Items';
		$this->db->where ('item_owner', $this->session->userdata('user_id'));
		$data ['query'] = $this->db->get('item');
		$this->load->view('dashboard/loader', $data);
	}
	
}

?>