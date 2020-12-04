
<?php
session_start();
$servername = "localhost";
$username = "root";
$password = "";
if (isset($_SESSION['nom']) AND isset($_SESSION['prenom']) AND isset($_SESSION['adresse']) AND isset($_SESSION['id'])) { 
        try {
                $dbco = new PDO("mysql:host=$servername", $username, $password);
                $dbco->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
                $sql = "CREATE DATABASE IF NOT EXISTS formulaire";
                $dbco->exec($sql);
                $conn = new PDO("mysql:host=localhost;dbname=formulaire", 'root', '');
        
                
        
                // // creation de votre tableau 
        
        } catch (PDOException $e) {
                echo "Erreur : " . $e->getMessage();
        }



        try {
        $conn = new PDO("mysql:host=localhost;dbname=formulaire", 'root', '');
        $sql = "create TABLE IF NOT EXISTS forme(
                id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
                nom VARCHAR(70),
                prenom VARCHAR(70),
                numero_de_telephone VARCHAR(70),
                cin VARCHAR(70),
                sexe VARCHAR(70),
                date_de_naissance VARCHAR(70));
                ";


        $conn->exec($sql);
        } catch (PDOException $e) {
        exit("Erreur:" . $e->getMessage());
        }

if (empty($_POST['nom']) AND empty($_POST['prenom']) AND empty($_POST['numero_de_telephone']) AND empty($_POST['cin']) AND empty($_POST['sexe']) AND empty($_POST['date_de_naissance']) ) {  }

elseif (!empty($_POST['nom']) AND !empty($_POST['prenom']) AND !empty($_POST['numero_de_telephone']) AND !empty($_POST['cin']) AND !empty($_POST['sexe']) AND !empty($_POST['date_de_naissance']) ) {

            $reqmail = $conn->prepare("SELECT * FROM forme WHERE cin =? OR (nom=? AND prenom=?)");//toujours premiérerement il faut préparer la requét
                   $reqmail->execute(array($_POST['cin'],$_POST['nom'],$_POST['prenom']));
                   $mailexist = $reqmail->rowCount();//compter les colonnes trouvé
                   if($mailexist == 0) {

// Insertion du message à l'aide d'une requête préparée
$req = "INSERT into forme(`nom`,`prenom` ,`numero_de_telephone` ,`cin` , `sexe`, `date_de_naissance`)
VALUES (:anom,:aprenom,:anumero_de_telephone,:acin,:asexe,:adate_de_naissance)";
$stmt = $conn->prepare($req);
$stmt->bindParam(':anom', $_POST['nom'], PDO::PARAM_STR);
$stmt->bindParam(':aprenom', $_POST['prenom'], PDO::PARAM_STR);
$stmt->bindParam(':anumero_de_telephone', $_POST['numero_de_telephone'], PDO::PARAM_STR);
$stmt->bindParam(':acin', $_POST['cin'], PDO::PARAM_STR);
$stmt->bindParam(':asexe', $_POST['sexe'], PDO::PARAM_STR);
$stmt->bindParam(':adate_de_naissance', $_POST['date_de_naissance'], PDO::PARAM_STR);


$stmt->execute();


} else {
$erreur = "Vous avez déjà fait l'inscription !";
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
    <link rel="stylesheet" href="sty.css">
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


    
    <div class="title" style="background-color: #375D81;font-size: 4vh;">Inscriptions de nouveaux patients</div>
    <div class="container" style="text-align: center;">
        <div class="row">
     <div class="col-5" style="position: relative;left: 29% ;"> 
        <br>

    <form method="POST" action="test.php">
        <div class="form-group">
        <input style="" type= "text" name="nom"  class="form-control" id="nom" placeholder="Nom"/></div><br>
        <div class="form-group">
        <input  type= "text" name ="prenom" class="form-control" id="prenom" placeholder="Prenom" /></div><br>
        <div class="form-group">
        <input  type= "number" name="numero_de_telephone" class="form-control"  id="numéro_de_téléphone" placeholder="Numero de Telephone"/></div><br>
        <div class="form-group">
        <input type= "number" name="cin"  id="cin" class="form-control" placeholder="Cin"/></div><br>
       
        <div class="form-group" >
        <select name="sexe" id="sexe" class="form-control" style="border-color:#B0E0E6; ">
            <option value="Masculin">Masculin</option>
            <option value="Feminin">Feminin</option>
        </select>
        </div><br>

        <div class="form-group" >
        <input type="date" name ="date_de_naissance" id="date_de_naissance" class="form-control"></br>     
        </div>
          
   
            
             <button type="submit" class="btn btn-primary btn-lg btn-block" style="height:40px;padding: 0px ;"><span style="font-weight: bold; font-size: 0.8em;">Créer un compte </span></button> 
             <?php
if(isset($erreur)) {
    echo("<br>");
echo '<font style="color:red ;font-weight: 500;font-size: 0.78em;">'.$erreur."</font>";

}
     }
 else{ header("Location: test1.php");} ?>
            
   
   
    </from>

</div>
</div>
</div>
    
</body>
</html>
