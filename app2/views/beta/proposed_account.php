<div class="container">
    
    <div class="span12">
        
        <div class="span2 well">
            <img src="<?=base_url('avator/'.$user->avator);?>" alt="<?=$user->first_name;?>" />
                <br />
            <a href="<?=base_url();?>" class="btn btn-mini btn-info"> Change</a>
            
        </div>
        
        <div class="span4">
            <h4> Welcome back <?=$user->first_name?> </h4>
            
            <ul class="nav nav-list">
                <li> <a href="<?=base_url('account/edit');?>"> Update Profile </a> </li>
                <li> <a href="<?=base_url('account/security');?>"> Change Password</a> </li>
                
            </ul>
        </div>
        
        <div class="span4">
            <a class="btn" href="<?=base_url('logout');?>"> Logout </a>
            <br />
            You have <?=$this->user->get_unread_mail()->num_rows ();?> unread messages
        </div>
        
    </div>
    
    
</div>
