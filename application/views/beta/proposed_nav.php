<body>
    <div class="hidden-phone">
        <!-- HEADER -->
        <div id="outerheader" style="max-height: 150px; background-color: white solid" >

            <div id="top" class="container">
                <header class="row">
                    <div id="logo">		        	
                        <div id="logoimg">
                            <a href="<?= base_url(); ?>" title="Scrobber" >
                                <img src="<?= base_url('static'); ?>/images/logo.png" alt="Scrobber" />
                            </a>
                            <strong> Search it, Find it, Hire it</strong>
                        </div>
                    </div>
                    <section id="navigation" style="margin-left: -60px;" class="modal-header">
                        
                        <?php
                            if(isset($_GET['s'])):
                                $vle = $_GET['s'];
                            else:
                                $vle = NULL;
                            endif;
                            
                            if(isset($_GET['location'])):
                                $le = $_GET['location'];
                            else:
                                $le = NULL;
                            endif;
                            
                            ?>
                        
                        <form class="form-inline" action="<?= base_url('search'); ?>" method="get">
                                    
                            <div class="span9">
                                
                            <div class="input-prepend">
                                <span class="add-on" style="height: 34px;">
                                    <i class="splashy-help" style="margin-top: 10px;"></i>
                                </span>
                                <input class="search-input input-xlarge" value="<?=$vle;?>" type="text" name="s" placeholder="What would you like to hire?" style="height: 34px;">
                            </div>
                            
                            <div class="input-prepend">
                                <span class="add-on" style="height: 34px;">
                                    <i class="splashy-map" style="margin-top: 10px;" ></i>
                                </span>
                                <input value="<?=$le;?>" name="location" type="text" placeholder="Location. E.g Nairobi" data-provide="typeahead" data-items="15" data-source='[ <?php $string = read_file('./legacy/ajax/locations.txt'); echo $string;?>]' style="height: 34px;">
                            </div>

                            <button type="submit" class="btn btn-info" style="height: 36px; width: auto;"><i class="icon-search"></i> Find it! </button>
                            
                            
                            </div>
                        </form>
                        
                        <hr style="opacity: 0.001"/>
                        
                        <ul id="topnav" class="sf-menu align-left" style="margin-left: -50px;">
                            <li style="border-right: solid rgba(128, 128, 128, 0.33) medium; border-bottom: solid rgba(128, 128, 128, 0.33) medium;" class="btn <?php if(!$this->uri->segment(1)): echo 'btn-info'; endif;?> ">
                                <a href="<?= base_url(); ?>"> Home</a>
                            </li>
                            
                            <li style="border-right: solid rgba(128, 128, 128, 0.33) medium; border-bottom: solid rgba(128, 128, 128, 0.33) medium;" class="btn <?php if($this->uri->segment(1) == 'add'): echo 'btn-info'; endif;?>">
                                <a href="<?=base_url('add');?>"> List my item </a>
                                
                            </li>
                            
                            <!--  li style="border-right: solid rgba(128, 128, 128, 0.33) medium; border-bottom: solid rgba(128, 128, 128, 0.33) medium;" class="btn <?php if($this->uri->segment(1) == 'search'): echo 'btn-info'; endif;?>">
                                <a href="<?=base_url('search');?>"><i class="icon-search"></i> Search </a>
                                
                            </li -->
                            
                            <li style="border-right: solid rgba(128, 128, 128, 0.33) medium; border-bottom: solid rgba(128, 128, 128, 0.33) medium;" class="btn <?php if($this->uri->segment(1) == 'account'): echo 'btn-info'; endif;?>">
                                <a href="<?=base_url('account');?>">
                                    <span style="color: red">

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
                    </span>
                                    My Scrobber </a>                                
                            </li>
                            
                            <li style="border-right: solid rgba(128, 128, 128, 0.33) medium; border-bottom: solid rgba(128, 128, 128, 0.33) medium; " class="btn <?php if($this->uri->segment(1) == 'guide'): echo 'btn-info'; endif;?>">
                                <a href="<?=base_url('guide');?>"> How it works </a>                                
                            </li>
                            
                            <li>
                               <div class="btn-group">
                                <button class="btn">Location</button>
                                <button class="btn dropdown-toggle" data-toggle="dropdown">
                                  <span class="caret"></span>
                                </button>
                                <ul class="dropdown-menu">
                                    <li><a href="<?=base_url('?update&location=Kenya');?>"><i class="flag-ke"></i> Kenya </a> </li> 
                                </ul>
                              </div> 
                            </li>
                            
                            
                            <?php if($this->session->userdata('logged_in')):?>
                                <li style="border-right: solid rgba(128, 128, 128, 0.33) medium; border-bottom: solid rgba(128, 128, 128, 0.33) medium; " class="btn <?php if($this->uri->segment(1) == 'guide'): echo 'btn-info'; endif;?>">
                                    <a href="<?=base_url('logout');?>"> Logout </a>                                
                                </li>
                            <?php endif; ?>
                        </ul>
                    </section>

                </header>

            </div>

        </div>

    </div>
   
    <div style="margin-bottom: 120px;">
        &nbsp;
    </div>