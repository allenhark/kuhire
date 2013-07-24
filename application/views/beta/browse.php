<?php if($this->uri->segment('4') == NULL):?>
	<div class="container container-twelve">
		<script type="text/javascript">
			var centreGot = false;
		</script>
		
		<?php 
			//Get all products from Db
			
			$this->db->where('status', 3);
			$mt = $this->db->get('item');
			
			
			$config = array();
			$config['zoom'] = 'auto';
			$config['center'] = 'auto';
			$config['onboundschanged'] = 'if (!centreGot) {
				var mapCentre = map.getCenter();
				marker_0.setOptions({
					position: new google.maps.LatLng(mapCentre.lat(), mapCentre.lng()) 
				});
			}
			centreGot = true;';
			$this -> googlemaps -> initialize($config);

			// set up the marker ready for positioning
			// once we know the users location
			$here = "<div class='well'>You are Here</div>";
			$marker = array();
			$marker['infowindow_content'] = $here;
			$this -> googlemaps -> add_marker($marker);
			
			foreach ($mt -> result () as $mapdata):
				$show = " 
						<div class='well span2'>
							<h6> <a href=".base_url('view/'.$mapdata->item_id).">".$mapdata->name."</a></h6>
							<br>
							<i class='wpzoom-tag'></i>".$mapdata->item_price.".00 Per Day</br>
						
						</div>
					";
				$marker = array();
				$marker['position'] = $mapdata->location.', Nairobi';
				$marker['infowindow_content'] = $show;
				$marker['icon'] = base_url() . 'static/icons/map/you-are-here-2.png';
				$this -> googlemaps -> add_marker($marker);
			endforeach;
			$map = $this -> googlemaps -> create_map();
		?>
		?>
		
		<div class="twelve columns">
			<?=$map['js']; ?>
			<?=$map['html']; ?>
			
			<?=$show;?>
			<hr>
		</div>
		
	</div>
	
<?php elseif ($this->uri->segment('4') == 'location'): ?>
	<div id="pageinfo">
		<div  class="container container-twelve">
			<?php $config['center'] = $this -> uri -> segment('5') . ', Nairobi';
			$config['zoom'] = '12';
			$this -> googlemaps -> initialize($config);

			$marker = array();
			$marker['position'] = $this -> uri -> segment('5') . ', Nairobi';
			$marker['infowindow_content'] = 'Load data here!';
			$marker['icon'] = base_url() . 'static/icons/map/citysquare.png';
			$this -> googlemaps -> add_marker($marker);

			$map = $this -> googlemaps -> create_map();
			?>
			
			<div class="twelve columns" style="height: 'auto'; width: 'auto';">
				<?=$map['js']; ?>
				<?=$map['html']; ?>
			</div>
		</div>
	</div>
	
	
	<div class="container container-twelve">
		<div class="twelve columns">
			<div class="span11">
				Other Locations: <br>
				<div id="slider2">
					<?php
					$this->db->where('city_id', '1');
					$this->db->order_by('hood_name', 'asc');
					$loc = $this->db->get('hoods');
					foreach ($loc->result () as $location):
					?>
					
					<div class="span2" ><a href="<?= base_url('browse/location/' . $location -> hood_name); ?>"> <?= $location -> hood_name; ?> </a></div>
					<br>
					<?php endforeach; ?>
				</div>
			</div>
			<hr>
		</div>
		
		
		<div class="twelve columns">
			<?php
				//$this->db->where('location', $this->uri->segment('5'));			
				$this->db->where('status', '3');
				$this->db->where('location', $this->uri->segment('5'));
				$itm = $this->db->get('item');
					if ($itm -> num_rows() > 0):
						foreach($itm->result () as $irow):
							$img = base_url('images/'.$irow->image);
					?>
			<div class="item photography three columns" style="width: 22%">
				<a href='<?= $img; ?>' rel="prettyPhoto" title="<?= $irow -> name; ?>">
					<img src="<?= $img; ?>" width="70%" height="70%" alt="<?= $irow -> name; ?>" />
				</a>
				<p>
					<h4><a href="<?= base_url('view/' . $irow -> item_id); ?>"> <?=$irow -> name; ?> </a> </h4><br>
					<h6><i class="brocco-icon-tag "></i> Price: <?= $irow -> item_price; ?>.00 KSH</h6><br>
					<h6><i class="brocco-icon-location"></i> Location: <?= $irow -> location; ?></h6>
					
					<div class="btn-group">
						<a class="btn" href="<?= base_url('view/' . $irow -> item_id); ?>"><i class="brocco-icon-eye"></i> View </a>
						<a class="btn" href="<?= base_url('hire/' . $irow -> item_id); ?>"><i class="entypo-icon-leaf"></i> Hire</a>
					</div>
				</p>
			</div>
		
		<?php endforeach; ?>
		

			<?php else: ?>
				<h4> We have no Items posted in <?= $this -> uri -> segment('5'); ?>. Be the first to add. <a href="<?= base_url('add'); ?>"> Add New </a> </h4>
			<?php endif; ?>
		
		<hr>
	
		<h5>Featured Items</h5>

					<?php
					//recent items build up
					$this->db->where('status', '3');
					$this->db->where('featured', '1');					
					$this->db->limit('4');
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
				
				<hr>
	</div>

