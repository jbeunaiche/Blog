<?php ob_start(); ?>
<?php $allowed = "<div><p><span><br><ul><li><strong><em>"; ?>
<div class="container">


    

    <h2>Commentaires signalés</h2>

    

   
    <?php
  
foreach ($signaled as $val)
    
{
?>
        <p><strong><?= htmlspecialchars($val->getAuthor()); ?></strong> le
            <?= ($val->getCreatedCom()); ?>
        </p>
        <p>
            <?= htmlspecialchars($val->getComment()); ?>

                
        <a href="index.php?action=deleteCom&amp;id=<?= ($val->getId())?>">Effacer le commentaire </a>

        <?php
}
?>
        <p><a href="index.php?action=admin">Retour à l'administration</a></p>
</div>
<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>