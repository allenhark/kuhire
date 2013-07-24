<div class="container content container-twelve" >
    <?php if(isset($_GET['next'])): if($_GET['next'] == 'add'):?> 
        <h4 class="alert"> Login to continue listing your items </h4> 
    <?php endif; endif;?>
    <div class="one column"><div class="clear"></div>&nbsp;</div>
    <div class="four  columns well pull-center" style="margin-top: 25px;">
        <h3> Registered? Login </h3>
        <?php
        if (validation_errors()) : echo '<h4>Okay Jim. We could not verify this. Mind having a look again?</h4>';
        endif;
        echo validation_errors('<li class="alert-warning">', '</li>');


        if ($this->uri->segment('2')):
            echo '<h3 class="alert-warning"> Wrong username or password </h3>';
        endif;
        ?>
        <?= form_open('login'); ?>		

        <label> Username or Email </label>
        <input type="text" name="login" style="height: 35px;" class="three columns" >

        <div class="clear"></div>

        <label> Password </label>
        <input type="password" style="height: 35px;"  name="password" class="three columns">

        <div class="clear"></div>		

        <hr>

        <a href="<?= base_url('forgot'); ?>" target="_blank"> <i class="splashy-help"></i> Forgot Password </a>
        &nbsp;
        <button class="btn btn-info btn-large pull-right" type="submit">
            Login
        </button>

        </form>

    </div>
    <div class="one column"><div class="clear"></div>&nbsp;</div>
    <div class="five columns" style="margin-top: 20px;">

        <a href="<?= $this->fb_ignited->fb_login_url(); ?>"><img src="<?=  base_url('static/fb_login.png');?>" /> </a>
        <br />
        <h3> Unlock Scrobbers potential </h3>
        <p>
            <strong>
                Facebook connect to experience social hiring reinvented by the best team.
            </strong>
        </p>

        <p>
            <a href="<?= base_url('join'); ?>" class="btn btn-waring"> Join Today </a>
        </p>
    </div>


</div>