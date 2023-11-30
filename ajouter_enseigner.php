<!DOCTYPE html>
            <html lang="en">
            <head>
                <meta charset="UTF-8">
                <meta http-equiv="X-UA-Compatible" content="IE=edge">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <link rel="stylesheet" href="Ajouter_enseigner_design.css">
                <title>Ajouter_enseigner</title>
            </head>
            <body>
            <center>
                
                <fieldset>
                <h1>Ajouter enseigner</h1>
                <hr>
                <form action="" method="post">
            <table border="1">
                <tr>
                    <td><label>PROF</label></td>
                    <td><td><select name="id_prof">
                      <?php
                          $pdo=new PDO("mysql:host=localhost;dbname=gestion_professeurs","root","");
                          $stm=$pdo->prepare("select * from professeurs");
                          $stm->execute([]);
                          $categories=$stm->fetchAll(PDO::FETCH_ASSOC);
                          foreach($categories as $c){
                              echo '<option value="'.$c["id_prof"].'">'.$c["nom"].'</option>';
                          }
                      ?></td>
                </tr>
                <tr>
                    <td><label>COURS</label></td>
                    <td><td><select name="id_cours">
                      <?php
                          $pdo=new PDO("mysql:host=localhost;dbname=gestion_professeurs","root","");
                          $stm=$pdo->prepare("select * from cours");
                          $stm->execute([]);
                          $categories=$stm->fetchAll(PDO::FETCH_ASSOC);
                          foreach($categories as $c){
                              echo '<option value="'.$c["id_cours"].'">'.$c["intitule"].'</option>';
                          }
                      ?></td>
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
            $ID = $_POST['id_prof'];
            $nom = $_POST['id_cours'];
            $stm=$pdo->prepare("INSERT  INTO enseigner VALUES ( '$ID','$nom')");
            $stm->execute();
            if($stm)
            {
              echo("L'insertion a été correctement effectuée") ;
              header("location:cours.php");
            }
            else
            {
              echo("L'insertion à échouée") ;
             
            }
        }
        ?>
            </body>
            </html>
            