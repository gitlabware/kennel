<?php 
if(!empty($nuevo) || !empty($nuevamascota)):
?>
<script src="<?php echo $this->webroot;?>js/jquery-1.10.1.min.js"></script>
<script language="javascript" type="text/javascript">  

$(document).ready(function(){
    //alert('eynar');
	//create a new WebSocket object.
	var wsUri = "ws://<?php echo gethostname();?>:9001/nkennel/app/Controller/server.php"; 	
	websocket = new WebSocket(wsUri); 
	
	websocket.onopen = function(ev) { // connection is open 
		//alert('Conectado!!!');
        var msg = {
		message: 'nuevo',
		name: '',
		color : ''
		};
		//convert and send data to server
		websocket.send(JSON.stringify(msg));
	}
	
	websocket.onerror	= function(ev){}; 
	websocket.onclose 	= function(ev){}; 
});
</script>
<?php endif;?>
<div class="innerLR">
    <div class="widget widget-heading-simple widget-body-white">
        <div class="widget-body">
            <div class="row-fluid">
            <div class="span12">
            <div class="span8">
            <h3><span class="btn btn-block btn-inverse btn-icon glyphicons user" onclick="location.href ='<?php echo $this->Html->url(array('action' => 'propietario'))?>';"><i></i>Propietario: <?php echo $usuario['User']['nombre']?></span></h3>
            </div>
            <div class="span4">
            <?php echo $this->Html->link('Cerrar Cuenta',array('action' => 'cerrar'),array('class' => 'btn btn-block btn-inverse'));?>
            </div>
            </div>
            </div>
            <div class="row-fluid">
            <div class="span12">
            <div class="span6">
            <?php echo $this->Html->link('Registrar Mascota',array('action' => 'mascota'),array('class' => 'btn btn-block btn-success'));?>
            </div>
            <div class="span6">
            <?php echo $this->Html->link('Pagos',array('action' => 'pagos'),array('class' => 'btn btn-block btn-primary'));?>
            </div>
            </div>
            </div>
            <table class="table table-bordered table-white">
                <thead>
                <tr>
                    <th>Nro KCB</th>
                    <th>Ejemplar</th>
                    <th>Nro tatoo</th>
                    <th>Acciones</th>
                </tr>
                </thead>
                <tbody>
                        <?php foreach($mascotas as $m):?>
                        <?php $color = '';?>
                        <?php if($m['Mascota']['estado'] == 1):?>
                        
                        <?php $color = '#B8FF9D';?>
                        <?php endif;?>
                        <tr style="background: <?php echo $color?>;">
                            <td><?php echo $m['Mascota']['kcb']?></td>
                            <td id="fila<?php echo $m['Mascota']['id']?>">
                            <div id="cfila<?php echo $m['Mascota']['id']?>">
                            <?php echo $m['Mascota']['nombre_completo']; ?>
                            </div>
                             </td>
                            <td><?php echo $m['Mascota']['num_tatuaje']?></td>
                            
                            <td>
                            <?php if($m['Mascota']['estado'] == 0):?>
                            <?php echo $this->Html->link('Editar',array('action' => 'mascota',$m['Mascota']['id']),array('class' => 'label label-info'));?>
                            <?php echo $this->Html->link('Pago',array('action' => 'pago',$m['Mascota']['id']),array('class' => 'label label-info','title' => 'Registrar pago'));?>
                            <?php endif;?>
                            <?php //echo $this->Html->link('Generaciones',array('action' => 'generaciones',$m['Mascota']['id']),array('class' => 'label label-warning'));?>
                             <?php //echo $this->Html->link('Eliminar',array('action' => 'elimina',$m['Mascota']['id']),array('escape' => false,'confirm' => 'Si tiene registros con esta mascota podria causar errores!!! Esta seguro de eliminar','class' => 'label label-important'));?>
                            </td>
                        </tr>
                        
                        <?php endforeach;?>
                </tbody> 
            </table>
        </div>
    </div>
</div>