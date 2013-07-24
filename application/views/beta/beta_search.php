<div class="container container-twelve">
	<?php if($this->uri->segment(2) == 'nothing'):?>
			<div class="alert">
				<p>
					We found Zer0 results for "<?=$_GET['keyword'];?>", you can give it a try again.
					<span class="label"> Hint: </span>
					Try changing the keywords 
				</p>
			</div>
			<div class="clear"> &nbsp; </div>
		<?php endif; ?>
	<div class='twelve columns search-top hidden-phone' id="search">
		<dl class="search-label"> Search </dl>
		<br>
		
		<form action="<?=base_url('search/');?>">
			<input type="text" name="s" placeholder="What are you looking for?" style="height: 35px; font-size: 18px; color: grey; font-style: italic;" class="span7"/>
			<br>
			<input type="hidden" name="limit_min" value="0">
			<input type="hidden" name="limit_max" value="10">
			<input type="hidden" name="ref" value="search home">
			<input type="hidden" name="source" value="internal" >
			<input type="hidden" name="max" value="off" >
			<button class="btn btn-large btn-inverse"><i class="splashy-zoom"></i> Find It</button>
		</form>
	</div>
	<div class="clear clearfix">&nbsp; </div>
	<br>
	<!-- Show featured ==================== -->
	
	<div class="twelve columns visible-desktop">
		<?php 
			foreach ($ft -> result () as $featured):
				$img = base_url('images/'.$featured->image);
		?>
		<a href="#">
			<div class="four columns featured well thumbnails" style="width: 25%; margin-left: 0px;">
				<a href="<?=base_url($featured->slug);?>">
				<img src="<?=$img;?>" alt="<?=$featured->name;?>"  style="width: 100%; height: auto; text-align: center;"/>
				</a>
				<br>
				<h5><a href="<?=base_url($featured->slug);?>" > <?=$featured->name;?></a></h5>
				
                                <i class="brocco-icon-tag"></i><?php if($featured->item_price == ''):;?> Inquire <?php else:;?>  <?=$featured->item_price.'.00';?> <?php endif;?>
				&nbsp;
				<i class="icomoon-icon-flag"></i> <?=$featured->location;?>			
			</div>
		</a>
		<?php endforeach;?>
		<div class="clear clearfix">&nbsp;</div>
		<p style="opacity: 0.5;"><a href="<?=base_url('help/advertising');?>"><span class="small">Get my product Featured </span></a> </p>
	</div>

	<br>
	<hr style="opacity: 0.1;">
	
</div>