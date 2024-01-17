<?php
            

           
         $db_host='localhost';
         $db_name = "wandtech";
         $db_user= "root";
         $db_pass="";
                     
                     $radioTab= "worckImg";
                     try{
                         $dbco =  new PDO("mysql:host=$db_host;dbname=$db_name", $db_user, $db_pass);
                         $dbco->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                         
                         $sql = "CREATE TABLE $radioTab(
                                 Id INT (11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
                                descriptionWimg VARCHAR(255) NOT NULL,
                                categorie VARCHAR(255) NOT NULL,
                                baseimg INT(255) NOT NULL,
                                urlimg INT(255) NOT NULL);";
                         
                         $dbco->exec($sql);
                         echo 'Table bien créée !';
                     }
                     
                     catch(PDOException $e){
                       echo "Erreur : " . $e->getMessage();
                     }
                 ?>
         
         
                  