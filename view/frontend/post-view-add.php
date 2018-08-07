<?php $title = "Ajout d'article"; ?>
<?php ob_start(); ?>
<?php $allowed = "<div><p><span><br><ul><li><strong><em>"; ?>

<!-- create a new post -->
<nav class="navbar navbar-light bg-light">
  <a class="navbar-brand" href="index.php?action=admin">
    
    Administration
  </a>
</nav>
<br/>
<div class="container">
    
<h2>Création d'un nouvel article</h2>

<form action="index.php?action=addPost&amp;id=" method="post">
    <div>
        <label for="title">Titre</label><br/>
        <input type="text" id="title" name="title" >
    </div>
    <div>
        <label for="chapiter">Résumé</label><br/>
        <textarea type="text" id="resume" name="resume" ></textarea>
    </div>
    <div>
        <label for="content">Texte de l'article</label><br />
        <textarea id="content" name="content"></textarea>
    </div>
    <br>
            <input type="submit" class="btn btn-outline-success" name="add" value="Ajouter l'article" />
    
</form>

</div>

<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>

<!-- Script pour générer TINYMCE -->

<script src="https://cloud.tinymce.com/stable/tinymce.min.js"></script>
<script>tinymce.init({ selector:'textarea' });</script>