<?php
            $pdo=new PDO("mysql:host=localhost;dbname=gestion_professeurs","root","");
            $ID = $_GET['id'];
            $stm=$pdo->prepare("update professeurs set id_departement=null where id_departement=$ID");
  $stm->execute();
  $stm=$pdo->prepare("delete from departement where id_departement=$ID");
  $stm->execute();
  header("location:departement.php");
?>