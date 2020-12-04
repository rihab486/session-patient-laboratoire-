<?php


    
try {
                      $conn2 = new PDO("mysql:host=localhost;dbname=patient", 'root', '');
                      $sql = "create TABLE IF NOT EXISTS ficheAnalyse(
                               id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
                               nom VARCHAR(70),
                               prenom VARCHAR(70),
                               adresse VARCHAR(70),
                               specialite VARCHAR(70),
                               dateRDV VARCHAR(70),
                               heure VARCHAR(70),
                               etat VARCHAR(70)

                );
                ";

                           $conn2->exec($sql);
                          } catch (PDOException $e) {
                          exit("Erreur:" . $e->getMessage());}

        

$query2 = "SELECT * FROM daterdvconfirme1 ORDER BY id ASC;";
  try {
    $pdo_select2 = $conn2->prepare($query2);
    $pdo_select2->execute();
    $NbreData2 = $pdo_select2->rowCount();    // nombre d'enregistrements (lignes)
    $rowAll2 = $pdo_select2->fetchAll();
  } catch (PDOException $e){ echo 'Erreur SQL : '. $e->getMessage().'<br/>'; die(); }
// --------------------------------
// affichage
if ($NbreData2 != 0) 
{      
    foreach ( $rowAll2 as $row2 ) 
    {
        $nom=$row2['nom'];
        $prenom=$row2['prenom'];
        $adresse=$row2['adresse'];
        $spe=$row2['specialite'];
        $date=$row2['dateRDV'];
        $heure=$row2['heure'];

        $query3  = $conn2->prepare("SELECT * FROM resultatP WHERE nomPatient = ? And prenomPatient = ? And adresse = ? And specialite = ? And dateRD = ? ");

        try {
    
        $query3 ->execute(array($nom,$prenom ,$adresse,$spe,$date));
        $NbreData3 = $query3 ->rowCount();    // nombre d'enregistrements (lignes)
        
        } catch (PDOException $e){ echo 'Erreur SQL : '. $e->getMessage().'<br/>'; die(); }

       if($NbreData3 == 1) { $rowAll3 = $query3 ->fetch();
                             $etat=$rowAll3['etat'];
                            
                            $query4  = $conn2->prepare("SELECT * FROM ficheAnalyse WHERE nom = ? AND prenom = ?AND adresse = ? AND specialite = ? AND dateRDV = ? AND heure=?  ");
                           try {  $query4 ->execute(array($nom,$prenom ,$adresse,$spe,$date,$heure)); 
                             $NbreData4 = $query4 ->rowCount();} catch (PDOException $e){ echo 'Erreur SQL : '. $e->getMessage().'<br/>'; die(); }
                             if ($NbreData4==0) {
                                 
                    
                           $req3 = "INSERT into ficheAnalyse(`nom`,`prenom` ,`adresse` ,`specialite` , `dateRDV`, `heure`, `etat`)
                           VALUES (:anom,:aprenom,:aadresse,:aspecialite,:adateRDV,:aheure,:aetat)";
                           $stmt = $conn2->prepare($req3);

                             $stmt->bindParam(':anom', $nom , PDO::PARAM_STR);//bindParam — Lie un paramètre à un nom de variable spécifique avant d'exécuté la requête.
                             $stmt->bindParam(':aprenom', $prenom, PDO::PARAM_STR);
                             $stmt->bindParam(':aadresse', $adresse, PDO::PARAM_STR);
                             $stmt->bindParam(':aspecialite', $spe, PDO::PARAM_STR);
                             $stmt->bindParam(':adateRDV', $date, PDO::PARAM_STR);
                             $stmt->bindParam(':aheure', $heure, PDO::PARAM_STR);
                             $stmt->bindParam(':aetat', $etat, PDO::PARAM_STR);
                             $stmt->execute();}

                             elseif($NbreData4==1){ $req3 = $conn2 ->prepare("UPDATE ficheAnalyse SET etat = ? WHERE nom = ? AND prenom = ? AND adresse = ? AND specialite = ? AND dateRDV = ? AND heure=?  ");
                             $req3->execute(array($etat,$nom,$prenom ,$adresse,$spe,$date,$heure));}



                   
        } elseif ($NbreData3 == 0) {
                               $query5  = $conn2->prepare("SELECT * FROM ficheAnalyse WHERE nom = ? And prenom = ? And adresse = ? And specialite = ? And dateRDV = ? AND heure=?  ");
                           try {  $query5 ->execute(array($nom,$prenom ,$adresse,$spe,$date,$heure)); 
                             $NbreData5 = $query5 ->rowCount();} catch (PDOException $e){ echo 'Erreur SQL : '. $e->getMessage().'<br/>'; die(); }
                             if ($NbreData5==0) {
                            

                             $req3 = "INSERT into ficheAnalyse(`nom`,`prenom` ,`adresse` ,`specialite` , `dateRDV`, `heure`)
                           VALUES (:anom,:aprenom,:aadresse,:aspecialite,:adateRDV,:aheure)";
                           $stmt = $conn2->prepare($req3);

                             $stmt->bindParam(':anom', $nom , PDO::PARAM_STR);//bindParam — Lie un paramètre à un nom de variable spécifique avant d'exécuté la requête.
                             $stmt->bindParam(':aprenom', $prenom, PDO::PARAM_STR);
                             $stmt->bindParam(':aadresse', $adresse, PDO::PARAM_STR);
                             $stmt->bindParam(':aspecialite', $spe, PDO::PARAM_STR);
                             $stmt->bindParam(':adateRDV', $date, PDO::PARAM_STR);
                             $stmt->bindParam(':aheure', $heure, PDO::PARAM_STR);
                            
                             $stmt->execute();

                                  }}
        } }
    else{ $Erreur="pas des informations ";} ?>