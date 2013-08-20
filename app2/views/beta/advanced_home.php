<div class="container">
    
        <div class="row">
        
         <?=$this->data->front_page_ad ();?>
            
        </div>
    
    <!-- Vehicles Category -->
    <div class="row"> 
        <div class="twelve columns" style="margin-top: 10px;">



            
                <h4> Vehicles</h4>

                <?php
				$id = 1;
                $data = $this->data->get_sub_cats($id);
                foreach ($data->result() as $subs):
				
			//	{'one':[{'one':'1'},{'onee':'1'}], 'two':[{'one':'1'},{'onee':'1'}]}
                    ?>
                    <a href="<?= base_url('category/vehicles/' . $subs->sub_cat_slug); ?>"> <?= $subs->sub_cat_name; ?></a> &nbsp; &bull;
                <?php endforeach; ?>
                <a href="<?= base_url('category/vehicles'); ?>"> More >></a>

           

        </div>

    </div>

    <hr />

    <div class="row">

        <div class="span12">

            <div class="span5" style="border-right: solid #15aece thin">
                <h4> Tools, Equipments & Electronics</h4>
                <?php
                $dt = $this->data->tools();

                foreach ($dt->result() as $sub):
                    ?>            
                    <a href="<?= base_url('category/tools-equipments-electronics/' . $sub->sub_cat_slug); ?>"> <?= $sub->sub_cat_name; ?></a> &nbsp; &bull;

                <?php endforeach; ?>

                <a href="<?= base_url('category/tools-equipments-electronics'); ?>"> More >></a>

            </div>

            <div class="span5">
                <h4> Events and Parties</h4>
                <?php
                $dt = $this->data->events();

                foreach ($dt->result() as $suba):
                    ?>            
                    <a href="<?= base_url('category/tools-equipments-electronics/' . $suba->sub_cat_slug); ?>"> <?= $suba->sub_cat_name; ?></a> &nbsp; &bull;

<?php endforeach; ?>

                <a href="<?= base_url('category/events-parties'); ?>"> More >></a>

            </div>

        </div>

    </div>
    
    <hr />
    
      <div class="row"> 
        <div class="twelve columns" style="margin-top: 10px;">

            <div class="five columns" style="border-right: solid #15aece thin">
                <?php
                $id = 1;
                $d = $this->data->home_main_category($id);
                // echo $d->image;
                ?>

                <div>
                    <a href="<?= base_url($d->slug); ?>" title="Hire <?= $d->name; ?>">

                        <img src="<?= base_url('images/' . $d->image); ?>" alt="<?= $d->name; ?>" />

                        <br />

                        <h4> <?= $d->name; ?> </h4>

                    </a>
                    Location: <?= $d->location; ?>
                </div>

            </div>

            <div class="span6">
                <h4> Vehicles</h4>

                <?php
                $data = $this->data->get_sub_cats($id);
                foreach ($data->result() as $subs):
                    ?>
                    <a href="<?= base_url('category/vehicles/' . $subs->sub_cat_slug); ?>"> <?= $subs->sub_cat_name; ?></a> &nbsp; &bull;
                <?php endforeach; ?>
                <a href="<?= base_url('category/vehicles'); ?>"> More >></a>

            </div>

        </div>

    </div>
    
    <hr />
        <div class="row">

        <div class="span12">

            <div class="span5" style="border-right: solid #15aece thin">
                <h4> Tools, Equipments & Electronics</h4>
                <?php
                $dt = $this->data->tools();

                foreach ($dt->result() as $sub):
                    ?>            
                    <a href="<?= base_url('category/tools-equipments-electronics/' . $sub->sub_cat_slug); ?>"> <?= $sub->sub_cat_name; ?></a> &nbsp; &bull;

                <?php endforeach; ?>

                <a href="<?= base_url('tools-equipments-electronics'); ?>"> More >></a>

            </div>

            <div class="span5">
                <h4> Events and Parties</h4>
                <?php
                $dt = $this->data->events();

                foreach ($dt->result() as $suba):
                    ?>            
                    <a href="<?= base_url('tools-equipments-electronics/' . $suba->sub_cat_slug); ?>"> <?= $suba->sub_cat_name; ?></a> &nbsp; &bull;

<?php endforeach; ?>

                <a href="<?= base_url('events-parties'); ?>"> More >></a>

            </div>

        </div>

    </div>
    
    <hr />


</div>