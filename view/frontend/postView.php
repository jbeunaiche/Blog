<?php $title = htmlspecialchars($post->getTitle()); ?>

<?php ob_start(); ?>
<?php $allowed = "<div><p><span><br><ul><li><strong><em>"; ?>

<div class="container">


    <div class="news">
        <h3>
            <?= htmlspecialchars($post->getTitle()) 
            ?>
                <em>le <?= $post->getCreated() ?></em>
        </h3>

        <p>
            <?= htmlspecialchars($post->getContent()); ?>
        </p>
    </div>

    <h2>Commentaires</h2>

    <form action="index.php?action=addComment" method="post">
        <div>
            <label for="author">Auteur</label><br />
            <input type="text" id="author" name="author" />
        </div>
        <div>
            <label for="comment">Commentaire</label><br />
            <textarea id="comment" name="comment"></textarea>
        </div>
        <div>
            <input type="hidden" name="postId" value="<?=$post->getId();?>"/>
            <input type="submit" />
        </div>
    </form>
<?php if(isset($_SESSION['flash'])) : ?>
        <div class="alert alert-primary" role="alert">
            <?= $_SESSION['flash']; ?>
        </div>
        <?php endif; ?>
   
    <?php
 
foreach ($comment as $val)
    
{
?>
        <p><strong><?= strip_tags($val->getAuthor(), $allowed); ?></strong> le
            <?= ($val->getCreatedCom()); ?>
        </p>
        <p>
            <?= strip_tags($val->getComment(), $allowed); ?>

                <em><a href="index.php?action=signalCom&amp;id=<?= htmlspecialchars($val->getId())?>">Signaler le commentaire </a></em></p>
        

        <?php
}
?>
        <p><a href="index.php">Retour à l'Accueil</a></p>
</div>
<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>