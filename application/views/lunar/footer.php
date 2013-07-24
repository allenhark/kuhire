
<div id="footer">
		
	<div class="container">
		
		<div class="row">
			
			<div class="span6">
				© 2012 <a href="http://www.scrobber.com/">Scrobber</a>, all rights reserved.
			</div> <!-- /span6 -->
			
			<div id="builtby" class="span6">
				<a href="<?=base_url('lunar');?>">Scrobber Lunar</a> / 
				<a href="<?=base_url('lunar/help');?>"> Using Lunar</a>			
			</div> <!-- /.span6 -->
			
		</div> <!-- /row -->
		
	</div> <!-- /container -->
	
</div> <!-- /#footer -->





<script src="<?=base_url('galaxy/js/');?>/libs/jquery-1.7.2.min.js"></script>
<script src="<?=base_url('galaxy/js/');?>/libs/jquery-ui-1.8.21.custom.min.js"></script>
<script src="<?=base_url('galaxy/js/');?>/libs/jquery.ui.touch-punch.min.js"></script>

<script src="<?=base_url('galaxy/js/');?>/libs/bootstrap/bootstrap.min.js"></script>

<script src="<?=base_url('galaxy/js/');?>/Theme.js"></script>
<script src="<?=base_url('galaxy/js/');?>/Charts.js"></script>

<script src="<?=base_url('galaxy/js/');?>/plugins/faq/faq.js"></script>

<script>

$(function () {
	
	Theme.init ();
	
	$('.faqList').goFaq ();
	
});

</script>

<script src="<?=base_url('galaxy/js/');?>/plugins/excanvas/excanvas.min.js"></script>
<script src="<?=base_url('galaxy/js/');?>/plugins/flot/jquery.flot.js"></script>
<script src="<?=base_url('galaxy/js/');?>/plugins/flot/jquery.flot.pie.js"></script>
<script src="<?=base_url('galaxy/js/');?>/plugins/flot/jquery.flot.orderBars.js"></script>
<script src="<?=base_url('galaxy/js/');?>/plugins/flot/jquery.flot.tooltip.min.js"></script>
<script src="<?=base_url('galaxy/js/');?>/plugins/flot/jquery.flot.resize.js"></script>

<script src="<?=base_url('galaxy/js/');?>/demos/charts/vertical.js"></script>

<script>

$(function () {
	
	Theme.init ();
	
});

</script>

</body>

</html>