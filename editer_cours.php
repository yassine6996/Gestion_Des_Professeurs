<!DOCTYPE html>
            <html lang="en">
            <head>
                <meta charset="UTF-8">
                <meta http-equiv="X-UA-Compatible" content="IE=edge">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <link rel="stylesheet" href="Editer_cours_design.css">
                <title>Editer_cours</title>
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
    
<h1>Editer un cour</h1>
<hr>
            <form action="" method="post">
            <table border="1">
            
                <tr>
                    <td><label>Nom</label></td>
                    <td><input type="text" name="Nom" value="<?=$prof["intitule"]?>" required></td>
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
