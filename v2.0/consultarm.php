<!DOCTYPE html>
<html lang="ca">

<head>
    <meta charset="UTF-8">
    <title>Panell Principal - Gestió d'Inventari</title>
    <link rel="stylesheet" href="./css/styles.css" type="text/css">
    <link rel="icon" href="./media/icon.png" type="image/png" />
    <link href="/your-path-to-fontawesome/css/all.css" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.0/jquery.min.js"></script>
</head>

<body>
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
    <div id="baner">
        <h2 id="titol">CONSULTAR ARTICLES</h2>
    </div>
    <section class="content">
        <div id="btn">&nbsp;&nbsp;<a href="./consultar.php"><button class="ordena" onclick="location.reload();"><i class="fas fa-sync-alt">&nbsp;</i></button></a>
            <a href="./consultarm.php"><button class="ordena">Ordena marca</button></a>
            <a href="./consultart.php"><button class="ordena">Ordena tipus</button></a>
        </div>
        <table class="tprod">
            <tr>
                <th>CODI ARTICLE</th>
                <th>MARCA</th>
                <th>COLOR</th>
                <th>TIPUS</th>
                <th>PES</th>
                <th>QUANTITAT</th>
            </tr>
            <tbody>
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
    <script>
        function openNav() {
            document.getElementById("mySidenav").style.width = "250px";
        }

        function closeNav() {
            document.getElementById("mySidenav").style.width = "0";
        }

    </script>
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

    <script>
        function sortTable() {
            var table, rows, switching, i, x, y, shouldSwitch;
            table = document.getElementById("taula-productes");
            switching = true;
            /*Make a loop that will continue until
            no switching has been done:*/
            while (switching) {
                //start by saying: no switching is done:
                switching = false;
                rows = table.rows;
                /*Loop through all table rows (except the
                first, which contains table headers):*/
                for (i = 1; i < (rows.length - 1); i++) {
                    //start by saying there should be no switching:
                    shouldSwitch = false;
                    /*Get the two elements you want to compare,
                    one from current row and one from the next:*/
                    x = rows[i].getElementsByTagName("TD")[1];
                    y = rows[i + 1].getElementsByTagName("TD")[1];
                    //check if the two rows should switch place:
                    if (x.innerHTML.toLowerCase() > y.innerHTML.toLowerCase()) {
                        //if so, mark as a switch and break the loop:
                        shouldSwitch = true;
                        break;
                    }
                }
                if (shouldSwitch) {
                    /*If a switch has been marked, make the switch
                    and mark that a switch has been done:*/
                    rows[i].parentNode.insertBefore(rows[i + 1], rows[i]);
                    switching = true;
                }
            }
        }

    </script>

</body>

</html>
