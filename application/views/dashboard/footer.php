</div>
<?php if ($main == 'msg' | $main == 'msg_view'):?>
<script src="<?=base_url(); ?>legacy/v3/js/jquery.min.js"></script>
<!-- smart resize event -->
<script src="<?=base_url(); ?>legacy/v3/js/jquery.debouncedresize.min.js"></script>
<!-- hidden elements width/height -->
<script src="<?=base_url(); ?>legacy/v3/js/jquery.actual.min.js"></script>
<!-- js cookie plugin -->
<script src="<?=base_url(); ?>legacy/v3/js/jquery.cookie.min.js"></script>
<!-- main bootstrap js -->
<script src="<?=base_url(); ?>legacy/v3/bootstrap/js/bootstrap.min.js"></script>
<!-- tooltips -->
<script src="<?=base_url(); ?>legacy/v3/lib/qtip2/jquery.qtip.min.js"></script>
<!-- jBreadcrumbs -->
<script src="<?=base_url(); ?>legacy/v3/lib/jBreadcrumbs/js/jquery.jBreadCrumb.1.1.min.js"></script>
<!-- fix for ios orientation change -->
<script src="<?=base_url(); ?>legacy/v3/js/ios-orientationchange-fix.js"></script>
<!-- scroll -->
<script src="<?=base_url(); ?>legacy/v3/lib/antiscroll/antiscroll.js"></script>
<script src="<?=base_url(); ?>legacy/v3/lib/antiscroll/jquery-mousewheel.js"></script>
<!-- common functions -->
<script src="<?//=base_url(); ?>legacy/v3/js/gebo_common.js"></script>

<script src="<?=base_url(); ?>legacy/v3/lib/jquery-ui/jquery-ui-1.8.20.custom.min.js"></script>
<!-- touch events for jquery ui-->
<script src="<?=base_url(); ?>legacy/v3/js/forms/jquery.ui.touch-punch.min.js"></script>
<!-- colorbox -->
<script src="<?=base_url(); ?>legacy/v3/lib/colorbox/jquery.colorbox.min.js"></script>
<!-- datatable (inbox,outbox) -->
<script src="<?=base_url(); ?>legacy/v3/lib/datatables/jquery.dataTables.min.js"></script>
<!-- additional sorting for datatables -->
<script src="<?=base_url(); ?>legacy/v3/lib/datatables/jquery.dataTables.sorting.js"></script>
<!-- plupload and all it's runtimes and the jQuery queue widget (attachments) -->
<script type="text/javascript" src="<?=base_url(); ?>legacy/v3/lib/plupload/js/plupload.full.js"></script>
<script type="text/javascript" src="<?=base_url(); ?>legacy/v3/lib/plupload/js/jquery.plupload.queue/jquery.plupload.queue.full.js"></script>
<!-- autosize textareas (new message) -->
<script src="<?=base_url(); ?>legacy/v3/js/forms/jquery.autosize.min.js"></script>
<!-- tag handler (recipients) -->
<script src="<?=base_url(); ?>legacy/v3/lib/tag_handler/jquery.taghandler.min.js"></script>
<!-- mailbox functions -->
<script src="<? // =base_url(); ?>legacy/v3/js/gebo_mailbox.js"></script>

<script>
	$(document).ready(function() {
		//* show all elements & remove preloader
		setTimeout('$("html").removeClass("js")', 1000);
	}); 
</script>

</div>
</body>
</html>
<?php elseif ($main == "products"): ?>

