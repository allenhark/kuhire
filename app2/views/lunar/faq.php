<div id="masthead">
	
	<div class="container">
		
		<div class="masthead-pad">
			
			<div class="masthead-text">
				<h2>FAQ</h2>
				<p>Frequently Asked Questions.</p>
			</div> <!-- /.masthead-text -->
			
		</div>
		
	</div> <!-- /.container -->	
	
</div> <!-- /#masthead -->




<div id="content">

	<div class="container">
		
		
		<div class="row">
			
			<div class="span8">
				
						
				<ol class="faqList">
					<?php foreach($faq -> result () as $fdata):?>
					<li>
							<h4><?=$fdata->faq_q;?></h4>
							<p><?=$fdata->faq_a;?></p>	
							
					</li>
					<?php endforeach;?>
					
				</ol>
				
			</div> <!-- /.span8 -->
			
			
			<div class="span4">
				
						
				<a data-toggle="modal" href="#question" class="btn btn-large btn-primary btn-block btn-big-block">Ask A Question</a>	
				
				
				<a href="<?=base_url('lunar/help/support');?>" class="btn btn-large btn-tertiary btn-block btn-big-block">Contact Support</a>
				
			</div> <!-- /.span4 -->
			
		</div> <!-- /.row -->
		
	
	</div> <!-- /.container -->

</div> <!-- /#content -->

</div> <!-- /#wrapper -->

<div class="modal fade hide" id="question">
  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal"><i class="splashy-error_x"></i> </button>
    <h3>Ask A question</h3>
  </div>
  <form action="" method="get">
  <div class="modal-body" >
  	<div class="span3">
    
    	<label> Question</label>
    	<textarea name="msg" placeholder="How do we assist you?" /> </textarea>
   	</div>
   
	   <div class="span2">
	   	<p>
	   		Our customer Care representative will get in touch with you shortly.
	   	</p>
	   </div>
  
  </div>
  <div class="modal-footer">
  	<button type="submit" class="btn btn-inverse"><i class="splashy-refresh_forward"></i> Ask</button>
    <a href="javascript:;" class="btn" data-dismiss="modal"><i class="splashy-remove"></i> Close</a>
    
  </div>
   </form>
</div>
