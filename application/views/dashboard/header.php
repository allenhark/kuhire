<?php if ($main == 'profile'):?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title><?= $title; ?></title>
    
        <!-- Bootstrap framework -->
            <link rel="stylesheet" href="<?= base_url(); ?>legacy/v3/bootstrap/css/bootstrap.min.css" />
            <link rel="stylesheet" href="<?= base_url(); ?>legacy/v3/bootstrap/css/bootstrap-responsive.min.css" />
        <!-- gebo blue theme-->
            <link rel="stylesheet" href="<?= base_url(); ?>legacy/v3/css/blue.css" id="link_theme" />
        <!-- breadcrumbs-->
            <link rel="stylesheet" href="<?= base_url(); ?>legacy/v3/lib/jBreadcrumbs/css/BreadCrumb.css" />
        <!-- tooltips-->
            <link rel="stylesheet" href="<?= base_url(); ?>legacy/v3/lib/qtip2/jquery.qtip.min.css" />
        <!-- notifications -->
            <link rel="stylesheet" href="<?= base_url(); ?>legacy/v3/lib/sticky/sticky.css" />    
        <!-- splashy icons -->
            <link rel="stylesheet" href="<?= base_url(); ?>legacy/v3/img/splashy/splashy.css" />
        <!-- enhanced select -->
            <link rel="stylesheet" href="<?= base_url(); ?>legacy/v3/lib/chosen/chosen.css" />
        <!-- colorbox -->
        <link rel="stylesheet" href="<?= base_url(); ?>legacy/v3/img/flags/flags.css" />
            <link rel="stylesheet" href="<?= base_url(); ?>legacy/v3/lib/colorbox/colorbox.css" />
            
        <!-- main styles -->
            <link rel="stylesheet" href="<?= base_url(); ?>legacy/v3/css/style.css" />
            
            <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=PT+Sans" />
    
        <!-- Favicon -->
            <link rel="shortcut icon" href="<?= base_url(); ?>legacy/v3/favicon.ico" />
        
        <!--[if lte IE 8]>
            <link rel="stylesheet" href="<?=base_url();?>legacy/v3/css/ie.css" />
            <script src="<?=base_url();?>legacy/v3/js/ie/html5.js"></script>
            <script src="<?=base_url();?>legacy/v3/js/ie/respond.min.js"></script>
        <![endif]-->
        
        <div id="fb-root"></div>
<script>
	( function(d, s, id) {
			var js, fjs = d.getElementsByTagName(s)[0];
			if (d.getElementById(id))
				return;
			js = d.createElement(s);
			js.id = id;
			js.src = "//connect.facebook.net/en_US/all.js#xfbml=1&appId=478729088822838";
			fjs.parentNode.insertBefore(js, fjs);
		}(document, 'script', 'facebook-jssdk'));
</script>
    </head>

<?php elseif ($main == 'dashboard' | $main == 'roadblock'): ?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title><?= $title; ?></title>
    	<link rel="stylesheet" href="<?= base_url(); ?>legacy/v3/img/flags/flags.css" />
        <!-- Bootstrap framework -->
            <link rel="stylesheet" href="<?= base_url(); ?>legacy/v3/bootstrap/css/bootstrap.min.css" />
            <link rel="stylesheet" href="<?= base_url(); ?>legacy/v3/bootstrap/css/bootstrap-responsive.min.css" />
        <!-- gebo blue theme-->
            <link rel="stylesheet" href="<?= base_url(); ?>legacy/v3/css/blue.css" id="link_theme" />
        <!-- breadcrumbs-->
            <link rel="stylesheet" href="<?= base_url(); ?>legacy/v3/lib/jBreadcrumbs/css/BreadCrumb.css" />
        <!-- tooltips-->
            <link rel="stylesheet" href="<?= base_url(); ?>legacy/v3/lib/qtip2/jquery.qtip.min.css" />
        <!-- colorbox -->
            <link rel="stylesheet" href="<?= base_url(); ?>legacy/v3/lib/colorbox/colorbox.css" />    
        <!-- code prettify -->
            <link rel="stylesheet" href="<?= base_url(); ?>legacy/v3/lib/google-code-prettify/prettify.css" />    
        <!-- notifications -->
            <link rel="stylesheet" href="<?= base_url(); ?>legacy/v3/lib/sticky/sticky.css" />    
        <!-- splashy icons -->
            <link rel="stylesheet" href="<?= base_url(); ?>legacy/v3/img/splashy/splashy.css" />
        <!-- flags -->
            <link rel="stylesheet" href="<?= base_url(); ?>legacy/v3/img/flags/flags.css" />    
        <!-- calendar -->
            <link rel="stylesheet" href="<?= base_url(); ?>legacy/v3/lib/fullcalendar/fullcalendar_gebo.css" />
            
        <!-- main styles -->
            <link rel="stylesheet" href="<?= base_url(); ?>legacy/v3/css/style.css" />
            
            <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=PT+Sans" />
    
        <!-- Favicon -->
            <link rel="shortcut icon" href="<?= base_url(); ?>legacy/v3/favicon.ico" />
        
        <!--[if lte IE 8]>
            <link rel="stylesheet" href="<?=base_url();?>legacy/v3/css/ie.css" />
            <script src="<?=base_url();?>legacy/v3/js/ie/html5.js"></script>
            <script src="<?=base_url();?>legacy/v3/js/ie/respond.min.js"></script>
            <script src="<?=base_url();?>legacy/v3/lib/flot/excanvas.min.js"></script>
        <![endif]-->
