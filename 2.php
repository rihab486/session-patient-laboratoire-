
  <?php
session_start();
$servername = "localhost";
$username = "root";
$password = "";
// Connexion à la base de données
        try {
                $dbco = new PDO("mysql:host=$servername", $username, $password);
                $dbco->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
                $sql = "CREATE DATABASE IF NOT EXISTS patient";
                $dbco->exec($sql);
                $conn = new PDO("mysql:host=localhost;dbname=patient", 'root', '');
        
               
        } catch (PDOException $e) {
                echo "Erreur : " . $e->getMessage();
        }
        try {
        $conn = new PDO("mysql:host=localhost;dbname=patient", 'root', '');
        $sql = "create TABLE IF NOT EXISTS rdv(
                id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
                adresse VARCHAR(70),
                nompatient VARCHAR(70),
                prenompatient VARCHAR(70),
                specialite VARCHAR(70)
                );
                ";

        $conn->exec($sql);
        } catch (PDOException $e) {
        exit("Erreur:" . $e->getMessage());
        }
      


if (!empty($_POST['nom']) AND !empty($_POST['adresse']) AND !empty($_POST['prenom']) AND !empty($_POST['specialite'])) {


            $nompatient=$_POST['nom'];
           $prenompatient=$_POST['prenom'];
            $adressepatient=$_POST['adresse'];
            if ($_SESSION['nom']==$nompatient AND $_SESSION['prenom']==$prenompatient AND $_SESSION['adresse']==$adressepatient ) {
                # code...
            


            $reqmail = $conn->prepare("SELECT * FROM rdv WHERE adresse = ? AND nompatient = ? AND prenompatient = ?");//toujours premiérerement il faut préparer la requét
                   $reqmail->execute(array($adressepatient,$nompatient,$prenompatient));
                   $mailexist = $reqmail->rowCount();//compter les colonnes trouvé
                   if($mailexist == 0) {//càd si le email choisisé est unique

       

        // Insertion du message à l'aide d'une requête préparée
        $req = "INSERT into rdv(`adresse`,`nompatient`,`prenompatient`,`specialite`)
        VALUES (:aadresse,:anompatient,:aprenompatient,:aspecialite)";
        $stmt = $conn->prepare($req);
        $stmt->bindParam(':aadresse', $_POST['adresse'], PDO::PARAM_STR);
        $stmt->bindParam(':anompatient', $_POST['nom'], PDO::PARAM_STR);
        $stmt->bindParam(':aprenompatient', $_POST['prenom'], PDO::PARAM_STR);
        $stmt->bindParam(':aspecialite', $_POST['specialite'], PDO::PARAM_STR);
        $stmt->execute();

        } 
         
                   else {
                  $erreur = "vous avez déja pris un RDV!";
               }
               
        } else{ $erreur = "les coordonnées sont incorrectes!";}
      
         }else {
      $erreur = "Tous les champs doivent être complétés !";
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
  <form action="test1.php" method="POST" >
     <div class="container-fluid" style="background-color: ;">
        <div class="row">



           <div class="col-2,5" style="background-color: #3a6289 ;">

            <p class="" style="font-family:Trebuchet MS;display: flex; justify-content: center ;color: white;font-size: 1em; font-weight: 500;margin: 10px;">Laboratoire Detunisie</p>




                <br>
                
                  
             <p style="display: flex; justify-content: center ;color: white;font-size: 0.9em; font-weight: 500;margin: 10px;"><?php echo $_SESSION['nom']; ?></p>

               <div class="btn-group-vertical  " style="margin: 0px">
        
                 <a   href="choixpatient.php" class="monBoutton"> Prendre RDV </a>
                 <a   href="voirDateRDV.php" class="monBoutton"> Date d'analyse </a>

                <a href="envoyerMessagephp.php" class="monBoutton"> Mes messages</a></button>

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

    
        <div class="col " style="background-color:#F2F3F4 "  >
      
      <div class="row" style="background-color: ">

        <div class="col-12" style="background-color:white ;height: 37px; ">

          <ul class="nav offset-md-7 " style="background-color:; ">
        <li class="nav-item" style="background-color:">
          <a class="nav-link"  style="color: #007BFF;"  href="#"></a>
          </li>
         <li class="nav-item" >
           <a class="nav-link" style="color: #007BFF;font-size: 0.9em; font-weight: 500;"  href="#">Accueil </a>
         </li>
         <li class="nav-item">
           <a class="nav-link" style="color: #007BFF;font-size: 0.9em; font-weight: 500;" href="#"> Présentation </a>
         </li>
           <a class="nav-link" style="color: #007BFF;font-size: 0.9em; font-weight: 500;" href="#">Résultats</a>
         <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" style="color: #007BFF;font-size: 0.9em; font-weight: 500;" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Mon compte</a>
             <div class="dropdown-menu">
                
                <a style="color: #007BFF;font-size: 0.9em; font-weight: 500;"class="dropdown-item" href="#"><?php echo $_SESSION['nom']; ?></a>
                <a style="color: #007BFF;font-size: 0.9em; font-weight: 500;" class="dropdown-item" href="profil.php">Mon profil</a>
                <a style="color: #007BFF;font-size: 0.9em; font-weight: 500;" class="dropdown-item" href="deconnexion.php">Se déconnecter</a>
             </div>
          </li>     
      </ul>
    </div>

    <br>
    <br>



<div class="col">

     <div class="form-group">
               <br>
               <input  type="email" name ="adresse" id="adresse" class="form-control" placeholder="écrivez votre adresse svp"/><br />
               <input type="text" name ="nom" id="nompatient" class="form-control" placeholder="nom patient" /><br />
               <input  type="text" name ="prenom" id="prenompatient" class="form-control" placeholder="prenom patient"/><br />
               
               <select name="specialite" id="sexe" class="form-control" >
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
                    </select> </br>
               
<span class="text-center">  <?php

if (isset($_GET['a'])) {
    

  $erreur=$_GET['a'];
  echo $erreur;
}


elseif(isset($erreur)) {
echo '<font color="red">'.$erreur."</font>";

}
?></span> 



               <br>
               <br> 
             
               


               <?php echo "<button type='submit' class='btn btn-primary ' onclick='return confirm(\"voulez vous confirmer ces informations? \");' ><span style='font-weight: bold; font-size: 0.8em;'> Envoyer </span></button>" ; ?> 
                       

               

                  <button type="submit" class="btn btn-primary " ><a style="font-weight: bold; font-size: 0.8em";href="supprimerRDV.php"   onclick='return confirm("voulez vous supprimer cette demande? "); ' >Supprimer la demande</a> </button>
               

               <br>
            </div>
   
     
   




    
    
    
   </div>
    </div>
     </div>


 </div>
     </div>
  
    
  

  
    
  
    
  







       
       
        
    

       
     

 <style>
.con1{
  background: #fff;
  position: relative;
  margin-top: 20px;

}

.content_boost{
  padding: 10px 20px 20px;
}

.bout  :hover {
    background-color:red; 
</style>
    
                                                                    
                
</body>
</html>
