
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SB Admin 2 - Bootstrap Admin Theme</title>
    <?php echo $this->Html->css('bootstrap.min'); ?>
    <?php echo $this->Html->css('plugins/metisMenu/metisMenu.min.css'); ?>
    <?php echo $this->Html->css('sb-admin-2.css'); ?>
    <?php echo $this->Html->css('../font-awesome-4.1.0/css/font-awesome.min.css'); ?>

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <div class="container">
        <div class="row">
            <div class="col-md-6 col-md-offset-4">
                <div class="login-panel  panel-default">
                	<h2>Error!</h2>
                    <h3>A Página que você está procurando não Existe! :(</h3>
                </div>
           
            <button type="button" class="btn btn-primary"><i class="fa fa-chevron-left"></i> Voltar</div>
                            </button>
        </div>
    </div>

  
</body>
<?php echo $this->Html->script(array(
    'jquery-1.11.0.js',
    'bootstrap.min.js',
    'plugins/metisMenu/metisMenu.min.js',
    'sb-admin-2.js',

)); ?>

</html>