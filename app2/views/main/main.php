<div class="row-fluid clearfix">
<div class="visible-desktop span12">        
         
         <ul class="cb-slideshow unstyled">
            <li><span>Image 02</span></li>
            <li><span>Image 03</span></li>
            <li><span>Image 04</span></li>
            <li><span>Image 05</span></li>
        </ul>
    </div>
        <div class="span12 row-fluid container">

            <form action="<?=base_url('landing/search');?>" class="form-inline ag-form">

                <input type="text" name="query" class="input-large" placeholder="Search it now.">
                <input type="text" class="input-small" name="location" placeholder="Location?">                
                <input type="text" class="input-small" name="price" placeholder="Price?">
                <button class="btn btn-inverse btn-large" type="submit"><i class="splashy-zoom"></i> Find It </button>

            </form>
            
        </div>
    </div>

</div>



<!--
<div class="container clearfix">
	
	<div class="span4 well lform">
		<form class="form-inline" action="<?=base_url('landing/search/');?>">
			<fieldset>
				<div class="row">
					<div class="span4">
						<div class="control-group">
							<label for="focusedInput" class="control-label">Item Name</label>
							<div class="controls">
								<input type="text" name="query" value="" placeholder="What are you looking for Jimmy?" id="focusedInput" class="input-xlarge">
							</div>
						</div>	
						
						<div class="row">
							<div class="span2">							  
								<div class="control-group">
									<label for="focusedInput" class="control-label">Search locality:</label>
									<div class="controls">
										<select class="input-medium focused">
											<option>Please Select</option>
											<?php 
											//lets make it easier for us by using only locations from us.
											$this->db->order_by("hood_name", "asc"); 
											$hood = $this->db->get('hoods');
											foreach ($hood->result() as $hrow):
											?>
											
											<option value="<?=$hrow->hood_ext;?>"><?=$hrow->hood_name;?></option>
										<?php endforeach;?>
										</select>				
									</div>
								</div>
							</div>
							<div class="span2 ">	
								<label for="focusedInput" class="control-label">Item availability:</label>
								<div class="controls">
									<select name="availability" class="input-medium focused">
										<option value="Anyday">Any</option>
										<option value="Weekdays">WeekDays</option>
										<option value="Weekends">Weekends</option>
										<option value="holiday">Holidays</option>
									</select>
								</div>
							</div>		
						</div>	
						<div class="row">						  
							<div class="span2">							  
								<div class="control-group">
									<label for="focusedInput" class="control-label">Category</label>
									<div class="controls">
										<select name="category" class="input-medium focused">
											<option>Any</option>
											<?php
											//Still making it easier for our machine
											$this->db->order_by("cat_name", "asc"); 
											$cat = $this->db->get('categories');
											foreach ($cat->result() as $crow):

											?>
											
											<option value="<?=$crow->cat_slug;?>"><?=$crow->cat_name;?></option>
											<?php endforeach;?>
										</select>				
									</div>
								</div>
							</div>
							<div class="span2">	
								<label for="focusedInput" name="status" class="control-label">Order by?</label>
								<div class="controls">
									<select class="input-medium focused">
										<option>Date</option>
										<option>Price Low to High</option>
										<option>Price High to Low</option>
									</select>
								</div>
							</div>		
							
						</div>							
						<div class="row">						  
							<div class="span2">							  
								<div class="control-group">
									<label for="focusedInput" class="control-label">Minimum Price</label>
									<div class="controls">
										<select class="input-medium focused">
											<option selected="selected" value="">No min</option><option value="500">500</option><option value="1000">1,000</option><option value="5000">5,000</option><option value="10000">10,000</option><option value="50000">50,000</option><option value="60000">60,000</option><option value="70000">70,000</option><option value="80000">80,000</option><option value="90000">90,000</option><option value="100000">100,000</option><option value="110000">110,000</option><option value="120000">120,000</option><option value="125000">125,000</option><option value="130000">130,000</option><option value="140000">140,000</option><option value="150000">150,000</option><option value="160000">160,000</option><option value="170000">170,000</option><option value="175000">175,000</option><option value="180000">180,000</option><option value="190000">190,000</option><option value="200000">200,000</option><option value="210000">210,000</option><option value="220000">220,000</option><option value="230000">230,000</option><option value="240000">240,000</option><option value="250000">250,000</option><option value="260000">260,000</option><option value="270000">270,000</option><option value="280000">280,000</option><option value="290000">290,000</option><option value="300000">300,000</option><option value="325000">325,000</option><option value="350000">350,000</option><option value="375000">375,000</option><option value="400000">400,000</option><option value="425000">425,000</option><option value="450000">450,000</option><option value="475000">475,000</option><option value="500000">500,000</option><option value="550000">550,000</option><option value="600000">600,000</option><option value="650000">650,000</option><option value="700000">700,000</option><option value="800000">800,000</option><option value="900000">900,000</option><option value="1000000">1,000,000</option><option value="1500000">1,500,000</option><option value="2000000">2,000,000</option><option value="3000000">3,000,000</option><option value="">No min</option>
										</select>				
									</div>
								</div>
							</div>
							<div class="span2">	
								<label for="focusedInput" class="control-label">Maximum Price</label>
								<div class="controls">
									<select class="input-medium focused">
										<option selected="selected" value="">No Max</option><option value="50000">50,000</option><option value="60000">60,000</option><option value="70000">70,000</option><option value="80000">80,000</option><option value="90000">90,000</option><option value="100000">100,000</option><option value="110000">110,000</option><option value="120000">120,000</option><option value="450000">450,000</option><option value="475000">475,000</option><option value="500000">500,000</option><option value="550000">550,000</option><option value="600000">600,000</option><option value="650000">650,000</option><option value="700000">700,000</option><option value="800000">800,000</option><option value="900000">900,000</option><option value="1000000">1,000,000</option><option value="1500000">1,500,000</option><option value="2000000">2,000,000</option><option value="3000000">3,000,000</option><option value="">No min</option>
									</select>
								</div>
							</div>		
							
						</div>	
						
					</div>
					<div class="row">	
						
						<div class="span2 pull-right" style="margin-top: 10px;">
							<button class="btn btn-primary pull-right" type="submit">Search</button>
							
						</div>
					</div>						
					
				</div>
				
			</fieldset>
		</form>
	</div>
	<div class="span6  pull-right">
		<!-- Start slideshow-carousel -->
			
		
		<!-- // end of slideshow-carousel -->
	<!--	
	</div>
