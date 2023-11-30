<!DOCTYPE html>
            <html lang="en">
            <head>
                <meta charset="UTF-8">
                <meta http-equiv="X-UA-Compatible" content="IE=edge">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <link rel="stylesheet" href="Editer_enseigner_design.css">
                <title>Editer_enseigner</title>
            </head>
            <body>
            <?php
     if(isset($_GET["id"])){
        $id=$_GET["id"];
        $pdo=new PDO("mysql:host=localhost;dbname=gestion_professeurs","root","");
        $stm=$pdo->prepare("select * from cours where id_cours=?");
        $stm->execute([$id]);
        $prof=$stm->fetch(PDO::FETCH_ASSOC);
     } 
      
    ?>
    <center>
                
                <fieldset>
                <h1>Editer enseigner</h1>
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
            <button type="submit" name="BtnModifier">Modifier</button>
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
                $stm=$pdo->prepare("UPDATE  cours SET intitule='$nom' WHERE id_cours='$id' ") ;
                $stm->execute();
              if($stm)
              {
                echo("La modification a été correctement effectuée") ;
                header("location:cours.php");
              }
              else
              {
                echo("La modification à échouée") ;
              }
            }
            ?>
