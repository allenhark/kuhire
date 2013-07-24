<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">

    <head>
        <?php
        if($description == ''):
            $desc = 'Scrobber Kenya, hire anything in Kenya. Fast response';
        else:
            $desc = $description;
        endif;
        
        ?>


        <meta charset="utf-8" />
        <title><?= $title; ?></title>
        <meta name="description" content="<?= $desc; ?>" />
        
        <meta name="keywords" content="<?= $keywords; ?>" />
        <meta name="author" content="Antony Gitonga" />
        <meta name="Company" content="Scrobber | Allen Hark" />
        <meta name="generator" content="Allenhark Tulips 1.0.0" />
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	 <meta name="google-site-verification" content="MLXbZi62cFKCfOz3Xs9CCHY-GomSS8RBLsOCsmvxy5Q" />
         <!-- Fb protocal -->
         <meta property="og:title" content="<?= $desc; ?>" />
         <meta property="og:url" content="<?= base_url(uri_string()); ?>"/>
         <meta property="og:site_name" content="Scrobber Kenya"/>
         <meta property="og:type" content="website"/>
         
        <link rel="stylesheet" href="<?= base_url('static'); ?>/css/layout.css" />
        
        <link rel="stylesheet" type="text/css" media="screen" href="<?= base_url('cdn/css/bundle_customer-new.757c59c16037c0a7d974edd7547d74be7098957e.css'); ?>" />
        <!--[if lt IE 9]>
                <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
        <![endif]-->

        <!-- Mobile Specific Metas  ================================================== -->
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
        <!-- Load custom icons ===================================== -->
        <link rel="stylesheet" href="<?= base_url('static'); ?>/icons/icons.css" />
        <link rel="stylesheet" href="<?= base_url('static'); ?>/icons/splashy/splashy.css" />
        <link rel="stylesheet" href="<?= base_url('static'); ?>/stylesheets/view.css" type="text/css" media="screen" />
        <!--Base CSS ================================================== -->


        <link rel="stylesheet" href="<?= base_url('static'); ?>/css/bootstrap.css" />
        <link rel="stylesheet" href="<?= base_url('static'); ?>/css/bootstrap-responsive.css" />
        <link rel="stylesheet" href="<?= base_url('static'); ?>/stylesheets/base.css" />
        <link rel="stylesheet" href="<?= base_url('static'); ?>/stylesheets/skeleton.css" />

        <link rel="canonical" href="<?= base_url(uri_string()); ?>">


           <!-- Favicons ================================================== -->
            <link rel="shortcut icon" href="<?= base_url('static'); ?>/images/icon.ico" />

            <!-- Tinymce ============================================= -->

            <script type="text/javascript" src="<?= base_url('static/editor'); ?>/jscripts/tiny_mce/tiny_mce.js"></script>
            <script type="text/javascript" src="<?=base_url();?>/legacy/v3/lib/datepicker/bootstrap-datepicker.min.js"> </script>
            <script type="text/javascript">
                tinyMCE.init({
                    mode: "textareas",
                    theme: "advanced",
                    plugins : "autoresize,style,table,advhr,advimage,advlink,emotions,inlinepopups,preview,media,contextmenu,paste,fullscreen,noneditable,xhtmlxtras,template,advlist",
                    // Theme options
                    theme_advanced_buttons1 : "undo,redo,|,bold,italic,underline,strikethrough,|,justifyleft,justifycenter,justifyright,justifyfull,fontselect,fontsizeselect",
                    theme_advanced_buttons2 : "forecolor,backcolor,|,cut,copy,paste,pastetext,|,bullist,numlist,link,image,media,|,code,preview,fullscreen",
                    theme_advanced_buttons3 : "",
                    theme_advanced_toolbar_location : "top",  
                    theme_advanced_toolbar_align : "left",
                    theme_advanced_statusbar_location : "bottom",
                    theme_advanced_resizing : false,
                    font_size_style_values : "8pt,10px,12pt,14pt,18pt,24pt,36pt",
                    editor_deselector: "mceNoEditor"
                });
     
           </script>
            <!-- fb ============ -->
            <div id="fb-root"></div>
            <script>(function(d, s, id) {
                            var js, fjs = d.getElementsByTagName(s)[0];
                            if (d.getElementById(id))
                                return;
                            js = d.createElement(s);
                            js.id = id;
                            js.src = "//connect.facebook.net/en_US/all.js#xfbml=1&appId=478729088822838";
                            fjs.parentNode.insertBefore(js, fjs);
                        }(document, 'script', 'facebook-jssdk'));
       </script>

           
            <!-- nice form elements -->
            <link rel="stylesheet" href="<?= base_url('legacy/v3'); ?>/lib/uniform/Aristo/uniform.aristo.css" />


            
            <link rel="stylesheet" href="<?= base_url('legacy/v3'); ?>/lib/datepicker/datepicker.css" />

		<script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-34371654-1']);
  _gaq.push(['_setDomainName', 'scrobber.com']);
  _gaq.push(['_setAllowLinker', true]);
  _gaq.push(['_setCampNameKey', 'ref']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>

    </head>