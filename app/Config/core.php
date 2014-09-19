<?php

	function isProductionEnv() {
	    return file_exists(APP . DS . 'production.txt') ? true : false;
	}

	// Initialize PhpReader
	App::uses('PhpReader', 'Configure');
	Configure::config('PhpReader', new PhpReader());

	// Load project config file
	Configure::load('config', 'PhpReader');


	// Set the current environment
	if (isProductionEnv()) {
	    Configure::write('env', Configure::read('Production'));
	} else {
	    Configure::write('env', Configure::read('Development'));
	}

	// Set the debug level
	Configure::write('debug', Configure::read('env.debug'));

	Configure::write('Error', array(
		'handler' => 'ErrorHandler::handleError',
		'level' => E_ALL & ~E_DEPRECATED,
		'trace' => true
	));


	Configure::write('Exception', array(
		'handler' => 'ErrorHandler::handleException',
		'renderer' => 'ExceptionRenderer',
		'log' => true
	));


	Configure::write('App.encoding', 'UTF-8');
	Configure::write('Routing.prefixes', array('admin'));

	// Defines the default error type when using the log() function.
	define('LOG_ERROR', LOG_ERR);

	// Session configuration
	Configure::write('Session', array(
	    'cookie' => 'CTLCAIXA',
	    'timeout' => '10080',
	    'cookieTimeout' => '10080',
	    'defaults' => 'php',
	));

	// The level of CakePHP security.
	Configure::write('Security.level', 'medium');

	// The level of CakePHP security.
	Configure::write('Security.level', 'medium');

	// Apply timestamps with the last modified time to static assets (js, css, images)
	//Configure::write('Asset.timestamp', true);

	// The classname and database used in CakePHP's access control lists.
	Configure::write('Acl.classname', 'DbAcl');
	Configure::write('Acl.database', 'default');

	// Pick the caching engine to use. If APC is enabled use it.
	$engine = 'File';
	if (extension_loaded('apc') && function_exists('apc_dec') && (php_sapi_name() !== 'cli' || ini_get('apc.enable_cli'))) {
	    $engine = 'Apc';
	}

	// In development mode, caches should expire quickly.
	$duration = '+999 days';
	if (Configure::read('debug') >= 1) {
	    $duration = '+10 seconds';
	}

	// Prefix each application on the same server with a different string, to avoid Memcache and APC conflicts.
	$prefix = 'myapp_';

	/**
	 * Configure the cache used for general framework caching.  Path information,
	 * object listings, and translation cache files are stored with this configuration.
	 */
	Cache::config('_cake_core_', array(
	    'engine' => $engine,
	    'prefix' => $prefix . 'cake_core_',
	    'path' => CACHE . 'persistent' . DS,
	    'serialize' => ($engine === 'File'),
	    'duration' => $duration
	));

	/**
	 * Configure the cache for model and datasource caches.  This cache configuration
	 * is used to store schema descriptions, and table listings in connections.
	 */
	Cache::config('_cake_model_', array(
	    'engine' => $engine,
	    'prefix' => $prefix . 'cake_model_',
	    'path' => CACHE . 'models' . DS,
	    'serialize' => ($engine === 'File'),
	    'duration' => $duration
	));
