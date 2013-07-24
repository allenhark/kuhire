            <div id="contentwrapper">
                <div class="main_content">                    
                    <div class="row-fluid">

<div id="msg_view" class="tab-pane">
    <?php foreach ($query->result() as $row): ?>
    <?php
	if ($row -> status == '1' | $row -> status == "0") :
		$update = array('status' => '2');
		$this -> db -> where('msg_id', $row -> msg_id);
		$this -> db -> update('msg_server', $update);
	endif;
	?>
                                            <div class="doc_view">
                                                <div class="doc_view_header">
                                                    <dl class="dl-horizontal">
                                                        <dt>Subject</dt>
                                                            <dd><?= $row -> msg_subject; ?></dd>
                                                        <dt>From</dt>
                                                        <?php
                                                            $this->db->where ('user_id', $row->sender_id);
                                                            $udata = $this->db->get('user');
                                                            foreach ($udata->result() as $urow): 
                                                        ?>
                                                            <dd><span><?= $urow -> first_name . '&nbsp;' . $urow -> last_name; ?></span></dd>
                                                            <dt><i class="splashy-cellphone"></i></dt><dd><span> <?=$urow->phone;?></span></dd>
                                                            <dt><i class="splashy-mail_light"></i></i></dt><dd><span> <?=$urow->email;?></span></dd>
                                                            <dt><i class="splashy-marker_rounded_green"></i></dt><dd><span> <?=$urow->location;?></span></dd>
                                                        <?php endforeach; ?>
                                                        
                                                        <dt>Date</dt>
                                                            <dd><?= $row -> msg_time; ?></dd>
                                                        
                                                            
                                                    </dl>
                                            
                                                </div>
                                                <div class="doc_view_content">
                                                <?= $row -> msg_txt; ?> 
                                                
                                                <div class="row-fluid">
                                                	        <?php if ($row->p_relation == "1"):?>
                                                    	<!-- Show item details in discussion -->
                                                    <?php 
                                                    $this->db->where('item_id', $row->item_id); 
                                                    
															$iquery = $this -> db -> get('item');
													?>
                                                    <?php foreach ($iquery->result() as $irow): ?>
													<?php $img = base_url() . 'images/' . $irow -> image; ?><br>
					<table>
						<h4>Hire Details</h4>
						<tr>	
							<td style="width:60px" class="cbox_single thumbnail"> <img alt="" src="<?= $img; ?>" style="height:50px;width:50px"></td>
							<td style="margin-left: 0.3px"><?=$irow->name;?></td>
						</tr> 
						<tr>
							<td>
								<a class="btn" href="<?= base_url(); ?>dashboard/mail/accept/<?= $row -> msg_id; ?>"><i class="splashy-check"></i> Accept Offer</a>
								<a class="btn" href="<?= base_url(); ?>dashboard/mail/reject/<?= $row -> msg_id; ?>"><i class="splashy-error_do_not"></i> Reject offer</a>
							</td>
						</tr>
				</table>
                                                    	
                                       <?php  endforeach; endif; ?>
                                                </div> 
                                                 
                                                </div>
                                                
                                                <div class="doc_view_footer clearfix">
                                                    <div class="btn-group pull-left">
                                                        <a class="btn" href="<?= base_url(); ?>dashboard/mail/reply/<?= $row -> msg_id; ?>"><i class="icon-pencil"></i> Reply</a>
                                                        
                                                        <a class="btn" target='_self' href="<?= base_url(); ?>dashboard/mail/delete/<?= $row -> msg_id; ?>"><i class="icon-trash"></i> Delete</a>
                                                    </div>
                                                </div>
                                            </div>
                                            <ul class="pager">
                                                <li class="previous">
                                                    <a href="#"><i class="icon-chevron-left"></i> Previous</a>
                                                </li>
                                                <li class="next">
                                                    <a href="#">Next <i class="icon-chevron-right"></i></a>
                                                </li>
                                            </ul>
 </div>
 <?php endforeach; ?>
 </div>
 </div>
</div>