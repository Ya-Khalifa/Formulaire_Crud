<?php
    $serveur = 'mysql:host=localhost;dbname=info_pers';
    $utilisateur ='root';
    $motdepasse = ''; 
    $connect = new PDO($serveur,$utilisateur,$motdepasse);
    try
    {
        $connect = new PDO($serveur,$utilisateur,$motdepasse);
    }
    catch (PDOException $e)
    {
    
    }
?>