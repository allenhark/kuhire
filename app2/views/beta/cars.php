<div class="container">

    <div class="container-twelve well" style="max-height: 10px;  margin-top: 10px;">

        <ul class="nav sf-menu" style="margin-top: 10px; text-align: center;">
            
            <li> <a href="<?=base_url('cars?tag=bridal&extra=wedding+cars&search=true');?>" title="Bridal Cars"> Bridal Cars </a> </li>
            <li> <a href="<?=base_url('cars?tag=exotic&search=false');?>" title="Exotic Cars"> Exotic Cars </a> </li>
            <li> <a href="<?=base_url('cars?tag=leisure&search=false');?>" title="Leisure Cars"> Leisure Cars </a> </li>
            <li> <a href="<?=base_url('cars?tag=taxis&search=true');?>" title="Taxis and Cabs"> Taxis </a> </li>
            <li> <a href="<?=base_url('cars?tag=psv&search=false&extra=matatu');?>" title="Public Service Cars""> PSV </a> </li>
            <li> <a href="<?=base_url('cars?tag=heavy+movers&search=true&extra=pick-up');?>" title="Heavy Moving Machinery"> Heavy Movers </a> </li>
                       
            <li class="pull-right" style="margin-left: 30px;"> 
                <form class="navbar-search pull-right form-inline">
                    <div class="input-append">
                        <input name="s" class="" id="appendedInput" type="text" placeholder="Quick Search">
                        <span class="add-on"> <i class="splashy-zoom"></i> </span>
                    </div>
                </form>
            </li>   
            
        </ul>

    </div>


    <div class="clear clearfix divider"> &nbsp; </div>

    <div class="container-sixteen" id="slider" style="background-image:url(<?=base_url('static/golf_bg.jpg');?>); background-repeat: no-repeat;  min-height: 230px; width: 100%; background-size:100%;">
         <div class="clear clearfix divider"> &nbsp; </div>
        <div class="align-center insertshadow" style="margin-top: 80px; text-align: center;">
            <form style="text-align: center;" auto-complete="off">
                <input type="text" name="s" class="five columns" placeholder="What are you looking for?" style="height: 35px; font-size: 18px; color: grey;" />
                 <input type="text" name="location" class="three columns" placeholder="Within?" style="height: 35px; font-size: 18px; color: grey; margin-left: 0;">  
                  <input type="text" name="price" class="three columns" placeholder="Average price?" style="height: 35px; font-size: 18px; color: grey; margin-left: 0;" >
                  <select name="category" class="four columns" style="height: 35px; font-size: 18px; color: grey; margin-left: 0; margin-top: 5px;">
                      <option style="height: 35px; font-size: inherit; color: grey;" > Select Category </option>
                      <?php foreach ($cats->result () as $category):?>
                        <option value="<?=$category->sub_cat_slug;?>"> <?=$category->sub_cat_name;?> </option>
                        <?php endforeach;?>
                  </select>
                  
                  <div class="divider"> </div>
                  <br>
                  <hr style="opacity: 0.001;">
                  
                  <button class="btn btn-large btn-info" type="submit"> Search </button>
            </form>
            
        </div>

    </div>
    
    <div style="text-align: center; min-height: 30px; margin-top: 5px;" class="container-twelve">
        <div class="four columns"> &nbsp; </div>
        
        <div class="four columns">
            <a href="<?=base_url('add?type=vehicle');?>" class="btn btn-block btn-warning btn-large btn-big-block"> Add My Car </a>
        </div>
        
    </div>
    
    <div class="divider clear"> </div>
    
    <div class="container-sixteen">
        <h4> Recently Added: </h4>
        <div class="sixteen columns">
            <?php
            foreach ($recent->result () as $latest):
                $img = base_url('images/'.$latest->image);

            ?>
            <div class="three columns well" style="max-height: 220px;">
                <a href="<?=base_url($latest->slug.'?ref=cars+homepage&umt=main&search=null');?>">
                    <img class="thumbnail" alt="<?=$latest->name;?>" src="<?=$img;?>" />
                </a>
                <br>
                <a href="<?=base_url($latest->slug.'?ref=cars+homepage&umt=main&search=null');?>">
                    <h5> <?=$latest->name;?> </h5>
                </a>
                
                <p>
                    In:<strong> <?=$latest->location;?> </strong>
                    <br>
                    Price:<strong><?php if($latest->item_price == ''):;?> Inquire <?php else:;?> <?=$latest->item_price.'.00';?> /- <?php endif;?> </strong>
                </p>
            </div>

            <?php endforeach;?>
        </div>
        
           
    </div>
    
    <div class="clear clearfix divider" style="margin-top: 20px;"> &nbsp; </div>
    
</div>