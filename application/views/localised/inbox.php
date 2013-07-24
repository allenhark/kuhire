    <div id="content">
        <div class="container">
            <div class="properties-rows">
                
                <div id="main">        
                    <div class="row">
                        <h1 class="page-header">Inbox</h1>
                        <?php foreach($this->user ->get_mail() -> result () as $data):?>
                        <div class="property span9">
                            
                            <h4><a href="<?=base_url('account/inbox/?rand='.$data->nb_id.'&token'.  random_string('alnum', 32));?>"> <?=$data->nb_sender_name;?> </a> </h4>
                            
                        </div>
                        <?php endforeach;?>

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
                                                                                        endif; ?>
                                                                                    </div><!-- /.price -->
                                            </div><!-- /.wrapper -->
                                        </div><!-- /.property -->
                                    <?php endforeach; ?>
                                </div><!-- /.content -->
                            </div><!-- /.properties -->

                        </div>


                    </div>

                </div>
                
            </div>
            
        </div>
        
    </div>
</div>
</div>