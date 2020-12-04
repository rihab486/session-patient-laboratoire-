<?php
session_start();
$servername = "localhost";
$username = "root";
$password = "";
if (isset($_SESSION['nomAssistane']) AND isset($_SESSION['prenomAssistane'] ) AND isset($_SESSION['adresseAssistane']) AND isset($_SESSION['idAssistane']) ) {
  
if(isset($_GET['nom']) AND isset($_GET['prenom'])){
$_SESSION['nomSupprimerResultat']=$_GET['nom'];
$_SESSION['prenomSupprimerResultat']=$_GET['prenom'];
$_SESSION['speSupprimerResultat']=$_GET['spe'];
$_SESSION['dateSupprimerResultat']=$_GET['date'];
}
$nom=$_SESSION['nomSupprimerResultat'];
$prenom=$_SESSION['prenomSupprimerResultat'];
$spe=$_SESSION['speSupprimerResultat'];
$date=$_SESSION['dateSupprimerResultat'];


 
    

        try {
                $dbco = new PDO("mysql:host=$servername", $username,$password);
                $dbco->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                $conn = new PDO("mysql:host=localhost;dbname=assistante", 'root', '');
              
        
                // // creation de votre tableau 
        
      } catch (PDOException $e) {
                echo "Erreur : " . $e->getMessage();
        }


         
                 $reqmail = $conn->prepare("SELECT * FROM resultat WHERE nomPatient = ?  AND prenomPatient=? AND specialite=? AND dateRD=? ");
                   $reqmail->execute(array($nom,$prenom,$spe,$date));
                   $mailexist = $reqmail->rowCount();//compter les colonnes trouvé
                   if(isset($mailexist)) {



                $requser = $conn->prepare("DELETE FROM resultat WHERE nomPatient = ?  AND prenomPatient=? AND specialite=? AND dateRD=? ");
                $requser->execute(array($nom,$prenom,$spe,$date));
                
                                  

                header("Location: tableauResultat.php");  
               }

     
} else{header("Location: connexionAssistante.php");}
              
              ?>