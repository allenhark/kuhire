            <!-- CONTENT -->
<section id="main">
  <div class="body-text">

        <div class="container-fluid">

            <div class="row-fluid">
     <?php if(validation_errors()):?>
                <div class="alert alert-warning">
                    <?=validation_errors();?>
                </div>
                <?php endif;?>
                
                <?php if(isset($_GET['user'])):?>
                <div class="alert alert-attention alert-block">
                    Account created <?=$_GET['user'];?>! You can login and add your products
                </div>
                <?php endif;?>
  
  
        <div class="span4">
            <ul class="tabs nav nav-tabs">
                <li <?php if($iasoc == 'login') { echo 'class="active"';}?>><a href="<?=base_url('login');?>">Login</a></li>
                <li <?php if($iasoc == 'join') { echo 'class="active"';}?>><a href="<?=base_url('join');?>">Register</a></li>
                
            </ul>
            <!-- /.nav -->

            <div class="tab-content">
                <div class="tab-pane <?php if($iasoc == 'login') { echo 'active';}?>" id="login">
                    <form method="post" action="<?=base_url('login');?>">
                        <?php if($this->uri->segment(2) == 'error'):?>
                            <span class="alert alert-danger"> Invalid email or password </span>
                        <?php endif;?>
                        <div class="control-group">
                            <label class="control-label" for="inputLoginLogin">
                                Email Address
                                <span class="form-required" title="This field is required.">*</span>
                            </label>

                            <div class="controls">
                                <input type="text" name="login" id="inputLoginLogin">
                            </div>
                            <!-- /.controls -->
                        </div>
                        <!-- /.control-group -->
                        <?php if(isset($_GET['next'])):?>
                            <input type="hidden" name="next" value="<?=$_GET['next'];?>" />
                        <?php endif; ?>
                        <div class="control-group">
                            <label class="control-label" for="inputLoginPassword">
                                Password
                                <span class="form-required" title="This field is required.">*</span>
                            </label>

                            <div class="controls">
                                <input type="password" name="password" id="inputLoginPassword">
                            </div>
                            <!-- /.controls -->
                        </div>
                        <!-- /.control-group -->

                        <div class="form-actions">
                            <input type="submit" value="Login" class="btn btn-primary arrow-right">
                        </div>
                        <!-- /.form-actions -->
                    </form>
                </div>
                <!-- /.tab-pane -->

                <div class="tab-pane <?php if($iasoc == 'join') { echo 'active';}?>" id="register">
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

                        <input type="hidden" value="<?=random_string('alnum', 16);?>" name="sess" />
                        <!-- /.control-group -->

                        <div class="form-actions">
                            <input type="submit" value="Register" class="btn btn-primary arrow-right">
                        </div>
                        <!-- /.form-actions -->
                    </form>
                </div>
                <!-- /.tab-pane -->
            </div>
            <!-- /.tab-content -->
        </div>
        <!-- /.span4-->

        <div class="span7">
            
            <h3> Increase visibility, list on Kuhire</h3>
			
		<?php foreach ($this->data->latest_3() -> result () as $listings):?>
            
                     <div class="span4  set-equal-heights-js" style="min-height: 310px; float: left; margin-left: 5px; min-width: 240px; text-align: center;">
                            <div class="thumbnail alignCenter">
                                <a href="<?=base_url($listings->slug.'?ref=front+page');?>">
                                    <img src="<?=base_url('images/thumbnails/'.$listings->image);?>" alt="<?=base_url($listings->name);?> for hire" class="thumbnail" style="max-height: 147px; min-height: 147px; width: auto; float: left;">
                                </a>                                
                                                                  
                                <div class="caption" style="min-height: 320px;">
                                    <a href="<?=base_url($listings->slug.'?ref=front+page');?>" class="prop-title">
                                        <?= word_limiter($listings->name, 4);?>
                                    </a>
                                    <p class="size" style="font-size: 11px; color: grey;"> <?= $listings->location . ' ' . $listings->region; ?></p>
                                    <p class="price"><?php if ($listings->item_price): echo ' KShs '.$listings->item_price; else: echo 'Price: Enquire';endif; ?></p>
                                    <p class="description">
                                       <?= word_limiter($listings->name, 6); ?> 
                                    </p>
                                    <ul class="list-btns">
                                        <!-- li><a href="<?=base_url($listings->slug.'?ref=view+later');?>" id="property_1" class="add-to-list-js" 
                                               data-shortlist="<img src='<?=base_url('images/thumbnails/'.$listings->image);?>' alt='<?=$listings->name;?>'>
                                               <div><a href='<?=base_url($listings->slug."?ref=view+later");?>' id='property_<?=$listings->item_id;?>'><?=$listings->name;?></a><?php if ($listings->item_price): echo $listings->item_price . ' KSH'; else: echo 'Price: Enquire';endif; ?></div>">
                                                <i class="icon-plus-sign"></i>Short List</a></li -->
                                        <li><a href="<?=base_url($listings->slug.'?ref=view+later');?>"><i class="icon-info-sign"></i>View Details</a></li>
                                    </ul>
                                </div>
                            </div>                          
                            
                        </div>      
			
		<?php endforeach; ?>
			
			
        </div>
    </div>
    <!-- /.row -->

    
</div>

    </div><!-- /#content -->
            </section>