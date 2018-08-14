<?php $title = 'Un billet pour l\'alaska' ?>

<?php ob_start(); ?>
<?php $allowed = "<div><p><span><br><ul><li><strong><em>"; ?>

    <!-- Navigation -->

<nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
    <div class="container">
        <a class="navbar-brand" href="index.php">Accueil</a>
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          Menu
          <i class="fa fa-bars"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
            <?php if(!isset($_SESSION['pseudo'])) :?>
            <li class="nav-item">
              <a class="nav-link" href="index.php?action=loginMember">Connexion</a>
            </li>
            <?php endif; ?>
            <!-- Si l'utilisateur est connecté la partie administration et déconnexion apparait --> 
            
            <?php if(isset($_SESSION['pseudo'])) :?>
            <li class="nav-item">
                    <a class="nav-link" href="index.php?action=admin">Administration</a>
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
              <h1>Un billet pour l'Alaska</h1>
              <span class="subheading">Un blog de Jean Forteroche</span>
            </div>
          </div>
        </div>
      </div>
    </header>
    <!-- Deconnection message -->
<?php if(isset($_SESSION['flash'])) : ?>
<div class="alert alert-primary" role="alert">
    <?= $_SESSION['flash']; ?>
</div>
<?php endif; ?>

<?php
foreach ($posts as $val)
{
?>
    <!-- Main Content -->
  
    <div class="container">
      <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
          <div class="post-preview">
            <a href="index.php?action=post&amp;id=<?= htmlspecialchars($val->getId()); ?>">
              <h2 class="post-title">
                <?= strip_tags($val->getTitle(),$allowed); ?>
              </h2>
              <h3 class="post-subtitle">
                <?= strip_tags($val->getResume(),$allowed); ?>
              </h3>
            </a>
            <p class="post-meta">Créé par 
              Jean Forteroche
              le <?= $val->getCreated(); ?> </p>
          </div>
          <hr>
          
          
          
        </div>
      </div>
    </div>
    <?php
}

?>
<?php $content = ob_get_clean(); ?>
<?php require('template.php'); ?>
