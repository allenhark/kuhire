

	<?php if($results -> num_rows !== 0):?>
<div class="container container-twelve" style="margin-top: 10px; min-height: 400px; height: auto;">
		<div class="seven columns">

			<h3> Search results for <?=$_GET['s'];?> </h3>
			
			<?php 		
			foreach ($results ->result () as $row):
				$this->db->where('user_id', $row->want_user);
				$data = $this->db->get('user');
				foreach($data -> result () as $user);
			?>		
			<p class="well">

				<?=$user->first_name;?> wantes a 
				<a href="<?=base_url('wanted/item/'.$row->want_slug.'?ref=search');?>" title="View Want"> 
					<?=$row->want_name;?> 
				</a>
				in <?=$row->want_location;?>.

			</p>		
			
			<?php endforeach; ?>

		</div>

		<div class="four columns">
			<form class="well">
				<label> Find Again</label>
				<input type="text" name="s" value="<?=$_GET['s'];?>"> 
				<input type="hidden" name="location" value="<?=$_GET['location'];?>">
			</form>

			<div class=" well alert">
				Find people renting out "<?=$_GET['s'];?>"
				<br>
				<a class="btn" href="<?=base_url('search');?>?s=<?=$_GET['s'];?>&limit_min=0&limit_max=10&ref=search+home&source=internal&max=off"> Find </a>

			</div>
		</div>
</div>
	<?php else:?>

<div id="slider" style="background-image:url(<?=base_url('static/images/home.png');?>); min-height: 400px; background-repeat: none; ">

	<div class="container container-twelve">
		<div class=" twelve columns" >
			<h1 style="color: white; margin-top: 20px; background-opacity: 0.06; text-transform: uppercase; text-shadow: 1px 1px 3px #5d5d5d;" class="textshadow" > 
				Find someone who needs your rental
			</h1>
			<form class="form-inline " action="<?=base_url('wanted/');?>" style="margin-left: 0; background: transparent; ">
				<input type="hidden" name="limit_min" value="0">
				<input type="hidden" name="limit_max" value="10">
				<input type="hidden" name="ref" value="Home page">
				<input type="hidden" name="terminal" value="Main">
				<input type="hidden" name="max" value="off">
				<input type="hidden" name="phone" value="null">
				<input type="hidden" name="source" value="internal" >
				<div style="margin: 0; ">
					<input type="text" name="s" placeholder="What are you hiring out?" class="seven columns" style="height: 50px; font-size: 24px; color: grey;" />
					<!-- input type="text" name="price" placeholder="Price" class="span2" style="height: 50px; font-size: 22px; color: grey;" / -->			
					<input type="text" name="location" class="three columns pull-right" style="height: 50px; font-size: 22px; color: grey; width: auto;" placeholder="Within.."/>
				</div>
					<br> <br> <br>
			<div class="divider"> &nbsp; </div>
			<div style="text-align: center">
				<button type="submit" class="btn btn-info btn-large" style="height: inherit; font-size: 24px;"><i class="splashy-zoom"></i> Find It.</button>
			</div>
		</form>
		<br>
		<p class="alert">
			We couldn't find any want requests matching <b> <?=$_GET['s'];?> </b>
			<?php if(isset($_GET['location'])):?>
                            <?php if($_GET['location'] !== ""):?>
				Within <?=$_GET['location'];?>
                            <?php endif; ?>
			<?php endif; ?>
			. Try other search keywords or in a different location.
		</p> 
		</div>
		<div class="clear"></div>
	</div>

</div><!-- //search -->
<?php endif;?>

<div class="divider"> &nbsp; </div>