<!DOCTYPE html>
<!--[if lt IE 7]> <html class="ie lt-ie9 lt-ie8 lt-ie7 fluid top-full sidebar sidebar-full"> <![endif]-->
<!--[if IE 7]>    <html class="ie lt-ie9 lt-ie8 fluid top-full sticky-top sidebar sidebar-full"> <![endif]-->
<!--[if IE 8]>    <html class="ie lt-ie9 fluid top-full sticky-top sidebar sidebar-full"> <![endif]-->
<!--[if gt IE 8]> <html class="ie gt-ie8 fluid top-full sticky-top sidebar sidebar-full"> <![endif]-->
<!--[if !IE]><!--><html class="fluid top-full sticky-top sidebar sidebar-full"><!-- <![endif]-->
<head>
	<title>Kennel club</title>
	
	<!-- Meta -->
	<meta charset="UTF-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimum-scale=1.0, maximum-scale=1.0">
	<meta name="apple-mobile-web-app-capable" content="yes">
	<meta name="apple-mobile-web-app-status-bar-style" content="black">
	<meta http-equiv="X-UA-Compatible" content="IE=9; IE=8; IE=7; IE=EDGE" />
	
    
	<!-- Bootstrap -->
	<link href="<?php echo $this->webroot;?>common/bootstrap/css/bootstrap.css" rel="stylesheet" type="text/css" />
	<link href="<?php echo $this->webroot;?>common/bootstrap/css/responsive.css" rel="stylesheet" type="text/css" />
	<link href="<?php echo $this->webroot;?>common/bootstrap/css/bootstrap.css" rel="stylesheet" type="text/css"  media="print"/>
	<!-- Glyphicons Font Icons -->
	<link href="<?php echo $this->webroot;?>common/theme/fonts/glyphicons/css/glyphicons.css" rel="stylesheet" />
	
	<link rel="stylesheet" href="<?php echo $this->webroot;?>common/theme/fonts/font-awesome/css/font-awesome.min.css">
	<!--[if IE 7]><link rel="stylesheet" href="<?php echo $this->webroot;?>common/theme/fonts/font-awesome/css/font-awesome-ie7.min.css"><![endif]-->
	
	<!-- Uniform Pretty Checkboxes -->
	<link href="<?php echo $this->webroot;?>common/theme/scripts/plugins/forms/pixelmatrix-uniform/css/uniform.default.css" rel="stylesheet" />
	
	<!-- PrettyPhoto -->
    <link href="<?php echo $this->webroot;?>common/theme/scripts/plugins/gallery/prettyphoto/css/prettyPhoto.css" rel="stylesheet" />
	
	<!-- Bootstrap Extended -->
	<link href="<?php echo $this->webroot;?>common/bootstrap/extend/jasny-fileupload/css/fileupload.css" rel="stylesheet">
	<link href="<?php echo $this->webroot;?>common/bootstrap/extend/bootstrap-wysihtml5/css/bootstrap-wysihtml5-0.0.2.css" rel="stylesheet">
	<link href="<?php echo $this->webroot;?>common/bootstrap/extend/bootstrap-select/bootstrap-select.css" rel="stylesheet" />
	<link href="<?php echo $this->webroot;?>common/bootstrap/extend/bootstrap-toggle-buttons/static/stylesheets/bootstrap-toggle-buttons.css" rel="stylesheet" />
	
	<!-- DateTimePicker Plugin -->
	<link href="<?php echo $this->webroot;?>common/theme/scripts/plugins/forms/bootstrap-datetimepicker/css/datetimepicker.css" rel="stylesheet" />
	
	<!-- JQueryUI -->
	<link href="<?php echo $this->webroot;?>common/theme/scripts/plugins/system/jquery-ui/css/smoothness/jquery-ui-1.9.2.custom.min.css" rel="stylesheet" />
	
	<!-- MiniColors ColorPicker Plugin -->
	<link href="<?php echo $this->webroot;?>common/theme/scripts/plugins/color/jquery-miniColors/jquery.miniColors.css" rel="stylesheet" />
	
	<!-- Notyfy Notifications Plugin -->
	<link href="<?php echo $this->webroot;?>common/theme/scripts/plugins/notifications/notyfy/jquery.notyfy.css" rel="stylesheet" />
	<link href="<?php echo $this->webroot;?>common/theme/scripts/plugins/notifications/notyfy/themes/default.css" rel="stylesheet" />
	
	<!-- Gritter Notifications Plugin -->
	<link href="<?php echo $this->webroot;?>common/theme/scripts/plugins/notifications/Gritter/css/jquery.gritter.css" rel="stylesheet" />
	
	<!-- Easy-pie Plugin -->
	<link href="<?php echo $this->webroot;?>common/theme/scripts/plugins/charts/easy-pie/jquery.easy-pie-chart.css" rel="stylesheet" />

	<!-- Google Code Prettify Plugin -->
	<link href="<?php echo $this->webroot;?>common/theme/scripts/plugins/other/google-code-prettify/prettify.css" rel="stylesheet" />

	<!-- Pageguide Guided Tour Plugin -->
	<!--[if gt IE 8]><!--><link media="screen" href="<?php echo $this->webroot;?>common/theme/scripts/plugins/other/pageguide/css/pageguide.css" rel="stylesheet" /><!--<![endif]-->

	<!-- DataTables Plugin -->
	<link href="<?php echo $this->webroot;?>common/theme/scripts/plugins/tables/DataTables/media/css/DT_bootstrap.css" rel="stylesheet" />
	<link href="<?php echo $this->webroot;?>common/theme/scripts/plugins/tables/DataTables/extras/TableTools/media/css/TableTools.css" rel="stylesheet" />
	<link href="<?php echo $this->webroot;?>common/theme/scripts/plugins/tables/DataTables/extras/ColVis/media/css/ColVis.css" rel="stylesheet" />

	<!-- Main Theme Stylesheet :: CSS -->
	<link href="<?php echo $this->webroot;?>common/theme/css/style-flat.css?1372280948" rel="stylesheet" type="text/css" />
    <?php $role = $this->Session->read('Auth.User.role');?>
    <?php if($role == 'propietario'):?>
    <style>
    .btn-primary,
