            <!DOCTYPE html>
            <html lang="en">
            <head>
                <meta charset="UTF-8">
                <meta http-equiv="X-UA-Compatible" content="IE=edge">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <link rel="stylesheet" href="Ajouter_prof_design.css">
                <title>Ajouter_Professeur</title>
            </head>
            <body>
                
                <center>

                
                <fieldset>
                    
            <h1>Ajouter un professeur</h1>
                <hr>
            <form action="" method="post">
            <table border="1">
                <tr>
                    <td><label>ID</label></td>
                    <td><input type="number" name="ID" required></td>
                </tr>
                <tr>
                    <td><label>Nom</label></td>
                    <td><input type="text" name="Nom"  required></td>
                </tr>
                <tr>
                    <td><label>Prenom</label></td>
                    <td><input type="text" name="Prenom"  required></td>
                </tr>
                <tr>
                    <td><label>CIN</label></td>
                    <td><input type="text" name="CIN"  required></td>
                </tr>
                <tr>
                    <td><label>Adresse</label></td>
                    <td><input type="text" name="Adresse"  required></td>
                </tr>
                <tr>
                    <td><label>Telephone</label></td>
                    <td><input type="text" name="Telephone"   required></td>
                </tr>
                <tr>
                    <td> <label>Email</label></td>
                    <td><input type="text" name="Email"  required></td>
                </tr>
                <tr>
                    <td><label>Date Recrutement</label></td>
                    <td><input type="date" name="date_recrutement"  required></td>
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
                    <td><input type="text" name="MDP"  required></td>
                </tr>
            </table>  
            <button type="submit" id="BtnAjouter" name="BtnAjouter">Ajouter</button>
            </form>
            </fieldset>
            </center>
            <?php
            if(isset($_POST['BtnAjouter']))
        {
            $pdo=new PDO("mysql:host=localhost;dbname=gestion_professeurs","root","");
            $ID = $_POST['ID'];
            $nom = $_POST['Nom'];
            $prenom = $_POST['Prenom'];
            $CIN = $_POST['CIN'];
            $Adresse = $_POST['Adresse'];
            $Telephone = $_POST['Telephone'];
            $Email = $_POST['Email'];
            $date_recrutement = $_POST['date_recrutement'];
            $ID_Departement = $_POST['id_departement'];
            $MDP = $_POST['MDP'];
            $stm=$pdo->prepare("INSERT  INTO professeurs VALUES ( '$ID','$nom','$prenom','$CIN','$Adresse','$Telephone','$Email','$date_recrutement','$ID_Departement','$MDP')");
            $stm->execute();
            if($stm)
            {
              echo("L'insertion a été correctement effectuée") ;
              header("location:Professeurs.php");
            }
            else
            {
              echo("L'insertion à échouée") ;
             
            }
        }
        ?>
            </body>
            </html>
            