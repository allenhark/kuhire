<!DOCTYPE html>
<html dir="ltr" lang="en-US">

	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta name="google-site-verification" content="DwzULjQZDuxMeDcpe2GxfRRJIFrCjSipZjemX4eB2F0">
              <meta name="keywords" content="geek wapi, geekwapi, gik wapi, gikwapi, gigwapi, gig wapi, Events happening today, Events in Nairobi, Events website, Events listings, Karaokes, Bistros, Lounges,  Festivals, Gigs, Ladies night, Parties, Nightlife, Social Events,Tech Events, Technology Events, Sports events, Rugby Matches, Rugby Games, Outdoor Activities, Live Bands, Live Performances, Concerts, Bars, Clubs, Lounges, Corporate events, Workshops, Seminars, Conferences, Kids Events,Family Events, Plays, Spoken word, Theatre, Performances, Theme Nights, Cultural Nights, Arts, Culture, Rumba Night, Wine night,wine tasting, Daily Events, Happy Hours, Alliance Francaise,Phoenix Theatres, Impala grounds, Online Event Listing,sminorff Nakuru part,weekend events"/>
		
		<meta property="og:title" content="<?=$title;?>">
			<meta property="og:url" content="<?=base_url(uri_string());?>">
			<meta property="og:site_name" content="Gigwapi">
			<meta property="fb:app_id" content="132768486872951">
			<meta property="description" content="Events and Best Hangout places| Nightlife| Sports and outdoors| kids and Family| Tech| Corporate| Happy hours| karaoke| Ladies Nights|Bistros| Sports Lounges">
			<?php if($this->uri->segment(1)):?>
			<?php if(isset($ev)): foreach($ev -> result () as $fg);?>
			<meta property="og:image" content="<?=base_url('files/'.$fg->event_image);?>" />
			<?php endif; ?>
			<?php endif;?>
			
		<title><?=$title;?> | Gigwapi-All Events happening in kenya</title>
		<link rel="stylesheet" href="<?= base_url(); ?>static/wp-content/themes/nightlife/style.css" type="text/css" media="all" />
		<link rel="stylesheet" type="text/css" href="<?= base_url(); ?>assets/stylesheets/skeleton.css">
		<link rel="stylesheet" href="<?= base_url(); ?>assets/icons/icons.css" type="text/css"/>
		<link rel="stylesheet" href="<?= base_url(); ?>assets/icons/splashy/splashy.css" type="text/css"/>
		<link rel="stylesheet" href="<?= base_url(); ?>static/wp-content/themes/nightlife/style.css" type="text/css" media="all" />		
		<meta name="generator" content="AllenHark 1.0.0" />
		<link rel="alternate" type="application/rss+xml" title="Happy Hour &raquo; Feed" href="http://happyhour.harkimg.com/feed/?type=rss" />
		<link rel='stylesheet' id='claim-style-css'  href='<?= base_url(); ?>static/wp-content/plugins/Tevolution/tmplconnector/monetize/templatic-claim_ownership/css/styleccfb.css?ver=3.4.2' type='text/css' media='all' />
		<link rel='stylesheet' id='farbtastic-css'  href='<?= base_url(); ?>static/wp-admin/css/farbtastic92b2.css?ver=1.3u1' type='text/css' media='all' />
		<link rel='stylesheet' id='prefix-style1-css'  href='<?= base_url(); ?>static/wp-content/plugins/Tevolution/styleccfb.css?ver=3.4.2' type='text/css' media='all' />
		<link rel='stylesheet' id='dhtmlgoodies_calendar_css-css'  href='<?= base_url(); ?>static/wp-content/themes/supreme/css/dhtmlgoodies_calendarccfb.css?ver=3.4.2' type='text/css' media='all' />
		<script type='text/javascript' src='<?= base_url(); ?>static/wp-includes/js/jquery/jqueryba3a.js?ver=1.7.2'></script>
		<script type='text/javascript' src='<?= base_url(); ?>static/wp-content/themes/supreme/js/dhtmlgoodies_calendarccfb.js?ver=3.4.2'></script>
		<script type='text/javascript' src='<?= base_url(); ?>static/wp-includes/js/comment-replyccfb.js?ver=3.4.2'></script>
		<link rel='canonical' href='<?= current_url(); ?>' />
		
		<!-- FlexSlider pieces -->
		<link rel="stylesheet" href="<?= base_url(); ?>static/wp-content/themes/nightlife/css/flexslider.css" type="text/css" media="screen" />
		<link rel="stylesheet" href="http://twitter.github.com/bootstrap/assets/css/bootstrap-responsive.css" type="text/css" media="screen" />
		<script src="<?= base_url(); ?>assets/js/jquery.min.js"></script>
		<script src="<?=base_url(); ?>static/wp-content/themes/nightlife/js/jquery.flexslider-min.js"></script>

		<script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-38600711-1']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>

		<link rel="stylesheet" type="text/css" href="<?= base_url(); ?>assets/stylesheets/happyhour.css">
		<div id="fb-root">
			<script>(function(d, s, id) {
			  var js, fjs = d.getElementsByTagName(s)[0];
			  if (d.getElementById(id)) return;
			  js = d.createElement(s); js.id = id;
			  js.src = "//connect.facebook.net/en_US/all.js#xfbml=1&appId=132768486872951";
			  fjs.parentNode.insertBefore(js, fjs);
			}(document, 'script', 'facebook-jssdk'));</script>
				</div>
			<!-- share this -->	
<script type="text/javascript">var switchTo5x=true;</script>
<script type="text/javascript" src="http://w.sharethis.com/button/buttons.js"></script>
<script type="text/javascript">stLight.options({publisher: "7a88d9e1-d9ff-4054-88ba-b2d307310e81", doNotHash: false, doNotCopy: false, hashAddressBar: false});</script>

					
	</head>