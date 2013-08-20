<section id="content" class="container clearfix">
<?php if ($results->num_rows() > 0){ ?>
	<p> We found <?=$results->num_rows();?> For your seach terms</p>
	<?php foreach ($results->result()  as $row):?>
	<!-- Results -->
	<div class="span12 row-fluid clearfix">

		<div class="span3 clearfix ">
			<a href="<?=base_url("/landing/view/".$row->item_id);?>">
			<img src="<?=base_url('images/'.$row->image);?>" alt="<?=$row->name;?>">
		</a>

			<div class="btn-group">
					<a href="<?=base_url("/landing/view/".$row->item_id);?>" class="btn btn-mini" title="View item"><i class=' brocco-icon-eye'></i> View</a>
					<a href="<?=base_url("/landing/inquire/".$row->item_id);?>" class="btn btn-mini" title="Contact owner"><i class="splashy-group_grey"></i> Contact</a>
					<a href="<?=base_url("/landing/fork/".$row->item_id);?>" class="btn btn-mini" title="Fork Item"><i class="splashy-marker_rounded_grey_1"></i> Fork</a>		
			</div>
			<br>
		</div>

		<div class="span3 clearfix">
			<h6> <?=$row->name;?></h6>
			<ul class="unstyled">
				<li><t class="btn btn-small btn-success"><i class="brocco-icon-bolt"></i> Price</t><b> <?=$row->item_price;?>.oo  per day</b></li><br>
				<li><t class="btn btn-small btn-info"><i class="brocco-icon-flag"></i> Location</t> <?=$row->location;?></li><br>
				<li><a href="<?=base_url("/landing/inquire/".$row->item_id);?>" class="btn btn-small" title="Hire Now"><i class="icomoon-icon-info "></i> Hire Now</a></li>
			</ul>
		</div>

		<div class="span4 last clearfix" bgcolor="grey">
			<p><?=$row->desc;?></p>
			<p><b>Tags :</b> <?=$row->tags;?></p>
		</div>
		<hr>
	</div>
	<!-- end loop -->

	<?php endforeach;?>
	<div class="span12 clearfix row-fluid">
		<h3> Not found what you are looking for? </h3>
		<form class="form-inline" action="<?=base_url('landing/search/');?>">
			<input type="text" name="query" value="" placeholder="Give it a try again jimmy. It doesn't hurt" id="focusedInput" class="input-xlarge">
			<button class="btn" type="submit"><i class="splashy-refresh"></i> Search again </button>
		</form>
	</div>

<?php }else {?>
<div class="row-fluid span12 clearfix alert">
<p> We found no results for your search query. Try again</p>
</div>
<div class="span4 well lform">
		<form class="form-inline" action="<?=base_url('landing/search/');?>">
			<fieldset>
				<div class="row">
					<div class="span4">
						<div class="control-group">
							<label for="focusedInput" class="control-label">Item Name</label>
							<div class="controls">
								<input type="text" name="query" value="" placeholder="Give it a try again jimmy. It doesn't hurt" id="focusedInput" class="input-xlarge">
							</div>
						</div>	
						
						<div class="row">
							<div class="span2">							  
								<div class="control-group">
									<label for="focusedInput" class="control-label">Search locality:</label>
									<div class="controls">
										<select class="input-medium focused">
											<option>Please Select</option>
											<?php 
											//lets make it easier for us by using only locations from us.
											$this->db->order_by("hood_name", "asc"); 
											$hood = $this->db->get('hoods');
											foreach ($hood->result() as $hrow):
											?>
											
											<option value="<?=$hrow->hood_ext;?>"><?=$hrow->hood_name;?></option>
										<?php endforeach;?>
										</select>				
									</div>
								</div>
							</div>
							<div class="span2 ">	
								<label for="focusedInput" class="control-label">Item availability:</label>
								<div class="controls">
									<select name="availability" class="input-medium focused">
										<option value="Anyday">Any</option>
										<option value="Weekdays">WeekDays</option>
										<option value="Weekends">Weekends</option>
										<option value="holiday">Holidays</option>
									</select>
								</div>
							</div>		
						</div>	
						<div class="row">						  
							<div class="span2">							  
								<div class="control-group">
									<label for="focusedInput" class="control-label">Category</label>
									<div class="controls">
										<select name="category" class="input-medium focused">
											<option>Any</option>
											<?php
											//Still making it easier for our machine
											$this->db->order_by("cat_name", "asc"); 
											$cat = $this->db->get('categories');
											foreach ($cat->result() as $crow):

											?>
											
											<option value="<?=$crow->cat_slug;?>"><?=$crow->cat_name;?></option>
											<?php endforeach;?>
										</select>				
									</div>
								</div>
							</div>
							<div class="span2">	
								<label for="focusedInput" name="status" class="control-label">Order by?</label>
								<div class="controls">
									<select class="input-medium focused">
										<option>Date</option>
										<option>Price Low to High</option>
										<option>Price High to Low</option>
									</select>
								</div>
							</div>		
							
						</div>							
						<div class="row">						  
							<div class="span2">							  
								<div class="control-group">
									<label for="focusedInput" class="control-label">Minimum Price</label>
									<div class="controls">
										<select class="input-medium focused">
											<option selected="selected" value="">No min</option><option value="500">500</option><option value="1000">1,000</option><option value="5000">5,000</option><option value="10000">10,000</option><option value="50000">50,000</option><option value="60000">60,000</option><option value="70000">70,000</option><option value="80000">80,000</option><option value="90000">90,000</option><option value="100000">100,000</option><option value="110000">110,000</option><option value="120000">120,000</option><option value="125000">125,000</option><option value="130000">130,000</option><option value="140000">140,000</option><option value="150000">150,000</option><option value="160000">160,000</option><option value="170000">170,000</option><option value="175000">175,000</option><option value="180000">180,000</option><option value="190000">190,000</option><option value="200000">200,000</option><option value="210000">210,000</option><option value="220000">220,000</option><option value="230000">230,000</option><option value="240000">240,000</option><option value="250000">250,000</option><option value="260000">260,000</option><option value="270000">270,000</option><option value="280000">280,000</option><option value="290000">290,000</option><option value="300000">300,000</option><option value="325000">325,000</option><option value="350000">350,000</option><option value="375000">375,000</option><option value="400000">400,000</option><option value="425000">425,000</option><option value="450000">450,000</option><option value="475000">475,000</option><option value="500000">500,000</option><option value="550000">550,000</option><option value="600000">600,000</option><option value="650000">650,000</option><option value="700000">700,000</option><option value="800000">800,000</option><option value="900000">900,000</option><option value="1000000">1,000,000</option><option value="1500000">1,500,000</option><option value="2000000">2,000,000</option><option value="3000000">3,000,000</option><option value="">No min</option>
										</select>				
									</div>
								</div>
							</div>
							<div class="span2">	
								<label for="focusedInput" class="control-label">Maximum Price</label>
								<div class="controls">
									<select class="input-medium focused">
										<option selected="selected" value="">No Max</option><option value="50000">50,000</option><option value="60000">60,000</option><option value="70000">70,000</option><option value="80000">80,000</option><option value="90000">90,000</option><option value="100000">100,000</option><option value="110000">110,000</option><option value="120000">120,000</option><option value="450000">450,000</option><option value="475000">475,000</option><option value="500000">500,000</option><option value="550000">550,000</option><option value="600000">600,000</option><option value="650000">650,000</option><option value="700000">700,000</option><option value="800000">800,000</option><option value="900000">900,000</option><option value="1000000">1,000,000</option><option value="1500000">1,500,000</option><option value="2000000">2,000,000</option><option value="3000000">3,000,000</option><option value="">No min</option>
									</select>
								</div>
							</div>		
							
						</div>	
						
					</div>
					<div class="row">	
						
						<div class="span2 pull-right" style="margin-top: 10px;">
							<button class="btn btn-primary pull-right" type="submit">Search</button>
							
						</div>
					</div>						
					
				</div>
				
			</fieldset>
		</form>
	</div>
	<div class="row-fluid clearfix span12">
		<h3> Or try this </h3>
		<?php
		//Get featured items and show em'
		$this->db->where('status', '1');
		$this->db->order_by("item_id", "desc"); 
		$featured = $this->db->get('item');
		foreach($featured->result() as $ft):
		$img = base_url().'images/'.$ft->image;
		?>
		<li class="span3"><div class="span12">
		<a href="<?=base_url('view/'.$ft->item_id)?>"><img src="<?= $img; ?>" alt="<?= $ft -> name; ?>"></a><br>
		<h5><?= $ft -> name; ?></h5>
		<p><?php $string = $ft -> desc;
			$string = word_limiter($string, 15);
			echo $string;?>&nbsp;<small><a href="<?=base_url('view/'.$ft->item_id)?>">More <i class="splashy-bullet_blue_expand"></i></a></small></p>
		<p><?php $xw = array($ft -> tags); ?>
			Tags: <?= $ft -> tags; ?>
		</p>
		
		<div class="btn-group">
		<a href="<?= base_url("view/" . $ft -> item_id); ?>" class="btn btn-mini" title="View item"><i class='icomoon-icon-eye-2 '></i> View</a>
		<a href="<?= base_url("inquire/" . $ft -> item_id); ?>" class="btn btn-mini" title="Contact owner"><i class="splashy-group_grey"></i> Contact</a>
		<a href="<?= base_url("fork/" . $ft -> item_id); ?>" class="btn btn-mini" title="Fork Item"><i class="splashy-marker_rounded_grey_1"></i> Fork</a>
		
		</div>
		</li>
		
		<?php endforeach; ?>
		
		
		</ul>
	</div>
		
<?php };?>
</section>