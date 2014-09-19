<?php

$config = array(
    'Meta' => array(
        'title' => 'Sistema Controle de Pacientes',
        'subtitle' => '',
        'description' => '',
        'keywords' => '',
    ),

    'Security' => array(
        'salt'       => 'DYhG93b0qyJ1fIxfs2guVoUubWwvniR2G0FgaC9mi',
        'cipherSeed' => '768529309657453542496749683645',
    ),

    'Development' => array(
        'debug' => 2,
        'database' => array(
            'datasource' => 'Database/Mysql',
            'persistent' => false,
            'host' => 'localhost',
            'login' => 'root',
            'password' => '',
            'database' => 'cake_caixa',
            'prefix' => '',
            'encoding' => 'utf8',
        ),
    ),

    'Production' => array(
        'debug' => 0,
        'database' => array(
            'datasource' => 'Database/Mysql',
            'persistent' => false,
            'host' => '177.153.16.64',
            'login' => 'predilet1',
            'password' => 'avdk6WC5Vr2Rh',
            'database' => 'predilet1',
            'prefix' => '',
            'encoding' => 'utf8',
        ),
    ),
);
