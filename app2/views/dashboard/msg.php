<!-- main content -->
            <div id="contentwrapper">
                <div class="main_content">                    
                    <div class="row-fluid">
                        <div class="span12">
                            <div class="mbox">
                                <div class="tabbable">
                                    <div class="heading">
                                        <ul class="nav nav-tabs">
                                            <li><a href="#mbox_new" data-toggle="tab"><i class="splashy-document_letter_edit"></i> New message</a></li>
                                            <li class="active"><a href="#mbox_inbox" data-toggle="tab"><i class="splashy-mail_light_down"></i>  Inbox</a></li>
                                            <li><a href="#mbox_outbox" data-toggle="tab"><i class="splashy-mail_light_up"></i> Outbox</a></li>
                                            <li><a href="#mbox_trash" data-toggle="tab"><i class="icon-adt_trash"></i> Trash</a></li>
                                        </ul>
                                    </div>
                                    <div class="tab-content">
                                        <div class="tab-pane" id="mbox_new">
                                            <form id="new_message_form">
                                                <div class="sepH_b">
                                                    <label for="mail_sender">Recipient</label>
                                                    <input type="text" name="reciever" placeholder="Reciever email address">
                                                    <span class="help-block">Whom are you sending this messege to? <a href="http://blog.scrobber.com/?s=sending messages" target="blank"><i class="splashy-help"></i> Help</a></span>
                                                </div>
                                                
                                                <div class="sepH_b">
                                                    <label for="mail_subject">Subject</label>
                                                    <input type="text" class="span6" id="mail_subject" placeholder="subject" name="subject">
                                                </div>
                                                
                                                <div class="formSep">
                                                    <label for="mail_message">Message</label>
                                                    <textarea class="span12 auto_expand" rows="12" cols="10" id="mail_message" name="message"></textarea>
                                                </div>
                                                
                                                <div>
                                                    <button class="btn btn-gebo" type="submit">Send message</button>
                                                </div>
                                            </form>
                                        </div>
                                        <div class="tab-pane active" id="mbox_inbox">
                                            <table data-msg_rowlink="a" class="table table_vam mbox_table dTableR" id="dt_inbox">
                                                <thead>
                                                    <tr>
                                                        <th class="table_checkbox"><input type="checkbox" data-tableid="dt_inbox" class="select_msgs" name="select_msgs"></th>
                                                        <th><i class="splashy-star_empty"></i></th>
                                                        <th><i class="splashy-mail_light"></i></th>
                                                        <th>Subject</th>
                                                        <th>Sender</th>
                                                        <th>Date</th>
                                                        
                                                        <th><i class="icon-adt_atach"></i></th>
                                                    </tr>
                                                </thead>
                                                <tbody>
         <?php if ($query->num_rows() > 0): ?>
        
        <?php foreach ($query->result() as $row): ?>
        <?php if ($row->status == '1'):
        $this->db->where ('user_id', $row->sender_id);

        $udata = $this->db->get('user');
        foreach ($udata->result() as $urow):
?>
        
                                                    <tr class="unread">
                                                        <td class="nohref"><input type="checkbox" class="select_msg" name="msg_sel"></td>
                                                        <td class="nohref starSelect"><i class="splashy-star_empty"></i></td>
                                                        <td><i class="splashy-mail_light"></i></td>
                                                        <td><?= anchor('dashboard/mail/view/' . $row -> msg_id, $row -> msg_subject); ?></td>
                                                        <td><span><?= $urow -> first_name . '&nbsp;' . $urow -> last_name; ?></span></td>
                                                        <td><?= $row -> msg_time; ?></td>
                                                        
                                                    </tr>
        <?php endforeach; elseif ($row->status == '2'):
														$this->db->where ('user_id', $row->sender_id);

														$udata = $this->db->get('user');
														foreach ($udata->result() as $urow):
        ?>
                                                    <tr>
                                                        <td class="nohref"><input type="checkbox" class="select_msg" name="msg_sel"></td>
                                                        <td class="nohref starSelect"><i class="splashy-star_empty"></i></td>
                                                        <td><i class="splashy-mail_light_stuffed"></i></td>
                                                        <td><?= anchor('dashboard/mail/view/' . $row -> msg_id, $row -> msg_subject); ?></td>
                                                        <td><span><?= $urow -> first_name . '&nbsp;' . $urow -> last_name; ?></span></td>
                                                        <td><?= $row -> msg_time; ?></td>
                                                        
                                                        <td></td>
                                                    </tr>
        <?php endforeach; endif; ?>
    <?php endforeach; ?>