</div>
-->
<section class="clearfix" style="margin-top: 20%; margin-right: 10px; margin-left: 10px;">
<div class="span12" style="margin-left: 25%">
	<ul class="unstyled btn-group">
		<li class="btn  btn-info btn-large"><i class="splashy-information"></i><a href="<?=base_url('landing/how-it-works');?>"> How it works </a></li>
		<li class="btn  btn-info btn-large"> <?php if($this->session->userdata('logged_in')) {?>
			<i class="splashy-document_a4_add"><a href="</i><?=base_url('dashboard/add');?>"> Add New Listing </a>
		<?php } else {?>
			<i class="splashy-group_blue_add"></i><a href="<?=base_url('landing/get-started');?>"> Get Started </a><?php }; ?>
		</li>
		<li class="btn btn-large btn-gebo"><i class="splashy-thumb_up"></i><a href="<?=base_url('landing/benefits');?>"> Benefits </a></li>
		<li class="btn btn-large btn-gebo"><i class="splashy-lock_large_locked"></i><a href="<?=base_url('landing/security');?>"> Protect yourself</a></li>
	</ul>
</div>	
<hr>		
</section>
<!-- end #features-slider -->

   
<?php if ($item_query->num_rows() > 0): ?>
	<div class="row-fluid clearfix span12" style="display:block;">
  <h6 class="section-title">Latest Items</h6>

    <ul class="unstyled">
    <?php foreach ($item_query->result() as $item_row):
	$img = base_url().'images/'.$item_row->image;
	 ?>
	 
       <li class="span2">
       		<div class="span12">
				<a href="<?=base_url('/landing/view/'.$item_row->item_id)?>"><img src="<?=$img;?>" width ='150px' height='100px' alt="<?=$item_row->name;?>"></a><br>
				<h5><?=$item_row->name;?></h5>
				<p><?php $string = $item_row->desc; $string = word_limiter($string, 10); echo $string; ?>&nbsp;<small><a href="<?=base_url('/landing/view/'.$item_row->item_id)?>">More <i class="splashy-zoom_in"></i></a></small></p>
				<p><i class="splashy-tag"></i> Price: <?=$item_row->item_price;?>.00</p>
				<div class="btn-group">
					<a href="<?=base_url("/landing/view/".$item_row->item_id);?>" class="btn btn-mini" title="View item"><i class=' brocco-icon-eye'></i> View</a>
					<a href="<?=base_url("/landing/inquire/".$item_row->item_id);?>" class="btn btn-mini" title="Contact owner"><i class="splashy-group_grey"></i> Contact</a>
					<a href="<?=base_url("/landing/fork/".$item_row->item_id);?>" class="btn btn-mini" title="Fork Item"><i class="splashy-marker_rounded_grey_1"></i> Fork</a>		
				</div>
			</div>
		</li>
		
    <?php endforeach;?>
    </ul>

    </div>
    <div class="clearfix"><hr></div>
