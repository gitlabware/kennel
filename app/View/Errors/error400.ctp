<?php
/**
 *
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.View.Errors
 * @since         CakePHP(tm) v 0.10.0.1076
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */
?>
<?php $this->layout = 'errores';?>
<h1 class="padding-none"><?php echo $name; ?> <span><?php echo __d('cake', 'Error'); ?>: </span></h1>
<hr class="separator" />
		<!-- Row -->
		<div class="row-fluid">
		
			<!-- Column -->
			<div class="span6">
				<div class="center">
					<p>
                                            <?php printf(
                                                    __d('cake', 'The requested address %s was not found on this server.'),
                                                    "<strong>'{$url}'</strong>"
                                            ); ?>
                                    </p>
				</div>
			</div>
			<!-- // Column END -->
			
			<!-- Column -->
			<div class="span6">
				<div class="center">
					<p>Es esto un error grave? <a href="faq.html?lang=en&amp;layout_type=fluid&amp;menu_position=menu-left&amp;style=style-flat&amp;sidebar-sticky=false&amp;top_style=full&amp;sidebar_style=full"></a></p>
					<div class="row-fluid">
						<div class="span12">
                                                    <a href="<?php echo $this->Html->url($this->request->referer());?>" class="btn btn-icon-stacked btn-block btn-success glyphicons user_add"><i></i><span>Volver atras</span><span class="strong">Pagina de Inicio del administrador</span></a>
						</div>
						
					</div>
				</div>
			</div>
			<!-- // Column END -->
			
		</div>

<?php
if (Configure::read('debug') > 0):
	echo $this->element('exception_stack_trace');
endif;
?>
