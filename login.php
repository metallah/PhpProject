<?php
session_start();
if(isset($_SESSION['login'])){
  header("location:login.php");
}
if(!empty($_POST)){
    $con =new PDO('mysql:host=localhost;dbname=itprojet','root','');
    $q = $con ->prepare("SELECT count(*) from compte where login =? and motpass=?");
    $q->execute(array($_POST['email'],$_POST['password']));
    $r=$q->fetchColumn();
    
    $q = $con ->prepare("SELECT type from compte where login =? and motpass=?");
    $q->execute(array($_POST['email'],$_POST['password']));
    $t=$q->fetchColumn();
  }
?>
  <!DOCTYPE html>
  <html>

  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Admin | Log in</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="bower_components/bootstrap/dist/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="bower_components/font-awesome/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="bower_components/Ionicons/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
    <!-- iCheck -->
    <link rel="stylesheet" href="plugins/iCheck/square/blue.css">
    <link rel="stylesheet" href="C:\wamp64\www\ITProject\fbapp\fb.js">
    <script type="text/javascript" src="fbapp\fb.js"></script>
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
    <!-- Google Font -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
  </head>

  <body class="hold-transition login-page">
    <div class="login-box">
      <div class="login-logo">
        <a href="index2.html">
          <b>Admin</b>
        </a>
      </div>
      <!-- /.login-logo -->
      <div class="login-box-body">
        <p class="login-box-msg">Sign in to start your session</p>
        <form action="" method="post">
          <div class="form-group has-feedback">
            <input type="text" name="email" class="form-control" placeholder="Email">
            <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
          </div>
          <div class="form-group has-feedback">
            <input type="password" name="password" class="form-control" placeholder="Password">
            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
          </div>
          <div class="row">
            <div class="col-xs-8">
              <div class="checkbox icheck">
                <label>
                  <input type="checkbox" name="remember"> Remember Me
                </label>
              </div>
            </div>
            <!-- /.col -->
            <div class="col-xs-4">
              <button type="submit" name="login" class="btn btn-primary btn-block btn-flat">Sign In</button>
              <?php
              if(!empty($_POST)){
                    if($r==1){
                        $q= $con->prepare("SELECT count(*) from compte where login=? and EstActif=1");
                        $q->execute(array($_POST["email"]));
                        $r1=$q->fetchColumn();
                        if($r1==1 && $t=='Administrateur'){
                          $_SESSION['Login']=$_POST["email"];
                        echo "<br>Welcome ".$_SESSION['Login'];
                        header("location:profile.php");
                        }
                        elseif($r1==1 && $t=='Membre'){
                          $_SESSION['Login']=$_POST["email"];
                        echo "<br>Welcome ".$_SESSION['Login'];
                        header("location:auteur.html");
                        }
                         elseif($r1==1 && $t=='Joueur'){
                          $_SESSION['Login']=$_POST["email"];
                        echo "<br>Welcome ".$_SESSION['Login'];
                        header("location:auteur.php");
                        }
                    else{
                        echo"<br> user or password is incorrect!";
                    }
                  }
                }
?>
            </div>
            <!-- /.col -->
          </div>
        </form>

        <div class="social-auth-links text-center">
          <p>- OR -</p>
          <!-- <a href="#" class="btn btn-block btn-social btn-facebook btn-flat">
            <i class="fa fa-facebook"></i> Sign in using Facebook
          </a> -->
          <div class="fb-login-button" data-scope="public_profile,email" onlogin="checkLoginState();" data-max-rows="1" data-size="large" data-button-type="continue_with" data-show-faces="false"
            data-auto-logout-link="false" data-use-continue-as="false">
          </div>

          <a href="#" class="btn btn-block btn-social btn-google btn-flat">
            <i class="fa fa-google-plus"></i> Sign in using Google+ 
          </a>
        </div>
        <!-- /.social-auth-links -->

        <a href="#">I forgot my password</a>
        <br>
        <a href="register.html" class="text-center">Register a new membership</a>

      </div>
      <!-- /.login-box-body -->
    </div>
    <!-- /.login-box -->

    <!-- jQuery 3 -->
    <script src="bower_components/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap 3.3.7 -->
    <script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- iCheck -->
    <script src="plugins/iCheck/icheck.min.js"></script>
    <script>
      $(function () {
        $('input').iCheck({
          checkboxClass: 'icheckbox_square-blue',
          radioClass: 'iradio_square-blue',
          increaseArea: '20%' /* optional */
        });
      });
    </script>
  </body>

  </html>