<?php elseif ($query->num_rows() < 0): ?>
    <p>You have no New Or saved Messeges </p>
    <?php endif; ?>
                                                </tbody>
                                            </table>    
                                        </div>
                                
                                        <div class="tab-pane" id="mbox_outbox">
                                            <table data-msg_rowlink="a" class="table table_vam mbox_table dTableR" id="dt_outbox">
                                                <thead>
                                                    <tr>
                                                        <th class="table_checkbox"><input type="checkbox" data-tableid="dt_outbox" class="select_msgs" name="select_msgs"></th>
                                                        <th><i class="splashy-star_empty"></i></th>
                                                        <th><i class="splashy-mail_light_down"></i></th>
                                                        <th>Subject</th>
                                                        <th>Recipient</th>
                                                        <th>Date</th>
                                                        <th><i class="icon-adt_atach"></i></th>
                                                    </tr>
                                                </thead>
                                               <tbody>
<?php 
$this->db->where ('sender_id',$this->session->userdata('user_id'));

$query = $this->db->get('msg_server');
if ($query->num_rows() > 0): ?>
        
        <?php foreach ($query->result() as $row): ?>

        <?php if ($row->status == '3'):
        $this->db->where ('user_id', $row->reciever_id);

        $udata = $this->db->get('user');
        foreach ($udata->result() as $urow):

        ?>
                                                    <tr class="unread">
                                                        <td class="nohref"><input type="checkbox" class="select_msg" name="msg_sel"></td>
                                                        <td class="nohref starSelect"><i class="splashy-star_empty mbox_star"></i></td>
                                                        <td><i class="splashy-mail_light_up"></i></td>
                                                        <td><?= anchor('dashboard/mail/view/' . $row -> msg_id, $row -> msg_subject); ?></td>
                                                        <td><span><?= $urow -> first_name . '&nbsp;' . $urow -> last_name; ?></span></td>
                                                        <td><?= $row -> msg_time; ?></td>
                                                        
                                                    </tr>
    
        <?php endforeach; endif; ?>
    <?php endforeach; ?>
<?php elseif ($query->num_rows() < 0): ?>
    <td>You have not sent any messages. </t>>
    <?php endif; ?>


                                                </tbody>
                                            </table>
                                        </div>
                                        
                                        <div class="tab-pane" id="mbox_trash">
                                            <table data-msg_rowlink="a" class="table table_vam mbox_table dTableR" id="dt_trash">
                                                <thead>
                                                    <tr>
                                                        <th class="table_checkbox"><input type="checkbox" data-tableid="dt_trash" class="select_msgs" name="select_msgs"></th>
                                                        <th><i class="splashy-star_empty"></i></th>
                                                        <th><i class="splashy-mail_light"></i></th>
                                                        <th>Subject</th>
                                                        <th>Sender</th>
                                                        <th>Date</th>
                                                        
                                                        <th><i class="icon-adt_atach"></i></th>
                                                    </tr>
                                                </thead>
                                                <tbody>

<?php 
$this->db->where ('sender_id' ,$this->session->userdata('user_id'));

