<h3>Listado de Usuarios Para el sistemas</h3>
<div class="innerLR">
    <div class="widget widget-heading-simple widget-body-gray">
        <div class="widget-body">
        <table class="dynamicTable tableTools table table-striped table-bordered table-condensed table-white">
            <thead>
            <tr>
            <th>Nombre</th>
            <th>Usuario</th>
            <th>Departamento</th>
            <th>Acciones</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach($usuarios as $us):?>
            <tr>
            <td><?php echo $us['User']['nombre'];?></td>
            <td><?php echo $us['User']['username'];?></td>
            <td><?php echo $us['Sucursale']['nombre']?></td>
            <td>
            <a href="#myModal" data-toggle="modal" class="label label-info" onclick="$('#imgcargando').toggle();$('#mimodal').toggle();$('#mimodal').load('<?php echo $this->Html->url(array('controller' => 'Users','action' => 'usuario',$us['User']['id']));?>',function(){$('#imgcargando').toggle(100);$('#mimodal').toggle();});">Editar</a>
             <?php echo $this->Html->link('Eliminar',array('action' => 'elimina',$us['User']['id']),array('escape' => false,'confirm' => 'Esta seguro de eliminar','class' => 'label label-important'));?></td>
            </tr>
            <?php endforeach;?>
            </tbody>
        </table>
        <!--
        <h2>Notificacion Normal</h2>
        <button class="btn btn-success" id="show_notification">
            Notificacion Normal
        </button>
        -->
        
        </div>
    </div>
</div>
<script>
// Función que activa las notificaciones
/*
function createNotification(type) 
{
   if(type ==  '')
     type = 'normal';
                        
   if(type != 'html')
   {
    var title ="Sistema Kennel";
    var msg="Un propietario nuevo se ha registrado en el sistema!!!";
    var notification = window.Notifications.createNotification("<?php echo $this->Html->webroot('img/favicon.ico');?>", title, msg);
   }
   else
   {
     var notification = window.Notifications.createHTMLNotification('content.html');
   }
   notification.show();
}
 
// Enlazar el evento Click en los botones.
 
$(document).ready(function () 
{        
  if (window.webkitNotifications) 
  {
   window.Notifications = window.webkitNotifications;
   $('#show_notification').click(function () 
   {
     if (window.Notifications.checkPermission() == 0) 
     {
       createNotification('normal');
     } 
     else
     {
       window.Notifications.requestPermission();
     }
   });
                                
   
  }     
  else
  {
   alert('Las notificaciones en HTML5 no son soportadas por tu navegador.');
  }
});*/
</script>
<script language="javascript" type="text/javascript">  
/*
$(document).ready(function(){
    //alert('eynar');
	//create a new WebSocket object.
	var wsUri = "ws://localhost:9001/nkennel/app/Controller/server.php"; 	
	websocket = new WebSocket(wsUri); 
	
	websocket.onopen = function(ev) { // connection is open 
		alert('Conectado!!!');
	}
	
	websocket.onmessage = function(ev) {
		var msg = JSON.parse(ev.data); //PHP sends Json data
		var type = msg.type; //message type
		var umsg = msg.message; //message text
		var uname = msg.name; //user name
		var ucolor = msg.color; //color
        alert(uname+" ---- "+umsg);
	};
	
	websocket.onerror	= function(ev){alert('Error');}; 
	websocket.onclose 	= function(ev){alert('se cerro la conexion');}; 
});*/
</script>