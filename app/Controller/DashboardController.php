<?php
App::uses('AppController', 'Controller');

class DashboardController extends AppController
{
    public $uses = array('User');
    
    public function admin_home()  {
     	$this->titleForLayout = "Livro Caixa - " . $this->currentUser['name'];

     	// get actualy month and year or passed param year and month
     	$month_day = !empty($this->params->query['mes']) ? $this->params->query['mes'] : date('m');
     	$year_day = !empty($this->params->query['ano']) ? $this->params->query['ano'] : date('Y');

     	$this->set(array(
            'month_day' => $month_day,
            'year_day' => $year_day,
        ));
   
    }
}
