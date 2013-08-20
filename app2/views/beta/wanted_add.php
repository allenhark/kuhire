<div class="container container-twelve ">

	<div class="well" style="margin-top: 10px; min-height: 600px; height: auto;">

		<div class="two columns"> 
			<?php validation_errors('<li class="alert">', '</li>');?>
			&nbsp;  
		</div>

		<div class="five columns">

		<form method="post" class="push-down" action="<?=base_url('wanted/add');?>">
			<div class="input">

				<label class="help-block"> What do you want to hire?</label>
				<input type="text" name="name" class="four columns" style="height: 30px;">
				
			</div>

			<div class="clear"></div>

			<div class="input">

				<label class="help-block"> Where?</label>
				<input type="text" name="location" class="four columns" style="height: 30px;">
				
			</div>

			<div class="clear"></div>

			<div class="input">

				<label class="help-block"> Where should we Categorize it?</label>
				<select name="category">
					<?php
						$this->db->order_by('cat_name', 'asc');
						$cats = $this->db->get('categories');
						foreach ($cats->result() as $crow):
					?>
						<option value="<?=$crow->cat_slug;?>"> <?=$crow->cat_name;?></option>
					<?php endforeach;?>
				</select>
			</div>

			<div class="clear"></div>

			<div class="input">

				<label class="help-block"> Describe your need.</label>
				<textarea class="four columns auto-width" name="desc"> </textarea>
				
			</div>

			<div class="clear"></div>

			<div class="input">
				<label class="help-block"> When Do you need it?</label>
				<input type="text" name="start_date" class="three columns" style="height: 30px;" placeholder="year-month-day order">
				
				<p class="help-block"> E.G 2013-01-19 </p>
				
			</div>

			<div class="clear"></div>

			<div class="input">
				<label class="help-block"> When will you return it?</label>
				<input type="text" name="end_date" class="three columns" style="height: 30px;" placeholder="year-month-day order">
				<input name="sess" value="<?=random_string('alnum', 16);?>" type="hidden">
				<p class="help-block"> E.G 2013-01-20 </p>
				
			</div>

			<div class="clear"></div>

			<button class="btn btn-info btn-large" type="submit"> Ask </button>

		</form>

		</div>

		<div class="four columns">
			We will help you find someone hiring out what you want.

			<p>
				<h5> How It works </h5>

				After you post your need, we will match you with a rental owner on Scrobber who owns a similar
				item. We will send them a notification that you need their rental. They will contact you back, once you agree
				you can hire their rental. Alternativly, in the next step we will show you six best matches (if any), you can choose 
				to contact the owners.
			</p>
		</div>

	</div>

</div>