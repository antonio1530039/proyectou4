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
                                  <li><a href="perfil.php" ><i class="mdi mdi-account"></i> Ver mi perfil</a></li>
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
                <div id="page-right-content">

                    <div class="container">
                        <div class="row">
							<div class="col-sm-12">
								<div class="card-box widget-inline">
									<div class="row">
                      <center><h1>Dashboard</h1></center>
                      <center><h4><?php $date= date("d-m-Y"); echo "Hoy es ".$date; ?></h4></center><br>
										<div class="col-lg-3 col-sm-6">
											<div class="widget-inline-box text-center">
                        <?php
                          include "conexion.php";
                          if ($conn->connect_error) {
                              die("Connection failed: " . $conn->connect_error);
                          }else{
                              $date = date('Y-m-d', time());
                              $sql = "SELECT * FROM venta WHERE fecha = '".$date."'";
                                  $result = $conn->query($sql);
                                    if($result->num_rows > 0)
                                      echo "<h3 class='m-t-10'><i class='text-info mdi mdi-cart-plus'></i> <b data-plugin='counterup'>".$result->num_rows."</b></h3";
                                    else
                                      echo "<h3 class='m-t-10'><i class='text-info mdi mdi-cart-plus'></i> <b data-plugin='counterup'>0</b></h3>";
                          }
                          $conn->close();
                        ?>
												<p class="text-muted">Ventas el día de hoy</p>
											</div>
										</div>

										<div class="col-lg-3 col-sm-6">
											<div class="widget-inline-box text-center">
                        <?php
                          include "conexion.php";
                          if ($conn->connect_error) {
                              die("Connection failed: " . $conn->connect_error);
                          }else{
                              $date = date('Y-m-d', time());
                              $sql = "SELECT SUM(total) FROM venta WHERE fecha = '".$date."'";
                                  $result = $conn->query($sql);
                                  $incomes = mysqli_fetch_assoc($result);
                                    if($incomes["SUM(total)"] != NULL)
                                      echo "<h3 class='m-t-10'><i class='text-info mdi mdi-cash-usd'></i> <b data-plugin='counterup'>$ ".$incomes["SUM(total)"]."</b></h3";
                                    else
                                      echo "<h3 class='m-t-10'><i class='text-info mdi mdi-cash-usd'></i> <b data-plugin='counterup'>0</b></h3>";
                          }
                          $conn->close();
                        ?>
												<p class="text-muted">Ingresos el día de hoy</p>
											</div>
										</div>

										<div class="col-lg-3 col-sm-6">
											<div class="widget-inline-box text-center">
                        <?php
                          include "conexion.php";
                          if ($conn->connect_error) {
                              die("Connection failed: " . $conn->connect_error);
                          }else{
                              $sql = "SELECT * FROM usuario WHERE active=1";
                                  $result = $conn->query($sql);
                                    if($result->num_rows > 0)
                                      echo "<h3 class='m-t-10'><i class='text-info mdi mdi-account-multiple'></i> <b data-plugin='counterup'>".$result->num_rows."</b></h3";
                                    else
                                      echo "<h3 class='m-t-10'><i class='text-info mdi mdi-account-multiple'></i> <b data-plugin='counterup'>0</b></h3>";
                          }
                          $conn->close();
                        ?>
												<p class="text-muted">Usuarios en línea</p>
											</div>
										</div>

										<div class="col-lg-3 col-sm-6">
											<div class="widget-inline-box text-center b-0">
                        <?php
                          include "conexion.php";
                          if ($conn->connect_error) {
                              die("Connection failed: " . $conn->connect_error);
                          }else{
                              $date = date('Y-m-d', time());
                              $sql = "SELECT * FROM venta WHERE fecha = '".$date."' and clave_usuario='".$_SESSION["clave_user"]."'";
                                  $result = $conn->query($sql);
                                    if($result->num_rows > 0)
                                      echo "<h3 class='m-t-10'><i class='text-info mdi mdi-cart-plus'></i> <b data-plugin='counterup'>".$result->num_rows."</b></h3";
                                    else
                                      echo "<h3 class='m-t-10'><i class='text-info mdi mdi-cart-plus'></i> <b data-plugin='counterup'>0</b></h3>";
                          }
                          $conn->close();
                        ?>
												<p class="text-muted">Tus ventas realizadas hoy</p>
											</div>
										</div>

									</div>
								</div>
							</div>
						</div>
                        <!--end row -->


                        <div class="row">
                            <div class="col-lg-6">
                                <div class="card-box">
                                    <h4 class="m-t-0">Total Revenue</h4>
                                    <div class="text-center">
                                        <ul class="list-inline chart-detail-list">
                                            <li>
                                                <h5 class="font-normal"><i class="fa fa-circle m-r-10 text-primary"></i>Series A</h5>
                                            </li>
                                            <li>
                                                <h5 class="font-normal"><i class="fa fa-circle m-r-10 text-muted"></i>Series B</h5>
                                            </li>
                                        </ul>
                                    </div>
                                    <div id="dashboard-bar-stacked" style="height: 300px;"></div>
                                </div>
                            </div> <!-- end col -->

                            <div class="col-lg-6">
                                <div class="card-box">
                                    <h4 class="m-t-0">Sales Analytics</h4>
                                    <div class="text-center">
                                        <ul class="list-inline chart-detail-list">
                                            <li>
                                                <h5 class="font-normal"><i class="fa fa-circle m-r-10 text-primary"></i>Mobiles</h5>
                                            </li>
                                            <li>
                                                <h5 class="font-normal"><i class="fa fa-circle m-r-10 text-info"></i>Tablets</h5>
                                            </li>
                                        </ul>
                                    </div>
                                    <div id="dashboard-line-chart" style="height: 300px;"></div>
                                </div>
                            </div> <!-- end col -->
                        </div> <!-- end row -->


                        <div class="row">
                            <div class="col-sm-12">
                                <div class="card-box">
                                    <h4 class="m-t-0">Contactos</h4>
                                    <div class="table-responsive">
                                        <table class="table table-hover mails m-0 table table-actions-bar">
                                            <thead>
                                                <tr>
                                                    <th style="min-width: 95px;">
                                                        <div class="checkbox checkbox-primary checkbox-single m-r-15">
                                                            <input id="action-checkbox" type="checkbox">
                                                            <label for="action-checkbox"></label>
                                                        </div>
                                                    </th>
                                                    <th>Nombre</th>
                                                    <th>Apellido Paterno</th>
                                                    <th>Apellido Materno</th>
                                                    <th>Sexo</th>
                                                    <th>Telefono</th>
                                                    <th>Email</th>
                                                    <th>Tipo</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
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
                                                                echo "<td>
                                                                <div class='checkbox checkbox-primary m-r-15'>
                                                                    <input id='checkbox2' type='checkbox'>
                                                                    <label for='checkbox2'></label>
                                                                </div>

                                                                <img src='img/user_icon.png' class='img-circle thumb-sm' />
                                                            </td>";
                                                                echo "<td>".$row["nombre"] ."</td>";
                                                                echo "<td>".$row["apellido_paterno"] ."</td>";
                                                                echo "<td>".$row["apellido_materno"] ."</td>";
                                                                echo "<td>".$row["sexo"] ."</td>";
                                                                echo "<td>".$row["telefono"] ."</td>";
                                                                echo "<td>".$row["email"] ."</td>";
                                                                if($row["privilegios"]==1)
                                                                  echo "<td>Administrador</td>";
                                                                else
                                                                  echo "<td>Empleado</td>";
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



        <!-- js placed at the end of the document so the pages load faster -->
        <script src="assets/js/jquery-2.1.4.min.js"></script>
        <script src="assets/js/bootstrap.min.js"></script>
        <script src="assets/js/metisMenu.min.js"></script>
        <script src="assets/js/jquery.slimscroll.min.js"></script>

        <!--Morris Chart-->
		<script src="assets/plugins/morris/morris.min.js"></script>
		<script src="assets/plugins/raphael/raphael-min.js"></script>

        <!-- Dashboard init -->
		<script src="assets/pages/jquery.dashboard.js"></script>

        <!-- App Js -->
        <script src="assets/js/jquery.app.js"></script>

    </body>
</html>
