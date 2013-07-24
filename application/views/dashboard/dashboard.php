            <!-- main content -->
            <div id="contentwrapper">
                <div class="main_content">
                    
					<div class="row-fluid">
						<div class="span5">
							<h3 class="heading">Top visitors by region <small>last week</small></h3>
							<div id="fl_2" style="height:200px;width:80%;margin:50px auto 0"></div>
						</div>
						<div class="span7">
							<div class="heading clearfix">
								<h3 class="pull-left">Your sales trends</h3>
								<span class="pull-right label label-info ttip_t" title="Shows your hire products data">Info</span>
							</div>
							<div id="fl_1" style="height:270px;width:100%;margin:15px auto 0"></div>
						</div>
					</div>
                    <div class="row-fluid">
                        <div class="span6">
							<div class="heading clearfix">
								<h3 class="pull-left">Pending Orders</h3>
								
							</div>
							<table class="table table-striped table-bordered mediaTable">
								<thead>
									<tr>
										<th class="optional">From</th>
										<th class="essential persist">About</th>
										<th class="optional">Status</th>
										<th class="optional">Date Added</th>
										<th class="essential">Action</th>
									</tr>
								</thead>
								<tbody>
									
							<?php $this->db->where ('reciever_id', $user_id);
        $query = $this->db->get('msg_server');								
       if ($query->num_rows() > 0): ?>
        
        <?php foreach ($query->result() as $row): ?>
        <?php if ($row->status == '1'):
        $this->db->where ('user_id', $row->sender_id);

        $udata = $this->db->get('user');
        foreach ($udata->result() as $urow):
?>
									<tr>
										<td><?=$urow->first_name."&nbsp;".$urow->last_name;?></td>
										<td><?=$row->msg_subject;?></td>
										<td>Pending</td>
										<td><?=$row->msg_time;?></td>
										<td>
											<a href="#" title="Reply"><i class="splashy-document_a4_add"></i></a>
											<a href="#" title="Read"><i class="splashy-document_letter_okay"></i></a>
											<a href="#" title="Delete"><i class="splashy-gem_remove"></i></a>
										</td>
									</tr>
								<?php endforeach; endif; endforeach; endif;?>
									
								</tbody>
							</table>
                        </div>
                        <div class="span6">
							<div class="heading clearfix">
								<h3 class="pull-left">System Notifications</h3>
							</div>
		<?php $this->db->where ('reciever_id', $user_id);
        $qry = $this->db->get('msg_server'); 								
       		if ($qry->num_rows() > "0"):?>
							<table class="table table-striped table-bordered mediaTable">
								<thead>
									<tr>
										<th class="optional">From</th>
										<th class="essential persist">Subject</th>
										<th class="optional">Status</th>
										<th class="optional">Date Added</th>
										<th class="essential">Action</th>
									</tr>
								</thead>
								<tbody>
									
		
									<tr>
		<?php 
       		
        	foreach ($qry->result() as $qrow):
        	if ($qrow->status == '0'):
        		 ?>
										<td>Admin</td>
										<td><?=$qrow->msg_subject;?></td>
										<td>Urgent</td>
										<td><?=$qrow->msg_time;?></td>
										<td>
											<a href="#" title="Reply"><i class="splashy-document_a4_add"></i></a>
											<a href="#" title="Read"><i class="splashy-document_letter_okay"></i></a>
											<a href="#" title="Delete"><i class="splashy-gem_remove"></i></a>
										</td>
									</tr>
								<?php endif; endforeach; endif;?>
									
								</tbody>
							</table>
						
                        </div>
                    </div>

                    <div class="row-fluid">
						<div class="span5">
							<h3 class="heading">Pending Publication</h3>

		<?php $this->db->where ('item_owner', $user_id);
        $pp = $this->db->get('item'); 								
       		if ($pp->num_rows() > "0"):?>
							<table class="table table-striped table-bordered mediaTable">
								<thead>
									<tr>
										<th class="optional">id</th>
										<th class="essential persist">Name</th>
										<th class="optional">Status</th>
										<th class="optional">Date Added</th>
										<th class="essential">Action</th>
									</tr>
								</thead>
								<tbody>
									
		
									<tr>
		<?php 
       		
        	foreach ($pp->result() as $prow):
        	if ($prow->status == '2'):
        		 ?>
										<td><?=$prow->item_id;?></td>
										<td><?=$prow->name;?></td>
										<td>Not Paid For</td>
										<td><?=$prow->pub_time;?></td>
										<td>
											<a href="#" title="pay"><i class="splashy-lock_large_unlocked"></i></a>
											<a href="#" title="Edit"><i class="splashy-document_a4_edit"></i></a>
											<a href="#" title="Delete"><i class="splashy-gem_remove"></i></a>
										</td>
									</tr>
								<?php endif; endforeach; endif;?>
									
								</tbody>
							</table>

						</div>

						<div class="span6">
							<h3 class="heading">Drafts</h3>
						</div>
					</div>
                    
            </div>
            
			<!-- sidebar -->
            
			
			</div>
            
            