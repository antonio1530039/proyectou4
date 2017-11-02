<?php
  session_start();
  include "conexion.php";
  if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
  }else{
    $stmt = "UPDATE usuario SET active=0 WHERE user='".$_SESSION["clave_user"]."'";
    $conn->query($stmt);
  }
  $conn->close();
  $_SESSION["login"]=0;
 ?>
