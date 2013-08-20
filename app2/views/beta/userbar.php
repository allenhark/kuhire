<div id="sidebar" class="three columns">
			
			<div id="recent-posts" class="widget">
				<h5>Recent Items</h5>
				<ul>
					<?php
					//recent items build up
					$this->db->where('status', '1');
					$this->db->or_where('status', '3');
					$this->db->limit('3');
					$this->db->order_by('item_id', 'desc');
					$rec = $this->db->get('item');	
					foreach ($rec ->result () as $results):		
						$rimg = base_url('images/'.$results->image);		
					?>
					<li>
						<div class="post-image"><a href="<?=base_url($results->slug.'?ref=sidebar');?>" > <img src="<?=$rimg;?>" alt="" /> </a></div>
						<div class="post-headline"><a href="<?=base_url($results->slug.'?ref=sidebar');?>" ><?=$results->name;?></a>
							<span>
								<i class="wpzoom-tag"></i> <?php if($results->item_price == ""): echo 'Inquire'; else: echo $results->item_price; endif;?> <br>
								<i class="wpzoom-flag"></i> <?=$results->location;?>
							</span>
						</div>
					</li>
					<?php endforeach;?>
				</ul>
			</div>
			
			<div id="recent-posts" class="widget">
				<h5>Featured Items</h5>
				<ul>
					<?php
					//recent items build up
					$this->db->where('status', '3');
					$this->db->where('featured', '1');					
					$this->db->limit('4');
					$this->db->order_by('item_id', 'desc');
					$frec = $this->db->get('item');	
					foreach ($frec ->result () as $fresults):		
						$frimg = base_url('images/'.$fresults->image);		
					?>
					<li>
						<div class="post-image"><a href="<?=base_url($fresults->slug.'?ref=sidebar featured');?>" > <img src="<?=$frimg;?>" alt="" /> </a></div>
						<div class="post-headline"><a href="<?=base_url($fresults->slug.'?ref=sidebar featured');?>" ><?=$fresults->name;?></a>
							<span>
								<i class="wpzoom-tag"></i> <?php if($fresults->item_price == ""): echo 'Inquire'; else: echo $fresults->item_price; endif;?> <br>
								<i class="wpzoom-flag"></i> <?=$fresults->location;?>
							</span>
						</div>
					</li>
					<?php endforeach;?>
				</ul>
			</div>
			
			<!-- Widgets from the database. For easy change ============================= -->
			<?php
				$this->db->where('w_state', '1');
				$this->db->order_by('w_id', 'desc');
				$widgets = $this->db->get('widgets');
				foreach ($widgets->result () as $wdata):
			?>
			<div class="widget">
				<h4><?=$wdata->w_title;?></h4>
				
					<?=$wdata->w_html;?>
				
			</div>
			<?php endforeach;?>

		</div><!-- #sidebar -->