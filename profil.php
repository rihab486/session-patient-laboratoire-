<?php
session_start();
$servername = "localhost";
$username = "root";
$password = "";

if (isset($_SESSION['nom']) AND isset($_SESSION['prenom']) AND isset($_SESSION['adresse']) AND isset($_SESSION['id'])) {
  
        try {
                $dbco = new PDO("mysql:host=$servername", $username,$password);
                $dbco->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $conn = new PDO("mysql:host=localhost;dbname=patient", 'root', '');
         } catch (PDOException $e) {
                echo "Erreur : " . $e->getMessage();
        }

          if(empty($_POST['adresse']) AND empty ($_POST['password']) AND empty ($_POST['motdepasse']) ){ }
          elseif(!empty($_POST['adresse']) AND !empty ($_POST['password']) AND !empty ($_POST['motdepasse']) ){
          	# code...
          
                  	  if($_POST['password']==$_POST['motdepasse']) {
                  	  	if ($_POST['adresse']==$_SESSION['adresse']) {
                  	  		# code...
                        $newadresse=$_POST['adresse'];
                        $id =$_SESSION['id'];
                        $newpassword=$_POST['password'];
                        $requser = $conn ->prepare("UPDATE connexion SET adresse = ? WHERE id = ?");
                        $requser->execute(array($newadresse,$id));

                        $insertmp = $conn->prepare("UPDATE connexion SET password= ? WHERE id = ?"); //modifier la ligne de la base 
                       $insertmp->execute(array($newpassword, $id));




                  header('Location: accesPatient.php'); }

                  else{ $reqmail = $conn->prepare("SELECT * FROM connexion WHERE adresse = ?");//toujours premiérerement il faut préparer la requét
                   $reqmail->execute(array($_POST['adresse']));
                   $mailexist = $reqmail->rowCount();//compter les colonnes trouvé
                   if($mailexist == 0) {
                  	    $newadresse=$_POST['adresse'];
                        $id =$_SESSION['id'];
                        $newpassword=$_POST['password'];
                        $requser = $conn ->prepare("UPDATE connexion SET adresse = ? WHERE id = ?");
                        $requser->execute(array($newadresse,$id));

                        $insertmp = $conn->prepare("UPDATE connexion SET password= ? WHERE id = ?"); //modifier la ligne de la base 
                       $insertmp->execute(array($newpassword, $id));

                  header('Location: accesPatient.php'); }
                  else{ $err = "Adresse mail déjà utilisée !";}


                   } }
                    else{
                  	$err = "confirmez   votre motdepasse  !";
                        } }
                        else{
                  	$err = "Tous les champs doivent être complétés  !";
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

<link rel="stylesheet" href="">
<body>
  <form name="login" action="profil.php" method="POST">
    <br>


          <h1 class="display-4" style=" text-align: center; margin: auto; color: #77ABD6;">Laboratoire Detunisie</h1>
  <br>
  <br>
  <div class="container-fluid" style="background-color: ;">
    <div class="row">
     <div class="col-6" style="background-color: ;"> 
     
           <div class="row">

            <div class="col-9 offset-7 " style="background-color: #375D81; position: relative;left: 30px ; border-radius: 10px 10px 0px 0px;">
        <br>
           <p class="text-center" style="color: white; font-weight: bold;">modifier mon mot de passe</p>
            </div>

          </div>

        <div class="row">
           <div class="col-9 offset-7 " style="background-color: white ;border-radius: 0px 0px 10px 10px;position: relative;left: 30px ;" >
           <br>
          
               <div class="form-group">
                 <br>
                 <label for="exampleInputEmail1" style="font-size: 0.8em; font-weight: 500;">nouveau adresse</label>   
                 <input  type="email" name="adresse" class="form-control"   id="exampleInputEmail1" placeholder="login" aria-describedby="emailHelp"/>
               </div>
               <div class="form-group">
                 <label for="exampleInputPassword1" style="font-size: 0.8em;font-weight: 500;">nouveau mot de passe</label>
                 <input  type= "password" name="motdepasse"  class="form-control" id="exampleInputPassword1" placeholder="password"/>
               </div>
               <div class="form-group">
                 <label for="exampleInputPassword1" style="font-size: 0.8em;font-weight: 500;">confirmer du nouveau Mot de passe</label>
                 <input  type= "password" name="password"  class="form-control" id="exampleInputPassword1" placeholder="password"/>
               </div>

        <?php
if(isset($err)) {
echo '<font style="color:red ;font-weight: 500;font-size: 0.78em;">'.$err."</font><br>";

}?>
               
               <br>
               <button type="submit" class="btn btn-primary btn-lg btn-block" ><span style="font-weight: bold; font-size: 0.8em;">confirmer</span></button> 
               <br>
               <br/>
              <?php }
 else{ header("Location: test1.php");} ?>
            </div>
          
      
    </div>
  </div>
</div>
				        
</form>












			



</body>
</html>
