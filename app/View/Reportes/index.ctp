<div class="innerLR">
    <div class="widget widget-heading-simple widget-body-gray">
    <h3>Reportes</h3>
    <div class="row-fluid">
    <div class="span12">
    <div class="widget widget-heading-simple widget-body-white" data-toggle="collapse-widget" data-collapse-closed="false">
	
				<!-- Widget heading -->
				<div class="widget-head center">
					<h3 class="heading center">Reporte de Pagos por Fecha</h3>
				</div>
				<!-- // Widget heading END -->
				
				<div class="widget-body">
                <?php echo $this->Form->create('Reporte',array('action' => 'reportepagos'));?>
					<div class="row-fluid">
						<div class="span12">
                        <div class="span3">
                        <h5>Desde</h5>
                        <?php echo $this->Form->date('fecha_ini',array('class' => 'span12','required'));?>
                        </div>
                        <div class="span3">
                        <h5>Hasta</h5>
                        <?php echo $this->Form->date('fecha_fin',array('class' => 'span12','required'));?>
                        </div>
                        
                        <div class="span3">
                        <h5>Sucursal</h5>
                        <?php echo $this->Form->select('sucursale_id',$sucursales,array('class' => 'span12'));?>
                        </div>
                        <div class="span3">
                        <h5>Tipo</h5>
                        <?php $tipos = array('nacional' => 'Nacional','regional' => 'Regional');?>
                        <?php echo $this->Form->select('tipo_id',$tipos,array('class' => 'span12'));?>
                        </div>                          
                        </div>
					</div>
                    <div class="row-fluid">
                        <div class="span12">
                        <?php echo $this->Form->submit('Generar Reporte',array('class' => 'btn btn-block btn-primary'));?>
                        <?php echo $this->Form->end();?>
                        </div>
                    </div>
				</div>
			</div>
    </div>
    </div>
    
    </div>
    
</div>