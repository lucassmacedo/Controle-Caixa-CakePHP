<?php

Cache::config('default', array('engine' => 'File'));

// load all Plugins
CakePlugin::loadAll();

//Configuring Filters
Configure::write('Dispatcher.filters', array(
    'AssetDispatcher',
    'CacheDispatcher'
));


// config the log
App::uses('CakeLog', 'Log');
CakeLog::config('debug', array(
    'engine' => 'FileLog',
    'types' => array('notice', 'info', 'debug'),
    'file' => 'debug',
));
CakeLog::config('error', array(
    'engine' => 'FileLog',
    'types' => array('warning', 'error', 'critical', 'alert', 'emergency'),
    'file' => 'error',
));


// Configure currency for BRAZIL
App::uses('CakeNumber', 'Utility');
CakeNumber::addFormat('BRR', array('before' => 'R$ ', 'thousands' => '.', 'decimals' => ',', 'zero' => 'R$ 0,00', 'after' => false));
CakeNumber::addFormat('BR', array('before' => null, 'thousands' => '.', 'decimals' => ',', 'after' => false));


/* function check route 
 ex:  if (checkRoute('pages#home')) {}  */

function checkRoute($route = null) {
    list($controller, $action) = explode('#', $route);
    $params = Router::getParams();
    return ($params['controller'] == $controller && $params['action'] == $action);
}