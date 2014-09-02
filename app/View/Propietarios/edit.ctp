<h3>EDITAR PROPIETARIO</h3>
<div class="innerLR">
	<!-- Form -->

	<?php echo $this->Form->create('Propietario');?>	
		<!-- Widget -->
		<div class="widget widget-heading-simple widget-body-gray">
			<div class="widget-body">
				<!-- Row -->
				<div class="row-fluid">
					<!-- Column -->
					<div class="span6">
						<!-- Group -->
						<div class="control-group">
							<label class="control-label" for="firstname">Insertar su Nombre</label>
							<div class="controls">
                            <?php echo $this->Form->text('nombre', array('required','class' => 'span12','placeholder' => 'Insertar su Nombre')); ?>
                            </div>
						</div>
						<!-- // Group END -->
						<!-- Group -->
						<div class="control-group">
							<label class="control-label" for="firstname">Insertar su Direccion</label>
							<div class="controls">
                            <?php echo $this->Form->text('direccion', array('required','class' => 'span12','placeholder' => 'Inserte su direccion')); ?>
                            </div>
						</div>
						<!-- // Group END -->
					</div>
					<!-- Column -->
					<div class="span6">
						<!-- Group -->
                        <div class="control-group">
							<label class="control-label" for="firstname">Inserte Carnet de Identidad</label>
							<div class="controls">
                            <?php echo $this->Form->text('ci', array('required','class' => 'span12','placeholder' => 'Inserte su Carnet de Identidad')); ?>
                            </div>
						</div>
						
						<!-- // Group END -->
						<!-- Group -->
						<div class="control-group">
							<label class="control-label" for="firstname">Inserte su Telefono 1</label>
							<div class="controls">
                            <?php echo $this->Form->text('telefono1', array('required','class' => 'span12','placeholder' => 'Inserte su Nro.de Telefono')); ?>
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
							<label class="control-label" for="firstname">Inserte su Telefono 2</label>
							<div class="controls">
                            <?php echo $this->Form->text('telefono2', array('required','class' => 'span12','placeholder' => 'Inserte su Nro.de Telefono')); ?>
                            </div>
						</div>
						<!-- // Group END -->
						<!-- Group -->
						<div class="control-group">
							<label class="control-label" for="firstname">Inserte su Celular 2</label>
							<div class="controls">
                            <?php echo $this->Form->text('celular2', array('required','class' => 'span12','placeholder' => 'Inserte su Nro.de Celular')); ?>
                            </div>
						</div>
						<!-- // Group END -->
					</div>
					<!-- Column -->
					<div class="span6">
						<!-- Group -->
                        <div class="control-group">
							<label class="control-label" for="firstname">Inserte su Celular 1</label>
							<div class="controls">
                            <?php echo $this->Form->text('celular', array('required','class' => 'span12','placeholder' => 'Inserte su Nro.de Celular')); ?>
                            </div>
						</div>
						
						<!-- // Group END -->
						<!-- Group -->
						<div class="control-group">
							<label class="control-label" for="firstname">Inserte su Em@il 1</label>
							<div class="controls">
                            <?php echo $this->Form->text('email1', array('required','class' => 'span12','placeholder' => 'Inserte su correo electronico')); ?>
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
							<label class="control-label" for="firstname">Inserte su Em@il 2</label>
							<div class="controls">
                            <?php echo $this->Form->text('email2', array('required','class' => 'span12','placeholder' => 'Inserte su correo electronico')); ?>
                            </div>
						</div>
						<!-- // Group END -->
						<!-- Group -->
						<div class="control-group">
							<label class="control-label" for="firstname">Insertar su Tipo </label>
							<div class="controls">
                            <?php echo $this->Form->select('tipo_id',$tipos, array('required','class' => 'span12','placeholder' => 'Nombre de la Pista')); ?>
                            </div>
						</div>
						<!-- // Group END -->
					</div>
					<!-- Column -->
					<div class="span6">
						<!-- Group -->
                        <div class="control-group">
							<label class="control-label" for="firstname">Inserte su criadreo</label>
							<div class="controls">
                            <?php echo $this->Form->select('criadero_id', $criaderos, array('required','class' => 'span12','placeholder' => 'Seleccione el criadero')); ?>
                            </div>
						</div>
						
						<!-- // Group END -->
						<!-- Group -->
						<div class="control-group">
							<label class="control-label" for="firstname">Inserte su Estado</label>
							<div class="controls">
                            <?php echo $this->Form->select('estado', $opt, array('required','class' => 'span12','placeholder' => 'Inserte una Descripcion')); ?>
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