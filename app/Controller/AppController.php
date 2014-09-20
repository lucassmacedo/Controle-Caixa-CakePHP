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

    public function beforeFilter()
    {
        if (Configure::read('debug') == 0) {
            if (
                checkRoute('customers#add')
                || checkRoute('customers#customer_login')
                || checkRoute('checkout#customer_index')
                || checkRoute('checkout#customer_process')
                || checkRoute('checkout#customer_success')
            ) {
                if (!isset($_SERVER['HTTPS'])) {
                    $this->_forceSecure();
                }
            }
        }


        // Configurações específicas para cada prefixo
        if ($this->isPrefix('admin')) {
            
            $this->layout = 'admin';
        
        } elseif ($this->isPrefix('customer')) {
        }


        // Configurações de login
        $this->_manageAuthConfigs();


        $this->currentUser = $this->Auth->user();


        return parent::beforeFilter();
    }

    public function _forceSecure()
    {
        $this->redirect('https://'.env('SERVER_NAME').env('REQUEST_URI'));
    }

    public function beforeRender()
    {
         if($this->name == 'CakeError'){
      $this->layout = 'error';
   } 
   
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

    // Check if is someone logged in
    public function isAuthorized($user)
    {
        /*if (!isset($user['role'])) return false;

        // Admin can access any action
        if ($user['role'] === 'admin') {
            return true;
        }

        // Customer can access any customer action
        if ($this->isPrefix('customer') && $user['role'] === 'customer') {
            return true;
        }*/

        // Default deny
        //return false;
        return true;
    }

    // Verifiy that is a prefix
    protected function isPrefix($prefix)
    {
        $params = $this->request->params;
        return isset($params['prefix']) && $params['prefix'] === $prefix;
    }

    protected function setFlash($message, $type = 'success')
    {
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
