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
      <!-- DataTables -->
        <link href="assets/plugins/datatables/jquery.dataTables.min.css" rel="stylesheet" type="text/css"/>
        <link href="assets/plugins/datatables/buttons.bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <link href="assets/plugins/datatables/responsive.bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <link href="assets/plugins/datatables/scroller.bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <link href="assets/plugins/datatables/dataTables.colVis.css" rel="stylesheet" type="text/css"/>
        <link href="assets/plugins/datatables/dataTables.bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <link href="assets/plugins/datatables/fixedColumns.dataTables.min.css" rel="stylesheet" type="text/css"/>
        <!-- Summernote css -->
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
                        <li><a href="#">Sobre nosotros</a></li>
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
               </div>
               <!--Scrollbar wrapper-->
            </aside>
            <!--left navigation end-->
            <!-- START PAGE CONTENT -->
            <div id="page-right-content">
               <div class="container">
                  <h2>Búsquedas</h2>
                  <p class="text-muted font-13 m-b-30">
                      Ingrese a la sección a la cual desee buscar e ingrese el criterio de busqueda en el campo Search.
                  </p>

                                                <ul class="nav nav-tabs tabs-bordered nav-justified">
                                                    <li class="active">
                                                        <a href="#b-usuarios" data-toggle="tab" aria-expanded="false">
                                                            <span class="visible-xs"><i class="fa fa-home"></i></span>
                                                            <span class="hidden-xs">Busqueda de usuarios</span>
                                                        </a>
                                                    </li>
                                                    <li class="">
                                                        <a href="#b-productos" data-toggle="tab" aria-expanded="true">
                                                            <span class="visible-xs"><i class="fa fa-user"></i></span>
                                                            <span class="hidden-xs">Busqueda de productos</span>
                                                        </a>
                                                    </li>
                                                    <li class="">
                                                        <a href="#b-ventas" data-toggle="tab" aria-expanded="false">
                                                            <span class="visible-xs"><i class="fa fa-envelope-o"></i></span>
                                                            <span class="hidden-xs">Busqueda de ventas</span>
                                                        </a>
                                                    </li>
                                                </ul>
                                                <div class="tab-content">
                                                    <div class="tab-pane active" id="b-usuarios">
                                                      <div class="row p-t-50">
                                                                <div class="col-sm-12">
                                                                    <div class="m-b-20 table-responsive">
                                                                        <table id="datatable-responsive" class="table table-striped table-bordered">
                                                                            <thead>
                                                                            <tr>
                                                                                <th>Clave</th>
                                                                                <th>Nombre</th>
                                                                                <th>Apellido paterno</th>
                                                                                <th>Apellido materno</th>
                                                                                <th>Fecha de nacimiento</th>
                                                                                <th>Telefono</th>
                                                                                <th>Email</th>
                                                                                <th>Tipo de usuario</th>
                                                                            </tr>
                                                                            </thead>
                                                                            <tbody>
                                                                              <?php
                                                                              include "conexion.php";
                                                                              if ($conn->connect_error) {
                                                                                  die("Connection failed: " . $conn->connect_error);
                                                                              }else{
                                                                                  $sql = "SELECT * FROM usuario WHERE deleted=0";
                                                                                      $result = $conn->query($sql);
                                                                                      if($result->num_rows>0){
                                                                                        while($row = $result->fetch_assoc()){
                                                                                          echo "<tr>";
                                                                                          echo "<td>".$row["user"] ."</td>";
                                                                                          echo "<td>".$row["nombre"] ."</td>";
                                                                                          echo "<td>".$row["apellido_paterno"] ."</td>";
                                                                                          echo "<td>".$row["apellido_materno"] ."</td>";
                                                                                          echo "<td>".$row["fecha_nac"] ."</td>";
                                                                                          echo "<td>".$row["telefono"] ."</td>";
                                                                                          echo "<td>".$row["email"] ."</td>";
                                                                                          if($row["privilegios"]==1)
                                                                                             echo "<td>Administrador</td>";
                                                                                         else
                                                                                             echo "<td>Empleado</td>";
                                                                                      }
                                                                                    }
                                                                                      else{

                                                                                      }
                                                                              }
                                                                              $conn->close();
                                                                              ?>
                                                                            </tbody>
                                                                        </table>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                    </div>
                                                    <div class="tab-pane" id="b-productos">
                                                      <div class="row p-t-50">
                                                                <div class="col-sm-12">
                                                                    <div class="m-b-20 table-responsive">
                                                                        <table id="datatable-buttons" class="table table-striped table-bordered">
                                                                            <thead>
                                                                            <tr>
                                                                                <th>Clave</th>
                                                                                <th>Nombre</th>
                                                                                <th>Descripcion</th>
                                                                                <th>Precio</th>
                                                                                <th>Unidades en stock</th>
                                                                            </tr>
                                                                            </thead>
                                                                            <tbody>
                                                                              <?php
                                                                              include "conexion.php";
                                                                              if ($conn->connect_error) {
                                                                                  die("Connection failed: " . $conn->connect_error);
                                                                              }else{
                                                                                  $sql = "SELECT * FROM producto WHERE deleted=0";
                                                                                      $result = $conn->query($sql);
                                                                                      if($result->num_rows>0){
                                                                                        while($row = $result->fetch_assoc()){
                                                                                          echo "<tr>";
                                                                                          echo "<td>".$row["clave"] ."</td>";
                                                                                          echo "<td>".$row["nombre"] ."</td>";
                                                                                          echo "<td>".$row["descripcion"] ."</td>";
                                                                                          echo "<td>$ ".$row["precio"] ."</td>";
                                                                                          echo "<td>".$row["unidades_stock"] ."</td>";
                                                                                          echo "</tr>";
                                                                                      }
                                                                                    }
                                                                                      else{

                                                                                      }
                                                                              }
                                                                              $conn->close();
                                                                              ?>
                                                                            </tbody>
                                                                        </table>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                    </div>
                                                    <div class="tab-pane" id="b-ventas">
                                                      <div class="row p-t-50">
                                                                <div class="col-sm-12">
                                                                    <div class="m-b-20 table-responsive">
                                                                        <table id="datatable-colvid" class="table table-striped table-bordered">
                                                                            <thead>
                                                                            <tr>
                                                                                <th>Clave</th>
                                                                                <th>Fecha</th>
                                                                                <th>Total</th>
                                                                                <th>Pago con efectivo</th>
                                                                                <th>Pago con tarjeta</th>
                                                                                <th>Realizada por</th>
                                                                            </tr>
                                                                            </thead>
                                                                            <tbody>
                                                                              <?php
                                                                              include "conexion.php";
                                                                              if ($conn->connect_error) {
                                                                                  die("Connection failed: " . $conn->connect_error);
                                                                              }else{
                                                                                  $sql = "SELECT * FROM venta WHERE deleted=0";
                                                                                      $result = $conn->query($sql);
                                                                                      if($result->num_rows>0){
                                                                                        while($row = $result->fetch_assoc()){
                                                                                          echo "<tr>";
                                                                                          echo "<td>".$row["clave"] ."</td>";
                                                                                          echo "<td>".$row["fecha"] ."</td>";
                                                                                          echo "<td>$ ".$row["total"] ."</td>";
                                                                                          echo "<td>$ ".$row["pago_efectivo"] ."</td>";
                                                                                          echo "<td>$ ".$row["pago_tarjeta"] ."</td>";
                                                                                          echo "<td>".$row["clave_usuario"] ."</td>";
                                                                                      }
                                                                                    }
                                                                                      else{

                                                                                      }
                                                                              }
                                                                              $conn->close();
                                                                              ?>
                                                                            </tbody>
                                                                        </table>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                    </div>
                                                </div>





                             <!--datatable-colvid-->
               </div>


               <!-- end container -->
               <div class="footer">
                  <div>
                     <strong>SuBodega Sistema de Administración</strong> - Copyright &copy; 2017
                  </div>
               </div>
               <!-- end footer -->
            </div>
            <!-- End #page-right-content -->
         </div>
         <!-- end .page-contentbar -->
      </div>
      <!-- End #page-wrapper -->
      <!-- js placed at the end of the document so the pages load faster -->
       <script src="assets/js/jquery-2.1.4.min.js"></script>
       <script src="assets/js/bootstrap.min.js"></script>
       <script src="assets/js/metisMenu.min.js"></script>
       <script src="assets/js/jquery.slimscroll.min.js"></script>

       <!-- Datatable js -->
       <script src="assets/plugins/datatables/jquery.dataTables.min.js"></script>
       <script src="assets/plugins/datatables/dataTables.bootstrap.js"></script>
       <script src="assets/plugins/datatables/dataTables.buttons.min.js"></script>
       <script src="assets/plugins/datatables/buttons.bootstrap.min.js"></script>
       <script src="assets/plugins/datatables/jszip.min.js"></script>
       <script src="assets/plugins/datatables/pdfmake.min.js"></script>
       <script src="assets/plugins/datatables/vfs_fonts.js"></script>
       <script src="assets/plugins/datatables/buttons.html5.min.js"></script>
       <script src="assets/plugins/datatables/buttons.print.min.js"></script>
       <script src="assets/plugins/datatables/dataTables.keyTable.min.js"></script>
       <script src="assets/plugins/datatables/dataTables.responsive.min.js"></script>
       <script src="assets/plugins/datatables/responsive.bootstrap.min.js"></script>
       <script src="assets/plugins/datatables/dataTables.scroller.min.js"></script>
       <script src="assets/plugins/datatables/dataTables.colVis.js"></script>
       <script src="assets/plugins/datatables/dataTables.fixedColumns.min.js"></script>

       <!-- init -->
       <script src="assets/pages/jquery.datatables.init.js"></script>
      <!-- App Js -->
      <script src="assets/js/jquery.app.js"></script>

   </body>
</html>
