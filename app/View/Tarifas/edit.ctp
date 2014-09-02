<h3>EDITAR LA TARIFATARIFA</h3>
<div class="innerLR">
	<!-- Form -->

	<?php echo $this->Form->create('Tarifa');?>	
		<!-- Widget -->
		<div class="widget widget-heading-simple widget-body-gray">
			<div class="widget-body">
				<!-- Row -->
				<div class="row-fluid">
					<!-- Column -->
					<div class="span6">
						<!-- Group -->
						<div class="control-group">
							<label class="control-label" for="firstname">Descripcion de la Tarifa</label>
							<div class="controls">
                            <?php echo $this->Form->text('descripcion', array('required','class' => 'span12','placeholder' => 'Insertar su Nombre')); ?>
                            </div>
						</div>
					</div>
					<!-- Column -->
					<div class="span6">
						<!-- Group -->
                        <div class="control-group">
							<label class="control-label" for="firstname">Monto Total</label>
							<div class="controls">
                            <?php echo $this->Form->text('monto_total', array('required','class' => 'span12','placeholder' => 'Inserte su Carnet de Identidad')); ?>
                            </div>
						</div>
						<!-- // Group END -->
					</div>
				</div>
                <hr class="separator" />
                <div class="row-fluid">
					<!-- Column -->
					<div class="span6">
						<!-- Group -->
						<div class="control-group">
							<label class="control-label" for="firstname">Lugar</label>
							<div class="controls">
                            <?php echo $this->Form->radio('nacionalregional', array('1'=>"Nacional", '2'=>"Regional",'class'=>'required'));?>
                            </div>
						</div>
					</div>
				</div>
                <div class="row-fluid">
					<!-- Column -->
					<div class="span6">
						<!-- Group -->
						<div class="control-group">
							<label class="control-label" for="firstname">Monto en Nacional</label>
							<div class="controls">
                            <?php echo $this->Form->text('nacional', array('required','class' => 'span12','placeholder' => 'Insertar su Nombre')); ?>
                            </div>
						</div>
                        <div class="control-group">
							<label class="control-label" for="firstname">Categoria</label>
							<div class="controls">
                            <?php echo $this->Form->select('categoriastarifa_id', $categorias, array('required','class' => 'span12','placeholder' => 'Insertar su Nombre')); ?>
                            </div>
						</div>
					</div>
					<!-- Column -->
					<div class="span6">
						<!-- Group -->
                        <div class="control-group">
							<label class="control-label" for="firstname">Monto en Regional</label>
							<div class="controls">
                            <?php echo $this->Form->text('regional', array('required','class' => 'span12','placeholder' => 'Inserte su Carnet de Identidad')); ?>
                            </div>
						</div>
						<!-- // Group END -->
					
                    <div class="control-group">
							<label class="control-label" for="firstname">Gestion</label>
							<div class="controls">
                            <?php echo $this->Form->text('gestion', array('required','class' => 'span12','placeholder' => 'Insertar su Nombre')); ?>
                            </div>
					</div>
                    </div>
				</div>
                <div class="row-fluid">
					<!-- Column -->
					<div class="span6">
						<!-- Group -->
						<div class="control-group">
							<label class="control-label" for="firstname">Tipo</label>
							<div class="controls">
                            <?php
            echo $this->Form->radio('tipo_id', $tipos, array('class'=>'required'));?>
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