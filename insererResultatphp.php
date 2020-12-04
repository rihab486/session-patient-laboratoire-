<?php
session_start();
if (isset($_SESSION['nomAssistane']) AND isset($_SESSION['prenomAssistane'] ) AND isset($_SESSION['adresseAssistane']) AND isset($_SESSION['idAssistane']) ) {

$servername = "localhost";
$username = "root";
$password = "";
// Connexion à la base de données
        try {
                $dbco = new PDO("mysql:host=$servername", $username, $password);
                $dbco->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
                $sql = "CREATE DATABASE IF NOT EXISTS assistante";
                $dbco->exec($sql);
                $conn = new PDO("mysql:host=localhost;dbname=assistante", 'root', '');
                  $conn1 = new PDO("mysql:host=localhost;dbname=patient", 'root', '');
                
        } catch (PDOException $e) {
                echo "Erreur : " . $e->getMessage();
        }
        try {
        $conn = new PDO("mysql:host=localhost;dbname=assistante", 'root', '');
        $sql = "create TABLE IF NOT EXISTS resultat(
                id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
                nomPatient VARCHAR(70),
                prenomPatient VARCHAR(70),
                adresse VARCHAR(70),
                specialite VARCHAR(70),
                dateRD VARCHAR(70),
                etat VARCHAR(70)
                );
                ";

        $conn->exec($sql);
        } catch (PDOException $e) {
        exit("Erreur:" . $e->getMessage());
        }


         try {
        $conn1 = new PDO("mysql:host=localhost;dbname=patient", 'root', '');
        $sql = "create TABLE IF NOT EXISTS resultatP(
                id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
                nomPatient VARCHAR(70),
                prenomPatient VARCHAR(70),
                adresse VARCHAR(70),
                specialite VARCHAR(70),
                dateRD VARCHAR(70),
                etat VARCHAR(70)
                );
                ";

        $conn1->exec($sql);
        } catch (PDOException $e) {
        exit("Erreur:" . $e1->getMessage());
        }
      

if (empty($_POST['nom'])AND empty($_POST['prenom']) AND empty($_POST['adresse']) AND empty($_POST['specialite']) AND empty($_POST['date']) AND empty($_POST['etat'])) {
             }
          
            
     elseif (!empty($_POST['nom']) AND !empty($_POST['prenom']) AND !empty($_POST['adresse']) AND !empty($_POST['specialite']) AND !empty($_POST['date']) AND !empty($_POST['etat'])) {

        
               
        
                
        

                 $reqmail = $conn1->prepare("SELECT * FROM daterdvconfirme1 WHERE  nom = ? AND prenom = ? AND adresse = ? AND specialite=? AND dateRDV=? ");
                   $reqmail->execute(array($_POST['nom'],$_POST['prenom'],$_POST['adresse'],$_POST['specialite'],$_POST['date']));
                   $mailexist = $reqmail->rowCount();//compter les colonnes trouvé
                   if($mailexist == 1) {//càd si le email choisisé est unique


        // Insertion du message à l'aide d'une requête préparée
        $req = "INSERT into resultat(`nomPatient`,`prenomPatient`,`adresse`,`specialite`,`dateRD`,`etat`)
        VALUES (:anomPatient,:aprenomPatient,:aadresse,:aspecialite,:adateRD,:aetat)";
        $stmt = $conn->prepare($req);
        $stmt->bindParam(':anomPatient', $_POST['nom'], PDO::PARAM_STR);
        $stmt->bindParam(':aprenomPatient', $_POST['prenom'], PDO::PARAM_STR);
        $stmt->bindParam(':aadresse', $_POST['adresse'], PDO::PARAM_STR);
        $stmt->bindParam('aspecialite', $_POST['specialite'], PDO::PARAM_STR);
        $stmt->bindParam(':adateRD', $_POST['date'], PDO::PARAM_STR);
        $stmt->bindParam(':aetat', $_POST['etat'], PDO::PARAM_STR);
        $stmt->execute();

        $req1 = "INSERT into resultatP(`nomPatient`,`prenomPatient`,`adresse`,`specialite`,`dateRD`,`etat`)
        VALUES (:anomPatient,:aprenomPatient,:aadresse,:aspecialite,:adateRD,:aetat)";
        $stmt = $conn1->prepare($req1);
        $stmt->bindParam(':anomPatient', $_POST['nom'], PDO::PARAM_STR);
        $stmt->bindParam(':aprenomPatient', $_POST['prenom'], PDO::PARAM_STR);
        $stmt->bindParam(':aadresse', $_POST['adresse'], PDO::PARAM_STR);
        $stmt->bindParam('aspecialite', $_POST['specialite'], PDO::PARAM_STR);
        $stmt->bindParam(':adateRD', $_POST['date'], PDO::PARAM_STR);
        $stmt->bindParam(':aetat', $_POST['etat'], PDO::PARAM_STR);
        $stmt->execute();
        
        
        
        } 

                   else {
      $erreur = "ce patient n'existe pas dans la liste de demandes ou fausses coordonnées";
              }

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
    <form method="POST" action="insererResultatphp.php">

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
                
                    <input type="text" class="form-control" name ="nom" id="nom" placeholder="nom Patient"><br />
                
            
                
               <input type="text" class="form-control" name ="prenom" id="prenom" placeholder="prénom patient"><br />
                
                <input type="email" name ="adresse" class="form-control" id="adresse" placeholder="adresse Patient"><br />
          
                <!-- <a class="l"> -->
                    <select  name="specialite" class="form-control">
                        
                        <option selected="selected" value="">Specialite</option>
                        <optgroup  placeholder="Recherches fréquentes">
                            <option value="s14">Généraliste</option>
                            <option value="s64">Acide lactique (lactates)</option>
                            <option value="s10">Acide urique</option>
                            <option value="s16">Albumine</option>
                            <option value="s21">Alpha-foetoprotéine (AFP)</option>
                            <option value="s23">Apo A / Apo b</option>
                            <option value="s24">CA 125 / CA 15.3 / CA 19.9</option>
                            <option value="s22">Calcium</option>
                            <option value="s22">Capacité de fixation du fer</option>
                            <option value="s22">Cholestérol total</option>
                            <option value="s22">Cortisol</option>
                            <option value="s22">Créatinine</option>
                            <option value="s22">CRP = Protéine C réactive</option>
                            <option value="s22">CTX (Crosslaps)</option>
                            <option value="s22">Ecbu</option>
                            <option value="s22">Electrophorèse des protéines</option>
                            <option value="s22">Estradiol</option>
                            <option value="s22">Fer sérique</option>
                            <option value="s22">Calcium</option>
                            <option value="s22">Calcium</option>
                            <option value="s22">Calcium</option>
                    </select><br />

               
                
                    <input type="date" class="form-control" name ="date" id="date" placeholder="date d'analyse"><br />
                
              
              
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
                       

   <?php
if(isset($erreur)) {
echo '<p><font style="color:red ;font-weight: 500;font-size: 0.78em;">'.$erreur."</font><p/>";

}
?>

 

 <button type="submit" class="btn btn-primary " ><span style="font-weight: bold; font-size: 0.8em;">Envoyer </span></button>
 <?php  } else{header("Location: connexionAssistante.php");}  ?>
</p>

</div>
    </div>
    </div>

 </div>
    </div>
    </div>
                    
              
    
    </form>


  
</body>
</html>
