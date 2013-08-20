<?php
foreach ($user->result () as $udata):

?>
<div class="container container-twelve">
	<!-- profile validator =========== -->
	<?php
	if($udata->is_active != '1'):
	?> 
		<div class="twelve columns">
			<div class="infobox">
				<div class="content">
					<h3><i class="splashy-error"></i> Inactive profile!</h3>
					<h4>You may not be able to proceed with an inactive profile. </h4>
				</div>
				<div class="btn-group">
					<a href="<?=base_url('beta/user/confirmation/resend');?>" class="btn btn-small btn-warning"><i class="iconic-icon-spin"></i> Resend confirmation code</a>
					<a href="<?=base_url('beta/user/confirmation/call');?>" class="btn btn-small btn-danger"><i class="wpzoom-phone-2"></i> Request Call back</a>
					<a href="<?=base_url('contact');?>" class="btn btn-small"><i class="icomoon-icon-mail"></i> Contact Support</a>
				</div>
			</div>
			<div class="clear"></div>
		</div>
	<?php
	endif;
	?>

	<?php
		if($udata->phone == null | $udata->id_no == "0" | $udata->city == null | $udata->username == NULL):
	?>
		<div class="twelve columns">
			<div class="infobox">
				<div class="content">
					<h3><i class="splashy-warning_triangle"></i> Incomplete profile!</h3>
					<h4>Some of the essential profile fields are missing. This may disable some features </h4>
				</div>
				<div class="action">
					<a href="<?=base_url('beta/user/wizz/step1');?>" class="btn btn-small btn-danger"><i class="icomoon-icon-meter-fast"></i> Run Wizard</a>
				</div>
			</div>
		</div>
	<?php endif;?>
	
	<div class="span12 row-fluid container-fluid clearfix">
		<div class="span2" >
			<ul>
				<li><a href="<?=base_url('beta/user');?> "><i class="icomoon-icon-bars"></i> Dashboard </a></li>
				<li><a href="<?=base_url('add');?>"><i class="entypo-icon-plus"></i> Add new </a></li>
				<li><a href="<?=base_url("beta/user/inbox");?>"><i class="icomoon-icon-mail"></i> Inbox </a> </li>
				<li><a href="<?=base_url('beta/user/products');?>" class="active"><i class="brocco-icon-grid"></i> Products </a></li>								
				<li><a href="<?=base_url('beta/user/payment');?>"><i class="icomoon-icon-stats-up"></i> Payment History </a></li>
				<li><a href="<?=base_url("beta/user/security");?>"><i class="icomoon-icon-fire "></i> Security Settings</a> </li>
				<li><a href="<?=base_url("beta/user/profile");?>"><i class="wpzoom-settings"></i> Profile Settings</a> </li>
			</ul> 
		</div>
		
		<div class="span6">
			
			<div class="span12 row-fluid>
				<ul class="unstyled">
					<li class="span3"><i class="splashy-image_cultured"></i> Image </li>
					<li class="span5"><i class="splashy-documents"></i> Product </li>
					<li class="span3"><i class="splashy-gem_options"></i> Action</li>
				</ul>
			</div>
			<?php
			//items build-up
			$this->db->where('item_owner', $udata->user_id);
			$this->db->where_not_in('status', '5');
			$this->db->order_by('item_id', 'desc');
			$txz = $this->db->get('item');
			if ($txz -> num_rows() > 0):
				foreach ($txz->result () as $item):
				$pic = base_url('images/'.$item->image);
			?>
			<div class="span12 row-fluid>
				<ul class="unstyled">
					<li class="span3">
						<img src=<?=$pic;?> alt='<?=$item->name;?>' >
					</li>
					
					<li class="span5">
						<a href="<?=base_url('view/'.$item->item_id);?>" target="new"> <?=$item->name;?> </a><br>
						 <i class="wpzoom-tag"></i> <?=$item->item_price.'.00';?> <br>
						 <i class="wpzoom-flag"></i> <?=$item->location;?> <br>
						 <?php if($item->status == "1"):?>
						 	<i class="wpzoom-binocular"></i> Featured
						 <?php elseif($item->status == "3"):?>
						 	<i class="wpzoom-binocular"></i> Published
						 <?php elseif($item->status == "2"):?>
						 	<i class="wpzoom-binocular"></i> Pending
						 <?php elseif($item->status == "4"):?>	
						 	<i class="wpzoom-binocular"></i> Hired
						 <?php elseif($item->status == "6"):?>
						 	<i class="wpzoom-binocular"></i> Not visible
						 <?php endif;?>
					</li>
					
					<li class="span3"> 
						<?php if($item->status == "1"):?>
						 	<a href="<?=base_url('view/'.$item->item_id);?>" title="View"><i class="icomoon-icon-eye-2"></i> </a>&nbsp;
						 	<a href="<?=base_url('beta/user/edit/'.$item->item_id);?>" title="Edit"><i class="wpzoom-pencil"></i></a>&nbsp;
						 	<a href="<?=base_url('beta/user/delete/'.$item->item_id);?>" title="Delete"><i class="eco-trashcan"></i></a><br>
						 	<a href="<?=base_url('beta/user/hire/'.$item->item_id);?>" title="Hire Out"><i class="entypo-icon-leaf"></i></a>
						 	
						 <?php elseif($item->status == "3"):?>
						 	<a href="<?=base_url('view/'.$item->item_id);?>" title="View"><i class="icomoon-icon-eye-2"></i></a>&nbsp;
						 	<a href="<?=base_url('beta/user/edit/'.$item->item_id);?>" title="Edit"><i class="wpzoom-pencil"></i></a>&nbsp;
						 	<a href="<?=base_url('beta/user/delete/'.$item->item_id);?>" title="Delete"><i class="eco-trashcan"></i></a><br>
						 	<a href="<?=base_url('beta/user/hire/'.$item->item_id);?>" title="Hire Out"><i class="entypo-icon-leaf"></i></a> &nbsp;
						 	<a href="<?=base_url('beta/user/feature/'.$item->item_id);?>" title="Feature Item"><i class=""></i>
						 	
						 <?php elseif($item->status == "2"):?>
						 	<a href="<?=base_url('view/'.$item->item_id);?>" title="View"><i class="icomoon-icon-eye-2"></i></a>&nbsp;
						 	<a href="<?=base_url('beta/user/edit/'.$item->item_id);?>" title="Edit"><i class="wpzoom-pencil"></i></a>&nbsp;
						 	<a href="<?=base_url('beta/user/delete/'.$item->item_id);?>" title="Delete"><i class="eco-trashcan"></i></a><br>
						 	<a href="<?=base_url('pay/'.$item->item_id);?>" title="Activate"><i class="entypo-icon-export"></i></a>
						 	
						 <?php elseif($item->status == "4"):?>	
						 	<a href="<?=base_url('view/'.$item->item_id);?>" title="View"><i class="icomoon-icon-eye-2"></i></a>&nbsp;
						 	<a href="<?=base_url('beta/user/edit/'.$item->item_id);?>" title="Edit"><i class="wpzoom-pencil"></i></a>&nbsp;
						 	<a href="<?=base_url('beta/user/delete/'.$item->item_id);?>" title="Delete"><i class="eco-trashcan"></i></a><br>
						 	<a href="<?=base_url('beta/user/refresh/'.$item->item_id);?>" title="Refresh"><i class="entypo-icon-reload-CW"></i></a>
						 	
						 <?php elseif($item->status == "6"):?>
						 	<a href="<?=base_url('view/'.$item->item_id);?>" title="View"><i class="icomoon-icon-eye-2"></i></a>&nbsp;
						 	<a href="<?=base_url('beta/user/edit/'.$item->item_id);?>" title="Edit"><i class="wpzoom-pencil"></i></a>&nbsp;
						 	<a href="<?=base_url('beta/user/delete/'.$item->item_id);?>" title="Delete"><i class="eco-trashcan"></i></a><br>
						 	<a href="<?=base_url('pay/'.$item->item_id);?>" title="Activate"><i class="entypo-icon-export"></i></a>
						 	
						 <?php endif;?>
					</li>
					
				</ul>
				<hr style="width: 90%">
			</div>
			<div class="clear"></div>
			<?php endforeach;?>
			
			<?php else:;?>
				<h4> You do not Have any item published on Scrobber</h4>
				<p> <a href="<?=base_url('add');?>"><i class="entypo-icon-plus"></i> Add new </a></p>
			<?php endif;?>
			
		</div>
		
		<?php $this->load->view('beta/userbar');?>
		
		
	</div>
		<hr>
	</div>
	
</div>

<?php endforeach;?>