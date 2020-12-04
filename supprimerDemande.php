<?php
session_start();
$servername = "localhost";
$username = "root";
$password = "";

if (isset($_SESSION['nomAssistane']) AND isset($_SESSION['prenomAssistane'] ) AND isset($_SESSION['adresseAssistane']) AND isset($_SESSION['idAssistane']) ) { 
if(isset($_GET['adresse'])){
$_SESSION['adressePatientpourRV']=$_GET['adresse'];
}

 
    

        try {
                $dbco = new PDO("mysql:host=$servername", $username,$password);
                $dbco->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        

    $sql = "CREATE DATABASE IF NOT EXISTS patient";
                $dbco->exec($sql);
                $conn = new PDO("mysql:host=localhost;dbname=patient", 'root', '');
              
        
                // // creation de votre tableau 
        
      } catch (PDOException $e) {
                echo "Erreur : " . $e->getMessage();
        }


         if (!empty($_SESSION['adressePatientpourRV']) ) {
                $requser = $conn->prepare("DELETE FROM rdv WHERE adresse = ? ");
                $requser->execute(array($_SESSION['adressePatientpourRV']));
                
                 $requser1 = $conn->prepare("DELETE FROM DateRDVconfirme WHERE adresse = ? ");
                $requser1->execute(array($_SESSION['adressePatientpourRV']));

                header("Location: examensDemandesPourConfirmer.php");

              }

            } else{header("Location: connexionAssistante.php");}  
              ?>