#flotTip,
.btn-group.open .btn-primary.dropdown-toggle,
.btn-primary.disabled,
.btn-primary[disabled],
.btn-primary:hover,
.label-primary,
.table-primary thead th,
.pagination ul > .active > a,
.pagination ul > .active > span,
.gallery ul li .thumb,
.widget-activity ul.filters li.glyphicons.active i,
.ui-slider-wrap .slider-primary .ui-slider-range,
.accordion-heading .accordion-toggle,
.ui-widget-header,
.ui-state-active,
.ui-widget-content .ui-state-active,
.ui-widget-header .ui-state-active,
.fc-event-skin,
#external-events li,
.notyfy_wrapper.notyfy_primary,
.progress.progress-primary .bar,
.alert.alert-primary,
.pagination ul > li > a:hover,
.pagination ul > li.primary > a,
.gritter-item-wrapper.gritter-primary .gritter-item,
#content-notification .notyfy_wrapper.notyfy_primary,
.ribbon-wrapper .ribbon.primary,
.label.label-primary,
.widget-stats.primary,
.widget-stats.primary:hover,
.tabsbar:not(.tabsbar-2) ul li.active a,
.widget.widget-wizard-pills .widget-head ul li.primary a,
.bwizard-steps li.active,
.sliderContainer .ui-rangeSlider-bar,
#tlyPageGuideWrapper #tlyPageGuide li.tlypageguide-active,
#tlyPageGuideWrapper #tlyPageGuideMessages .tlypageguide_close,
#tlyPageGuideWrapper #tlyPageGuideMessages span,
.tabsbar.tabsbar-2.active-fill ul li.active a,
.shop-client-products.list ul li a .glyphicons i,
.social-large:not(.social-large-2) a.active,
.social-large:not(.social-large-2) a:hover,
#landing_1 .banner-1 .carousel-indicators li.active,
html.top-full .navbar.main,
html.top-full .navbar.main .btn-navbar,
html.top-full .navbar.main .btn-navbar:hover,
.nav-timeline > li.active > a,
.nav-timeline > li > a:hover,
.nav-timeline > li.active > a:hover,
.layout-timeline ul.timeline > li.active .type:before,
.layout-timeline ul.timeline > li.active .type:after,
.layout-timeline ul.timeline > li.active:before,
.carousel.carousel-1 .carousel-indicators li.active,
.widget-body-gray .ui-datepicker .ui-datepicker-calendar tbody td a.ui-state-active,
.widget.widget-body-primary > .widget-body,
html.sidebar-full #menu {
  background-color: #90bd59;
}
.widget-stats.primary,
.btn-primary,
.tabsbar:not(.tabsbar-2) ul li.active a {
  background-color: #a6ca7a;
  background-image: -moz-linear-gradient(top, #b5d390, #90bd59);
  background-image: -webkit-gradient(linear, 0 0, 0 100%, from(#b5d390), to(#90bd59));
  background-image: -webkit-linear-gradient(top, #b5d390, #90bd59);
  background-image: -o-linear-gradient(top, #b5d390, #90bd59);
  background-image: linear-gradient(to bottom, #b5d390, #90bd59);
  background-repeat: repeat-x;
  filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#ffb5d390', endColorstr='#ff90bd59', GradientType=0);
}
a,
p a,
.widget .widget-body.list ul li .count,
.widget-stats .txt strong,
.glyphicons.single i:before,
.glyphicons.single,
.table-primary tbody td.important,
.widget.widget-3 .widget-body.large.cancellations span span:first-child,
.widget .widget-footer a:hover,
.widget .widget-footer a:hover i:before,
.widget.widget-3 .widget-footer a:hover,
.widget.widget-3 .widget-footer a:hover i:before,
blockquote small,
.tabsbar.tabsbar-2 ul li.active a,
.tabsbar.tabsbar-2 ul li.active a i:before,
.glyphicons.primary i:before,
.glyphicons.standard:not(.disabled):hover i:before,
.menubar.links.primary ul li a,
.text-primary,
#docs_icons .glyphicons i:before,
.widget.widget-tabs-double-2 .widget-head ul li.active a i:before,
.widget.widget-tabs-double-2 .widget-head ul li.active a,
.shop-client-products.product-details .form-horizontal .price,
.widget-activity ul.list li:hover .activity-icon i:before,
.widget-activity ul.list li.highlight .activity-icon i:before,
#menu ul.menu-1 > li.hasSubmenu.active ul li .glyphicons:hover i:before,
#landing_1 .banner .banner-wrapper.banner-1 p a,
#landing_1 .banner .banner-wrapper.banner-1 h3,
#landing_2 .banner .banner-wrapper.banner-1 p a,
#landing_2 .banner .banner-wrapper.banner-1 .buy a,
#landing_2 .banner .banner-wrapper.banner-1 h3,
#landing_1 .banner-1 .carousel-caption a,
div.glyphicons.glyphicon-primary i:before,
.layout-timeline ul.timeline > li.active .type,
.layout-timeline ul.timeline > li.active .type i:before,
.social-large.social-large-2 a.active i:before,
.social-large.social-large-2 a:hover i:before,
.social-large.social-large-2 a.active,
.social-large.social-large-2 a:hover,
html.front #footer a:not(.btn) {
  color: #90bd59;
}
.btn-primary,
.ui-slider-wrap .slider-primary .ui-slider-handle,
#flotTip,
.widget.widget-2.primary .widget-head,
.widget .widget-body.list.list-2 ul li.active a i:before,
.table-primary thead th,
.pagination ul > .active > a,
.pagination ul > .active > span,
.widget.widget-4 .widget-head .heading,
.ui-widget-header,
.fc-event-skin,
.alert.alert-primary,
.pagination ul > li > a:hover,
.pagination ul > li.primary > a,
.widget-stats.primary,
#menu .slim-scroll > ul.menu-0 > li.active > a,
.widget-chat .media .media-body,
.widget-chat .media .media-body.right,
#menu .slim-scroll > ul.menu-0 > li.active > a,
#menu > ul.menu-0 > li.active > a {
  border-color: #90bd59;
}
.table-primary tbody td {
  background-color: #ffffff;
}
.table-primary tbody tr.selected td,
.table-primary tbody tr.selectable:hover td {
  background-color: #f2f7eb;
}
.table-primary.table-bordered tbody td,
.table-primary,
.pagination ul > .disabled > a,
.pagination ul > .disabled > span {
  border-color: #ffffff;
}
html.top-full .navbar.main {
  border-bottom-color: #699039;
}
html.top-full .navbar.main .topnav {
  border-left-color: #699039;
  border-right-color: #c1daa2;
}
html.top-full .navbar.main .topnav > li:first-child {
  border-left-color: #c1daa2;
}
html.top-full .navbar.main .topnav > li {
  border-bottom-color: #699039;
  border-top-color: #c1daa2;
}
html.top-full .navbar.main .btn-navbar {
  border-bottom-color: #699039;
  border-right-color: #699039;
}
html.top-full.sidebar-full .menu-left .navbar.main {
  border-left-color: #699039;
}
html.top-full.sidebar-full .menu-right .navbar.main {
  border-right-color: #699039;
}
html.top-full .navbar.main .topnav > li.glyphs,
html.top-full .navbar.main .topnav > li.search {
  border-left-color: #699039;
  border-right-color: #c1daa2;
  box-shadow: -1px 0 0 0 #c1daa2, 1px 0 0 0 #699039;
  -moz-box-shadow: -1px 0 0 0 #c1daa2, 1px 0 0 0 #699039;
  -webkit-box-shadow: -1px 0 0 0 #c1daa2, 1px 0 0 0 #699039;
}
html.sidebar-full #menu > ul > li.glyphs,
html.sidebar-full #menu .slim-scroll > ul > li.glyphs,
html.sidebar-full #menu > ul > li.search,
html.sidebar-full #menu .slim-scroll > ul > li.search {
  border-top-color: #c1daa2;
  border-bottom-color: #699039;
  box-shadow: 0 -1px 0 0 #699039, 0 1px 0 0 #c1daa2;
  -moz-box-shadow: 0 -1px 0 0 #699039, 0 1px 0 0 #c1daa2;
  -webkit-box-shadow: 0 -1px 0 0 #699039, 0 1px 0 0 #c1daa2;
}
html.sidebar-full #menu .profile {
  border-top-color: #c1daa2;
}
html.sidebar-full #menu .slim-scroll > ul,
html.sidebar-full #menu > ul {
  border-top-color: #699039;
  border-bottom-color: #c1daa2;
}
html.sidebar-full #menu .slim-scroll > ul > li:first-child,
html.sidebar-full #menu > ul > li:first-child {
  border-top-color: #c1daa2;
}
html.sidebar-full #menu .appbrand {
  border-bottom-color: #699039;
}
html.sidebar-full #menu .profile a,
html.sidebar-full #menu .profile a:hover {
  border-color: #699039;
}
html.sidebar-full #menu > ul > li.search form button i:before,
html.sidebar-full #menu .slim-scroll > ul > li.search form button i:before,
html.sidebar-full #menu > ul > li.search form input,
html.sidebar-full #menu .slim-scroll > ul > li.search form input {
  color: #699039;
}
html.sidebar-full #menu > ul > li.search form input::-webkit-input-placeholder,
html.sidebar-full #menu .slim-scroll > ul > li.search form input::-webkit-input-placeholder {
  color: #699039;
}
html.sidebar-full #menu > ul > li.search form input:-moz-placeholder,
html.sidebar-full #menu .slim-scroll > ul > li.search form input:-moz-placeholder {
  color: #699039;
}
html.sidebar-full #menu > ul > li.search form input::-moz-placeholder,
html.sidebar-full #menu .slim-scroll > ul > li.search form input::-moz-placeholder {
  color: #699039;
}
html.sidebar-full #menu > ul > li.search form input:-ms-input-placeholder,
html.sidebar-full #menu .slim-scroll > ul > li.search form input:-ms-input-placeholder {
  color: #699039;
}
html.sidebar-full #menu > ul > li.glyphs ul li.active,
html.sidebar-full #menu .slim-scroll > ul > li.glyphs ul li.active,
html.sidebar-full #menu > ul > li.glyphs ul li:hover,
html.sidebar-full #menu .slim-scroll > ul > li.glyphs ul li:hover,
html.sidebar-full #menu > ul > li.search form,
html.sidebar-full #menu .slim-scroll > ul > li.search form {
  background: #c1daa2;
  border-color: #5c7e32;
}
html.sidebar-full #menu > ul > li.glyphs ul li .glyphicons,
html.sidebar-full #menu .slim-scroll > ul > li.glyphs ul li .glyphicons,
html.sidebar-full #menu > ul > li.glyphs ul li .glyphicons i:before,
html.sidebar-full #menu .slim-scroll > ul > li.glyphs ul li .glyphicons i:before {
  color: #c1daa2 !important;
}
html.sidebar-full #menu > ul > li.glyphs ul li.active .glyphicons,
html.sidebar-full #menu .slim-scroll > ul > li.glyphs ul li.active .glyphicons,
html.sidebar-full #menu > ul > li.glyphs ul li:hover .glyphicons,
html.sidebar-full #menu .slim-scroll > ul > li.glyphs ul li:hover .glyphicons,
html.sidebar-full #menu > ul > li.glyphs ul li .glyphicons i:before,
html.sidebar-full #menu .slim-scroll > ul > li.glyphs ul li .glyphicons i:before {
  color: #fff !important;
}
html.sidebar-full #menu > ul > li.active > a,
html.sidebar-full #menu .slim-scroll > ul > li.active > a,
html.sidebar-full #menu > ul > li:hover > a,
html.sidebar-full #menu .slim-scroll > ul > li:hover > a,
html.sidebar-full #menu > ul > li.open > a,
html.sidebar-full #menu .slim-scroll > ul > li.open > a,
html.sidebar-full #menu > ul > li.glyphs ul,
html.sidebar-full #menu .slim-scroll > ul > li.glyphs ul {
  background: #699039;
  border-color: #5c7e32;
}
html.sidebar-full #menu > ul > li.glyphs ul li.active:last-child,
html.sidebar-full #menu .slim-scroll > ul > li.glyphs ul li.active:last-child,
html.sidebar-full #menu > ul > li.glyphs ul li:hover:last-child,
html.sidebar-full #menu .slim-scroll > ul > li.glyphs ul li:hover:last-child {
  border-color: #5c7e32;
}
html.rtl.top-full .navbar.main .topnav.pull-right > li:last-child {
  border-left-color: #699039;
}
html.rtl.top-full .navbar.main .topnav {
  border-left-color: #c1daa2;
  border-right-color: #699039;
}
html.rtl.top-full .navbar.main .topnav > li.glyphs {
  border-left-color: #c1daa2;
  border-right-color: #699039;
  box-shadow: -1px 0 0 0 #699039, 1px 0 0 0 #c1daa2;
  -moz-box-shadow: -1px 0 0 0 #699039, 1px 0 0 0 #c1daa2;
  -webkit-box-shadow: -1px 0 0 0 #699039, 1px 0 0 0 #c1daa2;
}
html.top-full .navbar.main .topnav > li:last-child.glyphs,
html.top-full .navbar.main .topnav > li:last-child.search {
  box-shadow: -1px 0 0 0 #c1daa2;
  -moz-box-shadow: -1px 0 0 0 #c1daa2;
  -webkit-box-shadow: -1px 0 0 0 #c1daa2;
}
html.top-full .navbar.main .topnav > li:last-child {
  border-right-color: #699039;
}
html.top-full .navbar.main .topnav > li.active > a,
html.top-full .navbar.main .topnav > li:hover > a,
html.top-full .navbar.main .topnav > li.open > a,
html.top-full .navbar.main .topnav > li.glyphs ul {
  background: #699039;
  border-color: #5c7e32;
}
html.top-full .navbar.main .topnav > li.glyphs ul li.active:last-child,
html.top-full .navbar.main .topnav > li.glyphs ul li:hover:last-child {
  border-color: #5c7e32;
}
html.top-full .navbar.main .topnav > li.glyphs ul li.active,
html.top-full .navbar.main .topnav > li.glyphs ul li:hover,
html.top-full .navbar.main .topnav > li.search form {
  background: #c1daa2;
  border-color: #5c7e32;
}
html.top-full .navbar.main .topnav > li.glyphs ul li .glyphicons,
html.top-full .navbar.main .topnav > li.glyphs ul li .glyphicons i:before {
  color: #c1daa2 !important;
}
html.top-full .navbar.main .topnav > li.glyphs ul li.active .glyphicons,
html.top-full .navbar.main .topnav > li.glyphs ul li:hover .glyphicons,
html.top-full .navbar.main .topnav > li.glyphs ul li .glyphicons i:before {
  color: #fff !important;
}
html.front .navbar.main .secondary {
  background: #5c7e32;
  border-color: #699039;
}
html.top-full .navbar.main .topnav > li.search form button i:before,
html.top-full .navbar.main .topnav > li.search form input {
  color: #699039;
}
html.top-full .navbar.main .topnav > li.search form input::-webkit-input-placeholder {
  color: #699039;
}
html.top-full .navbar.main .topnav > li.search form input:-moz-placeholder {
  color: #699039;
}
html.top-full .navbar.main .topnav > li.search form input::-moz-placeholder {
  color: #699039;
}
html.top-full .navbar.main .topnav > li.search form input:-ms-input-placeholder {
  color: #699039;
}
.bwizard-steps li.active:after,
.sliderContainer .ui-rangeSlider-rightArrow .ui-rangeSlider-arrow-inner {
  border-left-color: #90bd59;
}
.sliderContainer .ui-rangeSlider-leftArrow .ui-rangeSlider-arrow-inner {
  border-right-color: #90bd59;
}
#tlyPageGuideWrapper #tlyPageGuide li.tlypageguide-active.tlypageguide_right:after,
#tlyPageGuideWrapper #tlyPageGuide li.tlypageguide-active.tlypageguide_left:after,
#tlyPageGuideWrapper #tlyPageGuide li.tlypageguide-active.tlypageguide_top:after {
  border-top-color: #90bd59;
}
#tlyPageGuideWrapper #tlyPageGuide li.tlypageguide-active.tlypageguide_bottom:after {
  border-bottom-color: #90bd59;
}
.btn-primary:active,
.btn-primary.active {
  background-color: #5c7e32;
}
.btn-primary:hover,
.btn-primary:focus {
  background-color: #84b548;
}
.tlypageguide_shadow:after {
  background-color: rgba(144, 189, 89, 0.2);
}
.widget .widget-body.list.list-2 ul li.active {
  border-color: #c1daa2;
}
.widget .widget-body.list.list-2 ul li a {
  color: #c1daa2;
}
.widget .widget-body.list.list-2 ul li a i:before {
  background: #ffffff;
  color: #a8cc7d;
  border-color: #c1daa2;
}
    </style>
    <?php endif;?>
	<!-- Select2 Plugin -->
	<link href="<?php echo $this->webroot;?>common/theme/scripts/plugins/forms/select2/select2.css" rel="stylesheet" />
	<link href="<?php echo $this->webroot;?>css/print.css" rel="stylesheet" />
	<!-- LESS.js Library -->
	<script src="<?php echo $this->webroot;?>common/theme/scripts/plugins/system/less.min.js"></script>
    <style type="text/css" media="print">
  @page { 
    size: letter;
    margin: 30px;
    
     }
