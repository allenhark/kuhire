<body>
    <div class="hidden-phone">
    <!-- HEADER -->
    <div id="outerheader" style="max-height: 80px;" >

        <div id="top" class="container">
            <header class="row">
                <div id="logo">		        	
                    <div id="logoimg">
                        <a href="<?= base_url(); ?>" title="Scrobber" >
                            <img src="<?= base_url('static'); ?>/images/logo.png" alt="Scrobber" />
                        </a>
                    </div>
                </div>
                <section id="navigation">
                    <nav >
                        <ul id="topnav" class="sf-menu align-left" style="margin-left: -50px;">
                            <li>
                                <a href="<?= base_url(); ?>"> Home</a>
                            </li>

                            <li >
                                <a href="<?= base_url('search'); ?>"><i class="splashy-zoom"></i> Search</a>
                            </li>
                            
                            <li>
                                <a href="<?= base_url('add'); ?>"> Add New </a>						
                            </li>

                           <li>
                                <a href="<?= base_url('cars/?ref=top+menu'); ?>"> Cars </a>
                            </li>

                            <li>
                                <a href="<?= base_url('wanted'); ?>"> Wanted </a>
                            </li>
                            <li>
                                <a href="<?= base_url('houses/?ref=top_menu'); ?>"> Guide </a>						
                            </li>
                            
                            <?php if (!$this->session->userdata('logged_in')): ?>
                                <li class="btn btn-info" style="text-color: white;"> <a href="<?= base_url('join'); ?>"> Join</a> </li>
                                <li> &nbsp; </li>
                                <li class="btn btn-warning"> <a href="<?= base_url('login'); ?>"> Login</a> </li>
                            <?php endif; ?>
                        </ul>                        
                    </nav><!-- nav -->	
                    <div class="clearfix"></div>
                </section>
                <div class="clearfix"></div>
            </header>
        </div>
    </div>
    <!-- END HEADER -->
    <div class="clear" style="margin-top: 80px;"> </div>

    <div class="clear"></div>


    <?php
    if ($this->session->userdata('logged_in')):
        ?>
        <div class="container container-twelve align-right">
            <div class="breadcrumbs"> 
                <a href="<?= base_url('add'); ?>"><i class="entypo-icon-plus"></i> Add New </a> 
                &nbsp;&nbsp;
                <a href="<?= base_url('lunar/'); ?>"><i class="icomoon-icon-bars"></i> Dashboard </a>				
                &nbsp;&nbsp;				
                <a href="<?= base_url('lunar/items'); ?>"><i class="brocco-icon-grid"></i> Your Items </a>	
                &nbsp;&nbsp;
                <a href="<?= base_url("lunar/inbox"); ?>"><i class="icomoon-icon-mail "></i> Inbox <span style="color: red">

                        <?php
                        $this->db->where('nb_reciever', $this->session->userdata('user_id'));
                        $this->db->where('nb_status', '1');
                        $this->db->order_by('nb_id', 'desc');
                        $mg = $this->db->get('msg_inbox');
                        if ($mg->num_rows() > 0):
                            $num = $mg->num_rows();
                            ?>
                            (<?= $num; ?>)
                        <?php else: endif; ?>				 		
                    </span></a>
                &nbsp;&nbsp;
                <a href="<?= base_url("lunar/account/settings"); ?>"><i class="wpzoom-settings"></i> Profile Settings</a>
                &nbsp;&nbsp;
                <a href="<?= base_url('lunar/logout'); ?>"><i class="icomoon-icon-exit"></i> Log out </a>		
            </div>	
            <div class="clear"> </div>		
            <hr style="opacity: 0.03;">
        </div>

    <?php endif; ?>
</div>
    <!-- Mobile Nav -->
    
<div class="container visible-phone" style="text-align: center;">
  <div class="container-twelve">
      <a href="<?=base_url();?>" >
          <img src="<?= base_url('static'); ?>/images/logo.png" alt="Scrobber"/>
      </a>
  </div>
  
	<div class='twelve columns search-top' id="search">
		<dl class="search-label"> Search </dl>
		<br>
		
		<form action="<?=base_url('search/');?>">
			<input type="text" name="s" placeholder="What are you looking for?" style="height: 35px; font-size: 18px; color: grey; font-style: italic;" class="span7" <?php if(isset($_GET['s'])):?> value="<?=$_GET['s'];?>" <?php endif;?>/>
			<br>
			<input type="hidden" name="limit_min" value="0">
			<input type="hidden" name="limit_max" value="10">
			<input type="hidden" name="ref" value="search home">
			<input type="hidden" name="source" value="internal" >
			<input type="hidden" name="max" value="off" >
			<button class="btn btn-large btn-inverse"><i class="splashy-zoom"></i> Find It</button>
		</form>
	</div>
    
</div>
    