<?php if($this->uri->segment('2') == NULL):
redirect(base_url('login'));
else:
?>
<div class="twelve-collums container">
	<div class="six columns ">
	<h4> Login to continue</h4>
	<?php echo validation_errors(); ?>
		<form action="<?= base_url('temp_login/'.$this->uri->segment('2')); ?>" method="post">
			<h5><i class="eco-user"></i> Email</h5>
			<input type="text" name="login" placeholder="" style="height: 25px;" />
			<span class="help-block"> Your email address</span>
			
			<h5><i class="eco-locked"></i> Password</h5>
			<input type="password" name="password" placeholder="" style="height: 25px;" />
			<span class="help-block"> Your Password</span>
		<hr>
			<input type="hidden" name="sess" value="<?=$this->uri->segment('2');?>">
			<button class="btn btn-info btn-large" type="submit"><i class="entypo-icon-unlocked"></i> Login</button>
			<a href="<?=base_url('steps/'.$this->uri->segment('2'));?>" class="btn btn-primary btn-large"><i class="eco-link"></i> Register</a>
			
		<hr>
		
		<p>
			Complete Your Profile. 
		</p>
	</div>
	
	<div class="six columns ">
		
	</div>
	<hr>
</div>
<?php endif;?>