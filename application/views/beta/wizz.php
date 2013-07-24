<?php
foreach ($user->result () as $udata):
if($this->uri->segment('4') == null | $this->uri->segment('4') == "step1"):
?>
<div id="pageinfo">

	<div class="container container-twelve">

		<div class="pagetitle eight columns">

			<h1> Profile Wizard.</h1><h2> Creates like magic!</h2>&nbsp;<i class="icomoon-icon-meter-slow"></i> Step 1

		</div>

		<div class="clearfix clear "></div>

	</div>

</div>
<hr />

<div class="container container-twelve">

	<legend class="align-center">
		Profile Information.
	</legend>
	<br />
	<?php echo validation_errors(); ?>
	
	<?php if ($udata->username == NULL):?>
	<div class="alert-attention">
		<h3> You do not have an username. Create one to proceed.</h3>
	</div>
	<div class="eight columns">
		<?php echo validation_errors(); ?>
		<form action="<?= base_url('beta/user/username'); ?>" method="post">
			<h5><i class="icomoon-icon-user-2"></i> Username</h5>
			<input type="text" name="username" style="height: 25px;" placeholder="Username" >
			<span class="help-block"> Username</span>
			<p>
				Create a username to proceed.
			</p>
			<br />

			<button type="submit" class="btn btn-info">
				<i class="splashy-check"></i> Create
			</button>
		</form>

	</div>
	<?php exit(); ?>
	<?php endif; ?>
	
	<form action="<?=base_url('beta/user/wizz/step1');?>" method="post">
		
		<div class=" six columns">
			<h5><i class="icomoon-icon-user-2"></i> First name</h5>
			<input type="text" name="first_name" style="height: 25px;" placeholder="Your first Name" value="<?= $udata -> first_name; ?>">
			<span class="help-block"> Your First Name</span>
	
			<h5><i class="icomoon-icon-user-2"></i> Last name</h5>
			<input type="text" name="last_name" style="height: 25px;" placeholder="Your Last Name" value="<?= $udata -> last_name; ?>">
			<span class="help-block"> Your Last Name</span>
	
			<h5><i class="icomoon-icon-mail-2"></i> Email Address</h5>
			<input type="text" name="email" style="height: 25px;" placeholder="Your Email Address" value="<?= $udata -> email; ?>">
			<span class="help-block"> Email Address</span>
	
		</div>
	
		<div class="six columns">
	
			<h5><i class="wpzoom-phone"></i> Phone Number</h5>
			<input type="text" name="phone" style="height: 25px;" placeholder="Your Phone Number" value="<?= $udata -> phone; ?>">
			<span class="help-block"> Phone Number</span>
	
			<h5><i class="splashy-hcard"></i> Id Number</h5>
			<input type="text" name="id_no" style="height: 25px;" placeholder="Your ID Number" value="<?= $udata -> id_no; ?>">
			<span class="help-block"> Your ID Number</span>
	
			<h5><i class="splashy-marker_rounded_grey_2"></i> Location</h5>
			<input type="text" name="location" style="height: 25px;" placeholder="Your Location" value="<?= $udata -> location; ?>">
			<span class="help-block"> Your Location</span>
	
		</div>
	
		<hr>
		<div class="align-center">
			<button type="submit" class="btn btn-large btn-info">
				<i class="icomoon-icon-arrow-right-5"></i> Step2
			</button>
			<a class="btn btn-large disabled" title="You cannot skip this step!"><i class="icomoon-icon-forward "></i> Skip</a>
			<a class="btn btn-large btn-warning" title="Cancel" href="<?= base_url('beta/user'); ?>"><i class="  icomoon-icon-backspace-2 "></i> Cancel</a>
		</div>
	</form>

</div>

<?php elseif($this->uri->segment('4') == "step2"): ?>
<div id="pageinfo">

	<div class="container container-twelve">

		<div class="pagetitle eight columns">

			<h1> Profile Wizard.</h1><h2> Creates like magic!</h2>&nbsp;<i class="icomoon-icon-meter-medium "></i> Step 2

		</div>

	</div>

</div>
<hr>
<div class="container container-twelve">

	<legend class="align-center">
		Your Preferences
	</legend>
	<br />
	<?php echo validation_errors(); ?>
<form method="Post">
	<div class=" six columns">
		<h5><i class="wpzoom-location"></i> City</h5>
		<input type="text" name="city" style="height: 25px;" placeholder="Local City" value="<?= $udata -> city; ?>">
		<span class="help-block"> Your Local City</span>

		<h5><i class="eco-location"></i> Country</h5>
		<input type="text" name="country" style="height: 25px;" placeholder="Your Country" value="<?= $udata -> country; ?>">
		<span class="help-block"> Your Country</span>

		<h5><i class="wpzoom-info"></i> Base Currency</h5>
		<input type="text" name="currency" style="height: 25px;" placeholder="Base Currency" value="<?= $udata -> currency; ?>">
		<span class="help-block"> Your Base Currency</span>

	</div>

	<div class="six columns">

		<h5><i class="wpzoom-earth"></i> Language</h5>
		<select name="language">
			<option value="en"> English</option>
			<option value="swa"> Swahili</option>
			<option value="es"> Spanish</option>
			<option value="cn"> Chinese</option>
		</select>
		<span class="help-block"> Your Language</span>

		<h5><i class="splashy-marker_rounded_grey_2"></i> Profile Signature</h5>
		<textarea name="sign" class=" auto-size"><?= $udata -> sign; ?></textarea>
		<span class="help-block"> Sign all your outgoing messages.</span>

	</div>

	<hr>
	<div class="align-center">
		<button type="submit" class="btn btn-large btn-info" title="Save and Continue">
			<i class="icomoon-icon-arrow-right-5"></i> Step3
		</button>
		<a class="btn btn-large" title="Jump to Step3" href="<?= base_url('beta/user/wizz/step3'); ?>"><i class="icomoon-icon-forward "></i> Skip</a>
		<a class="btn btn-large btn-warning" title="Cancel" href="<?= base_url('beta/user'); ?>"><i class="  icomoon-icon-backspace-2 "></i> Cancel</a>
	</div>
