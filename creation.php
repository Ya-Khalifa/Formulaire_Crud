<?php
    require 'connexion_bd.php';
    $message='';
    if(isset($_POST['nom_prenom']) && isset($_POST['email']))
    {
        $nom_prenom = $_POST['nom_prenom'];
        $email = $_POST['email'];

        $insere_sql = 'INSERT INTO personnage(nom_prenom, email) VALUES(:nom_prenom, :email)'; //requete d'insertion

        $chargement = $connect->prepare($insere_sql); //preparation de la connexion de la base de données pour charger l'insertion
        if($chargement->execute([':nom_prenom' => $nom_prenom, ':email' => $email]))  ////execution de chargement tester en meme temps
        {
            $message = 'Données enregistrer avec succès!';
        }
    }
?>

<?php require 'header.php'; ?>
<div class="container">
    <div class="card mt-5">
        <div class="card-header">
        <h2>Creation du Personnage</h2>
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
                    <input type="text" name="nom_prenom" id="nom_prenom" class="form-control"/>
                </div>
                <!--adresse_email_personnage-->
                <div class = "form_group" >
                    <label for="email">Email</label>
                    <input type="text" name="email" id="email" class="form-control"/>
                </div>
                <!--bouton_de_creation_personnage-->
                <div class = "form_group mt-3" >
                    <button type="submit" class="btn btn-info">Creer Personnage</button>
                </div>
            </form>
        </div>
    </div>
</div>
<?php require 'footer.php'; ?>