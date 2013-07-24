<?php

class App extends CI_Controller {

    public function index() {
        $data['main'] = 'index';
        $data['title'] = 'Home';
        $data['ng'] = $this->get_nightlife();
        $data['sg'] = $this->get_social();
        $data['kg'] = $this->get_kids();
        $data['c'] = $this->get_categories();
        $data['event'] = $this->get_events();
		$data['featured'] = $this->data->slider ();
        $data['recom'] = $this->recomemded_events_home();
        $data['fet'] = $this-> get_featured();
        $this->load->view('alpha/loader', $data);
    }

    private function recomemded_events_home() {
        $this->db->where('event_status', 1);
        $this->db->limit(3);
        $this->db->order_by('event_views', 'random');

        $data = $this->db->get('event_data');

        return $data;
    }


    public function add_event() {
        if(!$this->uri->segment(2) | $this->uri->segment(2) == 'do_upload'):
            
        $this->form_validation->set_rules('post_title', 'Event Name', 'required|min_length[2]|max_length[60]');
        //$this->form_validation->set_rules('category', 'Event Category', 'required|min_length[2]|max_length[32]');
        //$this->form_validation->set_rules('post_content', 'Event Description', 'required|min_length[2]');
        //$this->form_validation->set_rules('address', 'Event Location', 'required|min_length[2]');
       // $this->form_validation->set_rules('st_date', 'Event Start Date', 'required|min_length[2]');
       // $this->form_validation->set_rules('end_date', 'Event End Date', 'required|min_length[2]');
        //$this->form_validation->set_rules('event_type', 'Event type', 'required|min_length[2]');
        //$this->form_validation->set_rules('phone', 'Event Phone Number', 'required|min_length[2]');
        //$this->form_validation->set_rules('userfile', 'Event Image', 'required|xss_clean');
       // $this->form_validation->set_rules('email', 'Event contact email', 'required|min_length[2]');
        if ($this->form_validation->run() == FALSE) {
        $data['main'] = 'add_event';
        $data['title'] = 'Add Event';
        $data['c'] = $this->get_categories();
        $data['ng'] = $this->get_nightlife();
        $data['sg'] = $this->get_social();
        $data['kg'] = $this->get_kids();
        $data['fet'] = $this-> get_featured();
        $this->load->view('alpha/loader', $data);
    }
    else {
        function do_upload() {}

                $config['upload_path'] = 'files/';
                $config['allowed_types'] = 'gif|jpg|png';
                $config['max_size'] = '10000';
                $config['max_width'] = '10240';          
                $config['max_height'] = '7680';
                $config['image_library'] = 'gd2';
                $config['create_thumb'] = TRUE;
                $config['maintain_ratio'] = TRUE;
                $config['width'] = 75;
                $config['height'] = 50;

                $this -> upload -> initialize($config);
                if (!$this -> upload -> do_upload()) {

                   $image = 'default.png';

                    //ECHO APPPATH . 'images/';
                }

                else {

                    $image_data = $this -> upload -> data();
                    $image = $image_data['file_name'];
                }
                $hash = random_string('alnum', 16);
                $data['hash'] = $hash;
                $data['event_category'] = $_POST['category'];
                $data['event_title'] = $_POST['post_title'];
                $data['event_slug'] = url_title($_POST['post_title'], '-', TRUE).'-'.random_string('alpha', 4);
                $data['event_description'] = $_POST['post_content'];
                $data['event_address'] = $_POST['address'];
                //$data['event_status'] = 2;
                $data['day'] =$_POST['day'];
                $data['month'] =$_POST['month'];
                $data['year'] =$_POST['year'];
                $data['e_day'] =$_POST['e_day'];
                $data['e_month'] =$_POST['e_month'];
                $data['e_year'] =$_POST['e_year'];
                $data['event_start_time'] = $_POST['st_time'];
                $data['event_end_time'] = $_POST['end_time'];
                $data['event_price'] = $_POST['event_price'];
                $data['event_email'] = $_POST['email'];
                $data['event_phone'] = $_POST['phone'];
		  //$data['event_ticket'] = $_POST['tiko'];
                if($this->session->userdata('logged_in')):
                    $data['event_owner'] = $this->session->userdata('user_id');
                endif;
                $data['event_status'] = 2;
                $data['event_image'] = $image;
                

                $this->db->insert('event_data', $data);

               if($this->session->userdata('logged_in')):
                   redirect (base_url('preview/'.$hash));
               else:
                   redirect(base_url('temp_login/'.$hash));
               endif;
            
    }    
        else:
            $this->edit_event ();
    endif;
    }
    
