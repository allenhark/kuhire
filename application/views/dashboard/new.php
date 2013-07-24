<div id="contentwrapper">
                <div class="main_content">
	        <div class="row-fluid">
				<div class="span12">
					<div class="heading clearfix">
						<h3> Add new Item</h3>
					</div>
					<div><?php echo  validation_errors('<li class="warning">', '</li>');?>  </div>
						<?php $atts = array('class' => 'form-horizontal'); ?>
							<?php echo form_open_multipart('dashboard/add/item_add', $atts); ?>

					<fieldset>
					<div class="control-group formSep">
							<label for="u_fname" class="control-label">Item Name</label>
									<div class="controls">
							<input type="text" id="u_fname" name='item_name' class="input-xlarge" Placeholder='Your catchy Name' />
						</div>
						<span class="help-block">Item Name. User a catchy name to attract attention</span>
					</div>

					<div class='control-group formSep'>
						<label for="u_fname" class="control-label">Item Picture</label>
						<div class="controls">

						<div data-fileupload="image" class="fileupload fileupload-new"><input type="hidden"><input type="hidden">
									<div style="width: 200px; height: 150px;" class="fileupload-new thumbnail"><img src="http://www.placehold.it/200x150/EFEFEF/AAAAAA&amp;text=no+image" alt=""></div>
									<div style="max-width: 200px; max-height: 150px; line-height: 0px;" class="fileupload-preview fileupload-exists thumbnail"></div>
									<div>
										<span class="btn btn-file"><span class="fileupload-new">Select image</span><span class="fileupload-exists">Change</span><input name="image" type="file"></span>
										<a data-dismiss="fileupload" class="btn fileupload-exists" href="#">Remove</a>
									</div>
								</div>

								<span class="help-block">Item Picture. Its a form of item ownership proof. <a href="http://blog.scrobber.com/?s=ownership+proof" target="_blank">Learn More <i class="splashy-refresh_forward"></i></a></span>
							</div>
					</div>

					<div class="formSep">
							<label class="control-label">Item Description</label>
							<div class="controls">

							<textarea id="elm1" name="desc" rows="15" cols="80" style="width: 80%">The more your item is detailed the more its likely to get users attention</textarea>
						</div>
						<span class="help-block">The more your item is detaiiled the more its likely to get users attention.
							Learn more on how to attach images on your description. <ul class="list_a sepH_c"><li><a href="http://wiki.telekenya.com/imgcdn" target='blank'>Learn More</a></li></ul>
						</span>
					</div>
					</div>



					

					<div class="formSep">
						<label class="control-label">Item Tags</label>
						
							<div class="controls">
								<div class="tagHandler">
									<ul class="tagHandlerContainer" id="max_tags_tag_handler">
										<li class="tagInput"><input  role="textbox" autocomplete="off" class="tagInputField" type="text"></li>
									</ul>
								</div>
								<span class="help-block">Tags are useful for showning search results. Use top level tags like, Cheap, Mercedes, Toyota. Scrobber Shows products with tags first</span>
							</div>
						</div>
					</div>

					<div class="formSep">
						<h3 class="heading">Product Configuration <span> All fields requires </span></h3>
						<div class="row-fluid">
							<div class="span3">
								<label for="mask_date">Location</label>
								<select name="chosen_a" id="chosen_a" data-placeholder="Choose a Location..." class="chzn_a">
									<option value=""></option>
									<?php $hoods = $this->db->get('hoods');
								foreach ($hoods->result() as $row): 
								?>
									<option value='<?= $row -> hood_id; ?>'> <?= $row -> hood_name; ?></option>
									<?php endforeach; ?>
								</select>
								<span class="help-block">Hire Location</span>
							</div>
							<div class="span3">
								<label for="mask_phone">Hire Price</label>
								<input class="span8" name='price' Placeholder='Price Per day' type="text">
								<span class="help-block">Hire Price Per Day <strong> EG 700 not 700.00 </strong></span>
							</div>
							<div class="span3">
								<label for="mask_ssn">Hire Availability</label>
								<select name="availability">
									<option value="anyday"> AnyDay </option>
									<option value="weekdays"> WeekDays </option>
									<option value="weekends"> Weekends </option>
									<option value="holidays"> Holidays </option>
								</select>
								<span class="help-block">Item Rental time availability.</span>
							</div>
							<div class="span3">
								<label for="mask_product">Item Category</label>
								
								<select name="category">
									<?php $cat = $this->db->get('categories');
								foreach ($cat->result() as $row): 
								?>
									<option value='<?= $row -> cat_id; ?>'> <?= $row -> cat_name; ?></option>
									<?php endforeach; ?>
								</select>
							
								<span class="help-block">Default Item Category.</span>
							</div>
						</div>
					</div>

					<div class="control-group">
						<div class="controls">
							<button class="btn btn-gebo" name='publish' type="submit">Publish</button>
							<button class="btn btn-info" name='draft' type="submit">Save Draft </button>
							<a  class="btn btn-danger" href="<?=base_url('dashboard');?>">Cancel</a>
						</div>
					</div>

					</fieldset>
					</form>
				</div>
			</div>
                        
        </div>
    </div>
            
			<!-- sidebar -->
            
</div>
