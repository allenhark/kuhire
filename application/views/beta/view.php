<div class="container container-twelve ">
	<?php 
	//Item properties build up.
		
			$img = base_url('images/'.$row->image);
			
			$mysql = $row->pub_time;
			$unix = mysql_to_unix($mysql);
			
	//Item owner build up
	
		$this->db->where('user_id', $row->item_owner);
		$userd =  $this->db->get('user');
		foreach ($userd->result () as $user):
	?>
	<hr style="opacity: 0.002; ">
	<?php if($row->status != 3):?>
		<div class="alert-attention"> We cannot verify the status of this item, if you are the owner contact our customer support.</div>
		<div class="clean-a clear clearfix"> &nbsp;</div>
	<?php endif;?>
	<div id="pdp-title" class="align-center">
			<h3 property="v:itemreviewed"><?=$row->name;?></h3>
		</div>
		
		<div class="clear clearfix clean"> &nbsp; </div>
		<br>
	<div class="row-fluid">
		<div class="span9" style="margin: 0;">
			<div class="row-fluid">
			<div class="span3">
				<a href="<?=$img;?>" class="thumbnails" rel="prettyphoto"> <img src="<?=$img;?>" alt="<?=$row->name;?>" class="thumbnail" width="auto" height="auto"/> </a> <br /> <br />
				<i class="splashy-zoom_in"></i>Click photo enlarge							
			</div>
			
			<div class="span3">
				<ul class="unstyled" />
					<li> <h6> Item Details </h6> </li>
					<li> <i class="icomoon-icon-tag"></i> <strong> <?=$row->item_price.'.00/-';?> KES </strong> </li>
					<li> <i class="wpzoom-flag"></i> <?=$row->location;?>  </li>
					<li> <i class="wpzoom-phone-2"></i> <?=$user->phone;?> </li>
							
				</ul>

			</div>
			
			<div class="span3">
				<ul class="unstyled">
					<li> <h6> Owner Information </h6> </li>
					<li> <i class="wpzoom-user"></i> <?=$user->first_name.'&nbsp;'.$user->last_name;?> </li>
					<li> <i class="entypo-icon-flag"></i> <?=$user->location;?></li>
					
					<li> <a  class="btn btn-info"  > Hire It </a> </li>
								
				</ul>				
			</div>
		</div>
			
					<div class="clearfix clear">&nbsp;</div>
					<br>
			<div class="tabs span10">
				<ul >
					<li><a href="#" class="Details"><i class="splashy-view_thumbnail"></i> Details</a></li>
					<li><a href="#" class="Photos"><i class="splashy-image_cultured"></i> Photos</a></li>
					<li><a href="#" class="Reviews"><i class="splashy-star_boxed_full"></i> Reviews & Rating</a></li>
					
				</ul>
				<div class="Details content">
					<p>
					<?=$row->desc;?>
					</p>
				</div>
				<div class="Photos content">
					<p>
						This product has no extra images associated with it.
						
					</p>
				</div>
				<div class="Reviews content">
					<p class="align-left" style="font-size: 8px;">
						<h6> Used this Product? Don't forget to submit your review.</h6>
						<hr>
						<?php
							// Build reviews.
							$this->db->where('item_hook', $row->item_id);
							$rw = $this->db->get('reviews');
							if($rw -> num_rows () != 0):
								foreach($rw->result () as $review):
						?>		
						
						<p>
							<strong><?=$review->user_name;?> Says:</strong> <?=$review->review_txt;?> <strong class="pull-right">Rating: <?=$review->rating;?></strong> 
							<hr>
						</p>
						
						<?php endforeach; else:?>
							<p>This item as no reviews or rating. Be the first to review and rate it.</p>		
						<?php endif;?>
						<p class="content container">
							<form action="<?=base_url("review/".$row->slug.'/'.$row->item_id);?>" method="post" > 
								<?php if(validation_errors()):?>
									<ul>
										<li class="alert-warning">
											<?php echo validation_errors(); ?>
										</li>
									</ul>
								<?php endif;?>
								<br>
								<input type="hidden" name="item_hook" value="<?=$row->item_id;?>">
								
								<span> Your Name *</span><br>
								<input type="text" name="name" value="<?=$this->session->userdata('name');?>" placeholder="Your Name"/> <br>
								
								<span> Your Email Address *</span> <br>
								<input type="email" name="email" value="<?=$this->session->userdata('user_email');?>" placeholder="Email" /> <br>
								
								<span> Rating </span> <br>
								<select name="rating">
									<option value="1"> 1</option>
									<option value="2"> 2</option>
									<option value="3"> 3</option>
									<option value="4"> 4</option>
									<option value="5"> 5</option>
								</select>
								<br>
								
								<span> Review *</span> <br>
								<textarea id="review" class="auto-width mceNoEditor" name="msg"  cols="7" rows="5">  </textarea><br>
								<hr>
								<button type="submit" class="btn btn-info"> Review & Rate</button>
							</form>
						</p>		
					</p>
				</div>
			
			</div>
			
		</div>
	
		
		<div class="span3 well well-small" style="margin-left: 0; width:245px;">
			<?php if($this->uri->segment('2') == 'sent'):?>
								<div class="infobox">
									We sent your details to <?=$user->first_name.'&nbsp;'.$user->last_name;?>, You will be contacted soon
								</div>
								
							<?php endif;?>
					<?php if(validation_errors()):?>
									<ul>
										<li class="alert-warning">
											<?php echo validation_errors(); ?>
										</li>
									</ul>
					<?php endif;?>
					<h5> Rental Pricing: <br> <i class="btn" ><strong><?=$row->item_price.'.00/-';?> </i> KES / Day </strong></h5>
					
					<h6> Contact <b><a href="#"> <?=$user->first_name.'&nbsp;'.$user->last_name;?> <i class="splashy-arrow_medium_down"></i></a> </b></h6>
					<form action="<?=base_url('send/'.$user->user_id.'/'.$row->slug);?>" method="post">
						<span>Your Name * </span> <br>
						<input type="text" name="name" placeholder="Your Name" /> <br>
						
						<span> Your Email Address * </span> <br>
						<input type="text" name="email" placeholder="Your Email Address" /> <br>
						
						<span> Your Phone Number * </span> <br>
						<input type="text" name="phone" placeholder="Your Phone Number" /> <br>
						
						<span> Message </span> <br>
						<textarea name="msg" width="auto-width" class="mceNoEditor"></textarea> <br>
						<div>
							
							<div class="one columns">
								Start Date <br>
								<input  class="span7" type="text" id="date" name="start_date" placeholder="yyyy/mm/dd"/>
							</div>
							<div class="one columns ">
								End Date <br>
								<input class="span7" type="text"  name="end_date" placeholder="yyyy/mm/dd"/>													
							</div>
							
						</div>
						<input type="hidden"  name="user_email" value="<?=$user->email;?>" />
						<input type="hidden"  name="owner" value="<?=$user->user_id;?>" />
						<input type="hidden" name="user_name"  value="<?=$user->first_name;?>"/>
						<input type="hidden" name="p_name" value="<?=$row->name;?>" />
						
						<br>
						<button type="submit" class="btn btn-info"> Send </button> Hire Details
						
					</form>
		</div>
		
	</div>
	<div class="clear clearfix">&nbsp;</div>

