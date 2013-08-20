<div id="pageinfo">

		<div class="container container-twelve">

			<div class="pagetitle eight columns">
				<h1> Add New Item</h1>
			</div>

			<div class="clear"></div>

		</div>

	</div><!-- //pageinfo -->

	<div id="content" class="container container-twelve">
	<?php echo validation_errors(); ?>
		<div class="three columns margin10">
			
		</div>
<form method="post" accept-charset="utf-8" enctype="multipart/form-data" autocomplete="off" action="<?=base_url('add/do_upload');?>" />
		<div class="six columns">
			<h4><i class="splashy-document_a4_add"></i> Item Name</h4>
			
			<input type="text" name="name" placeholder="Item Name" style="height: 30px;">
			<span class="help-block"> This is your product name. Max 60 characters.</span>

			<h4><i class="splashy-tag"></i> Item price</h4>
			<input type="text" name="price" placeholder="Item Price" style="height: 30px;">.00 KSH
			
			<h4><i class="splashy-image_cultured"></i> Item Picture</h4>
			
			<input type="file" name="userfile" class="file" />
			<span class="help-block"> Your product Picture</span>
			
		</div>

		<div class="three columns">
			<h4>Item Properties</h4>
			<div class="accordion">
				<h5><span></span><i class="splashy-marker_rounded_light_blue"></i> Location</h5>
				<div class="content">
					<p>
						<input name="location" type="text" data-provide="typeahead" data-items="15" data-source='[ <?php $string = read_file('./legacy/ajax/locations.txt'); echo $string;?>]' />
					</p>
				</div>
				<h5><span></span><i class="splashy-documents_okay"></i> Category</h5>
				<div class="content">
					<p>
						<select name="category">
							<?php 
							$this->db->order_by('cat_name', 'asc');
							$cats = $this->db->get('categories');
							Foreach ($cats->result () as $cat):
							?>
							<option value="<?=$cat->cat_id;?>"><?=$cat->cat_name ;?></option>
							<?php endforeach;?>
						</select>
					</p>
				</div>
				<h5><span></span><i class="splashy-calendar_month_add"></i> Availability</h5>
				<div class="content">
					<p>
						<select name="availability">							
							<option value="AnyDay"> AnyDay</option>
							<option value="Weekdays"> Weekdays</option>
							<option value="Weekends"> Weekends</option>							
						</select>
					</p>
				</div>
				<p>
					<i class="wpzoom-pointer-3"></i><b> Don't forget </b>
				</p>
			</div>
		</div>

		<div class="clear"></div>
		<div class="divider"> </div>

		<div class="nine columns">
			<h4><i class="splashy-document_letter_edit"></i> Item Description</h4>
			
			<textarea id="elm1" name="desc" rows="15" cols="80" class="nine columns">
				
			</textarea>
			
			<div class="alert-info"><strong style="color: black;">Did you know?</strong> - You can style how your product appears by using some of the features on the text box.</div>
			
		</div>

		
		<div class="three columns">
			<h4><i class="splashy-tag_edit"></i> Tags</h4>
			<input type="text" name="tags" class="tag_handler" placeholder="Item tags">
			<span class="help-block">Add your item tags, use comma "," as a seperator</span>
			<div class="clear"></div>
			<h4><i class="splashy-help"></i> Quick Help</h4>
			<div class="testimonials-wrapper">
				<div class="testimonial">
					<div class="testimonial-content">
						Item name refers to name or title of your product. You can use easy to remember names. Yoou can add a maximum of 60 characters.
						</div>
					<div class="testimonial-author">Item name</div>
				</div>
				<div class="testimonial">
					<div class="testimonial-content">
						This refers to the price your item can be hired for in a day. i.e 24hrs. <b>Note </b>, do not add any decimal points after the product.
						</div>
					<div class="testimonial-author">Item Price</div>
				</div>
				<div class="testimonial">
					<div class="testimonial-content">
						Item picture must be identical to the real product you are adding. This may also serve as basis for item ownership proof.
					</div>
					<div class="testimonial-author">Item Picture</div>
				</div>
				<div class="testimonial">
					<div class="testimonial-content">
						This refers to a detailed description of your product. We use this as basis for fraud detection.
						</div>
					<div class="testimonial-author">Item Description</div>
				</div>
				<div class="testimonial-next"></div>
				<div class="testimonial-prev"></div>
			</div>
		</div>

		<div class="clear"></div>
		<div class="divider"> </div>
                
                <?php 
                    if(isset($_GET['type'])):
                        
                        if($_GET['type'] == 'vehicle'):
                            
                            $this->load->view('add_advanced/vehicles');
                            
                        endif;

                    endif;
                ?>
                
		<div class="twelve columns align-center">
			<input type="hidden" value="<?php echo random_string('alnum', 16); ?>" name="sess">
			<br>
			<button class="btn btn-large btn-info" type="submit"><i class="wpzoom-pointer"></i> Next Step</button>
			<br>
			<p>
				<i class="eco-refresh"></i>  We are doing great. Just one more step. 
			</p>
			
		</div>
</form>
		<div class="clear"></div>

	</div><!-- //content -->