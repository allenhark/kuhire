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
if ($this->session->userdata('logged_in')){

$this -> load -> view('dashboard/header', $title, $main);
$this -> load -> view('dashboard/nav');
$this -> load -> view('dashboard/' . $main);
$this -> load -> view('dashboard/sidebar');
$this -> load -> view('dashboard/footer');
//$this->load->view('dashboard/validator');
}else {
		redirect (base_url("landing/login"));

}
exit ();
?>