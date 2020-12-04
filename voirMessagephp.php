
 

 <?php
session_start();
$servername = "localhost";
$username = "root";
$password = "";
if (isset($_SESSION['nomAssistane']) AND isset($_SESSION['prenomAssistane'] ) AND isset($_SESSION['adresseAssistane']) AND isset($_SESSION['idAssistane']) ) { 

if(isset($_GET['numeroMessage'])  ){
$_SESSION['idReponse']=$_GET['numeroMessage'];


}    try {
                $dbco = new PDO("mysql:host=$servername", $username,$password);
                $dbco->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        

  
                $conn = new PDO("mysql:host=localhost;dbname=patient", 'root', '');
              
        
                // // creation de votre tableau 
        
      } catch (PDOException $e) {
                echo "Erreur : " . $e->getMessage();
        }



             
                $requser = $conn->prepare("SELECT * FROM reponseMessage WHERE id= ? ");
                $requser->execute(array($_SESSION['idReponse']));
                $userinfo = $requser->fetch();
                
                $date =date("Y-m-d H:i:s");
                $adresse = $userinfo['adresse'];
                $message = $userinfo['message'];
                $dateClient = $userinfo['dateClient'];?> 



 <?php require_once('voirMessage.php'); ?> 
                
         
<?php  
           
        if (!empty($_POST['reponse']) AND isset($_POST['reponse']) )  {
                    $insertmail = $conn->prepare("UPDATE reponseMessage SET reponse=? , dateReponse=?  WHERE id =? ");
                    
                    
         $insertmail->execute(array( $_POST['reponse'], $date,$_SESSION['idReponse']));
         $user = $insertmail->fetch(); 

        




         }else{
   
 echo "écrivez un message svp" ;
}

  
        } else{header("Location: connexionAssistante.php");} 
         
   
?>      

