<h3>EDITAR LA SUCURSAL</h3>
<div class="innerLR">
	<!-- Form -->

	<?php echo $this->Form->create('Sucursale');?>	
		<!-- Widget -->
		<div class="widget widget-heading-simple widget-body-gray">
			<div class="widget-body">
				<!-- Row -->
				<div class="row-fluid">
					<!-- Column -->
					<div class="span6">
						<!-- Group -->
						<div class="control-group">
							<label class="control-label" for="firstname">Insertar Nombre de la Sucursal</label>
							<div class="controls">
                            <?php echo $this->Form->text('nombre', array('required','class' => 'span12','placeholder' => 'Insertar el nombre de la Sucursal')); ?>
                            </div>
						</div>
						<!-- // Group END -->
						<!-- Group -->
						<div class="control-group">
							<label class="control-label" for="firstname">Insertar Tel&eacute;fono</label>
							<div class="controls">
                            <?php echo $this->Form->text('telefono', array('required','class' => 'span12','placeholder' => 'Inserte su telefono')); ?>
                            </div>
						</div>
						<!-- // Group END -->
					</div>
					<!-- Column -->
					<div class="span6">
						<!-- Group -->
                        <div class="control-group">
							<label class="control-label" for="firstname">Inserte la Direcci&oacute;n</label>
							<div class="controls">
                            <?php echo $this->Form->text('direccion', array('required','class' => 'span12','placeholder' => 'Inserte la Direccion')); ?>
                            </div>
						</div>
						
						<!-- // Group END -->
						<!-- Group -->
						<div class="control-group">
							<label class="control-label" for="firstname">Inserte su Celular 1</label>
							<div class="controls">
                            <?php echo $this->Form->text('celular', array('required','class' => 'span12','placeholder' => 'Inserte su Nro.de Telefono')); ?>
                            </div>
						</div>
						<!-- // Group END -->
					</div>
				</div>
                <div class="row-fluid">
					<!-- Column -->
					<div class="span6">
						<!-- Group -->
						<div class="control-group">
							<label class="control-label" for="firstname">Seleccione el departamento</label>
							<div class="controls">
                            <?php echo $this->Form->select('departamento_id',$departamentos, array('required','class' => 'span12','placeholder' => 'Inserte su Nro.de Telefono')); ?>
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

	<!-- // Form END -->
	
</div>