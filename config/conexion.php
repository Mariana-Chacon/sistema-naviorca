<?php 
$host="localhost";
$bd="sistema_gestion";
$usuario="root";
$contrasenia="";

try{
    $conexion=new PDO("mysql:host=$host;dbname=$bd", $usuario,$contrasenia);
    $conexion->exec("SET NAMES 'utf8'");
    
} catch(Exception $ex) {
  echo $ex->getMessage();
}

?>