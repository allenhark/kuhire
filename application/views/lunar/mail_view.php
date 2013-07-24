<div id="masthead">

	<div class="container">

		<div class="masthead-pad">

			<div class="masthead-text">
				<h2>Mail</h2>
				<p>
					Read Mail
				</p>
			</div>
			<!-- /.masthead-text -->

		</div>

	</div>
	<!-- /.container -->

</div>
<!-- /#masthead -->

<div id="content">

	<div class="container">

		<div class="row">
			<!-- Build page from here: -->
			<?php $this->load->view('lunar/side_nav');?>

			
			<div class="span9 well">
				<?php foreach ($mail->result () as $mdata):?>
				<div class="page-header">
					<div class="actions">
						<a class="btn" rel="tooltip" data-placement="top" data-original-title="Back to Mailbox" href="<?=base_url('lunar/mail/');?>/<?=$_GET['target'];?>">
							<span class="icon16 entypo-icon-back-2"></span> 
						</a>
						<!--
						<a href="<?=base_url('lunar');?>/<?=$_GET['target'];?>"  class="btn marginR10 tip" title="back">
							<span class="entypo-icon-reply"></span>
						</a>
					-->
						<a href="#archive" data-toggle="modal" class="btn btn-info" title="Archive">
							<span class="eco-archive white"></span>
						</a>

						<a href="#delete" data-toggle="modal" class="btn btn-danger" title="Delete">
							<span class="eco-trashcan white"></span>
						</a>
					</div>
				</div>

				<div class="form-row row-fluid">
					<div class="span12">
						<div class="row-fluid">
							<label class="form-label span2" for="subject"><i class="wpzoom-user-2"></i> From:</label>
							<div >
								<span><?=$mdata->nb_sender_name;?></span>

							</div>
						</div>
					</div>
				</div>
				
				<div class="form-row row-fluid">
					<div class="span12">
						<div class="row-fluid">
							<label class="form-label span2" for="subject"><i class="iconic-icon-at"></i> Email:</label>
							<div >
								<span><?=$mdata->nb__sender_email ;?></span>

							</div>
						</div>
					</div>
				</div>
				
				<div class="form-row row-fluid">
					<div class="span12">
						<div class="row-fluid">
							<label class="form-label span2" for="subject"><i class="wpzoom-phone-2"></i> Phone:</label>
							<div >
								<span><?=$mdata->nb_sender_phone;?></span>

							</div>
						</div>
					</div>
				</div>

				<div class="form-row row-fluid">
					<div class="span12">
						<div class="row-fluid">
							<label class="form-label span2" for="subject"><i class="wpzoom-pin"></i> Subject:</label>
							<div>
								<?=$mdata->nb_subject;?>
							</div>
						</div>
					</div>
				</div>

				<div class="form-row row-fluid">
					<div class="span12">
						<div class="row-fluid">
							<label class="form-label span2" for="subject"><i class="wpzoom-notebook"></i> Date:</label>
							<div >
								<span><?=$mdata->nb_time;?></span>

							</div>
						</div>
					</div>
				</div>

				<div class="form-row row-fluid">
					<div class="span12">
						<div class="row-fluid well span11">
							<?=$mdata->nb_msg;?>
						</div>
					</div>
				</div>
				<div class="clear clearfix">&nbsp;</div>
				<?php if($mdata->relation ==1):?>
					<h4> Item in discussion</h4>
					<div class="clear clearfix">&nbsp;</div>
					<div>
						<div class="span4"> 
							<img src="<?=base_url('images/'.$idata->image);?>" atl="<?=$idata->name;?>" />
							<br>
							<?=$idata->name;?>
							<br>
							<p>
								<i class="splashy-tag"></i> <?=$idata->item_price;?> 
								<br><br>
								<i class="splashy-map"></i> <?=$idata->location;?>
								
							</p>
							
						</div>
						<div class="span4">
							<h4> <?=$mdata->nb_sender_name;?> information.</h4>
							<i class="splashy-calendar_month"></i> Hire from : <?=$mdata->r_sdate;?>
							<br>
							<i class="splashy-calendar_month_new"></i> To: <?=$mdata->r_fdate;?>
							<br>
							<?php if($mdata->r_price): ?>
							User Proposed Price: <?=$mdata->r_price;?>
							<?php endif;?>
							
							<br><br>
							
							<a href="#deal" data-toggle="modal" class="btn btn-info"> Make Deal</a>
							Or
							<a href="#ignore" data-toggle="modal" class="btn btn-warning"> Ignore</a>
							
						</div>
					</div>
				<?php endif;?>				
				<div class="divider clear clearfix">&nbsp;</div>
				<p> You can respond by calling on emailing the user directly. Scrobber does not suport peer to peer messaging.</p>

			</div><!-- End .read-email -->
			<?php endforeach;?>
		</div>
	</div>
</div>
</div>

<div class="modal fade hide" id="delete">
  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal"><i class="splashy-error_x"></i> </button>
    <h3>Are you sure?</h3>
  </div>

  <div class="modal-footer">
  	<a href="<?=base_url('lunar/mail/delete/?id='.$this->uri->segment('4').'&target='.$_GET['target'].'&token='.$_GET['token']);?>" class="btn btn-inverse"><i class="splashy-warning_triangle"></i> Yes</button>
    <a href="javascript:;" class="btn" data-dismiss="modal"><i class="splashy-remove"></i> No</a>
    
  </div>

</div>

<div class="modal fade hide" id="deal">
  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal"><i class="splashy-error_x"></i> </button>
    <h3>Make deal</h3>
  </div>
  <div class="modal-body">
  	By clicking <b> Make Deal</b>, you agree to hire out <b> <?=$idata->name;?> </b> to <b> <?=$mdata->nb_sender_name;?></b>.
  	 This will automatically change your item status to pending.
  	  However, if you have set auto status in your product settings, the item will show on Scrobber when hire duration is completed.
  	<br>
  	Max will update you on the item status.
  </div>

  <div class="modal-footer">
  	<a href="<?=base_url('lunar/mail/deal/?id='.$this->uri->segment('4').'&target='.$_GET['target'].'&token='.$_GET['token'].'&deal='.$mdata->r_id.'&mail='.$mdata->nb__sender_email.'&name='.$mdata->nb_sender_name);?>" class="btn btn-inverse"><i class="splashy-check"></i> Make deal</button>
    <a href="javascript:;" class="btn" data-dismiss="modal"><i class="splashy-remove"></i> Close</a>
    
  </div>
 
</div>

<div class="modal fade hide" id="ignore">
  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal"><i class="splashy-error_x"></i> </button>
    <h3>Ignore?</h3>
  </div>

  <div class="modal-footer">
  	<a href="javascript:;" class="btn" data-dismiss="modal"><i class="splashy-smiley_amused"></i> Just Ignore it.</a>
    
  </div>

</div>

<div class="modal fade hide" id="archive">
  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal"><i class="splashy-error_x"></i> </button>
    <h3>Archive Message</h3>
  </div>
  <div class="modal-body">
  	The message will be automatically Archieved at 0000 EAT (+3) GMT
  </div>

  <div class="modal-footer">
  	<a href="#ok" data-dismiss="modal" class="btn btn-inverse"><i class="splashy-check"></i> Archive</button>
    <a href="javascript:;" class="btn" data-dismiss="modal"><i class="splashy-remove"></i> Close</a>
    
  </div>
 
</div>