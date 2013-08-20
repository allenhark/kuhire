<section id="main">    
<div class="body-text">

        <div class="container-fluid">
            <div class="row">
                <div class="span9">
                    <?php if(isset($_GET['sent'])):?>
                        <div class="alert alert-success">
                            Thank you for contacting Scrobber, we will get back to you shortly.
                        </div>
                    <?php endif;?>
                    <h1 class="page-header">Contact us</h1>
                        
                        

                        <div class="row">
                            <div class="span3">
                                <h3 class="address">Address</h3>
                                <p class="content-icon-spacing">
                                    4th floor, Bishop Magua Building<br>
                                    George Padmore Lane <br>                                    
                                    Nairobi, Kenya
                                </p>
                            </div>
                            <div class="span3">
                                <h3 class="call-us">Call us</h3>
                                <p class="content-icon-spacing">
                                    +254 735 039 259<br>
                                </p>
                            </div>
                            <div class="span3">
                                <h3 class="email">Email</h3>
                                <p class="content-icon-spacing">
                                    <a href="mailto:sales@kuhire.com">Contact sales team</a><br>
                                    <a href="mailto:hi@kuhire.com">Contact support team</a>
                                </p>
                            </div>
                        </div>

                        <p>
                           Contact us here.We will contact you back within 24 hours. 
                        </p>

                        <form method="post" class="contact-form" action="<?=base_url('contact-us');?>">
                            <div class="name control-group">
                                <label class="control-label" for="inputContactName">
                                    Name
                                    <span class="form-required" title="This field is required.">*</span>
                                </label>
                                <div class="controls">
                                    <input type="text" name="name" id="inputContactName">
                                </div><!-- /.controls -->
                            </div><!-- /.control-group -->

                            <div class="email control-group">
                                <label class="control-label" for="inputContactEmail">
                                    Email
                                    <span class="form-required" title="This field is required.">*</span>
                                </label>
                                <div class="controls">
                                    <input type="text" id="inputContactEmail" name="email">
                                </div><!-- /.controls -->
                            </div><!-- /.control-group -->

                            <div class="control-group">
                                <label class="control-label" for="inputContactMessage">
                                    Message
                                    <span class="form-required" title="This field is required.">*</span>
                                </label>

                                <div class="controls">
                                    <textarea id="inputContactMessage" name="msg"></textarea>
                                </div><!-- /.controls -->
                            </div><!-- /.control-group -->

                            <div class="divider"> &nbsp; </div>
                                <input type="submit" class="btn btn-primary arrow-right" value="Send">
                           
                        </form>
                </div>
<!--
                <div class="sidebar span3">
  <!-- /.title -->


</div><!-- /.properties -->

                </div>
            </div>
        </div>
    </div>
    </div><!-- /#content -->

    <center><h2>We'd love to hear from you. Say hello to us</h2></center>
    
</section>

