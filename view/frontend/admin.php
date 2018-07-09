<?php $title = 'Mon blog'; ?>

<?php ob_start(); ?>

<br><br>

<ul class="nav flex-column">
    <li class="nav-item">
        <a class="nav-link active" href="index.php?action=addPost">Ajouter un article</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="index.php?action=logout">Déconnexion</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="index.php">Retour à l'Accueil</a>
    </li>


</ul>



<?php
while ($data = $posts->fetch())
{
?>

    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-10 mx-auto">
                <div class="post-preview">

                    <h2 class="post-title">
                        <?= htmlspecialchars($data['title']) ?>
                    </h2>
                    <p>
                        <?= htmlspecialchars($data['content']) ?>
                    </p>



                    <em><a href="index.php?action=deletePost&amp;id=<?= $data['id']?>">Effacer l'article - </a></em>
                    <em><a href="index.php?action=edit&amp;id=<?= $data['id']?>">Modifier l'article -</a> </em>
                    <em><a href="index.php?action=editComment&amp;id=<?= $data['id'] ?>">Gérer les commentaires de l'article </a></em> <br>


                </div>
                <hr>


                <!-- Pager -->

            </div>
        </div>
    </div>

    <?php
}
$posts->closeCursor();
?>
    <?php $content = ob_get_clean(); ?>

    <?php require('template.php'); ?>