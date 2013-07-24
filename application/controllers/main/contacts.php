<?php

class contact extends Controller {
public function __construct()
{
parent::Controller();
}

public function index()
{
$mail_sent = false;
if ($this->input->post(‘q’))
{
# Loading email library of Codeigniter
$this->load->library(‘email’);
# Loading configuration file mail_config.php
$this->config->load(‘mail_config’,true);
# Setting email address and name of the person sending the email
$this->email->from($this->input->post(‘from’),$this->input->post(‘name’));
# Setting email address of the recipient
$this->email->to($this->config->item(‘to’,‘mail_config’));
# Setting email subject
$this->email->subject($this->input->post(‘subject’));
# Setting email message body
$this->email->message($this->input->post(‘message’,true));
# If mail sending successful
if ($this->email->send())
{
# If $mail_sent = true; it will show a success message.
$mail_sent = true;
}
}
# Showing Contact Form
$this->load->view(‘contact_form’,array(‘mail_sent’=>$mail_sent));
}
}

?>