<?php
if($this->session->userdata('logged_in')):
    $d['inbox'] = $this->user->get_unread_mail();
    $d['system'] = $this->user->get_unread_system_mail();
endif;
$d['sidebar'] = $this->data->latest_4 ();
$d['footer'] = $this->data->latest_3 ();
$this->load->view('peach/header', $d);
$this->load->view('peach/nav');
$this->load->view('peach/'.$main);
$this->load->view('peach/footer');

?>