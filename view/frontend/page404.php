<?php $title = "Page 404"; ?>
<?php ob_start(); ?>

<nav class="navbar navbar-dark bg-dark">
    <div class="container">
        <a class="navbar-brand" href="http://forteroche.jbeunaiche.fr">Retour à l'accueil du site</a>
        
      </div>
    </nav><br><br>
<div style="text-align:center;font-size: 35px;" class="container">
<p>PAGE INTROUVABLE</p>
</div>



<?php $content = ob_get_clean();
?>
<?php
require('template.php');
?>