<div class="container content">

	<div class="container-twelve">

		<div class="seven columns">

			<H3> <?=$item->want_name;?></H3>
			<div>
				<?php
					$this->db->where('user_id', $item->want_user);
					$data = $this->db->get('user');
					foreach($data -> result () as $row);
					$img = base_url('avator/'.$row->avator);
				?>
				<H5> Description </h5>
				<p>
					<?=$item->want_desc;?>
				</p>
				
				<p>
					<h5> Information </h5>

					Location: <?=$item->want_location;?>, from <?=$item->want_s_day;?> to <?=$item->want_e_day;?>
				</p>

				<div class="divider"> </div>

				<img src="<?=$img;?>" name="<?=$row->first_name." ".$row->last_name;?>" class="thumbnail">
				By: <?=$row->first_name." ".$row->last_name;?>
			</div>
			<hr>
			<div>
				<h4> Related Needs </h4>
				<?php
					if($related -> num_rows () == 0):
				?>
					<p class="alert">
						We couldn't find any related results. 
					</p>

				<?php else: 
					foreach ($related ->  result () as $data):
						$this->db->where('user_id', $data->want_user);
						$dat = $this->db->get('user');
						foreach($dat -> result () as $user);
				?>
					<p class="well">

						<?=$user->first_name;?> wantes a 
						<a href="<?=base_url('wanted/item/'.$data->want_slug);?>" title="View Want"> 
							<?=$data->want_name;?> 
						</a>
						in <?=$data->want_location;?>.

					</p>
				<?php endforeach; endif;?>

			</div>
		</div>

		<div class="four columns align-left">
			
			<div class="well">
				<h6> Contact <?=$row->first_name;?></h6>
				<form action="" method="get">
					<label> Your Name *</label>
					<input type="text" name="name">

					<label> Your Email Address *</label>
					<input type="text" name="name">

					<label> Your Phone Number *</label>
					<input type="text" name="name">

					<label> Message</label>
					<textarea class="auto-width mceNoEditor" name="msg"  cols="7" rows="5"> </textarea>

					<div class="divider"> </div>

					<button type="submit" class="btn btn-info"> Send</button>
				</form>
			</div>

			<form action="<?=base_url('wanted');?>" method="get" class="well" />
				<input type="hidden" name="location" value="<?=$item->want_location;?>" />
				<input type="text" placeholder="Find another want" name="s" />

			</form>

			<div class=" well alert">
				Find people renting out "<?=$item->want_name;?>"
				<br>
				<a class="btn" href="<?=base_url('search');?>?s=<?=$item->want_name;?>&limit_min=0&limit_max=10&ref=search+home&source=internal&max=off"> Find </a>

			</div>

		</div>
	</div>

</div>