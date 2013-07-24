<?php if($result -> num_rows () !== 0):?>

	<div style="position: relative; margin-top: 5px; padding: 5px; color: grey; border-bottom: 1px solid grey;" >
		We found (<?=$result -> num_rows ();?>) results.
	</div>
	<div class="spacer"> &nbsp; </div>
	<?php foreach ($result -> result () as $results):?>
	    <div class="ui-grid-c" style="width: 100%; border-bottom: 1px solid grey; margin-bottom: 5px;">
	    	<div class="ui-block-a" style="width: 40%;">
	    		<a href="<?=base_url('mobile/view/'.$results->sess);?>">
	    			<img src="<?=base_url('images/'.$results->image);?>" width="96%" alt="<?=$results->name;?>"/> 
	    		</a>
	    	</div>
	    	<div class="ui-block-b" style="width: 58%; float: left;">
	    		<h6><a href="<?=base_url('mobile/view/'.$results->sess);?>"> <?=$results->name;?> </a></h6>
	    		<p style="font-size: 12px;">
	    			<i class="splashy-map"></i>: <?=$results->location;?> <br> <br>
	    			<i class="splashy-tag"></i>: <?=$results->item_price;?>
	    		</p>

	    	</div>
	    </div>
	  <?php endforeach; ?>


<?php else:?>
	<div style="position: relative; margin-top: 10px; text-align: center;">
		<h4> Oooops... We couldn't find any match for your search results. Try again </h4>
	</div>
 <form action="<?=base_url('mobile/search/');?>" method="get" />
 	<div data-role="fieldcontain">
    
        <fieldset data-role="controlgroup">
             <label for="searchinput1"></label>
                        
             <input name="s" id="searchinput1" placeholder="What are you looking for?" value="" type="search" />
        </fieldset>
    </div>
    
    <div class="ui-grid-a">
        <div class="ui-block-a">
            <div data-role="fieldcontain">
                <fieldset data-role="controlgroup">
                    <label for="textinput1"></label>
                         <input name="price" id="textinput1" placeholder="Price" value="" type="text" />
                </fieldset>
            </div>
    	</div>

    	<div class="ui-block-b">
            <div data-role="fieldcontain">
                <fieldset data-role="controlgroup">
                    <label for="textinput2"></label>
                        <input name="location" id="textinput2" placeholder="Location" value="" type="text" />
                 </fieldset>
            </div>
        </div>
    </div>
    
    <div class="ui-grid-b">
        <div class="ui-block-a"></div>
        
        <div class="ui-block-b">
            <button data-theme="b" data-icon="search" data-iconpos="left" data-mini="true" type="submit" />Search</button>
        </div>
        
        <div class="ui-block-c"> </div>
    
    </div>

</form>



<?php endif;?>