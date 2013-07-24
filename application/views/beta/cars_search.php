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
                        <input name="s" class="" id="appendedInput" type="text" placeholder="Quick Search" value="<?= $_GET['s']; ?>">
                        <span class="add-on"> <i class="splashy-zoom"></i> </span>
                    </div>
                </form>
            </li>

        </ul>

    </div>


    <div class="clear clearfix divider"> &nbsp; </div>

    <div class="container-sixteen">
        <?php
        if (isset($_GET['location'])):
            $location = $_GET['location'];
        else:
            $location = null;
        endif;

        if (isset($_GET['price'])):
            $price = $_GET['price'];
        else:
            $price = null;
        endif;
        ?>

        <div class="align-center well" style="margin-top: 0px; text-align: center;">
            <form style="text-align: center;">
                <input type="text" name="s" class="four columns" placeholder="What are you looking for?" style="height: 35px; font-size: 18px; color: grey;" value="<?= $_GET['s']; ?>"/>
                <input type="text" name="location" class="three columns" placeholder="Within?" style="height: 35px; font-size: 18px; color: grey; margin-left: 0;" value="<?= $location; ?>">
                <input type="text" name="price" class="three columns" placeholder="Average price?" style="height: 35px; font-size: 18px; color: grey; margin-left: 0;" value="<?= $price; ?>" >
                <select name="category" class="three columns" style="height: 35px; font-size: 18px; color: grey; margin-left: 0; margin-top: 5px;">
                    <option style="height: 35px; font-size: inherit; color: grey;" > Select Category </option>
                    <?php foreach ($cats->result() as $category): ?>
                        <option value="<?= $category->sub_cat_slug; ?>"> <?= $category->sub_cat_name; ?> </option>
                    <?php endforeach; ?>
                </select>

                <button class="btn btn-large" type="submit"><i class="splashy-zoom"></i> Search </button>
            </form>

        </div>

        <div class="sixteen columns">

            <div class="four columns">
                <div class="well">
                    <h5> Filter By: </h5>
                </div>
                
                <div class="well">
                    <span style="color: grey; font-size: 11px; opacity: 0.3;"> Sponsored: </span>
                    
                    <a href="<?=base_url($sponsored->slug.'?ref=search+featured&umt=Sponsored');?>">                        
                       <img class="thumbnail img-rounded" src="<?=base_url('images/'.$sponsored->image);?>" alt="<?=$sponsored->name;?>" />
                    </a>
                    <a href="<?=base_url($sponsored->slug.'?ref=search+featured&umt=Sponsored');?>"> 
                        <h4> <?=$sponsored->name;?> </h4>
                    </a>
                    
                    <p>
                        In: <?=$sponsored->location;?> 
                        <br>
                        Price: <?=$sponsored->item_price;?>
                    </p>
                </div>
            </div>

            <div class="eleven columns">
                <h5>We found <?= $search->num_rows(); ?> for (<?= $_GET['s']; ?>) </h5>

                <?php
                    foreach ($search->result() as $result):
                        $img = base_url('images/'.$result->image);
                ?>
                <div>
                    <div class="three columns">
                        <a href="<?=base_url($result->slug.'?ref=search+results&search=true&key='.$_GET['s']);?>" class="thumb-placeholder">
                            <img class="thumbnail img-rounded" src="<?=$img;?>" alt="<?=$result->name;?>" />
                        </a>                    
                    </div>
                    
                    <div class="six columns">
                        <a href="<?=base_url($result->slug.'?ref=search+results&search=true&key='.$_GET['s']);?>"
                            <h4><?=$result->name;?> </h4>
                        </a>
                            <p>
                                <?=word_limiter($result->desc, 6);?>
                            </p>
                            <strong> In: <?=$result->location;?> </strong> &nbsp;&nbsp;
                            <strong> Price: <?=$result->item_price.'.00/-';?> </strong>
                        </a>
                    </div>
                    
                </div>
                <hr style="opacity: 0.4;" />

                <?php endforeach;?>
            </div>

        </div>

    </div>

</div>