<!-- Modal -->
<div id="hire_it" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">


<div class="modal-header">
<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
<h3 id="myModalLabel">Hire <?=$row->name;?> for  <?=$row->item_price.'.00/-';?></h3>
</div>
<div class="modal-body well">

	<form action="<?=base_url('send/'.$user->user_id.'/'.$row->slug);?>" method="post">
		<span>Your Name * </span> <br>
		<input type="text" name="name" placeholder="Your Name" /> <br>
						
		<span> Your Email Address * </span> <br>
		<input type="text" name="email" placeholder="Your Email Address" /> <br>
						
		<span> Your Phone Number * </span> <br>
		<input type="text" name="phone" placeholder="Your Phone Number" /> <br>
						
		<span> Message </span> <br>
		<textarea name="msg" width="auto-width" class="mceNoEditor"></textarea> <br>
		<div>
				
		<div style="margin-left: -20px;">

			<div class="span2" id="dp3" data-date="12-02-2012" data-date-format="dd-mm-yyyy">
				From <br>
			<input  class="span2" type="text" value="12-02-2012" />
			</div>

			<div class="one columns ">
				To <br>
			<input class="span2" type="text"  name="end_date" data-date="12-07-2012" data-date-format="dd-mm-yyyy" />													
			</div>
							
		</div>


	</div>
		<input type="hidden"  name="user_email" value="<?=$user->email;?>" />
		<input type="hidden"  name="owner" value="<?=$user->user_id;?>" />
		<input type="hidden" name="user_name"  value="<?=$user->first_name;?>"/>
		<input type="hidden" name="p_name" value="<?=$row->name;?>" />
						
	</div>

<div class="modal-footer">
	
	<button type="submit" class="btn btn-info"> Contact </button>

</form>

</div>
</div>

	<?php endforeach;?>

</div><!-- //content -->

