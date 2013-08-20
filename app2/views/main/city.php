<section id="content" class="container clearfix">
 <?php if ($lmain == 'city'):?>

  
    <?php foreach ($item_query->result() as $item_row):
	
    	/*
		 * City hoods build up
		 * Items are inserted in the database useng hoods_ext not cities 
		 */
		 $this->db->where('city_id', $item_row->city_id);
		 $hood = $this->db->get('hoods');
		 foreach ($hood ->result() as $hoodr):
		 /*
		  * Item construction
		  */
		 
    	$this->db->where('location', $hoodr->hood_ext);
		$this->db->where('status', "1");
		$this->db->or_where('status', "3");
    	$metric = $this->db->get('item');
    	endforeach;
	?>
<div class="row-fluid clearfix span12"> 	
    <div class="one-third">
		<h3><?= $item_row -> city_name; ?> &nbsp; <i class="splashy-map"></i></h3>
		
	</div>
	<div class="two-third last">
		<!-- We process city analytics here -->
		<p><img src="<?= base_url(); ?>legacy/v3/img/gCons/world.png"> Analytics</p>
		<i class="splashy-marker_rounded_blue"></i> <?= $hood -> num_rows(); ?> Hood(s) in <?= $item_row -> city_name; ?>&nbsp; 
		<i class="splashy-documents"></i> <?= $metric -> num_rows(); ?> Item(s) posted in <?= $item_row -> city_name; ?>
		<?php endforeach; ;?>
	</div>
	
</div> 
	
	<hr>
	<div class="span12 row-fluid clearfix">
    
    <h6 class="section-title">Latest Items from <?= $item_row -> city_name; ?></h6>

    <ul class="unstyled">


		<?php foreach ($metric->result() as $mdata):
		$img = base_url().'images/'.$mdata->image;
		?>
		<li class="span3"><div class="span12">
		<a href="<?=base_url('view/'.$mdata->item_id)?>"><img src="<?= $img; ?>" alt="<?= $mdata -> name; ?>"></a><br>
		<h5><?= $mdata -> name; ?></h5>
		<p><?php $string = $mdata -> desc;
			$string = word_limiter($string, 15);
			echo $string;
 ?>&nbsp;<small><a href="<?=base_url('view/'.$mdata->item_id)?>">More <i class="splashy-bullet_blue_expand"></i></a></small></p>
		<p><?php $xw = array($mdata -> tags); ?>
			Tags: <?= $mdata -> tags; ?>
		</p>
		
		<div class="btn-group">
		<a href="<?= base_url("landing/view/" . $mdata -> item_id); ?>" class="btn btn-mini" title="View item"><i class='icomoon-icon-eye-2 '></i> View</a>
		<a href="<?= base_url("landing/inquire/" . $mdata -> item_id); ?>" class="btn btn-mini" title="Contact owner"><i class="splashy-group_grey"></i> Contact</a>
		<a href="<?= base_url("landing/fork/" . $mdata -> item_id); ?>" class="btn btn-mini" title="Fork Item"><i class="splashy-marker_rounded_grey_1"></i> Fork</a>
		
		</div>
		</li>
		
		<?php endforeach; ?>
		
		
		</ul>
	</div>
	</div>
	
        </ul>
	
	</div>
	<br>
	<?php
	/*
	 Build up for regions in the selectes city
	*/
	?>
	<div class="span12 clearfix row-fluid">
	<h3> Regions in <?=$item_row->city_name;?></h3>
	<ul class="unstyled">
	<?php foreach ($hood ->result() as $hoodr):?>
	<li class="span2"> <?=$hoodr->hood_name;?></a>
	<div class="btn-group">
		<a href="<?=base_url('landind/hood/'.$hoodr->hood_ext);?>" class="btn btn-mini" title="Browse locality"><i class='wpzoom-lollipop'></i></a>
		<a href="<?=base_url('landind/hood/'.$hoodr->hood_ext);?>" class="btn btn-mini" title="Fork Location"><i class="splashy-marker_rounded_grey_1"></i></a>
		
		
	</div>
	</li>	
	<?php endforeach;?>
	</ul>
	</div>
    <!-- end .city/hood-carousel -->

<?php if ($metric->num_rows() == "0" ):?>
<div class="info"> <b> We have no data for the requested city.  Be the first to add <i class="splashy-smiley_amused"></i></b> </div> 
<p> Learn more about this error <a href="http://blog.scrobber.com/?s=no+data"><i class="splashy-information"></i> Learn more <i class="splashy-arrow_medium_upper_right"></i></a></p>
<p> Contact Customer support if you think this is a system error<a href="<?=base_url('contact')?>"> Support team <i class="splashy-arrow_medium_upper_right"></i></a></p>
<?php endif ?>


