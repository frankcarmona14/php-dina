<?php

$host = "localhost";
$user = "root";
$pass = "";
$db = "autoguardado";
$conexion = new mysqli($host, $user, $pass, $db);

if ($conexion->connect_error)
    die("Conexión fallida" . $conexion->connect_error);

if (isset($_POST['register'])) {
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $celular = $_POST['celular'];
    $correo = $_POST['correo'];
    $contrasena = $_POST['contrasena'];

    $sql = "INSERT INTO usuarios (nombre, apellido, celular, correo, contrasena) VALUES (?, ?, ?, ?, ?)";
    $stmt = $conexion->prepare($sql);

    try {
        $stmt->execute([$nombre, $apellido, $celular, $correo, $contrasena]);
        echo "Registro exitoso. <a href='login.php'>Inicia sesión aquí</a>";
    } catch (PDOException $e) {
        if ($e->getCode() == 23000) {
            echo "El correo electrónico ya está en uso.";
        } else {
            throw $e;
        }
    }
}

if (isset($_POST['login'])) {
    session_start();
    $correo = $_POST['correo'];
    $contrasena = $_POST['contrasena'];

    $sql = $conexion->query("SELECT * FROM usuarios WHERE correo = '$correo' AND contrasena = '$contrasena'");

    if ($usuario = $sql->fetch_object()) {
        $_SESSION['user_id'] = $usuario->id;
        $_SESSION['nombre'] = $usuario->nombre;
        header('Location: bienvenida.php');
    } else {
        echo "Correo o contraseña incorrectos.";
    }
}

if (isset($_POST['formulario'])) {
    session_start();

    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $correo = $_POST['correo'];
    $edad = $_POST['edad'];
    $peso = $_POST['peso'];
    $talla = $_POST['talla'];
    $idUsuario = $_SESSION['user_id'];

    $sql = "INSERT INTO formularios (nombre, apellido, correo, edad, peso, talla, idusuario) VALUES (?, ?, ?, ?, ?, ?, ?)";
    $stmt = $conexion->prepare($sql);

    try {
        $stmt->execute([$nombre, $apellido, $correo, $edad, $peso, $talla, $idUsuario]);
        echo "Formulario enviado exitosamente.";
    } catch (PDOException $e) {
        throw $e;
    }
}
?>