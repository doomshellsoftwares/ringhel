<!DOCTYPE html>
<html>

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="au theme template">
    <meta name="author" content="Hau Nguyen">
    <meta name="keywords" content="au theme template">

    <!-- Title Page-->
    <title>Login</title>
    <!-- Bootstrap CSS-->
    <link href="<?php  echo SITE_URL ?>css/admin/bootstrap.min.css" rel="stylesheet" media="all">
    <!-- Main CSS-->
    <link href="<?php  echo SITE_URL ?>css/theme.css" rel="stylesheet" media="all">
<style type="text/css">
    .fade {
    opacity: 1;
}
</style>
</head>

<body class="animsition">
    <div class="page-wrapper">
        <div class="page-content--bge5">
            <div class="container">
                <div class="login-wrap">
                    <div class="login-content">
                        <div class="login-logo">
                            <a href="#">
                                <img src="<?php echo SITE_URL ?>images/logo.png" alt="Web app">
                            </a>
                        </div>
<div class="login-form">
<?php echo $this->Form->create('user',array('url'=>array('controller'=>'logins','action'=>'login')));?>
<div class="form-group">
<?php echo $this->Form->input('email',array('type'=>'email','class'=>'form-control', 
'placeholder'=>'username')); ?>
<!--<input type="email" class="form-control" placeholder="Email">-->
                        </div>
                        <div class="form-group">
                            
<div class="tip">
<?php echo $this->Form->input('password',array('class'=>'form-control', 'placeholder'=>'Password')); ?>
                            <!--<input type="password" class="form-control" placeholder="Password">-->
                        </div>


                         <div class="login-checkbox">
                                    <label>
                                        <input type="checkbox" name="remember">Remember Me
                                    </label>
                                    
                                </div>
                                <button class="au-btn au-btn--block au-btn--green m-b-20" type="submit">sign in</button>
                               
                            </form>
                            <div class="register-link">
                             <?php echo $this->Flash->render(); ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <!-- Jquery JS-->
    <script type="text/javascript" src="<?php echo SITE_URL; ?>js/jquery-3.3.1.min.js"></script>
<script type="text/javascript" src="<?php echo SITE_URL; ?>js/bootstrap.min.js"></script>
</body>

</html>
<!-- end document-->
