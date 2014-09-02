<?php echo $this->Form->create('Usuario',array('id' => 'ajaxform'));?>
<?php echo $this->Form->text('Sucursale.nombre',array('required' => false));?>
<?php echo $this->Form->text('Sucursale.direccion',array());?>
<?php echo $this->Form->submit('enviar');?>

<script>
  $("#ajaxform").submit(function(e)
{
    var postData = $(this).serializeArray();
    var formURL = $(this).attr("action");
    $.ajax(
    {
        url : formURL,
        type: "POST",
        data : postData,
        /*beforeSend:function (XMLHttpRequest) {
            alert("antes de enviar");
        },
        complete:function (XMLHttpRequest, textStatus) {
            alert('despues de enviar');
        },*/
        success:function(data, textStatus, jqXHR) 
        {
            //data: return data from server
            $("#parte").html(data);
        },
        error: function(jqXHR, textStatus, errorThrown) 
        {
            //if fails   
            alert("error");
        }
    });
    e.preventDefault(); //STOP default action
    //e.unbind(); //unbind. to stop multiple form submit.
});
</script>
<?php echo $this->Form->end();?>
<div id="parte">
    
</div>
