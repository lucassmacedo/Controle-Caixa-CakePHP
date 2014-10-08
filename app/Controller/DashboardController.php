<?php
App::uses('AppController', 'Controller');

class DashboardController extends AppController
{
    public $uses = array('User','Service','Movement');
    
    public function admin_home()  {
     	$this->titleForLayout = "Livro Caixa - " . $this->currentUser['name'];

     	$movements = $this->Service->find('list');
     	
		$this->set(compact('movements'));
    }
}
