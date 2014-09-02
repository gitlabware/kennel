<h3 align="center">EVENTO</h3>
<div class="innerLR">

	<!-- Form -->
	<div class="form-horizontal margin-none" >
	<?php echo $this->Form->create('Evento');?>	
		<!-- Widget -->
		<div class="widget widget-heading-simple widget-body-gray">
		
			
			
			<div class="widget-body">
			
				<!-- Row -->
				<div class="row-fluid">
				
					<!-- Column -->
					<div class="span6">
					
						<!-- Group -->
						<div class="control-group">
							<label class="control-label" for="firstname">Nombre</label>
							<div class="controls">
                            <?php echo $this->Form->text('nombre', array('required','class' => 'span12','placeholder' => 'Nombre del Evento')); ?>
                            </div>
						</div>
						<!-- // Group END -->
						
						<!-- Group -->
						<div class="control-group">
							<label class="control-label" for="lastname">Desde</label>
							<div class="controls">
                             <?php echo $this->Form->date('fecha_inicio', array('required')); ?>
                            </div>
						</div>
						<!-- // Group END -->
						
						<!-- Group -->
						<div class="control-group">
							<label class="control-label" for="username">Hora</label>
							<div class="controls"><?php echo $this->Form->text('hora', array('placeholder'=>'HH:mm','required')); ?>  </div>
						</div>
						<!-- // Group END -->
						
					</div>
					<!-- // Column END -->
					
					<!-- Column -->
					<div class="span6">
					
						<!-- Group -->
						<div class="control-group">
							<label class="control-label" for="password">Ciudad</label>
							<div class="controls">
                            <?php 
                        //echo $this->Form->text('hora', array('id' => 'time', 'type' => 'time', 'class' => 'required', 'data-date-relative' => 'now'));
                        $departamentos = array(
                        'La Paz' => 'La Paz',
                        'Cochabamba' => 'Cochabamba',
                        'Santa Cruz' => 'Santa Cruz',
                        'Oruro' => 'Oruro',
                        'Potosi' => 'Potosi',
                        'Tarija' => 'Tarija',
                        'Pando' => 'Pando',
                        'Beni' => 'Beni',
                        'Sucre' => 'Sucre'
                        );  
                        echo $this->Form->select('ciudad', $departamentos,array('class' => 'selectpicker span6' ,'data-style' => 'btn-primary','required'));
                    ?> 
                            </div>
						</div>
						<!-- // Group END -->
						
						<!-- Group -->
						<div class="control-group">
							<label class="control-label" for="confirm_password">Hasta</label>
							<div class="controls"><?php echo $this->Form->date('fecha_fin', array('required')); ?></div>
						</div>
						<!-- // Group END -->
						
						<!-- Group -->
						<div class="control-group">
							<label class="control-label" for="email">Direccion</label>
							<div class="controls"><?php echo $this->Form->text('direccion', array('required','placeholder' => 'Direccion del Evento')); ?></div>
						</div>
						<!-- // Group END -->
						
					</div>
					<!-- // Column END -->
					
				</div>
				<!-- // Row END -->
				
				<hr class="separator" />
				
				<!-- Row -->
				<div class="row-fluid uniformjs">
				
					<!-- Column -->
					<div class="span4">
						<h4 style="margin-bottom: 10px;">Circuito</h4>
						<label class="checkbox" for="agree">
							
                            <?php echo $this->Form->checkbox('circuito',array('class' => 'checkbox','id' => 'agree')); ?>
                            Marcar si es circuito
						</label>
						
					</div>
					<!-- // Column END -->
					
					
				</div>
				<!-- // Row END -->
			
				<hr class="separator" />
				
				<!-- Form actions -->
				<div class="form-actions">
					<button type="submit" class="btn btn-icon btn-primary glyphicons circle_ok"><i></i>Guardar</button>
				</div>
				<!-- // Form actions END -->
				
			</div>
		</div>
		<!-- // Widget END -->
		
	</div>
	<!-- // Form END -->
	
</div>