<script src="<?=base_url(); ?>legacy/v3/js/jquery.min.js"></script>
<!-- smart resize event -->
<script src="<?=base_url(); ?>legacy/v3/js/jquery.debouncedresize.min.js"></script>
<!-- hidden elements width/height -->
<script src="<?=base_url(); ?>legacy/v3/js/jquery.actual.min.js"></script>
<!-- js cookie plugin -->
<script src="<?=base_url(); ?>legacy/v3/js/jquery.cookie.min.js"></script>
<!-- main bootstrap js -->
<script src="<?=base_url(); ?>legacy/v3/bootstrap/js/bootstrap.min.js"></script>
<!-- bootstrap plugins -->
<script src="<?=base_url(); ?>legacy/v3/js/bootstrap.plugins.min.js"></script>
<!-- tooltips -->
<script src="<?=base_url(); ?>legacy/v3/lib/qtip2/jquery.qtip.min.js"></script>
<!-- jBreadcrumbs -->
<script src="<?=base_url(); ?>legacy/v3/lib/jBreadcrumbs/js/jquery.jBreadCrumb.1.1.min.js"></script>
<!-- sticky messages -->
<script src="<?=base_url(); ?>legacy/v3/lib/sticky/sticky.min.js"></script>
<!-- fix for ios orientation change -->
<script src="<?=base_url(); ?>legacy/v3/js/ios-orientationchange-fix.js"></script>
<!-- scrollbar -->
<script src="<?=base_url(); ?>legacy/v3/lib/antiscroll/antiscroll.js"></script>
<script src="<?=base_url(); ?>legacy/v3/lib/antiscroll/jquery-mousewheel.js"></script>
<!-- common functions -->
<script src="<?=base_url(); ?>legacy/v3/js/gebo_common.js"></script>

<!-- colorbox -->
<script src="lib/colorbox/jquery.colorbox.min.js"></script>
<!-- datatable -->
<script src="<?=base_url(); ?>legacy/v3/lib/datatables/jquery.dataTables.min.js"></script>
<!-- additional sorting for datatables -->
<script src="<?=base_url(); ?>legacy/v3/lib/datatables/jquery.dataTables.sorting.js"></script>
<!-- tables functions -->
<script src="<?=base_url(); ?>legacy/v3/js/gebo_tables.js"></script>

<script>
	$(document).ready(function() {
		//* show all elements & remove preloader
		setTimeout('$("html").removeClass("js")', 1000);
	}); 
</script>

</div>
</body>
</html>

<?php elseif ($main == 'new') : ?>
<script src="<?=base_url(); ?>legacy/v3/js/jquery.min.js"></script>
<!-- smart resize event -->
<script src="<?=base_url(); ?>legacy/v3/js/jquery.debouncedresize.min.js"></script>
<!-- hidden elements width/height -->
<script src="<?=base_url(); ?>legacy/v3/js/jquery.actual.min.js"></script>
<!-- js cookie plugin -->
<script src="<?=base_url(); ?>legacy/v3/js/jquery.cookie.min.js"></script>
<!-- main bootstrap js -->
<script src="<?=base_url(); ?>legacy/v3/bootstrap/js/bootstrap.min.js"></script>
<!-- bootstrap plugins -->
<script src="<?=base_url(); ?>legacy/v3/js/bootstrap.plugins.min.js"></script>
<!-- tooltips -->
<script src="<?=base_url(); ?>legacy/v3/lib/qtip2/jquery.qtip.min.js"></script>
<!-- jBreadcrumbs -->
<script src="<?=base_url(); ?>legacy/v3/lib/jBreadcrumbs/js/jquery.jBreadCrumb.1.1.min.js"></script>
<!-- sticky messages -->
<script src="<?=base_url(); ?>legacy/v3/lib/sticky/sticky.min.js"></script>
<!-- fix for ios orientation change -->
<script src="<?=base_url(); ?>legacy/v3/js/ios-orientationchange-fix.js"></script>
<!-- scrollbar -->
<script src="<?=base_url(); ?>legacy/v3/lib/antiscroll/antiscroll.js"></script>
<script src="<?=base_url(); ?>legacy/v3/lib/antiscroll/jquery-mousewheel.js"></script>
<!-- lightbox -->
<script src="<?=base_url(); ?>legacy/v3/lib/colorbox/jquery.colorbox.min.js"></script>
<!-- common functions -->
<script src="<?=base_url(); ?>legacy/v3/js/gebo_common.js"></script>