    function edit_event ()
    {
                    
        $this->form_validation->set_rules('post_title', 'Event Name', 'required|min_length[2]|max_length[60]');
        //$this->form_validation->set_rules('category', 'Event Category', 'required|min_length[2]|max_length[32]');
       // $this->form_validation->set_rules('post_content', 'Event Description', 'required|min_length[2]');
        //$this->form_validation->set_rules('address', 'Event Location', 'required|min_length[2]');
       // $this->form_validation->set_rules('st_date', 'Event Start Date', 'required|min_length[2]');
       // $this->form_validation->set_rules('end_date', 'Event End Date', 'required|min_length[2]');
        //$this->form_validation->set_rules('event_type', 'Event type', 'required|min_length[2]');
        //$this->form_validation->set_rules('phone', 'Event Phone Number', 'required|min_length[2]');
        //$this->form_validation->set_rules('userfile', 'Event Image', 'required|xss_clean');
        //$this->form_validation->set_rules('email', 'Event contact email', 'required|min_length[2]');
        if ($this->form_validation->run() == FALSE) {
        $data['main'] = 'edit_event';
        $data['title'] = 'Edit Event';
        $data['c'] = $this->get_categories();
        $data['ng'] = $this->get_nightlife();
        $data['sg'] = $this->get_social();
        $data['kg'] = $this->get_kids();
        $data['fet'] = $this-> get_featured();
        $data['event'] = $this->get_u_event();
        $this->load->view('alpha/loader', $data);
    }
    else {
        
            function do_upload() {}

                $config['upload_path'] = 'files/';
                $config['allowed_types'] = 'gif|jpg|png';
                $config['max_size'] = '10000';
                $config['max_width'] = '10240';          
                $config['max_height'] = '7680';
                $config['image_library'] = 'gd2';
                $config['create_thumb'] = TRUE;
                $config['maintain_ratio'] = TRUE;
                $config['width'] = 75;
                $config['height'] = 50;

                $this -> upload -> initialize($config);
                if (!$this -> upload -> do_upload()) {

                   $image = $_POST['default_image'];

                    //ECHO APPPATH . 'images/';
                }

                else {

                    $image_data = $this -> upload -> data();
                    $image = $image_data['file_name'];
                }
                
                 
                $hash = $this->uri->segment(2);
                $data['hash'] = $hash;
                $data['event_category'] = $_POST['category'];
                $data['event_title'] = $_POST['post_title'];
                $data['event_slug'] = url_title($_POST['post_title'], '-', TRUE).'-'.random_string('alpha', 4);
                $data['event_description'] = $_POST['post_content'];
                $data['event_address'] = $_POST['address'];
               // $data['event_status'] = 2;
                $data['day'] =$_POST['day'];
                $data['month'] =$_POST['month'];
                $data['year'] =$_POST['year'];
                $data['e_day'] =$_POST['e_day'];
                $data['e_month'] =$_POST['e_month'];
                $data['e_year'] =$_POST['e_year'];
                $data['event_start_time'] = $_POST['st_time'];
                $data['event_end_time'] = $_POST['end_time'];
                $data['event_price'] = $_POST['event_price'];
                $data['event_email'] = $_POST['email'];
                $data['event_phone'] = $_POST['phone'];
                $data['event_image'] = $image;
		  //$data['event_ticket'] = $_POST['tiko'];
                if($this->session->userdata('logged_in')):
                    $data['event_owner'] = $this->session->userdata('user_id');
                endif;
                $data['event_status'] = 2;
                
                $this->db->where('hash', $this->uri->segment(2));
                $this->db->update('event_data', $data);

                redirect(base_url('add/'.$this->uri->segment(2).'?status=updated'));
            }
    }
    
    
    function publish ()
    {
        $data['event_status'] = 1;
        $this->db->where('hash', $this->uri->segment(2));
        $this->db->update('event_data', $data);
        
        redirect(base_url('preview/'.$this->uri->segment(2).'?status=published'));
    }
    
