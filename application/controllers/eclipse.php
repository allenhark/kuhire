<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*
	Scrobber Eclipse,
	New advanced Scrobber

*/
	class Eclipse extends CI_Controller {

		public function index () 
		{
			$data['ad'] = $this->data->get_home_ad ();
			$data['main'] = 'index';
			$data['categories'] = $this->data->get_cat ();
			$data['recent'] = $this->data->get_home_rentals ();
			$this->load->view('eclipse/fast', $data);
		}

		public function register ()
		{
			$this -> form_validation -> set_rules('phone', 'Phone', 'trim|required|min_length[10]|max_length[12]|is_unique[user.phone]');
			$this -> form_validation -> set_rules('email', 'Your Email', 'trim|required|valid_email|is_unique[user.email]');
			$this -> form_validation -> set_rules('username', 'Username', 'trim|required|min_length[5]|max_length[12]|is_unique[user.username]');
			$this -> form_validation -> set_rules('first_name', 'First Name', 'required|min_length[3]|max_length[12]');
			$this -> form_validation -> set_rules('last_name', 'Last Name', 'required|min_length[3]|max_length[12]');
			$this -> form_validation -> set_rules('password', 'Password', 'trim|required|min_length[4]|max_length[32]');
			$this -> form_validation -> set_rules('password_cnf', 'Password Confirmation', 'trim|required|min_length[4]|max_length[32]');
			$this -> form_validation -> set_error_delimiters('<div class="error">', '</div>');

			if ($this -> form_validation -> run() == FALSE) {
				$data['main'] = 'register';
				$data['title'] = 'Register | Scrobber';
				$data['categories'] = $this->data->get_cat ();
				$data['ad'] = $this->data->get_home_ad ();
				
				$this -> load -> view('eclipse/fast', $data);
			} else {
				$idata = array('phone' => $_POST['phone'], 'username' => $_POST['username'], 'password' => md5($_POST['password']), 'email' => $_POST['email'], 'first_name' => $_POST['first_name'], 'last_name' => $_POST['last_name']);

				$this -> db -> insert('user', $idata);
				redirect(base_url('beta/home/get_started/?regestration'));

			}
		}

		public function add ()
		{
			if($this->uri->segment(2) == NULL ):
				$this->add_step_1 ();
			else:
				$cat = $this->data->get_cat ();
				foreach ($cat -> result () as $key):

					$data['main'] = $key->cat_view.'_cat';
					$data['title'] = 'Add new '. $key->cat_name .' | Scrobber';
					$data['categories'] = $this->data->get_cat ();
				
					$this -> load -> view('eclipse/fast', $data);
				endforeach;
			endif;
		}

		private function add_step_1 ()
		{
			$data['main'] = 'add-1';
			$data['title'] = 'Add new rental | Scrobber';
			$data['categories'] = $this->data->get_cat ();
			
			$this->load->view('eclipse/fast', $data);
		}

		public function go ()
		{
			if(!$_GET):
				show_404();
			else:

				if($_GET['ref']):
					$this->data->track_urls ();
				endif;

				/*
				 * redirect to the requested page
				 * Vars
				 * : base_url == Site path
				 * : ref == Refering page
				 * : redirect == where to redirect the user.
				*/

				if($_GET['url'] == 'base_url'):
					//redirect link
					$url = base_url($_GET['link_1'].'/'.$_GET['redirect']);
					
					redirect ($url);
				endif; 

			endif;
		}
		
	}

?>