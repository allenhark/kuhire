<div class="visible-phone container container-twelve">
  <a href="<?=base_url();?>"> Home </a> | <a href="<?=base_url('search');?>"> Search </a> | &copy; 2013 Scrobber
</div>
<div id="footer" class="hidden-phone">

		<div class="container container-twelve">
			<div class="twelve column well-footer align-center">
				<form class="form-inline" action="<?=base_url('search/');?>" style="margin-left: 0;"">
					<input type="text" name="s" placeholder="Quick Search?" class="span4" style="height: 30px; font-size: 14px; color: grey;" />
					<input type="text" name="price" placeholder="Price" class="span2" style="height: 30px; font-size: 14px; color: grey;" />
					<input type="text" name="location" class="span2" style="height: 30px; font-size: 14px; color: grey; width: auto;" placeholder="Location.."/>
					<input type="hidden" name="limit_min" value="0">
					<input type="hidden" name="limit_max" value="10">
					<input type="hidden" name="ref" value="Old Footer Search">
					<input type="hidden" name="terminal" value="Main">
					<input type="hidden" name="max" value="off">
					<input type="hidden" name="phone" value="null">
					<input type="hidden" name="source" value="internal" >
					<button type="submit" class="btn btn-large"><i class="splashy-zoom"></i> Find It.</button>
				</form>
			</div>
		</div>
		

	<div id="copyrights">
		<div class="container container-twelve">
			<div class="align-left six columns">
				<p>Copyright © 2013 <a href="<?=base_url();?>">Scrobber</a>.
				 All rights reserved. <a href="http://antony.scrobber.com/rights" target="_blank"> &reg; Scrobber. </a>
				 Built in <a href="http://antony.scrobber.com/built-in-nairobi" target="_blank">Nairobi</a> with love.
				</p>
			</div>
			
			<div class="six columns align-right">
				<p>
					<a href="<?=base_url('about-us');?>">About us</a> |
					<a href="<?=base_url('help/contact-us');?>">Contact us</a> | 
					<a href="<?=base_url('help');?>">Help Center</a> | 
					<a href="<?=base_url('legal/disclaimer');?>">Disclaimer</a> |
					<a href="<?=base_url('legal/tos');?>">Term of Use</a> |
					<a href="<?=base_url('legal');?>"> Legal </a> 
				</p>
			</div>
			<div class="clear"></div>
		</div>
	</div><!-- //copyrights -->

</div>


	<script type="text/javascript" src="<?=base_url('static');?>/javascripts/jquery.min.js"></script>
	<script type="text/javascript" src="<?=base_url('static');?>/javascripts/jquery.ui.min.js"></script>
	<script type="text/javascript" src="<?=base_url('static');?>/javascripts/jquery.easing.js"></script>
	<script type="text/javascript" src="<?=base_url('static');?>/javascripts/responsiveslides.min.js"></script>
	<script type="text/javascript" src="<?=base_url('static');?>/javascripts/jquery.cookies.js"></script>
	<script type="text/javascript" src="<?=base_url('static');?>/javascripts/jquery.tooltip.js"></script>
	<script type="text/javascript" src="<?=base_url('static');?>/javascripts/dareslider.js"></script>
	<script type="text/javascript" src="<?=base_url('static');?>/javascripts/isotope.min.js"></script>
	<script type="text/javascript" src="<?=base_url('static');?>/javascripts/jquery.placeholder.min.js"></script>
	<script type="text/javascript" src="<?=base_url('static');?>/javascripts/jquery.fitvids.js"></script>
	<script type="text/javascript" src="<?=base_url('static');?>/javascripts/jquery.prettyPhoto.js"></script>
	<script type="text/javascript" src="<?=base_url('static');?>/javascripts/jquery.flexslider-min.js"></script>
	<script type="text/javascript" src="<?=base_url('static');?>/javascripts/custom.js"></script>
	<script type="text/javascript" src="<?=base_url('static/js');?>/bootstrap.js"></script> 
	
            <!-- styled form elements -->
            <script src="<?=base_url('legacy/v3');?>/lib/uniform/jquery.uniform.min.js"></script>
            <!-- animated progressbars -->
            <script src="<?=base_url('legacy/v3');?>/js/forms/jquery.progressbar.anim.js"></script>
            <!-- multiselect -->
            <script src="<?=base_url('legacy/v3');?>/lib/multiselect/js/jquery.multi-select.min.js"></script>
            <!-- enhanced select (chosen) -->
            <script src="<?=base_url('legacy/v3');?>/lib/chosen/chosen.jquery.min.js"></script>
            <script src="<?=base_url('legacy/v3');?>/lib/qtip2/jquery.qtip.min.js"></script>
            <script src="<?=base_url('legacy/v3');?>/lib/colorbox/jquery.colorbox.min.js"></script>
            <!-- hidden elements width/height -->
			<script src="<?=base_url('legacy/v3');?>/js/jquery.actual.min.js"></script>
            <!-- common functions -->
			<script src="<?=base_url('legacy/v3');?>/js/gebo_common.js"></script>


	<!-- Iphone fix ============================ -->
	<script type="text/javascript" src="<?=base_url('static/plugins');?>/ios-fix/ios-orientationchange-fix.js"></script> 
	<script type="text/javascript" src="<?=base_url('static/plugins');?>/nicescroll/jquery.nicescroll.js"></script> 
	
</body>

</html>