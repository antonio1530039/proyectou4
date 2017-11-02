<?php
class Delete{
  private $clave="";
  private $tabla="";
  function __construct($t, $c){
    $this->clave = $c;
    $this->tabla = $t;
  }
  public function ex(){
    include "conexion.php";
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }else{
      if($this->tabla == "usuario")
        $stmt = "UPDATE usuario SET deleted=1 WHERE user='".$this->clave."'";
      else
        $stmt = "UPDATE producto SET deleted=1 WHERE clave='".$this->clave."'";
      if($conn->query($stmt))
        return true;
      else
        return false;
    }

  }



};

 ?>
