
        <div class="row-fluid">
            <div class="span12"><h3 class="page-title"><?php echo $title_for_layout?></div>
        </div>
<?php
   echo $this->Html->link(
            '<i class="icon-plus icon-white"></i> Adicionar Usuário',
            array('action' => 'admin_add'),
            array('class' => 'btn btn-primary green pull-right', 'escape' => false)
        );

?>
<table class="table table-striped table-bordered table-hover" id="product_price">
    <thead>
        <tr>
            <th style="width: 1% ">#</th>
            <th style="width: 2% ">Nome</th>
            <th style="width: 3% ">Login</th>
            <th style="width: 3% ">Data Criação</th>
            <th style="width: 3% ">Opções</th>
        </tr>
    </thead>
    <tbody>
        <?php
        if (!empty($data)) {

            foreach ($data as $item) {

                switch ($item['User']['status']) {
                    case '0':
                        $userStatus = '<span class="label">Inativo</span>';
                        break;

                    case '1':
                        $userStatus = '<span class="label label-success">Ativo</span>';
                        break;
                    
                    case '2':
                    default:
                        $userStatus = '<span class="label label-warning">Pendente</span>';
                        break;
                }


                echo "<tr>";
                echo $this->Html->tag('td', $item['User']['id']);
                echo $this->Html->tag('td', $item['User']['name']);
                echo $this->Html->tag('td', $item['User']['username']);
                echo $this->Html->tag('td', $item['User']['created']);

               echo '<td>';
                        if ($item['User']['status'] == '0') {
                            echo $this->Html->link(
                                '<i class="icon-eye-open icon-white"></i> Ativar',
                                array('action' => 'admin_status', $item['User']['id'],1),
                                     array('class'=>'btn mini green','escape'=> false)
                            );

                            echo '';
                        } elseif ($item['User']['status'] == '1') {
                            echo $this->Html->link(
                                '<i class="icon-eye-close"></i> Desativar',
                                array('action' => 'admin_status', $item['User']['id'],0),
                                     array('class'=>'btn mini','escape'=> false)
                            );

                            echo ' ';
                        }

                        echo $this->Html->link(
                            '<i class="icon-share"></i> Editar',
                            array('action' => 'admin_edit', $item['User']['id']),
                                 array('class'=>'btn mini blue','escape'=> false)
                        );


               
                    echo '</td>';

                echo "</tr>";
            }
        }
        ?>

    </tbody>
</table>
