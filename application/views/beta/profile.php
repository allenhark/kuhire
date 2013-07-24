<?php
foreach ($user->result () as $udata):

?>
<div class="container container-twelve">
	<!-- profile validator =========== -->
	<?php
	if($udata->is_active != '1'):
	?> 
		<div class="twelve columns">
			<div class="infobox">
				<div class="content">
					<h3><i class="splashy-error"></i> Inactive profile!</h3>
					<h4>You may not be able to proceed with an inactive profile. </h4>
				</div>
				<div class="btn-group">
					<a href="<?=base_url('beta/user/confirmation/resend');?>" class="btn btn-small btn-warning"><i class="iconic-icon-spin"></i> Resend confirmation code</a>
					<a href="<?=base_url('beta/user/confirmation/call');?>" class="btn btn-small btn-danger"><i class="wpzoom-phone-2"></i> Request Call back</a>
					<a href="<?=base_url('contact');?>" class="btn btn-small"><i class="icomoon-icon-mail"></i> Contact Support</a>
				</div>
			</div>
			<div class="clear"></div>
		</div>
	<?php
	endif;
	?>

	<?php
		if($udata->phone == null | $udata->id_no == "0" | $udata->city == null):
	?>
		<div class="twelve columns">
			<div class="infobox">
				<div class="content">
					<h3><i class="splashy-warning_triangle"></i> Incomplete profile!</h3>
					<h4>Some of the essential profile fields are missing. This may disable some features </h4>
				</div>
				<div class="action">
					<a href="<?=base_url('beta/user/wizz/step1');?>" class="btn btn-small btn-danger"><i class="icomoon-icon-meter-fast"></i> Run Wizard</a>
				</div>
			</div>
		</div>
	<?php endif;?>
	
	<div class="span12 row-fluid container-fluid clearfix">
		<div class="span2" >
			<ul>
				<li><a href="<?=base_url('beta/user');?>" class="active"><i class="icomoon-icon-bars"></i> Dashboard </a></li>
				<li><a href="<?=base_url('add');?>"><i class="entypo-icon-plus"></i> Add new </a></li>
				<li><a href="<?=base_url("beta/user/inbox");?>"><i class="icomoon-icon-mail"></i> Inbox </a> </li>
				<li><a href="<?=base_url('beta/user/products');?>"><i class="brocco-icon-grid"></i> Products </a></li>								
				<li><a href="<?=base_url('beta/user/payment');?>"><i class="icomoon-icon-stats-up"></i> Payment History </a></li>
				<li><a href="<?=base_url("beta/user/security");?>"><i class="icomoon-icon-fire "></i> Security Settings</a> </li>
				<li><a href="<?=base_url("beta/user/profile");?>"><i class="wpzoom-settings"></i> Profile Settings</a> </li>
			</ul> 
		</div>
		
		<div class="span6">
			<div class="three columns">
				Hi <?=$this->session->userdata('name');?>				
				<br><br>
				<img src="<?=base_url('avator/'.$udata->avator);?>" alt="<?=$this->session->userdata('name');?>" width="70%" height="70%" rel="prettyphoto"/>
				<br>
				<a class="btn btn-info btn-mini" href="#"> Change</a> 
				&nbsp; 
				<a class="btn btn-warning btn-mini" href="<?=base_url('beta/user/img_reset/');?>"><i class="icomoon-icon-blocked "></i> Reset</a>
			<hr>
								
				<a href="<?=base_url('beta/user/wizz');?>" class="btn btn-mini"><i class="icomoon-icon-wrench"></i> Edit Profile </a>				
				<br><br>				
				<a href="<?=base_url('beta/user/security');?>" class="btn btn-mini btn-info"><i class="icomoon-icon-locked"></i> Update Security </a>				
				<br><br>
				<a href="<?=base_url('beta/user/security');?>" class="btn btn-mini btn-danger"><i class="icomoon-icon-key-2"></i> Update Password </a>
			</div>
			
		</div>
		
		<?php $this->load->view('beta/userbar');?>
		
		
	</div>
		<hr>
	</div>
	
</div>

<?php endforeach;?>