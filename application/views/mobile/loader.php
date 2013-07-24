<?php

/*
 Author:     Antony Gitonga
 antony.g@allenhark.com
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
 http://www.mint.allenhark.com
 mint@scrobber.com

 Copyrights: Scrobber AG
 copyrights@allenhark.com
 allenhark Universal Mint Handler

 Mint:       Scrobber/allenhark
 Governing laws: Kenyan Laws.
 http://www.mint.scrobber.com
 antony.g@allenhark.com

 */

 
 // Mobile  Loader
 
$this -> load -> view('mobile/header', $title, $main);
$this -> load -> view('mobile/nav');
$this -> load -> view('mobile/' . $main);
//$this -> load -> view('lunar/sidebar');
$this -> load -> view('mobile/footer');
//$this->load->view('lunar/validator');

?>