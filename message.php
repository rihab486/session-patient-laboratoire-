
<?php


session_start();

$servername = "localhost";
$username = "root";
$password = "";

 try {
                $dbco = new PDO("mysql:host=$servername", $username, $password);
                $dbco->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
                $sql = "CREATE DATABASE IF NOT EXISTS patient";
                $dbco->exec($sql);
                $conn = new PDO("mysql:host=localhost;dbname=patient", 'root', '');
        
                echo 'Base de données est crée !';
        
                
        
        } catch (PDOException $e) {
                echo "Erreur : " . $e->getMessage();
        }
        


$query = "SELECT * FROM message ORDER BY id ASC;";
  try {
    $pdo_select = $conn->prepare($query);
    $pdo_select->execute();
    $NbreData = $pdo_select->rowCount();    // nombre d'enregistrements (lignes)
    $rowAll = $pdo_select->fetchAll();
  } catch (PDOException $e){ echo 'Erreur SQL : '. $e->getMessage().'<br/>'; die(); }


if ($NbreData != 0) { 

foreach ( $rowAll as $row  ) {if (($row['message'])==""){
      echo $row['id'];
      $id=$row['id'];
      
    }
      } }


     else { echo  
    "pas de donnée à afficher";

}
     ?>


   