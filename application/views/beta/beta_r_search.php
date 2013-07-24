<div class="container">
    <div class="container-twelve">
        <div class="hidden-phone" />
        <div class="twelve columns search-result">
            <form action="<?= base_url('search/'); ?>" method="get">
                <input type="hidden" name="limit_min" value="0">
                <input type="hidden" name="limit_max" value="10">
                <input type="hidden" name="ref" value="search home">
                <input type="hidden" name="source" value="internal" >
                <input type="hidden" name="max" value="off" >
                <div class="input-append">
                    <input class="span9" type="text" placeholder="What are you looking for?" name="s" value="<?= $_GET['s']; ?>" style="height: 30px;"/>
                    <button type="submit" class="btn btn-inverse btn-large">Search</button>
                </div>
            </form>
        </div>
        <br> <br>
        <dl class="top-spacer">
            <?php
            ?>
    </div>
    <br />
    <div class="three columns visible-desktop">
        <div class="well">
            <?php if ($rt->num_rows > 20): ?>
                <div class="alert-attention">
                    <h5> We found <?= $rt->num_rows; ?> results</h5>
                    <h6> Filter By:</h6>
                </div>
            <?php else: ?>
                <h5> We found <?= $rt->num_rows; ?> results</h5>
                <h6> Filter By:</h6>			
            <?php endif; ?>
            <div class="accordion">
                <form action="<?= base_url('search/filter/'); ?>" method="get" />
                <h5><span></span>Location</h5>
                <div class="content">
                    <p>
                        <input name="location" placeholder="Location" class="span2" style="height: 30px;;"/>
                    </p>
                </div>
                <h5><span></span>Price</h5>
                <div class="content">
                    <p>
                        <input name="price" placeholder="Price" class="span2" style="height: 30px;;"/>
                    </p>
                </div>
                <h5><span></span>Availability</h5>
                <div class="content">
                    <p>
                        <select name="availability" style="width: auto;">
                            <option value="AnyDay">Any Day</option>
                            <option value="Weekdays"> Week Days</option>
                            <option value="Weekends"> Weekends</option>
                        </select>
                    </p>
                </div>
                <input type="hidden" name="s" value="<?= $_GET['s']; ?>" />

            </div>		
            <button type="submit" class="btn btn-warning"><i class="splashy-refresh"></i> Filter</button>
            </form>

        </div>


        <div class=" well ">
            Find people looking for "<?= $_GET['s']; ?>"
            <br>
            <a class="btn" href="<?= base_url('wanted/'); ?>?s=<?= $_GET['s']; ?>&limit_min=0&limit_max=10&ref=search+home&source=internal&max=off"> Find </a>

        </div>

    </div>
    <div class="nine columns " style="width: 15%; height: 100%;">
        <?php
        foreach ($rt->result() as $result):
            $img = base_url('images/' . $result->image);
            ?>
            <div class="ten columns" style="margin-left: 0px;">
                <div>
                    <div class="three columns">
                        <a href="<?= base_url($result->slug . '?ref=search+results&search=true&key=' . $_GET['s']); ?>" class="thumb-placeholder">
                            <img class="thumbnail img-rounded" src="<?= $img; ?>" alt="<?= $result->name; ?>" />
                        </a>                    
                    </div>

                    <div class="six columns">
                        <a href="<?= base_url($result->slug . '?ref=search+results&search=true&key=' . $_GET['s']); ?>"
                           <h4><?= $result->name; ?> </h4>
                        </a>
                        <p>
                            <?= word_limiter($result->desc, 6); ?>
                        </p>
                        <strong> In: <?= $result->location; ?> </strong> &nbsp;&nbsp;
                        <strong> Price:<?php if ($result->item_price == ''):; ?> Inquire <?php else:; ?> <?= $result->item_price . '.00/-'; ?> <?php endif; ?></strong>
                        
                        <div>
                            <?php
                            $id = $result->item_owner;
                            $dl = $this->user->search_user ($id);
                            
                            if($dl):
                            ?>
                                 <div class="clear clearfix divider "> &nbsp; </div>
                            
                            <?php if($dl->facebook_id == 0):?>
                            
                            <?php else:?>
                            
                            
                            <?php if (!$this->session->userdata('logged_in') | !$this->fb_ignited->fb_get_me() | $this->session->userdata('facebook_id') == 0): ?>
                                <p class="alert">
                                    You are not Facebook connected.<a href="<?= $this->fb_ignited->fb_login_url(); ?>" class="btn btn-info"> Connect </a> and Unlock Scrobber Social Hiring
                                </p>

                                <?php
                            else:
                                $fb_user = $this->session->userdata('facebook_id');
                                $fb_id = $dl->facebook_id;
                                ?>
                                <h5> You are connected to the owner </h5>


                                <div class="seven columns well"  style="margin-left: 0px;">

                                    <div class="two columns" style="">
                                        <img src="<?= base_url('avator/' . $dl->avator); ?>" alt="<?= $this->session->userdata('first_name'); ?>" class="img-rounded" width="60px;"/>
                                        <br />
                                        <?= $dl->first_name; ?>
                                    </div>

                                    <div class="four columns"  style="margin-left: -40px;">
                                        <?php if ($this->user->are_friends($fb_user, $fb_id)): ?>

                                            You and <?= $dl->first_name; ?> are Facebook Friends.
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
                                
                            <?php endif; ?>
                        </div>
                    </div>

                </div>
                <hr style="opacity: 0.4;" />
            </div>
        <?php endforeach; ?>
        <div class="ten columns">
            <div class="pagination">
                <ul class="unstyled ">
                    <?= $this->pagination->create_links(); ?>
                </ul>
            </div>
        </div>
        <hr style="opacity: 0.4;" />
    </div>
</div>
</div>