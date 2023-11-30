<!DOCTYPE html>
            <html lang="en">
            <head>
                <meta charset="UTF-8">
                <meta http-equiv="X-UA-Compatible" content="IE=edge">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <link rel="stylesheet" href="Ajouter_depart_design.css">
                <title>Ajouter_Departement</title>
            </head>
            <body>
            <center>

                
<fieldset>
    
<h1>Ajouter un departement</h1>
<hr>
            <form action="" method="post">
            <table border="1">
                <tr>
                    <td><label>ID</label></td>
                    <td><input type="number" name="ID"  required></td>
                </tr>
                <tr>
                    <td><label>Nom</label></td>
                    <td><input type="text" name="Nom"  required></td>
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
            $stm=$pdo->prepare("INSERT  INTO departement VALUES ( '$ID','$nom')");
            $stm->execute();
            if($stm)
            {
              echo("L'insertion a été correctement effectuée") ;
              header("location:departement.php");
            }
            else
            {
              echo("L'insertion à échouée") ;
             
            }
        }
        ?>
            </body>
            </html>
            