<?php

/**
 * Mobile class controller
 */
 
 class Mobile extends CI_Controller {
     
     public function index() {
     	/*
		 * Mobile front page. 
		 * Build an amazing front page		
		 */

		$data['main'] = 'index';
		$data['title'] = 'Scrobber Mobile Version';
		$data['keywords'] = '';
		$data['description'] = '';
		$data['recent'] = $this->get_recent ();
		$data['popular'] = $this->get_popular ();
		$this -> load -> view('mobile/loader', $data);

	}

	private function get_recent ()
	{
		$this->db->where('status', 3);
		$this->db->order_by('item_id', "desc");
		$this->db->limit(4);
		$data = $this->db->get('item');

		return $data;
	}

	private function get_popular ()
	{
		$this->db->where('status', 3);
		$this->db->where('featured', 1);
		$this->db->order_by('item_id', "desc");
		$this->db->limit(4);
		$data = $this->db->get('item');

		return $data;	
	}

	public function recent_viewed ()
	{

	}
	 
	 public function search () {
	 	$data['main'] = 'search';
		$data['title'] = 'Scrobber Mobile Version';
		$data['keywords'] = '';
		$data['description'] = '';
		$data['result'] = $this->get_result ();		
		$this -> load -> view('mobile/loader', $data);
		
	 }
	 
	 private function get_result ()
	 {
	 	if(!$_GET):
	 		return FALSE;
	 	else:
		 	$s = $_GET['s'];
		 	$p = $_GET['price'];
		 	$l = $_GET['location'];

		 	$this->db->like('name', $s);
		 	$this->db->or_like('desc', $s);
		 	$this->db->or_like('tags', $s);

		 	$this->db->like('item_price', $p);
		 	$this->db->like('location', $l);
		 	
		 	$this->db->order_by('item_id', 'desc');

		 	$data = $this->db->get('item');

		 	return $data;
		endif;
	 }
	 public function view () {
	 	$data['main'] = 'view';
		$data['title'] = 'Scrobber Mobile Version';
		$data['keywords'] = '';
		$data['description'] = '';
		$data['item'] = $this->view_data ();
		$this -> load -> view('mobile/loader', $data);
		
	 }

	 private function view_data ()
	 {
	 	$this->db->where('sess', $this->uri->segment(3));
	 	$data = $this->db->get('item');

	 	return $data;
	 }
	 
	 public function help()
	 {
	 	$link = $this->uri->segment(3);

	 	if($link == NULL):
	 		$this->load_help ();
	 	elseif($link == 'contact-us'):

	 		$this->load_contact ();
	 	else:

	 		$this->db->where('slug', $link);
	 		$cdata = $this->db->get('pages');
	 		if($cdata -> num_rows () == 0):
	 			$this->mobile_404 ();
	 		else:
	 			foreach ($cdata->result () as $idata):
	 				$data['main'] = 'page';
					$data['title'] = $idata->title;
					$data['keywords'] = $idata->meta;
					$data['description'] = $idata->description;
					$data['html'] = $idata->html;
					$this -> load -> view('mobile/loader', $data);

	 			endforeach;

	 		endif;

	 	endif;

	 }

	 private function load_contact ()
	 {
	 	
	 	$data['main'] = 'contact-us';
		$data['title'] = 'Contact Us | Scrobber Mobile Version';
		$data['keywords'] = '';
		$data['description'] = '';
		$data['item'] = $this->view_data ();
		$this -> load -> view('mobile/loader', $data);
	 
	 }

	 private function load_help ()
	 {
	 	$data['main'] = 'help';
		$data['title'] = 'Help | Scrobber Mobile Version';
		$data['keywords'] = '';
		$data['description'] = '';
		$data['item'] = $this->view_data ();
		$this -> load -> view('mobile/loader', $data);
	 }

	 public function add () {
	 	
		
	 }
	 
	 
	 public function dashboard () {
	 	echo 'Good';
		
	 }
	 
	public function login() {
		$this -> form_validation -> set_rules('login', 'Username or Email', 'required|min_length[5]|max_length[60]');
		$this -> form_validation -> set_rules('password', 'Password', 'required|min_length[5]|max_length[32]');
		if ($this -> form_validation -> run() == FALSE) {
			$data['main'] = 'login';
			$data['title'] = 'Login | Scrobber Mobile Version';
			$data['keywords'] = '';
			$data['description'] = '';
			$data['iasoc'] = 'login';

			$this -> load -> view('mobile/loader', $data);

		} else {
			$user = $_POST['login'];
			$password = md5($_POST['password']);
			$this -> db -> where("email", $user);
			$this -> db -> or_where("username", $user);
			$this -> db -> where("password", $password);

			$query = $this -> db -> get("user");
			if ($query -> num_rows() > 0) {
				foreach ($query->result() as $rows) {
					//add all data to session
					$newdata = array('user_id' => $rows -> user_id,'user_phone' => $rows->phone, 'id_no' => $rows->id_no, 'user_name' => $rows -> username,'first_name' => $rows->first_name, 'user_email' => $rows -> email, "user_status" => $rows -> status, "name" =>$rows->first_name.'&nbsp;'.$rows->last_name ,'logged_in' => TRUE, );
				}
				$this -> session -> set_userdata($newdata);
				$this->dashboard ();
			} else
				redirect('mobile/login/error');

		}
	}

	public function logout() {
		$newdata = array('user_id' => '', 'user_name' => '', 'user_email' => '', 'logged_in' => FALSE, );

		$this -> session -> unset_userdata($newdata);
		$this -> session -> sess_destroy();
		$this -> index();
	}	 
	 public function pay () {
	 	
		
	 }

	public function register() {
		$this -> form_validation -> set_rules('phone', 'Phone', 'trim|required|min_length[10]|max_length[12]|is_unique[user.phone]');
		$this -> form_validation -> set_rules('email', 'Your Email', 'trim|required|valid_email|is_unique[user.email]');
		$this -> form_validation -> set_rules('username', 'Username', 'trim|required|min_length[5]|max_length[12]|is_unique[user.username]');
		$this -> form_validation -> set_rules('first_name', 'First Name', 'required|min_length[3]|max_length[12]');
		$this -> form_validation -> set_rules('last_name', 'Last Name', 'required|min_length[3]|max_length[12]');
		$this -> form_validation -> set_rules('password', 'Password', 'trim|required|min_length[4]|max_length[32]');
		$this -> form_validation -> set_error_delimiters('<div class="error">', '</div>');

		if ($this -> form_validation -> run() == FALSE) {
			$data['main'] = 'join';
			$data['title'] = 'Register | Scrobber mobile Version';
			$data['keywords'] = '';
			$data['description'] = '';
			$data['iasoc'] = 'join';

			$this -> load -> view('mobile/loader', $data);
		} else {
			$idata = array('phone' => $_POST['phone'], 'username' => $_POST['username'], 'password' => md5($_POST['password']), 'email' => $_POST['email'], 'first_name' => $_POST['first_name'], 'last_name' => $_POST['last_name']);

			$this -> db -> insert('user', $idata);
			redirect(base_url('mobile/help/get_started/?i-joined'));

		}

	}

	 public function mobile_404 ()
	 {
	 	$data['main'] = '404';
		$data['title'] = 'Page not found | Scrobber Mobile Version';
		$data['keywords'] = '';
		$data['description'] = '';
		$this -> load -> view('mobile/loader', $data);
	 }
 }


?>