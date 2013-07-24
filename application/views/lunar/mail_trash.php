<div id="masthead">

	<div class="container">

		<div class="masthead-pad">

			<div class="masthead-text">
				<h2>Trash Mail</h2>
				<p>
					Deleted mail
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
								<a href="<?= current_url(); ?>" class="btn tip" title="Refresh Archive"><span class="wpzoom-refresh"></span></a>
							</div>
						</div>

					</div><!-- End Email-header -->

					<div class="content noPad clearfix">
						<h3 style="text-align: center"><img src="<?=base_url('static/images');?>/060.gif" alt="Trash"> Loading Trash... </h3>
						
						<p> This feature might not be available right now. <a href="<?=base_url('lunar/help/faq/#not available');?>"> Why<i class="entypo-icon-help"></i></a> </p> 
					</div>
					<p>
						<b><i class="splashy-information"></i> Did you know? -</b> You can Archive all your messages, inactive items and Invoices on Scrobber.
						Messages older than ten days are automatically deleted.<a href="<?=base_url('lunar/help/faq/#recovering deleled');?>"><i class="entypo-icon-info-circle"></i> Recovering deleted Messages </a>
					</p>
				</div>

			</div>

			<div class="span3">
				<p>
					<h6> Safe Practice </h6>
					Do not delete messages or invoices. Its better to archive everything. 
					Incase of future issues, you can always refer to your archives for clarification.
					<div class="divider">&nbsp;</div>
					<b> Quick Links </b>
					<br>
					<ol class="unstyled">
						<li><a href="<?=base_url('lunar/help/support');?>">Customer Care <i class="entypo-icon-forward"></i></a></li>
						<li><a href="<?=base_url('lunar/settings/account#archive');?>"> Turn on Auto Archive <i class="entypo-icon-forward"></i></a></li>
						<li><a href="<?=base_url('lunar/help/faq');?>">FAQ <i class="entypo-icon-forward"></i></a></li>
					</ol>

				</p>

				<p class="well">
					Help us make Scrobber better. Take our survey and earn 5% discount next time you add an item on Scrobber.
				</p>
			</div>

		</div>

	</div>

</div>

</div>