<?php endif;?>

 <?php if ($hired_query->num_rows() > 0): ?>
	<div class="row-fluid clearfix span12">
  <h6 class="section-title">Latest stuff hired from Scrobber</h6>

    <ul class="unstyled">
    <?php foreach ($hired_query->result() as $hired_row):
	$img = base_url().'images/'.$hired_row->image;
	 ?>
	 
       <li class="span2">
       		<div class="span12">
				<a href="<?=base_url('/landing/view/'.$hired_row->item_id)?>"><img src="<?=$img;?>" width ='150px' height='100px' alt="<?=$hired_row->name;?>"></a><br>
				<h5><?=$hired_row->name;?></h5>
				<p><?php $string = $hired_row->desc; $string = word_limiter($string, 15); echo $string; ?>&nbsp;<small><a href="<?=base_url('/landing/view/'.$hired_row->item_id)?>">More <i class="splashy-bullet_blue_expand"></i></a></small></p>
				<p>Tags: <?=$hired_row->tags;?></p>
				<div class="btn-group">
					<a href="<?=base_url("/landing/book/".$hired_row->item_id);?>" class="btn btn-mini" title="Book it"><i class="splashy-group_grey_add"></i> Book</a>
					<a href="<?=base_url("/landing/watch/".$hired_row->item_id);?>" class="btn btn-mini" title="Watch this item when its available"><i class="splashy-tag_add"></i> Watch</a>
					<a href="<?=base_url("/landing/fork/".$hired_row->item_id);?>" class="btn btn-mini" title="Fork Item"><i class="splashy-marker_rounded_add"></i> Fork</a>		
				</div>
			</div>
		</li>
    <?php endforeach;?>
    </ul>
        <divclass="span3 pull-right">
    <p>
    	<h6> <i class="splashy-help"></i> Help Understanding our buttons?</h6>
    	<ul class="unstyled">
    		<li><i class='brocco-icon-eye'></i> View: -> Opens the highlighted producs.</li>
    		<li><i class="splashy-group_grey"></i> Contact: -> Send a message to item owner.</li>
    		<li><i class="splashy-marker_rounded_grey_1"></i> Fork: -> The intelligent button, teach it to know what you are looking for.</li>
    		<li><i class="splashy-group_grey_add"></i>Book: ->Don't miss out when the item is available. Preorder.</li>
    		<li><i class="splashy-tag_add"></i> Watch:-> Get notified when the item is available for hire</li>
    	</ul>
    	
    			
    	<?php if ($this->session->userdata('logged_in')):?>
    		<div class="btn-group">
    		<a class="btn btn-primary btn-small" href="<?=base_url('dashboard/add');?>"><i class="splashy-document_a4_add"></i> Add New</a>
    		<a class="btn btn-gebo btn-small" href="<?=base_url('dashboard/fork');?>"><i class="splashy-marker_rounded_add"></i> Folk Settings</a>
    		<a class="btn btn-info btn-small" href="<?=base_url('dashboard/profile');?>"><i class="splashy-sprocket_dark"></i> My Profile</a>
    	</div>
    		<?php else :?>
    			<p ><i class="splashy-smiley_amused"></i> Hi guest, you are missing out big.</p>
    			<div class="btn-group">
    				<a class="btn btn-info btn-small" href="<?=base_url('landing/join');?>"><i class="splashy-group_blue_add"></i> Join</a>
    				<a class="btn btn-gebo btn-small" href="<?=base_url('landing/login');?>"><i class="splashy-lock_large_unlocked"></i> Login</a>
    				<a class="btn btn-primary btn-small" href="<?=base_url('landing/benefits');?>"><i class="splashy-information"></i> Benefits</a>
    				
    			</div>
    			
    	<?php endif;?>
    </p>    
    </div>
    <div class="clearfix"><hr></div>
    </div>
<?php endif;?>


</section><!-- end #content -->