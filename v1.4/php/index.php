<!DOCTYPE html>
<html lang="ca">

<head>
    <meta charset="UTF-8">
    <title>Panell Principal - Gestió d'Inventari</title>
    <link rel="stylesheet" href="../css/styles.css" type="text/css">
    <link rel="icon" href="../media/icon.png" type="image/png" />
    <link href="/your-path-to-fontawesome/css/all.css" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
</head>

<body>
   <?php
    require('db2.php');
    // When form submitted, insert values into the database.
    if (isset($_REQUEST['codi_article'])) {
        // removes backslashes
        $codi_article = stripslashes($_REQUEST['codi_article']);
        //escapes special characters in a string
        $codi_article = mysqli_real_escape_string($con, $codi_article);
        $marca    = stripslashes($_REQUEST['marca']);
        $marca    = mysqli_real_escape_string($con, $marca);
        $color = stripslashes($_REQUEST['color']);
        $color = mysqli_real_escape_string($con, $color);
        $tipus = stripslashes($_REQUEST['tipus']);
        $tipus = mysqli_real_escape_string($con, $tipus);
        $pes = stripslashes($_REQUEST['pes']);
        $pes = mysqli_real_escape_string($con, $pes);
        $quantitat = stripslashes($_REQUEST['quantitat']);
        $quantitat = mysqli_real_escape_string($con, $quantitat);
        $create_datetime = date("Y-m-d H:i:s");
        $query    = "INSERT into `productes` (codi_article, marca, color, tipus, pes, quantitat, create_datetime)
                     VALUES ('$codi_article', '$marca', '$color', '$tipus', '$pes', '$quantitat', '$create_datetime')";
        $result   = mysqli_query($con, $query);
        if ($result) {
            echo "<div class='form'>
                  <h3>Article registrat correctament</h3><br/>
                  <p><a href='index.php'>Torna a l'inici</a></p>
                  </div>";
        } 
    } else {
?>
    <header>
        <span class="nom_user" style="font-size:24px;cursor:pointer"><i class="glyphicon glyphicon-user"></i>Usuari:</span>
        <span class="header-title">
            <h1><i style="color: #F8C253; font-size: 1.2em;" class="fas fa-box-open">&nbsp;</i>CONTROL D'ESTOCS</h1>
        </span>
        <span class="boto-menu" style="font-size:30px;cursor:pointer" onclick="openNav()">&#9776; MENU</span>
        <div id="mySidenav" class="sidenav">
            <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
            <img src="../media/logo.png" alt="Logotip" style="width: 87%;" /><br /><br />
            <a href="index.html"><i style="color: #fff; font-size: 1.2em;" class="fas fa-database">&nbsp;</i>INSERIR PRODUCTES</a>
            <a href="productes.html"><i style="color: #fff; font-size: 1.2em;" class="fas fa-search">&nbsp;</i>CONSULTAR PRODUCTES</a>
            <a href="./php/registre.php">REGISTRAR NOU USUARI</a>
        </div>
    </header>
    <div id="baner">
            <h2 id="titol">REGISTRAR ARTICLES</h2>
    </div>
    <section class="content">
        <br />
        <form action="" method="post" name="from1">
            <label for="fname">Codi article:</label><br>
            <input type="text" id="codi_article" name="codi_article" value=""><br />
            <label for="lname">Marca:</label><br />
            <input type="text" id="marca" name="marca" value=""><br />
            <label for="fname">Color:</label><br />
            <input type="text" id="color" name="color" value=""><br />
            <label for="lname">Tipus:</label><br />
            <input type="text" id="tipus" name="tipus" value=""><br />
            <label for="fname">Pes:</label><br />
            <input type="text" id="pes" name="pes" value=""><br />
            <label for="lname">Quantitat:</label><br />
            <input type="text" id="quantitat" name="quantitat" value=""><br /><br /><br />
            <input class="boto-form" type="submit" value="Registrar">
        </form>
<?php
    }
?>
    </section>

    <script src="https://kit.fontawesome.com/0414f73769.js" crossorigin="anonymous"></script>
    <script>
        function openNav() {
            document.getElementById("mySidenav").style.width = "250px";
        }

        function closeNav() {
            document.getElementById("mySidenav").style.width = "0";
        }

    </script>
</body>

</html>
