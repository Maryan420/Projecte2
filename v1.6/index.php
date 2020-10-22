<!DOCTYPE html>
<html lang="ca">

<head>
    <meta charset="UTF-8">
    <title>Panell Principal - Gestió d'Inventari</title>
    <link rel="stylesheet" href="./css/estil1.css" type="text/css">
    <link rel="icon" href="./media/icon.png" type="image/png" />
    <link href="/your-path-to-fontawesome/css/all.css" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
</head>

<body>
    <header>
        <span class="nom_user" style="font-size:24px;cursor:pointer"><i class="glyphicon glyphicon-user"></i>Usuari:</span>
        <span class="header-title">
            <h1><i style="color: #F8C253; font-size: 1.2em;" class="fas fa-box-open">&nbsp;</i>CONTROL D'ESTOCS</h1>
        </span>
        <span class="boto-menu" style="font-size:30px;cursor:pointer" onclick="openNav()">&#9776; MENU</span>
        <div id="mySidenav" class="sidenav">
            <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
            <img src="./media/logo.png" alt="Logotip" style="width: 87%;" /><br /><br />
            <a href="index.html"><i style="color: #fff; font-size: 1.2em;" class="fas fa-database">&nbsp;</i>INSERIR PRODUCTES</a>
            <a href="productes.html"><i style="color: #fff; font-size: 1.2em;" class="fas fa-search">&nbsp;</i>CONSULTAR PRODUCTES</a>
            <a href="/register.html">REGISTRAR NOU USUARI</a>
        </div>
    </header>
    <div id="baner">
            <h2 id="titol">REGISTRAR ARTICLES</h2>
    </div>
    <section class="content">
        <br />
        <form action="./php/insert.php" method="post" name="coches">
            <label for="id">Codi:</label><br />
            <input type="text" id="lname" name="id" value="<?php echo $id;?>"><br />
            <label for="marca">Marca:</label><br />
            <input type="text" id="lname" name="marca" value="<?php echo $marca;?>"><br />
            <label for="model">Model:</label><br />
            <input type="text" id="lname" name="model" value="<?php echo $model;?>"><br />
            <label for="color">Color:</label><br />
            <input type="text" id="fname" name="color" value="<?php echo $color;?>"><br />
            <label for="tipus">Tipus:</label><br />
            <input type="text" id="fname" name="tipus" value="<?php echo $tipus;?>"><br />
            <label for="pes">Pes:</label><br />
            <input type="number" min="300" max="10000" id="fname" name="pes" placeholder="Kg" value="<?php echo $pes;?>"><br />
            <label for="quantitat">Quantitat:</label><br />
            <input type="number" min="1" max="999999" id="lname" name="quantitat" value="<?php echo $quantitat;?>"><br /><br /><br />
            <input class="boto-form" type="submit" value="Registrar">
        </form>

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

