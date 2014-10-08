<?php
App::uses('Controller', 'Controller');

class AppController extends Controller
{
    public $components = array(
        'Session', 'RequestHandler', 'Auth', 'Email'
    );

    public $helpers = array(
        'Html' => array('className' => 'TwitterBootstrap.BootstrapHtml'),
        'Form' => array('className' => 'TwitterBootstrap.BootstrapForm'),
        'Paginator' => array('className' => 'TwitterBootstrap.BootstrapPaginator'),
        'Session',
        'Time',
        'Text',
        'Number',
        'Site',
    );

    public $titleForLayout = null;
    public $currentUser = array();

    public function beforeFilter() {

        if ($this->isPrefix('admin'))  $this->layout = 'admin';
        $this->_manageAuthConfigs();
        $this->currentUser = $this->Auth->user();
        return parent::beforeFilter();
    }


    public function beforeRender() {
        $this->_setDate();
        $this->set('bodyClass', sprintf(
            '%s %s',
            strtolower($this->name),
            strtolower($this->name) . '-' . strtolower($this->action)
        ));

        $this->set(array(
            'isAdmin' => $this->isPrefix('admin'),
            'title_for_layout' => $this->titleForLayout,
            'currentUser' => $this->currentUser,
            'estadosBrasil' => Configure::read('estadosBrasil'),
        ));

        return parent::beforeRender();
    }

    // get actualy month and year or passed param year and month
    private function _setDate(){
        $day_day =  date('d');
        $month_day = !empty($this->params->query['mes']) ? $this->params->query['mes'] : date('m');
        $year_day = !empty($this->params->query['ano']) ? $this->params->query['ano'] : date('Y');

        $this->set(array(
            'month_day' => $month_day,
            'year_day' => $year_day,
            'day_day' => $day_day,
        ));
    }


    public function isAuthorized($user) {
        return true;
    }


    protected function isPrefix($prefix) {
        $params = $this->request->params;
        return isset($params['prefix']) && $params['prefix'] === $prefix;
    }

    protected function setFlash($message, $type = 'success')  {
        $defaultMessages = array(
            'correctForm' => array('Corrija o formulário e tente novamente', 'warning'),
            'notFound' => array('Registro não encontrado', 'error'),
        );

        if (array_key_exists($message, $defaultMessages)) {
            list($message, $type) = $defaultMessages[$message];
        }

        $this->Session->setFlash(
            $message,
            'alerts/inline',
            array('class' => $type)
        );
    }



    private function _manageAuthConfigs(){

        $this->Auth->authError = 'Área restrita, identifique-se primeiro.';
        $this->Auth->authorize = array('Controller');

        $this->Auth->flash = array_merge($this->Auth->flash, array(
            'element' => 'alerts/inline',
            'params' => array('class' => 'error')
        ));



        AuthComponent::$sessionKey = 'Auth.Customer';

        $this->Auth->loginAction = array('controller' => 'customers', 'action' => 'login', 'customer' => true);
        $this->Auth->loginRedirect = '/';
        $this->Auth->logoutRedirect = '/';
        $this->Auth->authenticate = array(
            'Form' => array(
                'userModel' => 'Customer',
                'fields' => array('username' => 'email'),
            ),
        );

        if ($this->isPrefix('admin')) {

            AuthComponent::$sessionKey = 'Auth.Admin';

            $this->Auth->loginAction = array('controller' => 'users', 'action' => 'login', 'admin' => true);
            $this->Auth->loginRedirect = '/';
            $this->Auth->logoutRedirect = '/login';
            $this->Auth->authenticate = array('Form' => array(
                'userModel' => 'User',
                'scope' => array('status' => '1')
                ));

            $this->Auth->allow('login');

        } elseif ($this->isPrefix('customer')) {

            $this->Auth->deny();

        } else {

            $this->Auth->allow();

        }
    }
}
