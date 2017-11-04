<?php
  session_start();
  if($_SESSION["login"]!=1)
    header("Location: index.php");
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
        <!-- Plugins css-->
          <link href="assets/plugins/bootstrap-tagsinput/css/bootstrap-tagsinput.css" rel="stylesheet" />
          <link rel="stylesheet" href="assets/plugins/switchery/switchery.min.css">
          <link href="assets/plugins/select2/css/select2.min.css" rel="stylesheet" type="text/css" />
          <link href="assets/plugins/timepicker/bootstrap-timepicker.min.css" rel="stylesheet">
        <link href="assets/plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.min.css" rel="stylesheet">
        <link href="assets/plugins/bootstrap-datepicker/css/bootstrap-datepicker.min.css" rel="stylesheet">
        <link href="assets/plugins/clockpicker/css/bootstrap-clockpicker.min.css" rel="stylesheet">
        <link href="assets/plugins/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">


        <link href="assets/plugins/summernote/summernote.css" rel="stylesheet" />
        <!--Morris Chart CSS -->
		<link rel="stylesheet" href="assets/plugins/morris/morris.css">

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

        <div id="page-wrapper">

            <!-- Top Bar Start -->
            <div class="topbar">

                <!-- LOGO -->
                <div class="topbar-left">
                    <div class="">
                        <a href="index.php" class="logo">
                            <img src="img/logo.png" alt="logo" class="logo-lg" />
                            <img src="assets/images/logo_sm.png" alt="logo" class="logo-sm hidden" />
                        </a>
                    </div>
                </div>

                <!-- Top navbar -->
                <div class="navbar navbar-default" role="navigation">
                   <div class="container">
                      <div class="">
                         <!-- Mobile menu button -->
                         <div class="pull-left">
                            <button type="button" class="button-menu-mobile visible-xs visible-sm">
                            <i class="fa fa-bars"></i>
                            </button>
                            <span class="clearfix"></span>
                         </div>
                         <!-- Top nav left menu -->
                         <ul class="nav navbar-nav hidden-sm hidden-xs top-navbar-items">
                            <li><a href="sobre-nosotros.php">Sobre nosotros</a></li>
                            <li><a href="#">Ayuda</a></li>
                         </ul>
                         <!-- Top nav Right menu -->
                         <ul class="nav navbar-nav navbar-right top-navbar-items-right pull-right">
                            <li class="hidden-xs">
                               <form role="search" class="navbar-left app-search pull-left">
                                  <input type="text" placeholder="Buscar..." class="form-control">
                                  <a href=""><i class="fa fa-search"></i></a>
                               </form>
                            </li>
                            <li class="dropdown top-menu-item-xs">
                               <a href="#" data-target="#" class="dropdown-toggle menu-right-item" data-toggle="dropdown" aria-expanded="true">
                               </a>
                               <ul class="dropdown-menu p-0 dropdown-menu-lg">
                                  <li class="list-group notification-list" style="height: 267px;">
                                  </li>
                               </ul>
                            </li>
                            <li class="dropdown top-menu-item-xs">
                               <a href="" class="dropdown-toggle menu-right-item profile" data-toggle="dropdown" aria-expanded="true"><img src="img/user_icon.png" alt="user-img" class="img-circle"> </a>
                               <ul class="dropdown-menu">
                                  <script type="text/javascript">
                                  function logout() {
                                      $.get("logout.php");
                                      return false;
                                    }
                                  </script>
                                  <li><a href="perfil.php" ><i class="ti-power-off m-r-10"></i> Perfil</a></li>
                                  <li><a href="index.php"  onclick="logout()"><i class="ti-power-off m-r-10"></i> Cerrar sesión</a></li>
                               </ul>
                            </li>
                         </ul>
                      </div>
                   </div>
                   <!-- end container -->
                </div>
                <!-- end navbar -->
             </div>
              <!-- Top Bar End -->


            <!-- Page content start -->
            <div class="page-contentbar">

                <!--left navigation start-->
                <aside class="sidebar-navigation">
                    <div class="scrollbar-wrapper">
                        <div>
                            <button type="button" class="button-menu-mobile btn-mobile-view visible-xs visible-sm">
                                <i class="mdi mdi-close"></i>
                            </button>
                            <!-- User Detail box -->
                            <div class="user-details">
                                <div class="pull-left">
                                    <img src="img/user_icon.png" alt="" class="thumb-md img-circle">
                                </div>
                                <div class="user-info">
                                    <?php
                                      echo "<a href='#'>".$_SESSION["user"]."</a>";
                                      if($_SESSION["type_user"]==1)
                                        echo "<p class='text-muted m-0'>Administrator</p>";
                                      else
                                        echo "<p class='text-muted m-0'>Empleado</p>";
                                    ?>
                                </div>
                            </div>
                            <!--- End User Detail box -->

                            <!-- Left Menu Start -->
                            <ul class="metisMenu nav" id="side-menu">
                               <li><a href="home.php"><i class="ti-home"></i> Dashboard </a></li>
                               <?php
                          if($_SESSION["type_user"]==1){
                             echo "
                            <li><a href='venta.php'><span class='label label-custom pull-right'></span> <i class='mdi mdi-cart-plus'></i> Realizar venta </a></li>
                             <li>
                                     <a href='javascript: void(0);' aria-expanded='true'><i class='mdi mdi-account'></i> Usuarios <span class='fa arrow'></span></a>
                                     <ul class='nav-second-level nav' aria-expanded='true'>
                                         <li><a href='alta-usuario.php'>Alta de usuario</a></li>
                                         <li><a href='modificacion-usuario.php'>Modificar usuario</a></li>
                                         <li><a href='baja-usuario.php'>Baja de usuario</a></li>
                                     </ul>
                                 </li>";
                             echo "<li>
                                     <a href='javascript: void(0);' aria-expanded='true'><i class='mdi mdi-dropbox'></i> Productos <span class='fa arrow'></span></a>
                                     <ul class='nav-second-level nav' aria-expanded='true'>
                                         <li><a href='alta-producto.php'>Alta de producto</a></li>
                                         <li><a href='modificacion-producto.php'>Modificar producto</a></li>
                                         <li><a href='baja-producto.php'>Baja de producto</a></li>
                                     </ul>
                                 </li>";
                             echo "<li><a href='reportes.php'><span class='label label-custom pull-right'></span> <i class='mdi mdi-content-paste'></i> Reportes </a></li>";
                             echo "<li><a href='corte-caja.php'><span class='label label-custom pull-right'></span> <i class='mdi mdi-cash-usd'></i> Corte de caja </a></li>";
                             echo "<li><a href='busquedas.php'><span class='label label-custom pull-right'></span> <i class='mdi mdi-magnify'></i> Búsquedas </a></li>";
                          }else{
                            echo "<li><a href='venta.php'><span class='label label-custom pull-right'></span> <i class='mdi mdi-cart-plus'></i> Realizar venta </a></li>";
                            echo "<li><a href='busquedas.php'><span class='label label-custom pull-right'></span> <i class='mdi mdi-magnify'></i> Búsquedas </a></li>";
                          }

                        ?>
                            </ul>

                        </div>
                    </div><!--Scrollbar wrapper-->
                </aside>
                <!--left navigation end-->

                <!-- START PAGE CONTENT -->
                <!-- START PAGE CONTENT -->
                <div id="page-right-content">

                    <div class="container">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="p-0 text-center">
                                    <div class="member-card">
                                        <div class="thumb-xl member-thumb m-b-10 center-block">
                                            <img src="img/user_icon.png" class="img-circle img-thumbnail" alt="profile-image">
                                            <i class="mdi mdi-star-circle member-star text-success" title="verified user"></i>
                                        </div>

                                        <div class="">
                                          <?php
                                          include "conexion.php";
                                          $sql2 = "SELECT * FROM usuario WHERE user='".$_SESSION["clave_user"]."' and deleted=0";
                                          $result2 = $conn->query($sql2);
                                          $user_info2 = $result2->fetch_assoc();
                                          echo "<h4 class='m-b-5'>".$user_info2["nombre"]." ".$user_info2["apellido_paterno"]." ".$user_info2["apellido_materno"]."</h4>";
                                          if($_SESSION["type_user"]==1) $_p= "Administrador"; else $_p ="Empleado";
                                          echo "  <p class='text-muted'>".$_p."</p>";
                                           ?>




                                        </div>

                                    </div>

                                </div> <!-- end card-box -->

                            </div> <!-- end col -->
                        </div> <!-- end row -->

                        <div class="m-t-30">
                            <ul class="nav nav-tabs tabs-bordered">
                                <li class="active">
                                    <a href="#home-b1" data-toggle="tab" aria-expanded="true">
                                        Perfil
                                    </a>
                                </li>
                                <li class="">
                                    <a href="#profile-b1" data-toggle="tab" aria-expanded="false">
                                        Configuración
                                    </a>
                                </li>
                            </ul>
                            <div class="tab-content">
                                <div class="tab-pane active" id="home-b1">
                                    <div class="row">
                                        <div class="col-md-4">
                                          <?php
                                          include "conexion.php";
                                          $sql = "SELECT * FROM usuario WHERE user='".$_SESSION["clave_user"]."' and deleted=0";
                                          $result = $conn->query($sql);
                                         $user_info = $result->fetch_assoc();
                                           if(isset($_POST["btn_save"])){
                                             include "update.php";
                                             $date = $_POST["fecha_nac"];
                                             $date=date("Y-m-d",strtotime($date));
                                             $vals = array(
                                               "'".$_POST["nombre"]."'",
                                               "'".$_POST["apellido_p"]."'",
                                               "'".$_POST["apellido_m"]."'",
                                               "'".$date."'",
                                               "'".$_POST["telefono"]."'",
                                               "'".$_POST["email"]."'",
                                               "'".$_POST["biografia"]."'",
                                               "'".$_POST["pass"]."'",
                                             );
                                             $cols = array(
                                               "nombre",
                                               "apellido_paterno",
                                               "apellido_materno",
                                               "fecha_nac",
                                               "telefono",
                                               "email",
                                               "biografia",
                                               "password",
                                             );
                                             $up = new Update("usuario", $vals, $cols, "user='".$user_info["user"]."'");
                                             if($up->ex()){
                                              echo "<script>document.location.href='perfil.php';</script>";
                                              echo "<div class='alert alert-success alert-dismissible fade in' role='alert'>
                                                                                  <button type='button' class='close' data-dismiss='alert'
                                                                                          aria-label='Close'>
                                                                                      <span aria-hidden='true'>&times;</span>
                                                                                  </button>
                                                                                  <strong>Felicidades!</strong> Datos actualizados.
                                                                              </div>";
                                             $_SESSION['infouser']=NULL;
                                             }else{
                                               echo "<div class='alert alert-danger alert-dismissible fade in' role='alert'>
                                                                                   <button type='button' class='close' data-dismiss='alert'
                                                                                           aria-label='Close'>
                                                                                       <span aria-hidden='true'>&times;</span>
                                                                                   </button>
                                                                                   <strong>Ups!</strong> Ocurrio un error al realizar la operación.
                                                                               </div><br><center>";
                                             }
                                           } ?>
                                            <div class="panel panel-default panel-fill">
                                                <div class="panel-heading">
                                                    <h3 class="panel-title">Información personal</h3>
                                                </div>
                                                <div class="panel-body">
                                                  <?php
                                                  include "conexion.php";
                                                  $sql2 = "SELECT * FROM usuario WHERE user='".$_SESSION["clave_user"]."' and deleted=0";
                                                  $result2 = $conn->query($sql2);
                                                  $user_info2 = $result2->fetch_assoc();

                                                  echo "<div class='m-b-20'>
                                                      <strong>Usuario</strong>
                                                      <br>
                                                      <p class='text-muted'>".$user_info2["user"]."</p>
                                                  </div>";
                                                  echo "<div class='m-b-20'>
                                                      <strong>Nombre completo</strong>
                                                      <br>
                                                      <p class='text-muted'>".$user_info2["nombre"]." ".$user_info2["apellido_paterno"]." ".$user_info2["apellido_materno"]."</p>
                                                  </div>";
                                                  echo "<div class='m-b-20'>
                                                      <strong>Télefono</strong>
                                                      <br>
                                                      <p class='text-muted'>".$user_info2["telefono"]."</p>
                                                  </div>";
                                                  echo "<div class='m-b-20'>
                                                      <strong>Fecha de nacimiento</strong>
                                                      <br>
                                                      <p class='text-muted'>".$user_info["fecha_nac"]."</p>
                                                  </div>";
                                                  echo "<div class='m-b-20'>
                                                      <strong>Email</strong>
                                                      <br>
                                                      <p class='text-muted'>".$user_info2["email"]."</p>
                                                  </div>";
                                                   ?>



                                                </div>
                                            </div>
                                            <!-- Personal-Information -->

                                            <!-- Social -->
                                            <div class="panel panel-default panel-fill">
                                                <div class="panel-heading">
                                                    <h3 class="panel-title">Social</h3>
                                                </div>
                                                <div class="panel-body">
                                                    <ul class="social-links list-inline m-b-0">
                                                        <li>
                                                            <a title="" data-placement="top" data-toggle="tooltip" class="tooltips" href="" data-original-title="Facebook"><i class="fa fa-facebook"></i></a>
                                                        </li>
                                                        <li>
                                                            <a title="" data-placement="top" data-toggle="tooltip" class="tooltips" href="" data-original-title="Twitter"><i class="fa fa-twitter"></i></a>
                                                        </li>
                                                        <li>
                                                            <a title="" data-placement="top" data-toggle="tooltip" class="tooltips" href="" data-original-title="Skype"><i class="fa fa-skype"></i></a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <!-- Social -->
                                        </div>


                                        <div class="col-md-8">
                                            <!-- Personal-Information -->
                                            <div class="panel panel-default panel-fill">
                                                <div class="panel-heading">
                                                    <h3 class="panel-title">Biografía</h3>
                                                </div>
                                                <div class='form-group'>
                                                    <label class='col-md-1 control-label'>Biografía</label>
                                                    <div>
                                                      <?php
                                                      include "conexion.php";
                                                      $sql2 = "SELECT * FROM usuario WHERE user='".$_SESSION["clave_user"]."' and deleted=0";
                                                      $result2 = $conn->query($sql2);
                                                      $user_info2 = $result2->fetch_assoc();
                                                      echo "<textarea class='summernote' rows='3' type='text' name='biografia' required=''>".$user_info2["biografia"]."</textarea>";
                                                      ?>

                                                    </div>
                                                 </div>
                                            </div>
                                            <!-- Personal-Information -->

                                        </div>

                                    </div>
                                </div>
                                <div class="tab-pane" id="profile-b1">
                                    <!-- Personal-Information -->
                                    <div class="panel panel-default panel-fill">
                                        <div class="panel-heading">

                                            <h3 class="panel-title">Editar perfil</h3>
                                        </div>
                                        <div class="panel-body">

                                            <form role='form' method="post">
                                              <?php
                                              include "conexion.php";
                                              $sql = "SELECT * FROM usuario WHERE user='".$_SESSION["clave_user"]."' and deleted=0";
                                              $result = $conn->query($sql);
                                              $user_info = $result->fetch_assoc();
                                              $date=date("m-d-Y",strtotime($user_info2["fecha_nac"]));
                                              echo "<div class='form-group'>
                                                        <label for='FullName'>Usuario</label>
                                                          <input type='text' id='FullName' disabled='disabled' class='form-control' value='".$user_info["user"]."'>
                                                    </div>";
                                              echo "<div class='form-group'>
                                                        <label for='FullName'>Nombre</label>
                                                          <input type='text' id='FullName' class='form-control' name='nombre' value='".$user_info["nombre"]."'>
                                                    </div>";
                                                    echo "<div class='form-group'>
                                                              <label for='FullName'>Apelido paterno</label>
                                                                <input type='text' id='FullName' class='form-control' name='apellido_p' value='".$user_info["apellido_paterno"]."'>
                                                          </div>";
                                                          echo "<div class='form-group'>
                                                                    <label for='FullName'>Apelido materno</label>
                                                                      <input type='text' id='FullName' class='form-control' name='apellido_m' value='".$user_info["apellido_materno"]."'>
                                                                </div>";
                                                                echo "<div class='form-group'>
                                                                          <label for='FullName'>Teléfono</label>
                                                                            <input type='text' id='FullName' class='form-control' name='telefono' value='".$user_info["telefono"]."'>
                                                                      </div>";
                                                                      echo "<div class='form-group'>
                                                                                <label for='FullName'>Email</label>
                                                                                  <input type='text' id='FullName' class='form-control' name='email' value='".$user_info["email"]."'>
                                                                            </div>";
                                                                            echo "<div class='form-group'>
                                                                            <label for='FullName'>Fecha de nacimiento</label>
                                                                            <input type='text' class='form-control' placeholder='mm/dd/yyyy' name='fecha_nac' id='datepicker' value='".$date."' name='fecha_nac' required=''>
                                                                            </div>";
                                                                            echo "<div class='form-group'>
                                                                                      <label for='FullName'>Contraseña</label>
                                                                                        <input type='text' id='FullName' class='form-control' name='pass' value='".$user_info["password"]."'>
                                                                                  </div>";

                                                                                echo "  <div class='form-group'>
                                                                                     <label>Biografía</label>
                                                                                        <textarea class='summernote' rows='5' type='text' name='biografia' required=''>".$user_info["biografia"]."</textarea>
                                                                                  </div>"


                                               ?>


                                                <center><input class="btn btn-primary waves-effect waves-light w-md" name="btn_save" type="submit" value="Guardar"></input></center>
                                            </form>

                                        </div>
                                    </div>
                                    <!-- Personal-Information -->
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end container -->

                    <div class="footer">
                       <div>
                          <strong>SuBodega Sistema de Administración</strong> - Copyright &copy; 2017
                       </div>
                    </div>

                </div>
                <!-- End #page-right-content -->

            </div>
            <!-- end .page-contentbar -->
        </div>
        <!-- End #page-wrapper -->



        <script src="assets/js/jquery-2.1.4.min.js"></script>
        <script src="assets/js/bootstrap.min.js"></script>
        <script src="assets/js/metisMenu.min.js"></script>
        <script src="assets/js/jquery.slimscroll.min.js"></script>
        <!-- js placed at the end of the document so the pages load faster -->
        <script src="assets/plugins/bootstrap-tagsinput/js/bootstrap-tagsinput.min.js"></script>
        <script src="assets/plugins/select2/js/select2.min.js" type="text/javascript"></script>
        <script src="assets/plugins/bootstrap-filestyle/js/bootstrap-filestyle.min.js" type="text/javascript"></script>
        <script src="assets/plugins/switchery/switchery.min.js"></script>
        <script type="text/javascript" src="assets/plugins/parsleyjs/parsley.min.js"></script>
        <script src="assets/plugins/moment/moment.js"></script>
        <script src="assets/plugins/timepicker/bootstrap-timepicker.js"></script>
        <script src="assets/plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js"></script>
        <script src="assets/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js"></script>
        <script src="assets/plugins/clockpicker/js/bootstrap-clockpicker.min.js"></script>
        <script src="assets/plugins/bootstrap-daterangepicker/daterangepicker.js"></script>
        <script src="assets/plugins/summernote/summernote.min.js"></script>

        <!-- form advanced init js -->
        <script src="assets/pages/jquery.form-advanced.init.js"></script>
        <!-- Dashboard init -->
        <script src="assets/pages/jquery.dashboard.js"></script>
        <!-- App Js -->
        <script src="assets/js/jquery.app.js"></script>
        <script type="text/javascript">
           $(document).ready(function() {
               $('.form-validation').parsley();
               $('.summernote').summernote({
                   height: 350,                 // set editor height
                   minHeight: null,             // set minimum height of editor
                   maxHeight: null,             // set maximum height of editor
                   focus: false                 // set focus to editable area after initializing summernote
               });
           });
        </script>

    </body>
</html>
