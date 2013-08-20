<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

class Cron_jobs extends CI_Model {

    function __construct() {
        parent::__construct();

        $this->fb_me = $this->fb_ignited->fb_get_me();
        //$this->test();
        $this->def ();
    }

    function test() {
        $message = "James Wants to Hire Your Car";
        $result = $this->fb_ignited->fb_notification($message);
    }

    function facebook_friends() {

        $profile = $this->fb_ignited->api('me/friends');

        foreach ($profile['data'] as $data):


            $id = $data['id'];
            $me = $this->session->userdata('facebook_id');



            $this->db->where('fb_user', $me);
            $this->db->where('fb_friend', $id);
            $query = $this->db->get('fb_friends');

            $this->db->where('fb_user', $id);
            $this->db->where('fb_friend', $me);
            $query_2 = $this->db->get('fb_friends');

            //echo $query->num_rows ();

            if ($query->num_rows() == 0 & $query_2->num_rows() == 0) {
                $d = array(
                    'fb_user' => $me,
                    'fb_friend' => $id
                );



                $this->db->insert('fb_friends', $d);

                // print_r("<pre>");
                // print_r($d);
                //continue 1;
            }

        /*
          else {
          //echo 'we have added all users';
          continue 1;

          //return false;
          }
         * 
         */



        endforeach;
    }

    function friends_into_db() {
        
    }
    
    function def ()
    {
        // app definations here
        
        // Define domain for internazation
        
        $url = base_url();
        
        $segments = explode(".", $url);
        
        if (count($segments) == 3):
            define('DOMAIN', trim_slashes($segments['2']));
       elseif (count($segments) == 2):
            define('DOMAIN', trim_slashes($segments['1']));
            
        endif;
    }

}

?>
