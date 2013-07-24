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
            
            <h3> Why Join Scrobber</h3>
        </div>
    </div>
    <!-- /.row -->

    
</div>

    </div><!-- /#content -->
            </section>