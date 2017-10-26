<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>News du Monde</title>
  </head>
  <body>
    <h1 style="text-align:center;">Flux</h1>
    <br>
    <p> Affichage des différents flux d'informations :</p><br>

    <ul>
      <?php
      $i = 0;
      while ($i<sizeof($tabId)) { ?>
        <!-- changer en bouton ==> plus propre !-->
        <li> <a href="<?= "afficher_nouvelles.ctrl.php?id=".$tabId[$i]?>"> <?= $tabRss[$i]->getTitre()?> </a> <br> </li>
      <?php $i = $i + 1;
      } ?>
    </ul>
    <br>
  </body>
</html>
