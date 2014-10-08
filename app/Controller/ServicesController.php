<?php
App::uses('AppController', 'Controller');

class ServicesController extends AppController {

	public function admin_add() {
	
		$dataReturn = '<div class="alert alert-error fade in">Algo deu errado! Confira todos os campos !<button type="button" class="close" data-dismiss="alert"></button></div>';
		if(!empty($this->data)){
			if($this->Service->save($this->data)){
				 $dataReturn = '<div class="alert alert-info fade in">Dispesa Adicionada com Sucesso!!<button type="button" class="close" data-dismiss="alert"></button></div>';

			}
		}

		echo json_encode($dataReturn);

		$this->layout = false;
		$this->render(false);
	}
}
