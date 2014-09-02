

<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
    <h3>Inscripcion</h3>
  </div>
  
  <div class="modal-body">
    <div class="row-fluid">
    <div class="span12">
        <div class="widget widget-heading-simple widget-body-gray" data-toggle="collapse-widget">
            <div class="widget-body">
                <?php if(!empty($mensajeb)):?>
                <h4 style="color:#093"><?php echo $mensajeb?></h4>
                <?php endif;?>
                <?php if(!empty($mensajem)):?>
                <h4 style="color:#F00"><?php echo $mensajem?></h4>
                <?php endif;?>
            </div>
        </div>
    </div>
    </div>
  </div>