
<?php $title = "Inscription"; ?>

<?php ob_start(); ?>
<h1>Inscription !</h1>
<p><a href="index.php">Retour à l'accueil</a></p>


<form action="index.php?action=addMember&amp;id=" method="post">

            <input type="text" placeholder="Votre pseudo" name="pseudo">    
            <input type="email" placeholder="Adresse mail" name="mail">
            <input type="password" placeholder="Mot de passe" name="password">
            
            <button type="submit" >Je m'inscris</button>
</form>


<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>