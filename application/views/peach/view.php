<section id="main">
    <?php
    //Item properties build up.
    //$img = base_url('images/'.$row->image);

    $mysql = $row->pub_time;
    $unix = mysql_to_unix($mysql);

    //Item owner build up

    $this->db->where('user_id', $row->item_owner);
    $userd = $this->db->get('user');
    foreach ($userd->result() as $user):
        ?>
        <div class="body-text">
            <div class="container-fluid">
                <div class="row-fluid">
                    <div class="span12">							
                        <h1>
                            <?= $row->name; ?>, <?= $row->location . ' ' . $row->region; ?> 
                        </h1>

                        <?php if (isset($_GET['edited'])): ?>
                            <div class="alert alert-success">
                                Listing edited
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="row-fluid">
                    <div class="span8">   

                        <div>
                            <img src="<?= base_url('images/' . $row->image); ?>" alt="<?= $row->name; ?>" class="img-polaroid"/>


                        </div>
                        <!-- gallery end -->

                        <!-- about property -->	
                        <div class="row-fluid property-info">
                            <h4>About the property</h4>

                            <p class="description">
                                <?= $row->desc; ?>
                            </p>

                            <p class="asking-price">
                                <span>Hire Price</span> <?php if ($row->item_price): echo ' KShs ' . $row->item_price;
                                else: echo 'Price: Enquire';
                                endif; ?>
                            </p>
                        </div>
                        <!-- end about property -->	
                    </div>
                    <!-- end span8 -->	

                    <div class="span4">
                        <div class="property-info">
    <?php if ($this->session->userdata('logged_in')): if ($this->session->userdata('user_id') == $row->item_owner): ?>
                                    <a href="<?= base_url('add?src=edit&item=' . $row->slug . '&auth=' . md5(random_string('alnum', 8))); ?>" />
                                    <h3 class="btn btn-warning"> Edit </h3> 
                                    </a>

                                    <a href="<?= base_url('add?action=delete&item=' . $row->slug . '&auth=' . md5(random_string('alnum', 8))); ?>" />
                                    <h3 class="btn btn-danger"><i class="icon icon-trash"></i> Delete </h3> 
                                    </a>


        <?php endif;
    endif; ?>
                        </div>
                        <div class="addthis_toolbox addthis_default_style unstyled">
                            <a class="addthis_button_facebook_like" fb:like:layout="button_count"></a>
                            <a class="addthis_button_tweet"></a>
                            <a class="addthis_counter addthis_pill_style"></a>
                            <script type="text/javascript">var addthis_config = {"<?= base_url(uri_string('?src=social bookmarks')); ?>":true};</script>
                            <script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-4ebd1fcb33d52c14"></script>
                        </div>
                        <!--key features-->
                        <h4>Property info</h4>
                        <div class="property-info">
                            <ul class="property-info">
                                <li><strong>Price:</strong> <?php if ($row->item_price): echo ' KShs ' . $row->item_price;
    else: echo 'Price: Enquire';
    endif; ?> </li>
                                <script type="text/javascript">

                                function CopyToClipboard()

                                {

                                document.getElementById('shortlink').focus();

                                //document.getElementById('shortlink').select(); 

                                }

                                </script>
                                <li><span class="badge badge-warning">Product Code</span> <?=$row->code;?> </li>
                                <li><span class="badge badge-tertiary">Short link: </span>
                                    <div class="input-append" style="margin-top: -25px; margin-left: 80px;">
                                        <?php
                                            if($row->bitly != ''):
                                                $bitly = $row->bitly;
                                            else:
                                                $bitly = $this->bitly->shorten(base_url(uri_string()));
                                            endif;
                                        ?>
                                        <input class="span6" type="text" onfocus="this.select();" id="shortlink" value="<?=$bitly;?>">
                                        
                                        <button class="btn btn-peach" type="button" onClick="CopyToClipboard()"> 
                                            Copy
                                        </button>
                                    </div>
                                </li>
                            </ul>
                        </div>

                        <!--divider-->
                        <div class="divider"></div>



                        <h4 class="">Contact Agent</h4>
                        <!-- contact agent form -->
                        <div id="message"></div>
                        <form class="form-horizontal contact-agent-form" method="post" action="<?=base_url('hire');?>" name="contactform" id="contactform">
                            <span class="label label-info">* signifies a required field</span>
                            <input type="text" name="prp_name" id="prp_name" value="Property Name">
                            <div class="field">
                                <div class="label_field">
                                    <label for="name" accesskey="N">Name*</label>
                                </div>
                                <input type="text" name="name" id="name" placeholder="John Doe" value="<?= $this->session->userdata('name'); ?>" class="span8">
                            </div>

                            <div class="field">
                                <div class="label_field">
                                    <label for="email" accesskey="E">Email*</label>
                                </div>
                                <input type="email" id="email" name="email" value="<?= $this->session->userdata('user_email'); ?>" placeholder="your_email@address.com" class="span8">
                            </div>

                            <div class="field">
                                <div class="label_field">
                                    <label for="phone" accesskey="P">Phone*</label>
                                </div>
                                <input type="tel" name="phone" id="phone" placeholder="( 000 ) 000 - 0000" class="span8">
                            </div>

                            <div class="field">
                                <div class="label_field">
                                    <label for="comments" accesskey="C">Message</label>
                                </div>
                                <textarea name="msg" id="comments" class="span8" placeholder="Type your messages here" rows="4"></textarea>
                            </div>
                            <input type="hidden" value="<?= $row->slug; ?>" name="item" />
                            <input type="hidden" value="<?= $row->name; ?>" name="item_name" />
                            <input type="hidden" value="<?= $user->user_id; ?>" name="owner" />
                            <input type="hidden" value="<?= $user->email; ?>" name="user_email" />
                            <input type="hidden" value="<?= $user->first_name; ?>" name="o_name" />

                            <div class="button-align">
                                <div class="divider"></div>	
                                <input type="submit" class="btn" id="submit" value="Contact Agent">

                            </div>

                        </form>	
                        <!-- end contact agent form -->	


                    </div>

                </div><!-- end row-fluid -->

            </div><!--end container-fluid-->

        </div><!-- end body-text -->



        <!-- /container -->
<?php endforeach; ?>
</section>