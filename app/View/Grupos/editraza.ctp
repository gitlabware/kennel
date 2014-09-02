<h3>Editar la Raza en el Grupo</h3>
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
							<?php echo $this->Form->input('raza_id', array(
                                                          'type' => 'select',
                                                          'options' => $razas,
                                                          'value' => $razacria['GruposRaza']['raza_id'],
                                                          'selected' => "selected")) ?>
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
				
					<?php echo $this->Html->link('Atras', array('controller'=>'Grupos','action' =>'index'), array('class' => 'btn btn-icon btn-primary glyphicons circle_ok'));?>
				</div>
				<!-- // Form actions END -->
				
			</div>
		</div>
		<!-- // Widget END -->

	<!-- // Form END -->
	
</div>