<script>
	( function(d, s, id) {
			var js, fjs = d.getElementsByTagName(s)[0];
			if (d.getElementById(id))
				return;
			js = d.createElement(s);
			js.id = id;
			js.src = "//connect.facebook.net/en_US/all.js#xfbml=1&appId=478729088822838";
			fjs.parentNode.insertBefore(js, fjs);
		}(document, 'script', 'facebook-jssdk'));
</script>
</head>

<?php elseif ($main == 'new'): ?>

    <!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title><?= $title; ?></title>
    	<link rel="stylesheet" href="<?= base_url(); ?>legacy/v3/img/flags/flags.css" />
        <!-- Bootstrap framework -->
            <link rel="stylesheet" href="<?= base_url(); ?>legacy/v3/bootstrap/css/bootstrap.min.css" />
            <link rel="stylesheet" href="<?= base_url(); ?>legacy/v3/bootstrap/css/bootstrap-responsive.min.css" />
        <!-- jQuery UI theme-->
            <link rel="stylesheet" href="<?= base_url(); ?>legacy/v3/lib/jquery-ui/css/Aristo/Aristo.css" />
        <!-- gebo blue theme-->
            <link rel="stylesheet" href="<?= base_url(); ?>legacy/v3/css/blue.css" id="link_theme" />
        <!-- breadcrumbs-->
            <link rel="stylesheet" href="<?= base_url(); ?>legacy/v3/lib/jBreadcrumbs/css/BreadCrumb.css" />
        <!-- tooltips-->
            <link rel="stylesheet" href="<?= base_url(); ?>legacy/v3/lib/qtip2/jquery.qtip.min.css" />
        <!-- notifications -->
            <link rel="stylesheet" href="<?= base_url(); ?>legacy/v3/lib/sticky/sticky.css" />
        <!-- code prettify -->
            <link rel="stylesheet" href="<?= base_url(); ?>legacy/v3/lib/google-code-prettify/prettify.css" />    
        <!-- notifications -->
            <link rel="stylesheet" href="<?= base_url(); ?>legacy/v3/lib/sticky/sticky.css" />    
        <!-- splashy icons -->
            <link rel="stylesheet" href="<?= base_url(); ?>legacy/v3/img/splashy/splashy.css" />
        <!-- datepicker -->
            <link rel="stylesheet" href="<?= base_url(); ?>legacy/v3/lib/datepicker/datepicker.css" />
        <!-- tag handler -->
            <link rel="stylesheet" href="<?= base_url(); ?>legacy/v3/lib/tag_handler/css/jquery.taghandler.css" />
        <!-- nice form elements -->
            <link rel="stylesheet" href="<?= base_url(); ?>legacy/v3/lib/uniform/Aristo/uniform.aristo.css" />
        <!-- 2col multiselect -->
            <link rel="stylesheet" href="<?= base_url(); ?>legacy/v3/lib/multiselect/css/multi-select.css" />
        <!-- enhanced select -->
            <link rel="stylesheet" href="<?= base_url(); ?>legacy/v3/lib/chosen/chosen.css" />
        <!-- upload -->
            <link rel="stylesheet" href="<?= base_url(); ?>legacy/v3/lib/plupload/js/jquery.plupload.queue/css/plupload-gebo.css" />
        <!-- colorbox -->
            <link rel="stylesheet" href="<?= base_url(); ?>legacy/v3/lib/colorbox/colorbox.css" />
        <!-- colorpicker -->
            <link rel="stylesheet" href="<?= base_url(); ?>legacy/v3/lib/colorpicker/css/colorpicker.css" />    
            
        <!-- main styles -->
            <link rel="stylesheet" href="<?= base_url(); ?>legacy/v3/css/style.css" />
            
            <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=PT+Sans" />
    
        <!-- Favicon -->
            <link rel="shortcut icon" href="<?= base_url(); ?>legacy/v3/favicon.ico" />
        
        <!--[if lte IE 8]>
            <link rel="stylesheet" href="<?=base_url();?>legacy/v3/css/ie.css" />
            <script src="<?=base_url();?>legacy/v3/js/ie/html5.js"></script>
            <script src="<?=base_url();?>legacy/v3/js/ie/respond.min.js"></script>
        <![endif]-->

