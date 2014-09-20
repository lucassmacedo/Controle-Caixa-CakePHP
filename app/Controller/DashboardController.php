<?php
App::uses('AppController', 'Controller');

class DashboardController extends AppController
{
    public $uses = array('User');
    
    public function admin_home()  {
    	$this->titleForLayout = "Livro Caixa - " . $this->currentUser['name'];
    	($this->User->find('all'));

        
    }
}
