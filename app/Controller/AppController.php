<?php


App::uses('Controller', 'Controller');

class AppController extends Controller {
	 public $components = array(
        'Session', 'RequestHandler', 'Auth', 'Email'
    );

     // config the parans form twitter TwitterBootstrap
	public $helpers = array(
	        'Session',
	        'Html' => array('className' => 'TwitterBootstrap.BootstrapHtml'),
	        'Form' => array('className' => 'TwitterBootstrap.BootstrapForm'),
	        'Paginator' => array('className' => 'TwitterBootstrap.BootstrapPaginator'),
	        'Time',
	        'Text',
	        'Number',
	        'Site',
	    );

	public $titleForLayout = null;
    public $currentUser = array();
    
	public function beforeFilter() {

        if ($this->isPrefix('admin')) {
            $this->layout = 'admin';
        
        } 

        // Configurações de login
        $this->_manageAuthConfigs();


        $this->currentUser = $this->Auth->user();


        return parent::beforeFilter();
    }

    public function beforeRender() {
        $this->set('bodyClass', sprintf(
            '%s %s',
            strtolower($this->name),
            strtolower($this->name) . '-' . strtolower($this->action)
        ));

        $this->set(array(
            'isAdmin' => $this->isPrefix('admin'),
            'title_for_layout' => $this->titleForLayout,
            'currentUser' => $this->currentUser
        ));

        return parent::beforeRender();
    }

    // Verifiy that is a prefix
    protected function isPrefix($prefix) {
        $params = $this->request->params;
        return isset($params['prefix']) && $params['prefix'] === $prefix;
    }
    // Set the flash Type
    protected function setFlash($message, $type = 'success') {

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
