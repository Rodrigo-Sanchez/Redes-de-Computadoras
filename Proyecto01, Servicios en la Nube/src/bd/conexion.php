<?php

	function conectarPSQL() {
		$host       = 'localhost';
		$port       = '3306'; // Puerto de mysql.
		//$port       = '5432'; // Puerto de postgres.
		$bd         = '';
		$usuario    = 'admin';
		$password   = '.H0la1234.';
		$conexionBD = mysqli_connect("host=$host port=$port dbname=$bd user=$usuario password=$password"); // Creamos la conexión a mysql.
		//$conexionBD = pg_connect("host=$host port=$port dbname=$bd user=$usuario password=$password"); // Creamos la conexión a mysql.
		if(!$conexionBD) {
			die('Ocurrió un problema en la conexión ' . pg_last_error());
		}
		echo "Connected successfully";
		return $conexionBD;
	}

	function queryPSQL($sql) {
		$conn = conectarPSQL();
		//$result = pg_query(
		$result = mysqli_query(
			$conn, $sql
		);
		if(!$result) {
			die('Ocurrió un error en la conexión ' . pg_last_error());
		}
		mysqli_close($conn); // Cerramos la conexión de mysql.
		//pg_close($conn); // Cerramos la conexión de postgres.
		return $result;
}
?>
