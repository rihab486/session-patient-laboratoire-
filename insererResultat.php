
<!DOCTYPE html>
<html lang="en">
<head>
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
    <form method="POST" action="insererResultatphp.php"><br/>
      <?php include("insererResultatphp.php"); ?>
        <br/>
        <br/>
        <br/>
     <div class="form-group" >
                
                    <input type="text" class="form-control" name ="nom" id="nom" placeholder="nom Patient">
                
            
                
               <input type="text" class="form-control" name ="prenom" id="prenom" placeholder="prénom patient">
                
                <input type="email" name ="adresse" class="form-control" id="adresse" placeholder="adresse Patient">
          
                <!-- <a class="l"> -->
                    <select class="" name="specialite" class="form-control">
                        
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
                    </select>

                <
                
                    <input type="date" class="form-control" name ="date" id="date" placeholder="date d'analyse">
                
              
              
   <p>
        l'état du résultat :<br />
       <input type="radio" name="etat" value="Négatif" id="" class="form-control" /> <label for="Négatif">Négatif</label><br />
       <input type="radio" name="etat" value="" id="Positif" class="form-control"/> <label for="Positif">Positif</label><br />


      <div class="form-check">
  <input class="form-check-input" type="radio"  name="etat" id="exampleRadios1" value="Négatif" checked>
  <label class="form-check-label" for="exampleRadios1">
    Négatif
  </label>
</div>
<div class="form-check">
  <input class="form-check-input" type="radio" name="etat" id="exampleRadios2" value="Positif">
  <label class="form-check-label" for="exampleRadios2">
   Positif
  </label>
</div>
                       

   <?php
if(isset($erreur)) {
echo '<font style="color:red ;font-weight: 500;font-size: 0.78em;">'.$erreur."</font>";

}
?>

 <button type="submit" class="btn btn-primary btn-lg btn-block" ><span style="font-weight: bold; font-size: 0.8em;">Envoyer </span></button>


                    <br/>
                 
              </p> 
            </li>
        </ul>
    </nav>
    </form>


  
</body>
</html>
