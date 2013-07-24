<?php

class User extends CI_Model {

    public function __construct() {
        parent::__construct();
       // //$this->fb_me = $this->fb_ignited->fb_get_me();
    }

    function get_user() {
        $d = $this->user->get_data();
        $data['main'] = 'user';
        $data['title'] = $d->first_name . '\'s  profile | Scrobber';
        $data['keywords'] = 'Listings for hire by ' . $d->first_name;
        $data['description'] = '';
        $data['user'] = $this->user->get_data();
        $data['item'] = $this->get_item_data();
       
        
        $this->load->view('loader', $data);
    }
    
    function get_front_page ()
    {
        
    }
    
    function notify_item_added($data)
    {
        /*
        $data = $this->fb_ignited->api('/me/feed', 'POST', array(
            'link' => base_url($data['slug']),
            'message' =>  'Hire my '.$data['name'].' on Scrobber. For just '.$data['item_price'],
            'description' => $data['desc'],
            'actions' => array('name' => 'Hire now',
                'link' => base_url($data['slug'])),
            'privacy' => array('value' => 'EVERYONE')));
            
         * 
         */
        return true;
    }
    
    
    function facebook_login($facebook_id, $email) {
        //Process facebook login
        $this->db->where('facebook_id', $facebook_id);
        $this->db->where('email', $email);
        $ff = $this->db->get('user');

        foreach ($ff->result() as $rows) {
            //add all data to session
            $newdata = array('user_id' => $rows->user_id, 'user_phone' => $rows->phone, 'id_no' => $rows->id_no, 'user_name' => $rows->username, 'first_name' => $rows->first_name, 'user_email' => $rows->email, "user_status" => $rows->status, "name" => $rows->first_name . '&nbsp;' . $rows->last_name, 'logged_in' => TRUE, 'facebook_id' => $rows->facebook_id);
        
            $this->session->set_userdata($newdata);
        }
        
            
        
        return true;
    }
    
    function common_friends ($fb_user, $fb_id)
    {
        //$fb_user = 100000797288607; #for testing
        //$fb_id = 1453221333; #for testing
        $data = $this->fb_ignited->api('/'.$fb_user.'/mutualfriends/'.$fb_id, 'GET');
        
        
        
        $sanitized = $data['data']; 
        if(count($sanitized) !== 0):
            $fb['count'] = count($sanitized);
            $fb['friend'] = random_element($sanitized);
            
            
            
           return $fb;
        endif;
        
    }
    
    function search_user ($id)
    {
        $this->db->where('user_id', $id);
        $data = $this->db->get('user');
        
        foreach ($data -> result () as $user):
            if($user->facebook_id == 0):
                return false;
            else:
                return $user;
            endif;
        endforeach;
        
    }
    
    function are_friends($fb_user, $fb_id)
    {
        //Checks if two users are friends
        $this->db->where('fb_user', $fb_id);
            $this->db->where('fb_friend', $fb_user);
            $query = $this->db->get('fb_friends');
            
            $this->db->where('fb_user', $fb_user);
            $this->db->where('fb_friend', $fb_id);
            $query_2 = $this->db->get('fb_friends');
            
           //echo $query->num_rows ();

            if ($query->num_rows() == 1 | $query_2->num_rows() == 1) {
                return true;
            }
            
            else {
                return false;
            }
    }

    function get_logged_in_user_data() {
        $this->db->where('user_id', $this->session->userdata('user_id'));
        $d = $this->db->get('user');

        foreach ($d->result() as $data)
            ;

        return $data;
    }

    function get_system_mail() {
        $this->db->where('reciever', $this->session->userdata('user_id'));
        $sys_mail = $this->db->get("sys_inbox");

        return $sys_mail;
    }

    function get_nots_mail() {
        $this->db->where('reciever', $this->session->userdata('user_id'));
        $sys_mail = $this->db->get("sys_nots");

        return $sys_mail;
    }

    function get_unread_mail() {
        $this->db->where('nb_reciever', $this->session->userdata('user_id'));
        $this->db->where('nb_status', '1');
        $inbox = $this->db->get('msg_inbox');

        return $inbox;
    }
    
    function get_mail() {
        $this->db->where('nb_reciever', $this->session->userdata('user_id'));
        $this->db->where_not_in('nb_status', '0');
        $inbox = $this->db->get('msg_inbox');

        return $inbox;
    }

    function get_unread_system_mail() {
        $this->db->where('reciever', $this->session->userdata('user_id'));
        $this->db->where('status', '1');
        $sys = $this->db->get('sys_inbox');

        return $sys;
    }

    function get_items() {
        $this->db->where('item_owner', $this->session->userdata('user_id'));
        $item_data = $this->db->get('item');

        return $item_data;
    }

    function agency() {
        
    }

    function company() {
        
    }

    function get_data() {
        $this->db->where('rand', $this->uri->segment(2));
        $d = $this->db->get('user');

        if ($d->num_rows == 0):
            show_404();
        else:
            foreach ($d->result() as $data)
                ;

            return $data;
        endif;
    }

    function get_item_data() {
        $d = $this->get_data();

        $this->db->where('status', 3);
        $this->db->where('item_owner', $d->user_id);
        $this->db->order_by('item_id', 'desc');
        $data = $this->db->get('item');

        return $data;
    }

}

?>