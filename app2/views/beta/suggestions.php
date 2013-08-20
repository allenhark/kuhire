<div class="container container-twelve" style="margin-top: 10px; min-height: 400px; height: auto;">

	<div class="seven columns"> 
		<p class="alert">
			<a href="<?=base_url ($item->slug);?>"> <?=$item->name;?> </a> has been added on Scrobber, 
			as our team reviews it, 
			you might check these few suggestions of people who might be in need of it.
		</p>

		<?php if ($sg->num_rows () == 0):?>

			<p>
				We couldn't find any matching items, this may be to locational differences or keyword difference.
				<br>
				Try searching yourself <a href="#" > Search For someone in need of <?=$item->name;?> </a>
			</p>

		<?php else :?>
			<hr>
			<div>
				<h4 style="text-transform: uppercase;"> People in Need of a <?=$item->name;?></h4>
			
				<?php  
					foreach ($sg ->  result () as $data):
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
				<?php endforeach; ?>

			</div>

		<?php endif;?>

	</div>

	<div class="four columns">
		<p>
			<a href="<?=base_url ($item->slug);?>"><i class="splashy-refresh_forward"></i> Skip this step </a> and take me to my item.
		</p>
		<p class="well">
			You added a <a href="<?=base_url ($item->slug);?>"> <?=$item->name;?> </a> in 
			<?=$cat->cat_name;?> Category,
			you can provide extra information that will aid users getting your <?=$item->name;?>.
			<br>
			<a href="<?=base_url('extra/'.$this->uri->segment(2).'ref=suggested');?>" class="btn btn-info btn-block"><i class="splashy-documents_edit"></i> Add more Information </a>
		</p>

		<div class="well">
			<h5> Link to <?=$item->name;?> </h5>

			<textarea  class="mceNoEditor" rows="2" cols="30"><?=base_url ($item->slug);?></textarea>
			<br>
			Copy and Share to your friends
		</div>

		<div class="well">

			<div class="modal-header">
				Premium Service
			</div>

			<div class="modal-body">
				Notify me whenever someone needs a <?=$item->name;?> 
				<br> <br>
				<a href="#" class="btn btn-info"><i class="splashy-mail_light_new_2"></i> Notify Me </a>
			</div>
		</div>

	</div>

</div>