<?php $title = "Modification de l'article"; ?>
<?php ob_start(); ?>
<?php $allowed = "<div><p><span><br><ul><li><strong><em>"; ?>

<nav class="navbar navbar-light bg-light">
  <a class="navbar-brand" href="index.php?action=admin">
    
    Administration
  </a>
</nav>
<br/>
<div class="container">

    <h2>Modification de l'article : <?=strip_tags($post->getTitle(), $allowed); ?>  </h2>

    <form action="index.php?action=editPost" method="post">
        <div>
            <label for="title">Titre</label><br />
            <input type="text" id="title" name="title" value="<?= strip_tags($post->getTitle(), $allowed); ?>" />
        </div>
        <div>
            <label for="resume">Résumé de l'article</label><br />
            <textarea id="resume" name="resume"><?= strip_tags($post->getResume(), $allowed); ?></textarea>
        </div>
        <div>
            <label for="content">Texte de l'article</label><br />
            <textarea id="content" name="content"><?= strip_tags($post->getContent(), $allowed); ?></textarea>
        </div>

        <div class="col-md-offset-3 col-md-9">
            <input type="hidden" name="id" value="<?= htmlspecialchars($post->getId())?>" />
            <br>
            <input type="submit" class="btn btn-outline-success" name="add" value="Mettre à jour l'article" />
        </div>
    </form>

</div>

<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>
<script src="https://cloud.tinymce.com/stable/tinymce.min.js"></script>
<script>
    tinymce.init({
        selector: 'textarea'
    });

</script>
