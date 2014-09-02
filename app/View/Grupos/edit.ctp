<h3>EDITAR EL GRUPO</h3>
<div class="innerLR">
	<!-- Form -->
	<div class="form-horizontal margin-none" >
	<?php echo $this->Form->create('Grupo');?>	
		<!-- Widget -->
		<div class="widget widget-heading-simple widget-body-gray">
			<div class="widget-body">
				<!-- Row -->
				<div class="row-fluid">
					<!-- Column -->
					<div class="span6">
						<!-- Group -->
						<div class="control-group">
							<label class="control-label" for="firstname">Insertar Nuevo Grupo</label>
							<div class="controls">
                            <?php echo $this->Form->text('nombre', array('required','class' => 'span12','placeholder' => 'Nombre del Grupo')); ?>
                            </div>
						</div>
						<!-- // Group END -->
						<!-- Group -->
						<div class="control-group">
							<label class="control-label" for="firstname">Inserte Descripcion</label>
							<div class="controls">
                            <?php echo $this->Form->text('descripcion', array('required','class' => 'span12','placeholder' => 'Inserte una Descripcion')); ?>
                            </div>
						</div>
						<!-- // Group END -->
					</div>
				</div>
				<!-- // Row END -->
				<hr class="separator" />
				<!-- Row -->
				
				<!-- Form actions -->
				<div class="form-actions">
					<button type="submit" class="btn btn-icon btn-primary glyphicons circle_ok"><i></i>Editar</button>
				</div>
				<!-- // Form actions END -->
				
			</div>
		</div>
		<!-- // Widget END -->
		
	</div>
	<!-- // Form END -->
	
</div>