<div id="footer-wrapper">
    <div id="footer-top">
        <div id="footer-top-inner" class="container">
            <div class="row">
                <div class="widget properties span3">
                    <div class="title">
                        <h2>Most Recent</h2>
                    </div><!-- /.title -->

                    <div class="content">
                        
                        <?php foreach ($footer->result() as $side_data): ?>
                        <div class="property">
                            <div class="image">
                                <a href="<?= base_url($side_data->slug . '?src=sidebar+latest'); ?>"></a>
                                    <img src="<?= base_url('images/thumbnails/' . $side_data->image); ?>" alt="<?= $side_data->name . ' for hire in ' . $side_data->region; ?>" width="100px">
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
                </div><!-- /.properties-small -->                
               
            


                <div class="widget span3">
                    <div class="title">
                        <h2>Contact us</h2>
                    </div><!-- /.title -->

                    <div class="content">
                        <table class="contact">
                            <tbody>
                            <tr>
                                <th class="address">Address:</th>
                                <td>4rh floor Bishop Magua Building<br>George Padmore Lane<br>Nairobi, Kenya<br></td>
                            </tr>
                            <tr>
                                <th class="phone">Phone:</th>
                                <td>+254 714 449 002</td>
                            </tr>
                            <tr>
                                <th class="email">E-mail:</th>
                                <td><a href="mailto:hi@acrobber.<?=DOMAIN;?>">hi@scrobber.<?=DOMAIN;?></a></td>
                            </tr>
                           
                            </tbody>
                        </table>
                    </div><!-- /.content -->
                </div><!-- /.widget -->

                <div class="widget span3">
                    <div class="title">
                        <h2 class="block-title">Useful links</h2>
                    </div><!-- /.title -->

                    <div class="content">
                        <ul class="menu nav">
                            <li class="first leaf"><a href="<?=base_url('guide');?>">Using Scrobber</a></li>
                            <li class="leaf"><a href="<?=base_url('about-us');?>l">About us</a></li>
                            <li class="leaf"><a href="<?=base_url('contact-us');?>">Contact us</a></li>
                            <li class="leaf"><a href="http://scrobber.uservoice.com">FAQ</a></li>
                            <li class="leaf"><a href="<?=base_url(uri_string());?>?gravity">Play</a></li>
                        </ul>
                    </div><!-- /.content -->
                </div><!-- /.widget -->

                <div class="widget span3">
                    <div class="title">
                        <h2 class="block-title">Say hello!</h2>
                    </div><!-- /.title -->

                    <div class="content">
                        <form method="post" action="<?=base_url('contact-us?next='.  base_url());?>">
                            <?php if(isset($_GET['sent'])):?>
                                <div class="alert alert-success">
                                    You have said Hi
                                </div>
                            <?php endif;?>
                            <div class="control-group">
                                <label class="control-label" for="inputName">
                                    Name
                                    <span class="form-required" title="This field is required.">*</span>
                                </label>
                                <div class="controls">
                                    <input type="text" id="inputName">
                                </div><!-- /.controls -->
                            </div><!-- /.control-group -->

                            <div class="control-group">
                                <label class="control-label" for="inputEmail">
                                    Email
                                    <span class="form-required" title="This field is required.">*</span>
                                </label>
                                <div class="controls">
                                    <input type="text" id="inputEmail">
                                </div><!-- /.controls -->
                            </div><!-- /.control-group -->

                            <div class="control-group">
                                <label class="control-label" for="inputMessage">
                                    Message
                                    <span class="form-required" title="This field is required.">*</span>
                                </label>

                                <div class="controls">
                                    <textarea id="inputMessage"></textarea>
                                </div><!-- /.controls -->
                            </div><!-- /.control-group -->

                            <div class="form-actions">
                                <input type="submit" class="btn btn-primary arrow-right" value="Send">
                            </div><!-- /.form-actions -->
                        </form>
                    </div><!-- /.content -->
                </div><!-- /.widget -->
            </div><!-- /.row -->
        </div><!-- /#footer-top-inner -->
    </div><!-- /#footer-top -->

    <div id="footer" class="footer container">
        <div id="footer-inner">
            <div class="row">
                <div class="span6 copyright">
                    <p>© Copyright <?=date('Y');?> by <a href="<?=base_url();?>">Scrobber</a>. All rights reserved. &nbsp; <a href="http://antony.scrobber.com/built-in-nairobi" target="_blank">Built in Nairobi </a> with Love</p>
                </div><!-- /.copyright -->

                <div class="span6 share">
                    <div class="content">
                        <ul class="menu nav">
                            <li class="first leaf"><a href="http://www.facebook.com/Scrobber" class="facebook">Facebook</a></li>
                            <li class="leaf"><a href="http://www.twitter.com/Scrobber" class="twitter">Twitter</a></li>
                        </ul>
                    </div><!-- /.content -->
                </div><!-- /.span6 -->
            </div><!-- /.row -->
        </div><!-- /#footer-inner -->
    </div><!-- /#footer -->
</div><!-- /#footer-wrapper -->
</div><!-- /#wrapper -->
</div><!-- /#wrapper-outer -->




<script type="text/javascript" src="<?=base_url();?>realia/assets/js/jquery.js"></script>
<script type="text/javascript" src="<?=base_url();?>realia/assets/js/jquery.ezmark.js"></script>
<script type="text/javascript" src="<?=base_url();?>realia/assets/js/jquery.currency.js"></script>
<script type="text/javascript" src="<?=base_url();?>realia/assets/js/jquery.cookie.js"></script>
<script type="text/javascript" src="<?=base_url();?>realia/assets/js/bootstrap.min.js"></script>
<script type="text/javascript" src="<?=base_url();?>realia/assets/js/carousel.js"></script>
<script type="text/javascript" src="<?=base_url();?>realia/assets/js/gmap3.min.js"></script>
<script type="text/javascript" src="<?=base_url();?>realia/assets/js/gmap3.infobox.min.js"></script>
<script type="text/javascript" src="<?=base_url();?>realia/assets/libraries/jquery-ui-1.10.2.custom/js/jquery-ui-1.10.2.custom.min.js"></script>
<script type="text/javascript" src="<?=base_url();?>realia/assets/libraries/chosen/chosen.jquery.min.js"></script>
<script type="text/javascript" src="<?=base_url();?>realia/assets/libraries/iosslider/_src/jquery.iosslider.min.js"></script>
<script type="text/javascript" src="<?=base_url();?>realia/assets/libraries/bootstrap-fileupload/bootstrap-fileupload.js"></script>
<script type="text/javascript" src="<?=base_url();?>realia/assets/js/realia.js"></script>
<script type="text/javascript" src="<?=base_url();?>realia/assets/js/bootstrap-modalmanager.js"></script>
<script type="text/javascript" src="<?=base_url();?>realia/assets/js/bootstrap-modal.js"></script>
<?php if(isset($_GET['gravity'])):;?>
    <script src="http://gravityscript.googlecode.com/svn/trunk/gravityscript.js"></script>
<?php endif;?>


<?php if(!$this->input->cookie('longitude')):?>
<script type="text/javascript"> 
        
        

navigator.geolocation.getCurrentPosition(showPosition);


function showPosition(pos){
document.cookie = "latitude = "+pos.coords.latitude;
  document.cookie = "longitude  = "+pos.coords.longitude;
}

</script>
<?php endif;?> 
</body>
</html>
