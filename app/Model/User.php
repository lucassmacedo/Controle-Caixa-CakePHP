<?php

class User extends AppModel {

    public $order = 'User.id Asc';

    public $actsAs = array(
        'Containable',
    );
  
    public $hasMany = array();

    public $validate = array(
        'current_password' => array(
            'check' => array(
                'rule' => 'checkCurrentPassword',
                'message' => 'A senha atual está incorreta.',
            ),
        ),
        'username' => array(
            'notEmpty' => array(
                'rule' => 'notEmpty',
                'message' => 'O nome de usuário não pode ficar em branco.',
                'required' => true
            ),
            'isUnique' => array(
                'rule' => 'isUnique',
                'message' => 'Este Usuário ja existe.',
            ),
        ),
        'password' => array(
            'notEmpty' => array(
                'rule' => 'notEmpty',
                'message' => 'A senha não pode ficar em branco.',
                'required' => true,
            ),
        ),
        'password_confirmation' => array(
            'rule' => 'confirmPassword',
            'message' => 'A confirmação da senha deve ser igual a senha.',
        ),
    );

    public function checkCurrentPassword($data) {
        $password = $this->field('password');
        return (AuthComponent::password($data['current_password']) == $password);
    }

    public function confirmPassword($password = null) {
        if ((isset($this->data[$this->alias]['password']) && isset($password['password_confirmation'])) && !empty($password['password_confirmation']) && ($this->data[$this->alias]['password'] == $password['password_confirmation'])) {
            return true;
        }

        return false;
    }

    public function beforeSave($options = array()) {
        if (!empty($this->data[$this->alias]['password'])) {
            $this->data[$this->alias]['password'] = AuthComponent::password($this->data[$this->alias]['password']);
        }

        return true;
    }

}
