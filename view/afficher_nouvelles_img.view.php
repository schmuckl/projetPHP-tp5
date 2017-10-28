<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Images</title>
  </head>
  <body>
    <h1>Images du flux</h1>
    <form action="../controler/afficher_nouvelles_img.ctrl.php">
      <input type="submit" value="Affichage normal">
    </form>
    <?php
    $i = 0;
    while ($i < sizeof($idNouvelles)) { ?>
      <a href=" <?= "afficher_nouvelle.ctrl.php?id=".$idNouvelles[$i]?>"><img src="<?= $nouvelles[i]->getImage() ?>" alt="riplimage"></a>
    <?php $i = $i+1
    } ?>

  </body>
</html>
