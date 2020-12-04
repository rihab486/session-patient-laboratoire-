<?php
session_start();
$servername = "localhost";
$username = "root";
$password = "";
if (isset($_SESSION['nomAssistane']) AND isset($_SESSION['prenomAssistane'] ) AND isset($_SESSION['adresseAssistane']) AND isset($_SESSION['idAssistane']) ) {
  
if(isset($_GET['nom']) AND isset($_GET['prenom'])){
$_SESSION['nomModifierResultat']=$_GET['nom'];
$_SESSION['prenomModifierResultat']=$_GET['prenom'];
}
$nom=$_SESSION['nomModifierResultat'];
$prenom=$_SESSION['prenomModifierResultat'];


 
    

        try {
                $dbco = new PDO("mysql:host=$servername", $username,$password);
                $dbco->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                $conn = new PDO("mysql:host=localhost;dbname=assistante", 'root', '');
              
        
                // // creation de votre tableau 
        
      } catch (PDOException $e) {
                echo "Erreur : " . $e->getMessage();
        }


         
                 $reqmail = $conn->prepare("SELECT * FROM resultat WHERE nom = ?  AND prenom=? ");
                   $reqmail->execute(array($nom,$prenom));
                   $mailexist = $reqmail->rowCount();//compter les colonnes trouvé
                   if($mailexist == 1) {



                $requser = $conn->prepare("DELETE FROM resultat WHERE nom = ?  AND prenom=? ");
                $requser->execute(array($nom,$prenom));
                
                                  

                header("Location: tableauResultat.php");  
               }

      } else{header("Location: connexionAssistante.php");}

              
              ?>