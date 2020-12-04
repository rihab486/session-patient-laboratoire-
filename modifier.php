<?php
session_start();
if (isset($_SESSION['nomAssistane']) AND isset($_SESSION['prenomAssistane'] ) AND isset($_SESSION['adresseAssistane']) AND isset($_SESSION['idAssistane']) ) {
$servername = "localhost";
$username = "root";
$password = "";

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


        try {
        $conn = new PDO("mysql:host=localhost;dbname=patient", 'root', '');
        $sql = "create TABLE IF NOT EXISTS DateRDVconfirme(
                id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
                nom VARCHAR(70),
                prenom VARCHAR(70),
                adresse VARCHAR(70),
                specialite VARCHAR(70),
                dateRDV VARCHAR(70),
                heure VARCHAR(70)
                );";


        $conn->exec($sql);
        } catch (PDOException $e) {
        exit("Erreur:" . $e->getMessage());
        } 

 try {
        $conn = new PDO("mysql:host=localhost;dbname=patient", 'root', '');
        $sql = "create TABLE IF NOT EXISTS DateRDVconfirme1(
                id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
                nom VARCHAR(70),
                prenom VARCHAR(70),
                adresse VARCHAR(70),
                specialite VARCHAR(70),
                dateRDV VARCHAR(70),
                heure VARCHAR(70)
                );";


        $conn->exec($sql);
        } catch (PDOException $e) {
        exit("Erreur:" . $e->getMessage());
        } 



          if (empty($_POST['date'])AND empty($_POST['heure'])) {
             }
          
            elseif (!empty($_SESSION['adressePatientpourRV']) AND !empty($_POST['date']) AND !empty($_POST['heure']) ) {
                $date=$_POST['date'];
                $heure=$_POST['heure'];
                $requser = $conn->prepare("SELECT * FROM rdv WHERE adresse = ? ");

                $requser->execute(array($_SESSION['adressePatientpourRV']));
                $userexist = $requser->rowCount();
             if($userexist == 1) {// lezim sinon erreur de booléen
                $userinfo = $requser->fetch();

                
                $nompatient = $userinfo['nompatient'];
                $prenompatient = $userinfo['prenompatient'];
                $specialite = $userinfo['specialite'];

                 $reqmail = $conn->prepare("SELECT * FROM DateRDVconfirme WHERE adresse = ? ");//toujours premiérerement il faut préparer la requét
                   $reqmail->execute(array($_SESSION['adressePatientpourRV']));
                   $userexist1 = $reqmail->rowCount();
                   if($userexist1 == 1) { //càd les infos entéées sont existés une seule fois bien sur 
                   $userinfo1 = $reqmail->fetch();

                   $r = $conn ->prepare("UPDATE DateRDVconfirme SET dateRDV = ? WHERE adresse=?");
                        $r->execute(array($date,$_SESSION['adressePatientpourRV']));
        
                $r1 = $conn ->prepare("UPDATE DateRDVconfirme SET heure= ? WHERE adresse=?");
                        $r1->execute(array($heure,$_SESSION['adressePatientpourRV']));

                 $r2 = $conn ->prepare("UPDATE DateRDVconfirme1 SET dateRDV = ? WHERE adresse=?");
                        $r->execute(array($date,$_SESSION['adressePatientpourRV']));
        
                $r3 = $conn ->prepare("UPDATE DateRDVconfirme1 SET heure= ? WHERE adresse=?");
                        $r1->execute(array($heure,$_SESSION['adressePatientpourRV']));



                    $err="la date est bien modifiée !";

                    }




                    else{ 


                   $req = "INSERT into DateRDVconfirme(`nom`,`prenom` ,`adresse` ,`specialite` ,`dateRDV` , `heure`)
      VALUES (:anom,:aprenom,:aadresse,:aspecialite,:adateRDV,:aheure)";
         $stmt = $conn->prepare($req);

         $stmt->bindParam(':anom', $nompatient , PDO::PARAM_STR);//bindParam — Lie un paramètre à un nom de variable spécifique avant d'exécuté la requête.
         $stmt->bindParam(':aprenom', $prenompatient, PDO::PARAM_STR);
         $stmt->bindParam(':aadresse', $_SESSION['adressePatientpourRV'], PDO::PARAM_STR);
         $stmt->bindParam(':aspecialite', $specialite, PDO::PARAM_STR);
         $stmt->bindParam(':adateRDV', $date, PDO::PARAM_STR);
         $stmt->bindParam(':aheure', $heure, PDO::PARAM_STR);
         $stmt->execute();


          $req1 = "INSERT into DateRDVconfirme1(`nom`,`prenom` ,`adresse` ,`specialite` ,`dateRDV` , `heure`)
      VALUES (:anom,:aprenom,:aadresse,:aspecialite,:adateRDV,:aheure)";
         $stmt = $conn->prepare($req1);

         $stmt->bindParam(':anom', $nompatient , PDO::PARAM_STR);//bindParam — Lie un paramètre à un nom de variable spécifique avant d'exécuté la requête.
         $stmt->bindParam(':aprenom', $prenompatient, PDO::PARAM_STR);
         $stmt->bindParam(':aadresse', $_SESSION['adressePatientpourRV'], PDO::PARAM_STR);
         $stmt->bindParam(':aspecialite', $specialite, PDO::PARAM_STR);
         $stmt->bindParam(':adateRDV', $date, PDO::PARAM_STR);
         $stmt->bindParam(':aheure', $heure, PDO::PARAM_STR);
         $stmt->execute();
         
                   
        }  } }
         
         else { $erreur="Tous les champs doivent être complétés !" ;}       




                # code...
        
            
         

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
     <form action="modifier.php" method="POST" >

      <div class="container-fluid" style="background-color: ;">
        <div class="row">



           <div class="col-2,5" style="background-color: #3a6289 ;">

            <p class="" style="font-family:Trebuchet MS;display: flex; justify-content: center ;color: white;font-size: 1em; font-weight: 500;margin: 10px;">Laboratoire Detunisie</p>




                <br>
                
                  
             <p style="display: flex; justify-content: center ;color: white;font-size: 0.9em; font-weight: 500;margin: 10px;"><?php echo $_SESSION['nomAssistane']; ?></p>

               <div class="btn-group-vertical  " style="margin: 0px">
        
                  <a href="fiche.php" class="monBoutton"> les fiches des patients </a>
                 <a   href="examensDemandesPourConfirmer.php" class="monBoutton" style="background-color: #2d4d6c;">  Listes des examens demandés </a>

                <a href="tableauResultat.php" class="monBoutton"> Entrer les nouveaux résultats</a></button>

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



  <p  style="display: flex; text-align:; justify-content:; color: white; font-size: 0.9em;font-weight: 500; margin: 10px; color: #3a6289">
        Modifiez la date de votre patient:</p> 
        <div style="position: relative; left: 10px;" > 
           
                           <p><div class="form-group" >      
                        <input  type= "date" name="date" class="form-control"  id="date" placeholder="la date" /><div /><br>
                        <div class="form-group" >
                        <input  type= "heure" name="heure" class="form-control"  id="heure" placeholder="l'heure"/><div /></p>

                       
                           
   
                  




<?php
if(isset($erreur)) {
echo'<p><font style="color:red ;font-weight: 500;font-size: 0.78em;margin-bottom:10px;">'.$erreur."</font></p>";
}
elseif(isset($err)){ echo '<p><font style="color:green ;font-weight: 500;font-size: 0.78em;">'.$err."</font></p>";
}

 ?> 

               
 <button type="submit" nom='forminscription' class="btn btn-primary " style="width: 130px" ><span style="font-weight: bold; font-size: 0.8em; ">confirmer</span></button>

  <?php  } else{header("Location: connexionAssistante.php");}  ?>
                   
               
            </div>
   
     
   




    
    
    
   </div>
    </div>
     </div>


 </div>
     </div>
    </from>

</body>

</html>