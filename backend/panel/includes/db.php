<?php 
$servidor = "test-mysql";
$user = "root";
$password = "password" ;
$database = "mi_base_programacion";

$conx = new mysqli($servidor,$user,$password,$database);

if ($conx->connect_error) {
    echo "error:".$conx->connect_error;
}

?>
