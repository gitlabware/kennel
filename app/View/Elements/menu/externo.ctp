<script src="<?php echo $this->webroot;?>js/jquery-1.10.1.min.js"></script>
<!-- Menu Toggle Button -->
			
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
                                    <a href="<?php echo $this->Html->url(array('controller' => 'Users','action' => 'login'));?>" class="glyphicons logout lock"><span class="hidden-tablet hidden-phone hidden-desktop-1">INGRESAR</span><i></i></a>
					
                                </li>
				<!-- // Profile / Logout menu END -->
				
			</ul>
			<!-- // Top Menu Right END -->
						<div class="clearfix"></div>