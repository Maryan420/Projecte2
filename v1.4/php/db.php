<?php
    $con = mysqli_connect("localhost","root","12112017","LoginSystem");
    if (mysqli_connect_errno()){
        echo "Error al connectar-se a MySQL: " . mysqli_connect_error();
    }
?>