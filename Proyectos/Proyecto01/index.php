<?php
    //require_once('src/bd/conexion.php');
    // No entra a este if, hasta que se clickea enviar.
    if(isset($_POST['inbutton'])) {
        $user = $_POST['name'];
        $cont = md5($_POST['pass']);
        $servername = "52.42.99.162";
        $username   = "proyectouser";
        $password   = "awsserver";
        $dbname     = "proyectodb";
    
        // Create connection
        $conn = mysqli_connect($servername, $username, $password, $dbname);
        // Check connection
        if(!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }
        $sql = "SELECT idUsuario, correo, password FROM Usuario WHERE correo = '$user' AND password = '$cont' LIMIT 1";
        $result = mysqli_query($conn, $sql);
        $usuario = mysqli_fetch_assoc($result);
        mysqli_close($conn);
        if(!empty($usuario)) {
            session_start();
            $_SESSION['name'] = $user;
            $_SESSION['pass'] = $cont;
            header('Location: src/session/home.php');
        }
    }

    // No entra a este if, hasta que se clickea enviar.
    if(isset($_POST['nextbutton'])) {
        $user = $_POST['regname'];
        $cont1 = md5($_POST['regpass']);
        $cont2 = md5($_POST['reregpass']);
        
        $servername = "52.42.99.162";
        $username   = "proyectouser";
        $password   = "awsserver";
        $dbname     = "proyectodb";
    
        // Create connection
        $conn = mysqli_connect($servername, $username, $password, $dbname);
        // Check connection
        if(!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }
        $sql = "SELECT idUsuario, correo, password FROM Usuario WHERE correo = '$user' LIMIT 1";
        $result = mysqli_query($conn, $sql);
        $usuario = mysqli_fetch_assoc($result);
        //mysqli_close($conn);
        //Checamos que no exista el registro en la tabla.
        if(empty($usuario)) {
            $query = "INSERT INTO Usuario (correo, password) VALUES ('$user', '$cont2')";
            mysqli_query($conn, $query);
        }
    }
    
    //--------------------------------Esta consulta funciona. :v
    /*$servername = "52.42.99.162";
    $username   = "proyectouser";
    $password   = "awsserver";
    $dbname     = "proyectodb";
    

	// Create connection
	$conn = mysqli_connect($servername, $username, $password, $dbname);
	// Check connection
	if(!$conn) {
		die("Connection failed: " . mysqli_connect_error());
	}
    $sql = "SELECT idUsuario, correo, password FROM Usuario";
	$result = mysqli_query($conn, $sql);

	if(mysqli_num_rows($result) > 0) {
		// output data of each row
		while($row = mysqli_fetch_assoc($result)) {
			echo "ID: " . $row["idUsuario"]. " - Correo: " . $row["correo"]. " Password: " . $row["password"]. "<br>";
		}
	} else {
		echo "0 results";
	}
    mysqli_close($conn);*/
    //--------------------------------Esta consulta funciona. :v
?>

<!DOCTYPE html>
<html lang="es">
    <head>
        <title>Redes de Computadoras</title>
        <meta charset="utf-8">
        <link rel='stylesheet' href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
        <link rel='stylesheet' href="https://fonts.googleapis.com/css?family=Roboto:400,100,300,500,700,900&subset=latin,latin-ext">
        <link rel="stylesheet" type="text/css" href="webroot/css/style.css" />
        <link rel="stylesheet" type="text/css" href="webroot/css/bootstrap.min.css" />
        <script type="text/javascript" src="webroot/js/jquery-3.3.1.min.js"></script>
        <script type="text/javascript" src="webroot/js/bootstrap.min.js"></script>
        <script type="text/javascript" src="webroot/js/index.js"></script>
    </head>
    <body>
        <div class="container" id="errors">
        </div>
        <div class="materialContainer">
            <form action="index.php" method="POST">
                <div class="box">
                    <div class="title">
                        Inicia Sesión
                    </div>
                    <div class="input">
                        <label for="name">
                            Usuario
                        </label>
                        <input type="text" name="name" id="name">
                        <span class="spin"></span>
                    </div>
                    <div class="input">
                        <label for="pass">
                            Contraseña
                        </label>
                        <input type="password" name="pass" id="pass">
                        <span class="spin"></span>
                    </div>
                    <div class="button login">
                        <button type="submit" id="inbutton" name="inbutton" value="Enviar" disabled>
                            <span>
                                ENTRAR
                            </span>
                            <i class="fa fa-check"></i>
                        </button>
                    </div>
                </div>
            </form>
            <form action="index.php" method="POST">
                <div class="overbox">
                    <div class="material-button alt-2">
                        <span class="shape"></span>
                    </div>
                    <div class="title">
                        Registro
                    </div>
                    <div class="input">
                        <label for="regname">
                            Usuario
                        </label>
                        <input type="text" name="regname" id="regname">
                        <span class="spin"></span>
                    </div>
                    <div class="input">
                        <label for="regpass">
                            Contraseña
                        </label>
                        <input type="password" name="regpass" id="regpass">
                        <span class="spin"></span>
                    </div>
                    <div class="input">
                        <label for="reregpass">
                            Repetir Contraseña
                        </label>
                        <input type="password" name="reregpass" id="reregpass">
                        <span class="spin"></span>
                    </div>
                    <div class="button">
                        <button type="submit" id="nextbutton" name="nextbutton" value="Siguiente" disabled>
                            <span>
                                SIGUIENTE
                            </span>
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </body>
</html>
