
<div class="footer">
  <div class="center-container">
    <div class="footer-left">
      <div class="cols">
        <h4>LEARN MORE</h4>
        <ul>
          <li><a href="<?=base_url('help/about');?>">About</a></li>
          <li><a href="<?=base_url('help/jobs');?>">Jobs</a></li>
          <li><a href="<?=base_url('help/faq');?>">FAQ</a></li>
          <li><a href="<?=base_url('help/team');?>">Our team</a></li>
          <li><a href="<?=base_url('go/?url=http://blog.scrobber.com&ref=scrbber_footer');?>">Blog</a></li>
        </ul>
      </div>
      <div class="cols priceRank">
        <h4>PLATFORM</h4>
        <ul>
          <li><a href="<?=base_url('build');?>">Overview</a></li>          
          <li><a href="<?=base_url('build/api');?>">API docs</a></li>          
          <li><a rel="nofollow" href="<?=base_url('help/partners');?>">Partner program</a></li>
          <li><a rel="nofollow" target="_blank" href="<?=base_url('build/rss');?>">RSS 2.0</a></li>
        </ul>
      </div>      
      <div class="cols">
        <h4>GET&nbsp;IN&nbsp;TOUCH</h4>
        <ul>
		  <li><a href="<?=base_url('legal/press');?>">Press</a></li>
          <li><a href="http://twitter.com/Scrobber">Twitter</a></li>
          <li><a href="http://www.facebook.com/Scrobber">Facebook</a></li>
		  <li><a href="https://plus.google.com/110247148871971809411">Google+</a></li>
		  <li><a href="<?=base_url('help/contact-us');?>">Contact us</a></li>
        </ul>
      </div>
      <div class="cols">
        <h4>BORING&nbsp;STUFF</h4>
        <ul>
          <li><a rel="nofollow" href="<?=base_url('legal/privacy-policy');?>">Privacy policy</a></li>
          <li><a rel="nofollow" href="<?=base_url('legal/tos');?>">Terms of use</a></li>
          <li><a rel="nofollow" href="<?=base_url('legal/disclaimer');?>">Disclaimer</a></li>
          <li><a rel="nofollow" href="<?=base_url('legal/security');?>">Security</a></li>
          <li><a href="<?=base_url('sitemap/?ver=xml');?>">Sitemap</a></li>
        </ul>
      </div>
    </div>
    <div class="footer-right">
      <div id="fb-like-footer"></div>
      <script type="text/javascript">
        if (location.protocol != 'index.html') {
          jQuery(document).bind("fb:init", function () {
            SG.like_button(jQuery("#fb-like-footer"), {
              "url":      "http://facebook.com/scrobber",
              "style":    "border:none; float:right; height:35px; overflow:hidden; padding-top:13px; width:90px;",
              "track": {
                "category":       "share:footer",
                "detail":         "fb:like:footer:v1"
              }
            });
          });
        }
      </script>
      <div class="footer-logo"> <a href="<?=base_url();?>"><img alt="Scrobber Footer Logo" src="<?=base_url('cdn');?>/images/new/footer-logo.png" /></a>        <p class="footer-copyright" style="position: relative; left: -17px;">&copy; 2012 Scrobber. All rights reserved. <a rel="nofollow" href="<?=base_url('cdn');?>/http://nytm.org/made">Made in NYC.</a></p>
      </div>
    </div>
    <div class="clear"></div>
  </div>
</div>
<!--footer end-->            
</body>

    <script type="text/javascript">
  (function() {
      if ('https:' != document.location.protocol) {
          var gpo = document.createElement('script'); gpo.type = 'text/javascript'; gpo.async = true;
          gpo.src = 'http://apis.google.com/js/plusone.js';
          var gpos = document.getElementsByTagName('script')[0]; gpos.parentNode.insertBefore(gpo, gpos);
      }
  })();
</script>    <!-- ga_footer partial -->


