<?php

class Gallery extends CI_Controller {


	function index()
	{
		$this->load->view('dashboard/gallery', array('error' => ' ' ));
	}

	function do_upload()
	{
		 if(is_dir(APPPATH.'images/'))
  {
  // echo "there is directory <br/>";
   chmod(APPPATH.'images/',0777);
  }
  else echo "<br>there is no directory</br>";
  

		$config['upload_path'] =  APPPATH.'images/'; 
		$config['allowed_types'] = 'gif|jpg|png';
		$config['max_size'] = '10000';
		$config['max_width'] = '1024';
		$config['max_height'] = '768';
		
		$this->upload->initialize($config); 

		if ( ! $this->upload->do_upload())
		{
			echo file_get_contents($config['upload_path'].'test.txt');

			$error = array('error' => $this->upload->display_errors());
			$this->load->view('dashboard/gallery', $error);
		}
		else
		{
			$data = array('upload_data' => $this->upload->data());

			$this->load->view('dashboard/upload_success', $data);
		}
	}
}
?>