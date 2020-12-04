<?php

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
        $sql = "create TABLE IF NOT EXISTS connexion(
                id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
                nom VARCHAR(70),
                prenom VARCHAR(70),
                adresse VARCHAR(70),
                password VARCHAR(70),
                sexe VARCHAR(70),
                date_de_naissance VARCHAR(70));
                ";
        $conn->exec($sql);
        } catch (PDOException $e) {
        exit("Erreur:" . $e->getMessage());
        } 
if (empty($_POST['nom']) AND empty($_POST['prenom']) AND empty($_POST['adresse']) AND empty($_POST['password']) AND empty($_POST['sexe'])) {

  }
    
elseif (!empty($_POST['nom']) AND !empty($_POST['prenom']) AND !empty($_POST['adresse']) AND !empty($_POST['password']) AND !empty($_POST['sexe'])) {

  

            $reqmail = $conn->prepare("SELECT * FROM connexion WHERE adresse = ?");//toujours premiérerement il faut préparer la requét
                   $reqmail->execute(array($_POST['adresse']));
                   $mailexist = $reqmail->rowCount();//compter les colonnes trouvé
                   if($mailexist == 0) {//càd si le email choisisé est unique

       

     $req = "INSERT into connexion(`nom`,`prenom` ,`adresse` ,`password` , `sexe`, `date_de_naissance`)
      VALUES (:anom,:aprenom,:aadresse,:apassword,:asexe,:adate_de_naissance)";
         $stmt = $conn->prepare($req);

         $stmt->bindParam(':anom', $_POST['nom'] , PDO::PARAM_STR);//bindParam — Lie un paramètre à un nom de variable spécifique avant d'exécuté la requête.
         $stmt->bindParam(':aprenom', $_POST['prenom'], PDO::PARAM_STR);
         $stmt->bindParam(':aadresse', $_POST['adresse'], PDO::PARAM_STR);
         $stmt->bindParam(':apassword', $_POST['password'], PDO::PARAM_STR);
         $stmt->bindParam(':asexe', $_POST['sexe'], PDO::PARAM_STR);
         $stmt->bindParam(':adate_de_naissance', $_POST['date_de_naissance'], PDO::PARAM_STR);
         $stmt->execute();
                   
        } 
         
                   else{
                  $err = "Adresse mail déjà utilisée !";
               }
               
        
      
         }else {
      $err = "Tous les champs doivent être complétés !";
              }
              ?>



<?php
session_start();
$servername = "localhost";
$username = "root";
$password = "";
// Connexion à la base de données
        try {
                $dbco = new PDO("mysql:host=$servername", "root", "");
                $dbco->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
         
                $conn = new PDO("mysql:host=localhost;dbname=patient", 'root', '');
        
                
        
                // // creation de votre tableau 
        
        } catch (PDOException $e) {
                echo "Erreur : " . $e->getMessage();
        }
        
if(empty($_POST['login']) AND empty ($_POST['motdepasse'])) {
  }
elseif(!empty($_POST['login']) AND !empty ($_POST['motdepasse'])) {

$mailconnect=$_POST['login'];
$mdpconnect =$_POST['motdepasse'];
$requser = $conn ->prepare("SELECT * FROM connexion WHERE adresse = ? AND password = ?");
$requser->execute(array($mailconnect, $mdpconnect));
$userexist = $requser->rowCount();
if($userexist == 1) { //càd les infos entéées sont existés une seule fois bien sur 
$userinfo = $requser->fetch();
$_SESSION['nom'] = $userinfo['nom'];
$_SESSION['prenom'] = $userinfo['prenom'];
$_SESSION['adresse'] = $userinfo['adresse'];
$_SESSION['id'] = $userinfo['id'];
header("Location: accesPatient.php"); // si les conditions sont existées alors allez sur la pages profil.php tq nous étions parvenus à passer des variables de page en page via la méthode  GET  (en modifiant l'URL :  profil.php?variable=valeur ) donc en modifiant la valeur de variable
} else {
$erreur = "Mauvais mail ou mot de passe !";
}
} else {
$erreur = "Tous les champs doivent être complétés !";
}

 ?>





