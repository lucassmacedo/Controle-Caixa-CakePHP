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

function mostraMes($m) {
    switch ($m) {
        case 01: case 1: $mes = "Janeiro";
            break;
        case 02: case 2: $mes = "Fevereiro";
            break;
        case 03: case 3: $mes = "Mar&ccedil;o";
            break;
        case 04: case 4: $mes = "Abril";
            break;
        case 05: case 5: $mes = "Maio";
            break;
        case 06: case 6: $mes = "Junho";
            break;
        case 07: case 7: $mes = "Julho";
            break;
        case 08: case 8: $mes = "Agosto";
            break;
        case 09: case 9: $mes = "Setembro";
            break;
        case 10: $mes = "Outubro";
            break;
        case 11: $mes = "Novembro";
            break;
        case 12: $mes = "Dezembro";
            break;
    }
    return $mes;
}