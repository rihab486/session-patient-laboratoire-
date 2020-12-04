<?php

ini_set("SMTP","ssl://smtp.gmail.com");
ini_set("smtp_port","465");



if (isset($_POST) && isset($_POST['nom'])  && isset($_POST['sujet'])  && isset($_POST['adresse'])  && isset($_POST['message'])) {

if (!empty($_POST['nom'])&& !empty($_POST['sujet'])&&
!empty($_POST['adresse'])&& !empty($_POST['message']) ) {

extract($_POST);
// pour affiche des \devant les "dans le message pour le stockage serveur
$destinataire="ghoffraneboucif4@gmail.com";
$msg=str_replace("\'", "'", $message);// enlever le \' ili  zédha wiraja3ha ' kima kénit 9bal 
$msg1="concernant le formulaire de contact \n
Nom: $nom \n
Email: $adresse \n
message:$msg";
$entete="From: $adresse" ;

if (mail($destinataire, $sujet, $msg1,$entete)){$erreur="le email a bien été envoyé" ;}

else{echo"echec";} 
}
else {$erreur= "des champs sont vides" ;}
   
}



  ?>





<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="pageGardeCss.css">
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
  

    <div class="container-fluid" >
   <div class="row" >
       <br>
   </div>

   <div class="row " >
      <div class="col-2,5 offset-9" style="background-color: ;">
         <button type="button" class="btn btn-info btn-sm"  ><span class="fa fa-lock" aria-hidden="true"></span> <a href="test1.php" style="color:white; text-decoration:none;">Accés Patients </a>  </button>
         <button type="button" class="btn btn-info btn-sm"><span class="fa fa-lock" aria-hidden="true"></span> Accés Assistante</button>
      </div>
   </div>
       <br>
</div>


<div class="container-fluid" style="background-color:#FFFFFF";>
  <div class="row">
    <div class="col-3,5 offset-8"  >
      <ul class="nav ">
         <li class="nav-item" style="color: #008194;">
           <a class="nav-link" style="color: #008194;"  href="#">Accueil </a>
         </li>
         <li class="nav-item">
           <a class="nav-link" style="color: #008194;" href="#"> Présentation </a>
         </li>
           
         <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" style="color: #008194;" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Accés serveur</a>
             <div class="dropdown-menu">
                <a class="dropdown-item" href="#">Accés Patients</a>
                <a class="dropdown-item" href="#">Accés Assistante</a>
      
          </li>
          <li class="nav-item">
            <a class="nav-link"  style="color: #008194;"  href="#">Contact</a>
          </li>
      </ul>
    </div>
  </div>
</div>


<div id="carouselExampleSlidesOnly" class="carousel slide" data-ride="carousel">
  <div class="carousel-inner">
    <div class="carousel-item active">
            <img class="d-block w-100 " src="image labo/no.jpg" alt="Second slide">
            <br>
                
            <div class="container">
              <div class="carousel-caption">

                <h1>Nous contacter</h1>
                <p> N'hésitez pas à nous contacter pour tout renseignement ou demande de services</p>
                
              </div>
            </div>
          </div>
          </div>




<div class="container ">
        <div class="row" style="color: white;">
          <div class="col-10  " style="background-color:;color: ;position: relative; left: 80px;">
            <br>
 <form action="contact.php" method="POST" >

     <p  style="display: flex; text-align:; justify-content:;  font-size: 0.9em;font-weight: 500; margin: 10px; color:black;">Formulaire de Contact</p>
     <p style="display: flex; text-align:; justify-content:;  font-size: 0.7em;font-weight: 500; margin: 10px; color:black;opacity:50%">Envoyer un e-mail. Tous les champs marqués d'un astérisque * sont obligatoires.</p>
                <div style="position: relative; left: 10px;" >
                     <div class="form-group" >
                         <label for="nom" style="font-size: 0.8em; font-weight: 500;color: black;">Nom <span style="color:#FF7F50 ">*</span></label>
                         <input type="text" name ="nom"  class="form-control" placeholder="" id="nom" />

                         <label for="email" style="font-size: 0.8em; font-weight: 500;color: black;">E-mail <span style="color:#FF7F50 ">*</span></label>
                         <input type="email" name ="adresse"  class="form-control" id="email" placeholder="" />

                         <label for="sujet" style="font-size: 0.8em; font-weight: 500;color: black;">Sujet <span style="color:#FF7F50 ">*</span></label>
                         <input  type="text" name ="sujet"  class="form-control" id="sujet" placeholder=""/><br />
               
                         <label for="message" style="font-size: 0.8em; font-weight: 500;color: black;">Message <span style="color:#FF7F50 ">*</span></label>
                         <textarea name="message" id="message" class="form-control" rows="10" cols="50"></textarea>
                     </div><br>

                     <?php
if(isset($erreur)) {
echo '<font style="color:red ;font-size: 0.8em;">'.$erreur."</font>";

}?>
   <br>
   

   <?php echo "<button type='submit' name='formconnexion' class='btn btn-primary' onclick='return confirm(\"voulez vous confirmer ces informations? \");' ><span style='font-weight: bold; font-size: 0.8em;'> Envoyer </span></button>" ; ?> 

   <br>
   <br>
               