    function temp_login ()
    {
        $this->form_validation->set_rules('username', 'Username or Email', 'required|min_length[4]|max_length[60]');
        $this->form_validation->set_rules('password', 'Password', 'required|min_length[4]|max_length[32]');
        if ($this->form_validation->run() == FALSE) {
            $data['main'] = 'temp_login';
            $data['title'] = 'Login';
            $data['ng'] = $this->get_nightlife();
            $data['sg'] = $this->get_social();
            $data['kg'] = $this->get_kids();
            $data['fet'] = $this-> get_featured();
            $data['c'] = $this->get_categories();
            $this->load->view('alpha/loader', $data);
        } else {
            $user = $_POST['username'];
            $password = md5($_POST['password']);
            $this->db->where("email", $user);
           //$this->db->or_where("username", $user);
            $this->db->where("password", $password);

            $query = $this->db->get("users");
            if ($query->num_rows() == 1) {
                foreach ($query->result() as $rows) {
                    //add all data to session
                    $newdata = array('user_id' => $rows->user_id, 'avator' => $rows->avator, 'user_email' => $rows->email, "name" => $rows->first_name . '&nbsp;' . $rows->last_name, 'logged_in' => TRUE,);
                }
                $this->session->set_userdata($newdata);
                $this->populate();
                redirect (base_url('preview/'.$this->uri->segment(2)));
            } else{
                redirect (base_url('temp_login/'.$this->uri->segment(2).'/error'));
            }
            
        }
    }
    
    function uregister ()
    {
        $this->form_validation->set_rules('first_name', 'First name', 'required|min_length[2]|max_length[60]');
        $this->form_validation->set_rules('last_name', 'Password', 'required|min_length[2]|max_length[32]');        
        $this->form_validation->set_rules('email', 'Email Address', 'required|min_length[5]|max_length[32]|is_unique[users.email]');
        //$this->form_validation->set_rules('phone', 'Phone Number', 'required|min_length[4]|max_length[32]|is_unique[users.phone]');
        $this->form_validation->set_rules('password', 'Password', 'required|min_length[4]|max_length[32]');
        if ($this->form_validation->run() == FALSE) {
            $data['main'] = 'uregister';
            $data['title'] = 'Register | Gigwapi';
            $data['c'] = $this->get_categories();
            $data['ng'] = $this->get_nightlife();
            $data['sg'] = $this->get_social();
            $data['kg'] = $this->get_kids();
            $data['fet'] = $this->get_featured();
            $this->load->view('alpha/loader', $data);
        }
        else {
            //Register the guy
            $data['first_name'] = $_POST['first_name'];
		$data['last_name'] = $_POST['last_name'];
		$data['email'] = $_POST['email'];
		//$data['phone'] = $_POST['phone'];
		$data['password'] = md5($_POST['password']);
		$data['sess'] = random_string('alnum', 16);

		$this->db->insert('users', $data);

		$this->data->activation_email ();
                
                //login the guy
                
                $user = $_POST['email'];
                $password = md5($_POST['password']);
                $this->db->where("email", $user);
                //$this->db->or_where("username", $user);
                $this->db->where("password", $password);

            $query = $this->db->get("users");
            if ($query->num_rows() == 1) {
                foreach ($query->result() as $rows) {
                    //add all data to session
                    $newdata = array('user_id' => $rows->user_id, 'avator' => $rows->avator, 'user_email' => $rows->email, "name" => $rows->first_name . '&nbsp;' . $rows->last_name, 'logged_in' => TRUE,);
                }
                $this->session->set_userdata($newdata);
                $this->populate();
                redirect (base_url('preview/'.$this->uri->segment(2)));
            } else{
                redirect (base_url('temp_login/'.$this->uri->segment(2).'/error'));
            }
        }
    }
    
