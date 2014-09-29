
			<!-- Brand -->
			<a href="#" class="appbrand">SIS KENNEL</a>
		
			<!-- Scrollable menu wrapper with Maximum height -->
			<div class="slim-scroll" data-scroll-height="800px">
			
			
			<!-- Regular Size Menu -->
			<ul>
			
								
				<!-- Not blank page -->
								
				<!-- Quick Sidebar Style -->
								<!-- // Quick Sidebar Style END -->
				
				<!-- Full Sidebar Style -->
								<li><a href="<?php echo $this->Html->url(array('controller' => 'Reportes','action' => 'panel'));?>" class="glyphicons dashboard"><i></i>Pannel Kennel</a></li>
				
                <li class="dropdown dd-1">
					<a href="" data-toggle="dropdown" class="glyphicons notes"><i></i>Razas<span class="icon-chevron-right"></span></a>
					<ul class="dropdown-menu pull-left">
						<li><a href="<?php echo $this->Html->url(array('controller' => 'Razas','action' => 'index'));?>" class="glyphicons calendar"><i></i>Listado de Razas</a></li>
						<li><a href="#myModal" data-toggle="modal" class="glyphicons credit_card" onclick="$('#imgcargando').toggle();$('#mimodal').toggle();$('#mimodal').load('<?php echo $this->Html->url(array('controller' => 'Razas','action' => 'ajaxraza'));?>',function(){$('#imgcargando').toggle(100);$('#mimodal').toggle();});"><i></i>Nueva Raza</a></li>
                        
					</ul>
				</li>
                <li class="dropdown dd-1">
					<a href="" data-toggle="dropdown" class="glyphicons notes"><i></i>Eventos <span class="icon-chevron-right"></span></a>
					<ul class="dropdown-menu pull-left">
						<li><a href="<?php echo $this->Html->url(array('controller' => 'Eventos','action' => 'index'));?>" class="glyphicons calendar"><i></i>Listado de Eventos</a></li>
						<li><a href="<?php echo $this->Html->url(array('controller' => 'Eventos','action' => 'insertar'));?>" class="glyphicons calendar"><i></i>Nuevo Evento</a></li>
                        
					</ul>
				</li>
                <li class="dropdown dd-1">
					<a href="" data-toggle="dropdown" class="glyphicons notes"><i></i>Mascotas <span class="icon-chevron-right"></span></a>
					<ul class="dropdown-menu pull-left">
						<li><a href="<?php echo $this->Html->url(array('controller' => 'Mascotas','action' => 'index'));?>" class="glyphicons calendar"><i></i>Listado de Mascotas</a></li>
						<li><a href="#myModal" data-toggle="modal" class="glyphicons credit_card" onclick="$('#imgcargando').toggle();$('#mimodal').toggle();$('#mimodal').load('<?php echo $this->Html->url(array('controller' => 'Mascotas','action' => 'ajaxmascota'));?>',function(){$('#imgcargando').toggle(100);$('#mimodal').toggle();});"><i></i>Nueva Mascota</a></li>
					</ul>
				</li>
                <li class="dropdown dd-1">
					<a href="" data-toggle="dropdown" class="glyphicons notes"><i></i>Servicios <span class="icon-chevron-right"></span></a>
					<ul class="dropdown-menu pull-left">
						<li><a href="<?php echo $this->Html->url(array('controller' => 'Denunciaservicio','action' => 'index'));?>" class="glyphicons calendar"><i></i>Denuncias de Servicio</a></li>
                        <li><a href="<?php echo $this->Html->url(array('controller' => 'Denunciaservicio','action' => 'registrarmonta'));?>" class="glyphicons calendar"><i></i>Nueva Monta</a></li>
                        <li><a href="<?php echo $this->Html->url(array('controller' => 'Denunciaservicio','action' => 'insertarservicio'));?>" class="glyphicons calendar"><i></i>Nuevo Servicio</a></li>
					</ul>
				</li>
                <li class="dropdown dd-1">
					<a href="" data-toggle="dropdown" class="glyphicons notes"><i></i>Cuentas <span class="icon-chevron-right"></span></a>
					<ul class="dropdown-menu pull-left">
						
                        <li><a href="<?php echo $this->Html->url(array('controller' => 'Cuentas','action' => 'index'));?>" class="glyphicons calendar"><i></i>Listado de Pagos</a></li>
						<li><a href="#myModal" data-toggle="modal" class="glyphicons credit_card" onclick="$('#imgcargando').toggle();$('#mimodal').toggle();$('#mimodal').load('<?php echo $this->Html->url(array('controller' => 'Cuentas','action' => 'ajaxpago'));?>',function(){$('#imgcargando').toggle(100);$('#mimodal').toggle();});"><i></i>Nuevo pago</a></li>
                                                <li><a href="#myModal" data-toggle="modal" class="glyphicons credit_card" onclick="$('#imgcargando').toggle();$('#mimodal').toggle();$('#mimodal').load('<?php echo $this->Html->url(array('controller' => 'Cuentas','action' => 'ajaxpagos'));?>',function(){$('#imgcargando').toggle(100);$('#mimodal').toggle();});"><i></i>Genera Pagos</a></li>
					</ul>
				</li>
                <li class="dropdown dd-1">
					<a href="" data-toggle="dropdown" class="glyphicons notes"><i></i>Propietarios <span class="icon-chevron-right"></span></a>
					<ul class="dropdown-menu pull-left">
						<li><a href="<?php echo $this->Html->url(array('controller' => 'Propietarios','action' => 'index'));?>" class="glyphicons calendar"><i></i>Listado de Propietarios</a></li>
						<li><a href="#myModal" data-toggle="modal" class="glyphicons credit_card" onclick="$('#imgcargando').toggle();$('#mimodal').toggle();$('#mimodal').load('<?php echo $this->Html->url(array('controller' => 'Propietarios','action' => 'propietario'));?>',function(){$('#imgcargando').toggle(100);$('#mimodal').toggle();});"><i></i>Nuevo Propietario</a></li>
                        <li><a href="<?php echo $this->Html->url(array('controller' => 'Criaderos','action' => 'index'));?>" class="glyphicons calendar"><i></i>Listado de Criaderos</a></li>
						<li><a href="#myModal" data-toggle="modal" class="glyphicons credit_card" onclick="$('#imgcargando').toggle();$('#mimodal').toggle();$('#mimodal').load('<?php echo $this->Html->url(array('controller' => 'Criaderos','action' => 'criadero'));?>',function(){$('#imgcargando').toggle(100);$('#mimodal').toggle();});"><i></i>Nuevo Criadero</a></li>
					</ul>
				</li>
                
				<li class="dropdown dd-1">
                                    <a href="<?php echo $this->Html->url(array('controller' => 'Reportes','action' => 'index'));?>"  class="glyphicons notes"><i></i>Reportes</a>
					
				</li>
			</ul>	
			</div>
			<!-- // Scrollable Menu wrapper with Maximum Height END -->