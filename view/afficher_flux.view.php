<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Liste flux</title>
    <link rel="stylesheet" href="../CSS/bootstrap.min.css">
    <link rel="stylesheet" href="../CSS/style.css">
  </head>
  <body>
  <div class="container-fluid orange">
    <h1 style="text-align:center;">Flux</h1>
    <br>
    <h4 style="text-align:center;">
      Affichage des différents flux d'informations
    </h4><br>
  </div>
    <ol class="rounded-list">
      <?php
      $i = 0;
      while ($i<sizeof($tabId)) { ?>
        <!-- changer en bouton ==> plus propre !-->
        <li class="ligne">
          <a href="<?= "afficher_nouvelles.ctrl.php?RSS_id=".$tabId[$i]?>">
            <?= $flux[$i]->getTitre()?>
          </a>
        </li>
      <?php $i = $i + 1;
      } ?>
    </ol>
    <br>
  </body>
</html>
