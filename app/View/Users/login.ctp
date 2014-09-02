<?php //debug(date("Y-m-d H:i:s"));exit;?>
<div class="wrapper" id="ingreso">

    <h1 class="glyphicons lock">Sistema Kennel <i></i></h1>

    <!-- Box -->
    <div class="widget widget-heading-simple widget-body-gray">

        <div class="widget-body">
            <?php echo $this->Form->create('User'); ?>
            <!-- Form -->
            <div>
                <label>Nombre de Usuario</label>
                <?php echo $this->Form->text('username', array('class' => 'input-block-level margin-none', 'placeholder' => 'Ingrese su usuario')); ?> 
                <label>Password </label>
                <?php echo $this->Form->password('password', array('class' => 'input-block-level margin-none', 'placeholder' => 'Ingrese su password')); ?>

                <div class="separator bottom"></div> 
                <div class="row-fluid">
                    <div class="span8">

                    </div>
                    <div class="span4 center">
                        <?php echo $this->Form->submit('Entrar', array('class' => 'btn btn-block btn-inverse')); ?>
                    </div>
                </div>
                <div class="row-fluid">
        <div class="span12">
        <br />
        <a href="javascript:" onclick="$('#ingreso').toggle(400);$('#formulario').toggle(400);" class="btn btn-icon-stacked btn-block btn-success glyphicons user_add"><i></i><span>No estoy registrado?</span><span class="strong">Registrarme</span></a>
        <br />
        <br />
        <a href="<?php echo $this->Html->url(array('controller' => 'Usuarios','action' => 'listadomascotas'));?>"  class="btn btn-icon-stacked btn-block btn-primary glyphicons list"><i></i><span>Ingresar al listado de ejemplares</span><span class="strong">VER EJEMPLARES</span></a>
        </div>
        </div>
            </div>
            <?php echo $this->Form->end(); ?>
            <!-- // Form END -->

        </div>
        
        

    </div>
    <!-- // Box END -->



</div>
<div class="widget widget-heading-simple widget-body-white">
<?php echo $this->Form->create('User',array('action' => 'guarda_nuevo_propietario'));?>
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
        <?php echo $this->Form->hidden('Propietario.estado',array('value' => '1'));?>
        <?php echo $this->Form->hidden('Propietario.tipo_id',array('value' => '2'));?>
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
