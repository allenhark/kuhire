<?php

class Facebook_test extends CI_Controller {

    function __construct() {
        parent::__construct();

        // $this->load->add_package_path('/Users/elliot/github/codeigniter-facebook/application/');
        //$this->fb->init_facebook();
        $this->fb_me = $this->fb_ignited->fb_get_me();
    }

    function index() {
        if ($this->fb_me):

            $this->me();

        else:
            redirect(base_url('login'));
        endif;
    }

    function index_a() {

        //echo '<a href="' .$this->fb_ignited->fb_logout_url(). '">Logout</a>';

        $profile = $this->fb_ignited->api('/me/friends', 'GET');
        // echo '<img src="https://graph.facebook.com/'. $profile['id'] .'/picture" width="30" height="30"/><div>'.$profile['name'].'</div>'; 

        foreach ($profile as $data):

            foreach ($data as $key):

            // echo  '<a href="http://facebook.com/'.$key['id'].'"><img src="https://graph.facebook.com/'. $key['id'] .'/picture?type=large"/> </a><div>'.$key['name'].'</div>'; 


            endforeach;

            $t = $this->fb_ignited->api('me/mutualfriends/1045294844');

            print_r($t);

        endforeach;
    }

    function test() {

        $this->message();
    }

    function login() {
        // $this->session->userdata->destroy();
        echo '<a href="' . $this->fb_ignited->fb_login_url() . '"> Login </a>';
    }

    function me() {
        //print_r('<pre>');
        //print_r($this->fb_me['gender']);

        $d = $this->fb_me['location'] ['name'];
        $location = explode(",", $d);

        $email = trim($this->fb_me['email']);
        $data['email'] = $email;
        $facebook_id = trim($this->fb_me['id']);
        $data['facebook_id'] = $facebook_id;
        $data['first_name'] = $this->fb_me['first_name'];
        $data['last_name'] = $this->fb_me['last_name'];
        $data['username'] = $this->fb_me['username'];
        $data['location'] = trim($location[0]);
        $data['country'] = trim($location[1]);
        $data['gender'] = $this->fb_me['gender'];
        $data['facebook'] = $this->fb_me['username'];
        $data['sess'] = random_string('alnum', 16);
        $data['fb_password'] = random_string('alnum', 8);
        $data['rand'] = random_string('alnum', 18);
        $data['avator'] = $facebook_id . '.jpg';

        //Check if User Exist
        $this->db->where('email', $email);
        $uf = $this->db->get('user');

        //If user exist check if as connected
        if ($uf->num_rows === 1):

            $this->db->where('facebook_id', $facebook_id);
            $this->db->where('email', $email);
            $ff = $this->db->get('user');

            if ($ff->num_rows === 1):
                //echo 'we can log you in';
                
                $this->user->facebook_login($facebook_id, $email);
                redirect(base_url('account'));
            else:

                //Ask user to connect
                $this->connect($ff, $email, $facebook_id, $data);


            endif;


        else:

            //Check User has authorised Registration
            if (isset($_GET['connect']) == 'true'):

                $this->db->insert('user', $data);
                $this->user->facebook_login($facebook_id, $email);
                $this->GetImageFromUrl();
                $this->cron_jobs->facebook_friends();
                $this->send_notification();

                redirect(base_url('facebook/invite'));

            else:

                $data['main'] = 'facebook_connect_register';
                $data['title'] = 'Connect Kuhire to facebook';
                $data['keywords'] = '';
                $data['description'] = '';
                $data['fb_user'] = $this->fb_me;

                $this->load->view('beta/loader', $data);

            endif;

        endif;
    }

    function connect($ff, $email, $facebook_id, $data) {

        if (isset($_GET['connect']) == 'true'):

            $this->db->where('email', $email);
            $this->db->update('user', $data);

            $this->user->facebook_login($facebook_id, $email);
            $this->GetImageFromUrl();
            
             $this->cron_jobs->facebook_friends();
            $this->send_notification();

            redirect(base_url('facebook/invite'));

        else:

            $data['main'] = 'facebook_connect_register';
            $data['title'] = 'Connect Kuhire to facebook';
            $data['keywords'] = '';
            $data['description'] = '';
            $data['fb_user'] = $this->fb_me;
            $data['user'] = $this->get_user($ff);

            $this->load->view('beta/loader', $data);

        endif;
    }

    function get_user($ff) {

        foreach ($ff->result() as $data):

            return $data;

        endforeach;
    }

    function invite() {
        $data['main'] = 'facebook_connect_invite';
        $data['title'] = 'Invite friends to Kuhire';
        $data['keywords'] = '';
        $data['description'] = '';
        $data['fb_user'] = $this->fb_me;

        $this->load->view('beta/loader', $data);
    }

    function GetImageFromUrl() {
        $url = 'http://graph.facebook.com/' . $this->fb_me['id'] . '/picture?type=large';
        $image_data = file_get_contents($url);
        $fileName = './avator/' . $this->fb_me['id'] . '.jpg';
        $file = fopen($fileName, 'w+');
        fputs($file, $image_data);
        fclose($file);

        return true;
    }

    function send_notification() {
        $data = $this->fb_ignited->api('/me/feed', 'POST', array(
            'link' => 'www.Kuhire.com',
            'message' => 'I just started Using Kuhire. Join me and discover a new way to rent and hire socially',
            'description' => "Kuhire is a new way to rent and hire from my friends. Join Kuhire and Discover this Amazing experience",
            'actions' => array('name' => 'Get Started Now',
                'link' => 'http://www.Kuhire.com/login?ref=fb+post'),
            'privacy' => array('value' => 'EVERYONE')));

        return true;
    }

    function message() {
        $message = "{" . $this->fb_me['id'] . "} using Kuhire, Start using Kuhire and discover a new way to social hiring!";
        $result = $this->fb_ignited->fb_notification($message);
    }

}