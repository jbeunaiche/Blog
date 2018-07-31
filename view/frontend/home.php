<?php $title = 'Mon blog'; ?>

<?php ob_start(); ?>
<?php $allowed = "<div><p><span><br><ul><li><strong><em>"; ?>

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
foreach ($posts as $val)
{
?>
    <br><br>

    <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
            
            <div class="card mb-3">
                <img class="card-img-top" src='public/images/alaska.jpg' alt="Card image cap">
                <div class="card-body">
                    <h5 class="card-title"><?= strip_tags($val->getTitle(),$allowed); ?></h5>
                    <p class="card-text"><?= strip_tags($val->getContent(),$allowed); ?></p>
                    <p class="card-text"><small class="text-muted">Publié <em>le <?= $val->getCreated(); ?></em></small></p>
                 <em><a href="index.php?action=post&amp;id=<?= htmlspecialchars($val->getId()); ?>">Commentaires</a></em>   
                </div>
            </div>

               
            
            <hr>

        </div>
    </div>


    <?php
}

?>


    <?php $content = ob_get_clean(); ?>

    <?php require('template.php'); ?>
