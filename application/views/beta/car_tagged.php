<div class="container">

    <div class="container-twelve well" style="max-height: 10px;  margin-top: 10px;">

        <ul class="nav sf-menu" style="margin-top: 10px; text-align: center;">

            <li> <a href="<?= base_url('cars?tag=bridal&extra=wedding+cars&search=true'); ?>" title="Bridal Cars"> Bridal Cars </a> </li>
            <li> <a href="<?= base_url('cars?tag=exotic&search=false'); ?>" title="Exotic Cars"> Exotic Cars </a> </li>
            <li> <a href="<?= base_url('cars?tag=leisure&search=false'); ?>" title="Leisure Cars"> Leisure Cars </a> </li>
            <li> <a href="<?= base_url('cars?tag=taxis&search=true'); ?>" title="Taxis and Cabs"> Taxis </a> </li>
            <li> <a href="<?= base_url('cars?tag=psv&search=false&extra=matatu'); ?>" title="Public Service Cars""> PSV </a> </li>
            <li> <a href="<?= base_url('cars?tag=heavy+movers&search=true&extra=pick-up'); ?>" title="Heavy Moving Machinery"> Heavy Movers </a> </li>

            <li class="pull-right" style="margin-left: 30px;">
                <form class="navbar-search pull-right form-inline">
                    <div class="input-append">
                        <input name="s" class="" id="appendedInput" type="text" placeholder="Quick Search" >
                        <span class="add-on"> <i class="splashy-zoom"></i> </span>
                    </div>
                </form>
            </li>

        </ul>

    </div>


    <div class="clear clearfix divider"> &nbsp; </div>

    <div class="container-sixteen">

        <div class="sixteen columns">

            <div class="four columns">
                <div class="well">
                    <h5> Filter By: </h5>
                </div>

                <div class="well">
                    <span style="color: grey; font-size: 11px; opacity: 0.3;"> Sponsored: </span>

                    <a href="<?= base_url($sponsored->slug . '?ref=search+featured&umt=Sponsored'); ?>">                        
                        <img class="thumbnail img-rounded" src="<?= base_url('images/' . $sponsored->image); ?>" alt="<?= $sponsored->name; ?>" />
                    </a>
                    <a href="<?= base_url($sponsored->slug . '?ref=search+featured&umt=Sponsored'); ?>"> 
                        <h4> <?= $sponsored->name; ?> </h4>
                    </a>

                    <p>
                        In: <?= $sponsored->location; ?> 
                        <br>
                        Price:<?php if($sponsored->item_price == ''):;?> Inquire <?php else:;?> <?= $sponsored->item_price.'.00/-'; ?> <?php endif;?>
                    </p>
                </div>
            </div>

            <div class="eleven columns">
                <h5>Vehicles Tagged Under <?=$_GET['tag'];?></h5>

                <?php
                if($search->num_rows () !== 0):
                foreach ($search->result() as $result):
                    $img = base_url('images/' . $result->image);
                    ?>
                    <div>
                        <div class="three columns">
                            <a href="<?= base_url($result->slug . '?ref=tag+results&search=false&key=' . $_GET['tag']); ?>" class="thumb-placeholder">
                                <img class="thumbnail img-rounded" src="<?= $img; ?>" alt="<?= $result->name; ?>" />
                            </a>                    
                        </div>

                        <div class="six columns">
                            <a href="<?= base_url($result->slug . '?ref=tag+results&search=false&key=' . $_GET['tag']); ?>"
                               <h4><?= $result->name; ?> </h4>
                            </a>
                            <p>
                                <?= word_limiter($result->desc, 6); ?>
                            </p>
                            <strong> In: <?= $result->location; ?> </strong> &nbsp;&nbsp;
                            <strong> Price:<?php if($result->item_price == ''):;?> Inquire <?php else:;?> <?= $result->item_price . '.00/-'; ?> <?php endif; ?></strong>
                            </a>
                        </div>

                    </div>
                    <hr style="opacity: 0.4;" />

                <?php endforeach; ?>
                <?php else: ;?>
                    
                    <p class="alert">
                        We could not find any vehicles under  "<?=$_GET['tag'];?>", try search above
                    </p>
                        
                 <?php   endif; ?>
            </div>

        </div>
    </div>
</div>