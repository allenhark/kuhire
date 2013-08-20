<body>
	
<div id="wrapper">
	
<div id="topbar">
	
	<div class="container">
		
		<a href="#" id="menu-trigger" class="dropdown-toggle" data-toggle="dropdown" data-target="#">
			<i class="splashy-applications_windows"></i>
		</a>
	
		<div id="top-nav">
			
			<ul>
				<li><a href="<?=base_url();?>"><i class="splashy-refresh_backwards"></i> Main Site </a></li>
			</ul>
			
			<ul class="pull-right">
				<li> <a href="<?=base_url('lunar/settings/account');?>"> <i class="icon-user"></i> Logged in as <?=$this->session->userdata('name');?> </a></li>
				<li> <a href="<?=base_url('lunar/mail/inbox');?>"> <span class="badge badge-warning"> <?=$inbox->num_rows ();?> </span> New Message </a> </li>
				<li> <a href="<?=base_url('lunar/mail/system');?>"> <span class="badge badge-important"> <?=$system->num_rows ();?> </span> System Message </a> </li>
				<li class="dropdown">
					<a href="<?=base_url('lunar/settings/');?>" class="dropdown-toggle" data-toggle="dropdown">
						Settings						
						<b class="caret"></b>
					</a>
					
					<ul class="dropdown-menu pull-right">
						<li><a href="<?=base_url('lunar/settings/account');?>">Account Settings</a></li>
						<li><a href="<?=base_url('lunar/settings/product');?>">Product Settings</a></li>
						<li><a href="<?=base_url('lunar/settings/security');?>">Security Settings</a></li>
					</ul> 
				</li>
				<li><a href="<?=base_url('lunar/logout/');?>">Logout</a></li>
			</ul>
			
		</div> <!-- /#top-nav -->
		
	</div> <!-- /.container -->
	
</div> <!-- /#topbar -->


<div id="header">
	
	<div class="container">
		
		<a href="<?=base_url('lunar');?>" class="brand"><img src="<?=base_url();?>/static/images/logo.png" alt="Scrobber Lunar" /></a>
		
		<a href="javascript:;" class="btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
        	<i class="splashy-home_green"></i> Menu
      	</a>
	
		<div class="nav-collapse">
			<ul id="main-nav" class="nav pull-right">
				<li class="nav-icon <?php if(!$this->uri->segment(2)) {echo 'active';};?>">
					<a href="<?=base_url('lunar');?>">
						<i class="splashy-home_grey"></i>
						<span> Home </span>        					
					</a>
				</li>

				<li>
					<a href="<?=base_url('add');?>"> Add New </a>
				</li>
				
				<li class="dropdown <?php if($this->uri->segment(2) == 'items') {echo 'active';};?>">					
					<a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown">
						<i class="splashy-view_thumbnail"></i>
						<span>Items</span> 
						<b class="caret"></b>
					</a>	
				
					<ul class="dropdown-menu">
						<li <?php if($this->uri->segment(3) == '') {echo "class='active'";};?>><a href="<?=base_url('lunar/items/');?>"><i class="eco-list"></i> All Items</a></li>
						<li <?php if($this->uri->segment(3) == 'inactive') {echo "class='active'";};?>><a href="<?=base_url('lunar/items/inactive');?>"><i class="entypo-icon-blocked "></i> Inactive items</a></li>
						<li <?php if($this->uri->segment(3) == 'history') {echo "class='active'";};?>><a href="<?=base_url('lunar/account/history');?>"><i class="entypo-icon-calendar"></i> Payment History</a></li>
						<li <?php if($this->uri->segment(3) == 'stats') {echo "class='active'";};?>><a href="<?=base_url('lunar/items/stats/');?>"><i class="icomoon-icon-bars"></i> Stats</a></li>
						<li><a href="<?=base_url('lunar/settings/product');?>"><i class="eco-cog"></i> Settings</a></li>
					</ul>    				
				</li>
				
				<li class="dropdown <?php if($this->uri->segment(2) == 'mail') {echo 'active';};?>">					
					<a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown">
						<i class="splashy-mail_light"></i>
						<span>Mail</span> 
						<b class="caret"></b>
					</a>	
				
					<ul class="dropdown-menu">							
						<li <?php if($this->uri->segment(3) == 'inbox') {echo "class='active'";};?>><a href="<?=base_url('lunar/mail/inbox');?>"><i class="splashy-mail_light_down"></i> Inbox</a></li>
						<li <?php if($this->uri->segment(3) == 'outbox') {echo "class='active'";};?>><a href="<?=base_url('lunar/mail/outbox');?>"><i class="splashy-mail_light_up"></i> Outbox</a></li>
						<li <?php if($this->uri->segment(3) == 'system') {echo "class='active'";};?>><a href="<?=base_url('lunar/mail/system');?>"><i class="splashy-mail_light_stuffed"></i> System Messages</a></li>
					</ul>    				
				</li>
				<li class="dropdown <?php if($this->uri->segment(2) == 'help') {echo 'active';};?>"> 
					<a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown">
						<i class="splashy-help"></i>
						<span>Help</span> 
						<b class="caret"></b>
					</a>	
				
					<ul class="dropdown-menu">							
						<li <?php if($this->uri->segment(3) == NULL) {echo "class='active'";};?>><a href="<?=base_url('lunar/help/');?>"><i class="eco-info"></i> Using Lunar</a></li>
						<li <?php if($this->uri->segment(3) == 'support') {echo "class='active'";};?>><a href="<?=base_url('lunar/help/support');?>"><i class="eco-support"></i> Customer Support</a></li>
						<li <?php if($this->uri->segment(3) == 'faq') {echo "class='active'";};?>><a href="<?=base_url('lunar/help/faq');?>"><i class="entypo-icon-info"></i> FAQ</a></li>
						<li <?php if($this->uri->segment(3) == 'bug') {echo "class='active'";};?>><a href="<?=base_url('lunar/help/bug');?>"><i class="wpzoom-bug"></i> Bug Report</a></li>						
						<li <?php if($this->uri->segment(3) == 'forums') {echo "class='active'";};?>><a href="<?=base_url('lunar/help/forums');?>"><i class="cut-icon-hash"></i> Forums</a></li>
						<li><a href="http://blog.scrobber.com" target="_blank"><i class="entypo-icon-forward"></i> Blog</a></li>
					</ul>    				
					
				</li>
			</ul>
			
		</div> <!-- /.nav-collapse -->

	</div> <!-- /.container -->
	
</div> <!-- /#header -->

