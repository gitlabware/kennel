<h3>REGISTRO NUEVO CRIADERO</h3>
<div class="innerLR">
	<!-- Form -->

	<?php echo $this->Form->create('Criadero');?>	
		<!-- Widget -->
		<div class="widget widget-heading-simple widget-body-gray">
			<div class="widget-body">
				<!-- Row -->
				<div class="row-fluid">
					<!-- Column -->
					<div class="row-fluid">
					<!-- Column -->
					<div class="span6">
						<!-- Group -->
						<div class="control-group">
							<label class="control-label" for="firstname">Seleccione el Propietario</label>
							<div class="controls">
                            <?php echo $this->Form->select('propietario_id',$propietarios, array('required','class' => 'span12','placeholder' => 'Insertar su Nombre')); ?>
                            </div>
						</div>
					</div>
					<!-- Column -->
					<div class="span6">
						<!-- Group -->
                        <div class="control-group">
							<label class="control-label" for="firstname">Seleccione el Co-Propietario</label>
							<div class="controls">
                            <?php echo $this->Form->select('propietario_id',$propietarios, array('required','class' => 'span12','placeholder' => 'Inserte su Carnet de Identidad')); ?>
                            </div>
						</div>
						<!-- // Group END -->
					</div>
				    </div>
				</div>
                <div class="row-fluid">
					<!-- Column -->
					<div class="span6">
						<!-- Group -->
						<div class="control-group">
							<label class="control-label" for="firstname">Direccion de Criadero</label>
							<div class="controls">
                            <?php echo $this->Form->text('direccion', array('required','class' => 'span12','placeholder' => 'Insertar Direccion del Criadero')); ?>
                            </div>
						</div>
					</div>
					<!-- Column -->
					<div class="span6">
						<!-- Group -->
                        <div class="control-group">
							<label class="control-label" for="firstname">Departamento</label>
							<div class="controls">
                            <?php echo $this->Form->select('departamento_id',$departamentos, array('required','class' => 'span12','placeholder' => 'Seleccione el Departamento')); ?>
                            </div>
						</div>
						<!-- // Group END -->
					</div>
				</div>
				<!-- // Row END -->
                <div class="row-fluid">
					<!-- Column -->
					<div class="span6">
						<!-- Group -->
						<div class="control-group">
							<label class="control-label" for="firstname">Telefono Fijo 1</label>
							<div class="controls">
                            <?php echo $this->Form->text('telefono1', array('required','class' => 'span12','placeholder' => 'Insertar Telefono Fijo 1')); ?>
                            </div>
						</div>
					</div>
					<!-- Column -->
					<div class="span6">
						<!-- Group -->
                        <div class="control-group">
							<label class="control-label" for="firstname">Celular 1</label>
							<div class="controls">
                            <?php echo $this->Form->text('celular1', array('required','class' => 'span12','placeholder' => 'Insertar Nro. de Celular')); ?>
                            </div>
						</div>
						<!-- // Group END -->
					</div>
				</div>
				<!-- // Row END -->
                <div class="row-fluid">
					<!-- Column -->
					<div class="span6">
						<!-- Group -->
						<div class="control-group">
							<label class="control-label" for="firstname">Telefono Fijo 2</label>
							<div class="controls">
                            <?php echo $this->Form->text('telefono2', array('required','class' => 'span12','placeholder' => 'Insertar Telefono Fijo 2')); ?>
                            </div>
						</div>
					</div>
					<!-- Column -->
					<div class="span6">
						<!-- Group -->
                        <div class="control-group">
							<label class="control-label" for="firstname">Celular 2</label>
							<div class="controls">
                            <?php echo $this->Form->text('celular2', array('required','class' => 'span12','placeholder' => 'Insertar Nro. de Celular')); ?>
                            </div>
						</div>
						<!-- // Group END -->
					</div>
				</div>
				<!-- // Row END -->
                <div class="row-fluid">
					<!-- Column -->
					<div class="span6">
						<!-- Group -->
						<div class="control-group">
							<label class="control-label" for="firstname">Inserte Em@il 1</label>
							<div class="controls">
                            <?php echo $this->Form->text('email1', array('required','class' => 'span12','placeholder' => 'Insertar su correo Electronico')); ?>
                            </div>
						</div>
					</div>
					<!-- Column -->
					<div class="span6">
						<!-- Group -->
                        <div class="control-group">
							<label class="control-label" for="firstname">Inserte Em@il 2</label>
							<div class="controls">
                            <?php echo $this->Form->text('email2', array('required','class' => 'span12','placeholder' => 'Insertar su correo Electronico')); ?>
                            </div>
						</div>
						<!-- // Group END -->
					</div>
				</div>
				<!-- // Row END -->
                <div class="row-fluid">
					<!-- Column -->
					<div class="span6">
						<!-- Group -->
						<div class="control-group">
							<label class="control-label" for="firstname">P&aacute;gina Web</label>
							<div class="controls">
                            <?php echo $this->Form->text('paginaweb', array('required','class' => 'span12','placeholder' => 'Insertar su direccion de la P&aacute;gina Web')); ?>
                            </div>
						</div>
					</div>
					<!-- Column -->
				</div>
				<!-- // Row END -->
				 <div class="row-fluid">
					<!-- Column -->
					<div class="span6">
						<!-- Group -->
						<div class="control-group">
							<label class="control-label" for="firstname">Seleccione si es Socio o Criador</label>
							<div class="controls">
                            <?php echo $this->Form->radio('tipo_id', $tipos)?>
                            </div>
						</div>
					</div>
					<!-- Column -->
					<div class="span6">
						<!-- Group -->
                        <div class="control-group">
							<label class="control-label" for="firstname">Fecha desde</label>
							<div class="controls">
                            <?php echo $this->Form->date('fecha_nacimiento', array('placeholder' => 'Click para Insertar Fecha', 'id' => 'date','required','class' => 'span12')); ?>
                            </div>
						</div>
						<!-- // Group END -->
					</div>
				</div>
				<!-- // Row END -->
                <div class="row-fluid">
					<!-- Column -->
					<div class="row-fluid">
					<!-- Column -->
					<div class="span6">
						<!-- Group -->
						<div class="control-group">
							<label class="control-label" for="firstname">Obsertaciones Criadero </br>Nombre 1 Criadero Propuesto</label>
							<div class="controls">
                            <?php echo $this->Form->text('propietario_id', array('required','class' => 'span12','placeholder' => 'Insertar su Nombre')); ?>
                            </div>
						</div>
					</div>
					<!-- Column -->
					<div class="span6">
						<!-- Group -->
                        <div class="control-group">
							<label class="control-label" for="firstname"></br>Obs 1 Exclusivo Of Nac.</label>
							<div class="controls">
                            <?php echo $this->Form->text('propietario_id', array('required','class' => 'span12','placeholder' => 'Inserte su Carnet de Identidad')); ?>
                            </div>
						</div>
						<!-- // Group END -->
					</div>
				    </div>
				</div>
                <!-- // Row END -->
                 <div class="row-fluid">
					<!-- Column -->
					<div class="row-fluid">
					<!-- Column -->
					<div class="span6">
						<!-- Group -->
						<div class="control-group">
							<label class="control-label" for="firstname">Nombre 2 Criadero Propuesto</label>
							<div class="controls">
                            <?php echo $this->Form->text('propietario_id', array('required','class' => 'span12','placeholder' => 'Insertar su Nombre')); ?>
                            </div>
						</div>
					</div>
					<!-- Column -->
					<div class="span6">
						<!-- Group -->
                        <div class="control-group">
							<label class="control-label" for="firstname">Obs 2 Exclusivo Of Nac.</label>
							<div class="controls">
                            <?php echo $this->Form->text('propietario_id', array('required','class' => 'span12','placeholder' => 'Inserte su Carnet de Identidad')); ?>
                            </div>
						</div>
						<!-- // Group END -->
					</div>
				    </div>
				</div>
                <!-- // Row END -->
                 <div class="row-fluid">
					<!-- Column -->
					<div class="row-fluid">
					<!-- Column -->
					<div class="span6">
						<!-- Group -->
						<div class="control-group">
							<label class="control-label" for="firstname">Nombre 3 Criadero Propuesto</label>
							<div class="controls">
                            <?php echo $this->Form->text('propietario_id', array('required','class' => 'span12','placeholder' => 'Insertar su Nombre')); ?>
                            </div>
						</div>
					</div>
					<!-- Column -->
					<div class="span6">
						<!-- Group -->
                        <div class="control-group">
							<label class="control-label" for="firstname">Obs 3 Exclusivo Of Nac.</label>
							<div class="controls">
                            <?php echo $this->Form->text('propietario_id', array('required','class' => 'span12','placeholder' => 'Inserte su Carnet de Identidad')); ?>
                            </div>
						</div>
						<!-- // Group END -->
					</div>
				    </div>
				</div>
                <!-- // Row END -->
                <div class="row-fluid">
					<!-- Column -->
					<div class="row-fluid">
					<!-- Column -->
					<div class="span6">
						<!-- Group -->
						<div class="control-group">
							<label class="control-label" for="firstname">Seleccione una Opcion</label>
							<div class="controls">
                            <?php echo $this->Form->text('propietario_id', array('required','class' => 'span12','placeholder' => 'Insertar su Nombre')); ?>
                            </div>
						</div>
					</div>
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