    function populate ()
    {
        $data['event_owner'] = $this->session->userdata('user_id');
        $this->db->where('hash', $this->uri->segment(2));
        $this->db->update('event_data', $data);
        
        return true;
        
    }

    public function search() {
        $data['main'] = 'search';
        $data['title'] = 'Search | Gigwapi';
        $data['c'] = $this->get_categories();
        $data['ng'] = $this->get_nightlife();
        $data['sg'] = $this->get_social();
        $data['kg'] = $this->get_kids();
        $data['recom'] = $this->get_recom();
        $data['event'] = $this->get_search();
        $data['fet'] = $this->get_featured();
        $this->load->view('alpha/loader', $data);
    }

    private function get_search() {
           
            $q = $_GET['s'];
            $this->db->like('event_title', $q);
            $this->db->or_like('event_description', $q);
            $this->db->where('event_status', 1);
            $this->db->order_by('event_id', 'desc');

            $data = $this->db->get('event_data');
            return $data;
         
    }

    private function get_recom() {
        
    }

    public function register() {

        $this->form_validation->set_rules('first_name', 'First name', 'required|min_length[2]|max_length[60]');
        $this->form_validation->set_rules('last_name', 'Password', 'required|min_length[2]|max_length[32]');        
        $this->form_validation->set_rules('email', 'Email Address', 'required|min_length[5]|max_length[32]|is_unique[users.email]');
        //$this->form_validation->set_rules('phone', 'Phone Number', 'required|min_length[4]|max_length[32]|is_unique[users.phone]');
        $this->form_validation->set_rules('password', 'Password', 'required|min_length[4]|max_length[32]');
        if ($this->form_validation->run() == FALSE) {
            $data['main'] = 'register';
            $data['title'] = 'Register | Gigwapi';
            $data['c'] = $this->get_categories();
            $data['ng'] = $this->get_nightlife();
            $data['sg'] = $this->get_social();
            $data['kg'] = $this->get_kids();
            $data['fet'] = $this->get_featured();
            $this->load->view('alpha/loader', $data);
        }
        else {
            $this->data->register ();
        }
    }

    private function get_current_cat() {
        if(!$this->uri->segment(2)):
            $this->db->where('cat_slug', $this->uri->segment(1));
        else:
             $this->db->where('cat_slug', $this->uri->segment(2));
        endif;
		
        $c_cat = $this->db->get('categories');
        foreach ($c_cat->result() as $cat);
        
        return $cat;
    }
    
    private function get_cat_linker ()
    {
        if(!$this->uri->segment(2)):
            $this->db->where('cat_slug', $this->uri->segment(1));
        else:
             $this->db->where('cat_slug', $this->uri->segment(2));
        endif;
		
        $c_cat = $this->db->get('categories');
        
        return $c_cat;
    }

    public function category() {
        $c = $this->get_current_cat();
        $data['main'] = 'category';
        $data['title'] = $c->cat_name;
        $data['idata'] = $this->get_current_cat();
        $data['c'] = $this->get_categories();
        $data['event'] = $this->get_current_cat_events();
        $data['recom'] = $this->recomemded_events_cat();
        $data['ng'] = $this->get_nightlife();
        $data['sg'] = $this->get_social();
        $data['kg'] = $this->get_kids();
        $data['fet'] = $this->get_featured();
		$data['featured'] = $this->data->slider ();
        $this->load->view('alpha/loader', $data);
    }

