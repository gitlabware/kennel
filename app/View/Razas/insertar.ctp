<div class="innerLR">
<h3>Nueva Raza</h3>
<div class="row-fluid">
	
		<!-- Column -->
		<div class="span6">
		<?php echo $this->Form->create('Raza');?>
			<!-- Widget -->
			<div class="widget widget-heading-simple widget-body-white" data-toggle="collapse-widget">
	
				<!-- Widget heading -->
				<div class="widget-head">
					<h4 class="heading">Nombre de la Raza</h4>
				</div>
				<!-- // Widget heading END -->
				
				<div class="widget-body">
						<?php echo $this->Form->text('nombre',array('required','placeholder' => 'Ingrese Nombre de la Raza','class' => 'span10'))?>
					
				</div>
                 
			</div>
			<!-- // Widget END -->
            <!-- Widget -->
			<div class="widget widget-heading-simple widget-body-white" data-toggle="collapse-widget">
                <div class="widget-head">
					<h4 class="heading">Descripcion de la Raza</h4>
				</div>
				<!-- // Widget heading END -->
				
				<div class="widget-body">
						
            <?php echo $this->Form->text('descripcion',array('required','placeholder' => 'descripcion de la raza','class' => 'span12'));?>
				</div>
                <div class="widget-body">
				<?php echo $this->Form->submit('Guardar',array('class' => 'btn btn-block btn-success'));?>
                <?php echo $this->Form->end()?>
                </div>
            </div>
			<!-- // Widget END -->
			
			
			
			
		
		</div>
		<!-- // Column END -->
		
		
		
	</div>
</div>