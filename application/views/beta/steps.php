<?php if($this->session->userdata('logged_in')):
?>

<div class="span12 row-fluid clearfix">
	<?php redirect(base_url('lunar/items'), 'refresh', '300')?>
</div>

<?php else: ?>

<?php if($this->uri->segment('2') == NULL):?>
	<div id="pageinfo">

	<div class="container container-twelve">

		<div class="pagetitle eight columns">
			<h1> We couldn't Undestand your request. You might have tampered with the browser links. Try again or contact customer support.</h2>

		</div>

		<div class="clear"></div>

	</div>
	<hr>
</div><!-- //pageinfo -->

<?php else:?>
<div class="clear"></div>
<div id="pageinfo">

	<div class="container container-twelve">

		<div class="pagetitle eight columns">
			<h1> Create an account</h1><h2>Step 2</h2>

		</div>

		<div class="clear"></div>

	</div>

</div><!-- //pageinfo -->
<div class="clear"></div>

<div class="container container-twelve">
	<div class="six columns">
		<h4>
			Create an account to proceed!
		</h4>
		<?php echo validation_errors(); ?>
		<form action="<?= base_url('uregister/'.$this->uri->segment('2')); ?>" method="post">

			<h5> First Name</h5>
			<input type="text" name="first_name" placeholder="Your First Name" style="height: 25px;" />
			<span class="help-block"> Your First Name</span>
			
			<h5> Last Name</h5>
			<input type="text" name="last_name" placeholder="Your Last Name" style="height: 25px;" />
			<span class="help-block"> Your Last Name</span>
			
			<h5> Phone Number</h5>
			<input type="text" name="phone" placeholder="Your Phone Number" style="height: 25px;" />
			<span class="help-block"> Phone Number</span>
			
			<h5> ID Number</h5>
			<input type="text" name="id_no" placeholder="Your ID Number" style="height: 25px;" />
			<span class="help-block"> Your National ID number</span>
		</div>
		
		<div class="six columns">
			<h5> Email Address</h5>
			<input type="text" name="email" placeholder="Your Email Address" style="height: 25px;" />
			<span class="help-block"> Your Email Address</span>
			
			<h5> Password</h5>
			<input type="password" name="password" placeholder="Password" style="height: 25px;" />
			<span class="help-block"> Your Passsword</span>
			
			<h5> Password again</h5>
			<input type="password" name="password_cnf" placeholder="Password Again" style="height: 25px;" />
			<span class="help-block"> Your password Again</span>
			
			<hr>
			<input type="hidden" name="sess" value="<?=$this->uri->segment('4');?>">
			<button type="submit" class="btn btn-success btn-large"><i class="brocco-icon-checkmark"></i> Create</button> Or
			<a href="<?=base_url('temp_login/'.$this->uri->segment('2'));?>" class="btn btn-large btn-info"><i class="eco-locked"></i> Login </a>
		</form>

	</div>

	
	
	<hr>
</div>
<?php endif;endif; ?>

