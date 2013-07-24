<section id="main">    
<div class="body-text">

        <div class="container-fluid">

            <div class="row-fluid">
        <div>
            
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

                                <div class="span3" style="margin-left: 3px;">
                                    <h3><strong>2.</strong> <span>Configuration </span></h3>

                                    <div class="controls">
                                        <label class="control-label"> Item Location</label>
                                        <input type="hidden" name="l1" value="choose" /> 
                                    
                                     
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
                                <div class="span5" style="margin-left: 40px;">
                                    <h3><strong>3.</strong> <span>Image upload</span></h3>

                                    <div class="fileupload fileupload-new control-group" data-provides="fileupload">
                                        <label class="control-label" for="inputPropertyPrice">
                                            Image files
                                        </label>

                                        
                                                <input type="file" name="userfile" />
                                           
                                        </div><!-- /.input-append -->
                                    </div><!-- .fileupload -->

                                    <div class="control-group" style="margin-left: 40px;">
                                        <label class="control-label" for="inputPropertyNotes" >
                                            <span style="margin-left: 40px;"> Briefly describe your product </span>
                                        </label>
                                        <div class="controls">
                                            <textarea class="span3 auto-size auto-width auto_expand" name="desc"style="margin-left: 40px; width: 300px; height: 200px;" ></textarea>
                                        </div><!-- /.controls -->
                                    </div><!-- /.control-group -->
                                </div><!-- /.span4 -->


                            </div><!-- /.row -->

                            <div class="span12" >

                                <button type="submit" class="btn btn-large span4 align-center btn-success btn-big-block btn-block" style="text-align: center; float: right;">List Item</button>
                                
                            </div>
                            <div class="diviver"> &nbsp; </div><div class="diviver"> &nbsp; </div>
                        </form>
                    </div><!-- /.content -->
                </div><!-- /.list-your-property-form -->        </div>
        </div>
    </div>

</div><!-- /#content -->
</div>
</section>