
<!-- CONTENT -->
<div id="content"><div class="map-wrapper">
        <div class="map">
            <?= $map['html']; ?><!-- /.map-inner -->

            <div class="container">
                <div class="row">
                    <div class="span12">
                    <div class="span5 pull-right" style="margin-top: -450px;">
                        <div class="property-filter">
                            <div class="content">
                                <form method="get" action="<?= base_url('search'); ?>">
                                    <div class="location control-group">
                                        <label class="control-label" for="inputLocation" style="font-size: 25px;">
                                            Search thousands of hire listings!
                                        </label>
                                        <div class="controls" style="margin-top: 15px;">
                                            <input type="text" name="s" />
                                        </div><!-- /.controls -->
                                    </div><!-- /.control-group -->

                                    <div class="beds control-group">
                                        <label class="control-label" for="inputBeds">
                                            Location 
                                        </label>
                                        <div class="controls">
                                            <input type="text" name="location" value="<?= $this->session->userdata('ip_city'). ', ' . $this->session->userdata('ip_region'); ?>"/>
                                        </div><!-- /.controls -->
                                    </div><!-- /.control-group -->
                                  
                                    <div class="baths control-group">                                                                       

                                        <div class="price-from control-group">
                                            <label class="control-label" for="inputPriceFrom">
                                                Price from
                                            </label>
                                            <div class="controls">
                                                <input type="text" id="inputPriceFrom" name="inputPriceFrom">
                                            </div><!-- /.controls -->
                                        </div><!-- /.control-group -->

                                        <div class="price-to control-group">
                                            <label class="control-label" for="inputPriceTo">
                                                Price to
                                            </label>
                                            <div class="controls">
                                                <input type="text" id="inputPriceTo" name="inputPriceTo">
                                            </div><!-- /.controls -->
                                        </div><!-- /.control-group -->

                                        <div class="price-value">
                                            <span class="from"></span><!-- /.from -->
                                            -
                                            <span class="to"></span><!-- /.to -->
                                        </div><!-- /.price-value -->

                                        <div class="price-slider">
                                        </div><!-- /.price-slider -->

                                    </div><!-- /.control-group -->

                                    <div class="form-actions">
                                        <input type="submit" value="Search now!" class="btn btn-primary btn-large">
                                    </div><!-- /.form-actions -->
                                </form>

                                <hr />

                                <div style="text-align: center">
                                    <h2 style="color: whitesmoke"> Or </h2>
                                </div>
                                <?php if(!$this->session->userdata('logged_in')):?>
                                <div style="text-align: center">
                                    <a href="<?= $this->fb_ignited->fb_login_url(); ?>"><img src="<?= base_url('static/fb_login.png'); ?>" style="max-height: 50px" /> </a>
                                    <br /> <br />
                                    <span style="color: whitesmoke; font-size: 18px;">
                                        and discover a new way to hire and hire out socially
                                    </span>
                                </div>
                                <?php else: ?>
                                
                                    <div style="text-align: center">
                                        <a href="http://apps.facebook.com/scrobber-social" alt="Scrobber facebook App" class="btn btn-info btn-large"> Use scrobber on Facebook </a>
                                    </div>
                                <?php endif;?>
                            </div><!-- /.content -->
                        </div><!-- /.property-filter -->
                    </div><!-- /.span3 -->
                    </div>
                </div><!-- /.row -->
            </div><!-- /.container -->
        </div><!-- /.map -->
    </div><!-- /.map-wrapper -->

    <div class="container">


    </div>
    <div class="container">
        <div id="main">
            <div class="row">
                <div class="span9">
                    <?php if($latest->num_rows != 0):?>
                    <h1 class="page-header">Featured listings </h1>
                    <div class="properties-grid">
                        <div class="row">
                            <?php foreach ($latest->result() as $lt): ?>
                                <div class="property span3" style="min-height: 270px; max-height: 271px;">
                                    <div class="image">
                                        <div class="content">
                                            <a href="<?= base_url($lt->slug . '?src=home+featured'); ?>"></a>
                                            <img src="<?= base_url('images/thumbnails/' . $lt->image); ?>" alt="<?= $lt->name . ' for hire in ' . $lt->region; ?>" style="max-height: 200px; max-width: 270px;">
                                        </div><!-- /.content -->

                                        <div class="price"><?php if ($lt->item_price): echo ' KShs '. $lt->item_price;
                                            else: echo 'Enquire';
                                            endif; ?></div><!-- /.price -->
                                        <div class="reduced">Featured </div><!-- /.reduced -->
                                    </div><!-- /.image -->

                                    <div class="title">
                                        <h2><a href="<?= base_url($lt->slug . '?src=home+featured'); ?>"><?= word_limiter($lt->name, 3); ?></a></h2>
                                    </div><!-- /.title -->

                                    <div class="location"><?= $lt->location . ' ' . $lt->region; ?></div><!-- /.location -->
                                    
                                </div><!-- /.property -->
                <?php endforeach; ?>

                        </div><!-- /.row -->
                    </div><!-- /.properties-grid -->
                    
                    <?php else:?>
                    <div class="alert alert-block alert-attention">
                        We have no <strong>listings</strong> listed in <?=$this->session->userdata('ip_city');?>. 
                        View listings in <a href="<?=  base_url('search?region=true&location strict=False&s=');?>"> <?=$this->session->userdata('ip_region');?> region </a>, or, browse the entire <a href="<?=  base_url('search?region=true&location strict=False&s=');?>"> <?=$this->session->userdata('ip_country');?> </a>
                    </div>
                    <?php endif;?>
                </div>
                <div class="sidebar span3">
                    <div class="widget our-agents">
                       
                        <div class="content">
                            <div class="fb-like-box" data-href="http://www.facebook.com/scrobber" data-width="250" data-show-faces="true" data-stream="false" data-show-border="false" data-header="true"></div>
                        </div><!-- /.content -->
                    </div><!-- /.our-agents -->
                    <div class="hidden-tablet">
                        <div class="widget properties last">
                            <div class="title">
                                <h2>Latest listings</h2>
                            </div><!-- /.title -->

                            <div class="content">