    private function get_current_cat_events() {
        $c = $this->get_current_cat();
        $this->db->where('event_category', $c->cat_slug);
        $this->db->where('event_status', 1);
        $this->db->order_by('event_id', 'ASC');
        $data = $this->db->get('event_data');

        return $data;
    }

    private function recomemded_events_cat() {
        $c = $this->get_current_cat();
        $this->db->like('event_title', $c->cat_desc);
        $this->db->like('event_description', $c->cat_desc);
        $this->db->where_not_in('event_category', $c->cat_slug);
        $this->db->where('event_status', 1);
        $this->db->order_by('event_id', 'random');
        $this->db->limit('3');

        $data = $this->db->get('event_data');
        return $data;
    }

    public function contact() {
        $data['main'] = 'contact_us';
        $data['title'] = 'Contact Us';
        $data['ng'] = $this->get_nightlife();
        $data['sg'] = $this->get_social();
        $data['kg'] = $this->get_kids();
        $data['c'] = $this->get_categories();
        $data['fet'] = $this-> get_featured();
        $data['event'] = $this->get_events();
        $this->load->view('alpha/loader', $data);
    }

 public function about() {
        $data['main'] = 'about_us';
        $data['title'] = 'About Us';
        $data['ng'] = $this->get_nightlife();
        $data['sg'] = $this->get_social();
        $data['kg'] = $this->get_kids();
        $data['c'] = $this->get_categories();
        $data['fet'] = $this-> get_featured();
        $data['event'] = $this->get_events();
        $this->load->view('alpha/loader', $data);
    }

	

    private function get_categories() {
        $cats = $this->db->get('categories');
        $data['event'] = $this->get_events();
        return $cats;
    }

    private function get_cat_events() {
        /*
          $this->db->where('cat_slug', $this->uri-> segment(4));
          $this->db->order_by('event_id', 1);
          $this->db->order_by("event_id", 'asc');
          $data =
         */
    }

    private function get_cat_featured() {
        $this->db->where('event_featured', 1);
        $this->db->where('events_ad_package', 2);
        $this->db->where('events_ad_package', 3);
        $this->db->where('event_status', 1);
        $this->db->order_by('event_id', 'random');
        $this->db->limit('10');
        $cat_fet = $this->db->get('event_data');

        return $cat_fet;
    }

    private function get_featured() {
        $this->db->where('event_featured', 1);
        $this->db->where('event_status', 1);
        $this->db->where('events_ad_package', 3);
        $this->db->order_by('event_id', 'random');
        $this->db->limit('3');
        $fet = $this->db->get('event_data');

        return $fet;
    }

    private function get_home_featured() {
        $this->db->where('event_featured', 1);
        $this->db->where('event_status', 1);
        $this->db->order_by('event_id', 'random');
        $this->db->limit('3');
        $home_fet = $this->db->get('event_data');

        return $home_fet;
    }

    public function login() {
        $this->form_validation->set_rules('username', 'Username or Email', 'required|min_length[4]|max_length[60]');
        $this->form_validation->set_rules('password', 'Password', 'required|min_length[4]|max_length[32]');
        if ($this->form_validation->run() == FALSE) {
            $data['main'] = 'login';
            $data['title'] = 'Login';
            $data['ng'] = $this->get_nightlife();
            $data['sg'] = $this->get_social();
            $data['kg'] = $this->get_kids();
            $data['fet'] = $this-> get_featured();
            $data['c'] = $this->get_categories();
            $this->load->view('alpha/loader', $data);
        } else {
            $user = $_POST['username'];
            $password = md5($_POST['password']);
            $this->db->where("email", $user);
           //$this->db->or_where("username", $user);
            $this->db->where("password", $password);

            $query = $this->db->get("users");
            if ($query->num_rows() == 1) {
                foreach ($query->result() as $rows) {
                    //add all data to session
                    $newdata = array('user_id' => $rows->user_id, 'avator' => $rows->avator, 'user_email' => $rows->email, "name" => $rows->first_name . '&nbsp;' . $rows->last_name, 'logged_in' => TRUE,);
                }
                $this->session->set_userdata($newdata);
                if (@$_POST['redirect_to']):                
                    redirect($_POST['redirect_to']);
                else:
                    redirect(base_url());
                endif;
            } else
            if ($_POST['redirect_to']):
                redirect(base_url('login/error/?redirect_to=' . $_POST['redirect_to']));
            else:
                redirect(base_url('login/error/'));
            endif;
        }
    }

