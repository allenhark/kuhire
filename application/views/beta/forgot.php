<div class="container container-twelve" style="margin-top: 10px; min-height: 400px; height: auto; ">
	
	<div class="two columns"> &nbsp;  </div>

	<div class="seven columns">

		<?php if(isset($_GET['sent'])):?>
			<p class="alert block">
				A reminder email has been sent to your provided email address
			</p>

		<?php elseif(isset($_GET['changed'])):?>
			<p class="alert block">
					Password Has beed changed
					<br>
					<a class="btn btn-info" href="<?=base_url('login');?>">
						Login
					</a>
			</p>
		<?php elseif(isset($_GET['reset'])):?>
			<p class="alert block">
				We were unable to reset your password at this time, Contact Customer Care for more assistance.
				<a href="<?=base_url('help/contact-us');?>"> Contact Us </a>.
			</p>


		<?php elseif(isset($_GET['key'])):?>

		<p class="alert">
			Change Password 
		</p>
		<?php if(validation_errors()):?>
			<ul>		
				<li class="alert-warning">
					<?php echo validation_errors(); ?>
				</li>
			</ul>
		<?php endif;?>
		<form  method="post">
			<div class="input">
				<label> New Password</label>
				<input type="password" name="password" class="four columns" style="height: 30px;"/>
			</div>

			<div class="clear"></div>

			<div class="input">
				<label> Password Confirmation </label>
				<input type="password" name="password_cnf" class="four columns" style="height: 30px;"/>
			</div>

			<div class="clear"></div>

			<button type="submit" class="btn btn-large btn-info"> Change</button>

		</form>

		<?php else:?>
		<h3> Password Reminder </h3>
		<?php if(validation_errors()):?>
			<ul>		
				<li class="alert-warning">
					<?php echo validation_errors(); ?>
				</li>
			</ul>
		<?php endif;?>
		<form method="post" action="<?=base_url('forgot');?>">
			<label> Email Address *</label>

			<input type="text" name="email" class="four columns" style="height: 30px;"/>

			
			<div class="clear"> <br></div>

			<button type="submit" class="btn btn-warning btn-large"> Reset</button>
			&nbsp;
			Or
			&nbsp;
			<a href="<?=base_url('login');?>" > Login </a>
		</form>

		<?php endif; ?>

	</div>
</div>