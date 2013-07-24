
<body>
<div id="wrapper-outer" >
    <div id="wrapper">
        <div id="wrapper-inner">
            <!-- BREADCRUMB -->
            <div class="breadcrumb-wrapper">
                <div class="container">
                    <div class="row">
                        <div class="span12">
                            <ul class="breadcrumb pull-left">
                                <li><a href="<?=base_url();?>">Home</a></li>
                                <div class="fb-like" data-href="http://www.scrobber.com" data-send="true" data-layout="button_count" data-width="150" data-show-faces="false" data-action="recommend"></div>
                            </ul><!-- /.breadcrumb -->

                            <div class="account pull-right">
                                
                                <ul class="nav nav-pills">
                                    <?php if(!$this->session->userdata('logged_in')):?>
                                        <li><a href="<?=base_url('login');?>">Login</a></li>
                                        <li><a href="<?=base_url('join');?>">Register</a></li>
                                    <?php else:?>
                                        <li> <a href="<?=base_url('account/');?>"> <i class="icon-user"></i> Logged in as <?=$this->session->userdata('name');?> </a></li>
                                        <li> <a href="<?=base_url('account/#inbox');?>"> <span class="badge badge-warning"> <?=$inbox->num_rows ();?> </span> New Message </a> </li>
                                        <li> <a href="<?=base_url('account/#system');?>"> <span class="badge badge-important"> <?=$system->num_rows ();?> </span> System Message </a> </li>
                                        <li class="dropdown">
                                                <a href="<?=base_url('account/#settings/');?>" class="dropdown-toggle" data-toggle="dropdown">
                                                        Settings						
                                                        <b class="caret"></b>
                                                </a>

                                                <ul class="dropdown-menu pull-right">
                                                        <li style="color: greenyellow;"><a href="<?=base_url('account/settings');?>">Account Settings</a></li>
                                                        <li style="color: greenyellow;"><a href="<?=base_url('account/product-settings');?>">Product Settings</a></li>
                                                        <li style="color: greenyellow;"><a href="<?=base_url('account/security-settings');?>">Security Settings</a></li>
                                                </ul> 
                                        </li>
                                        
                                        <li><a href="<?=base_url('lunar/logout/');?>">Logout</a></li>
                                    <?php endif;?>
                                </ul>
                                
                            </div>
                        </div><!-- /.span12 -->
                    </div><!-- /.row -->
                </div><!-- /.container -->
            </div><!-- /.breadcrumb-wrapper -->

            <!-- HEADER -->
            <div id="header-wrapper">
                <div id="header">
                    <div id="header-inner">
                        <div class="container">
                            <div class="navbar">
                                <div class="navbar-inner">
                                    <div class="row">
                                        <div class="logo-wrapper span4">
                                            <a href="#" class="hidden-desktop" id="btn-nav">Toggle navigation</a>

                                            <div class="logo">
                                                <a href="<?=base_url();?>" title="Home">
                                                    <img src="<?= base_url('static'); ?>/logo-2.png" alt="Scrobber Home">
                                                </a>
                                            </div><!-- /.logo -->
                                            
                                            <dl class="site-slogan" style="margin-left: 240px; margin-top: -60px;">
                                                <span>
                                                    Hiring made easy >><br />
                                                
                                                    <?=$this->session->userdata('ip_country');?>
                                                    
                                                     
                                                </span>
                                            </dl><!-- /.site-slogan -->
                                        </div><!-- /.logo-wrapper -->

                                        <div class="info">
                                            <div class="site-email">
                                                <a href="mailto:hi@scrobber.<?=DOMAIN;?>">hi@scrobber.<?=DOMAIN;?></a>
                                            </div><!-- /.site-email -->

                                            <div class="site-phone">
                                                <?php if(DOMAIN == 'in'):?>
                                                    
                                                <?php else:?>
                                                    <span>+254 788 438 228/9/ 230</span>
                                                <?php endif;?>
                                                    
                                            </div><!-- /.site-phone -->
                                        </div><!-- /.info -->

                                        <a class="btn btn-primary btn-large list-your-property arrow-right" href="<?=base_url('add?src=The+old_trusted+guy');?>">Add a listing</a>
                                    </div><!-- /.row -->
                                </div><!-- /.navbar-inner -->
                            </div><!-- /.navbar -->
                        </div><!-- /.container -->
                    </div><!-- /#header-inner -->
                </div><!-- /#header -->
            </div><!-- /#header-wrapper -->

            <!-- NAVIGATION -->
            <div id="navigation">
                <div class="container">
                    <div class="navigation-wrapper">
                        <div class="navigation clearfix-normal">

                            <ul class="nav">
                                <li class="active">
                                        <li><a href="<?=base_url('?refresh&src=nav_bar');?>">Home</a></li>
                                       
                                </li>
                                <li class="menuparent">
                                    <span class="menuparent nolink">Listing</span>
                                    <ul>
                                        <li><a href="<?=base_url('search?filter=Published&s=&location=&order=DESC');?>">Browse Latest</a></li>
                                        <li><a href="<?=base_url('add?src=listings+campaign');?>" >Add Listing</a></li>
                                    </ul>
                                </li>
                                <!-- li class="menuparent">
                                    <span class="menuparent nolink">Guide</span>
                                    <ul>
                                        <li> <a href="<?=base_url('guide');?>" title="Guide To Scrobber" target="_blank"> Guide </a> </li>
                                        <li> <a href="<?=base_url('guide');?>" title="How it works" target="_blank"> How It works </a> </li>
                                    </ul>
                                </li>
                                <li class="menuparent">
                                    <span class="menuparent nolink">Pricing</span>
                                    <ul>
                                        <li><a href="<?=base_url('pricing');?>">Pricing Plans</a></li>
                                        <li><a href="<?=base_url('pricing/business');?>">Corporate Services</a></li>
                                        <li><a href="<?=base_url('pricing/why');?>">Why we charge</a></li>
                                    </ul>
                                </li -->
                                <li><a href="<?=base_url('contact-us');?>">Contact Us</a></li>
                            </ul><!-- /.nav -->

                            <div class="language-switcher">
                                <div class="current en"><a href="<?=base_url('?lang=en_us');?>" lang="en">English</a></div><!-- /.current -->
                                <div class="options">
                                    <ul>
                                        <li class="ke"><a href="<?=base_url('?location=Kenya&force=true');?>">Kenya</a></li>
                                        <li class="in"><a href="<?=base_url('?location=India&force=true');?>">India</a></li>
                                    </ul>
                                </div><!-- /.options -->
                            </div><!-- /.language-switcher -->

                            <form method="get" class="site-search" action="<?=base_url('search');?>">
                                <div class="input-append">
                                    <input title="Enter the terms you wish to search for." class="search-query span2 form-text" placeholder="Search" type="text" name="s">
                                    <button type="submit" class="btn"><i class="icon-search"></i></button>
                                </div><!-- /.input-append -->
                            </form><!-- /.site-search -->
                        </div><!-- /.navigation -->
                    </div><!-- /.navigation-wrapper -->
                </div><!-- /.container -->
            </div><!-- /.navigation -->
