<h3>EDITAR PISTA</h3>
<div class="innerLR">
	<!-- Form -->

	<?php echo $this->Form->create('Pista');?>	
		<!-- Widget -->
		<div class="widget widget-heading-simple widget-body-gray">
			<div class="widget-body">
				<!-- Row -->
				<div class="row-fluid">
					<!-- Column -->
					<div class="span6">
						<!-- Group -->
						<div class="control-group">
							<label class="control-label" for="firstname">Insertar Nombre de la Pista</label>
							<div class="controls">
                            <?php echo $this->Form->text('nombre', array('required','class' => 'span12','placeholder' => 'Nombre de la Pista')); ?>
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
					<button type="submit" class="btn btn-icon btn-primary glyphicons circle_ok"><i></i>Guardar</button>
				</div>
				<!-- // Form actions END -->
				
			</div>
		</div>
		<!-- // Widget END -->

	<!-- // Form END -->
	
</div>