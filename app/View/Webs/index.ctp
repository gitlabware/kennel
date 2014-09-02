
<div class="innerLR" >
    
    <div class="widget widget-heading-simple widget-body-white">
        
        <div class="widget-body" id="ingreso">
        <div class="row-fluid">
        <div class="span12">
        <div class="span3">
        </div>
        <div class="span6">
        <h2 class="glyphicons lock">Sistema Kennel <i></i></h2>
        <?php echo $this->Form->create('Web',array('action' => 'login'))?>
        <!-- Form -->
					<div>
						<label>Email</label>
                        <?php echo $this->Form->text('User.username',array('class' => 'input-block-level margin-none','placeholder' => 'nombre de usuario o email'));?>
						<label>Password</label>
                        <?php echo $this->Form->password('User.password',array('class' => 'input-block-level margin-none','placeholder' => 'Su password'));?>
						<div class="separator bottom"></div> 
						<div class="row-fluid">
							<div class="span8">
								<div class="uniformjs"></div>
							</div>
							<div class="span4 center">
                                <?php echo $this->Form->submit('Ingresar',array('class' => 'btn btn-block btn-inverse'));?>
								
							</div>
						</div>
					</div>
        <?php echo $this->Form->end();?>
					<!-- // Form END -->
        <div class="row-fluid">
        <div class="span12">
        <br />
        <a href="javascript:" onclick="$('#ingreso').toggle(400);$('#formulario').toggle(400);" class="btn btn-icon-stacked btn-block btn-success glyphicons user_add"><i></i><span>No estoy registrado?</span><span class="strong">Registrarme</span></a>
        </div>
        </div>
        <div class="row-fluid">
        <div class="span12">
        <br />
        <!--<a href="javascript:" id="facebook" class="btn btn-icon-stacked btn-block btn-facebook glyphicons facebook"><i></i><span>Entrar usando tu</span><span class="strong">Cuenta Facebook</span></a>-->
        
        </div>
        </div>
        </div>
        <div class="span3">
        
        <div class="row-fluid">
        <div class="span12">
        <?php echo $this->Html->link('<i></i>Ver Ejemplares',array('action' => 'listamascotas'),array('class' => 'btn btn-block btn-default btn-icon glyphicons dog','escape' => false));?>
        </div>
        </div>
        </div>
        </div>
        </div>
					
							
        </div>
        <?php echo $this->Form->create('Web',array('action' => 'guardapropietario'));?>
        <div class="widget-body" id="formulario" style="display: none;">
        <h3>Formulario de Propietario Kennel</h3>
        <div class="row-fluid">
        <div class="span12">
        <div class="span6">
        <h5>Nombre Completo</h5>
        <?php echo $this->Form->text('Propietario.nombre',array('class' => 'span12','required','placeholder' => 'Ingrese el nombre completo'));?>
        </div>
        <div class="span6">
        <h5>C.I.</h5>
        <?php echo $this->Form->text('Propietario.ci',array('class' => 'span12','required','placeholder' => 'Ingrese su numero de cedula'));?>
        </div>
        </div>
        </div>
        <div class="row-fluid">
        <div class="span12">
        <div class="span6">
        <h5>Direccion</h5>
        <?php echo $this->Form->text('Propietario.direccion',array('class' => 'span12'));?>
        </div>
        <div class="span6">
        <h5>Telefono</h5>
        <?php echo $this->Form->text('Propietario.telefono1',array('class' => 'span12'));?>
        </div>
        </div>
        </div>
        <div class="row-fluid">
        <div class="span12">
        <div class="span6">
        <h5>Celular</h5>
        <?php echo $this->Form->text('Propietario.celular',array('class' => 'span12'));?>
        </div>
        <div class="span6">
        <h5>Email</h5>
        <?php echo $this->Form->text('Propietario.email1',array('class' => 'span12','required','placeholder' =>'Ingrese el email'));?>
        </div>
        </div>
        </div>
        
        <div class="row-fluid">
        <div class="span12">
        <div class="span6">
        <h5>&nbsp;</h5>
        <span class="btn btn-block btn-default btn-icon glyphicons user" onclick="$('#formulario').toggle(400);$('#ingreso').toggle(400);"><i></i>Ingresar</span>
        </div>
        <div class="span6">
        <h5>&nbsp;</h5>
        <?php echo $this->Form->submit('Registrarme',array('class' => 'btn btn-block btn-inverse'));?>
        </div>
        </div>
        </div>
        </div>
    </div>
    <?php echo $this->Form->end();?>
</div>
