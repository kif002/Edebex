
 <!DOCTYPE html>
 <html>
 <head>
 <meta charset="utf-8" />
 <meta name="Author" content="D.Kevin" />
 <title> Envoi du courrier electronique au debiteur </title>
 </head>
 <body>
   <h1>Envoi du courrier electronique au debiteur</h1> 
   <?php if(isset($_GET['error'])){
             switch($_GET['error']){
                 case 1 :  echo '<font color="red"><h4> Calcul refusé : Un des deux champs sont vides ! </h4></font>'; 
                           break;
                 case 2 : echo '<font color="red"><h4> Calcul refusé : Votre date tombe sur un jour férié ! </h4></font>'; 
                          break ;
                 case 3 : echo '<font color="red"><h4> Calcul refusé : Votre date tombe dans les vacances de ' . $_GET['periode'] . ' ! </h4></font>'; 
                          break ;     
                 case 4 : echo '<font color="red"><h4> Calcul refusé : La facture ne peut pas etre approuvé en dehors des heures ouvrables ! </h4></font>'; 
                          break ;    
                          
                 case 5 : echo '<font color="red"><h4> Calcul refusé : pas de suivi de courrier le vendredi ! </h4></font>'; 
                          break ;                  
              
              }
            }
            
    ?>
   <h2>Rentrez une date et une heure pour l'approbation de la facture </h2>
   <form action="action.php" method="post">
   <p>
   <label> Votre date : </label>
   <input type="date" max="2016-12-31" min="2016-01-01" name="date">
   </p>
   <p>
   <label> Votre heure : </label>
   <input type="time" name="temps">
   </p>
   <p>
   <input type="submit" value="Envoi">
   <input type="reset" value="reset">
   </p>
   
   </form>
   
   <?php
    if(isset($_GET['heure'])){
        echo '<font color="blue"><h4> Le courrier sera envoyé vers ' . $_GET['heure'] . ' H ' . $_GET['minutes'] . ' minutes ! </h4></font>';  
    }
           
    ?>
   
   	 
 </body>
 </html> 