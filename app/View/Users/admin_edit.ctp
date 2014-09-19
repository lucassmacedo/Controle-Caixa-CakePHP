<div class="row-fluid">
    <div class="span12"><h3 class="page-title"><?php echo $title_for_layout?></div>
</div>
<?php

echo $this->Form->create('User');

    echo $this->Form->hidden('id');
    
    echo $this->Form->input('name', array(
        'label' => 'Nome',
        'class' => 'form form-horizontal form-body',
    ));

    echo $this->Form->input('username', array(
        'label' => 'Usuario',
        'class' => 'form form-horizontal form-body',
    ));

    echo $this->Form->input('password', array(
        'label' => 'Senha',
        'type' => 'password',
        'class' => 'span3',
        'value' => '',
    ));

    echo $this->Form->input('password_confirmation', array(
        'label' => 'Confirmação da Senha',
        'type' => 'password',
        'class' => 'span3',
        'value' => '',
    ));
   echo $this->Form->input('status', array(
                'label' => 'Usuário Ativo?',
            ));

    echo '<div class="form-actions">';
        if (!empty($this->data['User']['id'])) {
            echo $this->Html->link(
                '<i class="icon-trash icon-white"></i>',
                array( 'action' => 'delete', $id),
                array(
                    'class' => 'btn btn-danger btn-small delete-item',
                    'confirm' => 'Tem certeza?',
                    'escape' => false,
                )
            );

            echo ' ';
        }

        echo $this->Html->link('<i class="icon-remove icon-white"></i> Cancelar', array( 'action' => 'index'),array('class' => 'btn red','escape'=>false));

        echo ' ';

        echo $this->Form->button(
            '<i class="icon-ok icon-white"></i> Salvar',
            array('class' => 'btn green'),
            array('escape' => false)
        );
    echo '</div>';
    
echo $this->Form->end();

?>
