<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php print $language->language ?>" lang="<?php print $language->language ?>" dir="<?php print $language->dir ?>">

<head>
	<title><?php print $head_title ?></title>
	<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1" />
	<meta http-equiv="Content-Language" content="en-us" />
	<meta http-equiv="X-UA-Compatible" content="IE=9" />
	<link rel="shortcut icon" href="<?php print $base_path; ?><?php print(path_to_theme()); ?>/favicon.ico" type="image/x-icon" />
    
    <?php print $head ?>
 
	<?php print $styles ?>
    <?php if ($logged_in) { ?>
    <link rel="stylesheet" type="text/css" media="screen" href="<?php print $base_path; ?><?php print(path_to_theme()); ?>/styles/admin.css" />
    <?php } ?>
    
    <?php print $scripts ?>
	
</head>

<body class="left-sidebar">
<a name="top"></a>  
  
  <div id="skipnav">
	  <a href="#content">Skip to main content</a>
  </div>
  
  <hr class="hidden" />
  
  <div id="wrap">
  
	  <?php if ($banner) { ?>
		<!-- The following div contains the Cornell University logo with unit signature -->
		<div id="banner">
			<?php print $banner ?>
		</div>
	  <?php } ?>
	  
	  
	  <?php if ($header) { ?>
		<div id="header">
			<?php print $header ?>
		</div>
	  <?php } ?>
	  
  	<div id="content">
	
		<div id="main">
			<?php print $tabs ?>
			<?php print $help ?>
			<?php print $messages ?>
			<?php print $content ?>
		</div><!-- end #main -->

		<?php if ($left) { ?>
		<div id="left-sidebar">
			<?php print $left ?>
		</div>
		<?php } ?>
		
		<hr class="hidden" />
			
	<div id="contentfooter">
		<?php print $contentfooter ?>
	</div><!-- end #contentfooter -->

	</div><!-- end #content -->
	
	<hr class="hidden" />
	
	<div id="footer">
	<!-- The footer-content div contains the Cornell University copyright -->
	<div id="footer-content">
		<?php print ($footer_message . $footer); ?>
	</div>
	</div><!-- end footer -->
	
	</div><!-- end #wrap -->
  
  <?php print $closure ?>
</body>
</html>
