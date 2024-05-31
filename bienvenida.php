<?php session_start(); ?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bienvenida</title>
    <link rel="stylesheet" href="stylesbienvenida.css">
</head>
<body>
    <header>
        <nav>
            <ul>
                <li><a href="formulario.php">Formulario</a></li>
            </ul>
        </nav>
        <a href="logout.php"><button id="logout">Cerrar Sesión</button></a>
    </header>
    <div class="welcome-container">
        <h1>Bienvenido, <?php echo $_SESSION['nombre']; ?>!</h1>
    </div>
</body>
</html>