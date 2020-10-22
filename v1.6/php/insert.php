 <?php
$servername = "localhost:3306";
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

$id = "";
$marca = "";
$model = "";
$color = "";
$tipus = "";
$pes = "";
$quantitat = "";

if (isset ($_POST["id"])) $id = $_POST["id"];
if (isset ($_POST["marca"])) $marca = $_POST["marca"];
if (isset ($_POST["model"])) $model = $_POST["model"];
if (isset ($_POST["color"])) $color = $_POST["color"];
if (isset ($_POST["tipus"])) $tipus = $_POST["tipus"];
if (isset ($_POST["pes"])) $pes = $_POST["pes"];
if (isset ($_POST["quantitat"])) $quantitat = $_POST["quantitat"];

$sql = "INSERT INTO coches (id, marca, model, color, tipus, pes, quantitat) VALUES ( '$id', '$marca', '$model', '$color', '$tipus', '$pes', '$quantitat')";

if (mysqli_query($conn, $sql)) {
      echo "Article Guardat";
} else {
      echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}
mysqli_close($conn);
header("Location: ../index.php");
	exit;
?> 
