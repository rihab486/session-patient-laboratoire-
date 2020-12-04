<?php
session_start();

if (isset($_SESSION['nomAssistane']) AND isset($_SESSION['prenomAssistane'] ) AND isset($_SESSION['adresseAssistane']) AND isset($_SESSION['idAssistane']) ) { 
  
$servername = "localhost";
$username = "root";
$password = "";


if(isset($_GET['nom']) AND isset($_GET['prenom'])){
$_SESSION['nomModifierResultat']=$_GET['nom'];
$_SESSION['prenomModifierResultat']=$_GET['prenom'];
$_SESSION['specialiteModifierResultat']=$_GET['spe'];
$_SESSION['dateModifierResultat']=$_GET['date'];
}
$nom=$_SESSION['nomModifierResultat'];
$prenom=$_SESSION['prenomModifierResultat'];
$spe=$_SESSION['specialiteModifierResultat'];
$date=$_SESSION['dateModifierResultat'];
// Connexion à la base de données
        try {
                $dbco = new PDO("mysql:host=$servername", $username, $password);
                $dbco->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
              
                $conn = new PDO("mysql:host=localhost;dbname=assistante", 'root', '');
                 $conn1 = new PDO("mysql:host=localhost;dbname=patient", 'root', '');
               
                
        } catch (PDOException $e) {
                echo "Erreur : " . $e->getMessage();
        }



                $reqmail = $conn->prepare("SELECT * FROM resultat WHERE nomPatient = ? AND prenomPatient=? ");//toujours premiérerement il faut préparer la requét
                   $reqmail->execute(array($nom,$prenom));
                   $userexist = $reqmail->rowCount();
                   if($userexist == 1) { //càd les infos entéées sont existés une seule fois bien sur 
                   $userinfo = $reqmail->fetch();
                   $adresse=$userinfo['adresse'];
                    }








if (empty ($_POST['nom']) AND empty($_POST['prenom']) AND empty($_POST['adresse'])  AND empty($_POST['etat'])) {  }

     elseif (!empty($_POST['nom']) AND !empty($_POST['prenom']) AND !empty($_POST['adresse'])  AND !empty($_POST['etat'])) {
     
          
        



                $requser2 = $conn ->prepare("UPDATE resultat SET etat= ? WHERE nomPatient=? AND prenomPatient=? AND adresse=? AND specialite=? AND dateRD=? ");
                        $requser2->execute(array($_POST['etat'],$nom,$prenom,$adresse,$spe,$date));

                          $requser3 = $conn1 ->prepare("UPDATE resultatp SET etat= ? WHERE nomPatient=? AND prenomPatient=? AND adresse=? AND specialite=? AND dateRD=? ");
                          $requser3->execute(array($_POST['etat'],$nom,$prenom,$adresse,$spe,$date)); 

                        $err="les informations sont bien modifiée !";  
        } 

                   else {
      $erreur = "Tous les champs doivent être complétés !";
              }


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="accesAssistante.css">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form method="POST" action="modifierResultat.php">

            <div class="container-fluid" style="background-color: ;">
        <div class="row">



           <div class="col-2,5" style="background-color: #3a6289 ;">

            <p class="" style="font-family:Trebuchet MS;display: flex; justify-content: center ;color: white;font-size: 1em; font-weight: 500;margin: 10px;">Laboratoire Detunisie</p>




                <br>
                
                  
             <p style="display: flex; justify-content: center ;color: white;font-size: 0.9em; font-weight: 500;margin: 10px;"><?php echo $_SESSION['nomAssistane']; ?></p>

               <div class="btn-group-vertical  " style="margin: 0px">
        
                  <a href="fiche.php" class="monBoutton"> les fiches des patients </a>
                  <a href="ficheAnalyse.php" class="monBoutton"> fiche des analyses </a>
                 <a   href="examensDemandesPourConfirmer.php" class="monBoutton">  Listes des examens demandés </a>

                <a href="tableauResultat.php" class="monBoutton" style="background-color: #2d4d6c;"> Entrer les nouveaux résultats</a></button>

                  <a href="messagesdesclients.php" class="monBoutton">voir les messages des patients</a></button>


                  


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
           <a class="nav-link" style="color: #007BFF;font-size: 0.9em; font-weight: 500;"  href="messagesdesclients.php">les messages</a>
         <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" style="color: #007BFF;font-size: 0.9em; font-weight: 500;" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Mon compte</a>
             <div class="dropdown-menu" >
                
               <h6 style="color: #007BFF;font-size: 0.9em; font-weight: 500;"class="dropdown-header " href="#"><?php echo $_SESSION['nomAssistane']; ?></h6>
                <a style="color: #007BFF;font-size: 0.9em; font-weight: 500;" class="dropdown-item" href="profil.php">Mon profil</a>
                <div class="dropdown-divider"></div>
                <a style="color: #007BFF;font-size: 0.9em; font-weight: 500;" class="dropdown-item" href="deconnexion.php">Se déconnecter</a>
             </div>
          </li>     
      </ul>
    </div>

    <br>
    <br>





    <div class="col-5" style="background-color: ">




      <div class="form-group" >
        <br>
      
                
                    <?php echo "<input type='text' class='form-control' name ='nom' id='nom' placeholder='nom Patient' value= $nom > " ?><br />
                
          
            
           
                
               <?php echo "<input type='text' class='form-control' name ='prenom' id='prenom' placeholder='prénom patient' value= $prenom > " ?><br />
                
         

           
                
                    <?php echo "<input type='email' class='form-control' name ='adresse' id='adresse' placeholder='adresse Patient' value= $adresse >" ?><br />
           
             
                   

               
                
                   
                
              
              
   <p style="display: flex;position: relative; right:10px; text-align:; justify-content:; color: white; font-size: 0.9em;font-weight: 500; margin: 10px; color: black;">
        l'état du résultat :
       


      <div class="form-check">
  <input class="form-check-input" type="radio"  name="etat" id="exampleRadios1" value="Négatif" checked>
  <label style="display: flex;position: relative; right:10px; text-align:; justify-content:; color: white; font-size: 0.9em;font-weight: 500; margin: 10px; color: black;" class="form-check-label" for="exampleRadios1">Négatif
   
  </label>
</div>
<div class="form-check">
  <input class="form-check-input" type="radio" name="etat" id="exampleRadios2" value="Positif">
  <label style="display: flex;position: relative; right:10px; text-align:; justify-content:; color: white; font-size: 0.9em;font-weight: 500; margin: 10px; color: black;" class="form-check-label" for="exampleRadios2">
   Positif
  </label>
</div>
</div>
</p>
                       

   <?php
if(isset($erreur)) {
echo '<p><font style="color:red ;font-weight: 500;font-size: 0.78em;">'.$erreur."</font></p>";

}
elseif(isset($err)){ echo '<p><font style="color:green ;font-weight: 500;font-size: 0.78em;">'.$err."</font></p>";
}
?>

 <button type="submit" class="btn btn-primary " ><span style="font-weight: bold; font-size: 0.8em;">Envoyer </span></button>
<?php  } else{header("Location: connexionAssistante.php");}  ?>
</div>
    </div>
    </div>

 </div>
    </div>
    </div>
                    
              
    
    </form>


  
</body>
</html>
