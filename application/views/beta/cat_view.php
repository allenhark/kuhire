<div class="container container-twelve">
	<?php foreach($ct->result () as $cat):?>
	
	<div class="twelve columns">
		
		<div class="five columns well search-top">
			<form action="">
				<input type="text" placeholder="Looking for a car?" name="s" style="height: 35px;" class="span4"/>
				<br>
				<input type="text" placeholder="Price" style="height: 30px;" class="span2"/> 
				&nbsp;
				<input type="text" placeholder="Location" style="height: 30px;" class="span2"/>
				<hr style="opacity: 0.001;">
				<button type="submit" class="btn btn-large btn-info"><i class="splashy-zoom"></i> Search</button>
			</form>
		</div>
		
		<div class="five columns well search-top" style="width="auto">
			<?php foreach($ft -> result() as $fet): $img = base_url('images/'.$fet->image);?>
			<a href="<?=base_url('view/'.$fet->item_id);?>">
				<img src="<?=$img;?>"  style = 'height: 30% ' alt="<?=$fet->name;?>"/>
				<br>
				<h6><?=$fet->name;?></h6>
			</a>
				<i class="splashy-tag"></i> <?=$fet->item_price.'.00 KES';?> &nbsp; <i class="splashy-marker_rounded_light_blue"></i> <?=$fet->location;?>
			
			<?php endforeach;?> <br>
			<p class="pull-right"><a href="#"> Show my car here</a> </p>
		</div>
		
	</div>		

	<?php endforeach;?>
</div>