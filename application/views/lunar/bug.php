<div id="masthead">
	
	<div class="container">
		
		<div class="masthead-pad">
			
			<div class="masthead-text">
				<h2>Bug log</h2>
				<p>Sure everybody hates these creepy creatures <i class="wpzoom-bug"></i><i class="wpzoom-bug"></i><i class="wpzoom-bug"></i><i class="wpzoom-bug"></i><i class="wpzoom-bug"></i> </p>
			</div> <!-- /.masthead-text -->
			
		</div>
		
	</div> <!-- /.container -->	
	
</div> <!-- /#masthead -->




<div id="content">

	<div class="container">
		
		
		<div class="row">
			<div class="span8">
				<h3>Seen a <i class="brocco-icon-bug"></i>? Well tell us we have a <i class="wpzoom-skull"></i> terminator </h3>

				<form action="<?=current_url();?>/submit" method="get">

					<label> Page </label>
					<textarea name="page" placeholder="What page were you on?" class="span5"> What page were you on? </textarea>

					<label> Action</label>
					<textarea name="action" placeholder="What were you doing?" class="span5"> What were you doing? </textarea>

					<label> Any error messages?</label>
					<input type="radio" name="error" value="yes" > Yes 
					<input type="radio" name="error" value="no"> No

					<br><br>

					<label> If yes </label>
					<textarea name="error_msg" class="span5"> What was the error message?</textarea>

					<label> Additional Comments</label>
					<textarea name="addational" class="span5"> Any additional comments?</textarea>

					<hr>
					<button type="submit" class="btn btn-warning btn-large btn-block" > <i class="wpzoom-skull"></i> Terminate </button>
				</form>
			</div>

			<div class="span4">
				<p>
					We try our best to make your experience  on Scrobber as smooth as we can.
					We love you all helping us trap this <i class="wpzoom-bug"></i> in our system.
				</p>

				<a href="<?=base_url('lunar/help/support');?>" class="btn btn-large btn-tertiary btn-block btn-big-block">Contact Support</a>
				
			</div>


		</div>

	</div>

</div>

</div>