$query = $this->db->get('msg_server');
if ($query->num_rows() > 0): ?>
        
        <?php foreach ($query->result() as $row): ?>

        <?php if ($row->status == '6'):
        $this->db->where ('user_id', $row->sender_id);

        $udata = $this->db->get('user');
        foreach ($udata->result() as $urow):

        ?>
                                                    <tr>
                                                        <td class="nohref"><input type="checkbox" class="select_msg" name="msg_sel"></td>
                                                        <td class="nohref starSelect"><i class="splashy-star_empty mbox_star"></i></td>
                                                        <td><i class="splashy-mail_light_down"></i></td>
                                                        <td><?= anchor('dashboard/mail/view/' . $row -> msg_id, $row -> msg_subject); ?></td>
                                                        <td><span><?= $urow -> first_name . '&nbsp;' . $urow -> last_name; ?></span></td>
                                                        <td><?= $row -> msg_time; ?></td>
                                                        
                                                    </tr>
    
        <?php endforeach; endif; ?>
    <?php endforeach; ?>
<?php elseif ($query->num_rows() < 0): ?>
    <p>Amazing your outbox is empty </p>
    <?php endif; ?>


<?php 
$this->db->where ('sender_id' , $this -> session -> userdata('user_id'));

$query = $this->db->get('msg_server');
if ($query->num_rows() > 0): ?>
        
        <?php foreach ($query->result() as $row): ?>

        <?php if ($row->status == '4'):
        $this->db->where ('user_id', $row->reciever_id);

        $udata = $this->db->get('user');
        foreach ($udata->result() as $urow):

        ?>
                                                    <tr>
                                                        <td class="nohref"><input type="checkbox" class="select_msg" name="msg_sel"></td>
                                                        <td class="nohref starSelect"><i class="splashy-star_empty mbox_star"></i></td>
                                                        <td><i class="splashy-mail_light_up"></i></td>
                                                        <td><?= anchor('dashboard/mail/view/' . $row -> msg_id, $row -> msg_subject); ?></td>
                                                        <td><span><?= $urow -> first_name . '&nbsp;' . $urow -> last_name; ?></span></td>
                                                        <td><?= $row -> msg_time; ?></td>
                                                        
                                                    </tr>
    
        <?php endforeach; endif; ?>
    <?php endforeach; ?>
<?php elseif ($query->num_rows() < 0): ?>
    <p>You have not deleted any messages. </p>
    <?php endif; ?>

                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                        </div>
                    </div>
                    
                    <!-- hide elements -->
                    <div class="hide">
                        <!-- actions for inbox -->
                        <div class="dt_inbox_actions">
                            <div class="btn-group">
                                <a href="javascript:void(0)" class="btn" title="Answer"><i class="icon-pencil"></i></a>
                                <a href="javascript:void(0)" class="btn" title="Forward"><i class="icon-share-alt"></i></a>
                                <a href="#" class="delete_msg btn" title="Delete" data-tableid="dt_inbox"><i class="icon-trash"></i></a>
                            </div>
                        </div>
                        <!-- actions for outbox -->
                        <div class="dt_outbox_actions">
                            <div class="btn-group">
                                <a href="javascript:void(0)" class="btn" title="Resend"><i class="icon-share-alt"></i></a>
                                <a href="#" class="delete_msg btn" title="Delete" data-tableid="dt_outbox"><i class="icon-trash"></i></a>
                            </div>
                        </div>
                        <!-- actions for trash -->
                        <div class="dt_trash_actions">
                            <div class="btn-group">
                                <a href="#" class="delete_msg btn" title="Delete permamently" data-tableid="dt_trash"><i class="icon-trash"></i></a>
                            </div>
                        </div>
                        <!-- confirmation box -->
                        <div id="confirm_dialog" class="cbox_content">
                            <div class="sepH_c tac"><strong>Are you sure you want to delete this message(s)?</strong></div>
                            <div class="tac">
                                <a href="#" class="btn btn-gebo confirm_yes">Yes</a>
                                <a href="#" class="btn confirm_no">No</a>
                            </div>
                        </div>
                    </div>
                        
                </div>
            </div>