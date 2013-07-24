

<!-- CONTENT -->
<div id="content">
    <div class="container">

        <div id="main">
            <h2 class="page-header">  Welcome Back <?= $user->first_name; ?> </h2>
            
            <?php if(isset($_GET['error'])):?>
            
            <h5 class="alert alert-error"> <?=$_GET['error'];?> </h5>
            <?php endif;?>
            
            <?php if(isset($_GET['success'])):?>
            
            <h5 class="alert alert-success"> <?=$_GET['success'];?> </h5>
            <?php endif;?>
            <div class="row-fluid">

                <div class="span3">
                    <img class="img-polaroid" src="<?= base_url('avator/' . $user->avator); ?>" alt="<?= $user->first_name; ?> profile picture" />
                    <br />
                    
                    <a href="<?=base_url('account/sync-fb');?>" class="btn btn-info btn-large"> Sync pic with Facebook</a>

                </div>
                
                <div class="span5" />
                
                <h3> Scrobber Mail </h3>
                
                <strong> Inbox </strong>
                
                <div>
                    <?php if($this->user ->get_unread_mail()->num_rows !== 0):?>
                    
                    <?php foreach($this->user ->get_unread_mail() -> result () as $data):?>
                    
                    
                        
                        
                        <a href="#inbox-modal-<?=$data->nb_id;?>" data-toggle="modal"> <?=$data->nb_subject;?> </a> from <?=$data->nb_sender_name;?>
                        <hr />
                        <div id="inbox-modal-<?=$data->nb_id;?>" style="margin-top: 200px;" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                            <div class="modal-header">
                              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                              <h3 id="myModalLabel"><?=$data->nb_subject;?></h3>
                              <span> From: <?=$data->nb_sender_name;?></span> <br />
                              <span> Phone: <?=$data->nb_sender_phone;?> </span> <br />
                              <span> Email: <?=$data->nb__sender_email;?> </span>
                            </div>
                            <div class="modal-body">
                              <?=$data->nb_msg;?>
                            </div>
                            <div class="modal-footer">
                              <button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
                              <a href="<?=base_url('account/mark-as-read?inbox&id='.$data->nb_id);?>" class="btn btn-primary">Mark as Read</a>
                            </div>
                          </div>
                        <?php endforeach; unset($data); ?>
                        
                        <?php else:?>
                        
                            <div class="alert alert-success"> Hurray! No new unread Mail </div>
                        
                        <?php endif; ?>
                        
                    
                </div>
                
                <strong> System Inbox </strong>
                <div>
                    
                    <?php if($this->user ->get_unread_system_mail() -> num_rows !== 0):?>
                    <?php foreach($this->user ->get_unread_system_mail() -> result () as $data):?>
                        <a  href="#sysmail-<?=$data->msg_id;?>" data-toggle="modal"> <?=$data->subject;?> </a>
                        <hr />
                        
                        <div id="sysmail-<?=$data->msg_id;?>" style="margin-top: 200px;" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                            <div class="modal-header">
                              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                              <h3 id="myModalLabel"><?=$data->subject;?></h3>
                              <span> By <?=$data->sender;?></span>
                            </div>
                            <div class="modal-body">
                              <?=$data->message;?>
                            </div>
                            <div class="modal-footer">
                              <button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
                              <a href="<?=base_url('account/mark-as-read?sys&id='.$data->msg_id);?>" class="btn btn-primary">Mark as Read</a>
                            </div>
                          </div>
                        
                    <?php endforeach; unset($data); ?>
                        
                         <?php else:?>
                        
                            <div class="alert alert-success"> Hurray! No new unread Mail </div>
                        
                        <?php endif; ?>
                </div>
                </div>
                
                <div class="span4">
                    
                    <h3> Account Settings</h3>
                    
                    <a class="btn btn-block btn-info" href="#account" data-toggle="modal"> Change my account settings</a>
                    
                        <div id="account" style="margin-top: 200px;" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                            <div class="modal-header">
                              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                              <h3 id="myModalLabel">Account settings</h3>
                              <span> Edit my account settings</span> <br>
                              <span ><a href="<?=base_url('facebook?sync=true');?>" class="btn btn-primary btn-block"> Sync From Facebook</a></span>
                            </div>
                            <form action="<?=base_url('account/update-settings');?>" />
                            <div class="modal-body">
                              
                            </div>
                            <div class="modal-footer">
                              <button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
                              <!-- button type="sumit" class="btn btn-primary">Update Info</button -->
                            </div>
                        </form>
                          </div>
                    
                </div>

            </div>

        </div>

    </div>

</div>

</div>
