<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*
 * gigwapi Notifications Handler
 * Wesend emails and all notifications fom here
 * 
 */
 class Notifications extends  CI_Model {
 	
 	function sign_up ()
	{
		$this->notifications->incomplete_profile();

	}
	
	function blocked_login ()
	{
		
	}

	function send_password_reminder ()
	{
		$this->db->where('email', $_GET['email']);
		$data = $this->db->get('users');

		if ($data -> num_rows == 0):

			$this->notifications->notify_register ();

		else:
		foreach ($data -> result () as $key);

			$hash = random_string('alnum', 16);
			$msg = "
				Dear ".$key->first_name.",
				<br>
				We have recieved your password change request.
				This email contains the information you need to change your password.
				Email Address: <b> " .$_POST['email']." </b>
				<br>
				Please Click this link to change your password: 
				<a href=".base_url('forgot/?key='.$key->sess.'&hash='.$hash)."> To change your password </a>, alternatively,
				you can paste this link on your browser to change your password.
				<br>
				".base_url('forgot/?key='.$key->sess.'&hash='.$hash)."";

			$email = $_POST['email'];
			$subject = "Password Reminder | gigwapi";

			$config['protocol'] = 'sendmail';
			$config['mailpath'] = '/usr/sbin/sendmail';
			$config['charset'] = 'iso-8859-1';
			$config['wordwrap'] = TRUE;
			$config['useragent'] = 'Allen Hark Fast';
			$config['priority'] = 1;
			$config['mailtype'] = 'html';

			$this->email->initialize($config);

			$this->email->to($email);
			$this->email->from('no-reply@gigwapi.com', 'gigwapi');
			$this->email->subject($subject);
			$this->email->message($msg);
				
			$this->email->send();

			
                        redirect (base_url('forgot/?key='.$key->sess.'&hash='.$hash));
                        
			//return true;

		endif;


	}
	
	function notify_register ()
	{

		return true;
	}

	function reset_password ()
	{
		$this->db->where('rand', $_GET['key']);
		$this->db->where('sess', $_GET['hash']);

		$data = $this->db->get('user');

		if($data -> num_rows () == 0):
			redirect( base_url('forgot/?reset=false'));
		else:
			$pass = md5($_POST['password']);
			$dat['password'] = $pass;
			$dat['sess'] = '';

			$this->db->where ('rand', $_GET['key']);
			$this->db->update('user', $dat);

			foreach ($data -> result () as $d);
			$subject ='Password Changed';
			$msg = 'You have successfully changed your password';
				$da = array(
					'reciever' => $d-> user_id,
					'subject' => $subject,
					'message' => $msg,
					'sender' => 'Max',
					'thread_unique' => $hash,		
					);
				$this -> db -> insert('sys_inbox', $da);

			redirect ( base_url('forgot/?changed=true'));

		endif;
	}

	function notify_pass_change ()
	{
		
	}

	function notify_item_added ()
	{
		return true;
	}
	
	function incomplete_profile ()
	{
		$msg = "
				Hi, ".$_POST['first_name'].", 
				<br>
				Thank you for signing up at <a href=".base_url ()."> gigwapi </a>. We appreciate you taking time to check out our services.
				<br>
				We strive to make gigwapi better and better each day for you to enjoy.
				This is to inform you that your gigwapi profile is incomplete at the moment, 
				please take your time and complete it.
				<ul>
					<h4> Why a complete profile is good </h4>
					<li> We auto generate your data </li>
					<li> Less security conserns </li>
					<li> Ability to use Max help while searching </li>
					<li> Our customer support team can easily help you incase of future misunderstanding </li>
					<li> Faster Searches </li>
					<li> <a href=".base_url('help/faq/?incomplete-profile').">Learn more </a> </li>
				</ul>

				<br>
				<hr>
				<p>
					This email was intended for ". $_POST['first_name'] .", from gigwapi Kenya Co. Contact Us info@gigwapi.com
				</p>
				";
		$sub = "welcome to Gigwapi";
		$email = $this->input->post('email');
			$subject = $sub;

			$config['protocol'] = 'sendmail';
			$config['mailpath'] = '/usr/sbin/sendmail';
			$config['charset'] = 'iso-8859-1';
			$config['wordwrap'] = TRUE;
			$config['useragent'] = 'Allen Hark Fast';
			$config['priority'] = 1;
			$config['mailtype'] = 'html';

			$this->email->initialize($config);

			$this->email->to($email);
			$this->email->from('no-reply@gigwapi.com', 'gigwapi');
			$this->email->subject($subject);
			$this->email->message($msg);
				
			$this->email->send();



		return true;

	}
	
	function get_started_guide ()
	{
		
	}
	
	function offers_and_promotion ()
	{
		
	}
	

	function event_reminder ()
	{
		
	}
	
	function event_added ()
	{
		
	}

	function payment_reciept ()
	{
		
	}
	
	function incomplete_event ()
	{
		
	}
	
	function expired_event ()
	{
		
	}
		
	
 }