<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="style1.css">
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
<body  >
  <br>
  <h1 class="display-4" style=" text-align: center; margin: auto; color: #77ABD6;">Laboratoire Detunisie</h1>
  <br>
  <br>
  
  <div class="container-fluid" style="background-color: ;">
    <div class="row">
     <div class="col-6" style="background-color: ;"> 
     
           <div class="row">
            <div class="col-9 offset-2 " style="background-color: #375D81; position: relative;left: 30px ; border-radius: 10px 10px 0px 0px;">
        <br>
           <p class="text-center" style="color: white; font-weight: bold;">J'accède à mon compte</p>
            </div>
          </div>



        <div class="row">
           <div class="col-9 offset-2 " style="background-color: white ;border-radius: 0px 0px 10px 10px;position: relative;left: 30px ;" >
           <br>
             <form action="test1.php" method="POST" >
               <div class="form-group">
                 
                 <label for="exampleInputEmail1" style="font-size: 0.8em; font-weight: 500;">Adresse e-mail</label>   
                 <input  type="email" name="login" class="form-control"   id="exampleInputEmail1" placeholder="login" aria-describedby="emailHelp"/>
               </div>
               <div class="form-group">
                 <label for="exampleInputPassword1" style="font-size: 0.8em;font-weight: 500;">Mot de passe</label>
                 <input  type= "password" name="motdepasse"  class="form-control" id="exampleInputPassword1" placeholder="password"/>
               </div>
        <?php
if(isset($erreur)) {
echo '<font style="color:red ;font-weight: 500;font-size: 0.78em;">'.$erreur."</font>";
echo("<br>");
}?>
              <br>
               <button type="submit" class="btn btn-primary btn-lg btn-block" ><span style="font-weight: bold; font-size: 0.8em;">se connecter</span></button> 
               <br>
               <br>
              </form>
            </div> 
    </div>
  </div>
  
<div class="col-6"  style="background-color: ;">

       
             <div class="row">
            <div class="col-9" style="background-color: #375D81;position: relative;left: 30px ;  border-radius: 10px 10px 0px 0px;">
              <br>
        
           <p class="text-center" style="color: white; font-weight: bold;">Je n'ai pas de compte</p>
            </div>
          </div>
       <div class="row">
           <div class="col-9 rounded-top" style="background-color: white ;border-radius: 0px 0px 10px 10px;position: relative;left: 30px ;" >

           <form method="POST" action="test1.php"><br/>
            
               
               <div class="form-group"><input  type= "text" name="nom"  class="form-control"  id="nom" placeholder="Nom"/></div>
               <div class="form-group"><input  type= "text" name ="prenom" class="form-control" id="prenom" placeholder="Prenom" /></div>
               <div class="form-group"><input  type= "email" name="adresse" class="form-control" id="adresse" placeholder="adresse_email ou mobile"/></div>
               <div class="form-group"><input type= "password" name="password" class="form-control" id="password" placeholder="password"/></div>
               <div class="form-group"><select name="sexe" id="sexe" class="form-control" >sexe
                 <option value="Masculin">Masculin</option>
                 <option value="Feminin">Feminin</option>
               </select></div>
               <div class="form-group"> <input type="date" name ="date_de_naissance" class="form-control" id="date_de_naissance"></div>
                

  <?php
if(isset($err)) {
echo '<font style="color:red ;font-weight: 500;font-size: 0.78em;">'.$err."</font><br>";

}?>               
               
                 <br>
               <button type="submit" class="btn btn-primary btn-lg btn-block" ><span style="font-weight: bold; font-size: 0.8em;">Créer un compte </span></button> 
               <br>
               <br>
               </from>
             
           
         </div>
       </div>
    </div>



   </div>
 </div>
 
<br>
<br>




</body>
</html>



              

