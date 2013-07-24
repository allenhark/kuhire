    <div id="content">
        <div class="container">
            <div id="main">        
                <div class="row">
                    
                        <div class="span12 well">
                            
                                <?php
                                $img = base_url('avator/' . $user->avator);
                                ?>

                                <div class="span3">

                                    <img src="<?= $img; ?>" class="thumbnail" alt="<?= $user->first_name . ' ' . $user->last_name; ?>"  width="150px"/>

                                </div>

                                <div class="span5">
                                    <h3> <?= $user->first_name . ' ' . $user->last_name; ?> Profile </h3>
                                    
                                    <p>
                                        From: 
                                        <br />
                                        <i class="iconic-icon-map-pin-stroke"></i> <?=$user->location;?> 
                                        <i class="icomoon-icon-flag"></i> <?=$user->country;?>
                                        <?php if($user->id_no !== '0' & $user->avator !== 'user-thumb.jpg'):?> <i class="minia-icon-checkmark-2"></i> Scrobber Verified <?php endif;?>
                                    </p>
                                </div>

                        <div class="span3">     

                        </div>
                                
                            </div>

                    </div>
            </div>
        </div>
        
        <div class="container">
            <div id="main">
                <div class="properties-rows">
                <div class="row">
                    <div class="span9">
                        
                        
                    <div class="properties-grid">
                        <div class="row">
                            
                                     <?php
        foreach ($item->result() as $result):
            $img = base_url('images/thumbnails/' . $result->image);
            ?>
        <div class="property span9">
            <div class="row">
                <div class="image span3">
                    <div class="content">
                        <a href="<?= base_url($result->slug . '?src=my product'); ?>"></a>
                        <img src="<?=$img;?>" alt="<?= $result->name; ?>">
                    </div><!-- /.content -->
                </div><!-- /.image -->

                <div class="body span6">
                    <div class="title-price row">
                        <div class="title span4">
                            <h2><a href="<?= base_url($result->slug . '?src=my product'); ?>"><?= $result->name; ?></a></h2>
                        </div><!-- /.title -->

                        <div class="price">
                            <?php if ($result->item_price == ''):; ?> Inquire <?php else:; ?> <?= $result->item_price . '.00/-'; ?> <?php endif; ?>
                        </div><!-- /.price -->
                    </div><!-- /.title -->

                    <div class="location"><?=$result->location.', '.$result->region;?></div><!-- /.location -->
                    <p>
                        <?= word_limiter($result->desc, 16); ?>
                    </p>
                    <div class="area">
                        
                    </div><!-- /.area -->
                    
                </div><!-- /.body -->
            </div><!-- /.property -->
        </div><!-- /.row -->
        
        <div class="divider"></div>
        <?php endforeach; ?>
        
                            

                        </div><!-- /.row -->
                    </div><!-- /.properties-grid -->
                    
                    </div>
                    
                       <div class="sidebar span3">

                        <div class="widget contact">
                            <div class="title">
                                <h2 class="block-title">Contact <?=$user->first_name;?></h2>
                            </div><!-- /.title -->
                            <?php if (isset($_GET['details'])): ?>
                        <p class="alert-success block">
                            Your request has been sent
                        </p>
                        <?php else: ?>
                            <div class="content">
                                <form action="<?= base_url('contact-user/' . $this->uri->segment(2)); ?>" method="post">
                                    <div class="control-group">
                                   <?php if (isset($_GET['hire'])): ?>
                                        <div class="alert alert-warning">
                                        
                                            Error sending hire details, Note all fields are required
                                        
                                        </div>
                                    <?php endif; ?>
                                        <label class="control-label" for="inputName">
                                            Name
                                            <span class="form-required" title="This field is required.">*</span>
                                        </label>
                                        <div class="controls">
                                            <input type="text" name="name" id="inputName">
                                        </div><!-- /.controls -->
                                    </div><!-- /.control-group -->

                                    <div class="control-group">
                                        <label class="control-label"  for="inputEmail">
                                            Email
                                            <span class="form-required" title="This field is required.">*</span>
                                        </label>
                                        <div class="controls">
                                            <input type="text" name="email" id="inputEmail">
                                        </div><!-- /.controls -->
                                    </div><!-- /.control-group -->
                                    
                                    <div class="control-group">
                                        <label class="control-label"  for="inputPhone">
                                            Phone Number
                                            <span class="form-required" title="This field is required.">*</span>
                                        </label>
                                        <div class="controls">
                                            <input type="text" name="phone" id="inputPhone">
                                        </div><!-- /.controls -->
                                    </div><!-- /.control-group -->

                                    <div class="control-group">
                                        <label class="control-label" for="inputMessage">
                                            Message
                                            <span class="form-required" title="This field is required.">*</span>
                                        </label>

                                        <div class="controls">
                                            <textarea id="inputMessage" name="msg"></textarea>
                                        </div><!-- /.controls -->
                                                                                
                                    </div><!-- /.control-group -->

                                    <div class="form-actions">
                                        <input type="submit" class="btn btn-primary arrow-right" value="Send">
                                    </div><!-- /.form-actions -->
                                </form>
                            </div><!-- /.content -->
                            
                            <?php endif;?>
                        </div><!-- /.widget -->
                        
                        
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
                    </div>
                    
                </div>
                </div>
            </div>
        </div>
        
    </div>
</div>




   