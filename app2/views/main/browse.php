<section id="content" class="container clearfix">
	<div class="span12 clearfix row-fluid">
		<ul class="unstyled btn-group pull-right">
			<li class="btn btn-mini btn-inverse"> Order By </li>
			<li class="btn btn-mini"><a href="<?=base_url('landing/browse/price');?>"><i class="brocco-icon-tag"></i> Price</a></li>
			<li class="btn btn-mini"><a href="<?=base_url("landing/browse/location");?>"><i class="brocco-icon-flag"></i> Location </a></li>
			<li class="btn btn-mini"><a href="<?=base_url('landing/browse/date');?>"><i class="entypo-icon-time"></i> Date </a></li>

		</ul>
		<hr>
	</div>
	<div class="span12 clearfix row fluid">
	    <ul class="unstyled">

	    	<div class="span12 row-fluid clearfix">

		<?php foreach ($item_query->result() as $mdata):
		$img = base_url().'images/'.$mdata->image;
		?>
		<li class="span2 clearfix rowfluid">
			<div class="span12">
		<a href="<?=base_url('landing/view/'.$mdata->item_id)?>"><img src="<?= $img; ?>" alt="<?= $mdata -> name; ?>"></a><br>
		<h5><?= $mdata -> name; ?></h5>
		<p><?php $string = $mdata -> desc;
			$string = word_limiter($string, 6);
			echo $string;?>&nbsp;<small>
			<a href="<?=base_url('view/'.$mdata->item_id)?>">More <i class="splashy-bullet_blue_expand"></i></a></small></p>
		<p><?php $xw = array($mdata -> tags); ?>
			<i class="brocco-icon-tag"></i> Price:<b> <?=$mdata->item_price;?></b> Per Day<br>
			<i class="brocco-icon-flag"></i> Location: <?= $mdata -> location; ?>
		</p>
		
		<div class="btn-group">
		<a href="<?= base_url("landing/view/" . $mdata -> item_id); ?>" class="btn btn-mini" title="View item"><i class='icomoon-icon-eye-2 '></i> View</a>
		<a href="<?= base_url("landing/inquire/" . $mdata -> item_id); ?>" class="btn btn-mini" title="Contact owner"><i class="splashy-group_grey"></i> Contact</a>
		<!--<a href="<?= base_url("landing/fork/" . $mdata -> item_id); ?>" class="btn btn-mini" title="Fork Item"><i class="splashy-marker_rounded_grey_1"></i> Fork</a>-->
		
		</div>
		</li>
		
		<?php endforeach; ?>
		
		<hr>
		</ul>
	</div>

</section>