<?php $title = "Gestion des commentaires"; ?>

<?php ob_start(); ?>

<div class="container">
    <h2>Liste des commentaires de l'article : <?= htmlspecialchars($post['title']) ?></h2>



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
        while ($comment = $comments->fetch()) {
            ?>


                    <td>
                        <?php echo htmlspecialchars($comment['author']); ?>
                    </td>
                    <td>
                        <?php echo htmlspecialchars($comment['comment']); ?>
                    </td>
                    <td>
                        <?php echo htmlspecialchars($comment['comment_date_fr']); ?>
                    </td>

                    <td><a href="index.php?action=deleteCom&amp;id=<?= $comment['id']?>">Effacer le commentaire </a></td>
            </tr>

            <?php
        }
        
        ?>
        </tbody>
    </table>
<a class="nav-link" href="index.php?action=admin">Retour à l'administration du site</a>
</div>

<?php $content = ob_get_clean(); ?>

<?php require 'template.php'; ?>


 
 