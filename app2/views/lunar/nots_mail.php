<div id="masthead">

	<div class="container">

		<div class="masthead-pad">

			<div class="masthead-text">
				<h2>System Mail</h2>
				<p>
					Auto mail
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
			<div class="span7">

				<div class="email-content">

					<div class="email-header">

						<div class="btn-toolbar" style="margin: 0;">
							<div class="btn-group">
								<a href="<?= current_url(); ?>" class="btn tip" title="Refresh System inbox"><span class="wpzoom-refresh"></span></a>
							</div>
						</div>

					</div><!-- End Email-header -->
				<?php if($sys->num_rows () == 0):?>
					<div class="alert-information">
						<p>
							Well there are no notifications here. Which is <i class="splashy-smiley_happy"></i>. You can have 
							<i class="wpzoom-drink-2"></i> and some <i class="wpzoom-food"></i> meanwhile. Or you can hire something on 
							<a href="<?=base_url('');?>"> Scrobber </a> 
							and get a 5% discount next time you add an item on Scrobber <i class="splashy-smiley_surprised"></i>.
					</div>
				<?php else:?>
					<div class="content noPad clearfix">
						<table cellpadding="0" cellspacing="0" border="0" class="emailTable display table" width="100%">
							<thead>
								<tr>
									<th><span class="icomoon-icon-star-3"></span></th>
									<th>Status</th>
									<th>From</th>
									<th>Subject</th>
									<th>Date</th>
								</tr>
							</thead>
							<tbody>
								<?php foreach ($sys -> result () as $sdata):?>
								<tr>
									<td class="star"><?php if($sdata -> status == 1){echo "<i class='splashy-star_full'></i>";} else {echo "<i class='splashy-star_empty'></i>";} ;?></td>

									<td><a href="<?=base_url('lunar/mail/misc/'.$sdata->thread_unique.'?ref=system');?>"> <?php if($sdata -> status == 1){echo "<i class='splashy-mail_light'></i> Unread";} else {echo "<i class='splashy-mail_light_new_1'></i> Read";} ;?> </a></td>

									<td> <?=$sdata->sender;?> </td>

									<td><a href="<?=base_url('lunar/mail/misc/'.$sdata->thread_unique.'?ref=system');?>"> <?=$sdata->subject;?> </a></td>

									<td> <?=$sdata->time;?> </td>

								</tr>
							<?php endforeach;?>
							</tbody>
						</table>
					</div>
				<?php endif;?>
					<p>
						<b><i class="splashy-information"></i> Did you know? -</b> Max is an inteligent Scrobber robot who sends you almost all system mail
					</p>
				</div>

			</div>

			<div class="span3">
				<a data-toggle="modal" href="#max" class="btn btn-large btn-primary btn-block btn-big-block">Ask Max A Question</a>
			

			<div class="well">
				<p>
					Max can reply you general questions. She is a self taught Scrobber Robot that studies user experience on Scrobber 
					and attempts to smoothline the process. You can ask max anything, from "Who built you?" to "What is the most viewed item on 
					Scrobber?"
				</p>
				<i class="splashy-information"></i> Max is not a customer care representative
				<p>
					<a href="http://blog.scrobber.com/max" target="_blank" class="btn btn-info"> Learn more about Max <i class="silk-icon-redo "></i></a>
			</div>
			</div>

		</div>

	</div><div class="modal fade hide" id="max">
  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal"><i class="splashy-error_x"></i> </button>
    <h3>Ask Max A question</h3>
  </div>
  <form action="" method="get">
  <div class="modal-body" >
  	
    	<label> Question</label>
    	<textarea name="msg" placeholder="How do we assist you?" class="span5 x-large" /> </textarea>
  
  </div>
  <div class="modal-footer">
  	<button type="submit" class="btn btn-inverse"><i class="splashy-refresh_forward"></i> Ask Max</button>
    <a href="javascript:;" class="btn" data-dismiss="modal"><i class="splashy-remove"></i> Close</a>
    
  </div>
   </form>
</div>

</div>

</div>
