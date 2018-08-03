<?php $title = "Ajout d'article"; ?>
<?php ob_start(); ?>


<div class="container">

<h2>Création d'un nouvel article</h2>

<form action="index.php?action=addPost&amp;id=" method="post">
    <div>
        <label for="title">Titre</label><br />
        <input type="text" id="title" name="title" >
    </div>
    <div>
        <label for="chapiter">Résumé</label><br />
        <textarea type="text" id="resume" name="resume" ></textarea>
    </div>
    <div>
        <label for="content">Texte de l'article</label><br />
        <textarea id="content" name="content"></textarea>
    </div>
    <div class="col-md-offset-3 col-md-9">
            <input type="submit" class="btn btn-default" name="add" value="Ajout de l'article" />
    </div>
</form>

<p><a class="nav-link" href="index.php?action=admin">Retour à l'administration du site</a></p>
</div>

<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>

<script src="https://cloud.tinymce.com/stable/tinymce.min.js"></script>
<script>tinymce.init({ selector:'textarea' });</script>