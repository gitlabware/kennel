<!DOCTYPE html>
<!--[if lt IE 7]> <html class="ie lt-ie9 lt-ie8 lt-ie7 fluid top-full sidebar sidebar-full"> <![endif]-->
<!--[if IE 7]>    <html class="ie lt-ie9 lt-ie8 fluid top-full sticky-top sidebar sidebar-full"> <![endif]-->
<!--[if IE 8]>    <html class="ie lt-ie9 fluid top-full sticky-top sidebar sidebar-full"> <![endif]-->
<!--[if gt IE 8]> <html class="ie gt-ie8 fluid top-full sticky-top sidebar sidebar-full"> <![endif]-->
<!--[if !IE]><!--><html class="fluid top-full sticky-top sidebar sidebar-full"><!-- <![endif]-->

<head>
	<title>Usuarios Kennel</title>
	
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
	<!-- Select2 Plugin -->
	<link href="<?php echo $this->webroot;?>common/theme/scripts/plugins/forms/select2/select2.css" rel="stylesheet" />
	<link href="<?php echo $this->webroot;?>css/print.css" rel="stylesheet" />
	<!-- LESS.js Library -->
	<script src="<?php echo $this->webroot;?>common/theme/scripts/plugins/system/less.min.js"></script>
    
</head>
<body class="">

		<!-- Main Container Fluid -->
	<div class="container-fluid fluid menu-left">
		
				<!-- Sidebar menu & content wrapper -->
		<div id="wrapper">		
		<!-- Content -->
		<div id="content">		
        <?php echo $this->Session->flash(); ?>
        <?php echo $this->fetch('content'); ?>
        <?php echo $this->Js->writeBuffer();?>
        <!-- INICIO MODAL ---->
<div class="modal hide fade" id="modalsel" >
  
  <div id="modalsele">
  
  </div>
</div>

<!-- TERMINA MODAL ---->
		</div>
		<!-- // Content END -->
		</div>
				
		
		
	</div>
	<!-- // Main Container Fluid END -->

	<!-- JQuery -->
    
	<script src="<?php echo $this->webroot;?>js/jquery-1.10.1.min.js"></script>
	<script src="<?php echo $this->webroot;?>js/jquery-migrate-1.2.1.min.js"></script>
    <?php echo $this->Html->script(array('jquery.sheepItPlugin-1.1.1.min','print'));?>
    
<?php
 
echo $this->Html->script('oauthpopup');  ?>

<script type="text/javascript">
$(document).ready(function(){
    $('#facebook').click(function(e){
        $.oauthpopup({
            path: 'facebook_cps/login',
			width:600,
			height:300,
            callback: function(){
                window.location.reload();
            }
        });
		e.preventDefault();
    });
});


</script>
	
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