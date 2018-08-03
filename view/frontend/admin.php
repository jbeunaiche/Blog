<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>Administration</title>
        <link href="public/css/styleadmin.css" rel="stylesheet" />
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
        <script src='https://www.google.com/recaptcha/api.js'></script>
        
    </head>
        
    <body>
<?php $allowed = "<div><p><span><br><ul><li><strong><em>"; ?>

    

    <div id="wrapper">

      <!-- Sidebar -->
      <ul class="sidebar navbar-nav">
        
        
        <li class="nav-item">
          <a class="nav-link" href="index.php">
            
            <span>Accueil</span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="index.php?action=logout">
            
            <span>Déconnexion</span></a>
        </li>
      </ul>

      <div id="content-wrapper">

        <div class="container-fluid">

          <!-- Breadcrumbs-->
          <ol class="breadcrumb">
            <li class="breadcrumb-item">Tableau de bord</li>
            <li class="breadcrumb-item ">Administration</li>
          </ol>

          <!-- Icon Cards-->
          <div class="row">
            <div class="col-xl-3 col-sm-6 mb-3">
              <div class="card text-white bg-primary o-hidden h-100">
                <div class="card-body">
                  <div class="card-body-icon">
                    <i class="fas fa-fw fa-comments"></i>
                  </div>
                  <div class="mr-5">Ajouter un article</div>
                </div>
                <a class="card-footer text-white clearfix small z-1" href="index.php?action=addPost">
                  <span class="float-left">Nouvel article</span>
                  <span class="float-right">
                    <i class="fas fa-angle-right"></i>
                  </span>
                </a>
              </div>
            </div>
            <div class="col-xl-3 col-sm-6 mb-3">
              <div class="card text-white bg-warning o-hidden h-100">
                <div class="card-body">
                  <div class="card-body-icon">
                    <i class="fas fa-fw fa-list"></i>
                  </div>
                  <div class="mr-5">Listes des articles</div>
                </div>
                <a class="card-footer text-white clearfix small z-1" href="#listpost">
                  <span class="float-left">Voir la liste</span>
                  <span class="float-right">
                    <i class="fas fa-angle-right"></i>
                  </span>
                </a>
              </div>
            </div>
            <div class="col-xl-3 col-sm-6 mb-3">
              <div class="card text-white bg-success o-hidden h-100">
                <div class="card-body">
                  <div class="card-body-icon">
                    <i class="fas fa-fw fa-shopping-cart"></i>
                  </div>
                  <div class="mr-5">Listes des commentaires signalés</div>
                </div>
                <a class="card-footer text-white clearfix small z-1" href="index.php?action=signaledComments">
                  <span class="float-left">Gérer les commentaires signalés</span>
                  <span class="float-right">
                    <i class="fas fa-angle-right"></i>
                  </span>
                </a>
              </div>
            </div>
            
          </div>

          

          <!-- DataTables Example -->
          <div  class="card mb-3">
            <div class="card-header">
              <i class="fas fa-table"></i>
              Liste des articles du blog</div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th id="listpost">Titre</th>
                      <th>Auteur</th>
                      <th>Date</th>
                      <th>Supprimer</th>
                      <th>Mise à jour </th>
                      <th>Commentaires de l'article </th>
                      
                    </tr>
                  </thead>
                  
                  
                  <?php

foreach($posts as $val)
{
?>
                    <tr>
                      <td><?= htmlspecialchars($val->getTitle()); ?></td>
                      <td><?= htmlspecialchars($val->getTitle()); ?></td>
                      <td><?= htmlspecialchars($val->getCreated()); ?></td>
                      <td><a href="index.php?action=deletePost&amp;id=<?= htmlspecialchars($val->getId()); ?>"><button type="button" class="btn btn-outline-danger">Supprimer</button></a></td>  
                      <td><a href="index.php?action=edit&amp;id=<?= htmlspecialchars($val->getId()); ?>"><button type="button" class="btn btn-outline-warning">Modifier</button></a></td>
                      <td><a href="index.php?action=editComment&amp;id=<?= htmlspecialchars($val->getId()); ?>"><button type="button" class="btn btn-outline-dark">Commentaires</button></a></td>  
                      
                      
                    </tr>
     <?php
}

?>                   
                  
                </table>
              </div>
            </div>
          </div>

        </div>
        <!-- /.container-fluid -->

       

      </div>
      <!-- /.content-wrapper -->

    </div>
 <footer class="page-footer font-small blue">

  <!-- Copyright -->
  <div class="footer-copyright text-center py-3">© 2018 Copyright:
    <a href="www.jbeunaiche.fr"> Beunaiche Julien</a>
  </div>
  <!-- Copyright -->

</footer>
        
        
        
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>
    </body>
</html>
