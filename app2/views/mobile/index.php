 <form action="<?=base_url('mobile/search/');?>" method="get" />
 <div data-role="fieldcontain">
    
        <fieldset data-role="controlgroup">
             <label for="searchinput1">
            </label>
                        
             <input name="s" id="searchinput1" placeholder="What are you looking for?" value="" type="search" />
        </fieldset>
                </div>
                <div class="ui-grid-a">
                    <div class="ui-block-a">
                        <div data-role="fieldcontain">
                            <fieldset data-role="controlgroup">
                                <label for="textinput1">
                                </label>
                                <input name="price" id="textinput1" placeholder="Price" value="" type="text" />
                            </fieldset>
                        </div>
                    </div>
                    <div class="ui-block-b">
                        <div data-role="fieldcontain">
                            <fieldset data-role="controlgroup">
                                <label for="textinput2">
                                </label>
                                <input name="location" id="textinput2" placeholder="Location" value="" type="text" />
                            </fieldset>
                        </div>
                    </div>
                </div>
                <div class="ui-grid-b">
                    <div class="ui-block-a">
                    </div>
                    <div class="ui-block-b">
                        <button data-theme="b" data-icon="search" data-iconpos="left" data-mini="true" type="submit" />Search</button>
                        
                    </div>
                    <div class="ui-block-c">
                    </div>
                </div>
    </form>
                <div data-role="collapsible-set" data-theme="b">
                    <div data-role="collapsible" data-collapsed="true">
                        <h3>
                            Latest Items
                        </h3>
                        <div class="ui-grid-a" style="width : 100%">
                        <?php foreach ($recent-> result () as $rdata):?>
                                <div class="ui-block" style="float: left; width: 50%;">

                                    <div style="width: 96%; height: 100px; position: relative; background-color: #fbfbfb; border: 1px solid #b8b8b8;">
                                       <a href="<?=base_url('mobile/view/'.$rdata->sess);?>">
                                            <img width="96%" height= "100px" src="<?=base_url('images/'.$rdata->image);?>" alt="<?=$rdata->name;?>" style="position: absolute; margin-left: 3px;"/>
                                        </a>
                                    </div>
                                    <h5>
                                        <a href="<?=base_url('mobile/view/'.$rdata->sess);?>"> <?=$rdata->name;?> </a>
                                    </h5>
                                    <p style="font-size: 12px; margin-top: -4px;">
                                        Location: <?=$rdata->location;?>
                                        <br>
                                        Price: <?=$rdata->item_price;?>
                                    </p> 

                                    <hr>
                                </div>
                         <?php endforeach; ?>
                            
                        </div>
                    </div>
                    <div data-role="collapsible" data-collapsed="true">
                        <h3>
                            Popular Items
                        </h3>
                        <div class="ui-grid-a"  style="width : 100%">
                                <?php foreach ($popular-> result () as $pdata):?>
                                <div class="ui-block" style="float: left; width: 50%;">

                                    <div style="width: 96%; height: 100px; position: relative; background-color: #fbfbfb; border: 1px solid #b8b8b8;">
                                       <a href="<?=base_url('mobile/view/'.$pdata->sess);?>">
                                            <img width="96%" height= "100px" src="<?=base_url('images/'.$pdata->image);?>" alt="<?=$pdata->name;?>" style="position: absolute; margin-left: 3px;"/>
                                        </a>
                                    </div>
                                    <h5>
                                        <a href="<?=base_url('mobile/view/'.$pdata->sess);?>"> <?=$pdata->name;?> </a>
                                    </h5>
                                    <p style="font-size: 12px; margin-top: -4px;">
                                        Location: <?=$pdata->location;?>
                                        <br>
                                        Price: <?=$pdata->item_price;?>
                                    </p> 

                                    <hr>
                                </div>
                         <?php endforeach; ?>
                           <span style="font-size: 8px;"> <a href="#"> Get my item here </a>
                        </div>
                    </div>
                    <div data-role="collapsible" data-collapsed="true">
                        <h3>
                            Recently Viewed
                        </h3>
                        <div class="ui-grid-a"  style="width : 100%">
                                <p>
                                    This data is not available right now.  <a href="<?base_url('mobile/faq/#search?q=data_not+available');?>">Why?</a>
                        </div>
                    </div>
                </div>