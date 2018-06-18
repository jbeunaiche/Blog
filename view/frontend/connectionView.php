<?php $title = "Connexion"; ?>

<?php ob_start(); ?>
<div id="title">
<h1>Connexion</h1>
</div>

<div ng-app="sample">
    <form class="form-horizontal"  method="post" action="index.php?action=loginMember">
        <div class="form-group">
            <label class="col-md-3 control-label" for="mail">Email</label>
            <div class="col-md-4">
                <input id="mail" type="email" class="form-control" name="mail" ng-model="Email" />
            </div>
        </div>
        <div class="form-group">
            <label class="col-md-3 control-label" for="Password">Mot de passe</label>
            <div class="col-md-4">
                <input id="Password" type="password" class="form-control" name="password" ng-model="Password" />
            </div>
        </div>
        
        <div class="form-group">
            <div class="col-md-offset-3 col-md-9">
                <input type="submit" class="btn btn-default" name="register" value="Je me connecte" />
            </div>
        </div>
    </form>
</div>

<p><a href="index.php">Retour à l'accueil</a></p>

<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>