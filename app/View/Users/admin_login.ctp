<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->
<!--[if !IE]><!--> <html lang="en"> <!--<![endif]-->
    <!-- BEGIN HEAD -->
    <head>
        <meta charset="utf8" />

        <title><?php echo utf8_encode('Login | Sistema Clínica');?></title>

        <meta name="robots" content="noindex, nofollow" />
        <meta content="width=device-width, initial-scale=1.0" name="viewport" />
        <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
        <!--[if lt IE 9]>
          <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
        <![endif]-->

        <?php
        echo $this->Html->css(array(
            '/admin-panel/metronic/assets/bootstrap/css/bootstrap.min.css',
            '/admin-panel/metronic/assets/css/metro.css',
            '/admin-panel/metronic/assets/font-awesome/css/font-awesome.css',
            '/admin-panel/metronic/assets/css/style.css',
            '/admin-panel/metronic/assets/css/style_responsive.css',
            '/admin-panel/metronic/assets/css/style_default.css',
            '/admin-panel/metronic/assets/uniform/css/uniform.default.css',
        ));
        echo $this->fetch('css');
        ?>



    </head>

    <body class="login">
        <!-- BEGIN LOGO -->
        <div class="logo">

           
        </div>

        <div class='content'>





            <?php
            echo $this->Form->create('User', array(
                'class' => 'form-vertical login-form',
                'inputDefaults' => array('div' => false, 'label' => false),
            ));
            echo $this->Html->tag('h3', 'Login ', array('class' => 'form-title'));

            echo $this->Session->flash();
            echo $this->Session->flash('auth');

            echo "<div class='control-group'>";
            echo $this->Html->tag('label', utf8_encode('Usuário'), array('class' => 'control-label visible-ie8 visible-ie9'));
            echo "<div class='controls'>";
            echo "<div class='input-icon left'>";
            echo "<i class='icon-user'></i>";

            echo $this->Form->input('username', array(
                'div' => false,
                'class' => 'm-wrap placeholder-no-fix',
                'placeholder' => utf8_encode('Usuário'),
            ));

            echo "</div>";
            echo "</div>";
            echo "</div>";

            echo "<div class='control-group'>";
            echo $this->Html->tag('label', 'Senha', array('class' => 'control-label visible-ie8 visible-ie9'));
            echo "<div class='controls'>";
            echo "<div class='input-icon left'>";
            echo "<i class='icon-lock'></i>";

            echo $this->Form->input('password', array(
                'div' => false,
                'class' => 'm-wrap placeholder-no-fix',
                'placeholder' => 'Senha',
            ));

            echo "</div>";
            echo "</div>";
            echo "</div>";


            echo '<div class="form-actions">';

            $i = $this->Html->tag('i', '', array('class' => 'm-icon-swapleft m-icon-green'));
            echo $this->Html->link($i . " Voltar ao site", '/', array('escape' => false, 'class' => 'btn pull-left'));

            echo '<button type="submit" class="btn green pull-right">';
            echo 'Entrar <i class="m-icon-swapright m-icon-white"></i>';

            echo '</button>';

            echo '</div>';
            echo $this->Form->end();
            ?>

        </div>

        <?php
        echo $this->Html->script(array(
            '../admin-panel/metronic/assets/js/jquery-1.8.3.min.js',
            '../admin-panel/metronic/assets/bootstrap/js/bootstrap.min.js',
            '../admin-panel/metronic/assets/js/jquery.blockui.js',
            '../admin-panel/metronic/assets/js/jquery.blockui.js',
            '../admin-panel/metronic/assets/jquery-validation/dist/jquery.validate.min.js',
            '../admin-panel/metronic/assets/js/app.js',
        ));

        echo $this->fetch('script');
        ?>
        <script>
            jQuery(document).ready(function() {
                App.initLogin();
            });
        </script>

    </body>
</html>
