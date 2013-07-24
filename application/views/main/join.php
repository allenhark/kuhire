<section id="content" class="container clearfix">

    

    <div class="one-half">
        <h1> Get Started</h1><span> We require all fields here </span>

        <?php if($title == "Join Us"): if (validation_errors ()): echo '<h3>Something went wrong here Jim. Mind having a look again?</h3>'; endif;
            echo  validation_errors('<li class="error">', '</li>'); endif;?>
        
        <?= form_open('landing/join'); ?>
            <legend> Its Free and always will be.</legend>
                
            <label><i class="splashy-contact_blue"></i> First Name </label>
            <input type="text" placeholder="Your First Name" name="first_name">
            <span class="help-block">Most people have a first name. Do you? </span>
            
            <label><i class="splashy-contact_blue"></i> Last Name </label>
            <input type="text" placeholder="Your Last Name" name="last_name">
            <span class="help-block">Most people have a Last name. Do you? </span>

            <label><i class="splashy-contact_grey"></i> Username </label>
            <input type="text" placeholder="Username"name="username">
            <span class="help-block">Your unique Scrobber indentity.</span>
            
            <label><i class="splashy-mail_light"></i> Email Address </label>
            <input type="text" placeholder="example@example.com"name="email">
            <span class="help-block">We do not spam! We send notifications.</span>
            
            <label><i class="splashy-cellphone"></i> Phone Number</label>
            <input type="text" placeholder="Phone number." name="phone">
            <span class="help-block">To verify your identity.</span>
            
            <label><i class="splashy-lock_large_locked"></i> Password </label>
            <input type="password" name="password">
            <span class="help-block">Your password. 6 characters minimum</span>
            
            <label><i class="splashy-lock_large_locked"></i> Password Again </label>
            <input type="password" name="password_cnf">
            <span class="help-block">Retype your password</span>
            <hr>
            <button class="btn btn-primary" type="submit"><i class="splashy-group_blue_add"></i> Register</button>
           <a href="<?=base_url('landing/alternative');?>" class="btn btn-inverse"><i class="splashy-group_green_add"></i> Stuck? </a>
            <hr>
            <p>You can customize your profile later. Already registered? <i class="splashy-bullet_blue_arrow"></i><b>Login</b></p>
        </form>
    </div>

    <div class="one-half last">
        <h3> Registered? Login </h3>
        <?php if($title == "Login"): if (validation_errors ()): echo '<h3>Okay Jim. We could not verify this. Mind having a look again?</h3>'; endif;
            echo  validation_errors('<li class="error">', '</li>'); endif; ?>
        <?= form_open('landing/login'); ?>
            <legend> Login and exprience the scrobber fever.</legend>

            <label><i class="splashy-contact_blue"></i> Username / Email </label>
            <input type="text" name="login" placeholder="Username or Email">
            <span class="help-block">Your can use your email or username </span>

            <label><i class="splashy-lock_large_locked"></i> Password </label>
            <input type="password" name="password">
            <span class="help-block">Your password.</span>

            <hr>
            <button class="btn btn-primary" type="submit"><i class="splashy-lock_large_unlocked"></i> Login</button>
           <a href ="<?=base_url('landing/forgot');?>" class="btn btn-danger"><i class="splashy-warning_triangle"></i> Forgot password </a>
            <hr>
            Is your account secure? &nbsp; 
            <a href="http://blog.scrobber.com/?s=Security" target="_blank"> <i class="splashy-help"></i> learn more <i class="splashy-refresh_forward"></i></a>
        </form>
        <h1> Why Join </h1>
        <p> Free and Easy. It always will be.</p>
        <ul>
        <li> <i class="wpzoom-settings "></i> Customise your search preferences</li>
        <li> <i class="iconic-icon-ampersand "></i> Earn money renting out stuff you don't use</li>
        <li> <i class="brocco-icon-info "></i> Why buy while you can rent?</li>
        <li> <i class="brocco-icon-coffee "></i> Times are hard, you need this service</li>
        <li><i class="cut-icon-heart "></i> You will love it </li>
    </ul>
    </div>

</section>