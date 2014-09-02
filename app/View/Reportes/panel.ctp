
<div class="innerLR">
    <br>
<h2>Ingresos Regional - Nacional <span>Reporte grafico</span></h2>
	<div class="row-fluid">
		<div class="span9 tablet-column-reset">
	
			<!-- Website Traffic Chart -->
			<div class="widget widget-heading-simple widget-body-white" data-toggle="collapse-widget">
				<div class="widget-head">
					<h4 class="heading glyphicons cardio"><i></i>Grafica de Ingresos</h4>
				</div>
				<div class="widget-body">
					<div id="chart_simple" style="height: 250px;"></div>
				</div>
			</div>
			<!-- // Website Traffic Chart END -->
			
			<!-- Widget -->
			<div class="widget widget-heading-simple widget-body-simple">
					
				<!-- Widget Heading -->
				<div class="widget-head">
					<h4 class="heading glyphicons warning_sign"><i></i>Pendientes</h4>
				</div>
				<!-- // Widget Heading END -->
				
				<div class="widget-body">
					
					<!-- Stats Widgets -->
					<div class="row-fluid">
					
						<div class="span6">
						
							<!-- Stats Widget -->
							<a href="<?php echo $this->Html->url(array('controller' => 'Propietarios', 'action' => 'listadopendientes'));?>" class="widget-stats widget-stats-gray widget-stats-1">
								<span class="glyphicons user_add"><i></i><span class="txt">Propietarios</span></span>
								<div class="clearfix"></div>
                                                                <span class="count"><?php echo $this->requestAction(array('controller' => 'Propietarios','action' => 'get_propietarios_pendientes'))?></span>
							</a>
							<!-- // Stats Widget END -->
							
						</div>
						<div class="span6">
						
							<!-- Stats Widget -->
							<a href="<?php echo $this->Html->url(array('controller' => 'Mascotas', 'action' => 'listapendientes'));?>" class="widget-stats widget-stats-1">
								<span class="glyphicons dog"><i></i><span class="txt">Ejemplares</span></span>
								<div class="clearfix"></div>
								<span class="count"><?php echo $this->requestAction(array('controller' => 'Mascotas','action' => 'get_mascotas_pendientes'))?></span>
							</a>
							<!-- // Stats Widget END -->
							
						</div>
						
					</div>
					<!-- // Stats Widgets END -->
					
				</div>
			</div>
			<!-- // Widget END -->
                        <div class="widget widget-heading-simple widget-body-white">
                            <div class="widget-head">
					<h4 class="heading glyphicons stats"><i></i>CONSULTA DE EJEMPLARES</h4>
				</div>
                            <div class="widget-body">
                                <?php echo $this->Form->create('Reportes',array('action' => 'consulta_ejemplar','id' => 'consultaejemplares'));?>
                                <div class="row-fluid">
                                    <div class="span12">
                                        <div class="span8">
                                            <h5>Raza</h5>
                                            <?php echo $this->Form->select('Mascota.raza_id',$razas,array('class' => 'span12','id'=>'idraza','required' => 'false'));?>
                                        </div>
                                        <div class="span4">
                                            <h5>&nbsp;</h5>
                                            <h3>Nro: <span id="spanconsultanumero" style="color: #000033; font-weight: bold; font-size: 18px;">0</span></h3>
                                        </div>
                                    </div>
                                </div>
                                <div class="row-fluid">
                                    <div class="span12">
                                        <div class="span4">
                                            <h5>Sexo</h5>
                                            <?php echo $this->Form->select('Mascota.sexo',array('macho' => 'Macho','hembra' => 'Hembra'),array('class' => 'selectpicker span12','required' => 'false'));?>
                                        </div>
                                        <div class="span4">
                                            <h5>Departamento</h5>
                                            <?php echo $this->Form->select('Mascota.departamento_id',$departamentos,array('class' => 'selectpicker span12'));?>
                                        </div>
                                        <div class="span4">
                                            <h5> &nbsp;</h5>
                                            <?php echo $this->Form->submit('Consultar',array('class' => 'btn btn-block btn-primary'));?>
                                        </div>
                                    </div>
                                </div>
                                <?php echo $this->Form->end();?>
                                <br>
                            </div>
                        </div>
		</div>
		<div class="span3 tablet-column-reset">
			
			<!-- Widget -->
			<div class="widget widget-heading-simple widget-body-gray">
					
				<!-- Widget Heading -->
				<div class="widget-head">
					<h4 class="heading glyphicons list"><i></i>Categorias</h4>
				</div>
				<!-- // Widget Heading END -->
				
				<div class="widget-body list">
				
					<!-- List -->
					<ul>
						<li>
                                                    <a href="<?php echo $this->Html->url(array('controller' => 'Users','action' => 'index'))?>">Usuarios</a>
                                                        <span class="badge"><?php echo $this->requestAction(array('controller' => 'Users','action' => 'get_usuarios_admin'))?></span>
						</li>
						<li>
							<a href="<?php echo $this->Html->url(array('controller' => 'Mascotas','action' => 'index'))?>">Ejemplares</a>
							<span class="badge"><?php echo $this->requestAction(array('controller' => 'Mascotas','action' => 'get_mascotas_act'))?></span>
						</li>
						<li>
							<a href="<?php echo $this->Html->url(array('controller' => 'Propietarios','action' => 'index'))?>">Propietarios</a>
							<span class="badge"><?php echo $this->requestAction(array('controller' => 'Propietarios','action' => 'get_propietarios_act'))?></span>
						</li>
						<li>
							<a href="<?php echo $this->Html->url(array('controller' => 'Criaderos','action' => 'index'))?>">Criaderos</a>
							<span class="badge"><?php echo $this->requestAction(array('controller' => 'Propietarios','action' => 'get_propietarios_act'))?></span>
						</li>
						<li>
							<a href="<?php echo $this->Html->url(array('controller' => 'Cuentas','action' => 'index'))?>">Pagos pendientes</a>
							<span class="badge"><?php echo $this->requestAction(array('controller' => 'Cuentas','action' => 'get_pagos_pendientes'))?></span>
						</li>
					</ul>
					<!-- // List END -->
					
				</div>
			</div>
			<!-- // Widget END -->
			
			<!-- Widget -->
			<div class="widget widget-heading-simple widget-body-gray">
					
				<!-- Widget Heading -->
				<div class="widget-head">
					<h4 class="heading glyphicons calendar"><i></i>Calendar</h4>
				</div>
				<!-- // Widget Heading END -->
				<div class="widget-body">
					<div id="datepicker-inline"></div>
				</div>
			</div>
			<!-- // Widget END -->
			
			
		</div>
	</div>
	
