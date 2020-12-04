<?php
session_start();
$servername = "localhost";
$username = "root";
$password = "";

if (isset($_SESSION['nom']) AND isset($_SESSION['prenom']) AND isset($_SESSION['adresse']) AND isset($_SESSION['id'])) {
 
    

        try {
                $dbco = new PDO("mysql:host=$servername", $username,$password);
                $dbco->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                $conn = new PDO("mysql:host=localhost;dbname=patient", 'root', '');
              
        
                // // creation de votre tableau 
        
      } catch (PDOException $e) {
                echo "Erreur : " . $e->getMessage();
        }


         
                 $reqmail = $conn->prepare("SELECT * FROM rdv WHERE adresse = ?");
                   $reqmail->execute(array($_SESSION['adresse']));
                   $mailexist = $reqmail->rowCount();//compter les colonnes trouvé
                   if($mailexist == 1) {

                   



                $requser = $conn->prepare("DELETE FROM rdv WHERE adresse = ? ");
                $requser->execute(array($_SESSION['adresse']));

                 $reqmail1 = $conn->prepare("SELECT * FROM daterdvconfirme WHERE adresse = ?");
                   $reqmail1->execute(array($_SESSION['adresse']));
                   $mailexist1 = $reqmail1->rowCount();
                   if($mailexist == 1) {
                      $requser1 = $conn->prepare("DELETE FROM daterdvconfirme WHERE adresse = ? ");
                $requser1->execute(array($_SESSION['adresse']));  }
                


                 $err = "votre demande est supprimée!";
                 

                header("Location: choixpatient.php?a=$err");  
               }

               else{
                $err =" Mais vous n'avez pas pris un RDV!";
                header("Location: choixpatient.php?a=$err");

               }

     }
 else{ header("Location: test1.php");} 

              
              ?>