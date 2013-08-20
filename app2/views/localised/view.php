<?php
//Item properties build up.

$img = base_url('images/' . $row->image);

$mysql = $row->pub_time;
$unix = mysql_to_unix($mysql);

//Pricing Valiation
if ($row->price_diff == 1):
    $valiation = 'Day';
elseif ($row->price_diff == 2):
    $valiation = 'Week';
elseif ($row->price_diff == 3):
    $valiation = 'Month';
elseif ($row->price_diff == 4):
    $valiation = 'Hour';
endif;

//Item owner build up

$this->db->where('user_id', $row->item_owner);
$userd = $this->db->get('user');
foreach ($userd->result() as $user):
    $uimg = base_url('avator/' . $user->avator);
    ?>


    <div id="content"><div class="container">
            <div id="main">
                <div class="row">
                    <div class="span9" itemscope itemtype="http://schema.org/Product">

                        <h1 class="page-header" itemprop="name"> <?= $row->name; ?> <?php if($this->session->userdata('user_id') == $row->item_owner):?><a href="<?=base_url("add/edit/?id=".$row->item_id);?>"> {EDIT}</a> <?php endif;?></h1>

                        <?php if(isset($_GET['ref'])): if($_GET['ref'] == 'add'):?>
                            
                            <div class="alert alert-success">
                                Item Added on Scrobber! This is a preview while we validate your item
                            </div>                            
                        <?php endif; endif;?>
                        <?php if ($row->status != 3): ?>
                            <div class="alert alert-attention"> We cannot verify the status of this item, if you are the owner contact our customer support.</div>
                            <div class="clean-a clear clearfix"> &nbsp;</div>
                        <?php endif; ?>

                        <?php if (isset($_GET['msg'])): ?>
                            <p class="alert-success">
                                Your Message has been sent
                            </p>
                            <div class="clean-a clear clearfix"> &nbsp;</div>
                        <?php endif; ?>

                        <?php if (isset($_GET['message'])): ?>
                            <p class="alert">
                                Error Sending your message. Try again. 
                                <strong> Note: </strong>
                                All fields are required
                            </p>
                            <div class="clean-a clear clearfix"> &nbsp;</div>
                        <?php endif; ?>

                       
                        <div class="property-detail">
                            
                             <div class="carousel property">
                                <div class="preview">
                                    <img src="<?= $img; ?>" alt="<?= $row->name; ?>" itemprop="image" style="width: 70%; height: auto; float: center;"/>
                                </div>
                            </div>
                            
                            <div class="pull-left overview">
                                <div class="row">
                                    <div class="span3">
                                        <h2>Overview</h2>

                                        <table>
                                            <tr>
                                                <th>Price:</th>
                                                <td><?php if ($row->item_price): echo $row->item_price . ' /-'; else: echo 'Enquire';endif; ?></td>
                                            </tr>
                                            
                                            <tr>
                                                <th>Location:</th>
                                                <td itemprop="location"><?= $row->location . ' ' . $row->region.', '.$row->country; ?></td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <div class="fb-like" data-href="<?=base_url(uri_string());?>" data-send="true" data-layout="button_count" data-width="250" data-show-faces="true" data-action="recommend"></div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>  &nbsp;</td>
                                            </tr>
                                            
                                        </table>
                                        
                                         <div>
                                            <!-- AddThis Button BEGIN -->
                                            <div class="addthis_toolbox addthis_default_style unstyled">
                                                <a class="addthis_button_facebook_like" fb:like:layout="button_count"></a>
                                                <a class="addthis_button_tweet"></a>
                                                <a class="addthis_counter addthis_pill_style"></a>
                                            </div>
                                            <script type="text/javascript">var addthis_config = {"<?=  base_url(uri_string('?src=social bookmarks'));?>":true};</script>
                                            <script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-4ebd1fcb33d52c14"></script>
                                            <!-- AddThis Button END -->
                                        </div>
                                        
                                    </div>
                                    <!-- /.span2 -->
                                </div>
                                <!-- /.row -->
                            </div>

                            <div itemprop="description">
                                <?php if(DOMAIN != 'in'):?>
                                    <h4>CALL <span style="color: black;"> 0711 295 595 </span> OR <span style="color: black;"> 0714 449 002  </span>NOW! </h4> 
                                <?php endif;?>                     
                                <h5> Description </h3>

                                    <?= $row->desc; ?>
                                
                                    <div class="clear clearfix divider"> &nbsp; </div> <br />
                                    <div class="hidden-phone">

                                        <div class="clear clearfix divider "> &nbsp; </div>

                                        <?php if ($user->facebook_id == 0): ?>

                                        <?php else: ?>

                                            <h5> Are you connected to <?= $user->first_name; ?>?</h5>

                                            <?php if (!$this->session->userdata('logged_in') | !$this->fb_ignited->fb_get_me() | $this->session->userdata('facebook_id') == 0): ?>
                                                <p class="alert">
                                                    You are not Facebook connected.<a href="<?= $this->fb_ignited->fb_login_url(); ?>" class="btn btn-info"> Connect </a> and Unlock Scrobber Social Hiring
                                                </p>

                                                <?php
                                            else:
                                                $fb_user = $this->session->userdata('facebook_id');
                                                $fb_id = $user->facebook_id;
                                                
                                                if($fb_user == $fb_id):
                                                    echo 'You are the owner';
                                                else:
                                                ?>


                                                <div class="span8 well">

                                                    <div class="span2">
                                                        <img src="<?= base_url('avator/' . $user->avator); ?>" alt="<?= $this->session->userdata('first_name'); ?>" class="thumbnail" width="60px;"/>
                                                        <br />
                                                        <?= $user->first_name; ?>
                                                    </div>

                                                    <div class="span5"  style="margin-left: -10px;">
                                                        <?php if ($this->user->are_friends($fb_user, $fb_id)): ?>

                                                            You and <?= $user->first_name; ?> are Facebook Friends.
                                                            <?php
                                                            $tx = $this->user->common_friends($fb_user, $fb_id);
                                                            $num = $tx['count'];
                                                            $friend = $tx['friend'];

                                                            //Check if there is mutual friends
                                                            if ($num !== 0):

                                                                //Minus the existing friend
                                                                if ($num - 1 !== 0):
                                                                    //Show Other friends
                                                                    ?>
                                                                    <div> You have <a href="http://facebook.com/<?= $friend['id']; ?>" target="_blank"> <img src="https://graph.facebook.com/<?= $friend['id']; ?>/picture" width="30" height="30" class="image"/> <?= $friend['name']; ?></a> and other <?= $num - 1; ?> friends in common. </div>

                                                                <?php else: #Only one mutual friend ?>
                                                                    <div> You have <a href="http://facebook.com/<?= $friend['id']; ?>" target="_blank"> <img src="https://graph.facebook.com/<?= $friend['id']; ?>/picture" width="30" height="30" class="image"/> <?= $friend['name']; ?></a> as a common friend</div>
                                                                <?php
                                                                endif;
                                                            //echo 'done';
                                                            endif;
                                                            ?>

                                                        <?php else: ?>
                                                            <?php
                                                            $tx = $this->user->common_friends($fb_user, $fb_id);
                                                            $num = $tx['count'];
                                                            $friend = $tx['friend'];

                                                            // echo $num;
                                                            if ($num == 1):
                                                                ?>

                                                                <div> You have <a href="http://facebook.com/<?= $friend['id']; ?>" target="_blank"> <img src="https://graph.facebook.com/<?= $friend['id']; ?>/picture" width="50" height="50"/> <?= $friend['name']; ?></a> as a common friend</div>
                                                                <?php
                                                            elseif ($num == 0):
                                                                ?>
                                                                No known Connections
                                                            <?php else: ?>

                                                                <div> You have <a href="http://facebook.com/<?= $friend['id']; ?>" target="_blank"> <img src="https://graph.facebook.com/<?= $friend['id']; ?>/picture" width="50" height="50"/> <?= $friend['name']; ?></a> as a common friend and <?= $num - 1; ?> friends in common</div>


                                                            <?php endif;
                                                        endif; ?>
                                                    </div>


                                                </div>
                                        <?php endif; endif;  endif; ?>
                                                <div class="clear clearfix divider"> &nbsp; </div> 
                                                <?= $map['html']; ?>
                                                <div class="clear clearfix divider"> &nbsp; </div> 
                                                
                                                <div class="fb-comments" data-href="<?=base_url(uri_string());?>" data-width="600px" data-num-posts="4"></div>
                                       
                                                                          

                                    </div>

                            </div>
                        </div>


                    </div>

                    <div class="sidebar span3">
                       
                        
                        
                        <div class="widget contact">
                            <div class="title">
                                <h2 class="block-title">Contact <?=$user->first_name;?></h2>
                            </div><!-- /.title -->
                            <?php if (isset($_GET['details'])): ?>
                        <p class="alert-success block">
                            Your request has been sent
                        </p>
                        <?php else: ?>
                            <div class="content">
                                <form action="<?= base_url('hire/' . $this->uri->segment(1)); ?>" method="post">
                                    <div class="control-group">
                                   <?php if (isset($_GET['hire'])): ?>
                                        <div class="alert alert-warning">
                                        
                                            Error sending hire details, Note all fields are required
                                        
                                        </div>
                                    <?php endif; ?>
                                        <label class="control-label" for="inputName">
                                            Name
                                            <span class="form-required" title="This field is required.">*</span>
                                        </label>
                                        <div class="controls">
                                            <input type="text" name="name" id="inputName">
                                        </div><!-- /.controls -->
                                    </div><!-- /.control-group -->

                                    <div class="control-group">
                                        <label class="control-label"  for="inputEmail">
                                            Email
                                            <span class="form-required" title="This field is required.">*</span>
                                        </label>
                                        <div class="controls">
                                            <input type="text" name="email" id="inputEmail">
                                        </div><!-- /.controls -->
                                    </div><!-- /.control-group -->
                                    
                                    <div class="control-group">
                                        <label class="control-label"  for="inputPhone">
                                            Phone Number
                                            <span class="form-required" title="This field is required.">*</span>
                                        </label>
                                        <div class="controls">
                                            <input type="text" name="phone" id="inputPhone">
                                        </div><!-- /.controls -->
                                    </div><!-- /.control-group -->

                                    <div class="control-group">
                                        <label class="control-label" for="inputMessage">
                                            Message
                                            <span class="form-required" title="This field is required.">*</span>
                                        </label>

                                        <div class="controls">
                                            <textarea id="inputMessage" name="msg"></textarea>
                                        </div><!-- /.controls -->
                                        
                                        <input type="hidden" value="<?= $row->slug; ?>" name="item" />
                                        <input type="hidden" value="<?= $row->name; ?>" name="item_name" />
                                        <input type="hidden" value="<?= $user->user_id; ?>" name="owner" />
                                        <input type="hidden" value="<?= $user->email; ?>" name="user_email" />
                                        <input type="hidden" value="<?= $user->first_name; ?>" name="o_name" />
                                    </div><!-- /.control-group -->

                                    <div class="form-actions">
                                        <input type="submit" class="btn btn-primary arrow-right" value="Send">
                                    </div><!-- /.form-actions -->
                                </form>
                            </div><!-- /.content -->
                            
                            <?php endif;?>
                        </div><!-- /.widget -->
                        
                        <div class="widget well">
                            
                            <img src="<?= $uimg; ?>" alt="<?= $user->first_name; ?>" class="img-polaroid" style="width: 80%; height: auto;" />
                            <h4 style="font-family: Segoe Script, Script MT Bold; font-size: 25px;"><?= $user->first_name; ?> </h4>

                            <a data-toggle="modal" href="<?=base_url('user/'.$user->rand.'?src=my+item');?>" class="btn btn-info btn-large"> Browse My Listings </a>
                            
                        </div>
                        
                        <div class="widget properties last">
                            <div class="title">
                                <h2>Latest Listings</h2>
                            </div><!-- /.title -->

                            <div class="content">
                               <?php foreach ($sidebar->result() as $side_data): ?>
                                    <div class="property">
                                        <div class="image">
                                            <a href="<?= base_url($side_data->slug . '?src=sidebar+latest'); ?>"></a>
                                            <img src="<?= base_url('images/thumbnails/' . $side_data->image); ?>" alt="<?= $side_data->name . ' for hire in ' . $side_data->region; ?>">
                                        </div><!-- /.image -->

                                        <div class="wrapper">
                                            <div class="title">
                                                <h3>
                                                    <a href="<?= base_url($side_data->slug . '?src=sidebar+latest'); ?>"><?= word_limiter($side_data->name, 3); ?></a>
                                                </h3>
                                            </div><!-- /.title -->
                                            <div class="location"><?= $side_data->location . ' ' . $side_data->region; ?></div><!-- /.location -->
                                            <div class="price"><?php if ($side_data->item_price): echo $side_data->item_price . ' /-';
    else: echo 'Enquire';
    endif; ?></div><!-- /.price -->
                                        </div><!-- /.wrapper -->
                                    </div><!-- /.property -->
                                <?php endforeach; ?>
                            </div><!-- /.content -->
                        </div><!-- /.properties -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

   

       


<?php endforeach; ?>