<section id="main">
    <div class="body-text">
        <div class="container-fluid">
            <div class="row-fluid">
              
                <div class="span9 listing-js">
                    <?php if(isset($rt)):?>
                    <!-- page title with dropdown -->
                    <h1>Search Results</h1>
                    <div class="container-fluid">
                        <div class="row-fluid">
                            <div class="span7 dropdown-results">
                                <p>We got <?=$count;?> results.</p>
                            </div>
                            <div class="span5">
                                <!-- select id="sort" name="sort">
                                    <option value="pmrank">Sort by Popularity</option>
                                    <option value="price">Sort by Price: Low to High</option>
                                    <option value="-price">Sort by Price: High to Low</option>
                                </select -->
                            </div>
                        </div>
                    </div>
                    <!-- end page title -->
                    
                    <?php foreach($rt->result () as $listing):?>
                        <!--start list-->
                        <div class="container-fluid">
                            <div class="row-fluid">
                                <div class="span4">
                                    <a href="<?=base_url($listing->slug.'?ref=search result');?>"><img src="<?=base_url('images/thumbnails/'.$listing->image);?>" alt="Placeholder Image" /></a>
                                    
                                </div>
                                <div class="span8">
                                    <a href="<?=base_url($listing->slug.'?ref=search result');?>" class="prop-title"><?=$listing->name;?></a>
                                   
                                    <p class="price"><?php if ($listing->item_price): echo ' KShs '.$listing->item_price; else: echo 'Price: Enquire';endif; ?></p>
                                     <p class="size"><?= $listing->location . ' ' . $listing->region; ?></p>
                                    <p class="description">
                                       <?= word_limiter($listing->name, 10); ?> 
                                    </p>
                                    <!-- Short List Btns -->
                                    <ul class="list-btns">
                                        <!-- li><a href="<?=base_url($listing->slug.'?ref=view+later');?>" id="property_1" class="add-to-list-js" 
                                               data-shortlist="<img src='<?=base_url('images/thumbnails/'.$listing->image);?>' alt='<?=$listing->name;?>'>
                                               <div><a href='<?=base_url($listing->slug."?ref=view+later");?>' id='property_<?=$listing->item_id;?>'><?=$listing->name;?></a><?php if ($listing->item_price): echo ' KShs '.$listing->item_price; else: echo 'Price: Enquire';endif; ?></div>">
                                                <i class="icon-plus-sign"></i>Short List</a></li -->
                                        <li><a href="<?=base_url($listing->slug.'?ref=view+later');?>"><i class="icon-info-sign"></i>View Details</a></li>
                                    </ul>
                                    <!-- end short list -->
                                </div>
                            </div>
                        </div>
                        <!--end list-->
                    <?php endforeach; ?>
                        <?php else:?>
                        <h1> We couldn't find any results for <?=$_GET['keyword'];?></h1>
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
                        <h3><i class="icon-search pull-right"></i>Quick Search</h3>
                       <form action="<?=base_url('search');?>">
                            <div>
                                <label>What are you looking for?</label>
                                <input type="text" name="s" x-webkit-speech="x-webkit-speech" style="width:95%;" value="<?php if(isset($_GET['s'])): echo $_GET['s']; endif;?> <?php if(isset($_GET['keyword'])): echo $_GET['keyword']; endif;?>">
								
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
                                        <option value="<?=humanize($locs->name);?>"><?=humanize($locs->name);?></option>
                                    <?php endforeach;?>
                                                                
                                </select>
                            </div>  
           
                            <button class="btn btn-inverse btn-small">Search</button>
                        </form>

                    </div>
                    <!-- // MY SHORT LIST // -
                    <div class="qbox">
                        <h3>My Short List <label class="badge badge-important pull-right" id="short-list-count-js">0</label></h3>
                        <div>
                         
                            <p> Add items to your shortlist to view later or for price comparison</p>
                            <!-- DO NOT DELETE --
                            <ol id="show-items" class="shortlist"></ol>
                            <!-- END DO NOT DELETE --

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
                </div>
                <!-- end span3 -->					
            </div>
            <!-- end row-fluid -->
        </div>
        <!-- end fluid-container -->
    </div>
    <!-- end body-text -->
</section>