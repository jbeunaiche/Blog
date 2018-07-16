<?php $title = 'Mon blog'; ?>

<?php ob_start(); ?>





<nav class="navbar navbar-inverse">
  <ul class="nav navbar-nav">
    <li><a href="index.php?action=addPost">Ajouter un article</a></li>
    <li><a href="index.php?action=logout">Déconnexion</a></li>
    <li><a href="index.php">Acueil du site</a></li>
  </ul>
  
</nav>

 <?php if(isset($_SESSION['flash'])) : ?>
<div class="alert alert-success" role="alert">
    <?= $_SESSION['flash']; ?>
</div>
<?php endif; ?>
<?php
while ($data = $posts->fetch())
{
?>

    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-10 mx-auto">
                <div class="post-preview">

                    <h2 class="post-title">
                    Article : <?= htmlspecialchars($data['title']) ?>
                    </h2>
                   



                    <em><a href="index.php?action=deletePost&amp;id=<?= htmlspecialchars($data['id'])?>">Effacer l'article - </a></em>
                    <em><a href="index.php?action=edit&amp;id=<?= htmlspecialchars($data['id'])?>">Modifier l'article -</a> </em>
                    <em><a href="index.php?action=editComment&amp;id=<?= htmlspecialchars($data['id']) ?>">Gérer les commentaires de l'article </a></em> <br>


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