</style>
    
</head>
<body class="">
	
		<!-- Main Container Fluid -->
	<div class="container-fluid fluid menu-left">
		
				<!-- Sidebar menu & content wrapper -->
		<div id="wrapper">
		
		<!-- Sidebar Menu -->
        <?php if(!empty($role)):?>
		<div id="menu" class="hidden-phone hidden-print">
        
        <?php 
        switch($role)
        {
            case 'administrador':
                echo $this->element('sidebar/administrador');
                break;
            case 'propietario':
                echo $this->element('sidebar/propietario');
                break;
        }
        ?>
        
		</div>
        <?php endif;?>
		<!-- // Sidebar Menu END -->
				
		<!-- Content -->
        
		<div id="content">
		
				<!-- Top navbar -->
		<div class="navbar main hidden-print">
        <?php 
        switch($role)
        {
            case 'administrador':
                echo $this->element('menu/administrador');
                break;
            case 'propietario':
                echo $this->element('menu/propietario');
                break;
            case '':
                echo $this->element('menu/externo');
                break;
        }
        ?>	
		</div>
		<!-- Top navbar END -->
        <div id="normal">
        <?php echo $this->Session->flash(); ?>
        <?php echo $this->fetch('content'); ?>
        </div>
        <div id="cargabusqueda">
        </div>
        <?php echo $this->Js->writeBuffer();?>
		<!-- INICIO MODAL ---->