</div>
<?php 
        $this->Html->script(array(
            'charts/flot/jquery.flot.js'
            ,'charts/flot/jquery.flot.pie.js'
            ,'charts/flot/jquery.flot.tooltip.js'
            ,'charts/flot/jquery.flot.selection.js'
            ,'charts/flot/jquery.flot.resize.js'
            ,'charts/flot/jquery.flot.orderBars.js'
            ,'panel'
        ), array('block' => 'scriptChart'));
        ?>
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
<script>
    

var charts = 
{
	
	// init charts on Charts page
	initCharts: function()
	{
		// init simple chart
		this.chart_simple.init();

	},

	// utility class
	utility:
	{
		chartColors: [ themerPrimaryColor, "#444", "#777", "#999", "#DDD", "#EEE" ],
		chartBackgroundColors: ["transparent", "transparent"],

		applyStyle: function(that)
		{
			that.options.colors = charts.utility.chartColors;
			that.options.grid.backgroundColor = { colors: charts.utility.chartBackgroundColors };
			that.options.grid.borderColor = charts.utility.chartColors[0];
			that.options.grid.color = charts.utility.chartColors[0];
		},
		
		// generate random number for charts
		randNum: function()
		{
			return (Math.floor( Math.random()* (1+40-20) ) ) + 20;
		}
	},


	// simple chart
	chart_simple:
	{
		// data
		data: 
		{
			/*sin: [],
			cos: []*/
                    <?php foreach($datos as $da):?>
                         dat<?php echo $da['id'];?> :[],    
                    <?php endforeach;?>
		},
		
		// will hold the chart object
		plot: null,
		// chart options
		options: 
		{
			grid: 
			{
				show: true,
			    aboveData: true,
			    color: "#3f3f3f",
			    labelMargin: 5,
			    axisMargin: 0, 
			    borderWidth: 0,
			    borderColor:null,
			    minBorderMargin: 5,
			    clickable: true, 
			    hoverable: true,
			    autoHighlight: true,
			    mouseActiveRadius: 20,
			    backgroundColor : { }
			},
	        series: {
	        	grow: {active: false},
	            lines: {
            		show: true,
            		fill: false,
            		lineWidth: 4,
            		steps: false
            	},
	            points: {
	            	show:true,
	            	radius: 5,
	            	symbol: "circle",
	            	fill: true,
	            	borderColor: "#fff"
	            }
	        },
	        legend: { position: "se", backgroundColor: null, backgroundOpacity: 0 },
	        colors: [],
	        shadowSize:1,
	        tooltip: true, //activate tooltip
			tooltipOpts: {
				content: "%s : %y.3",
				
				defaultTheme: false
			},
                      xaxis: {
                                mode: "time",
                                timeformat: "%m/%y"
                        }
		},

		// initialize
		init: function()
		{
			// apply styling
			charts.utility.applyStyle(this);
                        
			if (this.plot == null)
			{
				/*for (var i = 0; i < 14; i += 0.5) 
				{
			        this.data.sin.push([i, Math.sin(i)]);
			        this.data.cos.push([i, Math.cos(i)]);
			    }*/
                            <?php foreach($datos as $da):?>
                                <?php foreach ($da['ingresos'] as $d):?>
                                    <?php 
                                    $fecha = split('-', $d[0]['fecha']);
                                    $fecha = $fecha[1].'-'.$fecha[2].'-'.$fecha[0];
                                    ?>
                                    this.data.dat<?php echo $da['id']?>.push([new Date("<?php echo $d[0]['fecha']?>").getTime(),<?php echo $d['Ingreso']['total'];?>]);
                                <?php endforeach;?>
                            <?php endforeach;?>
			}
			this.plot = $.plot(
				$("#chart_simple"),
	           	[
                            /*
                            {
	    			label: "Sin", 
	    			data: this.data.sin,
	    			//lines: {fillColor: "#DA4C4C"},
	    			points: {fillColor: "#fff"}
	    		}, 
	    		{	
	    			label: "Cos", 
	    			data: this.data.cos,
	    			//lines: {fillColor: "#444"},
	    			points: {fillColor: "#fff"}
	    		}*/
                        <?php foreach($datos as $da):?>
                            {
	    			label: "<?php echo $da['sucursal']?>", 
	    			data: this.data.dat<?php echo $da['id'];?>,
	    			//lines: {fillColor: "#DA4C4C"},
	    			points: {fillColor: "#fff"}
                            },
                        <?php endforeach;?>
                    ], this.options);
		}
	},

};

</script>

<script>
$(function()
{
	$("#idraza").select2({
		allowClear: true
	});
});    
</script>
<script>
  $("#consultaejemplares").submit(function(e)
{
    var postData = $(this).serializeArray();
    var formURL = $(this).attr("action");
    $.ajax(
    {
        url : formURL,
        type: "POST",
        data : postData,
        /*beforeSend:function (XMLHttpRequest) {
            alert("antes de enviar");
        },
        complete:function (XMLHttpRequest, textStatus) {
            alert('despues de enviar');
        },*/
        success:function(data, textStatus, jqXHR) 
        {
            //data: return data from server
            $('#spanconsultanumero').text($.parseJSON(data).numero);
            //$("#parte").html(data);
        },
        error: function(jqXHR, textStatus, errorThrown) 
        {
            //if fails     
            alert("error");
        }
    });
    e.preventDefault(); 
});
</script>