<script type="text/javascript" src="<?=base_url('legacy');?>/editor/jscripts/tiny_mce/tiny_mce.js"></script>
<script type="text/javascript">
    tinyMCE.init({
        mode : "textareas",
        theme : "simple"
    });
</script>
<!-- tiny mce -->

        <div id="fb-root"></div>
<script>
	( function(d, s, id) {
			var js, fjs = d.getElementsByTagName(s)[0];
			if (d.getElementById(id))
				return;
			js = d.createElement(s);
			js.id = id;
			js.src = "//connect.facebook.net/en_US/all.js#xfbml=1&appId=478729088822838";
			fjs.parentNode.insertBefore(js, fjs);
		}(document, 'script', 'facebook-jssdk'));
</script>

    </head>

<?php elseif ($main == 'msg' | $main == 'msg_view' ): ?>
    <!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title><?= $title; ?></title>
    	<link rel="stylesheet" href="<?= base_url(); ?>legacy/v3/img/flags/flags.css" />
        <!-- Bootstrap framework -->
            <link rel="stylesheet" href="<?= base_url(); ?>legacy/v3/bootstrap/css/bootstrap.min.css" />
            <link rel="stylesheet" href="<?= base_url(); ?>legacy/v3/bootstrap/css/bootstrap-responsive.min.css" />
        <!-- jQuery UI theme-->
            <link rel="stylesheet" href="<?= base_url(); ?>legacy/v3/lib/jquery-ui/css/Aristo/Aristo.css" />
        <!-- gebo blue theme-->
            <link rel="stylesheet" href="<?= base_url(); ?>legacy/v3/css/blue.css" id="link_theme" />
        <!-- breadcrumbs-->
            <link rel="stylesheet" href="<?= base_url(); ?>legacy/v3/lib/jBreadcrumbs/css/BreadCrumb.css" />
        <!-- tooltips-->
            <link rel="stylesheet" href="<?= base_url(); ?>legacy/v3/lib/qtip2/jquery.qtip.min.css" />
        <!-- notifications -->
            <link rel="stylesheet" href="<?= base_url(); ?>legacy/v3/lib/sticky/sticky.css" />
        <!-- code prettify -->
            <link rel="stylesheet" href="<?= base_url(); ?>legacy/v3/lib/google-code-prettify/prettify.css" />    
        <!-- notifications -->
            <link rel="stylesheet" href="<?= base_url(); ?>legacy/v3/lib/sticky/sticky.css" />    
        <!-- splashy icons -->
            <link rel="stylesheet" href="<?= base_url(); ?>legacy/v3/img/splashy/splashy.css" />
        <!-- datepicker -->
            <link rel="stylesheet" href="<?= base_url(); ?>legacy/v3/lib/datepicker/datepicker.css" />
        <!-- tag handler -->
            <link rel="stylesheet" href="<?= base_url(); ?>legacy/v3/lib/tag_handler/css/jquery.taghandler.css" />
        <!-- nice form elements -->
            <link rel="stylesheet" href="<?= base_url(); ?>legacy/v3/lib/uniform/Aristo/uniform.aristo.css" />
        <!-- 2col multiselect -->
            <link rel="stylesheet" href="<?= base_url(); ?>legacy/v3/lib/multiselect/css/multi-select.css" />
        <!-- enhanced select -->
            <link rel="stylesheet" href="<?= base_url(); ?>legacy/v3/lib/chosen/chosen.css" />
        <!-- upload -->
            <link rel="stylesheet" href="<?= base_url(); ?>legacy/v3/lib/plupload/js/jquery.plupload.queue/css/plupload-gebo.css" />
        <!-- colorbox -->
            <link rel="stylesheet" href="<?= base_url(); ?>legacy/v3/lib/colorbox/colorbox.css" />
        <!-- colorpicker -->
            <link rel="stylesheet" href="<?= base_url(); ?>legacy/v3/lib/colorpicker/css/colorpicker.css" />    
            
        <!-- main styles -->
            <link rel="stylesheet" href="<?= base_url(); ?>legacy/v3/css/style.css" />
            
            <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=PT+Sans" />
    
        <!-- Favicon -->
            <link rel="shortcut icon" href="<?= base_url(); ?>legacy/v3/favicon.ico" />
        
        <!--[if lte IE 8]>
            <link rel="stylesheet" href="<?=base_url();?>legacy/v3/css/ie.css" />
            <script src="<?=base_url();?>legacy/v3/js/ie/html5.js"></script>
            <script src="<?=base_url();?>legacy/v3/js/ie/respond.min.js"></script>
        <![endif]-->
        
        
        <script>
			( function(d, s, id) {
					var js, fjs = d.getElementsByTagName(s)[0];
					if (d.getElementById(id))
						return;
					js = d.createElement(s);
					js.id = id;
					js.src = "//connect.facebook.net/en_US/all.js#xfbml=1&appId=478729088822838";
					fjs.parentNode.insertBefore(js, fjs);
				}(document, 'script', 'facebook-jssdk'));
