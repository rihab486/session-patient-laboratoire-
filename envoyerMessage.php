




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
      
    
<div id="ch">
    <form method="POST" action="envoyerMessagephp.php">
          <h4 for="ameliorer">
  
      
       <p>
         <p for="ameliorer" style="display: flex; text-align:; justify-content:; color: white;font-size: 0.9em;font-weight: 500; margin: 10px; color: #3a6289">
  écrivez votre message ici:</p>
       
       <textarea name="message" id="ameliorer" rows="10" cols="50"></textarea>    
   </p>

  


   <?php echo "<button type='submit' name='formconnexion' class='btn btn-primary' onclick='return confirm(\"voulez vous confirmer ces informations? \");' ><span style='font-weight: bold; font-size: 0.8em;'> Envoyer </span></button>" ; ?> 

</form>
<button type="submit" class="btn btn-primary " ><a style="font-weight: bold; font-size: 0.8em";href="voirRéponse.php"  >Voir Réponse</a> </button><br>









 

  </div>     
       </body>
</html>
 
