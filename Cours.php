<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="Cours_design.css">
    <title>Cours</title>
</head>
<body>
    <div class="side-menu">
        <div class="brand-menu">
            <h1>Menu</h1>
        </div>
        <ul>
            <li><img src="img/home.png" alt="">&nbsp;<a href="Menu.php"><span>Home</span></a> </li>
            <li><img src="img/professeurs.png" alt="">&nbsp;<a href="Professeurs.php"><span>Professeurs</span></a> </li>
            <li><img src="img/departement.png" alt="">&nbsp;<a href="Departement.php"><span>Departements</span> </a></li>
            <li><img src="img/cours.png" alt="">&nbsp;<a href="Cours.php"><span>Cours</span></a> </li>
            <li><img src="img/user.png" alt="">&nbsp;<a href="../Login/Login.html"><span>Logout</span></a> </li>

        </ul>
    </div>
    <div class="container">
        <div class="header">
            <div class="Title">
                <h1>Cours et Enseigner</h1>
            </div>
        </div>
        <div class="content">
            <div class="cours">
            <form action="" method="Post">
            <?php                            
                    $pdo = new PDO("mysql:host=localhost;dbname=gestion_professeurs","root","");
                    $stm =$pdo->query("SELECT * FROM cours");
                    $cour=$stm->fetchAll(PDO::FETCH_ASSOC);
                        echo '<table border="1" class="table">';
                        echo '
                            <tr class="tr">
                                <th class="th"><label>ID</label></th>
                                <th class="th"><label>intitule</label></th>
                                <th class="th"><label>Modifer</label></th>
                                <th class="th"><label>Supprimer</label></th>
                            </tr>';

                            foreach($cour as $p){
                                echo '<tr class="tr">
                                <td class="td">'.$p["id_cours"].'</td>
                                <td class="td">'.$p["intitule"].'</td>
                                <td class="td"> <a href="editer_cours.php?id='.$p["id_cours"].'"><img src="img/update.png" ></a></td>
                                <td class="td"> <a href="supprimer_cours.php?id='.$p["id_cours"].'"><img src="img/delete.png" ></a></td>
                                </tr class="td">';
                            }
                        echo '</table>';
            ?>
            </form>
            </div>
            <div class="button">
                <a href="Ajouter_cours.php"><img src="img/add.png" ></a>
            </div> 
            <div class="enseigner">
        <form action="" method="Post">
            <fieldset >
            <?php                            
                    $pdo = new PDO("mysql:host=localhost;dbname=gestion_professeurs","root","");
                            $stm =$pdo->query("SELECT * FROM enseigner");
                            $cour=$stm->fetchAll(PDO::FETCH_ASSOC);
                        echo '<table border="1" class="table1">';
                        echo '
                            <tr class="tr">
                                <th class="th"><label>PROF</label></th>
                                <th class="th"><label>COURS</label></th>
                                <th class="th"><label>Modifer</label></th>
                                <th class="th"><label>Supprimer</label></th>
                            </tr>';

                            foreach($cour as $p){
                                echo '<tr class="tr">
                                <td class="td">'.$p["id_prof"].'</td>
                                <td class="td">'.$p["id_cours"].'</td>
                                <td class="td"> <a href="editer_enseigner.php?id='.$p["id_cours"].'"><img src="img/update.png" ></a></td>
                                <td class="td"> <a href="supprimer_enseigner.php?id='.$p["id_cours"].'"><img src="img/delete.png" ></a></td>
                                </tr>';
                            }
                            echo '</table>';
            ?>
            </form>
        </div>
        <div class="button">
                            <a href="Ajouter_enseigner.php"><img src="img/add.png" ></a>
                            </div> 
        </div>
    </div>
</body>
</html>