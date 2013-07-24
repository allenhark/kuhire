<section id="content" class="container clearfix">
<div class="span12">
<div class="hero-unit span9">
	<h1> Thanks for registering  </h1>
		<p> Have time? </p>
	<p> Check out our <a class="btn btn-large btn-primary" href="<?=base_url('landing/guide');?>">User guide </a> </p>
	<p> We will contact you shortly with your account details </p>
</div>	
<div class="row-fluid clearfix span12">
		<h3> Featured Items </h3>
		<?php
		//Get featured items and show em'
		$this->db->where('status', '1');
		$this->db->order_by("item_id", "desc"); 
		$featured = $this->db->get('item');
		foreach($featured->result() as $ft):
		$img = base_url().'images/'.$ft->image;
		?>
		<li class="span2">
			<div class="span12">
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
</div>
</section>