       private function get_events() {
               
        if(isset($_GET['update'])):            
      
            if ($_GET['update'] == 'today'):
                $this->db->where('event_status', 1);
                $this->db->where('day', date('d'));
                $this->db->where('month', date('M'));
                $this->db->where('year', date('Y'));
                $this->db->order_by('event_id', 'desc');
                $event = $this->db->get('event_data');

                return $event;
            
            elseif ($_GET['update'] == 'popular'):
                $this->db->where('event_status', 1);
                $this->db->order_by('event_views', 'desc');
                $this->db->order_by('event_id', 'desc');                
                $event = $this->db->get('event_data');

                return $event;
          endif;
          
          else:
                
                //day 1
                $tm = explode(':', date('d:M:Y', mktime (0,0,0, date("m") ,date("d")+1,date("Y"))));
                    $day1 = element('0', $tm);
                    $month1 = element('1', $tm);
                    $year1 = element('2', $tm);
                    
               //day 2
               $tm2 = explode(':', date('d:M:Y', mktime (0,0,0, date("m") ,date("d")+2,date("Y"))));
                    $day2 = element('0', $tm2);
                    $month2 = element('1', $tm2);
                    $year2 = element('2', $tm2);
                    
               
              //day 3
              $tm3 = explode(':', date('d:M:Y', mktime (0,0,0, date("m") ,date("d")+3,date("Y"))));
                    $day3 = element('0', $tm3);
                    $month3 = element('1', $tm3);
                    $year3 = element('2', $tm3);
                    
              //day 4
              $tm4 = explode(':', date('d:M:Y', mktime (0,0,0, date("m") ,date("d")+4,date("Y"))));
                    $day4 = element('0', $tm4);
                    $month4 = element('1', $tm4);
                    $year4 = element('2', $tm4);
                    
             //day 5
             $tm5 = explode(':', date('d:M:Y', mktime (0,0,0, date("m") ,date("d")+5,date("Y"))));
                    $day5 = element('0', $tm5);
                    $month5 = element('1', $tm5);
                    $year5 = element('2', $tm5);
                    
            //day 6
            $tm6 = explode(':', date('d:M:Y', mktime (0,0,0, date("m") ,date("d")+6,date("Y"))));
                    $day6 = element('0', $tm6);
                    $month6 = element('1', $tm6);
                    $year6 = element('2', $tm6);
             //day 7
            $tm7 = explode(':', date('d:M:Y', mktime (0,0,0, date("m") ,date("d")+7,date("Y"))));
                    $day7 = element('0', $tm7);
                    $month7 = element('1', $tm7);
                    $year7 = element('2', $tm7);
                    
              
           //Process from DB     
            
             $event = $this->db->query("SELECT * FROM (`event_data`) WHERE `event_status` = 1 AND `day` = '$day7' AND `month` = '$month7' AND `year` = '$year7' OR `day` = '$day6' AND `month` = '$month6' AND `year` = '$year6' OR `day` = '$day5' AND `month` = '$month5' AND `year` = '$year5' OR `day` = '$day4' AND `month` = '$month4' AND `year` = '$year4' OR `day` = '$day3' AND `month` = '$month3' AND `year` = '$year3' OR `day` = '$day2' AND `month` = '$month2' AND `year` = '$year2' OR `day` = '$day1' AND `month` = '$month1' AND `year` = '$year1' ORDER BY `day` ASC");
               
             return $event;
             
              endif; 
              

    }

