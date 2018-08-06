<?php $title = htmlspecialchars($post->getTitle()); ?>

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
            
          
            <li class="nav-item">
              <a class="nav-link" href=#comments>Commentaires de l'article</a>
            </li>
              <li class="nav-item">
                    <a class="nav-link" href="index.php?action=logout">Déconnexion</a>
            </li>
            
          </ul>
        </div>
      </div>
    </nav>

    <!-- Page Header -->
    <header class="masthead" style="background-image: url('public/images/post.jpg')">
      <div class="overlay"></div>
      <div class="container">
        <div class="row">
          <div class="col-lg-8 col-md-10 mx-auto">
            <div class="post-heading">
              <h1><?= strip_tags($post->getTitle(),$allowed);
            ?></h1>
              
              <span class="meta">Créé par
                Jean Forteroch le 
                <?= $post->getCreated() ?></span>
            </div>
          </div>
        </div>
      </div>
    </header>
<?php if(isset($_SESSION['flash'])) : ?>
        <div class="alert alert-danger" role="alert">
        <?= $_SESSION['flash']; ?>
        </div>
        <?php endif; ?>
    <!-- Post Content -->
    <article>
      <div class="container">
        <div class="row">
          <div class="col-lg-8 col-md-10 mx-auto">
          <?= strip_tags($post->getContent(),$allowed); ?>  
          </div>
        </div>
      </div>
    </article>

    <hr>
    <!-- Add comment -->
<div id="comments" class="container">
          <div class="card my-4">
            <h5 class="card-header">Laissez un commentaire</h5>
            <div class="card-body">
              <form action="index.php?action=addComment" method="post">
                <div class="form-group">
                  <label for="author">Auteur</label><br />
                  <textarea class="form-control" rows="1" id="author" name="author"></textarea>
                </div>
                <div class="form-group">
                  <label for="comment">Commentaire</label><br />
                  <textarea class="form-control" rows="3" id="comment" name="comment"></textarea>
                </div>
                <input type="hidden" name="postId" value="<?=$post->getId();?>"/>
                <button type="submit" class="btn btn-primary">Validé</button>
              </form>
            </div>
          </div>

    <!-- Comments -->
    <?php
 
foreach ($comment as $val)
    
{
?>
          <div class="media mb-4">
            
            <div class="media-body">
              <h5 class="mt-0"><?= strip_tags($val->getAuthor(), $allowed); ?> le
            <?= ($val->getCreatedCom()); ?></h5>
              <?= strip_tags($val->getComment(), $allowed); ?> <a href="index.php?action=signalCom&amp;id=<?= htmlspecialchars($val->getId())?>">(Signaler le commentaire)</a>
        
            </div>
          </div>
        <hr>

                 <?php
}
?> 
    
  </div>       

   
<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>