<div class="modal hide fade" id="myModal" >
  <div id="imgcargando" style="display: none;">
  <?php echo $this->Html->image('cargando.gif');?>
  </div>
  <div id="mimodal">
  
  </div>
</div>

<!-- TERMINA MODAL ---->
<!-- INICIO MODAL ---->
<div class="modal hide fade" id="modalsel" >
  <div id="imgcargandosele" style="display: none;">
  <?php echo $this->Html->image('cargando.gif');?>
  </div>
  <div id="modalsele">
  
  </div>
</div>

<!-- TERMINA MODAL ---->
		</div>
		<!-- // Content END -->
		
				</div>
		<div class="clearfix"></div>
		<!-- // Sidebar menu & content wrapper END -->
				
		<div id="footer" class="hidden-print">
			
			<!--  Copyright Line -->
			<div class="copy">&copy; 2013 - 2014 - <a href="http://www.kennelclubboliviano.com">Kennel Club Boliviano</a> - Derechos reservados. <a href="http://www.labware.com.bo" target="_blank"> Elaborado por Labware </a> </div>
			<!--  End Copyright Line -->
	
		</div>
		<!-- // Footer END -->
		
	</div>
	<!-- // Main Container Fluid END -->
	

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
    
    <?php echo $this->Html->script(array('jquery.sheepItPlugin-1.1.1.min','print'));?>
    
    <script src="<?php echo $this->webroot;?>js/jquery.jOrgChart.js"></script>
	
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
	
	<!-- JQueryUI -->
	<script src="<?php echo $this->webroot;?>common/theme/scripts/plugins/system/jquery-ui/js/jquery-ui-1.9.2.custom.min.js"></script>
	
	<!-- JQueryUI Touch Punch -->
	<!-- small hack that enables the use of touch events on sites using the jQuery UI user interface library -->
	<script src="<?php echo $this->webroot;?>common/theme/scripts/plugins/system/jquery-ui-touch-punch/jquery.ui.touch-punch.min.js"></script>
	
	
	<!-- Modernizr -->
	<script src="<?php echo $this->webroot;?>common/theme/scripts/plugins/system/modernizr.js"></script>
	
	<!-- Bootstrap -->
	<script src="<?php echo $this->webroot;?>common/bootstrap/js/bootstrap.min.js"></script>
	
	<!-- SlimScroll Plugin -->
	<script src="<?php echo $this->webroot;?>common/theme/scripts/plugins/other/jquery-slimScroll/jquery.slimscroll.min.js"></script>
	
	<!-- Common Demo Script -->
	<script src="<?php echo $this->webroot;?>common/theme/scripts/demo/common.js?1372280948"></script>
	
	<!-- Holder Plugin -->
	<script src="<?php echo $this->webroot;?>common/theme/scripts/plugins/other/holder/holder.js"></script>
	<script>
		Holder.add_theme("dark", {background:"#000", foreground:"#aaa", size:9});
		Holder.add_theme("white", {background:"#fff", foreground:"#c9c9c9", size:9});
	</script>
	
	<!-- Uniform Forms Plugin -->
	<script src="<?php echo $this->webroot;?>common/theme/scripts/plugins/forms/pixelmatrix-uniform/jquery.uniform.min.js"></script>

	<!-- Bootstrap Extended -->
	<script src="<?php echo $this->webroot;?>common/bootstrap/extend/bootstrap-select/bootstrap-select.js"></script>
	<script src="<?php echo $this->webroot;?>common/bootstrap/extend/bootstrap-toggle-buttons/static/js/jquery.toggle.buttons.js"></script>
	<script src="<?php echo $this->webroot;?>common/bootstrap/extend/bootstrap-hover-dropdown/twitter-bootstrap-hover-dropdown.min.js"></script>
	<script src="<?php echo $this->webroot;?>common/bootstrap/extend/jasny-fileupload/js/bootstrap-fileupload.js"></script>
	<script src="<?php echo $this->webroot;?>common/bootstrap/extend/bootbox.js"></script>
	<script src="<?php echo $this->webroot;?>common/bootstrap/extend/bootstrap-wysihtml5/js/wysihtml5-0.3.0_rc2.min.js"></script>
	<script src="<?php echo $this->webroot;?>common/bootstrap/extend/bootstrap-wysihtml5/js/bootstrap-wysihtml5-0.0.2.js"></script>
	
	<!-- Google Code Prettify -->
	<script src="<?php echo $this->webroot;?>common/theme/scripts/plugins/other/google-code-prettify/prettify.js"></script>
	
	<!-- Gritter Notifications Plugin -->
	<script src="<?php echo $this->webroot;?>common/theme/scripts/plugins/notifications/Gritter/js/jquery.gritter.min.js"></script>
	
	<!-- Notyfy Notifications Plugin -->
	<script src="<?php echo $this->webroot;?>common/theme/scripts/plugins/notifications/notyfy/jquery.notyfy.js"></script>
	
	<!-- MiniColors Plugin -->
	<script src="<?php echo $this->webroot;?>common/theme/scripts/plugins/color/jquery-miniColors/jquery.miniColors.js"></script>
	
	<!-- DateTimePicker Plugin -->
	<script src="<?php echo $this->webroot;?>common/theme/scripts/plugins/forms/bootstrap-datetimepicker/js/bootstrap-datetimepicker.min.js"></script>

	<!-- Cookie Plugin -->
	<script src="<?php echo $this->webroot;?>common/theme/scripts/plugins/system/jquery.cookie.js"></script>
	
	<!-- Colors -->
	<script>
	var primaryColor = '#4a8bc2',
		dangerColor = '#b55151',
		successColor = '#609450',
		warningColor = '#ab7a4b',
		inverseColor = '#45484d';
	</script>
	
	<!-- Themer -->
	<script>
	var themerPrimaryColor = primaryColor;
	</script>
	
	<!-- Easy-pie Plugin -->
	<script src="<?php echo $this->webroot;?>common/theme/scripts/plugins/charts/easy-pie/jquery.easy-pie-chart.js"></script>
	
	<!-- Sparkline Charts Plugin -->
	<script src="<?php echo $this->webroot;?>common/theme/scripts/plugins/charts/sparkline/jquery.sparkline.min.js"></script>
	
	<!-- Ba-Resize Plugin -->
	<script src="<?php echo $this->webroot;?>common/theme/scripts/plugins/other/jquery.ba-resize.js"></script>
	
	<script src="<?php echo $this->webroot;?>common/theme/scripts/plugins/forms/select2/select2.js"></script>
	
	
	<!-- DataTables Tables Plugin -->
	<script src="<?php echo $this->webroot;?>common/theme/scripts/plugins/tables/DataTables/media/js/jquery.dataTables.min.js"></script>
	<script src="<?php echo $this->webroot;?>common/theme/scripts/plugins/tables/DataTables/extras/TableTools/media/js/TableTools.min.js"></script>
	<script src="<?php echo $this->webroot;?>common/theme/scripts/plugins/tables/DataTables/extras/ColVis/media/js/ColVis.min.js"></script>
	<script src="<?php echo $this->webroot;?>common/theme/scripts/plugins/tables/DataTables/media/js/DT_bootstrap.js"></script>
	<script src="<?php echo $this->webroot;?>js/mylibs/FixedColumns.js"></script>
    
	<!-- FooTable Plugin -->
	<script src="<?php echo $this->webroot;?>common/theme/scripts/plugins/tables/FooTable/js/footable.js"></script>
	
	<!-- Responsive Tables Demo Script -->
	<script src="<?php echo $this->webroot;?>common/theme/scripts/demo/tables_responsive.js"></script>
    
    <!-- InputMask Plugin -->
	<script src="<?php echo $this->webroot;?>common/theme/scripts/plugins/forms/jquery-inputmask/dist/jquery.inputmask.bundle.min.js"></script>
    <!-- Multiselect Plugin -->
	<script src="<?php echo $this->webroot;?>common/theme/scripts/plugins/forms/multiselect/js/jquery.multi-select.js"></script>
	
	<!-- bootstrap-timepicker Plugin -->
	<script src="<?php echo $this->webroot;?>common/theme/scripts/plugins/forms/bootstrap-timepicker/js/bootstrap-timepicker.min.js"></script>
        
        <?php echo $this->fetch('scriptChart');?>
        <?php echo $this->fetch('scriptQR');?>
        
        <script>
