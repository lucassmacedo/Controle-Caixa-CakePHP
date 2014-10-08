<?php

class Service extends AppModel {

    // public $order = 'User.id Asc';

    public $actsAs = array(
        'Containable',
    );
    
    public $hasMany = array(
    'Movement' => array(
        'order' => 'Movement.created DESC',
        'dependent' => true,
    ));

    public $validate = array(
        'name' => array(
            'notEmpty' => array(
                'rule' => 'notEmpty',
                'message' => 'O título não pode ficar em branco.',
                'required' => true
            ),
        ),
        'type' => array(
            'notEmpty' => array(
                'rule' => 'notEmpty',
                'message' => 'A slug não pode ficar em branco.',
                'required' => true
            ),
        ),
    );

	public static function getTypes() {
	        return array(
	            "" => 'Selecione',
	            0 => 'Funcionário',
	            1 => 'Serviço',
	        );
	}

}
