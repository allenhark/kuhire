<?php

	class Add extends CI_Controller {

		public function index () {
			$data ['main'] = 'new';
			$data ['title'] = 'Add new Item';
			
			$this->load->view('dashboard/loader', $data);
		}

		public function item_add () {			
        	$this->form_validation->set_rules('location', 'Location', 'required');
        	$this->form_validation->set_rules('desc', 'Description', 'required');
        	$this->form_validation->set_rules('name', "Item Name", 'required');
        	$this->form_validation->set_rules('category', 'Product Category', 'required');
        	$this->form_validation->set_rules('price', 'Price', 'required');
        	if ($this -> form_validation -> run() == FALSE) {
        		$data ['main'] = 'new';
			$data ['title'] = 'Add new Item';
			
			$this->load->view('dashboard/loader', $data);
		}else {
			//array form data
			$postdata  = array (
				'name' => $_POST['name'],
				'tags' => $_POST['tags'],
				'location' => $_POST['location'],
				'item_cat' => $_POST['category'],
				'item_price' => $_POST['price'],
				'item_availability' => $_POST['avalilability']

				);
			echo 'we get all data here';

		}
	}

		public function draft () {
			
		}

	}


?>