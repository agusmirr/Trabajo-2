<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once("../../includes/db.php");
  echo "PEPEEEEEEEEE";

@session_start();


$email= isset($_POST["email"]) ? $_POST["email"] : "";
$password = isset($_POST["password"]) ? $_POST["password"] : "";


if (!empty($email) && !empty($password)) {
    $stmt = $conx->prepare("SELECT * FROM usuarios WHERE email = ? and password = ? ");  
    $stmt->bind_param("ss", $email,$password);
    $stmt->execute();
    $resultado = $stmt->get_result();
    $stmt->close();
    $usuario = $resultado->fetch_object();
    

    

    if ($usuario === NULL){
        echo "Usuario o contraseña incorrecta <br>";
    } else {
        $_SESSION["id"] = $usuario->id;
        header("Location: index.php");
        exit();
    }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .boton-ingresar {
            background-color: #90ee90;
        }
    </style>

</head>
<body>
    
</body>
</html>

<form method="POST">
    <label for="email">Email</label>
    <input type="email" name="email" placeholder="Ingrese su email" required>
    <label for="password">Password</label>
    <input type="password" name="password" placeholder="Password" required>

    <button  type="sudmit">INGRESAR</button>

</form>