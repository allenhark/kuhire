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
			Payments Log
			<hr>
			<?php
				$this->db->where('user_id', $udata->user_id);
				$this->db->order_by('payment_id', 'desc');
				$pl = $this->db->get('payment_log');
				if($pl->num_rows > 0):
									
			?>
			<div>
				<div class="one columns"> ID </div>
				<div class="one columns"> Item Id </div>			
				<div class="two columns">Method </div>
				<div class="two columns"> Time </div>
				<hr>
			</div>
			<?php 
			foreach ($pl ->result () as $pd):
				$mysql = $pd->payment_time_auto;
				$unix = mysql_to_unix($mysql);
				$human = unix_to_human($unix);
				//$format = 'DATE_RFC822';
				$time = time();	
				?>
			<div>
				<div class="one columns"><a href="#!<?=$pd->payment_secret;?>"> <?=$pd->payment_id;?> </a></div>
				<div class="one columns"> <a href="<?=base_url('view/'.$pd->item_hook);?>" target="blank"> <?=$pd->item_hook;?> </a> </div>			
				<div class="two columns"><?=$pd->payment_method;?> </div>
				<div class="two columns"> <?=$human;?></div>
				<hr>
			</div>
			
			<?php endforeach;?>
			
			<?php else:?>
				
				<h6> You haven't made any payments on scrobber yet.</h6>
			<?php endif;?>
		</div>
		
		<?php $this->load->view('beta/userbar');?>
		
		
	</div>
		<hr>
	</div>
	
</div>

<?php endforeach;?>