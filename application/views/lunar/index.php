
<div id="masthead">
	
	<div class="container">
		
		<div class="masthead-pad">
			
			<div class="masthead-text">
				<h2>Scrobber Lunar</h2>
				<p>You are currently have <a href="<?=base_url('lunar/items');?>"><span style="color: green;"> (<?=$items->num_rows ();?>) </span></a> items on Scrobber, 
					<a href="<?=base_url('lunar/items/inactive');?>" ><span style="color: brown;"> (<?=$inactive->num_rows ();?>) </a> are inactive.
					<?php if($inbox->num_rows () > 0):?> You have <a href="<?=base_url('lunar/mail/inbox');?>"><span style="color: red;"> <?=$inbox->num_rows ();?> </span></a> unread message. <?php endif;?></p>
			</div> <!-- /.masthead-text -->
			
		</div>
		
	</div> <!-- /.container -->	
	
</div> <!-- /#masthead -->




<div id="content">

	<div class="container">
		
		<div class="row">
			
			<div class="span4">
				<h3>Welcome back, <?=$this->session->userdata('first_name');?>.</h3>
				
				<p><?=$meme;?></p>
				
				<table class="table stat-table">
					<tbody>
						<tr>							
							<td class="value"><?=$items->num_rows ();?></td>
							<td class="full"><a href="<?=base_url('lunar/items');?>"> Items </a></td>
						</tr>
						<tr>
							<td class="value"><?=$inactive->num_rows ();?></td>
							<td class="full"><a href="<?=base_url('lunar/items/inactive');?>"> Inactive Items </a></td>
						</tr>
						<tr>
							<td class="value"><?=$system->num_rows ();?></td>
							<td class="full"><a href="<?=base_url('lunar/mail/system');?>"> System Notifications </a></td>
						</tr>
						<tr>
							<td class="value"><?=$inbox->num_rows ();?> </td>
							<td class="full"><a href="<?=base_url('lunar/mail/inbox');?>"> Inbox Messages </a></td>
						</tr>
						
					</tbody>
					
				</table>
				You might wanna check those <i class="wpzoom-pointer-3"></i>  <?=$this->session->userdata('first_name');?>.
			</div> <!-- /.span4 -->
			
			<div class="span8">
				<div id="vertical-chart" class="disabled chart-holder"></div> <!-- /#bar-chart -->
				<span class="alert-attention">Oops this feature is not available in your account. <a data-toggle="modal" href="#charts" class="btn btn-info"> Activate it <i class="splashy-smiley_happy"></i></a> </span>
			</div> <!-- /.span8 -->
			
		</div> <!-- /.row -->
		
		<div class="row">
			
			<div class="span5">
				
				<h3 class="title">Quick Inbox</h3>
				<?php if($inbox->num_rows () > 0):?>
					<table class="table">
						<thead>
							<tr>
								<th>Status</th>
								<th>Subject</th>
								<th>Sender</th>
							</tr>						
						</thead>
						
						<tbody>
						<?php foreach($inbox -> result () as $mail):?>
							<tr>
								<td><span class="label label-primary">Unread</span></td>
								<td class="full"><a href="<?=base_url('lunar/mail/view/'.$mail->nb_id.'/?target=inbox&token='.$this->session->userdata('session_id'));?>"><?=$mail->nb_subject;?></a></td>					
								<td class="who">From <?=$mail->nb_sender_name;?></td>
							</tr>
						<?php endforeach;?>
						</tbody>
					</table>
				<?php else:?>
				Great, You have no new messages. Ok, take my to my  <a href="<?=base_url('lunar/mail/inbox');?>">mailbox <i class="silk-icon-redo"></i></a>. <br /> <br />
				<?php endif;?>
				
				<i class="splashy-information"></i> <b>Did you know- </b> You can get Scrobber mail straight to your email inbox.
			</div> <!-- /.span5 -->
						
			
			<div class="span7">
				
				<h3 class="title">Support Request</h3>
				<?php if($support->num_rows > 0):?>
				<table class="table">
					<thead>
						<tr>
							<th>Status</th>
							<th>Subject</th>
							<th>Support Team</th>
						</tr>						
					</thead>
					
					<tbody>
						<?php foreach($support -> results () as $sdata):?>
							<tr>
								<?php if($sdata->status == 2):?>
									<td><span class="label label-secondary">Responded</span></td>
								<?php else:?>
									<td><span class="label label-primary">Open</span></td>
								<?php endif;?>
								<td class="full"><a href="<?=base_url('suport/ticket/'.$sdata->thread_id);?>"><?=$sdata->subject;?></a></td>					
								<td class="who"><?php if($sdata->support_name): echo $sdata->suport_name; else: echo 'Pending Review'; endif;?></td>
							</tr>
						<?php endforeach;?>
					
					</tbody>
				</table>
				<?php else:?>
					Kudos, no known support issues. Got a question? <a data-toggle="modal" href="#ticket" class="btn btn-info"> Submit a ticket </a> 
				<?php endif;?>	
				<br /><br />
				<i class="splashy-information"></i> <b>Did you know- </b> You can always <a href="<?=base_url('lunar/invite');?>" class="btn btn-inverse"> invite </a> your friends to join Scrobber any time 
			</div> <!-- /.span7 -->
			
		</div> <!-- /.row -->
		
	</div> <!-- /.container -->

</div> <!-- /#content -->

</div> <!-- /#wrapper -->

<div class="modal fade hide" id="charts">
  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal"><i class="splashy-error_x"></i> </button>
    <h3>Activate Stats</h3>
  </div>
  <div class="modal-body">
    <p>
    	Item Stats, is an analytics feature that will be available to our premium customers once complete. 
    	This feature is not available for general use right now.
    </p>
  </div>
  <div class="modal-footer">
    <a href="#" class="btn" data-dismiss="modal"><i class="splashy-check"></i> Ok Got it</a>
    <a href="<?=base_url('lunar/help/analytics');?>" class="btn btn-inverse"><i class="splashy-refresh_forward"></i> Tell me more</a>
  </div>
</div>

<div class="modal fade hide" id="ticket">
  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal"><i class="splashy-error_x"></i> </button>
    <h3>Submit help ticket</h3>
  </div>
  <form action="" method="get">
  <div class="modal-body" >
  	<div class="span3">
    
    	<label>Subject</label>
    	<input type="text" name="subject" placeholder="Subject">
    	
    	<label> Message</label>
    	<textarea name="msg" placeholder="How do we assist you?" /> </textarea>
   	</div>
   
	   <div class="span2">
	   	<p>
	   		Our customer Care agent will get in touch with you shortly.
	   	</p>
	   </div>
  
  </div>
  <div class="modal-footer">
  	<button type="submit" class="btn btn-inverse"><i class="splashy-refresh_forward"></i> Send</button>
    <a href="javascript:;" class="btn" data-dismiss="modal"><i class="splashy-remove"></i> Close</a>
    
  </div>
   </form>
</div>

<script type="text/javascript">

        
        	var config = {
        	    mainTitle: "I am Max, I can show you how to get along",
        	    saveCookie: true, 
        		steps: [
        		{
					"name" 		: "tfirst",
					"bgcolor"	: "black",
					"color"		: "white",
					"position"	: "TL",
					"text"		: "You can create a tour to explain the functioning of your app",
					"time" 		: 5000
				},
				{
					"name" 		: "tsecond",
					"bgcolor"	: "black",
					"color"		: "white",
					"text"		: "Give a class to the points of your walkthrough",
					"position"	: "BL",
					"time" 		: 5000
				}]
        	};

        	$.tour.start(config);

        </script>