<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="MenuDesign.css">
    <title>Menu</title>
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
                <h1>HOME</h1>
            </div>
        </div>
        <div class="content">
            <div class="cards">
                <div class="card">
                    <div class="box">
                    <div class="title">
                         <h2>Cours</h2>
                     </div>
                    <?php $sql = "SELECT * FROM cours";
                        try{
                        $pdo = new PDO("mysql:host=localhost;dbname=gestion_professeurs","root","");
                        $stmt = $pdo->query($sql);
                        if($stmt === false){
                            die("Erreur");
                        }
                        }catch (PDOException $e){
                            echo $e->getMessage();}
                    ?>
                        <table>
                        <tr>
                             <th>ID</th>
                             <th>Intitule</th>
                        </tr>
                        <?php while($row = $stmt->fetch(PDO::FETCH_ASSOC)) : ?>
                        <tr>
                        <td><?php echo htmlspecialchars($row['id_cours']); ?></td>
                        <td><?php echo htmlspecialchars($row['intitule']); ?></td>
                        </tr>
                        <?php endwhile; ?>
                        </table>
                    </div>
                </div>
                <div class="card">
                    <div class="box">
                    <div class="title">
                         <h2>Enseigner</h2>
                     </div>
                    <?php $sql = "SELECT * FROM enseigner";
                        try{
                        $pdo = new PDO("mysql:host=localhost;dbname=gestion_professeurs","root","");
                        $stmt = $pdo->query($sql);
                        if($stmt === false){
                            die("Erreur");
                        }
                        }catch (PDOException $e){
                            echo $e->getMessage();}
                    ?>
                        <table>
                        <tr>
                             <th>PROF</th>
                             <th>COURS</th>
                        </tr>
                        <?php while($row = $stmt->fetch(PDO::FETCH_ASSOC)) : ?>
                        <tr>
                        <td><?php echo htmlspecialchars($row['id_prof']); ?></td>
                        <td><?php echo htmlspecialchars($row['id_cours']); ?></td>
                        </tr>
                        <?php endwhile; ?>
                        </table>
                    </div>
                </div>
                <div class="card">
                    <div class="box">
                    <div class="title">
                         <h2>Departement</h2>
                     </div>
                    <?php $sql = "SELECT * FROM departement";
                        try{
                        $pdo = new PDO("mysql:host=localhost;dbname=gestion_professeurs","root","");
                        $stmt = $pdo->query($sql);
                        if($stmt === false){
                            die("Erreur");
                        }
                        }catch (PDOException $e){
                            echo $e->getMessage();}
                    ?>
                        <table>
                        <tr>
                            <th>ID</th>
                            <th>Nom departement</th>
                        </tr>
                        <?php while($row = $stmt->fetch(PDO::FETCH_ASSOC)) : ?>
                        <tr>
                        <td><?php echo htmlspecialchars($row['id_departement']); ?></td>
                        <td><?php echo htmlspecialchars($row['nom_depart']); ?></td>
                        </tr>
                        <?php endwhile; ?>
                        </table>
                    </div>
                </div>
            </div>
            <div class="content-2">
                 <div class="professeur">
                     <div class="title">
                         <h2>Professeurs</h2>
                     </div>
                     <?php $sql = "SELECT * FROM professeurs";
                        try{
                            $pdo = new PDO("mysql:host=localhost;dbname=gestion_professeurs","root","");
                            $stmt = $pdo->query($sql);
                            if($stmt === false){
                            die("Erreur");
                        }
                        }catch (PDOException $e){
                        echo $e->getMessage();}
                    ?>
                    <table id="table" >
                        <thead>
                            <tr>
                                <th><label>ID</label></th>
                                <th><label>Nom</label></th>
                                <th><label>Prenom</label></th>
                                <th><label>CIN</label></th>
                                <th><label>Adresse</label></th>
                                <th><label>Telephone</label></th>
                                <th><label>Email</label></th>
                                <th><label>Date Recrutement</label></th>
                                <th><label>ID Departement</label></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php while($row = $stmt->fetch(PDO::FETCH_ASSOC)) : ?>
                                <tr>
                                <td><?php echo htmlspecialchars($row['id_prof']); ?></td>
                                <td><?php echo htmlspecialchars($row['nom']); ?></td>
                                <td><?php echo htmlspecialchars($row['prenom']); ?></td>
                                <td><?php echo htmlspecialchars($row['cin']); ?></td>
                                <td><?php echo htmlspecialchars($row['adresse']); ?></td>
                                <td><?php echo htmlspecialchars($row['telephone']); ?></td>
                                <td><?php echo htmlspecialchars($row['email']); ?></td>
                                <td><?php echo htmlspecialchars($row['date_recrutement']); ?></td>
                                <td><?php echo htmlspecialchars($row['id_departement']); ?></td>
                                </tr>
                            <?php endwhile; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</body>
</html>