<section id="content" class="container clearfix">
<div class="span12">
	<ul class="unstyled">
		<?php  echo  validation_errors('<li class="error">', '</li>'); ?>
		<li class="span4 well">
		<form action="<?=base_url('alternative');?>" method="post">

			<legend> Alternative Registration </legend>
			<label><i class="splashy-contact_blue"></i> Your Name </label>
            <input type="text" name="name" class="">
            <span class="help-block">Your Name</span>

            <label><i class="splashy-cellphone"></i> Phone </label>
            <input type="text" name="phone">
            <span class="help-block">Your Phone number</span>

            <label><i class="splashy-lock_large_locked"></i> Password </label>
            <input type="password" name="password">
            <span class="help-block">Your Desired Password</span>
            <hr>
            <button class="btn btn-primary" type="submit"><i class="splashy-group_blue_add"></i> Join</button>
           <a href="<?=base_url('join');?>" class="btn btn-info"><i class="splashy-group_green_add"></i> Alternative? </a>
            <hr>
            <p>You can customize your profile later. Already registered? <i class="splashy-arrow_medium_right"></i><b>
            	<a href="<?=base_url('login');?>"> Login </a></b></p>

		</form>

</li>
<li class="span5">
		<h4> About alternative registration </h4>
		<p> 
			Using alternative registration means that you cannot use our normal registration.
			<br>
			Our agents will call you using the phone number you provide and assist you create a profile.
		</p>
		<p> 
			visit our blog for more info 
			<a href="http://blog.scrobber.com/?s=alternative+registration" target="_blank"><i class="icomoon-icon-wordpress"></i> Blog <i class="icomoon-icon-redo "></i></a>

		</p>

		<p>
			 <a href="<?=base_url('contact');?>" <i class="icomoon-icon-support "></i> Contact us </a>
		</p> 

</li>
</div>
</section>