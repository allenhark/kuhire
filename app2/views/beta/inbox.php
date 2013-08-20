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
			</ul> 
		</div>
		
		<div class="span6">
			<div class="span8 align-left">
				<a class="btn btn-mini" href="<?=base_url('beta/user/inbox');?>"><i class="splashy-mail_light_down"></i> Inbox </a>&nbsp;
				<a class="btn btn-mini" href="<?=base_url('beta/user/inbox');?>/Archive"><i class="splashy-folder_modernist_down"></i> Archive</a>&nbsp;
				<a class="btn btn-mini" href="<?=base_url('beta/user/inbox');?>/outbox"><i class="splashy-mail_light_up"></i> Outbox</a>&nbsp;
				<a class="btn btn-mini" href="<?=base_url('beta/user/inbox');?>/trash"><i class="splashy-mail_light_new_1"></i> Trash</a>
			</div>
			
			<div class="span4 align-left">
				<?=$this->uri->segment('4');?> Mail
			</div>
			
			<hr style="width: 90%;">
			<?php if($this->uri->segment('4') == null):
			
				$this->db->where('nb_reciever', $udata->user_id);
				$this->db->where('nb_status', '1');
				$this->db->order_by('nb_id', 'desc');
				$mg = $this->db->get('msg_inbox');
				if ($mg -> num_rows() > 0): ?>				
				<div class="span3"><i class="splashy-document_letter_marked"></i> Subject </div>
				<div class="span3"><i class="splashy-contact_grey"></i> From </div>
				<div class="span3"><i class="entypo-icon-time"></i> Time </div>
				<hr>
				<?php
					foreach ($mg->result () as $msg):
						$mysql = $msg->nb_time;
						$unix = mysql_to_unix($mysql)
				?>
					<div class="span3"><a href="<?=base_url('beta/user/inbox/view/1/'.$msg->nb_id);?>"> <?=$msg->nb_subject;?> </a></div>
					<div class="span3"> <?=$msg->nb_sender_name;?> </div>
					<div class="span4"> <?=unix_to_human($unix);?></div>
					<hr>
				<?php endforeach; else:?>
					<h5> You have no new messages. Check your Archive for read messages</h5>
					
				<?php endif;?>
				
			<?php elseif($this->uri->segment('4') == 'outbox'):
				
				$this->db->where('nb_sender', $udata->user_id);
				$this->db->where('nb_status', '1');
				$this->db->order_by('nb_id', 'desc');
				$out = $this->db->get('msg_outbox');
				if ($out -> num_rows() > 0):
				?>
				<div class="span3"><i class="splashy-document_letter_marked"></i> Subject </div>
				<div class="span3"><i class="splashy-contact_grey"></i> To </div>
				<div class="span3"><i class="entypo-icon-time"></i> Time </div>
				<hr>
				<?php
					foreach ($out->result () as $outbox):
						$mysql = $outbox->nb_time;
						$unix = mysql_to_unix($mysql)
				?>
				<div class="span3"><a href="<?=base_url('beta/user/inbox/view/2/'.$outbox->nb_id);?>"> <?=$outbox->nb_subject;?> </a></div>
				<div class="span3"> <?=$outbox->nb_sender_name;?> </div>
				<div class="span4"> <?=unix_to_human($unix);?></div>
				<hr>
				<?php endforeach; else:?>
					<h5> You have not set new or any messages</h5>
					
					
				<?php endif;?>
				
			<?php elseif($this->uri->segment('4') == 'Archive'): 
				
				$this->db->where('nb_reciever', $udata->user_id);
				$this->db->where('nb_status', '2');
				$this->db->order_by('nb_id', 'desc');
				$out = $this->db->get('msg_inbox');
				
				if ($out -> num_rows() > 0): ?>
					<div class="span3"><i class="splashy-document_letter_marked"></i> Subject </div>
					<div class="span3"><i class="splashy-contact_grey"></i> From</div>
					<div class="span3"><i class="entypo-icon-time"></i> Archive Time </div>
					<hr>
				<?php
					foreach ($out->result () as $outbox):
						$mysql = $outbox->nb_time;
						$unix = mysql_to_unix($mysql)
				?>
				<div class="span3"><a href="<?=base_url('beta/user/inbox/view/1/'.$outbox->nb_id);?>"> <?=$outbox->nb_subject;?> </a></div>
				<div class="span3"> <?=$outbox->nb_sender_name;?> </div>
				<div class="span4"> <?=unix_to_human($unix);?></div>
				<hr>
				
				<?php endforeach; ?>
				<p>We archive your inbox. We never deleta a thing!</p>
				<?php else:?>
					<h5> You have not Archived any messages</h5>
					
					
				<?php endif;?>
				
							<?php elseif($this->uri->segment('4') == 'trash'): 
				
				$this->db->where('nb_sender', $udata->user_id);
				$this->db->where('nb_status', '2');
				$this->db->order_by('nb_id', 'desc');
				$out = $this->db->get('msg_outbox');
				
				if ($out -> num_rows() > 0): ?>
					<div class="span3"><i class="splashy-document_letter_marked"></i> Subject </div>
					<div class="span3"><i class="splashy-contact_grey"></i> To </div>
					<div class="span3"><i class="entypo-icon-time"></i> Trash Time </div>
					<hr>
				<?php
					foreach ($out->result () as $outbox):
						$mysql = $outbox->nb_time;
						$unix = mysql_to_unix($mysql)
				?>
				<div class="span3"><?=$outbox->nb_subject;?> </div>
				<div class="span3"> <?=$outbox->nb_sender_name;?> </div>
				<div class="span4"> <?=unix_to_human($unix);?></div>
				<hr>
				
				<?php endforeach; ?>
				<p> You cant view deleted messages. Contact support for assistance. We archive your inbox.</p>
				<?php else:?>
					<h5> You have not trashed any messages</h5>
					
					
				<?php endif;?>
				
			<?php elseif($this->uri->segment('4') == 'view'):?>
				<?php if($this->uri->segment(5) == '1'):
					$this->db->where('nb_id', $this->uri->segment(6));
					$vw = $this->db->get('msg_inbox');
					foreach ($vw->result () as $view):	
					if($view->nb_status == "1"):
						
						$data = array (
							'nb_status' => '2'
							);
							$this->db->where('nb_id', $view->nb_id);
							$this->db->update('msg_inbox', $data);
					endif;
				?>
				<div class="well">
					<div>
						<ul class="">
							<li><i class="brocco-icon-user"></i> From: <?=$view->nb_sender_name;?></li>
							<li><i class="brocco-icon-envelope"></i> Email: <?=$view->nb__sender_email;?></li>
							<li><i class="brocco-icon-phone"></i> Phone: <?=$view->nb_sender_phone;?></li>
						</ul>
					</div>
					
					<div >
							<hr>
						<ul class="unstyled">
							<li><i class="brocco-icon-bookmark-2"></i> Subject: <?=$view->nb_subject;?></li>
							<li><p> <?=$view->nb_msg;?></p> </li>
							<hr>
							<?php if($view->relation == "1"):
							$this->db->where('item_id', $view->r_id);
							$this->db->where('item_owner', $udata->user_id);
							$rl = $this->db->get('item');							
							?>
								<ul class="unstyled">
									 Item In discussion <br>
									<?php foreach($rl->result () as $rel):?>
									<li class="span3"><i class="splashy-document_letter_marked"></i> <?=$rel->name;?></li>
									<li class="span3"><i class="wpzoom-tag"></i> Price: <?=$rel->item_price.'.00';?> </li>
									<li class="span4"><i class="wpzoom-location"></i> Location: <?=$rel->location;?> </li>
									<br>
									<li class="span4"><i class="splashy-calendar_month"></i> Start Date: <?=$view->r_sdate ;?></li>
									<li class="span4"><i class="splashy-calendar_month_new"></i> End Date: <?=$view->r_fdate;?></li>
									<?php if($view->r_price):?>
									<li class="span4"><i class="brocco-icon-tag"></i> User Proposed <?=$view->r_price;?></li>
									<?php endif;?><br>
									
									
								</ul>
								
								<hr>
							<?php endforeach;endif;?>
						</ul>
						
					</div>
					</div>
					<p> Note, you can either call or email the user directly. We currently do not support direct messaging.</p>
				<?php endforeach;?>
				<?php elseif($this->uri->segment(5) == '2'):?>
					<p> Outbox Msg</p>
				<?php endif;?>
			<?php endif;?>
		
		</div>
		
		<?php $this->load->view('beta/userbar');?>
		
		
	</div>
		<hr>
	</div>
	
</div>

<?php endforeach;?>