<?php

/*
 Author:     Antony Gitonga
 antony.g@telekenya.com
 http://founder.scrobber.com
 5910 - 00200,
 City Square,
 Nairobi,
 Kenya.

 Company:    Scrobber Ag
 http://www.scrobber.com
 info@scrobber.com
 A Scrobber Singapore Company
 AG group member

 License:    Scrober Mint
 http://www.mint.telekenya.com
 mint@scrobber.com

 Copyrights: Scrobber AG
 copyrights@telekenya.com
 Telekenya Universal Mint Handler

 Mint:       Scrobber/TeleKenya
 Governing laws: Kenyan Laws.
 http://www.mint.scrobber.com
 antony.g@telekenya.com

 */
class Landing extends CI_Controller {

	public function index() {
		$data['main'] = 'main';
		$data['title'] = '4hire | Home';
		$this -> db -> where('status', '1');
		$this->db->or_where ('status', "3");
		$this->db->order_by("item_id", "desc");
		$this -> db -> limit(6);
		$data['item_query'] = $this -> db -> get('item');
		

		$this -> db -> where('status', '4');
		$this -> db -> limit(5);
		$data['hired_query'] = $this -> db -> get('item');
		

		$this -> load -> view('main/loader', $data);
	}

	public function categories() {
		$this -> load -> model('category_model');
		$data['categories'] = $this -> category_model -> get_categories();
		$data['main'] = 'categories';
		$data['title'] = 'Categories | 4ire.co';
		$this -> load -> view('main/loader', $data);

	}
	
	public function search () {
		//Here is wher all codding happens jim.
		//Am gonna use the very basic logic here
		$query = $_GET['query'];
		$this->db->like('name', $query);
		$this->db->or_like('tags', $query);
		$this->db->or_like('desc', $query);
		$this->db->where('status', "1");
		$this->db->where('status', "3");
		$this->db->order_by("item_id", "desc");
		$data['results'] = $this->db->get('item');
		$data['main'] = 'search';
		$data['title'] = 'Search Results';
		$this -> load -> view('main/loader', $data);
	}

	public function browse() {
		$this -> db -> where('status', '1');
		$this -> db -> or_where('status', '3');
		$post = $this->uri->segment(3);
		if($post = "price"):
		$this->db->order_by('item_price', "asc");
		elseif($post = "location"):
		$this->db->order_by('location', "desc");
		endif;
		$this->db->order_by('item_id', "desc");
		$data['item_query'] = $this -> db -> get('item');
		$data['main'] = 'browse';
		$data['title'] = 'Browse by Regions';
		$this -> load -> view('main/loader', $data);
	}

	public function inquire (){
		//loading inquirely item
		$this->db->where('item_id', $this->uri->segment('3'));
		$data['query'] = $this->db->get('item');
		$data['title'] = 'Item Enquirely';
		$data['main'] = 'iqr';
		$this->load->view('main/loader', $data);


	}
	
	public function country() {
		$this -> db -> where('country_ext', $this->uri->segment('3'));
		$this -> db -> or_where('country_id', $this->uri->segment('3'));
		$this->db->order_by("country_id", "desc");
		$data['item_query'] = $this -> db -> get('countries');
		$data['main'] = 'country';
		$data['title'] = 'Browse by Regions';
		$this -> load -> view('main/loader', $data);
	}
	
	public function view()
	{
		$this -> db -> where('item_id', $this->uri->segment('3'));

		$data['query'] = $this -> db -> get('item');
		$data['main'] = 'view';
		$data['title'] = 'View a single item';
		$this->load->view('main/loader', $data);
	}
	public function city() {
		$this -> db -> where('city_ext', $this->uri->segment('3'));
		$this -> db -> or_where('city_id', $this->uri->segment('3'));
		$data['item_query'] = $this -> db -> get('cities');
		$data['main'] = 'city';
		$data['lmain'] = 'city';
		$data['title'] = 'Browse by cities';
		$this -> load -> view('main/loader', $data);
	}

	public function hood() {
		$this -> db -> where('hood_ext', $this->uri->segment('3'));
		$this -> db -> or_where('hood_id', $this->uri->segment('3'));
		$data['item_query'] = $this -> db -> get('hoods');
		$data['main'] = 'city';
		$data['lmain'] = 'hood';
		$data['title'] = 'Browse by Hoods';
		$this -> load -> view('main/loader', $data);
	}
	
	public function location() {		
		$data['query'] = $this -> db -> get('countries');
		$data['main'] = 'location';
		$data['title'] = 'Browse by Regions';
		$this -> load -> view('main/loader', $data);
	}

	public function contact() {
		$data['main'] = 'contact';
		$data['title'] = 'contact us';
		$this -> load -> view('main/loader', $data);
	}

