<?php $title = "Gestion des commentaires"; ?>

<?php ob_start(); ?>
<?php $allowed = "<div><p><span><br><ul><li><strong><em>"; ?>

<br>
<div class="container">
    <h2>Liste des commentaires de l'article :
        <?= strip_tags($post->getTitle(), $allowed) ?>
    </h2>
    <?php if(isset($_SESSION['flash'])) : ?>
    <div class="alert alert-danger" role="alert">
        <?= $_SESSION['flash']; ?>
    </div>
    <?php endif; ?>


    <table class="table table-hover table-dark">
        <thead>
            <tr>
                <th scope="col">Auteur</th>
                <th scope="col">Commentaire</th>
                <th scope="col">Date</th>
                <th scope="col">Supprimer</th>

            </tr>
        </thead>
        <tbody>
            <tr>
                <?php
foreach ($comment as $val) {
?>


                    <td>
                        <?php echo strip_tags($val->getAuthor(), $allowed); ?>
                    </td>
                    <td>
                        <?php echo strip_tags($val->getComment(), $allowed);; ?>
                    </td>
                    <td>
                        <?php echo htmlspecialchars($val->getCreatedCom()); ?>
                    </td>

                    <td><a href="index.php?action=deleteCom&amp;id=<?= ($val->getId())?>">Effacer le commentaire </a></td>
            </tr>

            <?php
        }
        
        ?>
        </tbody>
    </table>
    <a href="index.php?action=admin"><button type="button" class="btn btn-outline-success">Administration du site</button></a>

</div>

<?php $content = ob_get_clean(); ?>

<?php require 'template.php'; ?>
