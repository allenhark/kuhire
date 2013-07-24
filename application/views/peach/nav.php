
<!--begin body-->
<body>
    <header>
        <!--logo area start-->
        <div class="logo-area">
            <span id="logo"></span>
            <div class="pull-right" style="margin-top: -120px;">
                     <?php if($this->session->userdata('logged_in')):?>
                            
                            <a href="<?= base_url('account?ref=nav+bar'); ?>" class="btn btn-info">My account</a>
                            <a href="<?= base_url('account/listings?ref=nav+bar'); ?>" class="btn btn-warning">My Listings</a>
                            <a href="<?= base_url('logout?ref=nav+bar+account'); ?>" class="btn">Logout</a>
                            
                            <?php else:?>
                                <a href="<?= base_url('join/?ref=nav+bar'); ?>" class="btn btn-warning"> Sign Up</a>
                                <a href="<?= base_url('login?ref=nav+bar'); ?>" class="btn btn-info"> Sign In</a>
                                
                            <?php endif;?>
           
                <abbr title="Phone" id="call-phone">Call Us : +254 711 295 595</abbr>
            </div>
            
        </div><!--end logo area-->

        <!--nav bar start-->
        <nav class="navbar">
            <div class="navbar-inner">
                <div class="container">
                    <!--mobile nav icon (hidden:CSS)-->
                    <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse"> 
                        menu
                    </a><!--end btn-navbar-->
                    <div class="nav-collapse">
                        <ul class="nav">
                            <li class="<?php if(!$this->uri->segment(1)):?> active <?php endif;?>">
                                <a href="<?= base_url('?ref=nav+bar'); ?>">Home</a>
                            </li>

                            <li class="dropdown <?php if($this->uri->segment(1) == 'search'){?> active <?php };?>">
                                <a href="javascript:void(0)" class="dropdown-toggle" data-toggle="dropdown">Listings<b class="caret"></b></a>
                                <ul class="dropdown-menu">
                                    <li>
                                        <a href="<?= base_url('add?ref=nav+bar'); ?>">Add New</a>
                                    </li>

                                    <li>
                                        <a href="<?= base_url('search?filter=Published&s=&location=&order=DESC&ref=nav+bar+browse'); ?>">Browse latest</a>
                                    </li>

                                </ul>
                            </li>
                           
                                 <li >
                                     <a class="shortlist <?php if($this->uri->segment(1) == 'add'){?> active <?php };?>" href="<?= base_url('add?ref=nav+bar'); ?>"><i class="icon-plus"></i> Add New</a>
                                 </li>

                                 
                                
                                 <li class="<?php if(!$this->uri->segment(1)):?> <?php endif;?>">
                                <a href="<?= base_url('contact-us?ref=nav+bar'); ?>">Contact us</a>
                                </li>

                                
                            
                        </ul>

                        <form class="navbar-form pull-right" action="<?= base_url('search'); ?>" method="get" style="overflow:auto;">
                            <div class="input-append">
                                <input class="span2" id="appendedInputButton" type="text" name="s" x-webkit-speech="x-webkit-speech" placeholder="Search here...">
                                <input type="hidden" value="nav search" name="ref" />
                                <button class="btn btn-peach" type="button"> 
                                    Search
                                </button>
                            </div>
                        </form>

                    </div><!-- end nav-collapse -->
                </div><!-- end container-->
            </div><!-- end navbar-inner -->
        </nav><!--end nav bar-->
    </header>
