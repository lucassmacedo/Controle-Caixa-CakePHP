
<div class="page-header"><h2>Admin « Alterar Senha </h2></div>
<?php
    echo $this->Form->create('User');

        echo $this->Form->input('current_password', array(
            'label'=> 'Senha Atual',
            'type' => 'password',
            'class' => 'form form-horizontal form-body',
        ));

        echo $this->Form->input('password', array(
            'label'=> 'Nova Senha',
            'type' => 'password',
            'class' => 'span3',
        ));

        echo $this->Form->input('password_confirmation',  array(
            'label' =>'Confirmação da Senha',
            'type' => 'password',
            'class' => 'span3',
        ));

        echo '<div class="form-actions">';
            echo $this->Form->button(
                '<i class="icon-ok icon-white"></i> Salvar',
                array('class' => 'btn green'),
                array('escape' => false)
            );
        echo '</div>';
    echo $this->Form->end();
?>
