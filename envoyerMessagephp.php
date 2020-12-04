
 
<?php
session_start();

if (isset($_SESSION['nom']) AND isset($_SESSION['prenom']) AND isset($_SESSION['adresse']) AND isset($_SESSION['id'])) {
if (isset($_SESSION['adresse'])) {
    $adresse= $_SESSION['adresse'];
}

$servername = "localhost";
$username = "root";
$password = "";


 
    

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


        try {
        $conn = new PDO("mysql:host=localhost;dbname=patient", 'root', '');
        $sql = "create TABLE IF NOT EXISTS reponseMessage(
                id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
                
                
                adresse VARCHAR(70),
                message VARCHAR(70),
                dateClient DATETIME,
                reponse VARCHAR(70),
                dateReponse DATETIME
                
                );";


        $conn->exec($sql);
        } catch (PDOException $e ) {
        exit("Erreur:" . $e->getMessage()); }
    
   



// Insertion du message à l'aide d'une requête préparée

        if (isset($_POST['formconnexion'])){
        if(isset($_SESSION['adresse'])){  
           
        if (!empty($_POST['message']) AND isset($_POST['message']) )  {

       
$req = "INSERT into reponseMessage(`adresse` ,`message`,`dateClient` )
VALUES (:aadresse,:amessage,NOW())";
$stmt = $conn->prepare($req);


$stmt->bindParam(':aadresse', $_SESSION['adresse'], PDO::PARAM_STR);
$stmt->bindParam(':amessage', $_POST['message'], PDO::PARAM_STR);
$stmt->execute();




$requser = $conn->prepare("SELECT * FROM reponseMessage ORDER BY id DESC LIMIT 1 ");
                $requser->execute(array());
                $userinfo = $requser->fetch();
                $id = $userinfo['id'];
                $adresse = $userinfo['adresse'];
                $message = $userinfo['message'];
                $dateClient = $userinfo['dateClient'];



 include("envoyerMessagephp1.php");




 
$req1 = "INSERT into reponseMessage1(`adresse` ,`message`,`dateClient`,`numeroMessage` )
VALUES (:aadresse,:amessage,:adateClient,:anumeroMessage)";
$stmt1 = $conn1->prepare($req1);


$stmt1->bindParam(':aadresse', $adresse, PDO::PARAM_STR);
$stmt1->bindParam(':amessage', $message, PDO::PARAM_STR);
$stmt1->bindParam(':adateClient', $dateClient, PDO::PARAM_STR);
$stmt1->bindParam(':anumeroMessage', $id, PDO::PARAM_STR);
$stmt1->execute();




header("Location: envoyerMessagephp.php");
 
 

}else{
   
 $erreur="il faut écrire un message svp";
}}
else{ $erreur="connectez sur votre compte svp";}
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

     <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="accesPatient.css">
  
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

    <title>accés Patient</title>
</head>

    <body>
      
    

    <form method="POST" action="envoyerMessagephp.php">
          

           <div class="container-fluid" style="background-color: ;">
        <div class="row">



           <div class="col-2,5" style="background-color: #3a6289 ;">

            <p class="" style="font-family:Trebuchet MS;display: flex; justify-content: center ;color: white;font-size: 1em; font-weight: 500;margin: 10px;">Laboratoire Detunisie</p>




                <br>
                
                  
             <p style="display: flex; justify-content: center ;color: white;font-size: 0.9em; font-weight: 500;margin: 10px;"><?php echo $_SESSION['nom']; ?></p>

               <div class="btn-group-vertical  " style="margin: 0px">
                <a   href="test.php" class="monBoutton"> remplire le formulaire </a>
        
                 <a   href="choixpatient.php" class="monBoutton"> Prendre RDV </a>
                 <a   href="voirDateRDV.php" class="monBoutton"> Date d'analyse </a>

                <a href="envoyerMessagephp.php" class="monBoutton" style="background-color: #2d4d6c;"> Mes messages</a></button>

                  <a href="voirResultat.php" class="monBoutton"> mes resultats</a></button>

                  


               </div>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
       
          </div>

    
        <div class="col " style="background-color:white "  >
      
      <div class="row" style="background-color: ">

        <div class="col-12" style="background-color:#E5E7E9  ;height: 37px; ">

          <ul class="nav offset-md-7 " style="background-color:; ">
        <li class="nav-item" style="background-color:">
          <a class="nav-link"  style="color: #007BFF;"  href="#"></a>
          </li>
         <li class="nav-item" >
           <a class="nav-link" style="color: #007BFF;font-size: 0.9em; font-weight: 500;"  href="deconnexionPageDeGarde.php">Accueil </a>
         </li>
         <li class="nav-item">
           <a class="nav-link" style="color: #007BFF;font-size: 0.9em; font-weight: 500;" href="#"> Présentation </a>
         </li>
           <a class="nav-link" style="color: #007BFF;font-size: 0.9em; font-weight: 500;"  href="voirResultat.php">Résultats</a>
         <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" style="color: #007BFF;font-size: 0.9em; font-weight: 500;" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Mon compte</a>
             <div class="dropdown-menu">
                
                <h6 style="color: #007BFF;font-size: 0.9em; font-weight: 500;"class="dropdown-header " href="#"><?php echo $_SESSION['nom']; ?></h6>
                <a style="color: #007BFF;font-size: 0.9em; font-weight: 500;" class="dropdown-item" href="profil.php">Mon profil</a>
                <div class="dropdown-divider"></div>
                <a style="color: #007BFF;font-size: 0.9em; font-weight: 500;" class="dropdown-item" href="deconnexion.php">Se déconnecter</a>
             </div>
          </li>     
      </ul>
    </div>

    <br>
    <br>



<div class="col-4">

  
      
      
         <p  style="display: flex; text-align:; justify-content:; color: white;font-size: 0.9em;font-weight: 500; margin: 10px; color: #3a6289">
  écrivez votre message ici:</p>
       
       <textarea name="message" id="ameliorer" class="form-control" rows="10" cols="50"></textarea>    
   

          <?php
if(isset($erreur)) {
echo '<font style="color:red ;font-size: 0.8em;">'.$erreur."</font>";

}?>
   <br>
   

   <?php echo "<button type='submit' name='formconnexion' class='btn btn-primary' onclick='return confirm(\"voulez vous confirmer ces informations? \");' ><span style='font-weight: bold; font-size: 0.8em;'> Envoyer </span></button>" ; ?> 

</form>
<a style="font-weight: bold; font-size: 0.8em;color: white;height: 38px;padding: 9px ;" class="btn btn-primary" href="voirRéponse.php"  >Voir Réponse</a> <br>
 <?php }
 else{ header("Location: test1.php");} ?>
 
   </div>
    </div>
     </div>


 </div>
     </div>

  
       </body>
</html>