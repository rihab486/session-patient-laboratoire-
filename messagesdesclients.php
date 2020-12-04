<?php
session_start();
if (isset($_SESSION['nomAssistane']) AND isset($_SESSION['prenomAssistane'] ) AND isset($_SESSION['adresseAssistane']) AND isset($_SESSION['idAssistane']) ) {
$servername = "localhost";
$username = "root";
$password = "";
    

        try {
                $dbco = new PDO("mysql:host=$servername", $username,$password);
                $dbco->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        

                $conn = new PDO("mysql:host=localhost;dbname=assistante", 'root', '');
                } catch (PDOException $e) {
                echo "Erreur : " . $e->getMessage();
        }

 try {
                $dbco1 = new PDO("mysql:host=$servername", $username,$password);
                $dbco1->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        

  
                $conn1 = new PDO("mysql:host=localhost;dbname=patient", 'root', '');
        
                
        
                // // creation de votre tableau 
        
      } catch (PDOException $e) {
                echo "Erreur : " . $e->getMessage();
        }

?>

<!DOCTYPE html>
<html>
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
     <form action="voirMessagephp.php" method="GET" >

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

                <a href="tableauResultat.php" class="monBoutton"> Entrer les nouveaux résultats</a></button>

                  <a href="messagesdesclients.php" class="monBoutton" style="background-color: #2d4d6c;">voir les messages des patients</a></button>


                  


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




    <div class="col" style="background-color: ">

<p  style="display: flex;position: relative; right:10px; text-align:; justify-content:; color: white; font-size: 0.9em;font-weight: 500; margin: 10px; color: #3a6289;">les messages reçus:</p>
<?php
// --------------------------------
// La requête (exemple) : tous les "objets", classés par "id".
$query = "SELECT * FROM reponseMessage1 ORDER BY id ASC;";
  try {
    $pdo_select = $conn->prepare($query);
    $pdo_select->execute();
    $NbreData = $pdo_select->rowCount();    // nombre d'enregistrements (lignes)
    $rowAll = $pdo_select->fetchAll();
  } catch (PDOException $e){ echo 'Erreur SQL : '. $e->getMessage().'<br/>'; die(); }
// --------------------------------
// affichage
if ($NbreData != 0) 
{
?>

    <table class="table table-hover">
    <thead>
        <tr>
            <th style="color: white; font-size: 0.9em;font-weight: 500;color: black;text-align: center"><strong>id</strong></th>
            <th style="color: white; font-size: 0.9em;font-weight: 500;color: black;text-align: center"><strong>adresse</strong></th>
            <th style="color: white; font-size: 0.9em;font-weight: 500;color: black;text-align: center"><strong>date d'envoyer le message</strong></th>
             <th style="color: white; font-size: 0.9em;font-weight: 500;color: black; text-align: center"><strong>action</strong></th>
            
    </thead>
    <tbody>
<?php
    // pour chaque ligne (chaque enregistrement)
    foreach ( $rowAll as $row ) 
       
    { $message=$row['message'];
  
         $id      =$row['id'];
         $numeroMessage      =$row['numeroMessage'];

        // DONNÉES À AFFICHER dans chaque cellule de la ligne
?>
        <tr>
            <td style="color: white; font-size: 0.9em;font-weight: 500;color: black;text-align: center"><?php echo $row['id']; ?></td>
            <td style="color: white; font-size: 0.9em;font-weight: 500;color: black;text-align: center"><?php echo $row['adresse']; ?></td>
            <td style="color: white; font-size: 0.9em;font-weight: 500;color: black;text-align: center"><?php echo $row['dateClient']; ?></td>
            
            <td>
                    <center>
                       <?php  echo "<a style='font-weight: bold; font-size: 0.8em;color: white;height: 38px;padding: 9px ;' href='voirMessagephp.php?numeroMessage=$numeroMessage '   class='btn btn-primary'>Voir message  </a> "  ;?>
                       
                      

                      
                        <?php echo "<a style='font-weight: bold; font-size: 0.8em;color: white;height: 38px;padding: 9px ;' href='supprimerMessage.php?id=$id '  onclick='return confirm(\"voulez vous supprimer ce message? \");' class='btn btn-primary'>Supprimer message </a> "  ; ?>

                       
                    </center>
                </td>
             
        
<?php
    } // fin foreach
?>
    </tbody>
    </table>
<?php
} else { ?>
    <font style="display: flex; text-align:; justify-content:; color: white;font-size: 0.9em;font-weight: 500; margin: 10px; color:  #3a6289;" >pas de donnée à afficher</font>
<?php
}
?>
 <?php  } else{header("Location: connexionAssistante.php");}  ?>
</body>