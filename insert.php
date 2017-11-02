<?php
class Insert{
  private $tabla="";
  private $valores = array();
  private $columnas = array();
  function __construct($t, $val, $col){
    $this->tabla = $t;
    $this->valores = $val;
    $this->columnas=$col;
  }
  public function ex(){
    include "conexion.php";
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }else{
      $stmt = "INSERT INTO ".$this->tabla." (";
      $last = count($this->columnas);
      $cont=0;
      foreach($this->columnas as $col){
        if($last-1==$cont)
          $stmt = $stmt .$col;
        else
          $stmt = $stmt .$col.",";
        $cont++;
      }
      $stmt = $stmt.") VALUES (";
      $last = count($this->valores);
      $cont = 0;
      foreach($this->valores as $val){
        if($last-1==$cont)
          $stmt=$stmt.$val;
        else
          $stmt=$stmt.$val.",";
        $cont++;
      }
      $stmt=$stmt.")";
      if($conn->query($stmt))
        return true;
      else
        return false;
    }

  }



};

 ?>
