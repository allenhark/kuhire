<div id="slider" class="hidden-phone" style="background-image:url(<?=base_url('static');?>/golf_bg.jpg); background-repeat: no-repeat;  min-height: 350px; width: 100%; background-size:100%;">

    <div class="container container-twelve" style="text-align: center; ">
        <div class=" twelve columns" >

            <form class="form-inline " action="<?= base_url('search/'); ?>" style="margin-left: 0; background: transparent; margin-top: -20px; ">
                <input type="hidden" name="limit_min" value="0">
                <input type="hidden" name="limit_max" value="10">
                <input type="hidden" name="ref" value="Home page">
                <input type="hidden" name="terminal" value="Main">
                <input type="hidden" name="max" value="off">
                <input type="hidden" name="phone" value="null">
                <input type="hidden" name="source" value="internal" >
                <div>
                    <input type="text" name="s" placeholder="What are you looking for?" class="five columns" style="height: 50px; font-size: 24px; color: grey;" />
                    <input type="text" name="price" placeholder="Price" class="two columns" style="height: 50px; font-size: 22px; color: grey;" />			
                    <input type="text" name="location" class="three columns" style="height: 50px; font-size: 22px; color: grey; width: auto;" placeholder="Location.."/>
                </div>
                <br />
                <div class="divider">  </div>
                <div style="text-align: center">
                    <br /> <br />
                    <button type="submit" class="btn btn-info btn-large" style="height: inherit; font-size: 24px;"><i class="splashy-zoom"></i> Find It.</button>
                </div>
            </form>
        </div>
        <div class="clear"></div>
    </div>

</div><!-- //slider -->

<div class="home-boxes content container hidden-phone" style="margin-top: -175px;">

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
                    <p>Find rentals from your mobile phone. <a  href="<?= base_url('mobile'); ?>">Switch to mobile site &rsaquo;</a></p>

                    <?php if (isset($_GET['link'])): ?>
                        <div class="input">
                            <p class="alert">
                                You will recieve a link to Scrobber Mobile Version Shortly
                            </p>
                        </div>
                    <?php else: ?>
                        <p class="iphone-message">Or have a link sent to your Phone:</p>
                        <form action="<?= base_url('get-on-mobile'); ?>" class="modal-form" id="iphone-form">
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
            <p>
                Scrobber is an intelligent platform that enables you list your items for hire.
            </p>
            <p><a href="<?= base_url('help/case-study'); ?>">See what Scrobber can do for you &rsaquo;</a></p>
        </div>
    </div>
</div>


<div class="clear visible-desktop"> &nbsp; </div>
<!-- Advert ====================== -->
<div class="container content visible-desktop" style="text-align: center; margin-top: 15px; font-size: 30px; width: auto;">

    <a class="btn btn-warning btn-large insetshadow" href="<?= base_url('add'); ?>">
        ADD MY RENTAL ON SCROBBER
    </a>
</div>



<!-- Container ================================== -->

<div id="content" class="homepage container container-sixteen" >
    <div class="twelve column hidden-phone" style="text-align: center; margin-left: 400px;">
        <h4> Recently Added </h4>
    </div>


    <div class="clear hidden-phone"> &nbsp;</div>

    <?php
    $this->db->order_by('cat_name', 'asc');
    $cats = $this->db->get('categories');
    ?>

    <div class="visible-phone" style="margin-left: 5px; margin-top: 0px;">
        <ul class="nav nav-tabs">
            <?php
            //Pagination
            //Item Build up
            foreach ($cats->result() as $crow):
                ?>
                <li><a href="<?= base_url('category/' . $crow->cat_slug); ?>"> <?= $crow->cat_name; ?> </a></li>
            <?php endforeach; ?>
        </ul>
    </div>


    <div class="container-sixteen hidden-phone">

        <div class="three columns" >
            <h3> Categories: </h3>
            <ul>
                <?php
                //Pagination
                //Item Build up
                foreach ($cats->result() as $crow):
                    ?>
                    <li><a href="<?= base_url('category/' . $crow->cat_slug); ?>"> <img src="<?= base_url('static/icons/map/' . $crow->cat_icon); ?>" width="10%" height="10%"> <?= $crow->cat_name; ?> </a></li>
                <?php endforeach; ?>			

            </ul>
        </div>



        <div class="twelve columns hidden-phone" style="margin-left: 0; ">

<?php
$this->db->where('status', '3');
$this->db->order_by('item_id', 'desc');
$this->db->limit('6');
$item = $this->db->get('item');
foreach ($item->result() as $irow):
    $img = base_url('images/' . $irow->image);
    ?>		

                <div class="three columns well" style="float: left; max-height: 256px;">

                    <a href='<?= base_url($irow->slug . '?ref=home&source=main'); ?>' class="thumb-placeholder" title="<?= $irow->name; ?>">
                        <img src="<?= $img; ?>" style="max-height: 120px;" alt="<?= $irow->name; ?>" />
                    </a>
                    <p>
                    <h4><a href="<?= base_url($irow->slug . '?ref=home&source=main'); ?>"> <?= $irow->name; ?> </a> </h4>
                    <h6><i class="brocco-icon-tag "></i> Price:<?php if ($irow->item_price == ''):; ?> Inquire <?php else:; ?> <?= $irow->item_price; ?>.00 KSH <?php endif; ?></h6>
                    <h6><i class="brocco-icon-location"></i> Location: <?= $irow->location; ?></h6>

                    </p>


                </div>

<?php endforeach; ?>


        </div>

    </div>

</div>

