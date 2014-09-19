<?php
App::uses('AppController', 'Controller');

class DashboardController extends AppController
{
    public $uses = array('Customer','CustomersConsultation','CustomersSchedule','User');
    
    public function admin_home()  {
        
    }
}
