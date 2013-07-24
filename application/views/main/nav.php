<body>
<header id="header" class="container clearfix">
<div class="navbar navbar-inverse navbar-fixed-top">
    <div class="navbar-inner">
        <div class="container"><b>
            <button type="button" class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="brand" href="<?=base_url();?>"><i class="splashy-home_green"></i> Scrobber</a>
            <div class="nav-collapse collapse">
                <ul class="nav">
                    <li><a href="<?=base_url();?>landing/browse"><i class="splashy-documents"></i> Browse</a></li>
                    <li><a href="<?=base_url();?>landing/location"><i class="splashy-marker_rounded_green"></i> Locations </a></li>
                    <li> <a href="<?=base_url('landing/search?query=');?>"><i class="splashy-zoom"></i> Search</a> </li>
                    <li>
                        <iframe src="//www.facebook.com/plugins/like.php?href=http%3A%2F%2Fwww.facebook.com%2Fscrobber&amp;send=false&amp;layout=button_count&amp;width=450&amp;show_faces=false&amp;action=like&amp;colorscheme=light&amp;font&amp;height=21&amp;appId=56742523553" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:80px; height:21px;margin-top:8px" allowTransparency="true"></iframe>
                    </li>
                </ul>

<!--
                <form action="#" class="navbar-search">
                    <input type="text" placeholder="Search" class="search-query span2" name="q" value="" />
                    <input type="hidden" name="scope" id="search_scope" value="posts">
                </form>
-->
                <ul class="nav pull-right">
                	<?php if ($this->session->userdata('logged_in')){?>                   	
                    	<li class="tool">
                			 
                        <a href="<?=base_url();?>dashboard/products" rel="tooltip" data-original-title="My products">My products
                          <i class="splashy-documents"></i> 
                        </a>
                    	</li>
                    	
                    	<li class="tool">
                			 
                        <a href="<?=base_url();?>dashboard/add" rel="tooltip" data-original-title="Add new">Add new
                          <i class="splashy-document_a4_add"></i>
                        </a>
                    	</li>
                    	
                    	<li class="tool">
                			 
                        <a href="<?=base_url();?>dashboard/mail" rel="tooltip" data-original-title="Messages"> Inbox
                          <i class="splashy-mail_light"></i> 
                        </a>
                    	</li>
                    	
                    	<li class="tool">
                			 
                        <a href="<?=base_url();?>landing/logout" rel="tooltip" data-original-title="Logout"> Logout
                          <i class="brocco-icon-switch"></i>
                        </a>
                    	</li>

                    
                    
                </ul>
                	
            <?php } else {?>
                    <li class="tool">
                        <a href="<?=base_url('landing/join');?>" rel="tooltip" data-original-title="Join and Start posting today">Join
                            <i class="splashy-contact_blue_add"></i>
                        </a>
                    </li>

                    <li class="tool">
                        <a href="<?=base_url('landing/login');?>" rel="tooltip" data-original-title="Login and Start posting today">Login
                            <i class="splashy-lock_large_locked"></i>
                        </a>
                    </li>
					<li>
                    
                </ul>
                <?php }?>
            </div><!-- /.nav-collapse --></b>
        </div>
    </div><!-- /navbar-inner -->
</div>
</header>

<?php $this->load->view('dashboard/validator');