<h3>Generaciones de <b><?php echo $padre[0]['Mascota']['nombre_completo'].' --- kcb('.$padre[0]['Mascota']['kcb'].')';?></b></h3>
<?php //echo $this->Javascript->link('jquery-1.4.2.min');?>
<?php //echo $this->Javascript->link('jquery-ui-1.8.4.custom.min');?>
<?php //echo $this->Javascript->link('jquery.autocomplete.min');?>
<div class="innerLR">

	<!-- Widget -->
	<div class="widget widget-heading-simple widget-body-gray">
		<div class="widget-body">
        <?php echo $this->Form->create('Mascota', array('url' => '/Mascotas/generaciones')); ?>
        <div class="row-fluid">
        <div class="span12">
        <table class="table table-bordered table-white">
                <thead>
                <tr>
                <th class="span4">Padres</th>
                <th class="span4">Abuelos</th>
                <th class="span4">Tercera Generacion</th>
                <th class="span4">Cuarta Generacion</th>
                </tr>
                </thead>
                <tbody>
                  <tr>
                    <td rowspan="8" ><b style="color: red;">1</b>
                    <?php if(!empty($padre[1])):echo $padre[1]['Mascota']['nombre_completo'];?>
                    <a href="#myModal" data-toggle="modal" class="label label-warning" onclick="$('#imgcargando').toggle();$('#mimodal').toggle();$('#mimodal').load('<?php echo $this->Html->url(array('controller' => 'Mascotas','action' => 'ajaxpadre',$padre[0]['Mascota']['id'],$padre[1]['Mascota']['id']));?>',function(){$('#imgcargando').toggle(100);$('#mimodal').toggle();});">Padres</a>
                    <?php endif;?>
                    </td>
                    <td rowspan="4"><b style="color: red;">3</b> <?php if(!empty($padre[3])):echo $padre[3]['Mascota']['nombre_completo'];?><a href="#myModal" data-toggle="modal" class="label label-warning" onclick="$('#imgcargando').toggle();$('#mimodal').toggle();$('#mimodal').load('<?php echo $this->Html->url(array('controller' => 'Mascotas','action' => 'ajaxpadre',$padre[0]['Mascota']['id'],$padre[3]['Mascota']['id']));?>',function(){$('#imgcargando').toggle(100);$('#mimodal').toggle();});">Padres</a><?php endif;?></td>
                    <td rowspan="2"><b style="color: red;">7</b><?php if(!empty($padre[7])):echo $padre[7]['Mascota']['nombre_completo'];?><a href="#myModal" data-toggle="modal" class="label label-warning" onclick="$('#imgcargando').toggle();$('#mimodal').toggle();$('#mimodal').load('<?php echo $this->Html->url(array('controller' => 'Mascotas','action' => 'ajaxpadre',$padre[0]['Mascota']['id'],$padre[7]['Mascota']['id']));?>',function(){$('#imgcargando').toggle(100);$('#mimodal').toggle();});">Padres</a><?php endif;?></td>
                    <td><b style="color: red;">15</b><?php if(!empty($padre[15])):echo $padre[15]['Mascota']['nombre_completo'];?><a href="#myModal" data-toggle="modal" class="label label-warning" onclick="$('#imgcargando').toggle();$('#mimodal').toggle();$('#mimodal').load('<?php echo $this->Html->url(array('controller' => 'Mascotas','action' => 'ajaxpadre',$padre[0]['Mascota']['id'],$padre[15]['Mascota']['id']));?>',function(){$('#imgcargando').toggle(100);$('#mimodal').toggle();});">Padres</a><?php endif;?></td>
                  </tr>
                  <tr>
                    <td><b style="color: red;">16</b> <?php if(!empty($padre[16])):echo $padre[16]['Mascota']['nombre_completo'];?><a href="#myModal" data-toggle="modal" class="label label-warning" onclick="$('#imgcargando').toggle();$('#mimodal').toggle();$('#mimodal').load('<?php echo $this->Html->url(array('controller' => 'Mascotas','action' => 'ajaxpadre',$padre[0]['Mascota']['id'],$padre[16]['Mascota']['id']));?>',function(){$('#imgcargando').toggle(100);$('#mimodal').toggle();});">Padres</a><?php endif;?></td>
                  </tr>
                  <tr>
                    <td rowspan="2"><b style="color: red;">8</b> <?php if(!empty($padre[8])):echo $padre[8]['Mascota']['nombre_completo'];?><a href="#myModal" data-toggle="modal" class="label label-warning" onclick="$('#imgcargando').toggle();$('#mimodal').toggle();$('#mimodal').load('<?php echo $this->Html->url(array('controller' => 'Mascotas','action' => 'ajaxpadre',$padre[0]['Mascota']['id'],$padre[8]['Mascota']['id']));?>',function(){$('#imgcargando').toggle(100);$('#mimodal').toggle();});">Padres</a><?php endif;?></td>
                    <td><b style="color: red;">17</b><?php if(!empty($padre[17])):echo $padre[17]['Mascota']['nombre_completo'];?><a href="#myModal" data-toggle="modal" class="label label-warning" onclick="$('#imgcargando').toggle();$('#mimodal').toggle();$('#mimodal').load('<?php echo $this->Html->url(array('controller' => 'Mascotas','action' => 'ajaxpadre',$padre[0]['Mascota']['id'],$padre[17]['Mascota']['id']));?>',function(){$('#imgcargando').toggle(100);$('#mimodal').toggle();});">Padres</a><?php endif;?></td>
                  </tr>
                  <tr>
                    <td><b style="color: red;">18</b> <?php if(!empty($padre[18])):echo $padre[18]['Mascota']['nombre_completo'];?><a href="#myModal" data-toggle="modal" class="label label-warning" onclick="$('#imgcargando').toggle();$('#mimodal').toggle();$('#mimodal').load('<?php echo $this->Html->url(array('controller' => 'Mascotas','action' => 'ajaxpadre',$padre[0]['Mascota']['id'],$padre[18]['Mascota']['id']));?>',function(){$('#imgcargando').toggle(100);$('#mimodal').toggle();});">Padres</a><?php endif;?></td>
                  </tr>
                  <tr>
                    <td rowspan="4"><b style="color: red;">4</b> <?php if(!empty($padre[4])):echo $padre[4]['Mascota']['nombre_completo'];?><a href="#myModal" data-toggle="modal" class="label label-warning" onclick="$('#imgcargando').toggle();$('#mimodal').toggle();$('#mimodal').load('<?php echo $this->Html->url(array('controller' => 'Mascotas','action' => 'ajaxpadre',$padre[0]['Mascota']['id'],$padre[4]['Mascota']['id']));?>',function(){$('#imgcargando').toggle(100);$('#mimodal').toggle();});">Padres</a><?php endif;?></td>
                    <td rowspan="2"><b style="color: red;">9</b><?php if(!empty($padre[9])):echo $padre[9]['Mascota']['nombre_completo'];?><a href="#myModal" data-toggle="modal" class="label label-warning" onclick="$('#imgcargando').toggle();$('#mimodal').toggle();$('#mimodal').load('<?php echo $this->Html->url(array('controller' => 'Mascotas','action' => 'ajaxpadre',$padre[0]['Mascota']['id'],$padre[9]['Mascota']['id']));?>',function(){$('#imgcargando').toggle(100);$('#mimodal').toggle();});">Padres</a><?php endif;?></td>
                    <td><b style="color: red;">19</b><?php if(!empty($padre[19])):echo $padre[19]['Mascota']['nombre_completo'];?><a href="#myModal" data-toggle="modal" class="label label-warning" onclick="$('#imgcargando').toggle();$('#mimodal').toggle();$('#mimodal').load('<?php echo $this->Html->url(array('controller' => 'Mascotas','action' => 'ajaxpadre',$padre[0]['Mascota']['id'],$padre[19]['Mascota']['id']));?>',function(){$('#imgcargando').toggle(100);$('#mimodal').toggle();});">Padres</a><?php endif;?></td>
                  </tr>
                  <tr>
                    <td><b style="color: red;">20</b><?php if(!empty($padre[20])):echo $padre[20]['Mascota']['nombre_completo'];?><a href="#myModal" data-toggle="modal" class="label label-warning" onclick="$('#imgcargando').toggle();$('#mimodal').toggle();$('#mimodal').load('<?php echo $this->Html->url(array('controller' => 'Mascotas','action' => 'ajaxpadre',$padre[0]['Mascota']['id'],$padre[20]['Mascota']['id']));?>',function(){$('#imgcargando').toggle(100);$('#mimodal').toggle();});">Padres</a><?php endif;?></td>
                  </tr>
                  <tr>
                    <td rowspan="2"><b style="color: red;">10</b> <?php if(!empty($padre[10])):echo $padre[10]['Mascota']['nombre_completo'];?><a href="#myModal" data-toggle="modal" class="label label-warning" onclick="$('#imgcargando').toggle();$('#mimodal').toggle();$('#mimodal').load('<?php echo $this->Html->url(array('controller' => 'Mascotas','action' => 'ajaxpadre',$padre[0]['Mascota']['id'],$padre[10]['Mascota']['id']));?>',function(){$('#imgcargando').toggle(100);$('#mimodal').toggle();});">Padres</a><?php endif;?></td>
                    <td><b style="color: red;">21</b> <?php if(!empty($padre[21])):echo $padre[21]['Mascota']['nombre_completo'];?><a href="#myModal" data-toggle="modal" class="label label-warning" onclick="$('#imgcargando').toggle();$('#mimodal').toggle();$('#mimodal').load('<?php echo $this->Html->url(array('controller' => 'Mascotas','action' => 'ajaxpadre',$padre[0]['Mascota']['id'],$padre[21]['Mascota']['id']));?>',function(){$('#imgcargando').toggle(100);$('#mimodal').toggle();});">Padres</a><?php endif;?></td>
                  </tr>
                  <tr>
                    <td><b style="color: red;">22</b><?php if(!empty($padre[22])):echo $padre[22]['Mascota']['nombre_completo'];?><a href="#myModal" data-toggle="modal" class="label label-warning" onclick="$('#imgcargando').toggle();$('#mimodal').toggle();$('#mimodal').load('<?php echo $this->Html->url(array('controller' => 'Mascotas','action' => 'ajaxpadre',$padre[0]['Mascota']['id'],$padre[22]['Mascota']['id']));?>',function(){$('#imgcargando').toggle(100);$('#mimodal').toggle();});">Padres</a><?php endif;?></td>
                  </tr>
                  <tr>
                    <td rowspan="8"><b style="color: red;">2</b><?php if(!empty($padre[2])):echo $padre[2]['Mascota']['nombre_completo'];?><a href="#myModal" data-toggle="modal" class="label label-warning" onclick="$('#imgcargando').toggle();$('#mimodal').toggle();$('#mimodal').load('<?php echo $this->Html->url(array('controller' => 'Mascotas','action' => 'ajaxpadre',$padre[0]['Mascota']['id'],$padre[2]['Mascota']['id']));?>',function(){$('#imgcargando').toggle(100);$('#mimodal').toggle();});">Padres</a><?php endif;?></td>
                    <td rowspan="4"><b style="color: red;">5</b><?php if(!empty($padre[5])):echo $padre[5]['Mascota']['nombre_completo'];?><a href="#myModal" data-toggle="modal" class="label label-warning" onclick="$('#imgcargando').toggle();$('#mimodal').toggle();$('#mimodal').load('<?php echo $this->Html->url(array('controller' => 'Mascotas','action' => 'ajaxpadre',$padre[0]['Mascota']['id'],$padre[5]['Mascota']['id']));?>',function(){$('#imgcargando').toggle(100);$('#mimodal').toggle();});">Padres</a><?php endif;?></td>
                    <td rowspan="2"><b style="color: red;">11</b><?php if(!empty($padre[11])):echo $padre[11]['Mascota']['nombre_completo'];?><a href="#myModal" data-toggle="modal" class="label label-warning" onclick="$('#imgcargando').toggle();$('#mimodal').toggle();$('#mimodal').load('<?php echo $this->Html->url(array('controller' => 'Mascotas','action' => 'ajaxpadre',$padre[0]['Mascota']['id'],$padre[11]['Mascota']['id']));?>',function(){$('#imgcargando').toggle(100);$('#mimodal').toggle();});">Padres</a><?php endif;?></td>
                    <td><b style="color: red;">23</b><?php if(!empty($padre[23])):echo $padre[23]['Mascota']['nombre_completo'];?><a href="#myModal" data-toggle="modal" class="label label-warning" onclick="$('#imgcargando').toggle();$('#mimodal').toggle();$('#mimodal').load('<?php echo $this->Html->url(array('controller' => 'Mascotas','action' => 'ajaxpadre',$padre[0]['Mascota']['id'],$padre[23]['Mascota']['id']));?>',function(){$('#imgcargando').toggle(100);$('#mimodal').toggle();});">Padres</a><?php endif;?></td>
                  </tr>
                  <tr>
                    <td><b style="color: red;">24</b><?php if(!empty($padre[24])):echo $padre[24]['Mascota']['nombre_completo'];?><a href="#myModal" data-toggle="modal" class="label label-warning" onclick="$('#imgcargando').toggle();$('#mimodal').toggle();$('#mimodal').load('<?php echo $this->Html->url(array('controller' => 'Mascotas','action' => 'ajaxpadre',$padre[0]['Mascota']['id'],$padre[24]['Mascota']['id']));?>',function(){$('#imgcargando').toggle(100);$('#mimodal').toggle();});">Padres</a><?php endif;?></td>
                  </tr>
                  <tr>
                    <td rowspan="2"><b style="color: red;">12</b><?php if(!empty($padre[12])):echo $padre[12]['Mascota']['nombre_completo'];?><a href="#myModal" data-toggle="modal" class="label label-warning" onclick="$('#imgcargando').toggle();$('#mimodal').toggle();$('#mimodal').load('<?php echo $this->Html->url(array('controller' => 'Mascotas','action' => 'ajaxpadre',$padre[0]['Mascota']['id'],$padre[12]['Mascota']['id']));?>',function(){$('#imgcargando').toggle(100);$('#mimodal').toggle();});">Padres</a><?php endif;?></td>
                    <td><b style="color: red;">25</b> <?php if(!empty($padre[25])):echo $padre[25]['Mascota']['nombre_completo'];?><a href="#myModal" data-toggle="modal" class="label label-warning" onclick="$('#imgcargando').toggle();$('#mimodal').toggle();$('#mimodal').load('<?php echo $this->Html->url(array('controller' => 'Mascotas','action' => 'ajaxpadre',$padre[0]['Mascota']['id'],$padre[25]['Mascota']['id']));?>',function(){$('#imgcargando').toggle(100);$('#mimodal').toggle();});">Padres</a><?php endif;?></td>
                  </tr>
                  <tr>
                    <td><b style="color: red;">26</b> <?php if(!empty($padre[26])):echo $padre[26]['Mascota']['nombre_completo'];?><a href="#myModal" data-toggle="modal" class="label label-warning" onclick="$('#imgcargando').toggle();$('#mimodal').toggle();$('#mimodal').load('<?php echo $this->Html->url(array('controller' => 'Mascotas','action' => 'ajaxpadre',$padre[0]['Mascota']['id'],$padre[26]['Mascota']['id']));?>',function(){$('#imgcargando').toggle(100);$('#mimodal').toggle();});">Padres</a><?php endif;?></td>
                  </tr>
                  <tr>
                    <td rowspan="4"><b style="color: red;">6</b><?php if(!empty($padre[6])):echo $padre[6]['Mascota']['nombre_completo'];?><a href="#myModal" data-toggle="modal" class="label label-warning" onclick="$('#imgcargando').toggle();$('#mimodal').toggle();$('#mimodal').load('<?php echo $this->Html->url(array('controller' => 'Mascotas','action' => 'ajaxpadre',$padre[0]['Mascota']['id'],$padre[6]['Mascota']['id']));?>',function(){$('#imgcargando').toggle(100);$('#mimodal').toggle();});">Padres</a><?php endif;?></td>
                    <td rowspan="2"><b style="color: red;">13</b><?php if(!empty($padre[13])):echo $padre[13]['Mascota']['nombre_completo'];?><a href="#myModal" data-toggle="modal" class="label label-warning" onclick="$('#imgcargando').toggle();$('#mimodal').toggle();$('#mimodal').load('<?php echo $this->Html->url(array('controller' => 'Mascotas','action' => 'ajaxpadre',$padre[0]['Mascota']['id'],$padre[13]['Mascota']['id']));?>',function(){$('#imgcargando').toggle(100);$('#mimodal').toggle();});">Padres</a><?php endif;?></td>
                    <td><b style="color: red;">27</b><?php if(!empty($padre[27])):echo $padre[27]['Mascota']['nombre_completo'];?><a href="#myModal" data-toggle="modal" class="label label-warning" onclick="$('#imgcargando').toggle();$('#mimodal').toggle();$('#mimodal').load('<?php echo $this->Html->url(array('controller' => 'Mascotas','action' => 'ajaxpadre',$padre[0]['Mascota']['id'],$padre[27]['Mascota']['id']));?>',function(){$('#imgcargando').toggle(100);$('#mimodal').toggle();});">Padres</a><?php endif;?></td>
                  </tr>
                  <tr>
                    <td><b style="color: red;">28</b><?php if(!empty($padre[28])):echo $padre[28]['Mascota']['nombre_completo'];?><a href="#myModal" data-toggle="modal" class="label label-warning" onclick="$('#imgcargando').toggle();$('#mimodal').toggle();$('#mimodal').load('<?php echo $this->Html->url(array('controller' => 'Mascotas','action' => 'ajaxpadre',$padre[0]['Mascota']['id'],$padre[28]['Mascota']['id']));?>',function(){$('#imgcargando').toggle(100);$('#mimodal').toggle();});">Padres</a><?php endif;?></td>
                  </tr>
                  <tr>
                    <td rowspan="2"><b style="color: red;">14</b><?php if(!empty($padre[14])):echo $padre[14]['Mascota']['nombre_completo'];?><a href="#myModal" data-toggle="modal" class="label label-warning" onclick="$('#imgcargando').toggle();$('#mimodal').toggle();$('#mimodal').load('<?php echo $this->Html->url(array('controller' => 'Mascotas','action' => 'ajaxpadre',$padre[0]['Mascota']['id'],$padre[14]['Mascota']['id']));?>',function(){$('#imgcargando').toggle(100);$('#mimodal').toggle();});">Padres</a><?php endif;?></td>
                    <td> <b style="color: red;">29</b><?php if(!empty($padre[29])):echo $padre[29]['Mascota']['nombre_completo'];?><a href="#myModal" data-toggle="modal" class="label label-warning" onclick="$('#imgcargando').toggle();$('#mimodal').toggle();$('#mimodal').load('<?php echo $this->Html->url(array('controller' => 'Mascotas','action' => 'ajaxpadre',$padre[0]['Mascota']['id'],$padre[29]['Mascota']['id']));?>',function(){$('#imgcargando').toggle(100);$('#mimodal').toggle();});">Padres</a><?php endif;?></td>
                  </tr>
                  <tr>
                    <td><b style="color: red;">30</b> <?php if(!empty($padre[30])):echo $padre[30]['Mascota']['nombre_completo'];?><a href="#myModal" data-toggle="modal" class="label label-warning" onclick="$('#imgcargando').toggle();$('#mimodal').toggle();$('#mimodal').load('<?php echo $this->Html->url(array('controller' => 'Mascotas','action' => 'ajaxpadre',$padre[0]['Mascota']['id'],$padre[30]['Mascota']['id']));?>',function(){$('#imgcargando').toggle(100);$('#mimodal').toggle();});">Padres</a><?php endif;?></td>
                  </tr>
                </tbody>
            </table>
        </div>
        </div>
        
            


	<?php //echo $this->Ajax->autoComplete('Generacione.padre13343', '/Mascotas/autoComplete')?>
<?php echo $this->Form->end()?>
            
        </div>
    </div>
</div>