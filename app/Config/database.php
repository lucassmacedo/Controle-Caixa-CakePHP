<?php

class DATABASE_CONFIG {

    public $default = null;

    public function __construct() {
        $this->default = Configure::read('env.database');
    }
}