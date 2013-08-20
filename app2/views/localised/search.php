            <div id="content">
<div class="container">
    
     <div id="main">
        <div class="row">
            <div class="span9">
<?php
  
            if($this->uri->segment(2)):
        
        ?>
            <div class="alert alert-error">
                We couldn't find any <?=$_GET['keyword'];?> for hire. Try other keywords
            </div>
                
        <?php 
            else:
                ?>
   
                <h1 class="page-header">Showing results for <?=$_GET['s'];?></h1>

                <div class="properties-rows">
<div class="filter">
    <?php
                if(isset($_GET['location'])):
                    $loc= $_GET['location'];
                else:
                    $loc = NULL;
                endif;
        
        
    ?>
    <form action="<?=base_url('search?&location='.$loc.'&s='.$_GET['s'].'&');?>" method="get" class="form-horizontal">
        <div class="control-group " style="float: left;">
            <label class="control-label" for="inputSortBy">
                Sort by
                <span class="form-required" title="This field is required.">*</span>
            </label>
            <div class="controls">
                <select name="filter" id="inputSortBy">
                    <option id="price" name="price">Price</option>
                    <option id="published" name="published">Published</option>
                    <input type="hidden" name="s" value="<?=$_GET['s'];?>" />
                     <input type="hidden" name="location" value="<?=$loc;?>" />   
                </select>
            </div><!-- /.controls -->
        </div><!-- /.control-group -->

        <div class="control-group" style="float: left;">
            <label class="control-label" for="inputOrder">
                Order
                <span class="form-required" title="This field is required.">*</span>
            </label>
            <div class="controls">
                <select id="inputOrder" name="order">
                    <option id="asc" name="asc">ASC</option>
                    <option id="desc" name="desc">DESC</option>
                </select>
            </div><!-- /.controls -->
        </div><!-- /.control-group -->
        
        <div class="control-group" style="float: right;">
            <button type="submit" class="btn btn-info"> Filter </button>
        </div>
        
    </form>
</div><!-- /.filter -->
</div><!-- /.properties-rows -->                
<div class="properties-rows">
    <div class="row">
       
         <?php
        foreach ($rt->result() as $result):
            $img = base_url('images/thumbnails/' . $result->image);
            ?>
        <div class="property span9">
            <div class="row">
                <div class="image span3">
                    <div class="content">
                        <a href="<?= base_url($result->slug . '?ref=search+results&search=true&key=' . $_GET['s']); ?>"></a>
                        <img src="<?=$img;?>" alt="<?= $result->name; ?>">
                    </div><!-- /.content -->
                </div><!-- /.image -->

                <div class="body span6">
                    <div class="title-price row">
                        <div class="title span4">
                            <h2><a href="<?= base_url($result->slug . '?ref=search+results&search=true&key=' . $_GET['s']); ?>"><?= $result->name; ?></a></h2>
                        </div><!-- /.title -->

                        <div class="price">
                            <?php if ($result->item_price == ''):; ?> Inquire <?php else:; ?> <?= $result->item_price . '.00/-'; ?> <?php endif; ?>
                        </div><!-- /.price -->
                    </div><!-- /.title -->

                    <div class="location"><?=$result->location.', '.$result->region;?></div><!-- /.location -->
                    <p>
                        <?= word_limiter($result->desc, 16); ?>
                    </p>
                    <div class="area">
                        
                    </div><!-- /.area -->
                    
                </div><!-- /.body -->
            </div><!-- /.property -->
        </div><!-- /.row -->
        <?php endforeach; ?>
    </div><!-- /.row -->
</div><!-- /.properties-rows -->
                
<div class="pagination pagination-centered">
    <ul>
        <?= $this->pagination->create_links(); ?>
       
    </ul>
</div><!-- /.pagination -->            
          <?php endif;?>  
            </div>
            
            <div class="sidebar span3">
                
                 <div class="widget properties last">
                            <div class="title">
                                <h2>Latest Listings</h2>
                            </div><!-- /.title -->

                            <div class="content">
                               <?php foreach ($sidebar->result() as $side_data): ?>
                                    <div class="property">
                                        <div class="image">
                                            <a href="<?= base_url($side_data->slug . '?src=sidebar+latest'); ?>"></a>
                                            <img src="<?= base_url('images/thumbnails/' . $side_data->image); ?>" alt="<?= $side_data->name . ' for hire in ' . $side_data->region; ?>">
                                        </div><!-- /.image -->

                                        <div class="wrapper">
                                            <div class="title">
                                                <h3>
                                                    <a href="<?= base_url($side_data->slug . '?src=sidebar+latest'); ?>"><?= word_limiter($side_data->name, 3); ?></a>
                                                </h3>
                                            </div><!-- /.title -->
                                            <div class="location"><?= $side_data->location . ' ' . $side_data->region; ?></div><!-- /.location -->
                                            <div class="price"><?php if ($side_data->item_price): echo $side_data->item_price . ' /-';
            else: echo 'Enquire';
            endif; ?></div><!-- /.price -->
                                        </div><!-- /.wrapper -->
                                    </div><!-- /.property -->
                                <?php endforeach; ?>
                            </div><!-- /.content -->
                        </div><!-- /.properties -->

            </div>
        </div>
    </div>
</div>

    </div><!-- /#content -->
</div><!-- /#wrapper-inner -->