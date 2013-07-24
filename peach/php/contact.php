<?php if ( !isset( $_SESSION ) ) session_start();

	if ( !$_POST ) exit;
	
	if ( !defined( "PHP_EOL" ) ) define( "PHP_EOL", "\r\n" );
	
	// Get email address
	require_once 'config.php';
	
	/* ---------------------------------------------------------------------- */
	/*	Do not edit the following lines
	/* ---------------------------------------------------------------------- */
	
	$postValues = array();
	foreach ( $_POST as $first_name => $value ) {
		$postValues[$first_name] = trim( $value );
	}
	extract( $postValues );
	
	/* ---------------------------------------------------------------------- */
	/*	Important Variables
	/* ---------------------------------------------------------------------- */
	$posted_verify = isset( $postValues['verify'] ) ? md5( $postValues['verify'] ) : '';
	$session_verify = !empty($_SESSION['jigowatt']['ajax-extended-form']['verify']) ? $_SESSION['jigowatt']['ajax-extended-form']['verify'] : '';
	
	$error = '';
	
	/* ---------------------------------------------------------------------- */
	/* Begin verification process
	/* You may add or edit lines in here.
	/* To make a field not required, simply delete the entire if statement for that field.
	/* ---------------------------------------------------------------------- */
	
	
	/* ---------------------------------------------------------------------- */
	/*	First Name field is required
	/* ---------------------------------------------------------------------- */
	if ( empty( $first_name ) ) {
		$error .= '<li>Your first name is required.</li>';
	}
	
	/* ---------------------------------------------------------------------- */
	/*	Last Name field is required
	/* ---------------------------------------------------------------------- */
	if ( empty( $last_name ) ) {
		$error .= '<li>Your last name is required.</li>';
	}
	
	/* ---------------------------------------------------------------------- */
	/*	Email field is required
	/* ---------------------------------------------------------------------- */
	if ( empty( $email ) ) {
		$error .= '<li>Your e-mail address is required.</li>';
	} elseif ( !isEmail( $email ) ) {
		$error .= '<li>You have entered an invalid e-mail address.</li>';
	}
	
	/* ---------------------------------------------------------------------- */
	/*	Phone field is required
	/* ---------------------------------------------------------------------- */
	if ( empty( $phone ) ) {
		$error .= '<li>Your phone number is required.</li>';
	} elseif ( !is_numeric( $phone ) ) {
		$error .= '<li>Your phone number can only contain digits.</li>';
	}
	
	/* ---------------------------------------------------------------------- */
	/*	Comments field is required
	/* ---------------------------------------------------------------------- */
	if ( empty( $comments ) ) {
		$error .= '<li>You must enter a message to send.</li>';
	}
	
	/* ---------------------------------------------------------------------- */
	/*	Verification code is required
	/* ---------------------------------------------------------------------- */
	if ( $session_verify != $posted_verify ) {
		$error .= '<li>The verification code you entered is incorrect.</li>';
	}
	
	if ( !empty($error) ) {
		echo '<div class="alert alert-error"><button type="button" class="close" data-dismiss="alert"> × </button><h4>Attention! Please correct the errors below and try again.</h4>';
		echo '<ul class="error_messages">' . $error . '</ul>';
		echo '</div>';
	
		// Important to have return false in here.
		return false;
	
	}
	
	
	/* ---------------------------------------------------------------------- */
	/* Advanced Configuration Option.
	/* i.e. The standard subject will appear as, "You've been contacted by John Doe."
	/* ---------------------------------------------------------------------- */
	
	$e_subject = "You've been contacted by: " . $first_name;
	
	/* ---------------------------------------------------------------------- */
	/* Advanced Configuration Option.
	/* You can change this if you feel that you need to.
	/* Developers, you may wish to add more fields to the form, in which case you must be sure to add them here. 
	/* ---------------------------------------------------------------------- */
	
	$msg  = "You have been contacted by $first_name, they passed verification and their message is as follows." . PHP_EOL . PHP_EOL;
	$msg .= $comments . PHP_EOL . PHP_EOL;
	$msg .= "You can contact $first_name $last_name via email, $email or via phone $phone." . PHP_EOL . PHP_EOL;
	$msg .= "-------------------------------------------------------------------------------------------" . PHP_EOL;
	$msg .= "This message was sent to you via the Peach Realestate AJAX Contact Form";
	
	$msg = wordwrap( $msg, 70 );
	
	$headers  = "From: $email" . PHP_EOL;
	$headers .= "Reply-To: $email" . PHP_EOL;
	$headers .= "MIME-Version: 1.0" . PHP_EOL;
	$headers .= "Content-type: text/plain; charset=utf-8" . PHP_EOL;
	$headers .= "Content-Transfer-Encoding: quoted-printable" . PHP_EOL;
	
	if ( mail( $your_email_address, $e_subject, $msg, $headers ) ) {
	
		echo "<fieldset>";
		echo "<div class='alert alert-success'>";
		echo "<h1>Email Sent Successfully.</h1>";
		echo "<p>Thank you <strong>$first_name</strong>, your message has been submitted to us.</p>";
		echo "</div>";
		echo "</fieldset>";
	
		// Important to have return false in here.
		return false;
	
	}
	
	/* ---------------------------------------------------------------------- */
	/*	Do not edit below this line
	/* ---------------------------------------------------------------------- */
	echo 'ERROR! Please confirm PHP mail() is enabled.';
	return false;
	
	function isEmail( $email ) { // Email address verification, do not edit.
	
		return preg_match( "/^[-_.[:alnum:]]+@((([[:alnum:]]|[[:alnum:]][[:alnum:]-]*[[:alnum:]])\.)+(ad|ae|aero|af|ag|ai|al|am|an|ao|aq|ar|arpa|as|at|au|aw|az|ba|bb|bd|be|bf|bg|bh|bi|biz|bj|bm|bn|bo|br|bs|bt|bv|bw|by|bz|ca|cc|cd|cf|cg|ch|ci|ck|cl|cm|cn|co|com|coop|cr|cs|cu|cv|cx|cy|cz|de|dj|dk|dm|do|dz|ec|edu|ee|eg|eh|er|es|et|eu|fi|fj|fk|fm|fo|fr|ga|gb|gd|ge|gf|gh|gi|gl|gm|gn|gov|gp|gq|gr|gs|gt|gu|gw|gy|hk|hm|hn|hr|ht|hu|id|ie|il|in|info|int|io|iq|ir|is|it|jm|jo|jp|ke|kg|kh|ki|km|kn|kp|kr|kw|ky|kz|la|lb|lc|li|lk|lr|ls|lt|lu|lv|ly|ma|mc|md|me|mg|mh|mil|mk|ml|mm|mn|mo|mp|mq|mr|ms|mt|mu|museum|mv|mw|mx|my|mz|na|name|nc|ne|net|nf|ng|ni|nl|no|np|nr|nt|nu|nz|om|org|pa|pe|pf|pg|ph|pk|pl|pm|pn|pr|pro|ps|pt|pw|py|qa|re|ro|ru|rw|sa|sb|sc|sd|se|sg|sh|si|sj|sk|sl|sm|sn|so|sr|st|su|sv|sy|sz|tc|td|tf|tg|th|tj|tk|tm|tn|to|tp|tr|tt|tv|tw|tz|ua|ug|uk|um|us|uy|uz|va|vc|ve|vg|vi|vn|vu|wf|ws|ye|yt|yu|za|zm|zw)$|(([0-9][0-9]?|[0-1][0-9][0-9]|[2][0-4][0-9]|[2][5][0-5])\.){3}([0-9][0-9]?|[0-1][0-9][0-9]|[2][0-4][0-9]|[2][5][0-5]))$/i", $email );
	
	}
?>
