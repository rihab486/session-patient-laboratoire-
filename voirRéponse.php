
<?php
session_start();


$servername = "localhost";
$username = "root";
$password = "";
if (isset($_SESSION['nom']) AND isset($_SESSION['prenom']) AND isset($_SESSION['adresse']) AND isset($_SESSION['id'])) {
$adresse= $_SESSION['adresse'];

 
    

        try {
                $dbco = new PDO("mysql:host=$servername", $username,$password);
                $dbco->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        

    
                $conn = new PDO("mysql:host=localhost;dbname=patient", 'root', '');
              
        
                // // creation de votre tableau 
        
      } catch (PDOException $e) {
                echo "Erreur : " . $e->getMessage();
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
             <div class="dropdown-menu" aria-labelledby="dropdownMenu2">
                
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



<div class="col-10">
      
    





  <script> 
function scrollBas()
{
    height = document.getElementById('id_de_ton_element_a_scroller_en_bas').scrollHeight;
    document.getElementById('id_de_ton_element_a_scroller_en_bas').scrollTo(0, height);
}</script>

<div onload="scrollBas()">

<?php

if (isset($adresse)) {
  # code...

$requser = $conn ->prepare("SELECT * FROM reponseMessage WHERE adresse= ? ORDER BY id  ");


$requser->execute(array($adresse));
while ( $userinfo =$requser->fetch()) {

  ?>
  <p style="display: flex; text-align:; justify-content:; color: white;font-size: 0.9em;font-weight: 500; margin: 10px; color: black;">[<?php echo $userinfo['dateClient']; ?>]
  <strong><?php echo '&nbsp;&nbsp'.$userinfo['adresse']; ?>
  </strong> : <?php echo $userinfo['message']; 
if (!empty($userinfo['reponse']) AND isset($userinfo['reponse'])) {
 ?> </p>
  <p style="display: flex; text-align:; justify-content:; color: white;font-size: 0.9em;font-weight: 500; margin: 10px; color: black" >[<?php echo $userinfo['dateReponse']; ?>]
  <strong><?php echo "&nbsp;&nbspLaboratoire@"; ?>
  </strong> : <?php echo $userinfo['reponse']; ?>
   <br>
  <?php  
  }  }
   }
   
   else { echo "connectez sur votre compte svp";}

     }
 else{ header("Location: test1.php");} 

  ?>
    </p>
</div>

 </div>
    </div>
     </div>


 </div>
     </div>
  
    
  



</body>
</html>