/* ==========================================================
 * QuickAdmin v1.3.3
 * tables.js
 * 
 * http://www.mosaicpro.biz
 * Copyright MosaicPro
 *
 * Built exclusively for sale @Envato Marketplaces
 * ========================================================== */ 

$(function()
{
	/* DataTables */
	if ($('.dynamicTable').size() > 0)
	{
		$('.dynamicTable').each(function()
		{
			// DataTables with TableTools
			if ($(this).is('.tableTools'))
			{
				$(this).dataTable({
				    "aaSorting": [],
					"sPaginationType": "bootstrap",
					"sDom": "<'row-fluid'<'span5'T><'span3'l><'span4'f>r>t<'row-fluid'<'span6'i><'span6'p>>",
					"oLanguage": {
						"sLengthMenu": "_MENU_ per page"
					},
					"oTableTools": {
				        "sSwfPath": commonPath + "theme/scripts/plugins/tables/DataTables/extras/TableTools/media/swf/copy_csv_xls_pdf.swf"
				    }
				});
			}
			// colVis extras initialization
			else if ($(this).is('.colVis'))
			{
				$(this).dataTable({
					"sPaginationType": "bootstrap",
					"sDom": "<'row-fluid'<'span3'f><'span3'l><'span6'C>r>t<'row-fluid'<'span6'i><'span6'p>>",
					"oLanguage": {
						"sLengthMenu": "_MENU_ per page"
					}
				});
			}
			// default initialization
			else
			{
				$(this).dataTable({
					"sPaginationType": "bootstrap",
					"sDom": "<'row-fluid'<'span5'T><'span3'l><'span4'f>r>t<'row-fluid'<'span6'i><'span6'p>>",
					"oLanguage": {
						"sLengthMenu": "_MENU_ per page"
					}
				});
			}
		});
	}
});
</script>

</body>
</html>