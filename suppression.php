<?php
    require "connexion_bd.php";
    $id = $_GET['id'];
    $supprimer_sql = 'DELETE FROM personnage WHERE id=:id';
    $chargement = $connect->prepare($supprimer_sql);
    $chargement->execute([':id' =>$id ]);
    if($chargement->execute([':id' =>$id ]))
    {
        header("Location: index_form.php");
    }
?>