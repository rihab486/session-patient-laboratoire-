<?php
session_start();
$servername = "localhost";
$username = "root";
$password = "";
if (isset($_SESSION['nomAssistane']) AND isset($_SESSION['prenomAssistane'] ) AND isset($_SESSION['adresseAssistane']) AND isset($_SESSION['idAssistane']) ) { 

if(isset($_GET['id'])){
$_SESSION['idPatientPourSupprimerMessage']=$_GET['id'];
}

 
    

        try {
                $dbco = new PDO("mysql:host=$servername", $username,$password);
                $dbco->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        

    $sql = "CREATE DATABASE IF NOT EXISTS assistante";
                $dbco->exec($sql);
                $conn = new PDO("mysql:host=localhost;dbname=assistante", 'root', '');
              
        
                // // creation de votre tableau 
        
      } catch (PDOException $e) {
                echo "Erreur : " . $e->getMessage();
        }


         if (!empty($_SESSION['idPatientPourSupprimerMessage']) ) {
                $requser = $conn->prepare("DELETE FROM reponseMessage1 WHERE id = ? ");
                $requser->execute(array($_SESSION['idPatientPourSupprimerMessage']));
                
               

                header("Location: messagesdesclients.php");

              }

              } else{header("Location: connexionAssistante.php");}
              ?>