<?php elseif ($lmain == 'hood') : ?>


<?php if ($item_query->num_rows() > 0):?>
        
    <?php foreach ($item_query->result() as $hoodr): 
		 /*
		  * users construction
		  */
		 $this->db->where('location', $hoodr->hood_ext);
		 $this->db->where('status', '1');
		 $udata = $this->db->get('user');
		 /*
		  * We can try processing the city name.
		  */
		  $this->db->where('city_id', $hoodr->city_id);
		  $cdata = $this->db->get('cities');
		  foreach ($cdata->result () as $crow);
		 
    	$this->db->where('location', $hoodr->hood_ext);
		$this->db->where('status', "1");
		$this->db->or_where('status', "3");
    	$metric = $this->db->get('item');
		
		$config['base_url'] = base_url('city/');
		$config['total_rows'] = $cdata->num_rows();
		$config['per_page'] = 1;

		$this->pagination->initialize($config);

	
    	?>
	<div class="row-fluid span12 clearfix">
    	<div class="one-third">
		<h3><?= $hoodr -> hood_name; ?> &nbsp; <i class="splashy-marker_rounded_light_blue"></i></h3>
		<a href="<?=base_url('city/'.$crow->city_ext)?>" title="<?= $crow -> city_name; ?>"><?= $crow -> city_name; ?> &nbsp; <i class="splashy-map"></i></a>
		
		
	
	</div>
	<div class="two-third last">
		<!-- We process city analytics here -->
		<img src="<?= base_url(); ?>legacy/v3/img/gCons/world.png"> Analytics
		<p>
		<i class="splashy-group_blue"></i>&nbsp; <?= $udata -> num_rows(); ?> User(s) from <?= $hoodr -> hood_name; ?>&nbsp; 
		<i class="splashy-documents"></i>&nbsp; <?= $metric -> num_rows(); ?> Item(s) posted in <?= $hoodr -> hood_name; ?>&nbsp;
		Learn more about&nbsp; <a href="<?= base_url('fork'); ?>"><i class="splashy-thumb_up"></i> <b>fork</b> button <i class="splashy-marker_rounded_grey_1"></i></a>
		</p>
	</div>
	<hr>
	</div>
	<div class="row-fluid span12 clearfix" >
		<h3> Latest items</h3>
		<hr>
		<ul class="unstyled">
	
		<?php foreach ($metric->result() as $mdata):
		$img = base_url().'images/'.$mdata->image;
		?>
		<li class="span3"><div class="span12">
		<a href="<?=base_url('view/'.$mdata->item_id)?>"><img src="<?= $img; ?>" alt="<?= $mdata -> name; ?>"></a><br>
		<h5><?= $mdata -> name; ?></h5>
		<p><?php $string = $mdata -> desc;
			$string = word_limiter($string, 15);
			echo $string;
 ?>&nbsp;<small><a href="<?=base_url('view/'.$mdata->item_id)?>">More <i class="splashy-bullet_blue_expand"></i></a></small></p>
		<p><?php $xw = array($mdata -> tags); ?>
			Tags: <?= $mdata -> tags; ?>
		</p>
		
		<div class="btn-group">
		<a href="<?= base_url("landing/view/" . $mdata -> item_id); ?>" class="btn btn-mini" title="View item"><i class='icomoon-icon-eye-2 '></i> View</a>
		<a href="<?= base_url("landing/inquire/" . $mdata -> item_id); ?>" class="btn btn-mini" title="Contact owner"><i class="splashy-group_grey"></i> Contact</a>
		<a href="<?= base_url("landing/fork/" . $mdata -> item_id); ?>" class="btn btn-mini" title="Fork Item"><i class="splashy-marker_rounded_grey_1"></i> Fork</a>
		
		</div>
		</li>
		
		<?php endforeach; ?>
		
		
		</ul>
	</div>
	<?= $this -> pagination -> create_links(); ?>
	</div>
	<?php endforeach; endif; ?>
<?php endif; ?>	
<?php if ($metric->num_rows() == "0" ):?>
<div class="info"> <b> We have no data for the requested locality.  Be the first to add <i class="splashy-smiley_amused"></i></b> </div> 
<p> Learn more about this error <a href="http://blog.scrobber.com/?s=no+data"><i class="splashy-information"></i> Learn more <i class="splashy-arrow_medium_upper_right"></i></a></p>
<p> Contact Customer support if you think this is a system error<a href="<?=base_url('contact') ?>"> Support team <i class="splashy-arrow_medium_upper_right"></i></a></p>
<?php endif ?>
</section>

