	<div id="pageinfo">

		<div class="container container-twelve ">
	
			<div class="pagetitle seven columns">
				<h1>Quick Contact Merchant</h2>
			</div>

			<div class="pagesnav five columns align-center">
				<div class="breadcrumbs" style="font-size: 16px; font-weight: 10px">
					 
				</div>
			</div>

			<div class="clear"></div>

		</div>

	</div><!-- //pageinfo -->



	<div id="content" class="container container-twelve">

		<div id="blog-posts" class="nine columns">
			<?php echo validation_errors(); ?>
			<div class="post">
				<form method="post">
					
					<div><i class="eco-user"></i> Name </div>
					<input type="text" name="name" placeholder="Your Name" style="height: 25px">
					<span class="help-block">Your Name</span>
					
					<div><i class="eco-mobile"></i> Phone </div>
					<input type="text" name="phone" placeholder="Your Phone Number" style="height: 25px">
					<span class="help-block">Your Phone Number</span>
					
					<div><i class="eco-mail"></i> Email</div>
					<input type="text" name="email" placeholder="Your Email" style="height: 25px">
					<span class="help-block">Your valid email Address</span>
					
					<div><i class="eco-help"></i> Subject</div>
					<input type="text" name="subject" placeholder="Message Subject" style="height: 25px">
					<span class="help-block"> Message Subject</span>
					
					<div><i class="eco-article"></i> Message</div>
					<textarea name="msg" class="auto-resize"></textarea>
					<span class="help-block"></span>
					<input type="hidden" name="recipient" value="<?=$this->uri->segment('4');?>">
					
					<hr>
					
					<button type="submit" class="btn btn-primary"><i class="icomoon-icon-mail"></i> Send</button>
					<a href="<?=base_url('view/'.$this->uri->segment('5'));?>" class="btn btn-warning"><i class="icomoon-icon-reply-2"></i> Back to Item</a>
					<a href="<?=base_url('merchant/'.$this->uri->segment('4'));?>" class="btn btn-info"><i class="icomoon-icon-grid-view"></i> Browse Merchant</a>
					
				</form>
			<hr>
			</div>
			
			<div class="post">
				<!-- Fetured Items ========================== -->
				<h5>Featured Items</h5>

					<?php
					//recent items build up
					$this->db->where('status', '3');	
					$this->db->where('featured', '1');					
					$this->db->limit('3');
					$this->db->order_by('item_id', 'random');
					$frec = $this->db->get('item');	
					foreach ($frec ->result () as $fresults):		
						$frimg = base_url('images/'.$fresults->image);		
					?>
					
					
					
				<div class="twelve columns" style="width: auto">
					<div class="two columns">
						<a href="<?= base_url('view/' . $fresults -> item_id); ?>" > <img src="<?= $frimg; ?>" alt="<?= $fresults -> name; ?>" width="60%" height="60%"/> </a><br>
						<a href="<?= base_url('view/' . $fresults -> item_id); ?>" ><?= $fresults -> name; ?></a><br>
							<span>
								<i class="wpzoom-tag"></i> <?= $fresults -> item_price . '.oo'; ?> <br>
								<i class="wpzoom-flag"></i> <?= $fresults -> location; ?>
							</span>
						</div>
					</div>
					<?php endforeach; ?>
				
			</div>
		</div>
	<!-- Sidebar ================ -->
		<?php $this->load->view('beta/sidebar');?>

		<div class="clear"></div>

	</div><!-- //content -->
