<?php
foreach ($user->result () as $udata):

?>
<div class="container container-twelve">
	
<?php if($this->uri->segment('4') == 'call'):?>
	<!-- Enter Info into our database ============= -->
	
	<?php
	//Insert data into database
	$data = array(
		'call_user' => $this->session->userdata('name'),
		'call_phone' => $this->session->userdata('user_phone')
	);
	
	$this->db->insert('call_u', $data);
	
	?>
	<hr>
	<div class="twelve columns alert-success" style="font-size: 16px;">
		Our Customer Care representative will contact you shortly.
	</div>
	<hr>
	<div>
		<a href="<?=base_url('beta/user');?>" class="btn btn-info"> Click here to continue </a>
	</div>
	<hr>
<?php elseif($this->uri->segment('4') == 'resend'):?>

	<?php 
		// Process reconfirmation code
		$rand = random_string('alnum', 16);
		
		$data = array('rand' => $rand);
		$this->db->where('user_id', $this->session->userdata('user_id'));
		$this->db->update('user', $data);
		
		//send email
		//Create email 
		$body ="  
		
		Hi ".$this->session->userdata('name')."\n
		<a href='".base_url('beta/user/confirmation/'.$rand)."'> Click here to confirm your Account </a> \n <br>
		
		Or \n <br>
		
		Paste this link of your email client doe not support links. \n <br>
		".base_url('beta/user/confirmation/'.$rand)." \n <br>
		You recieved this email because you are registered on Scrobber (www.scrobber.com).
		";		
		
		$config = Array(
			'protocol' => 'smtp',
			'smtp_host' => 'mail.scrobber.com',
			'smtp_port' => 25,
			'priority' => 1,
			'useragent' => 'Scrobber Mailman',
			'smtp_user' => 'mailman.scrobber',
			'smtp_pass' => 'mailman!',
			'mailtype'  => 'html', 
			'charset' => 'utf-8',
			'wordwrap' => TRUE

   			 );
		    $this->email->initialize($config);
		    $this->email->set_newline("\r\n");
		    $email_body =$body;
		    $this->email->from('mailman@scrobber.com', 'Scrobber Mailman');
		
		    $list = array($udata->email);
		    $this->email->to($list);
		    $this->email->subject('Profile Confirmation');
		    $this->email->message($email_body);
		
		    $this->email->send();
		   // $this->email->print_debugger();
		
	?>
	
	<div class="twelve columns alert-success" style="font-size: 16px;">
		Confirmation code sent to your provided email address. <br>
		You might have to check your email spam. Some email clients confuse auto mailers for spam.
	</div>
	<hr>
<?php else:?>
	<?php if($this->uri->segment('4') != NULL):
		//Activate Profile
		$data = array('is_active'=> '1');
		$this->db->where('rand', $this->uri->segment('4'));
		$this->db->update('user', $data);
	?>
	<div class="twelve columns alert-success" style="font-size: 16px;">
		Your Profile has been Activated. Redirecting....
	</hr>
	</div>
	
	<?php redirect(base_url('beta/user'), 'refresh', '300'); endif;?>
		

<?php endif;?>

</div>
<?php endforeach;?>