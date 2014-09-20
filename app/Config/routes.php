<?php
App::uses('SimpleRouter', 'Lib');
Router::parseExtensions('csv','pdf','xlsx');

SimpleRouter::connect('/', 'admin/dashboard#home');

SimpleRouter::connect('/login', 'admin/users#login');
SimpleRouter::connect('/logout', 'admin/users#logout');

CakePlugin::routes();

require CAKE . 'Config' . DS . 'routes.php';
