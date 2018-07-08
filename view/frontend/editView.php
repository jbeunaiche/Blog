<?php $title = "Ajout d'article"; ?>
<?php ob_start(); ?>
<div class="container">

<h2>Ajout d'un article</h2>

<form action="index.php?action=editPost&amp;id=<?= $data['id']?>" method="post">
    <div>
        <label for="title">Titre</label><br />
        <input type="text" id="title" name="title" value="<?php $data['title']; ?>"  />
    </div>
    <div>
        <label for="content">Texte de l'article</label><br />
        <textarea id="content" name="content" value="<?php $data['content']; ?>"></textarea>
    </div>
    <div class="col-md-offset-3 col-md-9">
                <input type="submit" class="btn btn-default" name="add" value="Mettre à jour l'article" />
            </div>
</form>

<p><a href="index.php">Retour à l'Accueil</a></p>
</div>

<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>