<section id="main">
    <!-- Slider start-->
    <div id="slide-wrapper">

        <div id="banner">
            <?php foreach($recom -> result () as $slider):?>
                <div class="oneByOne_item">   
                    <a href="<?=base_url($slider->slug.'?ref=home+slider+image');?>">
                        <img src="<?=base_url('images/slider/'.$slider->image);?>" alt="Placeholder" class="bigImage">
                    </a>
                    <span class="slide5Txt1" data-animate="fadeInLeftBig">
                       <a href="<?=base_url($slider->slug.'?ref=home+slider');?>"> <?=$slider->name;?> </a>
                    </span>								
                    <span class="slide5Txt2" data-animate="fadeInRightBig"><?php if ($slider->item_price): echo $slider->item_price . ' KSH'; else: echo 'Price: Enquire';endif; ?> | <?= $slider->location . ' ' . $slider->region; ?></span>																						
                </div>	
            <?php endforeach; ?>	
        </div>    

    </div>	<!-- end slider -->		  	

    <div class="body-text">

        <div class="container-fluid">

            <div class="row-fluid">

                <!--west pane span9-->
                <div class="span9">
                    <div class="row-fluid">
                        <h1>Featured Listings</h1>
                    </div>
                    <div class="row-fluid hotproperties">
                        <?php foreach($latest->result () as $listings):?>
                        <div class="span4  set-equal-heights-js" style="min-height: 310px; float: left; margin-left: 5px;">
                            <div class="thumbnail">
                                <a href="<?=base_url($listings->slug.'?ref=front+page');?>">
                                    <img src="<?=base_url('images/thumbnails/'.$listings->image);?>" alt="<?=base_url($listings->name);?> for hire" class="thumbnail" style="max-height: 147px; min-height: 147px; width: auto; float: left;">
                                </a>
                                <span class="sticker sticker-hot">Hot</span>
                                <div class="caption" style="min-height: 320px;">
                                    <a href="<?=base_url($listings->slug.'?ref=front+page');?>" class="prop-title">
                                        <?=$listings->name;?>
                                    </a>
                                    <p class="size"><?= $listings->location . ' ' . $listings->region; ?></p>
                                    <p class="price"><?php if ($listings->item_price): echo $listings->item_price . ' KSH'; else: echo 'Price: Enquire';endif; ?></p>
                                    <p class="description">
                                       <?= word_limiter($listings->name, 6); ?> 
                                    </p>
                                    <ul class="list-btns">
                                        <li><a href="<?=base_url($listings->slug.'?ref=front+page');?>"><i class="icon-info-sign"></i>View Details</a></li>
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
                                <label>Select County</label>
                                <select data-placeholder="-- Select County --" class="chzn-select" style="width:100%;" tabindex="1" name="county">
                                    
                                    <?php foreach ($this->data->counties() -> result () as $county):?>
                                        <option value="<?=humanize($county->name.'-'.$county->id);?>"><?=humanize($county->name);?></option>
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

                    <!-- Start Zone Alert -->
                    <div class="qbox">
                        <h3><i class="icon-eye-open pull-right"></i>Zone Alert</h3>
                        <div>
                            <p>Register your criteria and Property Alert will let you know when properties are listed.</p>
                            <a data-toggle="modal" href="#myModal" class="btn btn-small">Register</a>
                        </div>

                    </div><!-- end Zone Alert -->

                </div><!--end of span3-->

            </div>

        </div>

    </div>
</section><!--end section-->