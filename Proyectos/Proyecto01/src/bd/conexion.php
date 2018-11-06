<?php
	function conectarPSQL() {
		$servername = "localhost";
		$username   = "proyectouser";
		$password   = "awsserver";
		$dbname     = "proyectodb";

		// Create connection
		$conexionBD = mysqli_connect($servername, $username, $password, $dbname);
		// Check connection
		if(!$conn) {
			die("Connection failed: " . mysqli_connect_error());
		}
		return $conexionBD;
	}
	function queryPSQL($sql) {
		$conn = conectarPSQL();
		$result = mysqli_query($conn, $sql);
		if(!$result) {
			die('Ocurrio un error en la conexion ' . mysqli_connect_error());
		}
		mysqli_close($conn);
		return $result;
	}
?>

