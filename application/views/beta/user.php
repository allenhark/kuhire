<section id="content" class="container clearfix">

    <div class="container-sixteen well" style="min-height: 170px;"/>

    <?php
    $img = base_url('avator/' . $user->avator);
    ?>

    <div class="four columns">

        <img src="<?= $img; ?>" class="well well-small" alt="<?= $user->first_name . ' ' . $user->last_name; ?>" style="max-height: 150px; min-height: 150px; width: auto;"/>
        
    </div>
    
    <div class="one column"> &nbsp; </div>

    <div class="six columns">
        <h3> <?= $user->first_name . ' ' . $user->last_name; ?> Profile </h3>
        <strong> Bio: </strong>
        <p>
            <?=  word_limiter($user->bio, 30);?>
        </p>
        <p>
            <i class="iconic-icon-map-pin-stroke"></i> <?=$user->location;?> 
            <i class="icomoon-icon-flag"></i> <?=$user->country;?>
            <?php if($user->id_no !== '0' & $user->avator !== 'user-thumb.jpg'):?> <i class="minia-icon-checkmark-2"></i> Scrobber Verified <?php endif;?>
        </p>
    </div>

    <div class="four columns">
        
        <?php
            if($user->contacts_public == 1):
        ?>
        <h6> Contact Me </h6>
        <i class="icomoon-icon-phone"></i> <?=$user->phone;?>
        <br />
        <i class="icomoon-icon-mail"></i> <?=$user->email;?>
        <br />
        <?php if($user->facebook !== NULL):?><a href="http://facebook.com/<?=$user->facebook;?>" target="_blank"> <i class="icomoon-icon-facebook-4"></i> <?=$user->facebook;?> </a> <?php endif;?>
        <br />
        <?php if($user->twitter !== NULL):?><a href="https://twitter.com/<?=$user->twitter;?>" target="_blank"> <i class="icomoon-icon-twitter-3"></i> <?=$user->twitter;?> </a> <?php endif;?>
        <br />
        <?php if($user->skype !== NULL):?> <i class="icomoon-icon-skype"></i> <?=$user->skype;?> <?php endif;?>
      
        <?php else:?>
           
        <?php endif;?>        

    </div>

</div>
    
    <div class="container-sixteen align-center" >
        
        <?php
            foreach ($item->result () as $data):
                $fimg = base_url('images/'.$data->image);
         ?>
        <div class="three columns well align-left" style="max-height: 200px;">

                <a href="<?=base_url($data->slug.'?ref=cars+homepage&umt=main&search=null');?>">
         
                    <img class="thumbnail" alt="<?=$data->name;?>" src="<?=$fimg;?>" style="max-height: 120px;" />
                </a>
                <br>
                <?php  if($data->item_cat == 13):?>
                <a href="<?=base_url('houses/view/'.$data->slug.'?ref=cars+homepage&umt=main&search=null');?>">
                <?php else:;?>
                    <a href="<?=base_url($data->slug.'?ref=cars+homepage&umt=main&search=null');?>">
                <?php endif;?>
                    <h5> <?=$data->name;?> </h5>
                </a>
                
                <p>
                    In:<strong> <?=$data->location;?> </strong>
                    <br>
                    Price:<strong><?php if($data->item_price == ''):;?> Inquire <?php else:;?> <?=$data->item_price.'.00';?> /- <?php endif;?></strong>
                </p>
            </div>
        
        <?php endforeach;?>
        
    </div>

</section>