<!DOCTYPE html>
<html lang="en">
	<!--begin head-->
	<head>
		<meta charset="utf-8">
		<title><?=$title;?></title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<!-- set content to full screen on iphones -->
		<meta name="apple-mobile-web-app-capable" content="yes">
		<meta name="description" content="Kuhire.com is a web rental marketplace. It brings along businesses with merchandise or services to rent out with customers eager to rent them.">
		<meta name="author" content="Antony Gitonga">
                <meta property="og:title" content="<?=$title;?>">
			<meta property="og:url" content="<?=base_url(uri_string());?>">
			<meta property="og:site_name" content="Scrobber">
			<meta property="fb:app_id" content="478729088822838">
			<meta property="description" content="Kuhire.com is a web rental marketplace. It brings along businesses with merchandise or services to rent out with customers eager to rent them.">
			
			<?php if(isset($row)):;?>
			<meta property="og:image" content="<?=base_url('images/'.$row->image);?>" />
                        <?php else:?>
                        <meta property="og:image" content="<?= base_url('peach/img/scrobber-2.png'); ?>" />
			<?php endif; ?>

        <!--[if lte IE 6]>
            <link rel="stylesheet" href="//universal-ie6-css.googlecode.com/files/ie6.1.1.css" media="screen, projection">
        <![endif]-->

		<!--[if !lte IE 6]><!-->
            <!-- Load Google Web Font -->
            <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700' rel='stylesheet' type='text/css'>
            <!-- Load style.css: contains all css files concatenated to one single file -->
            <link href="<?=base_url('peach');?>/css/style.css" rel="stylesheet">
		<!--<![endif]-->

		<!-- Load HTMLShiv for IE9 HTML5 support -->
		<!--[if lt IE 9]>
			<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
		<![endif]-->	

		<!-- Your Favoriate Icons -->
		<link rel="shortcut icon" href="<?=base_url('peach');?>/ico/favicon.ico">
		<link rel="apple-touch-icon-precomposed" sizes="144x144" href="<?=base_url('peach');?>/ico/apple-touch-icon-144-precomposed.png">
		<link rel="apple-touch-icon-precomposed" sizes="114x114" href="<?=base_url('peach');?>/ico/apple-touch-icon-114-precomposed.png">
		<link rel="apple-touch-icon-precomposed" sizes="72x72" href="<?=base_url('peach');?>/ico/apple-touch-icon-72-precomposed.png">
		<link rel="apple-touch-icon-precomposed" href="<?=base_url('peach');?>/ico/apple-touch-icon-57-precomposed.png">
		
		<!--
			NOTE: All the javascripts have been moved to the bottom of the page to load the content faster.
		-->
                
<script type="text/javascript">
  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-34371654-1']);
  _gaq.push(['_setDomainName', 'www.kuhire.com']);
  _gaq.push(['_setAllowLinker', true]);
  _gaq.push(['_setCampNameKey', 'ref']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>

<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-34371654-2', 'kuhire.com');
  ga('send', 'pageview');

</script>

    <div id="fb-root"></div>
    <script>(function(d, s, id) {
      var js, fjs = d.getElementsByTagName(s)[0];
      if (d.getElementById(id)) return;
      js = d.createElement(s); js.id = id;
      js.src = "//connect.facebook.net/en_US/all.js#xfbml=1&appId=478729088822838";
      fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));
    </script>
  <style>
    #gallery_container { clear: both; margin-top: 30px; padding-right: 40px; width: 640px; 
        height: 300px; overflow: auto; background: #cccccc; border: 0px solid #0b1418;} 

    #gallery_container .gallery_box {font-family: 'Times New Roman','serif'; font-size: 8pt; clear: both;
         display: block; padding: 0; margin: 0 0 40px 0; background: #1b2c35; border: 1px solid #0b1418;}

    #midrow {width:960px;margin:0 auto;}  
    #containers {float:left;}
    .box {margin-top:20px;padding-top:10px;width:310px;height:auto;float:left;background:url(<?=base_url('peach');?>/cssimages/border.jpg) no-repeat bottom right;}
    .box h1{padding-left:10px;}
    .box p {margin:0px;width:200px;padding:15px 5px 10px 5px;float:left;} 
    .last{background:none;}

    a.plan{float:left;display:block;width:83px;height:101px;background:url(<?=base_url('peach');?>/cssimages/plan.jpg) no-repeat 0px -101px;text-indent:-1000px;}
    a.plan:hover{ background-position: 0px 1px;}
    a.whyus{margin-top:10px;float:left;display:block;width:83px;height:87px;background:url(<?=base_url('peach');?>/cssimages/whyus.jpg) no-repeat 0px 0px;text-indent:-1000px;}
    a.support{margin-top:14px;float:left;display:block;width:83px;height:72px;background:url(<?=base_url('peach');?>/cssimages/support.jpg) no-repeat 0px 0px;text-indent:-1000px;}
    a.support:hover{ background-position: 0px -70px;}

a.button{background:url(<?=base_url('peach');?>/cssimages/buttonr.gif) no-repeat right; padding:3px 0px; margin-left:2px; color:#CCCCCC; text-decoration:none; }
.button span{background:url(<?=base_url('peach');?>cssimages/buttonl.gif) no-repeat left; padding:3px 5px;}
IMG.displayed {
    display: block;
    margin-left: auto;
    margin-right: auto }

  </style>
		
	</head><!--end head-->
