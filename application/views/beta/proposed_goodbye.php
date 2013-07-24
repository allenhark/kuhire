<div id="slider" style="background-image:url(<?=base_url('static/images/home.png');?>); max-height: 470px;">
<div class="container content container-twelve" >
    
    <div class="alert alert-attention" style="text-align: center; font-size: 12px;">
        Did you get what you where looking for?
        <a href="#" class="btn btn-mini btn-info"> Yes</a> 
        <a href="#" class="btn btn-mini btn-warning"> No </a>
    </div>
    
    

    <div class="home-boxes content container hidden-phone" style="margin-top: 40px;">

        <!-- iPhone module -->
        <div class="iphone-container c2" style="float: left;">
            <!-- iPhone default -->
            <div id="iphone-wrapper" class="c2">
                <div class="home-box c2 iphone-box">
                    <div class="iphone-screenshot">

                    </div>

                    <div class="upper-section">
                        <span class="kicker"></span>
                        <h2>Scrobber on your phone </h2>
                    </div>
                    <div class="lower-section" >
                        <p>Find rentals from your mobile phone. </p>

                        <?php if (isset($_GET['link'])): ?>
                            <div class="input">
                                <p class="alert">
                                    You will recieve a link to Scrobber Mobile Version Shortly
                                </p>
                            </div>
                        <?php else: ?>
                            <p class="iphone-message">Or have a link sent to your Phone:</p>
                            <form action="<?= base_url('get-on-mobile'); ?>" class="modal-form" id="iphone-form">
                                <div class="input">
                                    <div class="input-append">
                                        <input type="text" name="phone_number" id="phone_number" placeholder="Cell Number"  style="width: 100px;"/>
                                        <button type="submit" class="btn btn-info"/>Get it Now </button>
                                    </div>
                                </div>

                            </form>
                        <?php endif; ?>
                    </div>
                </div>
            </div>

        </div>
        <div class="home-box c1" style="max-width: 350px; float: right;">
            <!-- Intro Module -->
            <div class="upper-section">
                <span class="kicker">About</span>
                <h2>What's Scrobber?</h2>
                <h5> S-K-RO-BA **
                    <span style="font-size: 10px;"> Thats how we say it!</span>
                </h5>
            </div>
            <div class="lower-section" style="height: auto;">
                <p>
                    Goodbye! We hope to see you back soon.
                </p>
                <p><a href="<?= base_url('help/case-study'); ?>">See what Scrobber can do for you &rsaquo;</a></p>
            </div>
        </div>
    </div>

</div>
    
</div>