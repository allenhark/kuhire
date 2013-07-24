  <!-- Background -->
    <div class="home-header-bg">
      <div class="home-header-bg-center" id="bg-scroll"></div>
      <div class="home-header-shadow"></div>
    </div>
    
<div class="home-wrapper center-container">

  <div class="home-header">
    <h1><?=$ad->content;?></h1>

    <form action="<?=base_url('search');?>" class="search-form" id="search-form" autocomplete="off" method="get">

      <div class="search-bg"></div>
      <input type="submit" class="search-submit-large" value=""/>

      <div class="search-input-wrapper">

                <div class="search-ghost" id="search-ghost" style="display: none;">Search by name, category, brand, or location</div>
        <input type="text" id="search-input" class="search-input input-block" name="search" autocomplete="off" value="Search by name, category, brand, or location" rel="Search by name, category, brand, or location" tabindex="1" style="height: auto;">

      </div>
      <div class="clear"></div>
    </form>

    <div class="search-suggestions">Find rentals online. For instance, try <a href="#">Toyota Rav 4</a>, <a href="#">Camping Gear</a>, <a href="#">car for hire</a>, <a href="#">SUV</a> or <a href="#"> Wedding limo </a>.</div>
  </div>


  <!-- Large modules -->
  <div class="home-boxes row">

    <!-- iPhone module -->
    <div class="iphone-container c2">
      <!-- iPhone default -->
      <div id="iphone-wrapper" class="c2">
        <div class="home-box c2 iphone-box">
          <div class="iphone-screenshot">
          	
          </div>

          <div class="upper-section">
            <span class="kicker"></span>
            <h2>Scrobber <span><br> on your phone</span></h2>
          </div>
          <div class="lower-section">
            <p>Find rentals from your mobile phone. <a  href="<?=base_url('mobile');?>">Switch to mobile site &rsaquo;</a></p>

            <p class="iphone-message">Or have a link sent to your Phone:</p>
            <form action="#" class="modal-form" id="iphone-form">
              <div class="input">
                <input type="text" name="phone_number" id="phone_number" style="height: auto;"/>
                <label for="phone_number">Mobile Phone Number</label>
              </div>
              <input type="submit" value="Get it Now" class="blueBut lightBlue iphone-submit"/>
            </form>
          </div>
        </div>
      </div>

      <!-- iPhone success -->
      <div id="iphone-success-wrapper" class="c2">
        <div class="home-box c2 iphone-success-box">
          <div class="iphone-back"></div>

          <div class="upper-section">
            <h2>Sweet! <span>Have fun renting!</span></h2>
          </div>
          <div class="lower-section">
            <p>If you don't receive the text message, you can still <a  href="<?=base_url('mobile');?>">click here and access it. &rsaquo;</a> Alternatively, try <?=base_url('mobile');?></p>
          </div>
          <a href="#" class="iphone-close">&times;</a>
        </div>
      </div>
    </div>
    <div class="home-box c1">
      <!-- Intro Module -->
      <div class="upper-section">
        <span class="kicker">About</span>
        <h2>What's Scrobber?</h2>
        <h5> S-K-RO-BA</h5>
      </div>
      <div class="lower-section">
        <p>Scrobber is a one-stop shop for sports, concert, and theater tickets. We search numerous vendors and present the results simply. All 100% for free.</p>

        <p><a href="<?=base_url('case-study');?>">See what Scrobber can do for you &rsaquo;</a></p>
      </div>
    </div>
  </div>
	<div class="clear"> &nbsp; </div>
	
	<div class="row" style="margin-top: 10px; text-align: center;">
		<a class="blueBut lightBlue" style="width: auto; font-size: 30px;" href="<?=base_url('add/?ref=home');?>"> Add my rental on Scrobber! </a>
		
	</div>
	
	<div class="clear"> &nbsp; </div>

	<div class="row" style="min-width: 100%; margin-top: 6px; text-align: center;">
		
			<?php foreach ($recent -> result () as $data):?>
				<div class="" style="min-height: 100px; width: 19%; float: left; text-align: left; margin-left: 0;">
					<a href="<?=base_url($data->slug.'?ref=home-featured');?>">
						<img class="thumbnail" src="<?=base_url('images/'.$data->image);?>" alt="<?=$data->name;?> " width="90%" height="auto" style="border: solid 0.4px grey; "/>
					</a>
					<br>
					<span> 
						<a href="<?=base_url($data->slug.'?ref=home-fetured');?>">
							<?=$data->name;?>
						</a>
						 in <?=$data->location;?>
					</span>
				</div>
			
			<?php endforeach;?>
		
	</div>

  <!-- Benefits -->
  <div class="benefits row">

    <a href="<?=base_url('benefits');?>" class="benefit-search c1">
      <!-- Search -->
      <div class="benefit-icon benefit-search-icon"></div>
      <h2>Search Hundreds of Listings</h2>
      <p>Search hundreds of sites at once for sports, concert, and theater tickets. 100% free.</p>
      <p>Learn more &rsaquo;</p>
    </a>

    <div class="div"></div>

    <a href="<?=base_url('discover');?>" class="benefit-discover c1">
      <!-- Discover -->
      <div class="benefit-icon benefit-discover-icon"></div>
      <h2>No middleman</h2>
      <p>On Scrobber you hire directly from the rental owner.</p>
      <p>Learn more &rsaquo;</p>
    </a>

    <div class="div"></div>

    <a href="<?=base_url('cdn');?>/about.html#save" class="benefit-save c1">
      <!-- Save -->
      <div class="benefit-icon benefit-save-icon"></div>
      <h2>Cheap Prices</h2>
      <p>No middleman means lower prices. We have firsthand price.</p>
      <p>Learn more &rsaquo;</p>
    </a>

    <br style="clear: both;"/>
  </div>

</div><!-- /.home-wrapper -->


<script type="text/javascript">
  _gaq.push(['_trackEvent', 'impression', 'home-page', undefined, undefined, true]);
</script>

<!-- criteo partial -->
<script type="text/javascript" src="<?=base_url('cdn');?>/js/criteo/criteo_ld.js" async="true"></script>
	<script type="text/javascript">
	var CRITEO_CONF = [[{

		pageType: 'home'

	}], [6601, 'psu', 'us.', '010', [[7721848, 7721849]]]]; if (typeof (CRITEO) != "undefined") { CRITEO.Load(false); }
	</script>
                                  </div>
        
