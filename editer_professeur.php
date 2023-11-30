<!DOCTYPE html>
            <html lang="en">
            <head>
                <meta charset="UTF-8">
                <meta http-equiv="X-UA-Compatible" content="IE=edge">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <link rel="stylesheet" href="editer_prof_design.css">
                <title>Editer_Professeur</title>
            </head>
            <body>
            <?php
     if(isset($_GET["id"])){
        $id=$_GET["id"];
        $pdo=new PDO("mysql:host=localhost;dbname=gestion_professeurs","root","");
        $stm=$pdo->prepare("select * from professeurs where id_prof=?");
        $stm->execute([$id]);
        $prof=$stm->fetch(PDO::FETCH_ASSOC);
     } 
      
    ?>
    <center>

                
<fieldset>
    
<h1>Editer un professeur</h1>
<hr>
            <form action="" method="post">
            <table border="1">
            
                <tr>
                    <td><label>Nom</label></td>
                    <td><input type="text" name="Nom" value="<?=$prof["nom"]?>" required></td>
                </tr>
                <tr>
                    <td><label>Prenom</label></td>
                    <td><input type="text" name="Prenom" value="<?=$prof["prenom"]?>" required></td>
                </tr>
                <tr>
                    <td><label>CIN</label></td>
                    <td><input type="text" name="CIN" value="<?=$prof["cin"]?>" required></td>
                </tr>
                <tr>
                    <td><label>Adresse</label></td>
                    <td><input type="text" name="Adresse" value="<?=$prof["adresse"]?>" required></td>
                </tr>
                <tr>
                    <td><label>Telephone</label></td>
                    <td><input type="text" name="Telephone"value="<?=$prof["telephone"]?>"  required></td>
                </tr>
                <tr>
                    <td> <label>Email</label></td>
                    <td><input type="text" name="Email" value="<?=$prof["email"]?>" required></td>
                </tr>
                <tr>
                    <td><label>Date Recrutement</label></td>
                    <td><input type="text" name="date_recrutement" value="<?=$prof["date_recrutement"]?>" required></td>
                </tr>
                <tr>
                    <td><label>Departement</label></td>
                    <td><select name="id_departement">
                      <?php
                          $pdo=new PDO("mysql:host=localhost;dbname=gestion_professeurs","root","");
                          $stm=$pdo->prepare("select * from departement");
                          $stm->execute([]);
                          $categories=$stm->fetchAll(PDO::FETCH_ASSOC);
                          foreach($categories as $c){
                              echo '<option value="'.$c["id_departement"].'">'.$c["nom_depart"].'</option>';
                          }
                      ?>
                   </select></td>
                </tr>
                <tr>
                    <td><label>MDP</label></td>
                    <td><input type="text" name="MDP" value="<?=$prof["mdp"]?>" required></td>
                </tr>
                <tr>
                <input type="hidden" name="idp" value="<?= $id ?>">
                </tr>
            </table>  
            <button type="submit" id="BtnModifier" name="BtnModifier">Modifier</button>
            </form>
            </fieldset>
            </center>
            <?php
          
        ?>
            </body>
            </html>
            <?php
            if(isset($_POST["BtnModifier"])){
                $pdo=new PDO("mysql:host=localhost;dbname=gestion_professeurs","root","");
                $nom = $_POST['Nom'];
                $prenom = $_POST['Prenom'];
                $CIN = $_POST['CIN'];
                $Adresse = $_POST['Adresse'];
                $Telephone = $_POST['Telephone'];
                $Email = $_POST['Email'];
                $date_recrutement = $_POST['date_recrutement'];
                $ID_Departement = $_POST['id_departement'];
                $MDP = $_POST['MDP'];
                $stm=$pdo->prepare("UPDATE  professeurs SET nom='$nom', prenom='$prenom', cin='$CIN', adresse='$Adresse', telephone='$Telephone', email='$Email', date_recrutement='$date_recrutement',id_departement='$ID_Departement', mdp='$MDP' WHERE id_prof='$id' ") ;
                $stm->execute();
              if($stm)
              {
                echo("La modification a été correctement effectuée") ;
                header("location:professeurs.php");
              }
              else
              {
                echo("La modification à échouée") ;
              }
            }
            ?>
