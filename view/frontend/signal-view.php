
<?php $title = "Commentaires signalés";

ob_start();

$allowed = "<div><p><span><br><ul><li><strong><em>";
?> <div class="container" > <h2> Commentaires signalés </h2>
<?php

foreach ($signaled as $val)
{
?> <p> <strong>
    <?= strip_tags($val->getAuthor(), $allowed); ?> </strong> le
<?= ($val->getCreatedCom()); ?> </p> <p>
<?= strip_tags($val->getComment(), $allowed); ?> <a href =
    "index.php?action=deleteCom&amp;id=<?= ($val->getId()) ?>" > Effacer le commentaire </a>
<?php
}
?> <p> <a href = "index.php?action=admin" > Retour à l 'administration</a></p> </div> <?php
$content = ob_get_clean();
?>
<?php
require('template.php');
?>