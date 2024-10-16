<?php 

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once("../backend/panel/includes/db.php");


if (isset($_GET['operacion']) && $_GET['operacion'] == 'DELETE' && isset($_GET['id'])) {
    $id = $_GET['id'];
    $stmt = $conx->prepare("DELETE FROM noticias WHERE id = ?");
    $stmt->bind_param('i', $id);
    $stmt->execute();
    header('Location: noticias.php'); // Redirigir después de la eliminación
}

// Para mostrar todos los usuarios
$stmt = $conx->prepare("SELECT * FROM usuarios");
$stmt -> execute();
$resultado = $stmt -> get_result();
?>


<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestión de Noticias</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f9;
            color: #333;
            margin: 0;
            padding: 20px;
        }

        h1 {
            text-align: center;
            color: #333;
        }

        .container {
            max-width: 800px;
            margin: 0 auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .boton-crear {
            display: inline-block;
            padding: 10px 20px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 4px;
            text-decoration: none;
            margin-bottom: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        table th, table td {
            padding: 10px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        .boton {
            background-color: #2196F3;
            color: white;
            padding: 6px 12px;
            border: none;
            border-radius: 4px;
            text-decoration: none;
        }

        .boton.eliminar {
            background-color: #f44336;
        }

        .boton:hover {
            background-color: #555;
        }
    </style>
</head>


<body>
    <div class="container">
        <h1>Noticias</h1>
        <a href="formulario_noticias.php" class="boton-crear">Crear Nueva Noticia</a>

        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Título</th>
                    <th>Contenido</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($fila = $resultado->fetch_object()) { ?>
                    <tr>
                        <td><?php echo $fila->id; ?></td>
                        <td><?php echo $fila->titulo; ?></td>
                        <td><?php echo substr($fila->contenido, 0, 50) . "..."; ?></td>
                        <td>

                        
                            <a href="formulario_noticias.php?id=<?php echo $fila->id; ?>" class="boton">Editar</a> <br>
                            <a href="noticias.php?operacion=DELETE&id=<?php echo $fila->id; ?>" class="boton eliminar">Eliminar</a>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</body>
</html>

<?php
require_once("../backend/panel/includes/db.php");

$noticia = null;

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $stmt = $conx->prepare("SELECT * FROM noticias WHERE id = ?");
    $stmt->bind_param('i', $id);
    $stmt->execute();
    $resultado = $stmt->get_result();
    $noticia = $resultado->fetch_object();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $titulo = $_POST['titulo'];
    $contenido = $_POST['contenido'];

    if (isset($_POST['id'])) {
        // Editar noticia existente
        $id = $_POST['id'];
        $stmt = $conx->prepare("UPDATE noticias SET titulo = ?, contenido = ? WHERE id = ?");
        $stmt->bind_param('ssi', $titulo, $contenido, $id);
    } else {
        // Crear nueva noticia
        $stmt = $conx->prepare("INSERT INTO noticias (titulo, contenido) VALUES (?, ?)");
        $stmt->bind_param('ss', $titulo, $contenido);
    }
    $stmt->execute();
    header('Location: noticias.php'); // Redirigir después de guardar
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo isset($_GET['id']) ? "Editar Noticia" : "Crear Noticia"; ?></title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f9;
            color: #333;
            margin: 0;
            padding: 20px;
        }

        h1 {
            text-align: center;
            color: #333;
        }

        form {
            max-width: 600px;
            margin: 0 auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        label {
            display: block;
            margin-bottom: 8px;
            font-weight: bold;
        }

        input[type="text"], textarea {
            width: 100%;
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        button {
            background-color: #4CAF50;
            color: white;
            padding: 15px;
            border: none;
            border-radius: 9px;
            cursor: pointer;
        }

        button:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>

    <h1><?php echo isset($_GET['id']) ? "Editar Noticia" : "Crear Noticia"; ?></h1>

    <form action="noticias.php" method="POST">
        <input type="hidden" name="id" value="<?php echo isset($noticia->id) ? $noticia->id : ''; ?>">

        <label for="titulo">NOTICIAAAAAAAAAA</label>
        <input type="text" id="titulo" name="titulo" value="<?php echo isset($noticia->titulo) ? $noticia->titulo : 'HOLAAAA NOTICIA 1 '; ?>" required>

        <label for="contenido">Contenido</label>
        <textarea id="contenido" name="contenido" rows="5" required><?php echo isset($noticia->contenido) ? $noticia->contenido : 'SAFKJASKJAS'; ?></textarea>

        <label for="acciones">EDITAR-BORRAR</label>
        <button type="submit"><?php echo isset($_GET['id']) ? "Actualizar Noticia" : "Crear Noticia"; ?></button>
    </form>

</body>
</html>
