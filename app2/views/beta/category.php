<div class="container container-twelve" style="margin-top: 30px;">
	<div class="row span12 row-fluid container-fluid clearfix">
		<div class="twelve columns span12">
			<div class="span9">
				<h3> <?= $cat -> cat_name; ?> Category</h3>
				<?php
				if($idata->num_rows () !== 0):
					foreach ($idata -> result () as $result):
						$img = base_url('images/'.$result->image);
				?>
				<div class="well eight columns" style="margin-left: 0px;">
					<div class="two columns">
						<a href="<?= base_url($result -> slug.'/?ref=category-view'); ?>"> 
							<img src="<?= $img; ?>" alt="<?= $result -> name; ?>" />
						</a>
					 </div>
						<div class="five columns">
							<h3><a href="<?= base_url($result -> slug.'/?ref=category-view'); ?>"> <?= $result -> name; ?> </a></h3>
							<p><?= word_limiter($result -> desc, 15); ?></p>
							<p><i class="splashy-map"></i> <?= $result -> location; ?> &nbsp;&nbsp; <i class="splashy-tag"></i> <?php if($result->item_price == ""): echo 'Inquire'; else: echo $result->item_price; endif;?> </p>
						</div>					
				</div>
				
				<?php endforeach; ?>
				<?php else: ?>
				<div class="block alert-info" style="font-size: 20px;">
					
						We have no rentals posted in this category. Be the first to add a new one.
						<a href="<?= base_url('add'); ?>" class="btn"> Add Rental </a>
					
				</div>
				<?php endif; ?>
			</div>
			
			<?php $this -> load -> view('beta/userbar'); ?>

			
		</div>
	</div>

</div>

