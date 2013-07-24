<div class="container">
    <?php if(!$this->session->userdata('logged_in')):?>
    <div class="alert-success">
        Discover a new way of Social Renting and Hiring
        <a href="<?= $this->fb_ignited->fb_login_url(); ?>"><img src="<?=  base_url('static/fb_login.png');?>" style="max-height: 30px" /> </a>
    </div>
    <div class="divider"> &nbsp; </div>
    <?php endif;?>
    <div class="row">
        
         <?=$this->data->front_page_ad ();?>
            
        </div>
    
        
        <div class="usp-bar">
            
            <div class="span3">
                <div class="span1">
                    <img src="<?=base_url('static/search.png');?>" style="height: 40px; width: auto;"/>
                </div>
                <div class="span2" style="margin-top: -50px; margin-left: 100px;">
                    <strong> Search It </strong> <br />
                    Search through thousands of hire listings
                </div>
                
            </div>
            
            <div class="span3">
                <div class="span1">
                    <img src="<?=base_url('static/listings.png');?>"style="height: 40px; width: auto;" />
                </div>
                <div class="span2" style="margin-top: -50px; margin-left: 100px;">
                    <strong> Find it </strong>  <br />
                    Find your best match
                </div>
                
            </div>
            
            <div class="span3">
                <div class="span1">
                    <img src="<?=base_url('static/key.png');?>" style="height: 40px; width: auto;" />
                </div>
                <div class="span2" style="margin-top: -50px; margin-left: 100px;">
                    <strong> Hire It </strong>
                    <br />
                    Contact the item owner
                </div>
                
            </div>
            <hr style="opacity: 0.01" />
            <h3 style="text-align: center;"> Scrobber; A new way to hire</h3>
        </div>
        
        <div class="span12">
            
        <?php foreach ($categories -> result () as $data):?>
            <div class="span3 well">

                <div class="header block "> <h4><a href="<?=base_url('category/'.$data->cat_slug);?>" title="<?=$data->cat_name;?>" ><img src="<?= base_url('static/icons/map/' . $data->cat_icon); ?>" /> <?=$data->cat_name;?> </a></h4> </div>
                <hr />
                <?php 
                $sub = $data->cat_id;
                foreach ($this->data-> get_sub_cat ($sub)-> result () as $dsub):
                
                ?>
                <a href="<?=base_url('category/'.$data->cat_slug.'/'.$dsub->sub_cat_slug);?>"> <?=$dsub->sub_cat_name;?> </a> &nbsp; 
                    
               <?php endforeach;?>

               
            </div>
            
            <?php endforeach;?>
        
        </div>
        
    </div>
</div>