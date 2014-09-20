<!DOCTYPE html>
<html>
<head>
    <?php echo $this->Html->charset(); ?>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>
        
    </title>

    <?php echo $this->Html->css('bootstrap.min'); ?>
    <?php echo $this->Html->css('plugins/metisMenu/metisMenu.min.css'); ?>
    <?php echo $this->Html->css('plugins/timeline.css'); ?>
    <?php echo $this->Html->css('sb-admin-2.css'); ?>
    <?php echo $this->Html->css('plugins/morris.css'); ?>
    <?php echo $this->Html->css('../font-awesome-4.1.0/css/font-awesome.min.css'); ?>
    <?php echo $this->Html->css('style.css'); ?>
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

<body>
      <div id="wrapper">

     <?php echo $this->Element('menu') ?>

        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header"><?php echo $title_for_layout ?></h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
      
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                  
                    <!-- /.panel -->
                    <div class="panel panel-default">
                      
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="row">
                             
                               
                            </div>
                            <!-- /.row -->
                        </div>
                        <!-- /.panel-body -->
                    </div>
            
            </div>
            <!-- /.row -->
        </div>
        <!-- /#page-wrapper -->

    </div>
    </div>
    <!-- /#wrapper -->

    <?php echo $this->element('sql_dump'); ?>
</body>
<?php echo $this->Html->script(array(
    'jquery-1.11.0.js',
    'bootstrap.min.js',
    'plugins/metisMenu/metisMenu.min.js',
    'plugins/morris/raphael.min.js',
    //'plugins/morris/morris.min.js',
    //'plugins/morris/morris-data.js',
    'sb-admin-2.js',

)); ?>
  
</head>
</html>
