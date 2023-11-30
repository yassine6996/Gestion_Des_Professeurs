
        <?php 
            $pdo=new PDO("mysql:host=localhost;dbname=gestion_professeurs","root","");
            $ID = $_GET['id'];
            $stm=$pdo->prepare("delete from enseigner where id_prof=$ID") ;
            $stm->execute();
            $stm=$pdo->prepare("delete from professeurs WHERE id_prof=$ID ") ;
            $stm->execute();
          if($stm)
          {
            echo("La suppression a été correctement effectuée") ;
            header("location:professeurs.php");
          }
          else
          {
            echo("La suppression à échouée") ;
          }
        ?>