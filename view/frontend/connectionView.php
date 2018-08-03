<?php $title = "Connexion"; ?>

<?php ob_start(); ?>
<div class="container">

<h1>Connexion</h1>


<div ng-app="sample">
    <form class="form-horizontal"  method="post" action="index.php?action=loginMember">
        <div class="form-group">
            <label class="col-md-3 control-label" for="mail">Pseudo</label>
            <div class="col-md-4">
                <input id="pseudo" type="text" class="form-control" name="pseudo" ng-model="Text" />
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
                <input type="submit" class="btn btn-default" name="login" value="Je me connecte" />
            </div>
        </div>
        <div class="g-recaptcha" data-sitekey="6LfFD2QUAAAAAECggMAv9gV_rLN7PryYZ_5IZWIV"></div>
    </form>
    
</div>

<p><a href="index.php">Retour à l'accueil</a></p>
    
</div>
<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>