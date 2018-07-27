<?php $title = htmlspecialchars($post['title']); ?>

<?php ob_start(); ?>
<div class="container">

<?php var_dump($post);?>
    <div class="news">
        <h3>
            <?= htmlspecialchars($post['title']) 
            ?>
                <em>le <?= $post['created'] ?></em>
        </h3>
<?php ($post['title']); ?>
        <p>
            <?= nl2br(htmlspecialchars($post['content'])) ?>
        </p>
    </div>

    <h2>Commentaires</h2>

    <form action="index.php?action=addComment&amp;id=<?= $post['id'] ?>" method="post">
        <div>
            <label for="author">Auteur</label><br />
            <input type="text" id="author" name="author" />
        </div>
        <div>
            <label for="comment">Commentaire</label><br />
            <textarea id="comment" name="comment"></textarea>
        </div>
        <div>
            <input type="submit" />
        </div>
    </form>

   
    <?php
   
foreach ($comments as $val)
{
?>
        <p><strong><?= htmlspecialchars($val->getAutor()) ?></strong> le
            <?= ($val->getCreatedCom()) ?>
        </p>
        <p>
            <?= htmlspecialchars($val->getComment()) ?>

                <em><a href="index.php?action=signalCom&amp;id=<?= htmlspecialchars($comment['id'])?>">Signaler le commentaire </a></em></p>
        <?php if(isset($_SESSION['flash'])) : ?>
        <div class="alert alert-primary" role="alert">
            <?= $_SESSION['flash']; ?>
        </div>
        <?php endif; ?>

        <?php
}
?>
        <p><a href="index.php">Retour à l'Accueil</a></p>
</div>
<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>