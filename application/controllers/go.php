<?php
/*
 * Class Go
 * URL redirection script
 * capable of settig sessions and other complex functions
 */
	class Go extends  CI_Controller {
		
		public function index ()
		{
			$this->go();			
		}
		
		public function go ()
		{
			if(!$_GET):
				$this->go_page ();
			else:

				if($_GET['ref']):
					$this->data->track_urls ();
				endif;

				/*
				 * redirect to the requested page
				 * Vars
				 * : base_url == Site path
				 * : ref == Refering page
				 * : redirect == where to redirect the user.
				*/

				if($_GET['url'] == 'base_url'):
					//redirect link
					$url = base_url($_GET['link_1'].'/'.$_GET['redirect']);
					
					redirect ($url);
				endif; 

			endif;
		}
		
		public function session ()
		{
			/*
			 * Creates auto login sessions
			 * Vars $_get: 
			 * 		validity:
			 * 			1: Usable Once
			 * 			2: Ussable twice
			 * 			0: Permanent Session (Can be altered by changing validity next time)
			 * 		notify :
			 * 			true: Notifys the user that they have used an auto login link
			 * 			false: noting happens
			 * 		key:
			 * 			Session Key
			 * 		ref:
			 * 			Refering URL
			 * 			Must exist in A. Hark database as a non spaming url
			 * 		to:
			 * 			dashboard: User dashboard
			 * 			payment_log: User Payment Log
			 * 			profile: User Edit Profile
			 * 			security_pass: Userchange Pass
			 * 			item: Takes User to a certain item
			 * 				attachment: item number
			 * 			message: takes user to a certain message
			 * 				msg: Message Hash
			 * 			url: Takes User to a defined Url
			 * 				link: Url to go to
			 * 			exit: Takes user to front page
			 */
		}
		
		
		public function go_page ()
		{
			echo '
			The resource you are trying to reach is invalid or blocked by Allen Hark, email go@allenhark.com for further assistance.
			
			';
		}
	}
?>