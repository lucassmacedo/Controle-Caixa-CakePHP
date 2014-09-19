<div class="container-fluid">
                <!-- BEGIN PAGE HEADER-->
                <div class="row-fluid">
                    <div class="span12">
                 
                        <!-- END BEGIN STYLE CUSTOMIZER -->     
                        <!-- BEGIN PAGE TITLE & BREADCRUMB-->           
                        
                            <?php echo $this->Html->tag('h3',"Sistema Controle de Pacientes e Consultas",array('class'=>'page-title')); ?>               
                           
                                                
                       
                        <!-- END PAGE TITLE & BREADCRUMB-->
                    </div>
                </div>
                <!-- END PAGE HEADER-->
                <div id="dashboard">
                   <div class="row-fluid">

                       <div class="span4 responsive" data-tablet="span4" data-desktop="span4">
                            <div class="dashboard-stat gray">
                                <div class="visual">
                                    <i class="icon-stethoscope"></i>
                                </div>
                                <div class="details">
                                  <div class="number"> <?php echo (!empty($orders_day) ? $orders_day : 0 ) ;?></div>
                                  <div class="desc">Consultas Hoje</div>
                                </div>
                                              
                                 <?php 
                                    $date =  date('Y-m-d');
                                    echo $this->Html->link('Ver todos <i class="m-icon-swapright m-icon-white"></i>',
                                    array('controller'=>'customers_schedules', 'action'=>'','?'=> "search%5Bterm%5D=&search%5Bstatus%5D=&search%5Btoday%5D={$date}&search%5Bsale_from%5D=&search%5Bsale_to%5D="),
                                    array('class'=>'more','escape'=>false));
                                ?> 
                            </div>
                        </div>
                          <div class="span4 responsive" data-tablet="span4" data-desktop="span4">
                            <div class="dashboard-stat green2">
                                <div class="visual">
                                    <i class="icon-stethoscope"></i>
                                </div>
                                <div class="details">
                              <div class="number"> <?php echo (!empty($customersConsultation_resumo) ? count($customersConsultation_resumo) : 0 ) ;?></div>
                                  <div class="desc">Consultas Realizadas</div>
                                </div>
                                              
                                 <?php 
                                    $date =  date('Y-m-d');
                                    echo $this->Html->link('Ver todos <i class="m-icon-swapright m-icon-white"></i>',
                                    array('controller'=>'customers_consultations', 'action'=>'admin_index'),
                                    array('class'=>'more','escape'=>false));
                                ?> 
                            </div>
                        </div>
                <div class="span4 responsive" data-tablet="span4" data-desktop="span4">
                            <div class="dashboard-stat green">
                                <div class="visual">
                                    <i class="icon-stethoscope"></i>
                                </div>
                                <div class="details">
                              <div class="number"> <?php echo (!empty($orders) ? $orders : 0 ) ;?></div>
                                  <div class="desc">Consultas Agendadas</div>
                                </div>
                                              
                                 <?php 
                                    $date =  date('Y-m-d');
                                    echo $this->Html->link('Ver todos <i class="m-icon-swapright m-icon-white"></i>',
                                    array('controller'=>'customers_schedules', 'action'=>'','?'=> "search%5Bterm%5D=&search%5Bstatus%5D=&search%5Bsale_from%5D={$date}"),
                                    array('class'=>'more','escape'=>false));
                                ?> 
                            </div>
                        </div>
                 

                    </div>

                    <div class="row-fluid">
                           <div class="span4 responsive" data-tablet="span4" data-desktop="span4">
                            <div class="dashboard-stat blue2">
                                <div class="visual">
                                    <i class="icon-group"></i>
                                </div>
                                <div class="details">
                                    <div class="number">
                                        <?php echo (!empty($customers) ? $customers : 0) ;?>
                                    </div>
                                    <div class="desc">                                  
                                        Pacientes
                                    </div>
                                </div>
                                <?php
                                    echo $this->Html->link('Ver todos <i class="m-icon-swapright m-icon-white"></i>',
                                    array('controller'=>'customers', 'action'=>'admin_index'),
                                    array('class'=>'more','escape'=>false));
                                ?>
                                                   
                            </div>
                        </div>
                        <?php if($currentUser['role'] == 1){ ?>
          <div class="span4 responsive" data-tablet="span4" data-desktop="span4">
                            <div class="dashboard-stat blue3">
                                <div class="visual">
                                    <i class="icon-user-md"></i>
                                </div>
                                <div class="details">
                                      <div class="number"> <?php 
                                      echo (!empty($users) ? $users : 0 ) ;?></div>
                                    <div class="desc">Profissionais</div>
                                </div>
                                              
                                 <?php $date =  date('Y-m-d');
                                    echo $this->Html->link('Ver todos <i class="m-icon-swapright m-icon-white"></i>',
                                    array('controller'=>'users', 'action'=>'admin_index'),
                                    array('class'=>'more','escape'=>false));
                                ?> 
                            </div>
                        </div>
                        <?php } ?>

                        <!--  <div class="span4 responsive" data-tablet="span4" data-desktop="span4">
                           <div class="dashboard-stat yellow">
                               <div class="visual">
                                   <i class="icon-bar-chart"></i>
                               </div>
                               <div class="details">
                                   <div class="number">Relátorios</div>
                                 
                               </div>
                                <?php
                                   echo $this->Html->link('Ver todos <i class="m-icon-swapright m-icon-white"></i>',
                                   array('controller'=>'reports', 'action'=>'admin_index'),
                                   array('class'=>'more','escape'=>false));
                               ?>                        
                           </div>
                                                </div> -->
                    </div>
                     <div class="row-fluid">

                     

                         
                       

                             </div>
                            <div class="row-fluid">
                                <div class="span6 responsive" data-tablet="span6" data-desktop="span6">
                                    <div class="portlet box green">
                                        <div class="portlet-title">
                                            <h4><i class="icon-reorder"></i>Últimas 5 Consultas</h4>
                                            <div class="tools">
                                                <a href="javascript:;" class="collapse"></a>
                                            </div>
                                        </div>
                                        <div class="portlet-body" style="display: block;">
                                          
                                           <table class="table table-hover">
                                                <thead>
                                                    <tr>
                                                        <th><i class="icon-user"></i> Nome</th>
                                                        <th> Atendido Por</th>
                                                        <th><i class="icon-shopping-cart"></i> Data</th>
                                                        <th>Ver</th>
                                                        
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                  <?php
                         if(!empty($customersConsultation_resumo)) {
                          foreach ($customersConsultation_resumo as $item) {
                                                       echo '<tr>';
         echo $this->Html->tag('td',$item['Customer']['name']);
         echo $this->Html->tag('td',$item['User']['name']);
         echo $this->Html->tag('td',date('d/m/Y ', strtotime($item['CustomersConsultation']['created'])));
         echo $this->Html->tag('td',$this->Html->link('Ver',array('controller'=>'customers_consultations','action'=>'admin_edit',$item['CustomersConsultation']['id']
          ),array('class'=>'btn mini green-stripe')));
         echo '</tr>';
                                                    }
                                                
                                                 }?>
                                              
                                               
                                                </tbody>

                                            </table>
                                            <?php echo $this->Html->link('Ver Todas',array('controller'=>'orders','action'=>'index'),
                                            array('class'=>'btn red-stripe'));?>
                                        </div>
                                     </div>
                                </div>


                                <div class="span6 responsive" data-tablet="span6" data-desktop="span6">
                                    <div class="portlet box green">
                                        <div class="portlet-title">
                                            <h4><i class="icon-reorder"></i>Últimos 5 Pacientes Cadastrados</h4>
                                            <div class="tools">
                                                <a href="javascript:;" class="collapse"></a>
                                            </div>
                                        </div>
                                        <div class="portlet-body" style="display: block;">
                                          
                                           <table class="table table-hover">
                                                <thead>
                                                    <tr>
                                                        <th><i class="icon-user"></i> Nome</th>
                                                        <th><i class="icon-envelope"></i> E-mail</th>
                                                        <th><i class="icon-globe"></i> Cidade</th> 
                                                        <th> Ver </th> 
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                  <?php
                                                   if(!empty($customers_resumo)) {
                                                    foreach ($customers_resumo as $item) {
                                                       echo '<tr>';
                                                       echo $this->Html->tag('td',$item['Customer']['name']);
                                                       echo $this->Html->tag('td',$item['Customer']['email']);
                                                       echo $this->Html->tag('td',$item['Customer']['city']);
                                                        echo $this->Html->tag('td',$this->Html->link('Ver',array('controller'=>'customers','action'=>'edit',$item['Customer']['id']
                                                        ),array('class'=>'btn mini green-stripe')));
                                                       echo '</tr>';
                                                    }
                                                
                                                 }?>
                                                </tbody>
                                            </table>
                                            <?php echo $this->Html->link('Ver Todos',array('controller'=>'customers','action'=>'index'),
                                            array('class'=>'btn green-stripe'));?>
                                        </div>
                                     </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
