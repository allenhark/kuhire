<?php 
if($this->uri->segment('4') == NULL):
redirect(base_url('browse/merchants'));
else:
?>
	<div id="pageinfo">

		<div class="container container-twelve ">
	<?php 
	//Item properties build up.
		foreach ($query->result () as $row):
			$uimg = base_url('avator/'.$row->avator);
			
			
	//Item owner build up
	
		
	?>
			<div class="pagetitle seven columns">
				<img src="<?=$uimg;?>"> &nbsp; &nbsp;
				<h1><?=$row->first_name.'&nbsp;'.$row->last_name;?></h2>
			</div>

			<div class="pagesnav five columns align-center">
				<div class="breadcrumbs" style="font-size: 16px; font-weight: 10px">
					<b> 						
						<i class="wpzoom-location"></i> <?=$row->location;?> 
						&nbsp;
						<i class="brocco-icon-phone "></i> Call <b> <?=$row->phone;?>! </b>
					</b>
					 
				</div>
			</div>

			<div class="clear"></div>

		</div>

	</div><!-- //pageinfo -->



	<div id="content" class="container container-twelve">

		<div id="blog-posts" class="nine columns">
			
			<div class="post">
				
				<!-- 
				<div class="post-slideshow">
					<a href='<?=$img;?>' rel="prettyPhoto" title="<?=$row->name;?>">
					<img src="<?=$img;?>" width="80%" height="80%" alt="<?=$row->name;?>" />
					</a>
				</div>-->
				<div class="post-content">
					
					<div class="twleve columns">
						
							<?php
								$this->db->where('item_owner', $row->user_id);
								$this->db->where('status', '3');
								$this->db->order_by('item_id', 'desc');
								$products =  $this->db->get('item');
								foreach ($products->result () as $idata):
									$iimg = base_url('images/'.$idata->image);
							?>
							<div class="four columns"> 
							<a href='<?=$iimg;?>' rel="prettyPhoto" title="<?=$idata->name;?>">
							<img src="<?=$iimg;?>" width="80%" height="80%" alt="<?=$idata->name;?>" />
							</a><br>
							<a href="<?=base_url('view/'.$idata->item_id);?>"> <?=$idata->name;?> </a> <br />
							<i class="entypo-icon-price"></i> <?=$idata->item_price;?>.00 <br>
							<i class="entypo-icon-flag"></i> <?=$idata->location;?>
							</div>							
							<?php endforeach; ?>
						
					</div>
					<div class="clear"></div>
					<?php  endforeach;?>

					<p>
						<div class="breadcrumbs"> 
							<a href="<?=base_url('browse/merchants');?>"><i class="brocco-icon-grid"></i> Other Merchants </a>
							&nbsp;&nbsp;
							<a href="<?=base_url('browse/location/'.$row->location);?>"><i class="eco-location"></i> Nearby Items</a>
							<div data-href="<?=current_url();?>" class="fb-like" data-send="true" data-width="250" data-show-faces="flase"></div>
							
						</div>
					</p>
				</div>
			</div>
			
			<hr />
	
			
			<div id="comments">
				<div class="fb-comments" data-href="<?=current_url();?>" data-num-posts="3" data-width="470"></div>
				<div class="clear"></div>
			</div>

			<hr />
			
			<div class="post">
				<h4>Features Items</h4>
				<div class="clearfix"></div>
				<ul class="unstyled">
					<?php						
						$this->db->where('status', '1');									
						$this->db->limit('3');
						$this->db->order_by('item_id', 'random');						
						$related = $this->db->get('item');
						foreach ($related -> result () as $rel):
							$relimg = base_url('images/'.$rel->image);
						
					?>
					<li class="span2"> 
							<a href='<?=$relimg;?>' rel="prettyPhoto" title="<?=$rel->name;?>">
							<img src="<?=$relimg;?>" width="80%" height="80%" alt="<?=$rel->name;?>" />
							</a>
						<br>
							<a href="<?=base_url('view/'.$rel->item_id);?>"><?=$rel->name;?> </a> 
						<br>
							<i class="wpzoom-tag"></i> <?=$rel->item_price;?>.oo <br>
							<i class="wpzoom-flag"></i> <?=$rel->location;?> <br>
							
					 </li>
					<?php endforeach;?>
				</ul>
			</div>
		</div>

			<!-- Sidebar ================ -->
		<?php $this->load->view('beta/sidebar');?>

		<div class="clear"></div>

	</div><!-- //content -->
<?php endif;?>
