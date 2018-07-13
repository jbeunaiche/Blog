<?php $title = 'Mon blog'; ?>

<?php ob_start(); ?>


<!-- Navigation -->
<nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
    <div class="container">

        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          Menu
          <i class="fa fa-bars"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="index.php?action=loginMember">Connexion</a>
                </li>
                <?php if(isset($_SESSION['pseudo'])) :?>
                <li class="nav-item">
                    <a class="nav-link" href="index.php?action=admin">Administration</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="index.php?action=addMember">Inscription</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="index.php?action=logout">Déconnexion</a>
                </li>
                <?php endif; ?>
            </ul>
        </div>
    </div>
</nav>

<!-- Page Header -->

<header class="masthead" style="background-image: url('public/images/home.jpg')">
    <div class="overlay"></div>
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-10 mx-auto">
                <div class="site-heading">
                    <h1>Mon blog </h1>

                </div>
            </div>
        </div>
    </div>
</header>
<?php if(isset($_SESSION['flash'])) : ?>
<div class="alert alert-primary" role="alert">
    <?= $_SESSION['flash']; ?>
</div>
<?php endif; ?>
<!-- Main Content -->


<?php
while ($data = $posts->fetch())
{
?>
    <br><br>

    <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
            <div class="post-preview">

                <h2 class="post-title">
                    <?= htmlspecialchars($data['title']) ?>

                </h2>
                <p class="post-subtitle">
                    <?= nl2br(htmlspecialchars($data['content'])) ?>
                </p>

                <p class="post-meta">Publié <em>le <?= htmlspecialchars($data['creation_date_fr']) ?></em> </p>

                <em><a href="index.php?action=post&amp;id=<?= htmlspecialchars($data['id']) ?>">Commentaires</a></em> <br>
                <?php if(isset($_SESSION['pseudo'])) :?>
                <em> <a href="index.php?action=deletePost&amp;id=<?= htmlspecialchars($data['id'])?>">Effacer l'article</a> </em><br>
                <em><a href="index.php?action=addPost">Ajouter un article</a> </em>
                <br>

                <?php endif; ?>
            </div>
            <hr>

        </div>
    </div>


    <?php
}
$posts->closeCursor();
?>


    <?php $content = ob_get_clean(); ?>

    <?php require('template.php'); ?>
