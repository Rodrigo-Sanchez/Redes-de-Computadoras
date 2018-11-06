<?php
$servername = "127.0.0.1";
$username = "proyectouser";
$password = "awsserver";
$database = "proyectodb";

// Create connection
$conn = new mysqli($servername, $username, $password, $database);
// Check connection
if($conn->connect_error) {
    die("Conexión fallida por: .|.  " . $conn->connect_error);
}
echo "Conexión exitosa";

// Realizar una consulta SQL
$sql = "SELECT idUsuario, correo, password FROM Usuario";
$result = $conn->query($sql);

echo $sql;

if($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "id: " . $row["idUsuario"]. " - Name: " . $row["correo"]. " " . $row["password"]. "<br>";
    }
} else {
    echo "0 results";
}
$conn->close();
?>