<div id="login-popup" class="popupv3 login-register-popup" style="display:none; margin-top: 30%;">

  <div class="header">
    <h2 id="login-register-popup-message"> Login to Scrobber </h2>
    <a href="#" id="popup-close" class="close">&times;</a>
  </div>
  <div class="body">

    <div id="login-options">

      <!-- Login -->
      <div class="column-left login-register-form modal-form">
        <div class="validation-errors">
          <div style="display:none;" class="form-error" id="login-invalid">Your login is invalid. Please try again.</div>
          <div style="display:none;" class="form-error" id="login-missing">Please enter both your email and password.</div>
        </div>


        <!-- Login form -->

          <form id="login-form" method="post" action="<?=base_url('login');?>">                        
            <div class="input">
              <input type="text" class="text autofocus" name="email" value="" tabindex="20" id="login-email" style="height: auto;" />
              <label>Email Address</label>
            </div>

            <div class="input">
              <input type="password" class="text" name="password" tabindex="21" value="" id="login-pass"  style="height: auto;" />
              <label>Password</label>
            </div>

            <div class="forget-password">
              Forgot your password? <a href="<?=base_url('forgot');?>">Click here to recover it.</a>            
            </div>


            <div id="login-loader" class="login-register-loader form-loader">
              <img alt="loading..." src="<?=base_url('cdn');?>/images/loaders/modalLoader.gif" />            
            </div>

                        <input type="submit" name="Log in" class="blueBut" tabindex="22" alt="Login"  value="Login" id="login-button" class="login-register-button"/>
            <p class="sign-up-link">Need an account? <a id="go-sign-up" href="#">Sign up</a>, or use Facebook &rarr;</p>
          </form>
          
      </div>


      <!-- Vertical Divider -->

        <div class="login-register-divider"><span>or</span></div>


      <!-- Facebook Button -->

        <div class="column-right facebook-login">
          <a class="facebook-button" href="#" onclick="SG.fb_login();  return false;"><div class="facebook-icon"></div> Login using Facebook</a>

          <p class="strong">We do not post or share anything on your facebook account without your permision.</p>

          <div style="display: none;">
            <form action="<?=base_url('fblogin');?>" method="post" id="fblogin"></form>
          </div>
        </div>

        <div class="clear"></div>


      <!-- Facebook loading popup -->

        <div class="fb-loading">
          <div>Please wait while we log you in&hellip;<br/><br/><a href="#" onclick="jQuery('.fb-loading').hide();">Close</a></div>
        </div>
    </div>

    <div id="login-success" class="submit-success">
      <img alt="Logged in" src="<?=base_url('cdn');?>/images/new/global/checkmark.png" />      
      <p>Logged in!</p>
    </div>
  </div>

</div>

