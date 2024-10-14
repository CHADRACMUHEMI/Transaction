<?php
    try{
        $con=new PDO("mysql: host=localhost;dbname=bdd_transaction","root","");
       
    
    }    
    catch(Exception $e){
        die("Erreur de connexion due aux donnees fournies pour connexion au fournisseur".$e->getMessage());
    }
?>