	public function join() {
		$this -> form_validation -> set_rules('phone', 'Phone', 'trim|required|min_length[10]|max_length[12]|is_unique[user.phone]');
		$this -> form_validation -> set_rules('email', 'Your Email', 'trim|required|valid_email|is_unique[user.email]');
		$this -> form_validation -> set_rules('username', 'Username', 'trim|required|min_length[5]|max_length[12]|is_unique[user.username]');
		$this -> form_validation -> set_rules('first_name', 'First Name', 'required|min_length[3]|max_length[12]');
		$this -> form_validation -> set_rules('last_name', 'Last Name', 'required|min_length[3]|max_length[12]');
		$this -> form_validation -> set_rules('password', 'Password', 'trim|required|min_length[4]|max_length[32]');
		$this -> form_validation -> set_rules('password_cnf', 'Password Confirmation', 'trim|required|min_length[4]|max_length[32]');
		$this -> form_validation -> set_error_delimiters('<div class="error">', '</div>');

		if ($this -> form_validation -> run() == FALSE) {
			$data['main'] = 'join';
			$data['title'] = 'Join Us';
			$this -> load -> view('main/loader', $data, $_POST);
		} else {
			$idata = array('phone' => $_POST['phone'], 'username' => $_POST['username'], 'password' => md5($_POST['password']), 'email' => $_POST['email'], 'first_name' => $_POST['first_name'], 'last_name' => $_POST['last_name']);

			$this->db->insert('user', $idata);
			redirect(base_url('landing/nots/registration'));

		}

	}

	public function login() {
		$this -> form_validation -> set_rules('login', 'Username or Email', 'required|min_length[5]|max_length[60]');
		$this -> form_validation -> set_rules('password', 'Password', 'required|min_length[5]|max_length[32]');
		if ($this -> form_validation -> run() == FALSE) {
			$data['main'] = 'join';
			$data['title'] = 'Login';
			$this -> load -> view('main/loader', $data);

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
					$newdata = array('user_id' => $rows -> user_id, 'user_name' => $rows -> username, 'user_email' => $rows -> email, "user_status" => $rows -> status, "name" =>$rows->first_name.'&nbsp;'.$rows->last_name ,'logged_in' => TRUE, );
				}
				$this -> session -> set_userdata($newdata);
				redirect("dashboard/home");
			}

		}
	}

	public function alternative () {
		$this -> form_validation -> set_rules('name', 'Your Name', 'required|min_length[5]|max_length[60]');
		$this -> form_validation -> set_rules('phone', 'Phone', 'required|min_length[10]|max_length[15]');
		$this -> form_validation -> set_rules('password', 'Password', 'required|min_length[5]|max_length[32]');
		if ($this -> form_validation -> run() == FALSE) {
		$data['main'] = 'alternative';
		$data['title'] = 'Alternative Registration';
		$this->load->view('main/loader', $data);
	}else {
		$this->db->insert('alternative', $_POST);
		redirect(base_url('landing/nots/thank-you'));
		exit();
	}

	}

	public function fork () {
		//This is kinda tricky
		echo 'we got that';
	}

	public function nots () {
		$data['main'] = 'reg';
		$data['title'] = 'Thank you for registering';
		$this->load->view('main/loader', $data);
	}

	public function logout() {
		$newdata = array('user_id' => '', 'user_name' => '', 'user_email' => '', 'logged_in' => FALSE, );

		$this -> session -> unset_userdata($newdata);
		$this -> session -> sess_destroy();
		$this -> index();
	}

	public function add() {
		$data['main'] = 'new';
		$data['title'] = 'Add New Listing';
		$this -> load -> view('main/loader', $data);
	}

	public function forgot () {
		$data['title'] = 'forgot password';
		$data['main'] = 'forgot';
		$this->load->view('main/loader', $data);

	}

	public function benefits () {
		$data['title'] = 'Benefits of Joining and using Scrobber';
		$data['main'] = 'benefits';
		$this->load->view('main/loader', $data);
	}

	public function definations() {
		$data['main'] = 'legal';
		$data['title'] = 'Definations Notice';
		$this -> load -> view('main/loader', $data);
	}

	public function terms() {
		$data['main'] = 'terms';
		$data['title'] = 'Terms and Condations';
		$this -> load -> view('main/loader', $data);
	}

	public function disclaimer() {
		$data['main'] = 'disclaimer';
		$data['title'] = 'Disclaimer Notice';
		$this -> load -> view('main/loader', $data);
	}

	public function copyrights() {
		$data['main'] = 'copyrights';
		$data['title'] = 'Copyrights Notice';
		$this -> load -> view('main/loader', $data);
	}

	public function developers() {
		$data['main'] = 'developers';
		$data['title'] = 'Developers Center';
		$this -> load -> view('main/loader', $data);
	}

	public function network() {
		$data['main'] = 'network';
		$data['title'] = '4hire.co Network';
		$this -> load -> view('main/loader', $data);
	}

	public function company() {
		$data['main'] = 'company';
		$data['title'] = '4hire.co Company';
		$this -> load -> view('main/loader', $data);
	}

}

?>