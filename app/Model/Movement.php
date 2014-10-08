<?php

class Movement extends AppModel {

    // public $order = 'User.id Asc';

    public $actsAs = array(
        'Containable',
    );

     public $belongsTo = array(
        'Service',
    );

    public static function getTypes() {
            return array(
                0 => 'Entrada',
                1 => 'Saida',
            );
    }
public function beforeSave($options = array()) {

    if (!empty($this->data) && !empty($this->data['Movement']['date'])) {
       $data = explode("/", $this->data['Movement']['date']);
       $this->data['Movement']['day'] = $data[0];
       $this->data['Movement']['month'] = $data[1];
       $this->data['Movement']['year'] = $data[2];
    }
    
    return true;
}

    // Validation
    public $validate = array(
        'service_id' => array(
            'notEmpty' => array(
                'rule' => 'notEmpty',
                'message' => 'Este campo é obrigatório.'
            ),
        ),
        'type' => array(
            'notEmpty' => array(
                'rule' => 'notEmpty',
                'message' => 'Este campo é obrigatório.'
            ),
        ),
        'description' => array(
            'notEmpty' => array(
                'rule' => 'notEmpty',
                'message' => 'Este campo é obrigatório.'
            ),
        ),

        'value' => array(
            'notEmpty' => array(
                'rule' => 'notEmpty',
                'message' => 'Este campo é obrigatório.'
            ),
            'numeric' => array(
                'rule' => 'numeric',
            'message' => 'Apenas Nmúero!'
        ),
        ),

        'date' => array(
            'notEmpty' => array(
                'rule' => 'notEmpty',
                'message' => 'Este campo é obrigatório.'
            ),
            'isValid' => array(
                'rule' => '/^\d{2}\/\d{2}\/\d{4}$/',
                'message' => 'A data deve ser no formato: DD/MM/AAAA.'
            ),
        ),

    );


}
