<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>

<link rel="stylesheet" href="<?=base_url('404');?>/css/main.css" type="text/css" media="screen, projection" /> <!-- main stylesheet -->
<link rel="stylesheet" type="text/css" media="all" href="<?=base_url('404');?>/css/tipsy.css" /> <!-- Tipsy implementation -->

<!--[if lt IE 8]>
	<link rel="stylesheet" type="text/css" href="css/ie7.css" />
<![endif]-->

<script type="text/javascript" src="<?=base_url('404');?>/scripts/jquery-1.7.2.min.js"></script> <!-- jQuery implementation -->
<script type="text/javascript" src="<?=base_url('404');?>/scripts/custom-scripts.js"></script><!-- All of my custom scripts -->
<script type="text/javascript" src="<?=base_url('404');?>/scripts/jquery.tipsy.js"></script> <!-- Tipsy -->

<script type="text/javascript">

$(document).ready(function(){
			
	universalPreloader();
						   
});

$(window).load(function(){

	//remove Universal Preloader
	universalPreloaderRemove();
	
	rotate();
    dogRun();
	dogTalk();
	dogChanger();

	//Tipsy implementation
	$('.with-tooltip').tipsy({gravity: $.fn.tipsy.autoNS});
						   
});

</script>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>404 - Not found</title>
</head>

<body>

<!-- Universal preloader -->
<div id="universal-preloader">
    <div class="preloader">
        <img src="<?=base_url('404');?>/images/universal-preloader.gif" alt="universal-preloader" class="universal-preloader-preloader"/>
    </div>
</div>
<!-- Universal preloader -->



<div id="wrapper">
<!-- 404 graphic -->
	<div class="graphic"></div>
<!-- 404 graphic -->
<!-- Not found text -->
	<div class="not-found-text">
    	<h2 class="not-found-text">Oops.. Error. Am not sure that link exist.</h2>
    </div>
<!-- Not found text -->
<br>
<!-- search form -->
<div class="search">
	<form name="search" method="get" action="<?=base_url('search/');?>">
        <input type="text" name="s" value="Search ..." />
        <input class="with-tooltip" title="Search!" type="submit" name="submit" value="" />
    </form>
</div>
<!-- search form -->

<!-- top menu -->
<div class="top-menu">
	<a href="<?=base_url();?>" class="with-tooltip" title="Return to the home page">Home</a> | 
    <a href="<?=base_url('sitemap?ver=xml');?>" class="with-tooltip" title="Navigate through our sitemap">Sitemap</a> | 
    <a href="<?=base_url('help/contact-us');?>" class="with-tooltip" title="Contact us!">Contact</a> | 
    <a href="<?=base_url('help');?>" class="with-tooltip" title="Request additional help">Help</a>
</div>
<!-- top menu -->

<div class="dog-wrapper">
<!-- dog running -->
	<div class="dog"></div>
<!-- dog running -->
	
<!-- dog bubble talking -->
	<div class="dog-bubble">
    	
    </div>
    
    <!-- The dog bubble rotates these -->
    <div class="bubble-options">
    	<p class="dog-bubble">
        	Are you lost, bud? No worries, I'm an excellent guide!
        </p>
        <p class="dog-bubble">
            By the way am Max! What do they call you?
        </p>
    	<p class="dog-bubble">
	        <br />
        	Arf! Arf!
        </p>
        <p class="dog-bubble">
        	<br />
        	Don't worry! I'm on it!
        </p>
        <p class="dog-bubble">
        	I wish I had a cookie<br /><img style="margin-top:8px" src="<?=base_url('404');?>/images/cookie.png" alt="cookie" />
        </p>
		 <p class="dog-bubble">
        	What are we supposed to be looking for, anyway? @_@
        </p>
        <p class="dog-bubble">
        	<br />
        	Geez! This is pretty tiresome!
        </p>
        <p class="dog-bubble">
        	<br />
        	Am I getting close?
        </p>
        <p class="dog-bubble">
        	Or am I just going in circles? Nah...
        </p>
        <p class="dog-bubble">
        	<br />
            OK, I'm officially lost now...
        </p>
        <p class="dog-bubble">
        	I think I saw a <br /><img style="margin-top:8px" src="<?=base_url('404');?>/images/cat.png" alt="cat" />
        </p>
        <p class="dog-bubble">
        	We are lost. you might want click on the homepage.
        </p>
    </div>
    <!-- The dog bubble rotates these -->
<!-- dog bubble talking -->
</div>

<!-- planet at the bottom -->
	<div class="planet"></div>
<!-- planet at the bottom -->
</div>

</body>

<!-- Mirrored from themes.roussounelosweb.gr/cerberus/404.html by HTTrack Website Copier/3.x [XR&CO'2010], Fri, 26 Oct 2012 12:53:31 GMT -->
</html>
