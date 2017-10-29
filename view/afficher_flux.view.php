<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Liste flux</title>
    <link rel="stylesheet" href="../CSS/bootstrap.min.css">
    <link rel="stylesheet" href="../CSS/style.css">
  </head>
  <body>
  <div class="container-fluid orange ligne">
    <h1 style="text-align:center;">Flux</h1>
    <br>
    <h5 style="text-align:center;"> Affichage des différents flux d'informations </h5><br>
  </div>
    <ul>
      <?php
      $i = 0;
      while ($i<sizeof($tabId)) { ?>
        <!-- changer en bouton ==> plus propre !-->
        <li class="ligne"> <a href="<?= "afficher_nouvelles.ctrl.php?RSS_id=".$tabId[$i]?>"> <?= $flux[$i]->getTitre()?> </a> <br> </li>
      <?php $i = $i + 1;
      } ?>
    </ul>
    <br>
  </body>
</html>