<script src="<?=base_url(); ?>legacy/v3/lib/jquery-ui/jquery-ui-1.8.20.custom.min.js"></script>
<!-- touch events for jquery ui-->
<script src="<?=base_url(); ?>legacy/v3/js/forms/jquery.ui.touch-punch.min.js"></script>
<!-- masked inputs -->
<script src="<?=base_url(); ?>legacy/v3/js/forms/jquery.inputmask.min.js"></script>
<!-- autosize textareas -->
<script src="<?=base_url(); ?>legacy/v3/js/forms/jquery.autosize.min.js"></script>
<!-- textarea limiter/counter -->
<script src="<?=base_url(); ?>legacy/v3/js/forms/jquery.counter.min.js"></script>
<!-- datepicker -->
<script src="<?=base_url(); ?>legacy/v3/lib/datepicker/bootstrap-datepicker.min.js"></script>
<!-- timepicker -->
<script src="<?=base_url(); ?>legacy/v3/lib/datepicker/bootstrap-timepicker.min.js"></script>
<!-- tag handler -->
<script src="<?=base_url(); ?>legacy/v3/lib/tag_handler/jquery.taghandler.min.js"></script>
<!-- input spinners -->
<script src="<?=base_url(); ?>legacy/v3/js/forms/jquery.spinners.min.js"></script>
<!-- styled form elements -->
<script src="<?=base_url(); ?>legacy/v3/lib/uniform/jquery.uniform.min.js"></script>
<!-- animated progressbars -->
<script src="<?=base_url(); ?>legacy/v3/js/forms/jquery.progressbar.anim.js"></script>
<!-- multiselect -->
<script src="<?=base_url(); ?>legacy/v3/lib/multiselect/js/jquery.multi-select.min.js"></script>
<!-- enhanced select (chosen) -->
<script src="<?=base_url(); ?>legacy/v3/lib/chosen/chosen.jquery.min.js"></script>
<!-- TinyMce WYSIWG editor -->
<script src="<?=base_url(); ?>legacy/v3/lib/tiny_mce/jquery.tinymce.js"></script>
<!-- plupload and all it's runtimes and the jQuery queue widget (attachments) -->
<script type="text/javascript" src="<?=base_url(); ?>legacy/v3/lib/plupload/js/plupload.full.js"></script>
<script type="text/javascript" src="<?=base_url(); ?>legacy/v3/lib/plupload/js/jquery.plupload.queue/jquery.plupload.queue.full.js"></script>
<!-- colorpicker -->
<script src="<?=base_url(); ?>legacy/v3/lib/colorpicker/bootstrap-colorpicker.js"></script>
<!-- form functions -->
<script src="<?=base_url(); ?>legacy/v3/js/gebo_forms.js"></script>

<script>
	$(document).ready(function() {
		//* show all elements & remove preloader
		setTimeout('$("html").removeClass("js")', 1000);
	}); 
</script>

</div>
</body>
</html>

<?php elseif ($main == 'profile'): ?>
<script src="<?=base_url(); ?>legacy/v3/js/jquery.min.js"></script>
<!-- smart resize event -->
<script src="<?=base_url(); ?>legacy/v3/js/jquery.debouncedresize.min.js"></script>
<!-- hidden elements width/height -->
<script src="<?=base_url(); ?>legacy/v3/js/jquery.actual.min.js"></script>
<!-- js cookie plugin -->
<script src="<?=base_url(); ?>legacy/v3/js/jquery.cookie.min.js"></script>
<!-- main bootstrap js -->
<script src="<?=base_url(); ?>legacy/v3/bootstrap/js/bootstrap.min.js"></script>
<!-- tooltips -->
<script src="<?=base_url(); ?>legacy/v3/lib/qtip2/jquery.qtip.min.js"></script>
<!-- jBreadcrumbs -->
<script src="<?=base_url(); ?>legacy/v3/lib/jBreadcrumbs/js/jquery.jBreadCrumb.1.1.min.js"></script>
<!-- fix for ios orientation change -->
<script src="<?=base_url(); ?>legacy/v3/js/ios-orientationchange-fix.js"></script>
<!-- scrollbar -->
<script src="<?=base_url(); ?>legacy/v3/lib/antiscroll/antiscroll.js"></script>
<script src="<?=base_url(); ?>legacy/v3/lib/antiscroll/jquery-mousewheel.js"></script>
<!-- lightbox -->
<script src="<?=base_url(); ?>legacy/v3/lib/colorbox/jquery.colorbox.min.js"></script>
<!-- common functions -->
<script src="<?=base_url(); ?>legacy/v3/js/gebo_common.js"></script>