</script>
    </head>

<?php elseif ($main == "products"): ?>
	<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title><?= $title; ?></title>
    	<link rel="stylesheet" href="<?= base_url(); ?>legacy/v3/img/flags/flags.css" />
        <!-- Bootstrap framework -->
            <link rel="stylesheet" href="<?= base_url(); ?>legacy/v3/bootstrap/css/bootstrap.min.css" />
            <link rel="stylesheet" href="<?= base_url(); ?>legacy/v3/bootstrap/css/bootstrap-responsive.min.css" />
        <!-- gebo blue theme-->
            <link rel="stylesheet" href="<?= base_url(); ?>legacy/v3/css/blue.css" id="link_theme" />
        <!-- breadcrumbs-->
            <link rel="stylesheet" href="<?= base_url(); ?>legacy/v3/lib/jBreadcrumbs/css/BreadCrumb.css" />
        <!-- tooltips-->
            <link rel="stylesheet" href="<?= base_url(); ?>legacy/v3/lib/qtip2/jquery.qtip.min.css" />
        <!-- notifications -->
            <link rel="stylesheet" href="<?= base_url(); ?>legacy/v3/lib/sticky/sticky.css" />
		<!-- colorbox -->
            <link rel="stylesheet" href="<?= base_url(); ?>legacy/v3/lib/colorbox/colorbox.css" />
	    <!-- notifications -->
            <link rel="stylesheet" href="<?= base_url(); ?>legacy/v3/lib/sticky/sticky.css" />    
        <!-- splashy icons -->
            <link rel="stylesheet" href="<?= base_url(); ?>legacy/v3/img/splashy/splashy.css" />
		
        <!-- main styles -->
            <link rel="stylesheet" href="<?= base_url(); ?>legacy/v3/css/style.css" />
			
            <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=PT+Sans" />
	
        <!-- Favicon -->
            <link rel="shortcut icon" href="<?= base_url(); ?>legacy/v3/favicon.ico" />
		
        <!--[if lte IE 8]>
            <link rel="stylesheet" href="<?=base_url();?>legacy/v3/css/ie.css" />
            <script src="<?=base_url();?>legacy/v3/js/ie/html5.js"></script>
			<script src="<?=base_url();?>legacy/v3/js/ie/respond.min.js"></script>
        <![endif]-->
	 <script>
		( function(d, s, id) {
				var js, fjs = d.getElementsByTagName(s)[0];
				if (d.getElementById(id))
					return;
				js = d.createElement(s);
				js.id = id;
				js.src = "//connect.facebook.net/en_US/all.js#xfbml=1&appId=478729088822838";
				fjs.parentNode.insertBefore(js, fjs);
			}(document, 'script', 'facebook-jssdk'));
</script>
    </head>

<?php endif; ?>
