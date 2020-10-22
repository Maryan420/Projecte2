 <?php
$servername = "localhost:";
$username = "root";
$password = "12112017";
$database = "inventari";

// Conecxio
$conn = new mysqli($servername, $username, $password, $database);

// Comprovació
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
echo "Connected successfully";

$sql = "INSERT INTO coches (id, marca, model, color, tipus, pes, quantitat) VALUES ('$id', '$marca', '$model', '$color', '$tipus', '$pes', '$quantitat')";
if (mysqli_query($conn, $sql)) {
      echo "Article Guardat";
} else {
      echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}
mysqli_close($conn);
?> 