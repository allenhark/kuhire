<!-- Top level slider ============================= -->
<div id="slider" style="background-image:url(<?=base_url('static/images/home.png');?>); min-height: 350px;">

	<div class="container container-twelve">
		<div class=" twelve columns" >
			
			<form class="form-inline " action="<?=base_url('wanted/');?>" style="margin-left: 0; background: transparent; ">
				<input type="hidden" name="limit_min" value="0">
				<input type="hidden" name="limit_max" value="10">
				<input type="hidden" name="ref" value="Home page">
				<input type="hidden" name="terminal" value="Main">
				<input type="hidden" name="max" value="off">
				<input type="hidden" name="phone" value="null">
				<input type="hidden" name="source" value="internal" >
				<div style="margin: 0; ">
					<input type="text" name="s" placeholder="What are you hiring out?" class="seven columns" style="height: 50px; font-size: 24px; color: grey;" />
					<!-- input type="text" name="price" placeholder="Price" class="span2" style="height: 50px; font-size: 22px; color: grey;" / -->			
					<input type="text" name="location" class="three columns pull-right" style="height: 50px; font-size: 22px; color: grey; width: auto;" placeholder="Within.."/>
				</div>
					<br> <br>
			<div class="divider"> &nbsp; </div>
			<div style="text-align: center">
				<button type="submit" class="btn btn-info btn-large" style="height: inherit; font-size: 24px;"><i class="splashy-zoom"></i> Find It.</button>
			</div>
		</form>
		</div>
		<div class="clear"></div>
	</div>

</div><!-- //slider -->

   <div class="home-boxes content container" style="margin-top: -130px;">

    <!-- iPhone module -->
    <div class="iphone-container c2" style="float: left;">
      <!-- iPhone default -->
      <div id="iphone-wrapper" class="c2">
        <div class="home-box c2 iphone-box">
          <div class="iphone-screenshot">
          	
          </div>

          <div class="upper-section">
            <span class="kicker"></span>
            <h2>Scrobber on your phone </h2>
          </div>
          <div class="lower-section" >
            <p>Find rentals from your mobile phone. <a  href="<?=base_url('mobile/wanted');?>">Switch to mobile site &rsaquo;</a></p>

            <?php if(isset($_GET['link'])):?>
            	<div class="input">
            		<p class="alert">
            			You will recieve a link to Scrobber Mobile Version Shortly
            		</p>
            	</div>
        <?php else:?>
            <p class="iphone-message">Or have a link sent to your Phone:</p>
            <form action="<?=base_url('get-on-mobile');?>" class="modal-form" id="iphone-form">
            	<div class="input">
	              <div class="input-append">
	                <input type="text" name="phone_number" id="phone_number" placeholder="Cell Number"  style="width: 100px;"/>
	                <button type="submit" class="btn btn-info"/>Get it Now </button>
	              </div>
	             </div>
              
            </form>
         <?php endif; ?>
          </div>
        </div>
      </div>

    </div>
    <div class="home-box c1" style="max-width: 350px; float: right;">
      <!-- Intro Module -->
      <div class="upper-section">
        <span class="kicker">About</span>
        <h2>What's Scrobber?</h2>
        <h5> S-K-RO-BA **
        <span style="font-size: 10px;"> Thats how we say it!</span>
        </h5>
      </div>
      <div class="lower-section" style="height: auto;">
        <p>Scrobber is a one-stop shop for sports, concert, and theater tickets. We search numerous vendors and present the results simply. All 100% for free.</p>

        <p><a href="<?=base_url('help/case-study');?>">See what Scrobber can do for you &rsaquo;</a></p>
      </div>
    </div>
  </div>
	<div class="clear"> &nbsp; </div>
	<!-- Advert ====================== -->
<div class="container content " style="text-align: center; margin-top: 15px; font-size: 30px; width: auto;">

	<a class="btn btn-warning btn-large insetshadow" href="<?=base_url('wanted/add');?>">
		ADD MY RENTAL REQUEST ON SCROBBER
	</a>
</div>


<!-- Container ================================== -->

<div id="content" class="homepage container container-twelve" >
	<div class="twelve column" style="text-align: center; margin-left: 400px;">
		<h4> Recently Added </h4>
	</div>
	
	
	<div class="clear"> &nbsp;</div>
	

	<div class="twelve columns row-fluid container-fluid clearfix">
		<div class="two columns" style="margin-left: 0px; width: 160px;">
			<h3> Categories: </h3>
			<ul>
				<?php
				$this->db->order_by('cat_name', 'asc');
				$cats = $this->db->get('categories');
				
				//Pagination
				
				
				//Item Build up
				foreach ($cats->result() as $crow):
				?>
				<li><a href="<?= base_url('wanted/category/' . $crow -> cat_slug); ?>"> <img src="<?=base_url('static/icons/map/'.$crow->cat_icon);?>" width="10%" height="10%"> <?= $crow -> cat_name; ?> </a></li>
				<?php endforeach; ?>			
				
			</ul>
		</div>
		
		<div class="nine columns" style="margin-left: 0; ">	
			
			<div class="clear"></div>
			
			<?php 		
			foreach ($latest ->result () as $row):
				$this->db->where('user_id', $row->want_user);
				$data = $this->db->get('user');
				foreach($data -> result () as $user);
			?>		
			<p class="well">

				<?=$user->first_name;?> wantes a 
				<a href="<?=base_url('wanted/item/'.$row->want_slug);?>" title="View Want"> 
					<?=$row->want_name;?> 
				</a>
				in <?=$row->want_location;?>.

			</p>		
			
			<?php endforeach; ?>		
			
		</div>
		
	</div>

</div>

        