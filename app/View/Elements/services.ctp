			<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
			    <div class="modal-dialog">
			        <div class="modal-content">
			            <div class="modal-header">
			                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
			                <h4 class="modal-title" id="myModalLabel">Dispesas</h4>
			            </div>
			          
			            
			                <?php

			             echo $this->Form->create('Service',array(
			             	'url'=>array('controller'=>'services','action'=>'admin_add'),
			             	'data-target'=>'#service-add'));
			             echo '<div class="modal-body">';
			             echo '<div class="mod"></div>';

						 echo $this->Form->hidden('id');
						 echo '<div class="row">';
						 echo $this->Form->input('type', array(
						                'label' => 'Tipo',
						                'div'=> 'col-lg-4',
						                'type' => 'select',
						                'class'=> 'form-control form-group col-lg-4',
						                'options' => Service::getTypes(),
						 ));

						 echo $this->Form->input('name', array(
						 	'div'=> 'col-lg-12',
						                'label' => 'Nome',
						                'class' => 'form-control',
						 ));
						 echo '</div>';
						 echo '</div>';
							echo '<div class="modal-footer">';
							echo '<button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>';
							echo '<button type="submit" class="btn btn-primary">Salvar</button>';
							echo '</div>';


						 echo $this->Form->end();
						    ?>

			        </div>
			        <!-- /.modal-content -->
			    </div>
			    <!-- /.modal-dialog -->
			</div>