<div id="register-popup" class="popupv3 login-register-popup" style="display:none; margin-top: 30%;">

  <div class="header">
    <h2 id="login-register-popup-message">Register with Scrobber</h2>
    <a href="#" id="popup-close" class="close">&times;</a>
  </div>
  <div class="body">

    <div id="register-options">


      <!-- Register -->

      <div class="column-left login-register-form modal-form">
        <div class="validation-errors">
          <div style="display:none;" class="form-error" id="register-invalid">Your login is invalid. Please try again.</div>
          <div style="display:none;" class="form-error" id="register-missing">Please enter both your email and password.</div>
        </div>


        <!-- Register using your facebook account -->

          <div class="facebook-login">
            <a class="facebook-button" href="#" onclick="SG.fb_login();  return false;"><div class="facebook-icon"></div> 
              Register using Facebook</a>
            <div style="display: none;"><form action="<?=base_url('fblogin');?>" method="post" id="fblogin"></form></div>
          </div>
          <div class="or-use-Scrobber">Or create a Scrobber account:</div>


        <!-- Register using your Scrobber account -->

          <form id="register-form" method="post" action="<?=base_url('register');?>">                        
            <div class="input">
              <input type="text" class="text autofocus" name="email" value="" tabindex="20" id="register-email"  style="height: auto;"/>
              <label>Email Address</label>
            </div>

            <div class="input">
              <input type="password" class="text" name="password" tabindex="21" value="" id="register-pass"  style="height: auto;"/>
              <label>Password</label>
            </div>

            <div id="register-loader" class="login-register-loader">
              <img alt="loading..." src="<?=base_url('cdn');?>/images/loaders/modalLoader.gif" />           
            </div>

            
            <div class="have-an-account">Have an account? <a id="go-login" href="#">Log in &rarr;</a></div>
            <input type="submit" name="Log in" class="blueBut" tabindex="22" alt="Register" value="Register" id="register-button" class="login-register-button"/>
          </form>

      </div>


      <!-- Vertical Divider -->

        <div class="login-register-divider"></div>


      <!-- Why register? -->

        <div class="column-right why-register">
          <h3>Why register?</h3>
          <ul>
            <li><strong>Discover events</strong> near you with the Columbus event calendar, based on artists and teams you already love</li>
            <li><strong>Track ticket prices</strong> for your favorite teams and bands</li>
            <li>Scrobber is <strong>100% free</strong></li>
          </ul>
          <a class="not-convinced" target="_blank" href="<?=base_url('cdn');?>/about/index.html">Still not convinced? <strong>Learn more &rarr;</strong></a>        </div>

        <div class="clear"></div>


      <!-- Facebook loading popup -->

        <div class="fb-loading">
          <div>Please wait while we log you in&hellip;<br/><br/><a href="#" onclick="jQuery('.fb-loading').hide();">Close</a></div>
        </div>
    </div>

    <div id="register-success" class="submit-success">
      <img alt="Logged in" src="images/new/global/checkmark.png" />      <p>Registered!</p>
    </div>
  </div>

</div>

<script type="text/javascript">
  jQuery('#sglightbox_modal').live('closeModal',  function() { jQuery('.fb-loading').hide(); });

  jQuery('#login-popup .close').on('click', function() { _gaq.push(['_trackEvent', 'sg_login', 'login-popup-close-wo-login', 'click', undefined, true]); });
  jQuery('#login-popup .facebook-button').on('click', function() { _gaq.push(['_trackEvent', 'sg_login', 'facebook-login-button', 'click', undefined, true]); });
  jQuery('#register-popup .close').on('click', function() { _gaq.push(['_trackEvent', 'sg_login', 'register-popup-close-wo-register', 'click', undefined, true]); });
  jQuery('#register-popup .facebook-button').on('click', function() { _gaq.push(['_trackEvent', 'sg_login', 'facebook-register-button', 'click', undefined, true]); });
</script>

<script type="text/javascript" charset="utf-8">
        var newwindow;
    var intId;
    function fbPopup() {
        var  screenX    = typeof window.screenX != 'undefined' ? window.screenX : window.screenLeft,
             screenY    = typeof window.screenY != 'undefined' ? window.screenY : window.screenTop,
             outerWidth = typeof window.outerWidth != 'undefined' ? window.outerWidth : document.body.clientWidth,
             outerHeight = typeof window.outerHeight != 'undefined' ? window.outerHeight : (document.body.clientHeight - 22),
             width    = 500,
             height   = 270,
             left     = parseInt(screenX + ((outerWidth - width) / 2), 10),
             top      = parseInt(screenY + ((outerHeight - height) / 2.5), 10),
             features = (
              'width=' + width +
              ',height=' + height +
              ',left=' + left +
              ',top=' + top
             );

            newwindow=window.open('https://www.facebook.com/dialog/oauth?client_id=130121696309&amp;redirect_uri=http%3A%2F%2FScrobber.com%2Ffbcallback%2F%3Floginsucc%3D1&amp;state=fc79ca7455bddf2b7d0a57a5dd52d3df&amp;display=popup&amp;cancel_url=http%3A%2F%2FScrobber.com%2Ffbcallback%2F%3Fcancel%3D1&amp;scope=email%2Cuser_interests%2Cuser_likes%2Cuser_location%2Cpublish_actions','login_by_facebook',features);

           if (window.focus) {newwindow.focus()}
           return false;
    }
    </script>    
	    

</html>