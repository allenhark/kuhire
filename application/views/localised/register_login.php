            <!-- CONTENT -->
            <div id="content">
<div class="container">
     <?php if(validation_errors()):?>
                <div class="alert alert-warning">
                    <?=validation_errors();?>
                </div>
                <?php endif;?>
    <div>
        <div id="main">
            
            <div class="login-register">
    <div class="row">
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
                                <input type="text" id="inputRegisterPassword" name="password">
                            </div>
                            <!-- /.controls -->
                        </div>
                        <!-- /.control-group -->

                        <div class="control-group">
                            <label class="control-label" for="inputRegisterRetype">
                                Retype
                                <span class="form-required" title="This field is required.">*</span>
                            </label>

                            <div class="controls">
                                <input type="text" id="inputRegisterRetype" name="password_cnf">
                            </div>
                            <!-- /.controls -->
                        </div>
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

        <div class="span8">
            
            <h2 class="page-header"> Or Facebook Connect</h2>
            <div style="text-align: left">
                <a href="<?= $this->fb_ignited->fb_login_url(); ?>"><img src="<?= base_url('static/fb_login.png'); ?>" /> </a>
            </div>           
            
            <hr class="dotted">
            
            <h2>Why join Scrobber?</h2>

            <div class="images row">
                <div class="item span2">
                    <img src="<?=base_url();?>realia/assets/img/icons/circle-dollar.png" alt="">

                    <h3>Make Money</h3>
                </div>
                <!-- /.item -->
                <div class="item span2">
                    <img src="<?=base_url();?>realia/assets/img/icons/circle-search.png" alt="">

                    <h3>Save listings search</h3>
                </div>
                <!-- /.item -->
                <div class="item span2">
                    <img src="<?=base_url();?>realia/assets/img/icons/circle-global.png" alt="">

                    <h3>We are global</h3>
                </div>
                <!-- /.item -->
                <div class="item span2">
                    <img src="<?=base_url();?>realia/assets/img/icons/bubble-email_402x.png" width="100px" alt="">

                    <h3>Location service</h3>
                </div>
                <!-- /.item -->
            </div>
            <!-- /.row -->
            
        </div>
    </div>
    <!-- /.row -->
</div><!-- /.login-register -->        </div>
    </div>
</div>

    </div><!-- /#content -->
</div><!-- /#wrapper-inner -->