<?php foreach ($query->result() as $row):?>
	  <section id="content" class="container clearfix">
	  	<div class="row-fluid clearfix span12">
			<div class="one-third">
			<h4> <?=$row->name;?> </h4>
			<p>
			<h6><i class="entypo-icon-price "></i> Price: <?=$row->item_price;?>.00 Per day </h6>
			<i class="entypo-icon-map "></i> Currency: Kes <br>
			<div class="btn-group">
				<a href="<?= base_url("inquire/" . $row -> item_id); ?>" class="btn btn-primary" title="View item"><i class='minia-icon-cart'></i> Hire</a>
				<a href="<?= base_url("inquire/" . $row -> item_id); ?>" class="btn btn-info" title="Contact owner"><i class="splashy-group_grey"></i> Contact Owner</a>		
			</div>
			</p>
			</div>
			
			<div class="two-third last">
				<h2> Item Details </h2>
					<ul class="unstyled">
						<li class="span4"> <i class="entypo-icon-price "></i> <b> Price: <?=$row->item_price;?>.00 Per day </b> </li>
						<li class="span4"> <i class="splashy-map"></i> <b>Location:</b> <?=$row->location;?> </li>
						<li class="span4"> <i class="entypo-icon-support "></i><b> Hire Status: </b> <?php if($row->status == '1' OR $row->status == "3"){?> Available <?php }else {?> Unavailable<?php };?>  </li>
						<li class="span3"> <i class="entypo-icon-eye"> </i><b> Views :</b> <?=$row->views;?> </li>						
						<li class="span3"> <i class="splashy-marker_rounded_grey_1"></i><b> Forks :</b> <?=$row->forks;?> </li>
						<li class="span3"> <i class="icomoon-icon-eye-2"></i><b> Watchers :</b> <?=$row->watchs;?> </li>
					</ul>
			</div>
		</div>
			
		<div class="span12 clearfix row-fluid">
			<div class="one-third">
			<?php 
			// Build Image link
			$img = base_url('images/'.$row->image);
			?>
			<img src="<?=$img;?>" width="250px" height="200px" alt="<?=$row->name;?>">
			<p><?=$row->name;?> </p>
			
			<p><div data-href="http://scrobber.com" class="fb-like" data-send="true" data-width="250" data-show-faces="true"></div></p>
			<p>
				<form class="vertical form">
				<legend> Quick contact owner </legend>
				 <label><i class="icomoon-icon-user "></i> name</label>
					<input type="text" placeholder="Your Name" name="name">
					<span class="help-block">We will use this name for reference </span>
            
				<label><i class="splashy-cellphone"></i> Phone Number </label>
					<input type="text" placeholder="Your phone number" name="last_name">
					<span class="help-block">We will use this to contact you.</span>

				<label><i class="splashy-document_a4_add"></i> Message </label>
					<textarea rows="3" class="autoresize" name="message" cols="6"> </textarea>
					<span class="help-block">Your message.</span>
				<hr>
				<button class="btn btn-inverse" type="submit"><i class="splashy-mail_light_right"></i> Inquire</button>
				</form>
				
			</p>
			</div>
			
			<div class="two-third last">
				<h5> Item Description </h5>
					<p><?=$row->desc;?> </p>
					<p><b> Tags: </b><?=$row->tags;?> </p>
			<hr> 
			<p> <div class="fb-comments" data-href="http://scrobber.com" data-num-posts="2" data-width="470"></div> </p>
			<h5> About the owner </h5>
			<?php 
			// We build everything about the product owner here
			
			$this->db->where('user_id', $row->item_owner);
			$owner = $this->db->get('user');
			foreach ($owner-> result () as $udata):
			
			//profile pic construction
			
			$img = base_url($udata->avator);?>
			
				<p>
					<div class="span5">
						<img src="<?=$img;?>" alt="profile picture">
					
					</div>
			
					<div class="span5 last">
						<h5> <?=$udata->first_name."&nbsp;".$udata->last_name;?> </h5>
						<div class="btn-group">
							<a href="http://facebook.com/<?=$udata->facebook;?>" target="_new" class="btn"><i class="icomoon-icon-facebook-3"></i></a>
							<a href="http://twitter.com/!#<?=$udata->twitter;?>" target="_new" class="btn"><i class="icomoon-icon-twitter-3"></i></a>
							<a href="http://plus.google.com/<?=$udata->plus;?>" target="_new" class="btn"><i class="icomoon-icon-google-plus-3 "></i></a>
							<a href="#" title="<?=$udata->skype;?>" class="btn"><i class="icomoon-icon-skype"></i> </a>
						</div>
					</div>
			
				</p>
				<br><hr>
				<p>
					<ul class="unstyled">
						<li><t class="btn btn-mini"><i class="minia-icon-phone "></i> Phone :</t> &nbsp;<?=$udata->phone;?></li><br>
						<li><t class="btn btn-mini"> <i class="  minia-icon-envelope"></i> Email :</t>&nbsp; <?=$udata->email;?></li><br>						
						<li><t class="btn btn-mini"><i class="entypo-icon-direction"></i> Location:</t>&nbsp; <?=$udata->location;?> </li>
					</ul>
				</p>
			
			</div>	
			<?php endforeach;?>
				<hr>		
	  	</div>
	  	<div class="row-fluid clearfix span12">
		<h3> Related Items </h3>
		<ul class="unstyled">
		<?php
		//Get featured items and show em'
		$this->db->where('status', '3');		
		$this->db->where_not_in('item_id', $row->item_id);
		$this->db->like('tags', $row->tags);
		$this->db->or_like('name', $row->name);
		$this->db->order_by("item_id", "desc"); 
		$this->db->limit('4');
		$fd = $this->db->get('item');
		foreach($fd->result() as $fta):
		$img = base_url().'images/'.$fta->image;
		?>
		<li class="span3"><div class="span12">
		<a href="<?=base_url('view/'.$fta->item_id)?>"><img src="<?= $img; ?>" alt="<?= $fta -> name; ?>"></a><br>
		<h5><?= $fta -> name; ?></h5>
		<p><?php $string = $fta -> desc;
			$string = word_limiter($string, 15);
			echo $string;?>&nbsp;<small><a href="<?=base_url('view/'.$fta->item_id)?>">More <i class="splashy-bullet_blue_expand"></i></a></small></p>
		<p><?php $xw = array($fta -> tags); ?>
			Tags: <?= $fta -> tags; ?>
		</p>
		
		<div class="btn-group">
		<a href="<?= base_url("landing/view/" . $fta -> item_id); ?>" class="btn btn-mini" title="View item"><i class='icomoon-icon-eye-2'></i> View</a>
		<a href="<?= base_url("landing/inquire/" . $fta -> item_id); ?>" class="btn btn-mini" title="Contact owner"><i class="splashy-group_grey"></i> Contact</a>
		<a href="<?= base_url("landing/fork/" . $fta -> item_id); ?>" class="btn btn-mini" title="Fork Item"><i class="splashy-marker_rounded_grey_1"></i> Fork</a>
		
		</div>
		</li>
		
		<?php endforeach; ?>
		
		
		</ul>
	</div>
		
		<div class="row-fluid clearfix span12">
		<h3> Featured Items </h3>
		<ul class="unstyled">
		<?php
		//Get featured items and show em'
		$this->db->where('status', '1');
		$this->db->order_by("item_id", "desc"); 
		$this->db->limit("4");
		$featured = $this->db->get('item');
		foreach($featured->result() as $ft):
		$img = base_url().'images/'.$ft->image;
		?>
		<li class="span3"><div class="span12">
		<a href="<?=base_url('view/'.$ft->item_id)?>"><img src="<?= $img; ?>" alt="<?= $ft -> name; ?>"></a><br>
		<h5><?= $ft -> name; ?></h5>
		<p><?php $string = $ft -> desc;
			$string = word_limiter($string, 15);
			echo $string;?>&nbsp;<small><a href="<?=base_url('view/'.$ft->item_id)?>">More <i class="splashy-bullet_blue_expand"></i></a></small></p>
		<p><?php $xw = array($ft -> tags); ?>
			Tags: <?= $ft -> tags; ?>
		</p>
		
		<div class="btn-group">
		<a href="<?= base_url("landing/view/" . $ft -> item_id); ?>" class="btn btn-mini" title="View item"><i class='icomoon-icon-eye-2'></i> View</a>
		<a href="<?= base_url("landing/inquire/" . $ft -> item_id); ?>" class="btn btn-mini" title="Contact owner"><i class="splashy-group_grey"></i> Contact</a>
		<a href="<?= base_url("landing/fork/" . $ft -> item_id); ?>" class="btn btn-mini" title="Fork Item"><i class="splashy-marker_rounded_grey_1"></i> Fork</a>
		
		</div>
		</li>
		
		<?php endforeach; ?>
		
		
		</ul>
	</div>
		
	  </section>
	  	
<?php endforeach;?>