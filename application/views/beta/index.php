<!-- Top level slider ============================= -->
<div id="slider" style="background-color: #f4f6f5;" class="push-down">

	<div class="container container-sixteen">
		<h3 style="font-size: 20px;"> Kenyas Trusted E-Rentals Marketplace! </h3>
		<div class="sixteen columns well-search" width="100%">
			<div class="margin-top: 10px">
				<input type="text" class="x-large input seven columns home-search" placeholder="What are you looking for?" style=" font-size: 30px; margin-left: 0px;"/>
				<input type="text" class="x-large input three columns home-search" placeholder="Price..." style=" font-size: 30px; margin-left: 5px;"/>
				<input type="text" class="x-large input three columns home-search " placeholder="Location..." style=" font-size: 30px; margin-left: 5px;"/>	
				<button class="btn home-search two btn-inverse columns" type="submit" style="margin-left: 5px;"><img src="<?=base_url('static/images/search-icon.png');?>" alt="search"/> </button>
                							
			</div>
		</div>
		<div class="clear"></div>
		<span class="help" style="color: grey; font-size: 12px; margin-top:-1px;"> Example: Toyota Rav 4, 4500 , Westlands, Nairobi. <strong>Search it, Find it, Hire it :<a href="#scrobber"> Scrobber </a></strong> </span>

	</div>

</div><!-- //slider -->

<!-- Search bar ================================== -->

<div id="content" class="homepage container container-twelve" >
	<div class="twelve column align-center">
		<form class="well form-inline" action="<?=base_url('search/');?>" style="margin-left: 0;"">
			<input type="text" name="query" placeholder="What are you looking for?" class="span4" style="height: 30px; font-size: 14px; color: grey;" />
			<input type="text" name="price" placeholder="Price" class="span2" style="height: 30px; font-size: 14px; color: grey;" />			
			<input type="text" name="location" class="span2" style="height: 30px; font-size: 14px; color: grey; width: auto;" placeholder="Location.."/>
			
			<button type="submit" class="btn btn-inverse btn-large"><i class="splashy-zoom"></i> Find It.</button>
		</form>
	</div>

	<hr>
	<div class="clear"> &nbsp;</div>
	

	<div class="twelve columns row-fluid container-fluid clearfix">
		<div class="two columns" style="margin-left: 0px; width: 160px;">
			<h3> Categories: </h3>
			<ul>
				<?php
				$this->db->order_by('cat_name', 'asc');
				$cats = $this->db->get('categories');
				
				//Pagination
				
				
				//Item Build up
				foreach ($cats->result() as $crow):
				?>
				<li><a href="<?= base_url('category/' . $crow -> cat_slug); ?>"> <img src="<?=base_url('static/icons/map/'.$crow->cat_icon);?>" width="10%" height="10%"> <?= $crow -> cat_name; ?> </a></li>
				<?php endforeach; ?>			
				
			</ul>
		</div>
		
		<div class="nine columns" style="margin-left: 0; ">
			
			<a href="#browse" id="browse" /></a>
			<div class="clear"></div>
			<div id="portfolio" class="span12">
			<?php 
			$this->db->where('status', '3');
			//$this->db->order_by('name', 'asc');
			$this->db->order_by('item_id', 'desc');
			$this->db->limit('6');
			$item = $this->db->get('item');		
			foreach ($item ->result () as $irow):
				$img = base_url('images/'.$irow->image);
			?>		
			
			<div class="item photography one columns ">
				<div class="well">
			<a href='<?=base_url('view/'.$irow->item_id);?>' class="thumb-placeholder" title="<?=$irow->name;?>">
				<img src="<?=$img;?>" width="170" height="120" alt="<?=$irow->name;?>" />
			</a>
			<p>
				<h4><a href="<?=base_url('view/'.$irow->item_id);?>"> <?=$irow -> name; ?> </a> </h4><br>
				<h6><i class="brocco-icon-tag "></i> Price:<?php if($irow->item_price == ''):;?> Inquire <?php else:;?> <?=$irow->item_price;?>.00 KSH <?php endif;?></h6><br>
				<h6><i class="brocco-icon-location"></i> Location: <?=$irow->location;?></h6>
				
				<div class="" style="text-align: center;">
					<a class="btn" href="<?=base_url('view/'.$irow->item_id);?>"><i class="brocco-icon-eye"></i> View </a>
				</div>
			</p>
			</div>
			<div class="clear clearfix clean" style="margin-top: 2px;"> &nbsp;</div>

			</div>
			
			<?php endforeach; ?>
			</div>
			
		</div>
		
	</div>

</div>