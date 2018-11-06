<?php 
    //require_once('../bd/conexion.php');
    session_start();
    $correo = $_SESSION['name'];
?>

<!DOCTYPE html>
<html lang="es">
    <head>
        <title>Redes de Computadoras</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- Link a los íconos de la página. -->
        <link rel='stylesheet' href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
        <!-- Link al tipo de fuente. -->
        <link rel='stylesheet' href="https://fonts.googleapis.com/css?family=Roboto:400,100,300,500,700,900&subset=latin,latin-ext">
        <!-- Link al estilo de la página. -->
        <link rel="stylesheet" type="text/css" href="../../webroot/css/style.css"/>
	    <!-- Link al estilo de la página home.php -->
        <link rel="stylesheet" type="text/css" href="../../webroot/css/home.css"/>
        <!-- Script de jQuery. -->
        <script type="text/javascript" src="../../webroot/js/jquery-3.3.1.min.js"></script>
        <!-- Script de Bootstrap. -->
        <script type="text/javascript" src="../../webroot/js/bootstrap.min.js"></script>
        <!-- Script al comportamiento de la página. -->
        <script type="text/javascript" src="../../webroot/js/index.js"></script>
    </head>
    <body>
        <div class="navbar">
            <a href="../../games/asteroids/index.html">Asteroids</a>
            <a href="../../games/circus/index.html">Circus</a>
            <a href="../../games/megaman/index.html">Megaman</a>
            <a href="../../games/pong/index.html">Pong</a>
        </div>
        <div class="materialContainer">
            <div class="box">
                <div class="title">
                    <header id="cabecera">
                    <?php //echo $_POST['enviar'];?>
                    <?php //echo print_r($_POST) . "<" . $correo .">";?>
                    <?php //echo $_SERVER["REQUEST_METHOD"];?>
                    <?php //print_r($_SESSION);?>
                        ¡Bienvenid@<?php function corta($mail){
                                                list($mail) = explode('@', $mail);
                                                echo $mail;
                                            }
                                            //corta($correo);?>!
                    <?php session_destroy();?>
                    </header>
                    <img id="imagen" src="" width="300">
                    <p id="descripcion">En la barra de navegación que aparece en la parte superior puedes escoger alguno de nuestros videojuegos del catálogo disponilbe.</p>
                </div>
            </div>
            <div class="overbox">
            </div>
        </div>
    </body>
</html>