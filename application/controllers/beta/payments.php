<?php

class Payments extends CI_Controller {
	
	public function index () {
		
		redirect(base_url());
	}	
	
	public function finalize () {
		if ($this->uri->segment('2') == NULL):
			echo 'Invalid Request We will redirect you shortly';
			redirect(base_url('lunar/items'), 'refresh', '300');
		else: 
			echo 'Activating your item Please wait....<br>';
			$product = $this->uri->segment('2');
			$coupon = $_GET['coupon'];
			$secret = random_string('numeric', 6);
			//echo $secret;
			// Get rid of Coupon Code.
			$cdata= array ('c_status' => '1');
			$this->db->where('c_no', $coupon);
			$this->db->update('coupons', $cdata);
			
			//Update Item to paid
			$idata = array ('status' => '3');
			$this->db->where('item_id', $product);
			$this->db->update('item', $idata);
			
			
			//Payment Log
			$pdata = array(
				'user_id' => $this->session->userdata('user_id'),
				'payment_method' => 'Coupon Code',
				'payment_amount' => '0.00',
				'payment_ip' => $this->session->userdata('ip_address'),
				'payment_session' => $this->session->userdata('session_id'),
				'item_hook' => $product,
				'payment_uri_cloak' => current_url(),
				'payment_user_agent' => $this->session->userdata('user_agent'),
				'payment_secret' => $secret,
			);
				$this->db->insert('payment_log', $pdata);
					
			//Thats it basically. We kick the user out of here.
			echo 'Your Item has been activated';
			
			redirect(base_url('view/'.$product), 'refresh', '1600');
			
			echo "<a href=".base_url('view/'.$product)."> Click Here if your browser doesn't redirect you </a>";
		endif;
	}
}

?>