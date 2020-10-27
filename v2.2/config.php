<!--Defenim els criteris de conexio amb la base de dades-->
<?php
   define('DB_SERVER', 'localhost:3036');
   define('DB_USERNAME', 'root');
   define('DB_PASSWORD', '12112017');
   define('DB_DATABASE', 'LoginSystem');
   $db = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);
?>