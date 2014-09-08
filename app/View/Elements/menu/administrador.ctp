                       <script src="<?php echo $this->webroot;?>js/jquery-1.10.1.min.js"></script>
                        
                        <script language="javascript" type="text/javascript">  
                        function createNotification(type) 
                        {
                           if(type ==  '')
                             type = 'normal';
                                                
                           if(type != 'html')
                           {
                            var title ="Sistema Kennel";
                            var msg="Un nuevo registro en el sistema!!!";
                            var notification = window.Notifications.createNotification("<?php echo $this->Html->webroot('img/favicon.ico');?>", title, msg);
                           }
                           else
                           {
                             var notification = window.Notifications.createHTMLNotification('content.html');
                           }
                           notification.show();
                        }
                        $(document).ready(function(){
                            //alert('eynar');
                        	//create a new WebSocket object.
                            $("#contenido").load("<?php echo $this->Html->url(array('controller' => 'Propietarios','action' => 'pendientes'));?>");
                            $("#contenidomascota").load("<?php echo $this->Html->url(array('controller' => 'Mascotas','action' => 'pendientes'));?>");
                        	var wsUri = "ws://<?php echo gethostname();?>:9001/nkennel/app/Controller/server.php"; 	
                        	websocket = new WebSocket(wsUri); 
                        	websocket.onopen = function(ev) {// connection is open 
                        		//alert('Conectado!!!');
                        	}
                        	
                        	websocket.onmessage = function(ev) {
                        		var msg = JSON.parse(ev.data); //PHP sends Json data
                        		var type = msg.type; //message type
                        		var umsg = msg.message; //message text
                        		var uname = msg.name; //user name
                        		var ucolor = msg.color; //color
                                if(umsg == 'nuevo')
                                {
                                    $("#contenido").load("<?php echo $this->Html->url(array('controller' => 'Propietarios','action' => 'pendientes'));?>");
                                    $("#contenidomascota").load("<?php echo $this->Html->url(array('controller' => 'Mascotas','action' => 'pendientes'));?>");
                                    
                                    if (window.webkitNotifications) 
                                      {
                                       window.Notifications = window.webkitNotifications;
                                       
                                         if (window.Notifications.checkPermission() == 0) 
                                         {
                                           createNotification('normal');
                                         } 
                                         else
                                         {
                                           window.Notifications.requestPermission();
                                         }
                                                                    
                                       
                                      }     
                                      else
                                      {
                                       alert('Las notificaciones en HTML5 no son soportadas por tu navegador.');
                                      }
                                }
                        	};
                        	
                        	websocket.onerror	= function(ev){}; 
                        	websocket.onclose 	= function(ev){}; 
                        });
                        </script>
			<!-- Menu Toggle Button -->
			<button type="button" class="btn btn-navbar">
				<span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span>
			</button>
			<!-- // Menu Toggle Button END -->
			
			<!-- Not Blank page -->
						
			<!-- Full Top Style -->
						<ul class="topnav pull-left">
				<li><a href="<?php echo $this->Html->url(array('controller' => 'Reportes','action' => 'panel'));?>" class="glyphicons dashboard"><i></i>Panel Kennel</a></li>
				
				<li class="glyphs hidden-tablet hidden-phone" data-toggle="tooltip" data-title="Click para ver los Pendientes!!!" data-placement="bottom">
					<ul>
						<li class="active"><a href="<?php echo $this->Html->url(array('controller' => 'Propietarios', 'action' => 'listadopendientes'));?>" class="glyphicons heart">
                        <h4><b style="color: white;" id="contenido">a
                        <?php //echo $this->requestAction(array('controller' => 'Propietarios','action' => 'pendientes'));?>
                        </b></h4></a></li>
						<li><a class="glyphicons user"><i></i></a></li>
                        <li class="active"><a href="<?php echo $this->Html->url(array('controller' => 'Mascotas', 'action' => 'listapendientes'));?>" class="glyphicons heart">
                        <h4><b style="color: white;" id="contenidomascota">
                        <?php //echo $this->requestAction(array('controller' => 'Mascotas','action' => 'pendientes'));?>
                        </b></h4></a></li>
						<li><a class="glyphicons dog"><i></i></a></li>
					</ul>
				</li>
                
                <li class="search open hidden-phone hidden-tablet">
                    
					<div class="dropdown dd-1">
						<select data-style="btn-primary" name="data[Mascota][tipomascota]" id="tipomasselect">
							<option value="nombre_completo">Nombre</option>
							<option value="kcb">KCB</option>
							<option value="num_tatuaje">Num Tatuaje</option>
                            <option value="chip">Num Chip</option>
						</select> 
					</div>
				</li>
                
				<li class="search open hidden-phone hidden-tablet">
					<form autocomplete="off" class="dropdown dd-1" id="CommentSaveForm">
                        <?php //echo $this->Form->text('campo',array('placeholder' => 'Buscador de Mascotas','id' => 'campomascotatext'));?>
                        <input name="data[Mascota][campomascota]" id="campomascotatext" placeholder="Buscador de Mascotas"/>
						<button type="button" class="glyphicons search"><i></i></button>
					</form>
				</li>
                <li>
                <?php echo $this->Html->link('<i></i>REGRESAR',$this->request->referer(),array('class' => 'btn-icon glyphicons unshare','escape' => false));?>
                
                </li>
                <li>
                <a href="javascript:" class="btn-icon glyphicons print" onclick="window.print();"><i></i></a>
                <?php //echo $this->Html->link('<i></i>',$this->request->referer(),array('class' => 'btn-icon glyphicons print','escape' => false));?>
                
                </li>
                
			</ul>
            <?php
            
            /*$data = $this->Js->get('#CommentSaveForm')->serializeForm(array('isForm' => true, 'inline' => true));
            $tipo = $this->Js->get('#tipomasselect')->serializeForm(array('isForm' => true, 'inline' => true));
            $this->Js->get('#campomascotatext')->event(
                  'keyup',
                  $this->Js->request(
                    array('controller' => 'Mascotas','action' => 'busqueda','nombre_completo'),
                    array(
                            'update' => '#cargabusqueda',
                            'before' => "$('#cargabusqueda').show();$('#normal').hide();",
                            //'complete' => '',
                            'data' => $data,
                            'async' => true,    
                            'dataExpression'=>true,
                            'method' => 'POST'
                        )
                    )
                );*/
            ?>
            <script>
            $(document).ready(function () {
                $("#campomascotatext").bind("keyup", 
                function (event) {
                    var tipo = $("#tipomasselect").val();
                    $.ajax({
                        async:true, 
                        beforeSend:function (XMLHttpRequest) {
                            $('#cargabusqueda').show();$('#normal').hide();
                            }, data:$("#CommentSaveForm").serialize(), dataType:"html", success:function (data, textStatus) {
                                $("#cargabusqueda").html(data);
                                }, type:"POST", url:"<?php echo $this->Html->url(array('controller' => 'Mascotas','action' => 'busqueda'));?>/"+tipo
                            });
            return false;});});
            </script>
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
                        
                        <a href="#myModal" data-toggle="modal" class="glyphicons cogwheel" onclick="$('#imgcargando').toggle();$('#mimodal').toggle();$('#mimodal').load('<?php echo $this->Html->url(array('controller' => 'Users','action' => 'usuario',$this->Session->read('Auth.User.id')));?>',function(){$('#imgcargando').toggle(100);$('#mimodal').toggle();});">Editar<i></i></a>
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