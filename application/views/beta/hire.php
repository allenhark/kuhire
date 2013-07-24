<div id="pageinfo">

    <div class="container container-twelve ">
        <?php
        //Item properties build up.
        foreach ($query->result() as $row):
            $img = base_url('images/' . $row->image);
            //Pricing Valiation
            if ($row->price_diff == 1):
                $valiation = 'Day';
            elseif ($row->price_diff == 2):
                $valiation = 'Week';
            elseif ($row->price_diff == 3):
                $valiation = 'Month';
            elseif ($row->price_diff == 4):
                $valiation = 'Hour';
            endif;

            $mysql = $row->pub_time;
            $unix = mysql_to_unix($mysql);

            //Item owner build up

            $this->db->where('user_id', $row->item_owner);
            $userd = $this->db->get('user');
            foreach ($userd->result() as $user):
                ?>
                <div class="pagetitle seven columns">
                    <h1><?= $row->name; ?></h2>
                </div>

                <div class="pagesnav five columns align-center">
                    <div class="breadcrumbs" style="font-size: 16px; font-weight: 10px">
                        <b> 
                            <i class="wpzoom-tag"></i> <?=$row->item_price.'.00/- Per '.$valiation;?> 
                            &nbsp;&nbsp;
                            <i class="wpzoom-location"></i> <?= $row->location; ?> 
                         </b>

                    </div>
                </div>

                <div class="clear"></div>

            </div>

        </div>

        <div id="content" class="container container-sixteen">

            <div class="three columns well">
                <img src="<?=$img;?>" alt="<?=$row->name;?>" />
                <br/>
                <i class="wpzoom-location"></i>
                <?=$row->location;?>
                <br />
                 <i class="wpzoom-tag"></i>
                <?=$row->item_price.'.00/- Per '.$valiation;?>
                
            </div>
            
            <div class="five columns" />
            
        </div>






        </div><!-- //content -->

<?php endforeach; endforeach; ?>
