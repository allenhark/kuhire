<div id="myModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h3 id="myModalLabel">Create account</h3>
        <span> Start hiring out today</span> <br>
        
    </div>
    
        <div class="modal-body">
            
             <form method="post" action="<?=base_url('join');?>">
                        <div class="control-group">
                            <label class="control-label" for="inputRegisterFirstName">
                                First name
                                <span class="form-required" title="This field is required.">*</span>
                            </label>

                            <div class="controls">
                                <input type="text" name='first_name' id="inputRegisterFirstName">
                            </div>
                            <!-- /.controls -->
                        </div>
                        <!-- /.control-group -->

                        <div class="control-group">
                            <label class="control-label" for="inputRegisterSurname">
                                Last Name
                                <span class="form-required" title="This field is required.">*</span>
                            </label>

                            <div class="controls">
                                <input type="text" id="inputRegisterSurname" name="last_name">
                            </div>
                            <!-- /.controls -->
                        </div>
                        <!-- /.control-group -->

                        <div class="control-group">
                            <label class="control-label" for="inputRegisterEmail">
                                E-mail
                                <span class="form-required" title="This field is required.">*</span>
                            </label>

                            <div class="controls">
                                <input type="text" id="inputRegisterEmail" name="email">
                            </div>
                            <!-- /.controls -->
                        </div>
                        <!-- /.control-group -->

                        <div class="control-group">
                            <label class="control-label" for="inputRegisterPassword">
                                Password
                                <span class="form-required" title="This field is required.">*</span>
                            </label>

                            <div class="controls">
                                <input type="password" id="inputRegisterPassword" name="password">
                            </div>
                            <!-- /.controls -->
                        </div>
                        <!-- /.control-group -->
        </div>
  
    <div class="modal-footer">
        <input type="submit" value="Register" class="btn btn-primary arrow-right">
        <button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
        <!-- button type="sumit" class="btn btn-primary">Update Info</button -->
    </div>
     </form>
</div>


<footer>
    <div class="container-fluid">
        <div class="row-fluid">

            <div class="span12 contact-info">
                <span class="span9">
                    +254 711 295 595 <a href="mailto:hi@scrobber.com"> hi@scrobber.com</a>
                </span>
                <ul class="span6  social-network">
                    <li class="<?php if(!$this->uri->segment(1)):?> <?php endif;?>">
                                <a href="<?= base_url('about-us?ref=nav+bar'); ?>"><h3>About us</h3></a>
                    </li>
                    <li><h1> &nbsp;|&nbsp;</h1></li>
                    <li class="<?php if(!$this->uri->segment(1)):?> <?php endif;?>">
                                <a href="<?= base_url('faqs?ref=nav+bar'); ?>"><h3>FAQ</h3></a>
                    </li>
                </ul>
                <ul class="span2 social-network">
                    <li><a href="http://www.twitter.com/Scrobber"><i class="icon-twitter-sign"></i></a></li>
                    <li><a href="http://www.facebook.com/Scrobber"><i class="icon-facebook-sign"></i></a></li>
                    <li><a href="https://plus.google.com/110247148871971809411"><i class="icon-google-plus-sign"></i></a></li>
                </ul>

            </div>
            <div class="clearfix"></div>
        </div><!-- end .row-fluid -->
    </div> <!-- end .container-fluid -->
</footer>
<!-- end footer -->

<!--[if !lte IE 6]><!-->
<!-- Link to Google CDN's jQuery + jQueryUI; fall back to local -->
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.0/jquery.min.js"></script>
<script>window.jQuery || document.write('<script src="<?= base_url('peach'); ?>/js/libs/jquery.min.js"><\/script>')</script>
<script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/jquery-ui.min.js"></script>
<script>window.jQuery.ui || document.write('<script src="<?= base_url('peach'); ?>/js/libs/jquery.ui.min.js"><\/script>')</script>

<!-- RECOMMENDED: For (IE6 - IE8) CSS3 pseudo-classes and attribute selectors -->
<!--[if lt IE 9]> 
   <script src="<?= base_url('peach'); ?>/js/include/selectivizr.min.js"></script> 					
<![endif]-->

<script src="<?= base_url('peach'); ?>/js/libs/jquery.ui.touch-punch.min.js"></script>				<!-- REQUIRED:  A small hack that enables the use of touch events on mobile -->

<!-- Add 'http:' for testing locally -->
<script src="<?= base_url('peach'); ?>/http://maps.google.com/maps/api/js?sensor=true" type="text/javascript"></script>

<script src="<?= base_url('peach'); ?>/js/menu/jquery.ct.3LevelAccordion.min.js"></script>     		<!-- REQUIRED: Accordion Menu with filter-->
<script src="<?= base_url('peach'); ?>/js/slider/jquery.responsivethumbnailgallery.min.js"></script>  <!-- REQUIRED: Responsive Gallery Plugin -->
<script src="<?= base_url('peach'); ?>/js/slider/jquery.onebyone.min.js"></script>     				<!-- REQUIRED: Slider Plugin -->
<script src="<?= base_url('peach'); ?>/js/slider/jquery.touchwipe.min.js"></script>    				<!-- REQUIRED: Plugin to make Slider Plugin work on Touch Devices -->
<script src="<?= base_url('peach'); ?>/js/slider/jquery.onebyone.min.js"></script>     				<!-- REQUIRED: Slider Plugin -->
<script src="<?= base_url('peach'); ?>/js/slider/jquery.touchwipe.min.js"></script>    				<!-- REQUIRED: Plugin to make Slider Plugin work on Touch Devices -->

<script src="<?= base_url('peach'); ?>/js/include/jquery.fitvids.min.js"></script>     		 		<!-- RECOMMENDED: Responsive videos -->			
<script src="<?= base_url('peach'); ?>/js/include/jquery.tweet.min.js"></script>     		 			<!-- OPTIONAL: Twitter display plugin -->
<script src="<?= base_url('peach'); ?>/js/include/jquery.equal-heights.min.js"></script> 	 			<!-- RECOMMENDED: Plugin to keep div heights consistant -->	
<script src="<?= base_url('peach'); ?>/js/include/jquery.todo.min.js"></script>					 	<!-- REQUIRED: Plugin to save "add to short list" items -->
<script src="<?= base_url('peach'); ?>/js/include/jquery.pubsub.min.js"></script>				 		<!-- REQUIRED: (If todo.js is in use) Dependent with todo.js -->
<script src="<?= base_url('peach'); ?>/js/include/jquery.select2.min.js"></script>			 		<!-- RECOMMENDED: Custom jQuery/searchable dropdowns -->	
<script src="<?= base_url('peach'); ?>/js/include/bootstrap.min.js"></script> 			 			<!-- REQUIRED: For BootStrap build -->

<script src="<?= base_url('peach'); ?>/js/config.js"></script>						 				<!-- DO NOT REMOVE: Contains major plugin initiations and functions -->
<!--<![endif]-->

</body>
</html>
