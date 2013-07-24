<?php
/*
Validator, I dont like models so I use it here
What we do here is validate user details
Notify of Uncoplete profile,
Notifications ETC
we use exit statement to stop page load. 


	$user = $this->session->userdata('user_id');
	$this->db->where('user_id', $user);
	$query = $this->db->get('user');
	foreach ($query->result () as $qvl):

		if ($qvl->id_no == "0"):
			echo 'test';
			redirect(base_url('dashboard/roadblock/id/'.$qvl->user_id));
		exit();
		endif;

	endforeach;
	
*/

?>