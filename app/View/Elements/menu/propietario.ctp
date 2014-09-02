<script src="<?php echo $this->webroot;?>js/jquery-1.10.1.min.js"></script>
<!-- Menu Toggle Button -->
			<button type="button" class="btn btn-navbar">
				<span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span>
			</button>
			<!-- // Menu Toggle Button END -->
			
			<!-- Not Blank page -->
						
			<!-- Full Top Style -->
						<ul class="topnav pull-left">
				
				<!--<li class="glyphs hidden-tablet hidden-phone" data-toggle="tooltip" data-title="Click para ver los Pendientes!!!" data-placement="bottom">
					<ul>
						<li class="active"><a href="<?php echo $this->Html->url(array('controller' => 'Propietarios', 'action' => 'listadopendientes'));?>" class="glyphicons heart">
                        <h4><b style="color: white;" id="contenido">a
                        <?php //echo $this->requestAction(array('controller' => 'Propietarios','action' => 'pendientes'));?>
                        </b></h4></a></li>
						<li><a class="glyphicons user"><i></i></a></li>
                        <li class="active"><a href="<?php echo $this->Html->url(array('controller' => 'Mascotas', 'action' => 'listapendientes'));?>" class="glyphicons heart">
                        <h4><b style="color: white;" id="contenidomascota">
                        <</b></h4></a></li>
						<li><a class="glyphicons dog"><i></i></a></li>
					</ul>
				</li>-->
                
                
                <li>
                <?php echo $this->Html->link('<i></i>REGRESAR',$this->request->referer(),array('class' => 'btn-icon glyphicons unshare','escape' => false));?>
                </li>
			</ul>
            
            
						<!-- // Full Top Style END -->
			
			<!-- Quick Top Style -->
						<!-- // Quick Top Style END -->
			
						<!-- // Not Blank Page END -->
			
						<!-- Top Menu Right -->
			<ul class="topnav pull-right hidden-phone hidden-tablet hidden-desktop-1">
			
				<!-- Profile / Logout menu -->
				<li class="account dropdown dd-1">
										<a data-toggle="dropdown" href="my_account_advanced.html?lang=en&amp;layout_type=fluid&amp;menu_position=menu-left&amp;style=style-flat&amp;sidebar-sticky=false&amp;top_style=full&amp;sidebar_style=full" class="glyphicons logout lock"><span class="hidden-tablet hidden-phone hidden-desktop-1"><?php echo $this->Session->read('Auth.User.nombre');?></span><i></i></a>
					<ul class="dropdown-menu pull-right">
						<li>
                        
                        <a href="#myModal" data-toggle="modal" class="glyphicons cogwheel" onclick="$('#imgcargando').toggle();$('#mimodal').toggle();$('#mimodal').load('<?php echo $this->Html->url(array('controller' => 'Usuarios','action' => 'propietario',$this->Session->read('Auth.User.id')));?>',function(){$('#imgcargando').toggle(100);$('#mimodal').toggle();});">Editar Datos<i></i></a>
                        </li>
						
						<li>
							<span>
                                <?php echo $this->Html->link('Salir',array('controller' => 'Users','action' => 'salir'),array('class' => 'btn btn-default btn-mini pull-right'));?>
								
							</span>
						</li>
					</ul>
									</li>
				<!-- // Profile / Logout menu END -->
				
			</ul>
			<!-- // Top Menu Right END -->
						<div class="clearfix"></div>