
<?php $title = "Inscription"; ?>

<?php ob_start(); ?>
<div id="title">
<h1>Inscription</h1>
</div>

<div ng-app="sample">
    <form action="index.php?action=addMember&amp;id=" method="post">
    
        <div class="form-group">
            <label class="col-md-3 control-label" for="Pseudo">Pseudo</label>
            <div class="col-md-4">
                <input type="text" class="form-control" name="pseudo" />
            </div>
        </div>
        <div class="form-group">
            <label class="col-md-3 control-label" for="mail">Adresse Mail</label>
            <div class="col-md-4">
                <input type="email" class="form-control" name="mail" />
            </div>
        </div>
        <div class="form-group">
            <label class="col-md-3 control-label" for="password">Mot de passe</label>
            <div class="col-md-4">
                <input type="password" class="form-control" name="password"/>
            </div>
        </div>
        <div class="form-group">
            <label class="col-md-3 control-label" for="password2">Confirmer votre mot de passe</label>
            <div class="col-md-4">
                <input type="password" class="form-control" name="password2" />
            </div>
        </div>
        <div class="form-group">
            <div class="col-md-offset-3 col-md-9">
                <input type="submit" class="btn btn-default" name="register" value="Je m'inscris" />
            </div>
        </div>
    </form>
</div>

<?php
if (!empty($er_password)) {
    echo $er_password2;
}
?>


<p><a href="index.php">Retour à l'accueil</a></p>

<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>