<div class="container container-twelve">
<?php
if($_GET != NULL):
	if ($_GET['query'] == NULL):
?>	

	<div class="twelve columns">
		<form class="well form-inline">
			<input type="text" name="query" placeholder="What are you looking for?" class="span4" style="height: 30px; font-size: 14px; color: grey;" />
			<input type="text" name="price" placeholder="Average Price" class="span2" style="height: 30px; font-size: 14px; color: grey;" />
			<select name="location" class="span2" style="height: 30px; font-size: 14px; color: grey;"/>
			<option style="height: 30px; font-size: 14px; color: grey; width: auto;" > Location ...</option>
			<?php
			$this->db->order_by('hood_name', 'asc');
			$hg = $this->db->get('hoods');			
			foreach($hg ->result () as $hoods):
			?>
			<option style="height: 30px; font-size: 14px; color: grey; width: auto;" value="<?= $hoods -> hood_name; ?>"> <?= $hoods -> hood_name; ?></option>
			<?php endforeach; ?>
			</select>
			<button type="submit" class="btn btn-inverse btn-large"> Find It.</button>
		</form>
	</div>
	
	<div class="twelve columns">
		<legend> Or Browse By Category</legend><br>
		<?php
		$this->db->order_by('cat_name', 'asc');
		$ct = $this->db->get('categories');		
		foreach ($ct -> result() as $cat):
			$cimg = base_url('static/icons/map/'.$cat->cat_icon);
		?>
		<div class="one columns"><a href="<?= base_url('category/' . $cat -> cat_slug); ?>" title="<?= $cat -> cat_name; ?>"> <img src="<?= $cimg; ?>" alt="<?= $cat -> cat_name; ?>"> <?= $cat -> cat_name; ?> </a></div>
		
		<?php endforeach; ?>
		<hr>
	</div>
	
	<?php else: ?>
		<div class="twelve columns">
		<form class="well form-inline">
			<input type="text" name="query" placeholder="What are you looking for?" class="span4" value="<?=$_GET['query'];?>" style="height: 30px; font-size: 14px; color: grey;" />
			<input type="text" name="price" placeholder="Average Price" class="span2" value="<?=$_GET['price'];?>" style="height: 30px; font-size: 14px; color: grey;" />
			<select name="location" class="span2" value="<?=$_GET['location'];?>" style="height: 30px; font-size: 14px; color: grey;"/>
			<option style="height: 30px; font-size: 14px; color: grey; width: auto;" value="" > Location ...</option>
			<?php
			$this->db->order_by('hood_name', 'asc');
			$hg = $this->db->get('hoods');
			foreach($hg ->result () as $hoods):
			?>
			<option style="height: 30px; font-size: 14px; color: grey; width: auto;" value="<?= $hoods -> hood_name; ?>"> <?= $hoods -> hood_name; ?></option>
			<?php endforeach; ?>
			</select>
			<button type="submit" class="btn btn-inverse btn-large"> Find It.</button>
		</form>
		</div>
		
		<?php
			// Populate Search Results
			$this->db->like('name', $_GET['query']);
			$this->db->or_like('tags', $_GET['query']);
			if($_GET['location'] != NULL):
				$this->db->where('location', $_GET['location']);				
			endif;
			if($_GET['price'] != NULL):
				$this->db->like('item_price', $_GET['price']);		
			endif;				
			$this->db->where('status', '3');
			$this->db->order_by('item_id', 'desc');
			$rsl = $this->db->get('item');
		?>
		
			<div class="twelve columns well" style="height: auto;">
			<p>Found (<?=$rsl->num_rows();?>) results in {elapsed_time} Seconds</p>
			</div>
			
			<?php if($rsl->num_rows <= 0):?>
			<h6> We couldn't find any match for your search results. Try again. </h6>
			<?php else:?>
				<!-- Show results ========================= -->
				<?php 
				foreach ($rsl -> result () as $results): 
					$rimg = base_url('images/'.$results->image);
				?>
					<div class="twelve columns clearfix">
						<div class="two columns">
							<img src="<?=$rimg;?>" alt="<?=$results->name;?>"/>  
						</div>
						
						<div class="five columns">
							<a href="<?=base_url('view/'.$results->item_id);?>"> <?=$results->name;?> </a> <br>
							<i class="wpzoom-flag"></i> <?=$results->location;?> <br>
							<i class="wpzoom-tag"></i> <?=$results->item_price.'.00';?> KES
							<p>
								<a href="<?=base_url('view/'.$results->item_id);?>" class="btn btn-primary"><i class="silk-icon-enter"></i> View</a>
								<a href="<?=base_url('hire/'.$results->item_id);?>" class="btn btn-info"><i class="entypo-icon-leaf "></i> Hire</a>
							 </p>
						</div>
					</div>
					<div class="clear"></div>
				<?php endforeach;?>	
				<div class="post">
					<hr>
				<!-- Fetured Items ========================== -->
				<h5>Featured Items</h5>

					<?php
					//recent items build up
					$this->db->where('status', '3');	
					$this->db->where('featured', '1');			
					$this->db->limit('5');
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
				
			<?php endif;?>
			
	<?php endif; ?>

<?php else: ?>
	<div class="twelve columns">
		<form class="well form-inline">
			<input type="text" name="query" placeholder="What are you looking for?" class="span4" style="height: 30px; font-size: 14px; color: grey;" />
			<input type="text" name="price" placeholder="Average Price" class="span2" style="height: 30px; font-size: 14px; color: grey;" />
			<select name="location" class="span2" style="height: 30px; font-size: 14px; color: grey;"/>
			<option style="height: 30px; font-size: 14px; color: grey; width: auto;" value="" > Location ...</option>
			<?php
			$this->db->order_by('hood_name', 'asc');
			$hg = $this->db->get('hoods');
			foreach($hg ->result () as $hoods):
			?>
			<option style="height: 30px; font-size: 14px; color: grey; width: auto;" value="<?= $hoods -> hood_name; ?>"> <?= $hoods -> hood_name; ?></option>
			<?php endforeach; ?>
			</select>
			<button type="submit" class="btn btn-inverse btn-large"> Find It.</button>
		</form>
	</div>
	
	<div class="twelve columns">
		<legend> Or Browse By Category</legend><br>
		<?php
		$this->db->order_by('cat_name', 'asc');
		$ct = $this->db->get('categories');
		foreach ($ct -> result() as $cat):
			$cimg = base_url('static/icons/map/'.$cat->cat_icon);
		?>
		<div class="one columns"><a href="<?= base_url('category/' . $cat -> cat_slug); ?>" title="<?= $cat -> cat_name; ?>"> <img src="<?= $cimg; ?>" alt="<?= $cat -> cat_name; ?>"> <?= $cat -> cat_name; ?> </a></div>
		
		<?php endforeach; ?>
		<hr>
	</div>
	
<?php endif; ?>
<hr>
</div>