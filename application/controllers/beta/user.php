<?php

class User extends CI_Controller {
	
	public function __construct() {
        parent::__construct();	
		
    }
 
	public function index () {
		$ta = $this->session->userdata('user_id');
		if ($ta == NULL):
			redirect('beta/home/login');
		endif;
		$data['main'] = 'dashboard';
		$data['title'] = 'Dashboard | Scrobber Beta Version';
		$data['keywords'] = '';
		$data['description'] = '';
		$this->db->where('user_id', $this->session->userdata('user_id'));		
		$data['user'] =$this->db->get('user');
		
		$this->load->view('beta/loader', $data);
	}
	
	public function products () {
		$ta = $this->session->userdata('user_id');
		if ($ta == NULL):
			redirect('beta/home/login');
		endif;
				
		$data['main'] = 'products';
		$data['title'] = 'Products | Scrobber Beta Version';
		$data['keywords'] = '';
		$data['description'] = '';
		$this->db->where('user_id', $this->session->userdata('user_id'));		
		$data['user'] =$this->db->get('user');
		
		$this->load->view('beta/loader', $data);
	}
	
	public function profile () {
		$ta = $this->session->userdata('user_id');
		if ($ta == NULL):
			redirect('beta/home/login');
		endif;
				
		$data['main'] = 'profile';
		$data['title'] = 'Profile | Scrobber Beta Version';
		$data['keywords'] = '';
		$data['description'] = '';
		$this->db->where('user_id', $this->session->userdata('user_id'));		
		$data['user'] =$this->db->get('user');
		
		$this->load->view('beta/loader', $data);
		
	}
	
	
	public function confirmation () {
		$ta = $this->session->userdata('user_id');
		if ($ta == NULL):
			redirect('beta/home/login');
		endif;
		
		$data['main'] = 'confirmation';
		$data['title'] = 'Profile confirmation | Scrobber Beta Version';
		$data['keywords'] = '';
		$data['description'] = '';
		$this->db->where('user_id', $this->session->userdata('user_id'));		
		$data['user'] =$this->db->get('user');
		
		$this->load->view('beta/loader', $data);
		
	}
	
	public function img_reset () {
		$ta = $this->session->userdata('user_id');
		if ($ta == NULL):
			redirect('beta/home/login');
		endif;
		
		$data= array ('avator' => 'user-thumb.jpg');
		$this->db->where('user_id', $this->session->userdata('user_id'));
		$this->db->update('user', $data);
		
		$this->index();
	}
	
	public function img () {
		$ta = $this->session->userdata('user_id');
		if ($ta == NULL):
			redirect('beta/home/login');
		endif;
		
	}
	
	public function payment () {
		$ta = $this->session->userdata('user_id');
		if ($ta == NULL):
			redirect('beta/home/login');
		endif;
		
		$data['main'] = 'payments';
		$data['title'] = 'Payments Log | Scrobber Beta Version';
		$data['keywords'] = '';
		$data['description'] = '';
		$this->db->where('user_id', $this->session->userdata('user_id'));		
		$data['user'] =$this->db->get('user');
		
		$this->load->view('beta/loader', $data);
	}
	
