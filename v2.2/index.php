<!DOCTYPE html>
<html lang="ca">
<!--En la part del head anira tota la informació adicional de la nostra pagina web.-->
<head>
    <meta charset="UTF-8">
    <title>Panell Principal - Gestió d'Inventari</title>
    <link rel="stylesheet" href="./css/styles.css" type="text/css">
    <link rel="icon" href="./media/icon.png" type="image/png" />
    <link href="/your-path-to-fontawesome/css/all.css" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
</head>
<!--Dins del body tindre la nostra pagina web tot el entorn grafic i les linies de php.-->
<body>
<!--Aquestes linies fan la finciona de recolir les dades del formulari i inserirles en la base de dades i mostra si el article es ha guardat corectament o no.-->
    <?php
    require('db2.php');
    
    if (isset($_REQUEST['codi_article'])) {
        $codi_article = stripslashes($_REQUEST['codi_article']);
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
            echo "<div class='corecte'>
                  <h3>Article registrat correctament</h3><br/>
                  <a href='index.php'>Torna a l'inici</a>
                  </div>";
        } 
    } else {
?>
<!--En aquestes linies podem trobar la capçelera de la nostra pagina web amb el logo, menu, etc...-->
    <div class="foto">
        <header>
            <span class="header-title">
                <h1><i style="color: #F8C253; font-size: 1.2em;" class="fas fa-box-open">&nbsp;</i>CONTROL D'ESTOCS</h1>
            </span>
            <span class="boto-menu" style="font-size:30px;cursor:pointer" onclick="openNav()">&#9776; MENU</span>
            <div id="mySidenav" class="sidenav">
                <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
                <img src="./media/logo.png" alt="Logotip" style="width: 87%;" /><br /><br />
                <a href="index.php"><i style="color: #fff; font-size: 1.2em;" class="fas fa-database">&nbsp;</i>INSERIR PRODUCTES</a>
                <a href="consultar.php"><i style="color: #fff; font-size: 1.2em;" class="fas fa-search">&nbsp;</i>CONSULTAR PRODUCTES</a>
            </div>
        </header>
<!--Aqui tenim el titol de la seguent pagina web-->
        <div id="baner">
            <h2 id="titol">REGISTRAR ARTICLES</h2>
        </div>
    </div>
<!--Aqui ja començariem el contingut que ha de tindre la pagina web-->
    <section class="content">
        <br />
<!--En aquesta pagina ens trobem amb un formulari de registra de articles-->
        <form class="eform" action="index.php" method="post" name="from1">
            <label for="codi_article">Codi article:</label><br>
            <input type="text" id="codi_article" name="codi_article"><br />
            <label for="marca">Marca:</label><br />
            <input type="text" id="marca" name="marca"><br />
            <label for="color">Color:</label><br />
            <input type="text" id="color" name="color"><br />
            <label for="tipus">Tipus:</label><br />
            <input type="text" id="tipus" name="tipus"><br />
            <label for="pes">Pes:</label><br />
            <input type="text" id="pes" name="pes"><br />
            <label for="quantitat">Quantitat:</label><br />
            <input type="text" id="quantitat" name="quantitat"><br /><br /><br />
            <input class="boto-form" id="botofrom" type="submit" value="Registrar">
        </form>
        <?php
    }
?>
    </section>
<!--I  per acabar aquestes linies de codi fan que el nostre menu sugui desplegable-->
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
