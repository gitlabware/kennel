
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
                <li class="dropdown dd-1">
					<a href="" data-toggle="dropdown" class="glyphicons notes"><i></i>Ejemplares <span class="icon-chevron-right"></span></a>
					<ul class="dropdown-menu pull-left">
                        <li><a href="<?php echo $this->Html->url(array('controller' => 'Usuarios','action' => 'listadomascotas'));?>" class="glyphicons calendar"><i></i>Lista de Ejemplares</a></li>
						<li><a href="<?php echo $this->Html->url(array('controller' => 'Usuarios','action' => 'mascotas'));?>" class="glyphicons calendar"><i></i>Mis Ejemplares</a></li>
						<!--<li><a href="#myModal" data-toggle="modal" class="glyphicons credit_card" onclick="$('#imgcargando').toggle();$('#mimodal').toggle();$('#mimodal').load('<?php //echo $this->Html->url(array('controller' => 'Usuarios','action' => 'ajaxmascota'));?>',function(){$('#imgcargando').toggle(100);$('#mimodal').toggle();});"><i></i>Nuevo Ejemplar</a></li>-->
                                               <li><a href="<?php echo $this->Html->url(array('controller' => 'Usuarios','action' => 'ejemplar'));?>" class="glyphicons calendar"><i></i>Nuevo Ejemplar</a></li> 
					</ul>
				</li>
                <li class="dropdown dd-1">
					<a href="<?php echo $this->Html->url(array('controller' => 'Usuarios','action' => 'pagos'));?>" class="glyphicons notes"><i></i>Pagos</a>
					
				</li>
                <li class="dropdown dd-1">
					<a href="" data-toggle="dropdown" class="glyphicons notes"><i></i>Servicios <span class="icon-chevron-right"></span></a>
					<ul class="dropdown-menu pull-left">
						<li><a href="<?php echo $this->Html->url(array('controller' => 'Usuarios','action' => 'listadenuncias'));?>" class="glyphicons calendar"><i></i>Denuncias de Servicio</a></li>
                        <li><a href="<?php echo $this->Html->url(array('controller' => 'Usuarios','action' => 'registrarmonta'));?>" class="glyphicons calendar"><i></i>Nueva Monta</a></li>
                        <li><a href="<?php echo $this->Html->url(array('controller' => 'Usuarios','action' => 'insertarservicio'));?>" class="glyphicons calendar"><i></i>Nuevo Servicio</a></li>
					</ul>
				</li>
                        <li class="dropdown dd-1">
			<a href="<?php echo $this->Html->url(array('controller' => 'Usuarios','action' => 'listaeventos'));?>" class="glyphicons notes"><i></i>Eventos</a>
			</li>
                        <li class="dropdown dd-1">
                        <?php 
                        if($this->Session->read('Auth.User.Propietario.tipo_id') == 1)
                        {
                            $tipo = 1;
                        }
                        else{
                            $tipo = 2;
                        }
                        ?>
			<a href="<?php echo $this->Html->url(array('controller' => 'Tarifas','action' => 'tarifas',$tipo));?>" class="glyphicons notes"><i></i>Tarifarios</a>
			</li>
			</ul>	
			</div>
			<!-- // Scrollable Menu wrapper with Maximum Height END -->