<div id="content">
    <div class="container">
        <div>
            <div id="main">
                <div class="list-your-property-form">
                    <h2 class="page-header">Add a listing</h2>

                    <div class="content">
                        <div class="row">
                            <div class="span12">
                                <p>
                                   Reach a wider market by adding your product on Scrobber. 
                                </p>
                            </div><!-- /.span8 -->
                            <div class="span4">
                                <?php if (validation_errors()): ?>
                                    <div class="alert alert-error">
                                        <?php echo validation_errors(); ?>
                                    </div>
                                <?php endif; ?>
                            </div>
                        </div><!-- /.row -->

                        <form method="post" action="<?= base_url('add'); ?>" enctype="multipart/form-data">
                            <div class="row">
                                
                                <div class="span4">

                                    <h3><strong>1.</strong> <span>Item basic info</span></h3>
                                    
                                    <div class="control-group">
                                        <label class="control-label" for="Name">
                                            Item Name
                                            <span class="form-required" title="This field is required.">*</span>
                                        </label>
                                        <div class="controls">
                                            <input type="text" id="inputPropertyName" name="name">
                                        </div><!-- /.controls -->
                                    </div><!-- /.control-group -->

                                    <div class="control-group">
                                        <label class="control-label" for="inputPropertyPrice">
                                            Item Price
                                            <span class="form-required" title="This field is required.">*</span>
                                        </label>
                                        <div class="controls">
                                            <input type="text" name="price" id="inputPropertyPrice">
                                        </div><!-- /.controls -->
                                    </div><!-- /.control-group -->
                                    
                                    <div class="control-group">
                                        <label class="control-label" for="inputPropertyPrice">
                                            Item Tags
                                            <span class="form-required" title="This field is required.">*</span>
                                        </label>
                                        <div class="controls">
                                            <input type="text" name="tags" id="inputPropertyPrice">
                                        </div><!-- /.controls -->
                                        <span class="help-inline"> Separate tags with a comma</span>
                                    </div><!-- /.control-group -->

                                    <div class="control-group">
                                        <label class="control-label" for="inputPropertyPropertyType">
                                            Category
                                            <span class="form-required" title="This field is required.">*</span>
                                        </label>
                                        <div class="controls">
                                            <select id="inputPropertyPropertyType" name="category">
                                                <option id="apartment1">Please Select</option>
                                                <?php
                                                $this->db->order_by('cat_name', 'asc');
                                                $cats = $this->db->get('categories');
                                                Foreach ($cats->result() as $cat):
                                                    ?>
                                                    <option value="<?= $cat->cat_id; ?>"><?= humanize($cat->cat_name); ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div><!-- /.controls -->
                                    </div><!-- /.control-group -->


                                </div><!-- /.span4 -->

                                <div class="span3">
                                    <h3><strong>2.</strong> <span>Configuration </span></h3>

                                    <div class="controls">
                                        <label class="control-label"> Item Location</label>
                                        <input type="radio" name="l1" value="same" checked="checked" /> Same as current
                                        <input type="radio" name="l1" value="choose" /> Type below
                                    
                                     <p> 
                                         Current location <span class="label label-info">  <?=$this->session->userdata('ip_city');?></span>
                                     </p>
                                     <div class="control-group">
                                         <label class="control-label" for="inputPropertyPrice">
                                            Location
                                            
                                        </label>
                                        <div class="controls">
                                            <input type="text" name="location" id="inputPropertyPrice">
                                        </div><!-- /.controls -->
                                     </div>
                                     
                                     <div class="control-group">
                                         <label class="control-label" for="inputPropertyPrice">
                                            Region or City
                                            
                                        </label>
                                        <div class="controls">
                                            <input type="text" name="region" id="inputPropertyPrice">
                                        </div><!-- /.controls -->
                                     </div>
                                     
                                     <div class="control-group">
                                         <label class="control-label" for="inputPropertyPrice">
                                            Country
                                            
                                        </label>
                                        <div class="controls">
                                            <input type="text" name="country" id="inputPropertyPrice" value="<?=$this->session->userdata('ip_country');?>">
                                        </div><!-- /.controls -->
                                     </div>
                                     
                                     </div>


                                </div><!-- /.span4 -->
                                <input type="hidden" value="<?php echo random_string('alnum', 16); ?>" name="sess">
                                <div class="span5">
                                    <h3><strong>3.</strong> <span>Image upload</span></h3>

                                    <div class="fileupload fileupload-new control-group" data-provides="fileupload">
                                        <label class="control-label" for="inputPropertyPrice">
                                            Image files
                                        </label>

                                        <div class="input-append">
                                            <div class="uneditable-input">
                                                <i class="icon-file fileupload-exists"></i>
                                                <span class="fileupload-preview"></span>
                                            </div>
                                            <span class="btn btn-file">
                                                <span class="fileupload-new">Select file</span>
                                                <span class="fileupload-exists">Change</span>
                                                <input type="file" name="userfile" />
                                            </span>
                                            <a href="#" class="btn fileupload-exists" data-dismiss="fileupload">Remove</a>
                                        </div><!-- /.input-append -->
                                    </div><!-- .fileupload -->

                                    <div class="control-group">
                                        <label class="control-label" for="inputPropertyNotes">
                                            Briefly describe your product
                                            <span class="form-required" title="This field is required.">*</span>
                                        </label>
                                        <div class="controls">
                                            <textarea id="inputPropertyNotes elm1" name="desc" ></textarea>
                                        </div><!-- /.controls -->
                                    </div><!-- /.control-group -->
                                </div><!-- /.span4 -->


                            </div><!-- /.row -->

                            <div class="span12" >

                                <button type="submit" class="btn btn-large span4 align-center btn-success btn-big-block btn-block" style="text-align: center; float: right;">List Item</button>

                            </div>

                        </form>
                    </div><!-- /.content -->
                </div><!-- /.list-your-property-form -->        </div>
        </div>
    </div>

</div><!-- /#content -->
</div>