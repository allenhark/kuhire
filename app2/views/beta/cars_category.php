<div class="container">

    <div class="container-twelve well" style="max-height: 10px;  margin-top: 10px;">

        <ul class="nav sf-menu" style="margin-top: 10px; text-align: center;">

            <li> <a href="<?= base_url('cars/use/bridal'); ?>" title="Bridal Cars"> Bridal Cars </a> </li>
            <li> <a href="<?= base_url('cars/use/exotic'); ?>" title="Exotic Cars"> Exotic Cars </a> </li>
            <li> <a href="<?= base_url('cars/use/leisure'); ?>" title="Leisure Cars"> Leisure Cars </a> </li>
            <li class="btn"> <a href="<?= base_url('cars/use/taxis'); ?>" title="Taxis and Cabs"> Taxis </a> </li>
            <li> <a href="<?= base_url('cars/use/psv'); ?>" title="Public Service Cars""> PSV </a> </li>
            <li> <a href="<?= base_url('cars/use/movers'); ?>" title="Heavy Moving Machinery"> Heavy Movers </a> </li>

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

        <div class="align-center well" style="margin-top: 0px; text-align: center;">
            <form style="text-align: center;" action="<?=base_url('cars');?>">
                <input type="text" name="s" class="four columns" placeholder="Find <?=$title;?>" style="height: 35px; font-size: 18px; color: grey;" />
                <input type="text" name="location" class="three columns" placeholder="Within?" style="height: 35px; font-size: 18px; color: grey; margin-left: 0;" />
                <input type="text" name="price" class="three columns" placeholder="Average price?" style="height: 35px; font-size: 18px; color: grey; margin-left: 0;" />
                <input type="hidden" name="use" value="<?=$this->uri->segment(3);?>"
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
            
        </div>
        
    </div>
    
</div>