<!-- bootstrap plugins -->
<script src="<?=base_url(); ?>legacy/v3/js/bootstrap.plugins.min.js"></script>
<!-- autosize textareas -->
<script src="<?=base_url(); ?>legacy/v3/js/forms/jquery.autosize.min.js"></script>
<!-- enhanced select -->
<script src="<?=base_url(); ?>legacy/v3/lib/chosen/chosen.jquery.min.js"></script>
<!-- user profile functions -->
<script src="<?=base_url(); ?>legacy/v3/js/gebo_user_profile.js"></script>

<script>
	$(document).ready(function() {
		//* show all elements & remove preloader
		setTimeout('$("html").removeClass("js")', 1000);
	}); 
</script>

</div>
</body>
</html>

<?php elseif ($main == 'dashboard'): ?>

<script src="<?=base_url(); ?>legacy/v3/js/jquery.min.js"></script>
<!-- smart resize event -->
<script src="<?=base_url(); ?>legacy/v3/js/jquery.debouncedresize.min.js"></script>
<!-- hidden elements width/height -->
<script src="<?=base_url(); ?>legacy/v3/js/jquery.actual.min.js"></script>
<!-- js cookie plugin -->
<script src="<?=base_url(); ?>legacy/v3/js/jquery.cookie.min.js"></script>
<!-- main bootstrap js -->
<script src="<?=base_url(); ?>legacy/v3/bootstrap/js/bootstrap.min.js"></script>
<!-- tooltips -->
<script src="<?=base_url(); ?>legacy/v3/lib/qtip2/jquery.qtip.min.js"></script>
<!-- jBreadcrumbs -->
<script src="<?=base_url(); ?>legacy/v3/lib/jBreadcrumbs/js/jquery.jBreadCrumb.1.1.min.js"></script>
<!-- lightbox -->
<script src="<?=base_url(); ?>legacy/v3/lib/colorbox/jquery.colorbox.min.js"></script>
<!-- fix for ios orientation change -->
<script src="<?=base_url(); ?>legacy/v3/js/ios-orientationchange-fix.js"></script>
<!-- scrollbar -->
<script src="<?=base_url(); ?>legacy/v3/lib/antiscroll/antiscroll.js"></script>
<script src="<?=base_url(); ?>legacy/v3/lib/antiscroll/jquery-mousewheel.js"></script>
<!-- common functions -->
<script src="<?=base_url(); ?>legacy/v3/js/gebo_common.js"></script>

<script src="<?=base_url(); ?>legacy/v3/lib/jquery-ui/jquery-ui-1.8.20.custom.min.js"></script>
<!-- touch events for jquery ui-->
<script src="<?=base_url(); ?>legacy/v3/js/forms/jquery.ui.touch-punch.min.js"></script>
<!-- multi-column layout -->
<script src="<?=base_url(); ?>legacy/v3/js/jquery.imagesloaded.min.js"></script>
<script src="<?=base_url(); ?>legacy/v3/js/jquery.wookmark.js"></script>
<!-- responsive table -->
<script src="<?=base_url(); ?>legacy/v3/js/jquery.mediaTable.min.js"></script>
<!-- small charts -->
<script src="<?=base_url(); ?>legacy/v3/js/jquery.peity.min.js"></script>
<!-- charts -->
<script src="<?=base_url(); ?>legacy/v3/lib/flot/jquery.flot.min.js"></script>
<script src="<?=base_url(); ?>legacy/v3/lib/flot/jquery.flot.resize.min.js"></script>
<script src="<?=base_url(); ?>legacy/v3/lib/flot/jquery.flot.pie.min.js"></script>
<!-- calendar -->
<script src="<?=base_url(); ?>legacy/v3/lib/fullcalendar/fullcalendar.min.js"></script>
<!-- sortable/filterable list -->
<script src="<?=base_url(); ?>legacy/v3/lib/list_js/list.min.js"></script>
<script src="<?=base_url(); ?>legacy/v3/lib/list_js/plugins/paging/list.paging.min.js"></script>
<!-- dashboard functions -->
<script src="<?=base_url(); ?>legacy/v3/js/gebo_dashboard.js"></script>

<script>
	$(document).ready(function() {
		//* show all elements & remove preloader
		setTimeout('$("html").removeClass("js")', 1000);
	}); 
</script>

</div>
</body>
</html>

<?php endif; ?>