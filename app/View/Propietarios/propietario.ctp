<?php echo $this->Form->create('Propietario',array('action' => 'guardapropietario'));?>
<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
    <h3>Propietario</h3>
  </div>
  
  <div class="modal-body">
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
                            <?php echo $this->Form->hidden('id');?>
                            <?php echo $this->Form->text('nombre', array('required','class' => 'span12','placeholder' => 'Insertar su Nombre')); ?>
                            </div>
						</div>
						<!-- // Group END -->
						<!-- Group -->
						<div class="control-group">
							<label class="control-label" for="firstname">Insertar su Direccion</label>
							<div class="controls">
                            <?php echo $this->Form->text('direccion', array('class' => 'span12','placeholder' => 'Inserte su direccion')); ?>
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
                            <?php echo $this->Form->text('ci', array('class' => 'span12','placeholder' => 'Inserte su Carnet de Identidad')); ?>
                            </div>
						</div>
						
						<!-- // Group END -->
						<!-- Group -->
						<div class="control-group">
							<label class="control-label" for="firstname">Inserte su Telefono 1</label>
							<div class="controls">
                            <?php echo $this->Form->text('telefono1', array('class' => 'span12','placeholder' => 'Inserte su Nro.de Telefono')); ?>
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
                            <?php echo $this->Form->text('telefono2', array('class' => 'span12','placeholder' => 'Inserte su Nro.de Telefono')); ?>
                            </div>
						</div>
						<!-- // Group END -->
						<!-- Group -->
						<div class="control-group">
							<label class="control-label" for="firstname">Inserte su Celular 2</label>
							<div class="controls">
                            <?php echo $this->Form->text('celular2', array('class' => 'span12','placeholder' => 'Inserte su Nro.de Celular')); ?>
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
                            <?php echo $this->Form->text('celular', array('class' => 'span12','placeholder' => 'Inserte su Nro.de Celular')); ?>
                            </div>
						</div>
						
						<!-- // Group END -->
						<!-- Group -->
						<div class="control-group">
							<label class="control-label" for="firstname">Inserte su Em@il 1</label>
							<div class="controls">
                            <?php echo $this->Form->text('email1', array('class' => 'span12','placeholder' => 'Inserte su correo electronico')); ?>
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
                            <?php echo $this->Form->text('email2', array('class' => 'span12','placeholder' => 'Inserte su correo electronico')); ?>
                            </div>
						</div>
						<!-- // Group END -->
						<!-- Group -->
						<div class="control-group">
							<label class="control-label" for="firstname">Insertar su Tipo </label>
							<div class="controls">
                            <?php echo $this->Form->select('tipo_id',$tipos, array('class' => 'span12','placeholder' => 'Nombre de la Pista','required')); ?>
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
                            <?php echo $this->Form->select('criadero_id', $criaderos, array('class' => 'span12','placeholder' => 'Seleccione el criadero')); ?>
                            </div>
						</div>
						
						<!-- // Group END -->
						<!-- Group -->
						<div class="control-group">
							<label class="control-label" for="firstname">Inserte su Estado</label>
							<div class="controls">
                            <?php echo $this->Form->select('estado', $opt, array('class' => 'span12','placeholder' => 'Inserte una Descripcion','required')); ?>
                            </div>
						</div>
						<!-- // Group END -->
					</div>
				</div>
				
				
			</div>
		</div>
		<!-- // Widget END -->
  </div>
  <div class="modal-footer">
    <?php echo $this->Form->submit('Guardar',array('class' => 'btn btn-primary'));?>
            <?php echo $this->Form->end()?>
                
  </div>