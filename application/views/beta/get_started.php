<div class="container content container-twelve ">
<?php if($this->uri->segment('2') == 'get-started'):?>
	
	<div class="twelve columns align-center">
		<div class=" well">
			<a href="<?=base_url('help/get-started');?>" class="btn btn-primary active"> Get Started</a> &nbsp;&nbsp; 
			<a href="<?=base_url('help/how-it-works');?>" > How It works</a> &nbsp;&nbsp; 
			<a href="<?=base_url('help/about-us');?>"> About Us</a>  &nbsp;&nbsp; 
			<a href="<?=base_url('help/contact-us');?>" > Contact Us</a> &nbsp;&nbsp; 
			<a href="<?=base_url('help/support');?>" > support</a> &nbsp;&nbsp; 
			<a href="<?=base_url('help/tos');?>" > Terms Of Sevice</a>
		</div>
		
	</div>
	
	
	<div class="twelve columns">
		<?php if($_GET != NULL):?>
		<div class="well">
			Thank you for registering. Got some time? Check out our <a href="<?=base_url('help/get-started');?>"> geting started </a> user guide.
		</div>
		<?php endif;?>
		
		<div class="divider">&nbsp; </div>
			<?=$html;?> 
		<div class="divider">&nbsp; </div>
	
	</div>
	
<?php elseif($this->uri->segment(2) == 'how-it-works'):?>
	
	<div class="twelve columns align-center">
		<div class=" well">
			<a href="<?=base_url('help/get-started');?>" > Get Started</a> &nbsp;&nbsp;
			<a href="<?=base_url('help/how-it-works');?>" class="btn btn-primary active"> How It works</a> &nbsp;&nbsp;
			<a href="<?=base_url('help/about-us');?>"> About Us</a>  &nbsp;&nbsp;
			<a href="<?=base_url('help/contact-us');?>" > Contact Us</a> &nbsp;&nbsp;
			<a href="<?=base_url('help/support');?>" > support</a> &nbsp;&nbsp;
			<a href="<?=base_url('help/tos');?>" > Terms Of Sevice</a>
		</div>
		
	</div>
	
	<div class="twelve columns">
		<?=$html;?> 
		<div class="divider">&nbsp; </div>
	</div>
<?php elseif($this->uri->segment(2) == 'about-us'):?>
	
	<div class="twelve columns align-center">
		<div class=" well">
			<a href="<?=base_url('help/get-started');?>" > Get Started</a> &nbsp;&nbsp;		
			<a href="<?=base_url('help/how-it-works');?>" > How It works</a> &nbsp;&nbsp;
			<a href="<?=base_url('help/about-us');?>" class="btn btn-primary active"> About Us</a>  &nbsp;&nbsp;
			<a href="<?=base_url('help/contact-us');?>" > Contact Us</a> &nbsp;&nbsp;
			<a href="<?=base_url('help/support');?>" > support</a> &nbsp;&nbsp;
			<a href="<?=base_url('help/tos');?>" > Terms Of Sevice</a>
		</div>
		
	</div>
	
	
	<?php if($this->uri->segment('5') == NULL):?>
		<div class="twelve columns">
			<!-- about-us Sub Menus -->
			<div>
				<a href="<?=base_url('help/about-us');?>" class="btn btn-info active"> About Us</a> &nbsp;&nbsp;
				<a href="<?=base_url('help/about-us/offers');?>" > Offers</a> &nbsp;&nbsp;
				<a href="<?=base_url('help/about-us/coupons');?>" > Coupons</a>
			</div>
			<hr width="auto">
		</div>
		
	<?php elseif($this->uri->segment('5') == 'offers'):?>
		
		<div class="twelve columns ">
			<!-- about-us Sub Menus -->
			<div>
				<a href="<?=base_url('help/about-us');?>" > About Us</a> &nbsp;&nbsp;
				<a href="<?=base_url('help/about-us/offers');?>" class="btn btn-info active"> Offers</a> &nbsp;&nbsp;
				<a href="<?=base_url('help/about-us/coupons');?>" > Coupons</a>
			</div>
			<hr width="auto">
		</div>	
		<div class="twelve columns">
			We currently have no running offers. However you may follow our blog for updates. <br>
			<a href="http://blog.scrobber.com" target="new"><i class="splashy-refresh_forward"></i> Visti blog</a>
		</div>
	<?php elseif($this->uri->segment('5') == 'coupons'):?>
		
		<div class="twelve columns">
			<!-- about-us Sub Menus -->
			<div>
				<a href="<?=base_url('help/about-us');?>" > About Us</a> &nbsp;&nbsp;
				<a href="<?=base_url('help/about-us/offers');?>" > Offers</a> &nbsp;&nbsp;
				<a href="<?=base_url('help/about-us/coupons');?>" class="btn btn-info active"> Coupons</a>
			</div>
			
			<hr width="auto">
		</div>
		<div> 
			We have no coupons promotion campaigns running currently. Follow our blog for updates. <br>	
			<a href="http://blog.scrobber.com" target="new"><i class="splashy-refresh_forward"></i> Visti blog</a>
		</div>
	
	<?php endif;?>
	
