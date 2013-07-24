<div class="container">
    
    <div class="row">
        
        <div class="span12" style="text-align: center;">
            
            <div>
                <h3> Welcome to Scrobber <?=$fb_user['first_name'];?> </h3>
                
                <div class="span3">
                    <img src="https://graph.facebook.com/<?=$fb_user['id'];?>/picture?type=normal" height="80px"/> </a><div><?=$fb_user['name'];?></div>
                </div>
                
                <div class="span3">
                    <a href="<?=base_url('facebook/me/?connect=true');?>" class="btn btn-info btn-block btn-large"><i class="icon-arrow-left icon-white"></i> Connect <i class="icon-arrow-right icon-white"></i></a>
            </div>
                
                <div class="span3">
                    <img src="<?=base_url('static/images/logo.png');?>" alt="Scrobber" />
                </div>
                
            </div>
            
            <hr style="opacity: 0.01"/>
            
            <div class="span2">
            </div>
            
        </div>        
        
    </div>
        
</div>
