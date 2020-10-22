<!DOCTYPE html>
<html lang="ca">
<head>
    <meta charset="UTF-8">
    <title>Registre - Gestió d'Inventari</title>
    <link rel="stylesheet" href="../css/styles2.css" type="text/css">
    <link rel="icon" href="../media/icon.png" type="image/png" />
    <link href="/your-path-to-fontawesome/css/all.css" rel="stylesheet">
</head>
<body>
<?php
    require('db.php');
    // When form submitted, insert values into the database.
    if (isset($_REQUEST['username'])) {
        // removes backslashes
        $username = stripslashes($_REQUEST['username']);
        //escapes special characters in a string
        $username = mysqli_real_escape_string($con, $username);
        $email    = stripslashes($_REQUEST['email']);
        $email    = mysqli_real_escape_string($con, $email);
        $password = stripslashes($_REQUEST['password']);
        $password = mysqli_real_escape_string($con, $password);
        $create_datetime = date("Y-m-d H:i:s");
        $query    = "INSERT into `users` (username, password, email, create_datetime)
                     VALUES ('$username', '" . md5($password) . "', '$email', '$create_datetime')";
        $result   = mysqli_query($con, $query);
        if ($result) {
            echo "<div class='form'>
                  <h3>Estas registrat correctament.</h3><br/>
                  <p class='link'>Clica aqui per<a href='./login.php'>accedir</a></p>
                  </div>";
        } else {
            echo "<div class='form'>
                  <h3>Falten camps per omplir.</h3><br/>
                  <p class='link'>Clic aqui per <a href='registration.php'>registrar-te</a> de nou.</p>
                  </div>";
        }
    } else {
?>
    <form class="form" action="" method="post">
        <h1 class="login-title">Registre d'usuaris</h1>
        <input type="text" class="login-input" name="username" placeholder="Nom" required />
        <input type="text" class="login-input" name="email" placeholder="Email">
        <input type="password" class="login-input" name="password" placeholder="Contrasenya">
        <input type="submit" name="submit" value="Registra't" class="login-button">
        <p class="link"><a href="./login.html">Usuari registrat? Accedeix ara</a></p>
    </form>
<?php
    }
?>
</body>
</html>