	public function wizz () {
		$ta = $this->session->userdata('user_id');
		if ($ta == NULL):
			redirect('beta/home/login');
		endif;
		
		if($this->uri->segment('4') == NULL | $this->uri->segment('4') == 'step1'):	
			
			$this -> form_validation -> set_rules('first_name', 'First Name', 'required|trim');
			$this -> form_validation -> set_rules('last_name', 'Last Name', 'trim|required');
			$this -> form_validation -> set_rules('phone', 'Phone Number', 'trim|required');
			$this -> form_validation -> set_rules('email', 'Email Address', 'trim|required');
			$this -> form_validation -> set_rules('id_no', 'ID Nunber', 'trim|required');
			$this -> form_validation -> set_rules('location', 'Location', 'trim|required');
			$this -> form_validation -> set_error_delimiters('<div class="error">', '</div>');
	
			if ($this -> form_validation -> run() == FALSE) {
				
					$data['main'] = 'wizz';
					$data['title'] = 'Profile Wizzard Step1 | Scrobber Beta Version';
					$data['keywords'] = '';
					$data['description'] = '';
					$this->db->where('user_id', $this->session->userdata('user_id'));		
					$data['user'] =$this->db->get('user');
					
					$this->load->view('beta/loader', $data);
				} else {
					$data = array (
						'first_name' => $_POST['first_name'],
						'last_name' => $_POST['last_name'],
						'id_no' => $_POST['id_no'],
						'location' => $_POST['location'],
						'email' => $_POST['email'],
						'phone' => $_POST['phone']
					);
					
					$this->db->where('user_id', $this->session->userdata('user_id'));
					$this->db->update('user', $data);
					
					redirect(base_url('beta/user/wizz/step2'));
					
				}	
			
		elseif($this->uri->segment('4') == 'step2'):
			if($_POST != NULL):
				
					$data = array (
						'city' => $_POST['city'],
						'country' => $_POST['country'],
						'currency' => $_POST['currency'],
						'sign' => $_POST['sign'],
						'lang' => $_POST['language']
					);
					
					$this->db->where('user_id', $this->session->userdata('user_id'));
					$this->db->update('user', $data);
					
					redirect(base_url('beta/user/wizz/step3'));
			else:	
			$data['main'] = 'wizz';
			$data['title'] = 'Profile Wizzard Step2 | Scrobber Beta Version';
			$data['keywords'] = '';
			$data['description'] = '';
			$this->db->where('user_id', $this->session->userdata('user_id'));		
			$data['user'] =$this->db->get('user');
			
			$this->load->view('beta/loader', $data);
			endif;
			
		elseif ($this->uri->segment('4') == 'step3'):
			if($_POST != NULL):
				
					$data = array (
						'facebook' => $_POST['facebook'],
						'twitter' => $_POST['twitter'],
						'plus' => $_POST['plus'],
						'skype' => $_POST['skype']						
					);
					
					$this->db->where('user_id', $this->session->userdata('user_id'));
					$this->db->update('user', $data);
					echo 'Done';
					redirect(base_url('beta/user/'));
			else:	
				
				$data['main'] = 'wizz';
				$data['title'] = 'Profile Wizzard Step3 | Scrobber Beta Version';
				$data['keywords'] = '';
				$data['description'] = '';
				$this->db->where('user_id', $this->session->userdata('user_id'));		
				$data['user'] =$this->db->get('user');
				
				$this->load->view('beta/loader', $data);
				
			endif;
		endif;
		
		}

		public function username () {
				
			$this->form_validation->set_rules('username', 'Username', 'required|min_length[4]|max_length[12]|is_unique[user.username]');
			if ($this->form_validation->run() == FALSE)
				{
					$data['main'] = 'wizz';
					$data['title'] = 'Profile Wizzard Create Username | Scrobber Beta Version';
					$data['keywords'] = '';
					$data['description'] = '';
					$this->db->where('user_id', $this->session->userdata('user_id'));		
					$data['user'] =$this->db->get('user');
					
					$this->load->view('beta/loader', $data);
				}
			else 
				{
					$data = array ('username'=> $_POST['username']);
				$this->db->where('user_id', $this->session->userdata('user_id'));
				$this->db->update('user', $data);
				
				redirect(base_url('beta/user/wizz/'));
				}
			
		}
		
	
	public function inbox () {
		$ta = $this->session->userdata('user_id');
		if ($ta == NULL):
			redirect('beta/home/login');
		endif;
				
		$data['main'] = 'inbox';
		$data['title'] = 'Inbox | Scrobber Beta Version';
		$data['keywords'] = '';
		$data['description'] = '';
		$this->db->where('user_id', $this->session->userdata('user_id'));		
		$data['user'] =$this->db->get('user');
		
		$this->load->view('beta/loader', $data);
		
	}
	
