<?php 
    require 'connexion_bd.php';
    $recup_sql = 'SELECT * FROM personnage';             //recuperation de toute les attributs de la table personnage
    $chargement = $connect->prepare($recup_sql);         //preparation de la connexion de la base de données pour charger la recuperation 
    $chargement->execute();                              //execution de chargement
    $personnage = $chargement->fetchAll(PDO::FETCH_OBJ); //Traiter en php_objet tout ce qu'on a chargé
?>

<?php require 'header.php'; ?>

<div class="container">  <!-- Centré l'objet defini-->
    <div class="card mt-5">  <!-- Cadre_principal de magin 5px-->
        <div class="card-header"> <!--  Autre cadre collé au principal considéré comme corps -->
            <h2>Tous les Personnages</h2>
        </div>
        <div class="body-card">
            <table class = "table table-bordered">
                <tr>
                    <th>Id</th>
                    <th>Nom_Prenom</th>
                    <th>Email</th>
                    <th>Action</th>
                </tr>
                <?php foreach($personnage as $personne): ?>
                   <tr>
                       <td> <?= $personne->id; ?> </td>
                       <td> <?= $personne->nom_prenom; ?> </td>
                       <td> <?= $personne->email; ?> </td>
                       <td>
                           <a href="ajout.php?id=<?= $personne->id ?>" class = "btn btn-info"> Ajouter </a>
                           <a onclick="return confirm('Etes-vous sûr de supprimer')" href="suppression.php?id=<?= $personne->id ?>" class = "btn btn-danger"> Supprimer </a>
                       </td>
                    </tr>
                <?php endforeach; ?>
            </table>
        </div>
    </div>
</div>

<?php require 'footer.php'; ?>