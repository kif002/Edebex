<?php 

   function verification_vacances($date,$periode){
         
   $date_timestamp = strtotime($date);
   $debut;
   $fin;
   
    switch($periode){
       
         case 'carnaval' : $debut = strtotime('2016-02-08'); 
                           $fin = strtotime('2016-02-12');  
                           break;
                           
         case 'paques' : $debut = strtotime('2016-03-28'); 
                         $fin = strtotime('2016-04-08');  
                          break;
                       
         case 'ete' :  $debut = strtotime('2016-07-01'); 
                       $fin = strtotime('2016-08-31');  
                        break;    
                  
         case 'toussaint' :  $debut = strtotime('2016-10-31'); 
                             $fin = strtotime('2016-11-04');  
                             break;        
                                                                            
         case 'noel' :  $debut = strtotime('2016-12-26'); 
                        $fin = strtotime('2016-12-31');  
                        break;                           
    }
   
  do {
      if($date_timestamp == $debut){
         header("Location: edebex.php?error=3 & periode=" . $periode); 
         exit();     
       }
   $debut = strtotime('+1 day',$debut); 
   } while ($debut <= $fin);
   
       
 }
 
 function verif_heure_ouvrable($heure){
      if($heure < 9 || $heure >= 17){
      header("Location: edebex.php?error=4"); 
      exit();    
    }
    return false;
 }


   $date = $_POST['date'] ;
   $heure = $_POST['temps'];
 
  // test si les champs du formulaire sont vides 
  if(empty($heure) || empty($date)){
     header("Location: edebex.php?error=1");
     exit();     
  }
  
  // test si jour férié 
  
  $feries = array('2016-05-04','2016-05-05','2016-05-06','2016-05-16','2016-09-27','2016-11-11');
  
   foreach($feries as $value){
       if(strcmp($date, $value) == 0){
           header("Location: edebex.php?error=2"); 
           exit();
        }
    }
    
    
   // test des periodes de vacances
   
   //carnaval
   verification_vacances($date,'carnaval');
   // Paques
   verification_vacances($date,'paques');
   // été
   verification_vacances($date,'ete');
   // Toussaint
   verification_vacances($date,'toussaint');
    // Noel
   verification_vacances($date,'noel');
    
    
   $table_heure = getdate(strtotime($heure));
   $table_date = getdate(strtotime($date));
   $j = $table_date['wday'];
   $h = $table_heure['hours'];
   $m = $table_heure['minutes'];
   
   
   if($j == 5){
      header("Location: edebex.php?error=5"); 
      exit();  
    }
   
   if((verif_heure_ouvrable($h))==false){
    
    for($i=0;$i<4;$i++){
       if($h == 12){
         $h += 1 ;
         $m += 30 ;   
        }
        $h += 1 ;        
     }
    
    if($m >= 60){
      $m = ($m-60); ;
      $h += 1 ;    
    }
    
   if((verif_heure_ouvrable($h))==false){
      header("Location: edebex.php?heure=" . $h . " & minutes=" . $m);
      exit();    
      }
  }
    

?>



 
 