<?php elseif ($this->uri->segment(2) == 'contact-us'):?>
	
	<div class="twelve columns align-center">
		<div class=" well">
			<a href="<?=base_url('help/get-started');?>" > Get Started</a> &nbsp;&nbsp;
			<a href="<?=base_url('help/how-it-works');?>" > How It works</a> &nbsp;&nbsp;
			<a href="<?=base_url('help/about-us');?>"> About Us</a>  &nbsp;&nbsp;
			<a href="<?=base_url('help/contact-us');?>" class="btn btn-primary active"> Contact Us</a> &nbsp;&nbsp;
			<a href="<?=base_url('help/support');?>" > support</a> &nbsp;&nbsp;
			<a href="<?=base_url('help/tos');?>" > Terms Of Sevice</a>
		</div>
		
	</div>
	
	
	<div class="twelve columns">
		<div class="seven columns">
			<h2> Contact Us</h2>
			<form action="" method="get">
				<label> Your name *</label>
				<input class="xlarge" name="name" placeholder="Your name" type="text" />
				
				<label> Email Address *</label>
				<input class="xlarge" name="email" type="email" placeholder="Your email Address" />
				
				<label> Message</label>
				<textarea class="auto-width" cols="5" name="msg"> </textarea>
				<div class="divider">&nbsp;</div>
				<button type="submit" class="btn btn-large"> Send</button>
				
			</form>
		</div>
		
		<div class="five colomns">
			<h1> Why Join </h1>
				<p>
					Free and Easy. It always will be.
				</p>
				<ul class="unstyled">
					<li>
						<i class="wpzoom-settings "></i> Customise your search preferences
					</li>
					<li>
						<i class="iconic-icon-ampersand "></i> Earn money renting out stuff you don't use
					</li>
					<li>
						<i class="brocco-icon-info "></i> Why buy while you can rent?
					</li>
					<li>
						<i class="brocco-icon-coffee "></i> Times are hard, you need this service
					</li>
					<li>
						<i class="cut-icon-heart "></i> You will love it
					</li>
				</ul>
		</div>
	</div>

<?php elseif($this->uri->segment(2) == 'support'):?>

	<div class="twelve columns align-center">
		<div class=" well">
			<a href="<?=base_url('help/get-started');?>" > Get Started</a> &nbsp;&nbsp;
			<a href="<?=base_url('help/how-it-works');?>" > How It works</a> &nbsp;&nbsp;
			<a href="<?=base_url('help/about-us');?>"> About Us</a>  &nbsp;&nbsp;
			<a href="<?=base_url('help/contact-us');?>" > Contact Us</a> &nbsp;&nbsp;
			<a href="<?=base_url('help/support');?>" class="btn btn-primary active"> support</a> &nbsp;&nbsp;
			<a href="<?=base_url('help/tos');?>" > Terms Of Sevice</a>
		</div>
		
	</div>
	
	
	<div class="twelve columns">
		<?=$html;?> <div class="divider">&nbsp; </div>
	</div>

<?php elseif($this->uri->segment(2) == 'tos'):?>
	
	<div class="twelve columns align-center">
		<div class=" well">
			<a href="<?=base_url('help/get-started');?>" > Get Started</a> &nbsp;&nbsp;
			<a href="<?=base_url('help/how-it-works');?>" > How It works</a> &nbsp;&nbsp;
			<a href="<?=base_url('help/about-us');?>"> About Us</a>  &nbsp;&nbsp;
			<a href="<?=base_url('help/contact-us');?>" > Contact Us</a> &nbsp;&nbsp;
			<a href="<?=base_url('help/support');?>" > support</a> &nbsp;&nbsp;
			<a href="<?=base_url('help/tos');?>" class="btn btn-primary active"> Terms Of Sevice</a>
		</div>
		
	</div>
	
	
	<div class="twelve columns">
		<?=$html;?> <div class="divider">&nbsp; </div>
	</div>
	
<?php endif;?>	

<?php if($this->session->userdata('logged_in')):Else:?>
	
	<div class="twelve columns">
		<a href="<?=base_url('join');?>" class="btn btn-danger btn-large"><i class="splashy-okay"></i> Start Today </a> 
		&nbsp;
		<a href="<?=base_url('add');?>" class="btn btn-large btn-info"><i class="splashy-add_small"></i> Add Rental</a> 
	</div>
<?php endif;?>
<div class="divider">&nbsp;</div>

</div>
