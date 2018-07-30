

<?php ob_start(); ?>
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

                
        

        <?php
}
?>
        <p><a href="index.php">Retour à l'Accueil</a></p>
</div>
<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>