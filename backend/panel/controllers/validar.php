<?php 
@session_start();

if (!isset ($_SESSION["id"]) || empty ($_SESSION["id"])) {
//no estoy validado
    header ("Location: /views/usuarios/login.php");
    exit(); //si la sesion esta validada, devuelve el login
}