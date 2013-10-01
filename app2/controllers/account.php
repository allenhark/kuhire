<?php 

class Account extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
        
        if(!$this->session->userdata('logged_in')):
            redirect(base_url('login'));
        endif;
        
        //$this->fb_me = $this->fb_ignited->fb_get_me();
        //We autoload resources here
    }
    
    function index ()
    {
        if($this->uri->segment(2)):
            $url = $this->uri->segment(2);
            if($url == 'inbox'):
                $this->inbox ();
            elseif($url == 'change-pic'):
                $this->change_pic();
            elseif($url == 'sync-fb'):
                $this->sync_fb();
            elseif($url == 'mark-as-read'):
                $this->mark_as_read();
            elseif($url == 'listings'):
                $this->my_listings();
            elseif($url == 'change-password'):
                $this->password();
            endif;
            
        else:
            //User frontpage
            $data['main'] = 'account';
            $data['title'] = 'My Kuhire';
            $data['keywords'] = '';
            $data['description'] = '';
            $data['user'] = $this->user->get_logged_in_user_data ();
            
            $data['rt'] = $this->listings();

            $this -> load -> view('loader', $data);
        endif;
    }
    
    function password ()
    {
        //Verify if any post data
        
        if(!$post['password']):
            redirect( base_url('account?error=Invalid Password <br> Try again'));
        else:
            //Validate password
            $this->db->where('user_id', $this->session->userdata('user_id'));
            $this->db->where('password', md5($_POST['current']));
            $data = $this->db->get('item');
            if($data->num_rows () == 0):
                redirect( base_url('account?error=Invalid Password <br> Try again'));
            endif;
        endif;
    }
    
    function my_listings ()
    {
         //User frontpage
            $data['main'] = 'my_listings';
            $data['title'] = 'My Listings';
            $data['keywords'] = '';
            $data['description'] = '';
            $data['user'] = $this->user->get_logged_in_user_data ();
            $data['rt'] = $this->listings();

            $this -> load -> view('loader', $data);
    }
    
    function listings ()
    {
        $config['base_url'] = base_url('account/?');
        $config['total_rows'] = $this->count();
        $config['first_tag_open'] = '<li>';
        $config['first_tag_close'] = '</li>';
        $config['first_link'] = 'First';
        $config['last_tag_open'] = '<li>';
        $config['last_tag_close'] = '</li>';
        $config['last_link'] = 'Last';
        $config['next_tag_open'] = '<li class="paginate_enabled_next">';
        $config['next_tag_close'] = '</li>';
        $config['num_tag_open'] = '<li class="paginate_button">';
        $config['num_tag_close'] = '</li>';
        $config['prev_tag_open'] = '<li class="paginate_enabled_previous">';
        $config['prev_tag_close'] = '</li>';
        $config['cur_tag_open'] = '<li class="active paginate_active"> <a href="#" >';
        $config['cur_tag_close'] = '</a></li>';
        $config['enable_query_strings'] = TRUE;
        $config['page_query_string'] = TRUE;
        $config['query_string_segment'] = 'page';
        $config['num_links'] = 5;


        $config['per_page'] = 5;

        $this->pagination->initialize($config);
        
        $this->db->where('item_owner', $this->session->userdata('user_id'));
        
        if (isset($_GET['page'])):
            $this->db->limit(10, $_GET['page']);
        else:
            $this->db->limit(10, 0);
        endif;
        
        $data = $this->db->get('item');
        
        /*
        if($data->num_rows () !== 0):
            return $data;
        else:
            return FALSE;
        endif;
         * 
         */
        
        return $data;
        
    }
    
    function count ()
    {
        $this->db->where('item_owner', $this->session->userdata('user_id'));
       
        $data = $this->db->get('item');
        
        return $data->num_rows ();
    }
    
    function mark_as_read()
    {
        if(isset($_GET['inbox'])):
            $data['nb_status'] = 2;
            $this->db->where('nb_id', $_GET['id']);
            $this->db->update('msg_inbox', $data);
            
            redirect(base_url('account?success=Inbox Updated'));
        elseif(isset($_GET['sys'])):
            $data['status'] = 2;
            $this->db->where('msg_id', $_GET['id']);
            $this->db->update('sys_inbox', $data);
            
            redirect(base_url('account?success=System mail Updated'));
        endif;
        
        
        
       
    }
    
    function inbox ()
    {
       $this->db->where('nb_reciever', $this->session->userdata('user_id'));
       $this->db->where('nb_id', $_GET['nb_id']);
       $inbox = $this->db->get('msg_inbox'); 
       
       foreach ($inbox -> result () as $data);
       
       echo $data->nb_id;
    }
    
    function change_pic ()
    {
        print_r($_POST);
        //if($_POST['file']):
            
        //else:
          //  redirect(base_url('account/?error=no picture selected'));
        //endif;
    }
    
        
    function sync_fb () {
        $url = 'http://graph.facebook.com/' . $this->fb_me['id'] . '/picture?type=large';
        $image_data = file_get_contents($url);
        $fileName = './avator/' . $this->fb_me['id'] . '.jpg';
        $file = fopen($fileName, 'w+');
        fputs($file, $image_data);
        fclose($file);

       redirect(base_url('account/?success=Image Updated'));
    }
    
    
}




?>
