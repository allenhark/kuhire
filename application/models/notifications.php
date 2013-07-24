<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');
/*
 * Scrobber Notifications Handler
 * Wesend emails and all notifications fom here
 * 
 */

class Notifications extends CI_Model {

    function hire() {
       
    }

    function sign_up() {
        $this->notifications->incomplete_profile();
    }

    function blocked_login() {
        
    }

    function facebook_first() {
        $data = $this->fb_ignited->api('/me/feed', 'POST', array(
            'link' => 'www.scrobber.com',
            'message' => 'I just started Using Scrobber. Join me and discover a new way to rent and hire socially',
            'description' => "Scrobber is a new way to rent and hire from my friends. Join Scrobber and Discover this Amazing experience",
            'actions' => array('name' => 'Get Started Now',
                'link' => 'http://www.scrobber.com/login?ref=fb+post'),
            'privacy' => array('value' => 'EVERYONE')));

        return true;
    }

    function send_password_reminder() {
        $this->db->where('email', $_POST['email']);
        $data = $this->db->get('user');

        if ($data->num_rows == 0):

            $this->notifications->notify_register();

        else:
            foreach ($data->result() as $key)
                ;

            $hash = random_string('alnum', 16);
            $msg = "
				Dear " . $key->first_name . ",
				<br>
				We have recieved your password change request.
				This email contains the information you need to change your password.
				Email Address: <b> " . $_POST['email'] . " </b>
				<br>
				Please Click this link to change your password: 
				<a href=" . base_url('forgot/?key=' . $key->rand . '&hash=' . $hash) . "> To change your password </a>, alternatively,
				you can paste this link on your browser to change your password.
				<br>
				" . base_url('forgot/?key=' . $key->rand . '&hash=' . $hash) . "";

            $email = $_POST['email'];
            $subject = "Password Reminder | Scrobber";

            $config['protocol'] = 'sendmail';
            $config['mailpath'] = '/usr/sbin/sendmail';
            $config['charset'] = 'iso-8859-1';
            $config['wordwrap'] = TRUE;
            $config['useragent'] = 'Allen Hark Fast';
            $config['priority'] = 1;
            $config['mailtype'] = 'html';

            $this->email->initialize($config);

            $this->email->to($email);
            $this->email->from('no-reply@scrobber.com', 'Scrobber');
            $this->email->subject($subject);
            $this->email->message($msg);

            $this->email->send();

            $data = array(
                'reciever' => $key->user_id,
                'subject' => $subject,
                'message' => $msg,
                'sender' => 'Max',
                'thread_unique' => $hash,
            );
            $this->db->insert('sys_inbox', $data);

            $dt['sess'] = $hash;
            $this->db->where('email', $_POST['email']);
            $data['sess'] = $hash;
            $this->db->update('user', $dt);


            return true;

        endif;
    }

    function notify_register() {

        return true;
    }

    function reset_password() {
        $this->db->where('rand', $_GET['key']);
        $this->db->where('sess', $_GET['hash']);

        $data = $this->db->get('user');

        if ($data->num_rows() == 0):
            redirect(base_url('forgot/?reset=false'));
        else:
            $pass = md5($_POST['password']);
            $dat['password'] = $pass;
            $dat['sess'] = '';

            $this->db->where('rand', $_GET['key']);
            $this->db->update('user', $dat);

            foreach ($data->result() as $d)
                ;
            $subject = 'Password Changed';
            $msg = 'You have successfully changed your password';
            $da = array(
                'reciever' => $d->user_id,
                'subject' => $subject,
                'message' => $msg,
                'sender' => 'Max',
                'thread_unique' => $hash,
            );
            $this->db->insert('sys_inbox', $da);

            redirect(base_url('forgot/?changed=true'));

        endif;
    }

    function notify_pass_change() {
        $data = array(
            'reciever' => $key->user_id,
            'subject' => $subject,
            'message' => $msg,
            'sender' => 'Max',
            'thread_unique' => $hash,
        );
        $this->db->insert('sys_inbox', $data);
    }

    function notify_item_added() {
        return true;
    }

    function incomplete_profile() {
        $msg = "
				Hi, " . $_POST['first_name'] . ", 
				<br>
				Thank you for signing up at <a href=" . base_url() . "> Scrobber </a>. We appreciate you taking time to check out our services.
				<br>
				We strive to make Scrobber better and better each day for you to enjoy.
				This is to inform you that your Scrobber profile is incomplete at the moment, 
				please take your time and complete it.
				

				<br>
				<hr>
				<p>
					This email was intended for " . $_POST['first_name'] . ", from Scrobber Kenya. Contact Us hi@scrobber.com
				</p>
				";

        $sub = "Incomplete Profile";
        $thread = random_string('alnum', 16);

        $this->db->where('rand', $_POST['sess']);
        $d = $this->db->get('user');

        foreach ($d->result() as $key)
            ;

        $data = array(
            'reciever' => $key->user_id,
            'subject' => $sub,
            'message' => $msg,
            'sender' => 'Antony Gitonga',
            'thread_unique' => $thread
        );
        $this->db->insert('sys_inbox', $data);

        return true;
    }

    function get_started_guide() {
        
    }

    function offers_and_promotion() {
        
    }

    function hire_contact() {
        
    }

    function hire_reminder() {
        
    }

    function rating_request() {
        
    }

    function incoplete_search() {
        
    }

    function hire_registration() {
        
    }

    function item_added() {
        
    }

    function payment_reciept() {
        
    }

    function incomplete_item() {
        
    }

    function expired_item() {
        
    }

    function send_hire_mail() {
        $subject = 'Hire inquiry for &nbsp;' . $_POST['item_name'];

        // Create Email
        $body = "
			Hi " . $_POST['o_name'] . ", <br>
			Am " . $_POST['name'] . ", and am interrested in hiring " . $_POST['item_name'] . " posted on 
			Scrobber (www.scrobber.com). If possible contact me as soon as you can we discuss the terms of hiring the item.
			<br>
			You may respond directly to this email to contact the sender.
			<br>
			This mail originated from scrobber.com. Login into your account to view this message.
			(http://www.scrobber.com/login?ref=email_notification&next=account).
			";

        $config = Array(
            'protocol' => 'sendmail',
            'smtp_host' => '54.235.155.5',
            'smtp_port' => 25,
            'priority' => 1,
            'useragent' => 'Scrobber Swift',
            'smtp_user' => 'swift.scrobber',
            'smtp_pass' => 'swiftmailer!',
            'mailtype' => 'html',
            'charset' => 'utf-8',
            'wordwrap' => TRUE
        );

        $this->email->initialize($config);
        $this->email->set_newline("\r\n");
        $email_body = $body;
        $this->email->from($_POST['email'], 'Scrobber Rentals Mailman');
        $list = array($_POST['user_email']);
        $this->email->to($list);
        $this->email->subject($subject);
        $this->email->message($email_body);

        $this->email->send();
        //$this->email->print_debugger();
        return true;
    }

}