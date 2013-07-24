<?php
if ($this->session->userdata('logged_in')):
    redirect(base_url('lunar'));
endif;
?>
<div class="container container-twelve">

    <div class="twelve columns">

        <div class="four  columns well pull-center" style="margin-top: 25px;">	
            <?php
            if (validation_errors()) : echo '<h4>Something went wrong here Jim. Mind having a look again?</h4>';
            endif;
            echo validation_errors('<li class="alert-warning">', '</li>');
            ?>

            <h1> Get Started</h1>
            <br>
            <?php $atts = array('autocomplete' => 'on'); ?>
            <?= form_open('join', $atts); ?>

            <label> First Name </label>
            <input type="text" name="first_name" style="height: 35px;" class="three columns" >

            <div class="clear"></div>
            
            <label> Last Name </label>
            <input type="text" name="last_name" style="height: 35px;" class="three columns" >

            <div class="clear"></div>
            
            <label> Email Address </label>
            <input type="text" name="email" style="height: 35px;" class="three columns" >

            <div class="clear"></div>

            <label> Password </label>
            <input type="password" style="height: 35px;"  name="password" class="three columns">
            <input type="hidden" value="<?=random_string('alnum', 16);?>" name="sess" />
            <div class="clear"></div>		

            <hr>
            
            <button class="btn btn-info btn-large pull-right" type="submit">
                Register
            </button>

            </fom>

        </div>
        
        <div class="one column"><div class="clear"></div>&nbsp;</div>
        
        <div class="five columns" style="margin-top: 20px;">

            <h3> Not Registered? Why Join </h3>
            <p>

            </p>
            <ul class="unstyled">
                <li>
                    <i class="wpzoom-settings "></i> Customise your search preferences
                </li>
                <li>
                    <i class="iconic-icon-ampersand "></i> Earn money renting out stuff you don't use
                </li>
                <li>
                    <i class="brocco-icon-info "></i> Why buy while you can rent?
                </li>
                <li>
                    <i class="brocco-icon-coffee "></i> Times are hard, you need this service
                </li>
                <li>
                    <i class="cut-icon-heart "></i> You will love it
                </li>
            </ul>
            <p>
                <a href="<?= base_url('login'); ?>" class="btn btn-waring"> Registered? Login </a>
            </p>
        </div>
    </div>
    
</div>