		public function security () {
		$ta = $this->session->userdata('user_id');
		if ($ta == NULL):
			redirect('beta/home/login');
		endif;
				
		$data['main'] = 'security';
		$data['title'] = 'Security Setting | Scrobber Beta Version';
		$data['keywords'] = '';
		$data['description'] = '';
		$this->db->where('user_id', $this->session->userdata('user_id'));		
		$data['user'] =$this->db->get('user');
		
		$this->load->view('beta/loader', $data);
	}
	
	public function edit () {
		$ta = $this->session->userdata('user_id');
		if ($ta == NULL):
			redirect('beta/home/login');
		endif;
				
		// Editing existing products
		$this -> form_validation -> set_rules('name', 'Item Name', 'trim|required|min_length[3]|max_length[60]');
		$this -> form_validation -> set_rules('price', 'Item Price', 'trim|required');
		$this -> form_validation -> set_rules('location', 'Item Location', 'trim|required');
		$this -> form_validation -> set_rules('category', 'Item Category', 'trim|required');
		$this -> form_validation -> set_rules('availability', 'Item Availability', 'required|trim');
		$this -> form_validation -> set_rules('desc', 'Item Description', 'trim|required');
		$this -> form_validation -> set_error_delimiters('<div class="alert-warning">', '</div>');

		if ($this -> form_validation -> run() == FALSE) {
			$data['main'] = 'edit';
			$data['title'] = 'Edit Product | Scrobber beta';
			$data['keywords'] = '';
			$data['description'] = '';
			$data['p'] = $this->get_edit();
			$this -> load -> view('beta/loader', $data);

		} Else {
			function do_upload() {
				if (is_dir(APPPATH . 'images/')) {
					// echo "there is directory <br/>";
					chmod(APPPATH . 'images/', 0777);
				} else
					echo "<br>there is no directory</br>";
			}

			$config['upload_path'] = APPPATH . 'images/';
			$config['allowed_types'] = 'gif|jpg|png';
			$config['max_size'] = '10000';
			$config['max_width'] = '1024';
			$config['max_height'] = '768';

			$this -> upload -> initialize($config);
			if (!$this -> upload -> do_upload()) {

				$error = array('error' => $this -> upload -> display_errors());

				echo $this -> upload -> display_errors();

				ECHO APPPATH . 'images/';
			} else {
				$image_data = $this -> upload -> data();
				
				$data = array(
				'name' => $_POST['name'],
				'tags' => $_POST['tags'], 
				'desc' => $_POST['desc'], 
				'image' => $image_data['file_name'], 
				'item_cat' => $_POST['category'], 
				'item_price' => $_POST['price'], 
				'hire_availabity' => $_POST['availability'], 
				'location' => $_POST['location'], 
				'country' => 'Kenya', 
				'item_owner' => $this -> session -> userdata('user_id'),
				'sess' => $_POST['sess']
				);

				$this -> db -> insert('item', $data);
				
				
				
				if($this->session->userdata('logged_in')):
					$this->db->where('item_owner', $this->session->userdata('user_id'));
					$this->db->order_by('item_id', 'desc');
					$this->db->limit('1');
					$user = $this->db->get('item');
					foreach ($user ->result() as $us):
					
					redirect(base_url('beta/home/pay/'.$us->item_id), 'refresh', 300);
						echo 'Item Added, you will be redirected shortly. <a href="'.base_url('beta/home/pay/'.$us->item_id).'"> Click Here If your Browser Cannot redirect </a> ';
					endforeach;
				else:
					echo 'Item Added, you will be redirected shortly. <a href="'.base_url('beta/home/steps/'.$_POST['sess']).'"> Click Here If your Browser Cannot redirect </a> ';
					redirect(base_url('beta/home/steps/'.$_POST['sess']), 'refresh', 300);
				endif;
			}

		}
	}

	function get_edit () {

		$this->db->where('item_id', $this->uri->segment(4));
		$this->db->where('item_owner', $this->session->userdata('user_id'));
		$p = $this->db->get('item');
		if($p->num_rows == 0):			
			echo "Error Illegal Operation! You are not allowed to perform that action. Call +254 734 191 017 for assistance";
			exit();
		else:			
			return $p;
		endif;
	}
	

}

 

?>
