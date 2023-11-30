<?php
            $pdo=new PDO("mysql:host=localhost;dbname=gestion_professeurs","root","");
            $ID = $_GET['id'];
            $stm=$pdo->prepare("delete from enseigner where id_cours=$ID");
            $stm->execute();
  $stm=$pdo->prepare("delete from cours where id_cours=$ID");
  $stm->execute();
  header("location:cours.php");
?>