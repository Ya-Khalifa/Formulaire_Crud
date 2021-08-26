<?php
    require 'connexion_bd.php';
    $id = $_GET['id']; //obtenir id de la base

    $recupfix_sql = 'SELECT * FROM personnage WHERE id=:id';
    $chargement = $connect ->prepare($recupfix_sql);
    $chargement ->execute([':id' => $id]);
    $personne = $chargement ->fetch(PDO::FETCH_OBJ);
    $message='';
    if(isset($_POST['nom_prenom']) && isset($_POST['email']))
    {
        echo $id;
        $nom_prenom = $_POST['nom_prenom'];
        $email = $_POST['email'];

        $insere_sql = 'UPDATE personnage SET nom_prenom=:nom_prenom, email=:email WHERE id=:id'; //requete de recuperation

        $chargement = $connect->prepare($insere_sql); //preparation de la connexion de la base de données pour charger l'insertion
        if($chargement->execute([':nom_prenom' => $nom_prenom, ':email' => $email, ':id' => $id ]))  ////execution de chargement tester en meme temps
        {
            $message = 'Données enregistrer avec succès!';
        }
        header("Location: index_form.php");
    }
?>

<?php require 'header.php'; ?>
<div class="container">
    <div class="card mt-5">
        <div class="card-header">
        <h2>Modification du Personnage</h2>
        </div>
        <div class="card-body">
            <?php if(!empty($message)): ?>
                <div class="alert alert-success">
                    <?php echo $message; ?>
                </div>
            <?php endif; ?>
            <form method = "post">
                <!--Nom&Prenom_personnage-->
                <div class = "form_group" >
                    <label for="nom_prenom">Nom</label>
                    <input value =" <?= $personne->nom_prenom; ?> " type="text" name="nom_prenom" id="nom_prenom" class="form-control"/>
                </div>
                <!--adresse_email_personnage-->
                <div class = "form_group" >
                    <label for="email">Email</label>
                    <input type="text" value =" <?= $personne->email; ?>" name="email" id="email" class="form-control"/>
                </div>
                <!--bouton_de_creation_personnage-->
                <div class = "form_group mt-3" >
                    <button type="submit" class="btn btn-info">Modifier Personnage</button>
                </div>
            </form>
        </div>
    </div>
</div>
<?php require 'footer.php'; ?>