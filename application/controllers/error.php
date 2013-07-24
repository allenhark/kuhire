<?php

/*
 * Defined errors contlorrer
 */
 
 class Error extends  CI_Controller {
 	
	public function index()
	{
		//$04 Error Page
		
		$this->load->view('404');
	}
	
 }
 
 ?>
