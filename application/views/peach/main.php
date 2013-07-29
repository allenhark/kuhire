<section id="main">
    

    <div class="body-text">

        <div class="container-fluid">

            <div class="row-fluid">

                <!--west pane span9-->
                <div class="span9">
                    <div class="row-fluid">
                        <h1>Featured Listings</h1>
                        <div class="pagination pagination-centered pull-right" style="margin-top: -38px;">
                                    
                                    <ul>
                                        <?= $this->pagination->create_links(); ?>
                                       
                                    </ul>
                                </div>
                        <div class="divider">&nbsp;</div>
                    </div>
                    <div class="row-fluid hotproperties">
                        <?php foreach($latest->result () as $listings):?>
                        <div class="span4  set-equal-heights-js" style="min-height: 310px; float: left; margin-left: 5px;">
                            <div class="thumbnail">
                                <a href="<?=base_url($listings->slug.'?ref=front+page');?>">
                                    <img src="<?=base_url('images/thumbnails/'.$listings->image);?>" alt="<?=base_url($listings->name);?> for hire" class="thumbnail" style="max-height: 147px; min-height: 147px; width: auto; float: left;">
                                </a>
                                <?php if(!isset($_GET['browse'])):?>
                                    <span class="sticker sticker-hot">New</span>
                                <?php endif;?>
                                <div class="caption" style="min-height: 320px;">
                                    <a href="<?=base_url($listings->slug.'?ref=front+page');?>" class="prop-title">
                                        <?= word_limiter($listings->name, 4);?>
                                    </a>
                                    <p class="size" style="font-size: 11px; color: grey;"> <?= $listings->location . ' ' . $listings->region; ?></p>
                                    <p class="price"><?php if ($listings->item_price): echo ' KShs '.$listings->item_price; else: echo 'Price: Enquire';endif; ?></p>
                                    <p class="description">
                                       <?= word_limiter($listings->name, 6); ?> 
                                    </p>
                                    <ul class="list-btns">
                                        <!-- li><a href="<?=base_url($listings->slug.'?ref=view+later');?>" id="property_1" class="add-to-list-js" 
                                               data-shortlist="<img src='<?=base_url('images/thumbnails/'.$listings->image);?>' alt='<?=$listings->name;?>'>
                                               <div><a href='<?=base_url($listings->slug."?ref=view+later");?>' id='property_<?=$listings->item_id;?>'><?=$listings->name;?></a><?php if ($listings->item_price): echo $listings->item_price . ' KSH'; else: echo 'Price: Enquire';endif; ?></div>">
                                                <i class="icon-plus-sign"></i>Short List</a></li -->
                                        <li><a href="<?=base_url($listings->slug.'?ref=view+later');?>"><i class="icon-info-sign"></i>View Details</a></li>
                                    </ul>
                                </div>
                            </div>                          
                            
                        </div>                        
                        
                        <?php endforeach; ?>
                        
                        <div class="span4  set-equal-heights-js">
                            <a href="<?=base_url('add?ref=upload+next');?>">
                                <img src="<?=base_url('images/upload.png');?>" />
                            </a>
                            
                             <div class="caption">
                                    <a href="<?=base_url('add?ref=upload+next');?>" class="prop-title">
                                        Your listing name
                                    </a>
                                    <p class="size">Your listing location</p>
                                    <p class="price">Your listing price</p>
                                    <p class="description">
                                       Its free and easy. Add your rental now.
                                    </p>
                                    <ul class="list-btns">
                                        <li><a href="<?=base_url('add?ref=upload+next');?>"><i class="icon-plus-sign"></i>Add Listing</a></li>
                                    </ul>
                                </div>
                        </div>
                        
                        
                        <div class="clearfix"></div>
                        
                        <div class="pagination pagination-centered align-center">
                                    
                                    <ul>
                                        <?= $this->pagination->create_links(); ?>
                                       
                                    </ul>
                                </div>

                    </div>
                </div><!--end of west pane span9-->

                <!--east pane with width of span3-->
                <div class="span3">	

                    <div class="qbox">
                        <h3><i class="icon-search pull-right"></i>Quick Search</h3>
                        <form action="<?=base_url('search');?>">
                            <div>
                                <label>What are you looking for?</label>
                                <input type="text" name="s" x-webkit-speech="x-webkit-speech" style="width:95%;" >
								
                            </div>
                            <div>
                                <label>Select Category</label>
                                <select data-placeholder="-- Select Category --" class="chzn-select" style="width:100%;" tabindex="1" name="category">
                                    
                                     <?php foreach($this->data->get_categories () -> result () as $cat):?>
                                        <option value="<?=humanize($cat->cat_id);?>"><?=humanize($cat->cat_name);?></option>
                                    <?php endforeach;?>                                       
                                    
                                </select>
                            </div>
                            <div>
                                <label>Select a locality</label>
                                <select  data-placeholder="-- Available Locales --" multiple="multiple" class="chzn-select" style="width:100%;" name="locality" tabindex="2">
                                    <?php foreach($this->data->locales () -> result () as $locs):?>
                                        <option value="<?=humanize($locs->name.'-'.$county->id);?>"><?=humanize($locs->name);?></option>
                                    <?php endforeach;?>
                                                                
                                </select>
                            </div>  
           
                            <button class="btn btn-inverse btn-small">Search</button>
                        </form>
                    </div>
                    
                    <!-- // MY SHORT LIST // 
                    <div class="qbox">
                        <h3>My Short List <label class="badge badge-important pull-right" id="short-list-count-js">0</label></h3>
                        <div>
                         
                            <p> Add items to your shortlist to view later or for price comparison</p>
                            <!-- DO NOT DELETE 
                            <ol id="show-items" class="shortlist"></ol>
                            <!-- END DO NOT DELETE

                            <a href="javascript:void(0);" class="link" id="clear-all">Clear List</a>
                        </div>
                    </div>
                    <!--/end my short list-->
                    
                    <!-- Facebook -->
                    <div class="fb-like-box" data-href="https://www.facebook.com/Kuhire" data-width="292" data-show-faces="true" data-stream="false" data-show-border="false" data-header="true"></div>

                <br />
                <a href="https://twitter.com/kuhire254" class="twitter-follow-button" data-show-count="true" data-lang="en">Follow @Kuhire254</a>
                <script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src="//platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
                <!-- end social stuff -->
                </div><!--end of span3-->

            </div>

        </div>
        
        <!-- start paging -->
                    <div class="container-fluid">
                        <div class="row-fluid" style="border:none;">
                            <div class="span12">
                                
                            </div>
                        </div>
                    </div>
                    <!-- end paging -->
                    
    </div>
</section><!--end section-->