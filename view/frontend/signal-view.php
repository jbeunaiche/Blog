<?php $title = "Commentaires signalés";

ob_start();

$allowed = "<div><p><span><br><ul><li><strong><em>";
?>

<!-- List of comments reported -->



<div class="card mb-3">
  <div class="card-header">
    <i class="fas fa-table"></i> Liste des articles signalés</div>
  <div class="card-body">
    <div class="table-responsive">
      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
          <tr>

            <th>Chapitre</th>
            <th>Auteur</th>
            <th>Commentaire</th>
            <th>Date</th>
            <th>Supprimer</th>
            <th>Modifier le statut du commentaire</th>

          </tr>
        </thead>
        <!-- Message d'alerte -->

        <?php if(isset($_SESSION['flash'])) : ?>
        <div class="alert alert-success" role="alert">
          <?= $_SESSION['flash']; ?>
        </div>
        <?php endif; ?>

        <?php
foreach($signaled as $val)

{
?>
          <tr>
            <td>
 <?php     var_dump($post) ?>
            
            <td>
              <?= strip_tags($val->getAuthor(), $allowed); ?>
            </td>
            <td>
              <?= strip_tags($val->getComment(), $allowed); ?>
            </td>
            <td>
              <?= htmlspecialchars($val->getCreatedCom()); ?>
            </td>
            <td><a href="index.php?action=deleteCom&amp;id=<?= ($val->getId()) ?>"><button type="button" class="btn btn-outline-danger">Supprimer</button></a></td>
            <td><a href="index.php?action=change&amp;id=<?= ($val->getId()) ?>"><button type="button" class="btn btn-outline-warning">Modifier le statut du commentaire</button></a></td>
            


          </tr>
          <?php
}

?>

      </table>
        <a href="index.php?action=admin"><button type="button" class="btn btn-outline-success">Administration du site</button></a>

    </div>
  </div>
</div>
<?php $content = ob_get_clean();
?>
<?php
require('template.php');
?>
