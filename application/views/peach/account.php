<section id="main">
    <div class="body-text">
        <div class="container-fluid">
            <div class="row-fluid">
                <div class="span9 listing-js">
                    
                    <!-- page title with dropdown -->
                    <h1>Your listings</h1>
                   <?php if(isset($_GET['deleted'])):?>                    
                        <span class="alert alert-warning"> Your listing was deleted</span>
                        <div class="divider">&nbsp;</div>
                    <?php endif;?>
                    <?php if(isset($_GET['error'])):?>
            
                    <h5 class="alert alert-error"> <?=$_GET['error'];?> </h5>
                    <?php endif;?>

                    <?php if(isset($_GET['success'])):?>

                    <h5 class="alert alert-success"> <?=$_GET['success'];?> </h5>
                    <?php endif;?>
                    <!-- end page title -->
                    <?php if(isset($rt)):?>
                    <?php foreach($rt->result () as $listing):?>
                        <!--start list-->
                        <div class="container-fluid">
                            <div class="row-fluid">
                                <div class="span4">
                                    <a href="<?=base_url($listing->slug.'?ref=my listings');?>"><img src="<?=base_url('images/thumbnails/'.$listing->image);?>" alt="Placeholder Image" /></a>
                                    
                                </div>
                                <div class="span8">
                                    <a href="<?=base_url($listing->slug.'?ref=my listings');?>" class="prop-title"><?=$listing->name;?></a>
                                   
                                    <p class="price"><?php if ($listing->item_price): echo ' KShs '.$listing->item_price; else: echo 'Price: Enquire';endif; ?></p>
                                     <p class="size"><?= $listing->location . ' ' . $listing->region; ?></p>
                                    <p class="description">
                                       <?= word_limiter($listing->name, 10); ?> 
                                    </p>
                                    <!-- Short List Btns -->
                                    <ul class="list-btns">
                                        <li><a href="<?=base_url('add?src=edit&item='.$listing->slug.'&auth='.md5(random_string('alnum', 8)));?>"><i class="icon-edit"></i>Edit Listing</a></li>
                                        <li><a href="<?=base_url($listing->slug.'?ref=my+listings');?>"><i class="icon-info-sign"></i>View Details</a></li>
                                        <li class="alert alert-danger"><a href="<?=base_url('add?action=delete&item='.$listing->slug.'&auth='.md5(random_string('alnum', 8)));?>"><i class="icon-trash"></i> Delete </a></li>
                                    </ul>
                                    <!-- end short list -->
                                </div>
                            </div>
                        </div>
                        <!--end list-->
                    <?php endforeach; ?>
                        <?php else:?>
                        <h1> You haven't added any listings yet, Add new</h1>
                        <?php endif;?>
                       <div class="container-fluid">
                            <div class="row-fluid">
                                <div class="span4">
                                    <a href="<?=base_url('add?ref=search btn');?>"><img src="<?=base_url('images/upload.png');?>" alt="Placeholder Image" /></a>
                                    
                                </div>
                                <div class="span8">
                                    <h2> Your listings Name </h2>
                                   
                                    <p class="price">Your listings Price</p>
                                     <p class="size">Your listing Location</p>
                                    <p class="description">
                                       Add a new listing free and easy on Scrobber.
                                    </p>
                                   
                                </div>
                            </div>
                        </div>

                    <!-- start paging -->
                    <div class="container-fluid">
                        <div class="row-fluid" style="border:none;">
                            <div class="span12">
                                <div class="pagination pagination-centered">
                                    
                                    <ul>
                                        <?= $this->pagination->create_links(); ?>
                                       
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end paging -->
                </div>
                <!-- end listing-js -->

                <div class="span3">
                    <!--
                            "Quick Search" Widget
                            
                            SPECIAL NOTE: Please leave the inline style for <Select></Select> "width:100%",
                                                      the width is automatically "Re-adjusted" with javascript
                                                      See "config.js" for more details	
                    -->
                    <div class="qbox">
                        <h3><i class="icon-user-md pull-right"></i>My Account</h3>
                        <a href="#password" data-toggle="modal"><i class="icon-edit"></i> Change Password</a>
                         <div id="password"  class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                            <div class="modal-header">
                              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                              <h3 id="myModalLabel">Change Password</h3>
                              
                            </div>
                            <div class="modal-body">
                              <form action="<?=base_url('account/change-password');?>" method="post" />
                              <label> Current Password </label>
                              <input type="password" name="current" />
                              
                              <label> New Password </label>
                              <input type="password" name="password" />
                              
                              <label> Confirm New Password </label>
                              <input type="password" name="password_cnf" />
                                  
                            </div>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-primary">Change Password</button>
                                <button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
                              
                            </div>
                            </form>
                          </div>
                        
                        <div class="divider">&nbsp;</div>
                        <h3> Scrobber Mail </h3>
                
                <strong> Inbox </strong>
                
                <div>
                    <?php if($this->user ->get_unread_mail()->num_rows !== 0):?>
                    
                    <?php foreach($this->user ->get_unread_mail() -> result () as $data):?>
                    
                    
                        
                        
                        <a href="#inbox-modal-<?=$data->nb_id;?>" data-toggle="modal"> <?=$data->nb_subject;?> </a> from <?=$data->nb_sender_name;?>
                        <hr />
                        <div id="inbox-modal-<?=$data->nb_id;?>"  class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                            <div class="modal-header">
                              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                              <h3 id="myModalLabel"><?=$data->nb_subject;?></h3>
                              <span> From: <?=$data->nb_sender_name;?></span> <br />
                              <span> Phone: <?=$data->nb_sender_phone;?> </span> <br />
                              <span> Email: <?=$data->nb__sender_email;?> </span>
                            </div>
                            <div class="modal-body">
                              <?=$data->nb_msg;?>
                            </div>
                            <div class="modal-footer">
                              <button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
                              <a href="<?=base_url('account/mark-as-read?inbox&id='.$data->nb_id);?>" class="btn btn-primary">Mark as Read</a>
                            </div>
                          </div>
                        <?php endforeach; unset($data); ?>
                        
                        <?php else:?>
                        
                            <div class="alert alert-success"> Hurray! No new unread Mail </div>
                        
                        <?php endif; ?>
                        
                    
                </div>
                
                <strong> System Inbox </strong>
                <div>
                    
                    <?php if($this->user ->get_unread_system_mail() -> num_rows !== 0):?>
                    <?php foreach($this->user ->get_unread_system_mail() -> result () as $data):?>
                        <a  href="#sysmail-<?=$data->msg_id;?>" data-toggle="modal"> <?=$data->subject;?> </a>
                        <hr />
                        
                        <div id="sysmail-<?=$data->msg_id;?>"  class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                            <div class="modal-header">
                              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                              <h3 id="myModalLabel"><?=$data->subject;?></h3>
                              <span> By <?=$data->sender;?></span>
                            </div>
                            <div class="modal-body">
                              <?=$data->message;?>
                            </div>
                            <div class="modal-footer">
                              <button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
                              <a href="<?=base_url('account/mark-as-read?sys&id='.$data->msg_id);?>" class="btn btn-primary">Mark as Read</a>
                            </div>
                          </div>
                        
                    <?php endforeach; unset($data); ?>
                        
                         <?php else:?>
                        
                            <div class="alert alert-success"> Hurray! No new unread Mail </div>
                        
                        <?php endif; ?>
                </div>
                    </div>
                    <!-- // MY SHORT LIST // -->
                    <div class="qbox">
                        <h3>My Short List <label class="badge badge-important pull-right" id="short-list-count-js">0</label></h3>
                        <div>
                         
                            <p> Add items to your shortlist to view later or for price comparison</p>
                            <!-- DO NOT DELETE -->
                            <ol id="show-items" class="shortlist"></ol>
                            <!-- END DO NOT DELETE -->

                            <a href="javascript:void(0);" class="link" id="clear-all">Clear List</a>
                        </div>
                    </div>
                    <!--/end my short list-->
                    
                </div>
                <!-- end span3 -->					
            </div>
            <!-- end row-fluid -->
        </div>
        <!-- end fluid-container -->
    </div>
    <!-- end body-text -->
</section>