<?php foreach ($sidebar->result() as $side_data): ?>
                                    <div class="property">
                                        <div class="image">
                                            <a href="<?= base_url($side_data->slug . '?src=sidebar+latest'); ?>"></a>
                                            <img src="<?= base_url('images/thumbnails/' . $side_data->image); ?>" alt="<?= $side_data->name . ' for hire in ' . $side_data->region; ?>">
                                        </div><!-- /.image -->

                                        <div class="wrapper">
                                            <div class="title">
                                                <h3>
                                                    <a href="<?= base_url($side_data->slug . '?src=sidebar+latest'); ?>"><?= word_limiter($side_data->name, 3); ?></a>
                                                </h3>
                                            </div><!-- /.title -->
                                            <div class="location"><?= $side_data->location . ' ' . $side_data->region; ?></div><!-- /.location -->
                                            <div class="price"><?php if ($side_data->item_price): echo $side_data->item_price . ' /-'; else: echo 'Enquire';endif; ?></div><!-- /.price -->
                                        </div><!-- /.wrapper -->
                                    </div><!-- /.property -->
<?php endforeach; ?>

                            </div><!-- /.content -->
                        </div><!-- /.properties -->
                    </div>
                </div>
            </div>
            <div class="carousel">
                <h2 class="page-header">Recommended for you</h2>

                <div class="content">
                    <a class="carousel-prev" href="#">Previous</a>
                    <a class="carousel-next" href="#">Next</a>
                    <ul>
<?php foreach ($recom->result() as $rdata): ?>
                            <li>

                                <div class="image">
                                    <a href="<?= base_url($rdata->slug . '?src=recommended'); ?>"></a>
                                    <img src="<?= base_url('images/thumbnails/' . $rdata->image); ?>" alt="<?= $rdata->name . ' for hire in ' . $rdata->region; ?>">
                                </div><!-- /.image -->
                                <div class="title">
                                    <h3><a href="<?= base_url($rdata->slug . '?src=recommended'); ?>"><?= word_limiter($rdata->name, 3); ?></a></h3>
                                </div><!-- /.title -->
                                <div class="location"><?= $rdata->location . ', ' . $rdata->region; ?></div><!-- /.location-->
                                <div class="location"><?php if ($rdata->item_price): echo $rdata->item_price . ' /-';
                        else: echo 'Enquire';
                        endif; ?></div><!-- .price -->

                            </li>
<?php endforeach; ?>

                    </ul>
                </div><!-- /.content -->
            </div><!-- /.carousel -->        

        </div>
    </div>

   </div><!-- /#content -->
</div><!-- /#wrapper-inner -->