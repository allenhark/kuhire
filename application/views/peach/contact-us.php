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
                        
                        <p>
                           Contact us, we would love to hear from you. We will contact you back within 48 hours. 
                        </p>

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
                                    <a href="mailto:sales@scrobber.com">Contact sales team</a><br>
                                    <a href="mailto:hi@scrobber.com">Contact support team</a>
                                </p>
                            </div>
                        </div>

                        <h2>We'd love to hear from you. Say us hello!</h2>

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

                            <div class="form-actions">
                                <input type="submit" class="btn btn-primary arrow-right" value="Send">
                            </div><!-- /.form-actions -->
                        </form>
                </div>

                <div class="sidebar span3">
  <!-- /.title -->

    <div class="content">
        <div class="widget properties last">
                            <div class="title">
                                <h2>Latest Listings</h2>
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
                                            <div class="price"><?php if ($side_data->item_price): echo $side_data->item_price . ' /-';
    else: echo 'Enquire';
    endif; ?></div><!-- /.price -->
                                        </div><!-- /.wrapper -->
                                    </div><!-- /.property -->
                                <?php endforeach; ?>
                            </div><!-- /.content -->
                        </div><!-- /.properties -->
    </div><!-- /.content -->
</div><!-- /.properties -->

                </div>
            </div>
        </div>
    </div>
    </div><!-- /#content -->
    </div>