    public function u() {
        /*
         * Class U to display events
         */

        if (!$this->uri->segment('1')):
            show_404();
        else:
            $loop = $this->get_u_event();
            foreach ($loop->result() as $ldata):
            endforeach;
            $data['ng'] = $this->get_nightlife();
            $data['sg'] = $this->get_social();
            $data['kg'] = $this->get_kids();
            $data['c'] = $this->get_categories();
            $data['ev'] = $this->get_u_event();
            $data['fet'] = $this->get_featured();
            $data['main'] = 'view_event';
            $data['title'] = $ldata->event_title;
            $data['c'] = $this->get_categories();
            $this->load->view('alpha/loader', $data);


        endif;
    }
    
    function compute_links ()
    {
        /*
         * Lets have fun with events
         */
        
        if($this->get_cat_linker() ->num_rows () !== 0):
            $this->category ();
       elseif ($this->get_hangout_link () -> num_rows () !== 0):
            $this->hangout();
       else:
           $this->u ();                  
        endif;
    }
    
    function get_hangout_link ()
    {
        $this->db->where('slug', $this->uri->segment(1));
        $data = $this->db->get('hangouts');
        
        return $data;
    }
    
    function hangout ()
    {
        echo 'true';
    }
    
    private function get_u_event() {
        if($this->uri->segment('1') == 'preview' | $this->uri->segment('1') == 'add'):
            $this->db->where('hash', $this->uri->segment(2));
        else:
        $this->db->where('event_slug', $this->uri->segment(1));
        endif;
        $ev = $this->db->get('event_data');
        if ($ev->num_rows == 0):
            show_404();
            exit();
        else:
            return $ev;
        endif;
    }

    private function get_nightlife() {
        $this->db->where('event_category', 'nightlife');
        $this->db->where('event_status', 1);
        $this->db->order_by("event_id", 'asc');
        $this->db->limit(3);
        $ng = $this->db->get('event_data');

        return $ng;
    }

    private function get_social() {
        $this->db->where('event_category', 'social-events');
        $this->db->where('event_status', 1);
        $this->db->order_by("event_id", 'asc');
        $this->db->limit(3);
        $sg = $this->db->get('event_data');

        return $sg;
    }

    private function get_kids() {
        $this->db->where('event_category', 'kids-family');
        $this->db->where('event_status', 1);
        $this->db->order_by("event_id", 'asc');
        $this->db->limit(3);
        $kg = $this->db->get('event_data');

        return $kg;
    }
    
    public function forgot ()
    {
       if(isset($_GET['hash'])):
           //Reset Password
            $data['main'] = 'reset_pass';
            $data['title'] = 'Reset Password';
            $data['ng'] = $this->get_nightlife();
            $data['sg'] = $this->get_social();
            $data['kg'] = $this->get_kids();
            $data['fet'] = $this-> get_featured();
            $data['c'] = $this->get_categories();
            $this->load->view('alpha/loader', $data);
       elseif(isset($_GET['submited'])):
           
       elseif(isset($_GET['email'])):
           
               $this->notifications->send_password_reminder ();
                     
       else:
            $data['main'] = 'reset_pass';
            $data['title'] = 'Reset Password';
            $data['ng'] = $this->get_nightlife();
            $data['sg'] = $this->get_social();
            $data['kg'] = $this->get_kids();
            $data['fet'] = $this-> get_featured();
            $data['c'] = $this->get_categories();
            $this->load->view('alpha/loader', $data);
       endif;
    }

    public function logout() {
        $newdata = array('user_id' => '', 'user_name' => '', 'user_email' => '', 'logged_in' => FALSE,);

        $this->session->unset_userdata($newdata);
        $this->session->sess_destroy();
        $this->index();
    }

}

?>