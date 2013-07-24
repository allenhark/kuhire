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


    <div class="container">

        <div class="container-sixteen">

            <div class="heading"> <h2 style="font-size: 25px; font-style: bold;"> <?= $row->name; ?> </h2> </div>


            <?php if ($row->status != 3): ?>
                <div class="alert-attention"> We cannot verify the status of this item, if you are the owner contact our customer support.</div>
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

        </div>

        <div class="container-sixteen" style="min-height: 600px; height: auto;">

            <div class="nine columns">
                <img src="<?= $img; ?>" alt="<?= $row->name; ?>" style="width: 70%; height: auto; float: center;"/>
                <br />
                <div><h4>CALL <span style="color: black;"> 0711 295 595 </span> OR <span style="color: black;"> 0714 449 002  </span>NOW! </h4> </div>

                <div class="clear clearfix divider">  </div>

                <div>
                    <h5> Description </h3>

                        <?= $row->desc; ?>
                        <div class="clear clearfix divider"> &nbsp; </div> <br />
                        <div class="hidden-phone">

                            <div class="clear clearfix divider "> &nbsp; </div>
                            
                            <?php if($user->facebook_id == 0):?>
                            
                            <?php else:?>
                            
                            <h5> Are you connected to <?=$user->first_name; ?>?</h5>
                            
                            <?php if (!$this->session->userdata('logged_in') | !$this->fb_ignited->fb_get_me() | $this->session->userdata('facebook_id') == 0): ?>
                                <p class="alert">
                                    You are not Facebook connected.<a href="<?= $this->fb_ignited->fb_login_url(); ?>" class="btn btn-info"> Connect </a> and Unlock Scrobber Social Hiring
                                </p>

                                <?php
                            else:
                                $fb_user = $this->session->userdata('facebook_id');
                                $fb_id = $user->facebook_id;
                                ?>


                                <div class="eight columns well"  style="margin-left: -20px;">

                                    <div class="two columns" style="">
                                        <img src="<?= base_url('avator/' . $user->avator); ?>" alt="<?= $this->session->userdata('first_name'); ?>" class="img-rounded" width="60px;"/>
                                        <br />
                                        <?= $user->first_name; ?>
                                    </div>

                                    <div class="four columns"  style="">
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
                                                    <div> You have <a href="http://facebook.com/<?= $friend['id']; ?>" target="_blank"> <img src="https://graph.facebook.com/<?= $friend['id']; ?>/picture" width="30" height="30"/> <?= $friend['name']; ?></a> and other <?= $num - 1; ?> friends in common. </div>

                                                <?php else: #Only one mutual friend ?>
                                                    <div> You have <a href="http://facebook.com/<?= $friend['id']; ?>" target="_blank"> <img src="https://graph.facebook.com/<?= $friend['id']; ?>/picture" width="30" height="30"/> <?= $friend['name']; ?></a> as a common friend</div>
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
                                                    if($num == 1):
                                            ?>
                                                    
                                                    <div> You have <a href="http://facebook.com/<?= $friend['id']; ?>" target="_blank"> <img src="https://graph.facebook.com/<?= $friend['id']; ?>/picture" width="30" height="30"/> <?= $friend['name']; ?></a> as a common friend</div>
                                                    <?php
                                                    elseif($num == 0):
                                                    ?>
                                                        No known Connections
                                                        <?php else:?>
                                                      
                                                    <div> You have <a href="http://facebook.com/<?= $friend['id']; ?>" target="_blank"> <img src="https://graph.facebook.com/<?= $friend['id']; ?>/picture" width="30" height="30"/> <?= $friend['name']; ?></a> as a common friend and <?=$num - 1;?> friends in common</div>
                                                    
                                                    
                                                    <?php endif; endif; ?>
                                    </div>


                                </div>
    <?php endif; endif;?>

                            <div style="width: 100%">
                                <!-- AddThis Button BEGIN -->
                                <div class="addthis_toolbox addthis_default_style unstyled">
                                    <a class="addthis_button_facebook_like" fb:like:layout="button_count"></a>
                                    <a class="addthis_button_tweet"></a>
                                    <a class="addthis_counter addthis_pill_style"></a>
                                </div>
                                <script type="text/javascript">var addthis_config = {"data_track_addressbar":true};</script>
                                <script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-4ebd1fcb33d52c14"></script>
                                <!-- AddThis Button END -->
                            </div>

                            <div class="clear clearfix divider ">  </div>
                            <h5> Reviews and Ratings </h5>

                            <?php
                            // Build reviews.
                            $this->db->where('item_hook', $row->item_id);
                            $rw = $this->db->get('reviews');
                            if ($rw->num_rows() != 0):
                                foreach ($rw->result() as $review):
                                    ?>
                                    <div class="testimonials-wrapper">

                                        <div class="testimonial-content">
            <?= $review->review_txt; ?>

                                            <div class="divider"></div>
                                            Rating:
                                            <?php
                                            $string = '<i class="splashy-star_full"></i>';
                                            echo repeater($string, $review->rating);
                                            ?>

                                        </div>

                                        <div class="testimonial-author"><?= $review->user_name; ?></div>
                                    </div>

                                    <?php
                                endforeach;
                            else:
                                ?>
                                <p>This item as no reviews or rating. Be the first to review and rate it.</p>
    <?php endif; ?>

                            <div class="review-info container-sixteen">
                                <span class="help-block">
                                    <strong>
                                        Used <?= $row->name; ?>? Leave a review.
                                    </strong>
                                </span>

                                <form action="<?= base_url("review/" . $row->slug . '/' . $row->item_id); ?>" method="post" class="well">
    <?php if (isset($_GET['error'])): ?>
                                        <ul>
                                            <li class="alert-warning">
                                                Ooops, there was a problem, all fields in this form are required*
                                            </li>
                                        </ul>
    <?php endif; ?>
                                    <br>
                                    <input type="hidden" name="item_hook" value="<?= $row->item_id; ?>">

                                    <div class="four columns">
                                        <span> Review *</span> <br>
                                        <textarea id="review" class="auto-width mceNoEditor" name="msg" cols="9" rows="7" >  </textarea><br>
                                    </div>

                                    <div class="three columns" style="float: left;">
                                        <span> Rating </span> <br>
                                        <select name="rating" class="three columns">

                                            <option value="1"> 1</option>
                                            <option value="2"> 2</option>
                                            <option value="3"> 3</option>
                                            <option value="4"> 4</option>
                                            <option value="5"> 5</option>
                                        </select>

                                        <span> Your Name *</span><br>
                                        <input type="text" name="name" class="three columns" value="<?= $this->session->userdata('name'); ?>" placeholder="Your Name"/> <br>

                                        <span> Your Email Address *</span> <br>
                                        <input type="email" name="email" class="three columns" value="<?= $this->session->userdata('user_email'); ?>" placeholder="Email" />

                                    </div>

                                    <div class="divider clear clearfix"> </div>

                                    <button type="submit" class="btn btn-info"> Review & Rate</button>
                                    <span class="pull-right align-right" style="font-size: 10px; opacity: 0.4;">
                                        <a href="<?= base_url('help/faq?reviews+and+ratings+process'); ?>" title="Learn more about reviews and rating process"> Learn More </a>
                                    </span>
                                    <br> <br>
                                </form>

                            </div>

                        </div>

                </div>
            </div>
            <div class="six columns">
                <div class="well" style="min-height: 180px; height: auto;">
                    <span> 
                        <strong style="font-size: 18px; font-style: bold;">
    <?php if ($row->item_price == ''):; ?> Inquire price </strong> <?php else:; ?>From:   <?= $row->item_price; ?> 
                            </strong>
                            Per <?= $valiation; ?>
    <?php endif; ?>
                    </span>

                    <hr style="opacity: 0.4; color: activeborder;" />
    <?php if (isset($_GET['hire'])): ?>
                        <li class="alert-warning">
                            Error sending hire details, Note all fields are required
                        </li>
                    <?php endif; ?>

    <?php if (isset($_GET['details'])): ?>
                        <p class="alert-success block">
                            We will call you shortly. Hold on...
                            <br />
                            Or you can call 0714 449 002 or 0111 295 595
                        </p>
                        <?php else: ?>
                        <form action="<?= base_url('hire/' . $this->uri->segment(1)); ?>" method="post">
        <?php if (!$this->session->userdata('logged_in')): ?>
                                <div class="content">
                                    <label> Your Name </label>
                                    <input type="text" name="name" style="height: 30px;">
                                </div>

                                <div class="content">
                                    <label> Your Email Address </label>
                                    <input type="text" name="email" style="height: 30px;">
                                </div>

                                <div class="content">
                                    <label> Your Phone Number </label>
                                    <input type="text" name="phone" style="height: 30px;">
                                </div>
        <?php else: ?>

                                <div class="content alert">
                                    You are logged in as <?= $this->session->userdata('first_name'); ?>
                                    <input type="hidden" value="<?= $this->session->userdata('name') . ' '; ?>" name="name" />
                                    <input type="hidden" value="<?= $this->session->userdata('user_email'); ?>" name="email" />
                                    <input type="hidden" value="<?= $this->session->userdata('user_phone'); ?>" name="phone" />
                                </div>

        <?php endif; ?>

                            <div class="two columns" style="margin-left: 0; float: left;">
                                <input type="hidden" value="<?= $row->slug; ?>" name="item" />
                                <input type="hidden" value="<?= $row->name; ?>" name="item_name" />
                                <input type="hidden" value="<?= $user->user_id; ?>" name="owner" />
                                <input type="hidden" value="<?= $user->email; ?>" name="user_email" />
                                <input type="hidden" value="<?= $user->first_name; ?>" name="o_name" />

                            </div>

                            <hr style="opacty: 0.2;">

                            <div class="block">

                                <button type="submit" class="btn btn-warning btn-block btn-large btn-big-block">
                                    Call Me
                                </button>
                            </div>

                        </form>
    <?php endif; ?>
                </div>

                <div class="well" style="text-align: center;">
                    <img src="<?= $uimg; ?>" alt="<?= $user->first_name; ?>" class="img-polaroid" style="width: 80%; height: auto;" />
                    <h4 style="font-family: Segoe Script, Script MT Bold; font-size: 25px;"><?= $user->first_name; ?> </h4>

                    <a data-toggle="modal" href="#contact-me" class="btn btn-info btn-large"> Contact
                        <?php if ($user->is_agent == 2):; ?>
                            Us
    <?php else:; ?>
                            Me

    <?php endif; ?>
                    </a>

                    <br> <br>
                    <a href="
                    <?php
                    if ($user->is_agent == 0):
                        echo base_url('user/' . $user->rand . '?ref=product+view');
                    elseif ($user->is_agent == 1):
                        echo base_url('agency/' . $user->rand . '?ref=product+view');
                    elseif ($user->is_agent == 2):
                        echo base_url('user/' . $user->rand . '?ref=product+view');
                    endif;
                    ?>
                       "> Other listings by <?= $user->first_name; ?> </a>

                </div>

                <div class="well">
                    <span style="opacity: 0.3; font-size: 10px;"><a href="<?= base_url('help/advertising'); ?> " target="_blank"> Sponsored:</a> </span>
                    <a href="<?= base_url($single->slug . '?ref=single+view+featured&umt=main&detector=random&s=undefined'); ?>" title="<?= $single->name; ?>">
                        <img src="<?= base_url('images/' . $single->image); ?>" alt="<?= $single->name; ?>" />
                        <h5> <?= $single->name; ?> </h5>
                    </a>
                    In:<strong> <?= $single->location; ?> </strong>&nbsp;
                    Price:<strong> <?= $single->item_price; ?> </strong>
                </div>
            </div>

        </div>

    </div>

    <!-- Modal -->
    <div id="contact-me" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">


        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            <h3 id="myModalLabel"> Contact <?= $user->first_name; ?> </h3>
        </div>
        <div class="modal-body well">

            <form action="<?= base_url('send/' . $user->user_id . '/' . $row->slug); ?>" method="post">
                <span>Your Name * </span> <br>
                <input type="text" name="name" placeholder="Your Name" /> <br>

                <span> Your Email Address * </span> <br>
                <input type="text" name="email" placeholder="Your Email Address" /> <br>

                <span> Your Phone Number * </span> <br>
                <input type="text" name="phone" placeholder="Your Phone Number" /> <br>

                <span> Message </span> <br>
                <textarea name="msg" class="mceNoEditor auto-width"></textarea> <br>

                <input type="hidden"  name="user_email" value="<?= $user->email; ?>" />
                <input type="hidden"  name="owner" value="<?= $user->user_id; ?>" />
                <input type="hidden" name="user_name"  value="<?= $user->first_name; ?>"/>
                <input type="hidden" name="p_name" value="<?= $row->name; ?>" />

        </div>

        <div class="modal-footer">

            <button type="submit" class="btn btn-info"> Contact </button>

            </form>

        </div>
    </div>

<?php endforeach; ?>