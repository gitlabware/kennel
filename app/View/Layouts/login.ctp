<!DOCTYPE html>
<!--[if lt IE 7]> <html class="ie lt-ie9 lt-ie8 lt-ie7 fluid top-full sidebar sidebar-full"> <![endif]-->
<!--[if IE 7]>    <html class="ie lt-ie9 lt-ie8 fluid top-full sticky-top sidebar sidebar-full"> <![endif]-->
<!--[if IE 8]>    <html class="ie lt-ie9 fluid top-full sticky-top sidebar sidebar-full"> <![endif]-->
<!--[if gt IE 8]> <html class="ie gt-ie8 fluid top-full sticky-top sidebar sidebar-full"> <![endif]-->
<!--[if !IE]><!--><html class="fluid top-full sticky-top sidebar sidebar-full"><!-- <![endif]-->
<head>
	<title>Kennel Club Boliviano</title>
	
	<!-- Meta -->
	<meta charset="UTF-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimum-scale=1.0, maximum-scale=1.0">
	<meta name="apple-mobile-web-app-capable" content="yes">
	<meta name="apple-mobile-web-app-status-bar-style" content="black">
	<meta http-equiv="X-UA-Compatible" content="IE=9; IE=8; IE=7; IE=EDGE" />
	
	<!-- Bootstrap -->
	<link href="<?php echo $this->webroot;?>common/bootstrap/css/bootstrap.css" rel="stylesheet" type="text/css" />
	<link href="<?php echo $this->webroot;?>common/bootstrap/css/responsive.css" rel="stylesheet" type="text/css" />
	
	<!-- Glyphicons Font Icons -->
	<link href="<?php echo $this->webroot;?>common/theme/fonts/glyphicons/css/glyphicons.css" rel="stylesheet" />
	
	<link rel="stylesheet" href="<?php echo $this->webroot;?>common/theme/fonts/font-awesome/css/font-awesome.min.css">
	<!--[if IE 7]><link rel="stylesheet" href="../../../../../common/theme/fonts/font-awesome/css/font-awesome-ie7.min.css"><![endif]-->
	
	<!-- Uniform Pretty Checkboxes -->
	<link href="<?php echo $this->webroot;?>common/theme/scripts/plugins/forms/pixelmatrix-uniform/css/uniform.default.css" rel="stylesheet" />
	
	<!-- PrettyPhoto -->
    <link href="<?php echo $this->webroot;?>common/theme/scripts/plugins/gallery/prettyphoto/css/prettyPhoto.css" rel="stylesheet" />
	
	<!-- Main Theme Stylesheet :: CSS -->
	<link href="<?php echo $this->webroot;?>common/theme/css/style-flat.css?1372280973" rel="stylesheet" type="text/css" />
	
	
	<!-- LESS.js Library -->
	<script src="<?php echo $this->webroot;?>common/theme/scripts/plugins/system/less.min.js"></script>
</head>
<body class="login ">
	
	<!-- Wrapper -->
<div id="login">

	<div class="container">
	
	<?php echo $this->Session->flash(); ?>
    <?php echo $this->fetch('content'); ?>	
		
	</div>
	
</div>
<!-- // Wrapper END -->	

<!-- Themer -->
<div id="themer" class="collapse">
	<div class="wrapper">
		<span class="close2">&times; close</span>
		<h4>Themer <span>color options</span></h4>
		<ul>
			<li>Theme: <select id="themer-theme" class="pull-right"></select><div class="clearfix"></div></li>
			<li>Primary Color: <input type="text" data-type="minicolors" data-default="#ffffff" data-slider="hue" data-textfield="false" data-position="left" id="themer-primary-cp" /><div class="clearfix"></div></li>
			<li>
				<span class="link" id="themer-custom-reset">reset theme</span>
				<span class="pull-right"><label>advanced <input type="checkbox" value="1" id="themer-advanced-toggle" /></label></span>
			</li>
		</ul>
		<div id="themer-getcode" class="hide">
			<hr class="separator" />
			<button class="btn btn-primary btn-small pull-right btn-icon glyphicons download" id="themer-getcode-less"><i></i>Get LESS</button>
			<button class="btn btn-inverse btn-small pull-right btn-icon glyphicons download" id="themer-getcode-css"><i></i>Get CSS</button>
			<div class="clearfix"></div>
		</div>
	</div>
</div>
<!-- // Themer END -->

	<!-- JQuery -->
	<script src="<?php echo $this->webroot;?>js/jquery-1.10.1.min.js"></script>
	<script src="<?php echo $this->webroot;?>js/jquery-migrate-1.2.1.min.js"></script>
	
	<!-- Code Beautify -->
	<script src="<?php echo $this->webroot;?>common/theme/scripts/plugins/other/js-beautify/beautify.js"></script>
	<script src="<?php echo $this->webroot;?>common/theme/scripts/plugins/other/js-beautify/beautify-html.js"></script>
	
	<!-- PrettyPhoto -->
	<script src="<?php echo $this->webroot;?>common/theme/scripts/plugins/gallery/prettyphoto/js/jquery.prettyPhoto.js"></script>
	
	<!-- Global -->
	<script>
	var basePath = '',
		commonPath = '<?php echo $this->webroot;?>common/';
	</script>
	
	
	<!-- Modernizr -->
	<script src="<?php echo $this->webroot;?>common/theme/scripts/plugins/system/modernizr.js"></script>
	
	<!-- Bootstrap -->
	<script src="<?php echo $this->webroot;?>common/bootstrap/js/bootstrap.min.js"></script>
	
	<!-- SlimScroll Plugin -->
	<script src="<?php echo $this->webroot;?>common/theme/scripts/plugins/other/jquery-slimScroll/jquery.slimscroll.min.js"></script>
	
	<!-- Common Demo Script -->
	<script src="<?php echo $this->webroot;?>common/theme/scripts/demo/common.js?1372280973"></script>
	
	<!-- Holder Plugin -->
	<script src="<?php echo $this->webroot;?>common/theme/scripts/plugins/other/holder/holder.js"></script>
	<script>
		Holder.add_theme("dark", {background:"#000", foreground:"#aaa", size:9});
		Holder.add_theme("white", {background:"#fff", foreground:"#c9c9c9", size:9});
	</script>
	
	<!-- Uniform Forms Plugin -->
	<script src="<?php echo $this->webroot;?>common/theme/scripts/plugins/forms/pixelmatrix-uniform/jquery.uniform.min.js"></script>

	
	
</body>
</html>