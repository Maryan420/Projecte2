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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.0/jquery.min.js"></script>
</head>
<!--Dins del body tindre la nostra pagina web tot el entorn grafic i les linies de php.-->

<body>
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
            <h2 id="titol">CONSULTAR ARTICLES</h2>
        </div>
    </div>
    <!--Aqui ja començariem el contingut que ha de tindre la pagina web-->
    <section class="content">
       <!--Aqui tenim un buscador que filtre la taula de Productes-->
        <div class="input-group"> <span>Buscar:</span>
            <input id="entradafilter" type="text">
        </div>
        <!--Aqui tindrem els botons que ens ordenaran els articles-->
        <div id="btn">&nbsp;&nbsp;<a href="./consultar.php"><button class="ordena" onclick="location.reload();"><i class="fas fa-sync-alt">&nbsp;</i></button></a>
            <a href="./consultarm.php"><button class="ordena">Ordena marca</button></a>
            <a href="./consultart.php"><button class="ordena">Ordena tipus</button></a>
        </div>
        <!--Aqui tenim la taula amb els articles que es agafen de la base de dades-->
        <table class="tprod">
            <tr>
                <th>CODI ARTICLE</th>
                <th>MARCA</th>
                <th>COLOR</th>
                <th>TIPUS</th>
                <th>PES</th>
                <th>QUANTITAT</th>
            </tr>
            <tbody class="contenidobusqueda">
                <!--Aqui ens trobem amb el codi php que ens mostra el contingur de la taula Productes de la nostra base de dades-->
                <?php
                $conn = mysqli_connect("localhost", "root", "12112017", "Productes");
                if ($conn-> connect_error) {
                    die ("Connexió errònia:". $conn-> connect_error);
                }

                $sql = "SELECT codi_article, marca, color, tipus, pes, quantitat from productes ORDER BY marca ASC";
                $result = $conn-> query($sql);

                if ($result-> num_rows > 0) {
                    while ($row = $result-> fetch_assoc()){
                        echo "<tr><td>". $row["codi_article"] ."</td><td>". $row["marca"]."</td><td>". $row["color"]."</td><td>". $row["tipus"]."</td><td>". $row["pes"]."</td><td>". $row["quantitat"] ."</td></tr>";
                    }
                    echo "</table>";
                }
            else {
                echo "0 result";
            }
            $conn-> close();
            ?>
            </tbody>
        </table>
    </section>
    <script src="https://kit.fontawesome.com/0414f73769.js" crossorigin="anonymous"></script>
    <!--Aquestes linies de codi fan que el nostre menu sugui desplegable-->
    <script>
        function openNav() {
            document.getElementById("mySidenav").style.width = "250px";
        }

        function closeNav() {
            document.getElementById("mySidenav").style.width = "0";
        }

    </script>
    <!--Per acabar aquestes son les linies de php del boto de reload-->
    <script>
        const reloadtButton = document.querySelector("#reload");

        function reload() {
            reload = location.reload();
        }
        reloadtButton.addEventListener("click", reload, false);

    </script>
    <script>
        $(document).ready(function() {
            $('#entradafilter').keyup(function() {
                var rex = new RegExp($(this).val(), 'i');
                $('.contenidobusqueda tr').hide();
                $('.contenidobusqueda tr').filter(function() {
                    return rex.test($(this).text());
                }).show();

            })

        });

    </script>


</body>

</html>
