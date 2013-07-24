<section id="content" class="container clearfix">

	<header class="page-header">

		<h1 class="page-title">Browse by Regions</h1>

	</header>
	<div class="span12">
<?php if ($query->num_rows() > 0): ?>
        
   <?php foreach ($query->result() as $row): ?> 
	<h4><a href="<?= base_url('landing/country/' . $row -> country_ext); ?>"> <?= $row -> country_name; ?></a> &nbsp;<i class="flag-<?=$row->country_ext;?>"></i></h4>
	<?php 
		$this -> db -> where('country_id', $row->country_id);
		$city = $this->db->get('cities');
		foreach ($city->result() as $crow):
		?>
	<div class="span2">
		
		<h5><a href="<?=base_url('landing/city/'.$crow->city_ext);?>"><?= $crow -> city_name; ?> <i class="splashy-map"></i></a></h5>
		<ul class="arrow-2 dotted" >
			<?php $this->db->where('city_id', $crow->city_id);
			$hood = $this->db->get('hoods');
			foreach ($hood->result() as $hrow):
			?>
			<li><a href="<?= base_url('landing/hood/' . $hrow -> hood_ext); ?>"> <?= $hrow -> hood_name; ?> &nbsp; <i class="splashy-marker_rounded_grey_2"></i> </a></li>
			<?php endforeach; ?>
			<li>Suggestion? &nbsp; <i class="splashy-marker_rounded_add"></i></li>
		</ul>
		
	</div><!-- end .one-fourth -->
	<?php endforeach; ?>
	<hr />
<?php endforeach; ?>
</div>
	<div class="clear"></div>

</section>

<?php endif; ?>
