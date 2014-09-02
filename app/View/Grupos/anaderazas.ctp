<h3>INSERTAR NUEVA RAZA EN EL GRUPO</h3>
<div class="innerLR">
	<!-- Form -->

	<?php echo $this->Form->create('GruposRaza');?>	
		<!-- Widget -->
		<div class="widget widget-heading-simple widget-body-gray">
			<div class="widget-body">
				<!-- Row -->
				<div class="row-fluid">
					<!-- Column -->
					<div class="span6">
						<!-- Group -->
						<div class="control-group">
							<label class="control-label" for="firstname">Raza</label>
							<div class="controls">
                            <?php echo $this->Form->hidden(null, array('value'=>$id, 'name'=>"data[#index#][GruposRaza][grupo_id]"))?>
                            <?php echo $this->Form->select(null, $razas, array('name'=>"data[#index#][GruposRaza][raza_id]", 'id'=>'50'));?>
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
					<button type="submit" class="btn btn-icon btn-primary glyphicons circle_ok"><i></i>Registrar</button>
				</div>
				<!-- // Form actions END -->
				
			</div>
		</div>
		<!-- // Widget END -->

	<!-- // Form END -->
	
</div>