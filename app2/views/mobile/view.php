 <?php if ($item -> num_rows !== 0):?>
    <?php foreach ($item -> result () as $idata):?>
        <h2>
            <?=$idata->name;?>
        </h2>
            <div>
                <div style="width: 100%; height: auto; position: relative; background-color: #fbfbfb; border: 1px solid #b8b8b8;">
                   <img width="400px" height= "auto;" src="<?=base_url('images/'.$idata->image);?>" alt="<?=$idata->name;?>" style="position: relative; margin-left: 2px;" />
                </div>

                <p>
                    <strong> Price: </strong> <?=$idata->item_price.'.oo/-';?> a day &nbsp; 
                    <strong> Location: </strong> <?=$idata->location;?>
                </p>

                <p>
                    <?=$idata->desc;?>
                </p>

             </div>

             <hr color="grey" style="opacity: 0.05" />
            <div style="margin-top: 5px;">
                <h4> Contact the owner </h4>
                <div data-role="fieldcontain">
                    <fieldset data-role="controlgroup">
                        <label for="textinput1">
                            Name *
                        </label>
                        <input name="name" id="textinput1" placeholder="Your Name" value="" type="text" />
                    </fieldset>
                </div>
                <div class="ui-grid-a">
                    <div class="ui-block-a">
                        <div data-role="fieldcontain">
                            <fieldset data-role="controlgroup">
                                <label for="textinput3">
                                    Email *
                                </label>
                                <input name="email" id="textinput3" placeholder="Email Address" value="" type="text" />
                            </fieldset>
                        </div>
                    </div>
                    <div class="ui-block-b">
                        <div data-role="fieldcontain">
                            <fieldset data-role="controlgroup">
                                <label for="textinput4">
                                    Phone *
                                </label>
                                <input name="phone" id="textinput4" placeholder="Phone Number" value="" type="tel" />
                            </fieldset>
                        </div>
                    </div>
                </div>
                <div data-role="fieldcontain">
                    <fieldset data-role="controlgroup">
                        <label for="textarea2">
                            Message 
                        </label>
                        <textarea name="msg" id="textarea2" placeholder="Hire Message">
                        </textarea>
                    </fieldset>
                </div>
                <h4>
                    Hire Duration
                </h4>
                <div class="ui-grid-a">
                    <div class="ui-block-a">
                        <div data-role="fieldcontain">
                            <fieldset data-role="controlgroup">
                                <label for="textinput5">
                                    From *
                                </label>
                                <input name="start_date" id="textinput5" placeholder="From" value="" type="date" />
                            </fieldset>
                        </div>
                    </div>
                    <div class="ui-block-b">
                        <div data-role="fieldcontain">
                            <fieldset data-role="controlgroup">
                                <label for="textinput6">
                                    To 
                                </label>
                                <input name="end_date" id="textinput6" placeholder="To" value="" type="date" />
                            </fieldset>
                        </div>
                    </div>
                </div>
                <input data-theme="b" data-icon="info" data-iconpos="left" value="Hire It" type="submit" />

                <div data-role="fieldcontain">
                    <form method="get" action="<?=base_url('mobile/search/');?>" />
                        <fieldset data-role="controlgroup">
                            <label for="searchinput1"></label>
                            <input type="hidden" name="location" value="" />
                            <input type="hidden" name="price" value="" />
                            <input name="s" id="searchinput1" placeholder="Need something else?" value="" type="search" />
                        </fieldset>
                    </form>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
<?php else: ?>
    <div class="ui-grid-a">
        <div class="ui-block" style="width: 100%;">
            <div style="width: 100%; height: 100px; margin-top: 10px; position: relative; text-align: center; padding: 10px; background-color:  #b8b8b8;">            
                Ooops... <br>
                We couldn't find the item.
                Thats all we know.
            </div>
        </div>

        <div data-role="fieldcontain">
        <form method="get" action="<?=base_url('mobile/search/');?>" />
            <fieldset data-role="controlgroup">
                <label for="searchinput1"></label>
                <input type="hidden" name="location" value="" />
                <input type="hidden" name="price" value="" />
                <input name="s" id="searchinput1" placeholder="Need something else?" value="" type="search" />
            </fieldset>
        </form>
        </div>

</div>
<?php endif; ?>
