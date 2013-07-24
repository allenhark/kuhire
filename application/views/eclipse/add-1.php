<div class="home-wrapper center-container">
	<div class="clear"> &nbsp; </div>
	<div class="content" style="margin-top: 20px;" >

	 <div  style="margin-top: 20px; width: 100%; padding: 10px; min-height: 500px; margin-bottom: 20px; text-align: center;">
		<h1 class="page-title" style="color: grey; font-size: 30px;"> Add a new product </h1>
		<div class="clear"> &nbsp; </div>
		<span style="font-size: 12px; color: sky;"> Select Category : Step 1</span>

	

		<div class="clear"> &nbsp; </div>



		<div class='row' style="">
			<form class="form" action="<?=base_url('go');?>" method="get"> 
				<select class="span4 input select input-large" style="" name="redirect">
					
					<?php foreach($categories -> result () as $cat):?>
						<option value="<?=$cat->cat_slug;?>" style="height: auto;"><?=$cat->cat_name;?> </option>
					<?php endforeach; ?>
				</select>
				<input type="hidden" name="ref" value="Add item sted 1">
				<input type="hidden" name="url" value="base_url">
				<input type="hidden" name="go" value="redirect" >
				<input type="hidden" name="link_1" value="add" >
				<div style="margin-top: 70px;">
					<button class="btn btn-large btn-primary" type="submit"> Proceed </button>
				</div>
			</form>
		</div>



	</div>

	</div>

</div>
<div class="span12 row" style="margin-bottom: 10px;">&nbsp; </div>