</form>
	<hr>

</div

<?php elseif($this->uri->segment('4') == "step3"): ?>

<div id="pageinfo">

	<div class="container container-twelve">

		<div class="pagetitle eight columns">

			<h1> Profile Wizard.</h1><h2> Creates like magic!</h2>&nbsp;<i class="icomoon-icon-meter-fast"></i> Step 3

		</div>

	</div>

</div>
<hr>

<legend class="align-center">
	Optional Settings.
</legend>
<br />
<div class="container container-twelve">
	<?php echo validation_errors(); ?>
	<form method="post">
	<div class="six columns">

		<h5><i class="icomoon-icon-facebook-3"></i> Facebook</h5>
		<input type="text" name="facebook" style="height: 25px;" placeholder="FB USername" value="<?= $udata -> facebook; ?>">
		<span class="help-block"> http://facebook.com/Username.</span>

		<h5><i class="icomoon-icon-twitter-2"></i> Twitter</h5>
		<input type="text" name="twitter" style="height: 25px;" placeholder="Twitter Link" value="<?= $udata -> twitter; ?>">
		<span class="help-block"> http://twitter.com/Username</span>

		<h5><i class="icomoon-icon-google-plus"></i> Google Plus</h5>
		<input type="text" name="plus" style="height: 25px;" placeholder="Plus Link" value="<?= $udata -> plus; ?>">
		<span class="help-block"> http://plus.google.com/Profile ID</span>

	</div>

	<div class="six columns">

		<h5><i class="icomoon-icon-skype"></i> Skype</h5>
		<input type="text" name="skype" style="height: 25px;" placeholder="Skype Name" value="<?= $udata -> skype; ?>">
		<span class="help-block"> Your Skype name</span>

		<div class="control-group ">
			<label class="control-label"><i class="icomoon-icon-power-2"></i> Notification Settings</label>
			<div class="controls">
				<?php if ($udata->subscriptions == '2'):?>
				<label class="checkbox ">
					<input type="checkbox" value="sys_messages" id="email_sysmessages" name="email_receive" checked="checked" />
					System messages </label>
				<label class="checkbox ">
					<input type="checkbox" value="sys_messages" id="email_sysmessages" name="email_receive" checked="checked" />
					System Notifications </label>
				<label class="checkbox ">
					<input type="checkbox" value="other_messages" id="email_othermessages" name="email_receive" />
					Other messages </label>
				<label class="checkbox ">
					<input type="checkbox" value="newsletter" id="email_newsletter" name="email_receive" />
					Newsletters </label>
				<?php elseif ($udata->subscriptions == '3'): ?>
				<label class="checkbox ">
					<input type="checkbox" value="sys_messages" id="email_sysmessages" name="email_receive" checked="checked" />
					System messages </label>
				<label class="checkbox ">
					<input type="checkbox" value="sys_messages" id="email_sysmessages" name="email_receive" checked="checked" />
					System Notifications </label>
				<label class="checkbox ">
					<input type="checkbox" value="other_messages" id="email_othermessages" checked='checked' name="email_receive" />
					Other messages </label>
				<label class="checkbox ">
					<input type="checkbox" value="newsletter" id="email_newsletter" name="email_receive" />
					Newsletters </label>
					
				<?php elseif ($udata->subscriptions == '4'): ?>
				<label class="checkbox">
					<input type="checkbox" value="sys_messages" id="email_sysmessages" name="email_receive" checked="checked" />
					System messages </label>
				<label class="checkbox ">
					<input type="checkbox" value="sys_messages" id="email_sysmessages" name="email_receive" checked="checked" />
					System Notifications </label>
				<label class="checkbox ">
					<input type="checkbox" value="other_messages" id="email_othermessages"  name="email_receive" checked="checked" />
					Other messages </label>
				<label class="checkbox ">
					<input type="checkbox" value="newsletter" id="email_newsletter" name="email_receive" checked="checked" />
					Newsletters </label>
				<?php endif; ?>

			</div>
		</div>

	</div>
	<hr>
	<div class="align-center">
		<button type="submit" class="btn btn-large btn-info" title="Complete">
			<i class="icomoon-icon-arrow-right-5"></i> Finish
		</button>
		<a class="btn btn-large btn-warning" title="Cancel" href="<?= base_url('beta/user'); ?>"><i class="  icomoon-icon-backspace-2 "></i> Cancel</a>
	</div>
	</form>
	<hr>
</div>

<?php else : ?>
<div class="container container-twelve">

	<p class="alert-warning">
		We never understood your request. I think you are lost Jim!.
	</p>

</div>
<?php endif; endforeach; ?>

<hr>
