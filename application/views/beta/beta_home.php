<div class="container">

	<div class="row-fluid">

		<div class=" span12" style="background-image: url(http://local.scrobber.com/static/splash.jpg);  min-height: 400px; height: auto; ">

			<div style="margin-top: 30px; margin-left:40px;">
				
				<div class=" span5 " style="background-color: rgba(255, 255, 255, 0.84);;  min-height: 350px; text-align: center;">
					
					<div style="margin-top: 30px">

						<h3> Search thousands of hire listings</h3>
						<form action="<?=base_url('search');?>" />

							<div class="control-group">
								<input name="s" style="min-width: 90%; height: 35px; color: grey"class="input"/>
							</div>
							<div class="span2">
								<a href="#location" data-toggle="collapse"> Location </a>

							</div>
						</form>

					</div>

				</div>

				<div class="span3" style="background-color: rgba(255, 255, 255, 0.84);; min-height: 350px; margin-left: 3px; text-align: center">
					<div style="margin-top: 30px">

						<span style="text-shadow: 0.1em 0.1em white; font-size: 25px; color: grey;"> Or </span>
						 <br /> <br > <br />
						 <a href="<?= $this->fb_ignited->fb_login_url(); ?>"><img src="<?=  base_url('static/fb_login.png');?>" style="max-height: 30px" /> </a>
						 <br />
	    				and see what your friends are hiring out.

    				</div>
				</div>

			</div>

		</div>

	</div>

</div>