


<!DOCTYPE html>
<html lang="en">
<head>
  
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulaire</title>
</head>
<link rel="stylesheet" href="style.css">
    
    <div class="title">Inscriptions de nouveaux patients</div>
    <?php include("test.php"); ?>
    <form method="POST" action="test.php">
        <input  type= "text" name="nom"   id="nom" placeholder="Nom"/><br />
        <input  type= "text" name ="prenom"  id="prenom" placeholder="Prenom" /><br />
        <input  type= "number" name="numero_de_telephone"  id="numéro_de_téléphone" placeholder="Numero de Telephone"/><br />
        <input type= "number" name="cin"  id="cin" placeholder="Cin"/><br />
       
        
        <select name="sexe" id="sexe" >
            <option value="Masculin">Masculin</option>
            <option value="Feminin">Feminin</option>
        </select></br>
            
        <input type="date" name ="date_de_naissance" id="date_de_naissance"></br>     
        
            <input type="submit" value="Envoyer"  /> 
            
       
          <?php
if(isset($erreur)) {
echo $erreur;

}
        ?>
   
    </from>


    
</body>
</html>



<!-- a9rahom okkk
    * matsammich variable bil accent  
        faux : "numéro_de_téléphone"
        vrai : "numero_de_telephone"
    * min lmostahsen matesta3melch label , esta3mel paceholder illi fi wasst el input
-->

