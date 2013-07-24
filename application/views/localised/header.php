<!DOCTYPE html>
<html lang="en-US">
<head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="Antony Gitonga - antony.scrobber.com">
    
    		<meta property="og:title" content="<?=$title;?>">
			<meta property="og:url" content="<?=base_url(uri_string());?>">
			<meta property="og:site_name" content="Scrobber">
			<meta property="fb:app_id" content="478729088822838">
			<meta property="description" content="<?=$description;?>">
			
			<?php if(isset($row)):;?>
			<meta property="og:image" content="<?=base_url('images/'.$row->image);?>" />
                        <?php else:?>
                        <meta property="og:image" content="<?= base_url('static'); ?>/images/logo.png" />
			<?php endif; ?>
			
                        
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700,300' rel='stylesheet' type='text/css'>
    <link rel="shortcut icon" href="<?=base_url('static/scrobber.ico');?>" type="image/png">
    <link rel="stylesheet" href="<?=base_url();?>/realia/assets/css/bootstrap.css" type="text/css">
    <link rel="stylesheet" href="<?=base_url();?>/realia/assets/css/bootstrap-responsive.css" type="text/css">
    <link rel="stylesheet" href="<?=base_url();?>/realia/assets/css/bootstrap-modal.css" type="text/css">
    <link rel="stylesheet" href="<?=base_url();?>/realia/assets/libraries/chosen/chosen.css" type="text/css">
    <link rel="stylesheet" href="<?=base_url();?>/realia/assets/libraries/bootstrap-fileupload/bootstrap-fileupload.css" type="text/css">
    <link rel="stylesheet" href="<?=base_url();?>/realia/assets/libraries/jquery-ui-1.10.2.custom/css/ui-lightness/jquery-ui-1.10.2.custom.min.css" type="text/css">
    <link rel="stylesheet" href="<?=base_url();?>/realia/assets/css/realia-green-light.css" type="text/css" id="color-variant-default">

    <title><?=$title;?></title>
    <?php if(isset($map)) { echo $map['js'];}; ?>
    
    <div id="fb-root"></div>
    <script>(function(d, s, id) {
      var js, fjs = d.getElementsByTagName(s)[0];
      if (d.getElementById(id)) return;
      js = d.createElement(s); js.id = id;
      js.src = "//connect.facebook.net/en_US/all.js#xfbml=1&appId=478729088822838";
      fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));
    </script>
    
    
<?php if(isset($_GET['snow'])):;?>
    <script src="<?=base_url();?>realia/assets/js/snow.js"></script>
<?php endif;?>

<script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-34371654-1']);
  _gaq.push(['_setDomainName', 'scrobber.com']);
  _gaq.push(['_setAllowLinker', true]);
  _gaq.push(['_setCampNameKey', 'ref']);
  _gaq.push(['_setCampSourceKey', 'src']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>    
    
    
</head>