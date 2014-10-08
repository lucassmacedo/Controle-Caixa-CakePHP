<div class="modal fade" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
			    <div class="modal-dialog">
			        <div class="modal-content">
			            <div class="modal-header">
			                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
			                <h4 class="modal-title" id="myModalLabel">Adicionar Movimento</h4>
			            </div>
			          
			            
			                <?php

			             echo $this->Form->create('Movement',array(
			             	'url'=>array('controller'=> 'movements', 'action'=>'admin_add'),
			             	'data-target'=>'#service-add'));
			             echo '<div class="modal-body">';
			             echo '<div class="mod"></div>';

						 echo $this->Form->hidden('id');

						 echo '<div class="row">';
						 echo '<div class="col-lg-12">';
						echo $this->Form->input('service_id', array(
										'empty'=> 'Selecione',
						                'label' => 'Serviço',
						                'div'=> 'col-lg-6',
						                'type' => 'select',
						                'class'=> 'form-control form-group col-lg-4',
						                'options' => $movements,
						 ));

					
						 echo $this->Form->input('type', array(
						                'label' => 'Tipo',
						                'type' => 'radio',
						                'div'=> 'radio-inline',
						                'options' => Movement::getTypes(),
						 ));
						

						 					echo "</div>";

						 echo '<div class="col-lg-12">';
						 echo $this->Form->input('date', array(
						 	'div'=> 'col-lg-4',
						                'label' => 'Data',
						                'class' => 'form-control',
						                'data-mask-data'=>''
						 ));
						 
						 echo $this->Form->input('description', array(
						 	'div'=> 'col-lg-8',
						                'label' => 'Descrição',
						                'class' => 'form-control',
						 ));

			 			echo $this->Form->input('value', array(
						 	'div'=> 'col-lg-3',
						 	'type'=> 'text',
						                'label' => 'Valor R$',
						                'class' => 'form-control',

						 ));
					echo "</div>";

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