<?php elseif ($this->uri->segment('4') == 'category'): ?>
	
	
		<?php if($this->uri->segment('5') == NULL):?>
			<div id="pageinfo">
				<div  class="container container-twelve">
					<h3> Browse By Categories</h3>
				</div>
				<hr>
			</div>
			
			<div class="container container-twelve">
				<?php $cats = $this -> db -> get('categories'); ?>
				<div class="eleven columns align-right"><b> (<?= $cats -> num_rows(); ?>) Categories </b></div></br>
				<?php
				foreach ($cats->result () as $cat):
					$cimg = base_url('static/icons/map/'.$cat->cat_icon);
				?>				
				
				<div class="two columns" style="width: auto;"><a href="<?= base_url('browse/category/' . $cat -> cat_slug); ?> "><img src="<?= $cimg; ?>" /> <?= $cat -> cat_name; ?> </a></div>
				
				
				<?php endforeach; ?>
				
				<hr>
	
				<h5>Featured Items</h5>

					<?php
					//recent items build up
					$this->db->where('status', '3');
					$this->db->where('featured', '1');				
					$this->db->limit('4');
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
				
				<hr>
				
			</div>
		<?php else: ?>
			<div id="pageinfo">
				<div  class="container container-twelve">
					<h3> Browse By <?= $this -> uri -> segment('5'); ?> Category</h3>
				</div>
			</hr>
			</div>
			
			<div class="container container-twelve">
				<?php
				$this->db->where('cat_slug', $this->uri->segment('5'));
				$cats = $this->db->get('categories');
				foreach ($cats->result () as $cat):	
					
					$where = "item_cat = $cat->cat_id AND status = '3'";
					$this->db->order_by('item_id', 'desc');
					//$this->db->or_where('item_cat', '3');	
					$this->db->where($where);	
					$tm = $this->db->get('item');
				
				endforeach;
				if ($tm->num_rows () > 0):
				?>
		
					<div class="clear"></div>
					<div>
						<?php
							foreach ($tm->result () as $itm):				
							$timg = base_url('images/'.$itm->image);
							
						?>
							<div class="item photography three columns" style="width: 22%">
								<a href='<?= $timg; ?>' rel="prettyPhoto" title="<?= $itm -> name; ?>">
									<img src="<?= $timg; ?>" width="70%" height="70%" alt="<?= $itm -> name; ?>" />
								</a>
								<p>
									<h4><a href="<?= base_url('view/' . $itm -> item_id); ?>"> <?=$itm -> name; ?> </a> </h4><br>				
									<h6><i class="brocco-icon-tag "></i> Price: <?= $itm -> item_price; ?>.00 KSH</h6><br>
									<h6><i class="brocco-icon-location"></i> Location: <?= $itm -> location; ?></h6>
									
									<div class="btn-group">
										<a class="btn" href="<?= base_url('view/' . $itm -> item_id); ?>"><i class="brocco-icon-eye"></i> View </a>
										<a class="btn" href="<?= base_url('hire/' . $itm -> item_id); ?>"><i class="entypo-icon-leaf"></i> Hire</a>
									</div>
								</p>
							</div>				
				
						<?php endforeach; ?>
					</div>
						
					<?php else: ?>
						<h3> There Are No Items In this Category. Be The first to add. <a href="<?= base_url('add'); ?>"> Add New </a></h3>
					<?php endif; ?>
					<hr>
				<!-- Fetured Items ========================== -->
				<h5>Featured Items</h5>

					<?php
					//recent items build up
					$this->db->where('status', '3');
					$this->db->where('featured', '1');					
					$this->db->limit('4');
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
				
				<hr>
				
			</div>
		
		<?php endif; ?>
		
<?php elseif($this->uri->segment('4') == 'merchants'): ?>
	
			<div id="pageinfo">
				<div  class="container container-twelve">
					<h3> Browse By Merchants.</h3>
				</div>
			<hr>
			</div>
			
			<div class="container container-twelve">	
				
				<?php $this -> db -> where('is_active', '1');
				$ud = $this -> db -> get('user');
				?>
				
				<div class="twelve columns align-center">
					<h4> (<?= $ud -> num_rows; ?>) Active Merchants</h4>
					
				</div>
				
				<div class="twelve columns">
					<?php
					foreach ($ud -> result () as $users):
						$uimg = base_url('avator/'.$users->avator);
					?>
					<div class="two columns">
						<a href="<?= base_url('merchant/' . $users -> user_id); ?>" title="<?= $users -> first_name; ?>">
							<img src="<?= $uimg; ?>" alt="<?= $users -> first_name; ?>" width="80%" height="80%"/><br>
							<?= $users -> first_name . '&nbsp;' . $users -> last_name; ?>
						</a><br>
						<i class="wpzoom-flag"></i> <?= $users -> location; ?> <br>
						<?php $this -> db -> where('item_owner', $users -> user_id);						
						$this -> db -> where('status', '3');
						$itms = $this -> db -> get('item');
						?>
						<i class="icomoon-icon-grid-view"></i> (<?= $itms -> num_rows(); ?>) Items
						
					</div>
					
					<?php endforeach; ?>
				</div>
				<hr />
				
				<!-- Fetured Items ========================== -->
				<h5>Featured Items</h5>

					<?php
					//recent items build up
					$this->db->where('status', '3');
					$this->db->where('featured', '1');					
					$this->db->limit('4');
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
				
				<hr>
				
				
			</div>

	
<?php endif; ?>
