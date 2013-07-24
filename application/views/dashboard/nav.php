   <body>
<div id="loading_layer" style="display:none"><img src="<?=base_url();?>legacy/v3/img/ajax_loader.gif" alt="" /></div>
        
    <div id="maincontainer" class="clearfix">
      <!-- header -->
            <header>
                <div class="navbar navbar-fixed-top">
                    <div class="navbar-inner">
                        <div class="container-fluid">
                            <a class="brand" href="<?=base_url('dashboard/');?>"><i class="icon-home icon-white"></i> Scrobber Dashboard</a>
                            <ul class="nav user_menu pull-right">
                                <li><a href="<?=base_url();?>"><i class="splashy-home_green"></i> Main Site</a> </li>
                                <li class="hidden-phone hidden-tablet">
                                    <div class="nb_boxes clearfix">
                                    	<?php 
										/*
										 * User Mail processing
										 */
										 
										 $num = $this->db->get_where('msg_server', array('reciever_id' => $this->session->userdata('user_id'), "status" => "0"));			
										
										$i = $num->num_rows();
										
										
										
										 $unum = $this->db->get_where('msg_server', array('reciever_id' => $this->session->userdata('user_id'), "status" => '1'));			
										
										$b =  $unum->num_rows();
										
										?>
										
                                        <a data-toggle="modal" data-backdrop="static" href="#myMail" class="label ttip_b" title="New messages"><?=$i+$b;?><i class="splashy-mail_light"></i></a>
                                  </div>
                                </li>
                <li class="divider-vertical hidden-phone hidden-tablet"></li>
                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle nav_condensed" data-toggle="dropdown"><i class="flag-gb"></i> <b class="caret"></b></a>
                                    <ul class="dropdown-menu">
                     <li><a href="javascript:void(0)"><i class="flag-us"></i> English</a></li>
                    <li><a href="javascript:void(0)"><i class="flag-de"></i> Deutsch</a></li>
                    <li><a href="javascript:void(0)"><i class="flag-fr"></i> Français</a></li>
                    <li><a href="javascript:void(0)"><i class="flag-es"></i> Español</a></li>
                    <li><a href="javascript:void(0)"><i class="flag-ru"></i> Pусский</a></li>
                                    </ul>
                                </li>
                                <li class="divider-vertical hidden-phone hidden-tablet"></li>
                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><?=$this->session->userdata('name');?> <b class="caret"></b></a>
                                    <ul class="dropdown-menu">
                    <li><a href="<?=base_url('dashboard/profile');?>"> My Profile </a></li>
                    <li><a href="#">Product Settings</a></li>
                    <li class="divider"></li>
                    <li><a href="<?=base_url('landing/logout/');?>">Logout </a></li>
                                    </ul>
                                </li>
                            </ul>
              <a data-target=".nav-collapse" data-toggle="collapse" class="btn_menu">
                <span class="icon-align-justify icon-white"></span>
              </a>
                            <nav>
                                <div class="nav-collapse">
                                    <ul class="nav">
                                        <li>
                                            <a href="<?=base_url('dashboard/add');?>"><i class="splashy-document_letter_add"></i> Add New </a>
                                            
                                        </li>
                                        <li>
                                            <a href="<?=base_url('dashboard/products');?>"><i class="icon-th icon-white"></i> Products</a>
                                            
                                        </li>
                                        
                                        <li>
                                        </li>
                                        <li>
                                           <a href="<?=base_url('dashboard/mail');?>"><i class="splashy-mail_light"></i> Inbox </a>
                                        </li>
                                        <li>
                                            <a href="#"><i class="icon-book icon-white"></i> Help</a>
                                        </li>
                                    </ul>
                                </div>
                            </nav>
                        </div>
                    </div>
                </div>
                <div class="modal hide fade" id="myMail">
                    <div class="modal-header">
                        <button class="close" data-dismiss="modal">×</button>
                        <h3>New messages</h3>
                    </div>
                    <div class="modal-body">
                          <table class="table table-condensed table-striped" data-rowlink="a">
                            <thead>
                                <tr>
                                    <th>Sender</th>
                                    <th>Subject</th>
                                    <th>Date</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                            	<?php foreach ($num->result() as $row): ?>
                                <tr>                                	
                                
                                    <td>System Message</td>
                                 
                                    <td><a href="<?=base_url();?>dashboard/mail/view/<?=$row->msg_id;?>"><?=$row->msg_subject;?></a></td>
                                    <td><?=$row->msg_time;?></td>
                                    <td>Unread</td>
                                    
                                </tr>
                                <?php endforeach?>
                                
                                <?php foreach ($unum->result() as $urow): ?>
                                <tr>                              	
                                	<?php  $this->db->where("user_id", $urow->sender_id);
									$qquery = $this->db->get('user');
									foreach ($qquery->result() as $qrow):
									?>
                                    	<td><?=$qrow->first_name.'&nbsp;'.$qrow->last_name;?></td>                               
                                    <?php endforeach;?>
                                    <td><a href="<?=base_url();?>dashboard/mail/view/<?=$urow->msg_id;?>"><?=$urow->msg_subject;?></a></td>
                                    <td><?=$urow->msg_time;?></td>
                                    <td>Unread</td>
                                    
                                </tr>
                                <?php endforeach?>
                               
                            </tbody>
                        </table>
                    </div>
                    <div class="modal-footer">
                        <a href="<?=base_url();?>dashboard/mail" class="btn">Go to mailbox</a>
                    </div>
                </div>
                <div class="modal hide fade" id="myTasks">
                    <div class="modal-header">
                        <button class="close" data-dismiss="modal">×</button>
                        <h3>New Tasks</h3>
                    </div>
                    <div class="modal-body">
                        <div class="alert alert-info">In this table jquery plugin turns a table row into a clickable link.</div>
                        <table class="table table-condensed table-striped" data-rowlink="a">
                            <thead>
                                <tr>
                                    <th>id</th>
                                    <th>Summary</th>
                                    <th>Updated</th>
                                    <th>Priority</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>P-23</td>
                                    <td><a href="javascript:void(0)">Admin should not break if URL&hellip;</a></td>
                                    <td>23/05/2012</td>
                                    <td class="tac"><span class="label label-important">High</span></td>
                                    <td>Open</td>
                                </tr>
                                <tr>
                                    <td>P-18</td>
                                    <td><a href="javascript:void(0)">Displaying submenus in custom&hellip;</a></td>
                                    <td>22/05/2012</td>
                                    <td class="tac"><span class="label label-warning">Medium</span></td>
                                    <td>Reopen</td>
                                </tr>
                                <tr>
                                    <td>P-25</td>
                                    <td><a href="javascript:void(0)">Featured image on post types&hellip;</a></td>
                                    <td>22/05/2012</td>
                                    <td class="tac"><span class="label label-success">Low</span></td>
                                    <td>Updated</td>
                                </tr>
                                <tr>
                                    <td>P-10</td>
                                    <td><a href="javascript:void(0)">Multiple feed fixes and&hellip;</a></td>
                                    <td>17/05/2012</td>
                                    <td class="tac"><span class="label label-warning">Medium</span></td>
                                    <td>Open</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="modal-footer">
                        <a href="javascript:void(0)" class="btn">Go to task manager</a>
                    </div>
                </div>
            </header>
