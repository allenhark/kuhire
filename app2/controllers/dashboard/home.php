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
  AG group member((
    
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
    class Home extends CI_Controller {
      function _construct ()
      {
        parent::_construct();
        
      }
              
        public function mail () {
            $data ['main'] = 'msg';
            $data['title'] = 'Scrobber Inbox';
            $this->load->view('dashboard/loader', $data);
        }

        public function index () {
          $data['user_id'] = $this->session->userdata('user_id');
          $data ['main'] = 'dashboard';
          $data['title'] = 'Scrobber Dashboard';
          $this->load->view('dashboard/loader', $data);

        }
}

?>
