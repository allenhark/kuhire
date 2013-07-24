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
						<a class="btn" rel="tooltip" data-placement="top" data-original-title="Back to Mailbox" href="<?=base_url('lunar/mail');?>/<?=$_GET['ref'];?>">
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
								<span><?=$mdata->sender;?></span>

							</div>
						</div>
					</div>
				</div>

				<div class="form-row row-fluid">
					<div class="span12">
						<div class="row-fluid">
							<label class="form-label span2" for="subject"><i class="wpzoom-pin"></i> Subject:</label>
							<div>
								<?=$mdata->subject;?>
							</div>
						</div>
					</div>
				</div>

				<div class="form-row row-fluid">
					<div class="span12">
						<div class="row-fluid">
							<label class="form-label span2" for="subject"><i class="wpzoom-notebook"></i> Date:</label>
							<div >
								<span><?=$mdata->time;?></span>

							</div>
						</div>
					</div>
				</div>

				<div class="form-row row-fluid">
					<div class="span12">
						<div class="row-fluid well span11">
							<?=$mdata->message;?>
						</div>
					</div>
				</div>
				<div class="divider clear clearfix">&nbsp;</div>
				
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
  	<a href="<?=base_url('lunar/mail/misc_delete/?id='.$this->uri->segment('4').'&target='.$_GET['ref']);?>" class="btn btn-inverse"><i class="splashy-warning_triangle"></i> Yes</button>
    <a href="javascript:;" class="btn" data-dismiss="modal"><i class="splashy-remove"></i> No</a>
    
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