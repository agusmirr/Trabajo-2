<?php 

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


////////////////////////////require_once("../../../../includes/db.php");
?>


<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menú de Noticias</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            margin: 0;
            padding: 0;
        }

        header {
            background-color: #333;
            color: white;
            padding: 15px;
            text-align: center;
        }

        nav {
            background-color: #444;
            overflow: hidden;
        }

        nav ul {
            list-style-type: none;
            margin: 0;
            padding: 0;
            text-align: center;
        }

        nav ul li {
            display: inline;
            padding: 14px 20px;
        }

        nav ul li a {
            color: white;
            text-decoration: none;
            font-size: 18px;
        }

        nav ul li a:hover {
            background-color: #575757;
            border-radius: 5px;
        }

        .content {
            padding: 20px;
        }

        .news-section {
            margin-bottom: 20px;
            background-color: white;
            padding: 15px;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        .news-section h2 {
            margin-top: 0;
        }

        .news-section p {
            color: #555;
        }
    </style>
</head>
<body>

    <header>
        <h1>PAGINA PRINCIPAL</h1>
    </header>

    <nav>
        <ul>
            <li><a href="noticias.php">NOTICIAS</a></li>
            <li><a href="categorias.php">CATEGORIAS</a></li>
            <li><a href="usuarios.php">USUARIOS</a></li>
            <li><a href="cerrar.php">CERRAR SESION</a></li>
        </ul>
    </nav>

  <!-- <div class="content">
        <div class="news-section" id="Noticias">
            <h2>Noticias</h2>
            <p> Aca encontraras la informacion mas relevante y actualizada. Nuestro equipo trabaja para ofrecerte analisis profundos, exclusivos y los titulares mas importantes del dia.</p>
        </div>

        <div class="news-section" id="CATEGORIAS">
            <h2>Categorias</h2>
            <p>En este menu encontraras una seleccion organizada de nuestras diferentes secciones, diseñadas para ofrecerte una experiencia rapida y personalizada.</p>
        </div>

        <div class="news-section" id="USUARIOS">
            <h2>Usuarios</h2>
            <p>Te invitamos a explorar, descubrir nuevas posibilidades y sacar el maximo provecho de todo lo que ofrecemos.</p>
        </div>

        <div class="news-section" id="CERRAR SESION">
            <h2>Cerrar Sesion</h2>
            <p>Gracias por visitarnos, esperamos que hayas tenido una excelente experiencia.</p>
        </div>
    </div> --> 

</body>
</html>
    









</body>
</html>



