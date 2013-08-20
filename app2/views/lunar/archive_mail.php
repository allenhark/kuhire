<div id="masthead">

	<div class="container">

		<div class="masthead-pad">

			<div class="masthead-text">
				<h2>Archive Mail</h2>
				<p>
					Archieved mail
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
						<h3 style="text-align: center"><img src="<?=base_url('static/images');?>/025.gif" alt="Allen Hark"> Conecting... </h3>
						<br>
						<h4><i class="splashy-warning"></i> You have not configured Allen Hark<a href="<?=base_url('lunar/settings/account');?>"> Settings </a> on your account.</h4>
						<div class="divider">&nbsp;</div>
						<p> This feature might not be available right now. <a href="<?=base_url('lunar/help/faq/#not available');?>"> Why<i class="entypo-icon-help"></i></a> </p> 
					</div>
					<p>
						<b><i class="splashy-information"></i> Did you know? -</b> You can Archive all your messages, inactive items and Invoices on Scrobber.
					</p>
				</div>

			</div>

			<div class="span3">
				<p class="well">
					Allen Hark is our Storage Server.
					If you are not Signed up, you can sign up any time. Its free and you get 1Gb storade ADD (Allen Dynamic Drive)
					 space on Allen Hark servers.
				</p>

				<p class="well">
					<a href="http://storage.allenhark.com/app/join?ref=Scrobber&free=1Gb" class="btn" target="_blank"><i class="splashy-contact_blue_add"></i> Sign Up </a>
					<br><br>
					<a href="http://www.allenhark.com" class="btn" target="_blank"><i class="silk-icon-grass"></i> Allen Hark </a>
				</p>
			</div>

		</div>

	</div>

</div>

</div>
