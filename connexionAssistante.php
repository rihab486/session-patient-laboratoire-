<?php
session_start();

$servername = "localhost";
$username = "root";
$password = "";
    

        try {
                $dbco = new PDO("mysql:host=$servername", $username,$password);
                $dbco->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        

    $sql = "CREATE DATABASE IF NOT EXISTS assistante";
                $dbco->exec($sql);
                $conn = new PDO("mysql:host=localhost;dbname=assistante", 'root', '');
        
              
        
                // // creation de votre tableau 
        
      } catch (PDOException $e) {
                echo "Erreur : " . $e->getMessage();
        }


if(empty($_POST['username']) AND empty ($_POST['password'])) {
    }
elseif(!empty($_POST['username']) AND !empty ($_POST['password'])) {

$mailconnect=$_POST['username'];
$mdpconnect =$_POST['password'];
$requser = $conn ->prepare("SELECT * FROM connexion WHERE adresse = ? AND password = ?");
$requser->execute(array($mailconnect, $mdpconnect));

$userexist = $requser->rowCount();
if($userexist == 1) { //càd les infos entéées sont existés une seule fois bien sur 
$userinfo = $requser->fetch();  
$_SESSION['nomAssistane'] = $userinfo['nom'];
$_SESSION['prenomAssistane'] = $userinfo['prenom'];
$_SESSION['adresseAssistane'] = $userinfo['adresse'];
$_SESSION['idAssistane'] = $userinfo['ID'];
header("Location: accesAssistante.php"); // si les conditions sont existées alors allez sur la pages profil.php tq nous étions parvenus à passer des variables de page en page via la méthode  GET  (en modifiant l'URL :  profil.php?variable=valeur ) donc en modifiant la valeur de variable
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
    <link rel="stylesheet" href="">
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
<link rel="stylesheet" href="style1.css">
<body>
	<form name="login" action="connexionAssistante.php" method="POST">
			
		

                      <br>


          <h1 class="display-4" style=" position: relative;left: 475px ; margin: auto; color: #77ABD6;">Laboratoire Detunisie</h1>
  <br>
  <br>
  <div class="container-fluid" style="background-color: ;">
    <div class="row">
     <div class="col-6" style="background-color: ;"> 
     
           <div class="row">

            <div class="col-9 offset-7 " style="background-color: #375D81;position: relative;left: 40px ;  border-radius: 10px 10px 0px 0px;">
        <br>
           <p class="text-center" style="color: white; font-weight: bold;">Bienvenue sur votre Espace</p>
            </div>

          </div>

        <div class="row">
           <div class="col-9 offset-7 " style="background-color: white ; position: relative;left: 40px ;border-radius: 0px 0px 10px 10px;" >
           <br>
          
               <div class="form-group">
                
                 <label for="exampleInputEmail1" style="font-size: 0.8em; font-weight: 500;">Identifiant</label>   
                 <input  type="email" name="username" class="form-control"   id="exampleInputEmail1" placeholder="login" aria-describedby="emailHelp"/>
               </div>
               <div class="form-group">
                 <label for="exampleInputPassword1" style="font-size: 0.8em;font-weight: 500;">Mot de passe</label>
                 <input  type= "password" name="password"  class="form-control" id="exampleInputPassword1" placeholder="password"/></div>
             

        <?php
if(isset($erreur)) {
echo '<font style="color:red ;font-weight: 500;font-size: 0.78em;">'.$erreur."</font><br>";

}?>
               <br>
              
               <button type="submit" class="btn btn-primary btn-lg btn-block" ><span style="font-weight: bold; font-size: 0.8em;">connexion</span></button> 
               <br>
              <br>
              
            </div>
          
      
    </div>
  </div>
</div>
				        
</form>











			



</body>
</html>

	