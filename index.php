<?php
  session_start();
  if($_SESSION["login"]==NULL){
      $_SESSION["login"]=-1;
  }
  if($_SESSION["login"]==1)
    header("Location: home.php");
 ?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title>SuBodega - Sistema de punto de venta</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
        <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
        <meta content="Coderthemes" name="author" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />

        <link rel="shortcut icon" href="img/logo.ico">

        <!-- Bootstrap core CSS -->
        <link href="assets/css/bootstrap.min.css" rel="stylesheet">
        <!-- MetisMenu CSS -->
        <link href="assets/css/metisMenu.min.css" rel="stylesheet">
        <!-- Icons CSS -->
        <link href="assets/css/icons.css" rel="stylesheet">
        <!-- Custom styles for this template -->
        <link href="assets/css/style.css" rel="stylesheet">

    </head>
    <body>

        <!-- HOME -->
        <section>
            <div class="container">
                <div class="row">
                    <div class="col-sm-12">

                        <div class="wrapper-page">

                            <div class="m-t-40 card-box">
                                <div class="text-center">
                                    <h2 class="text-uppercase m-t-0 m-b-30">
                                        <a href="index.html" class="text-success">
                                            <span><img src="img/logo.png" alt="" height="60"></span>
                                        </a>
                                    </h2>
                                    <!--<h4 class="text-uppercase font-bold m-b-0">Sign In</h4>-->
                                </div>
                                <div class="account-content">
                                    <form class="form-horizontal" method="post">

                                        <div class="form-group m-b-20">
                                            <div class="col-xs-12">
                                                <center><font style="font-size:25px">Acceso al sistema</font><br><br></center>
                                                <label for="text">Usuario</label>
                                                <input class="form-control" type="text" name="usuario" required="" placeholder="mario">
                                            </div>
                                        </div>

                                        <div class="form-group m-b-20">
                                            <div class="col-xs-12">
                                                <label for="password">Contraseña</label>
                                                <input class="form-control" type="password" required="" name="contraseña" placeholder="mario">
                                            </div>
                                        </div>
                                        <?php
                                          include "conexion.php";
                                        	if ($conn->connect_error) {
                                            	die("Connection failed: " . $conn->connect_error);
                                        	}else{
                                        		 if(isset($_POST['enviar'])){
                                        		 	$user= $_POST['usuario'];
                                        		 	$pass= $_POST['contraseña'];
                                              $sql = "SELECT * FROM usuario WHERE user='".$user."' and password='".$pass."' and deleted=0";
                                                 	$result = $conn->query($sql);
                                                 		if($result->num_rows > 0) {
                                                      header("Location: home.php");
                                                      $user_info = $result->fetch_assoc();
                                                      $_SESSION["login"] = 1;
                                                      $_SESSION["user"] = $user_info["nombre"];
                                                      $_SESSION["clave_user"] = $user_info["user"];
                                                      $_SESSION["type_user"]=$user_info["privilegios"];
                                                      $_SESSION["completeInfo"] = $user_info;
                                                      $stmt = "UPDATE usuario SET active=1 WHERE user='".$user."'";
                                                      $conn->query($stmt);
                                        			    }
                                        			    else{
                                        			    	echo "<div class='alert alert-danger alert-dismissible fade in' role='alert'>
                                                                                        <button type='button' class='close' data-dismiss='alert'
                                                                                                aria-label='Close'>
                                                                                            <span aria-hidden='true'>&times;</span>
                                                                                        </button>
                                                                                        <strong>Ups!</strong> Usuario o contraseña incorrectos.
                                                                                    </div>";
                                        			    }
                                        	}
                                        }
                                        	$conn->close();
                                        ?>
                                        <a href="pages-forget-password.html" class="text-muted pull-left font-14">Olvidó su contraseña?</a><br>
                                        <div class="form-group account-btn text-center m-t-10">

                                            <div class="col-xs-12">

                                               <input name="enviar" class="btn btn-lg btn-primary" type="submit" value="Iniciar sesión"></input>
                                            </div>
                                        </div>

                                    </form>

                                    <div class="clearfix"></div>

                                </div>
                            </div>
                            <!-- end card-box-->



                        </div>
                        <!-- end wrapper -->

                    </div>
                </div>
            </div>
        </section>
        <!-- END HOME -->

        <!-- js placed at the end of the document so the pages load faster -->
        <script src="assets/js/jquery-2.1.4.min.js"></script>
        <script src="assets/js/bootstrap.min.js"></script>
        <script src="assets/js/metisMenu.min.js"></script>
        <script src="assets/js/jquery.slimscroll.min.js"></script>

        <!-- App Js -->
        <script src="assets/js/jquery.app.js"></script>

    </body>
</html>
