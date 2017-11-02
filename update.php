<?php
class Update{
  private $tabla="";
  private $valores = array();
  private $columnas = array();
  private $query="";
  function __construct($t, $val, $col, $condition){
    $this->tabla = $t;
    $this->valores = $val;
    $this->columnas=$col;
    $this->query = $condition;
  }
  public function ex(){
    include "conexion.php";
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }else{
      $stmt = "UPDATE ".$this->tabla." SET ";
      $last = count($this->columnas);
      for($i= 0; $i<count($this->columnas);$i++){
        if($last-1==$i)
          $stmt = $stmt .$this->columnas[$i]." = ".$this->valores[$i];
        else
          $stmt = $stmt .$this->columnas[$i]." = ".$this->valores[$i].",";
      }

      $stmt=$stmt." WHERE ".$this->query;
      if($conn->query($stmt))
        return true;
      else
        return false;
    }

  }

  public function userExists($clave, $tabla){
    include "conexion.php";
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }else{
      if($tabla=="usuario")
        $stmt = "SELECT * FROM ". $tabla." WHERE user='".$clave."' and deleted=0";
      else
        $stmt = "SELECT * FROM ".$tabla." WHERE clave='".$clave."' and deleted=0";
      $result = $conn->query($stmt);
       if($result->num_rows > 0) {
         return $result;
     }else{
       return null;
     }
    }
  }



};

 ?>
