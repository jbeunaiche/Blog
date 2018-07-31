<?php $title = "Ajout d'article"; ?>
<?php ob_start(); ?>
<?php $allowed = "<div><p><span><br><ul><li><strong><em>"; ?>

<div class="container">

<h2>Ajout d'un article</h2>

<form action="index.php?action=editPost" method="post">
    <div>
        <label for="title">Titre</label><br />
        <input type="text" id="title" name="title" value="<?= htmlspecialchars($post->getTitle()); ?>"  />
    </div>
    <div>
        <label for="content">Texte de l'article</label><br />
        <textarea id="content" name="content" ><?= htmlspecialchars($post->getContent()); ?></textarea>
    </div>
    <div class="col-md-offset-3 col-md-9">
        <input type="hidden" name="id" value="<?= htmlspecialchars($post->getId())?>" />
                <input type="submit" class="btn btn-default" name="add" value="Mettre à jour l'article" />
            </div>
</form>

<p><a class="nav-link" href="index.php?action=admin">Retour à l'administration du site</a></p>
</div>

<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>
<script src="https://cloud.tinymce.com/stable/tinymce.min.js"></script>
<script>tinymce.init({ selector:'textarea' });</script>