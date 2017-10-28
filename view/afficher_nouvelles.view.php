<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Nouvelles</title>
  </head>
  <body>
    <a href="../controler/afficher_nouvelles_img.ctrl.php?RSS_id=<?=$RSS_id?>">Images</a>

        <?php foreach ($nouvelles as $nouvelle) { ?>
              <h4><?= $nouvelle->getTitre() ?></h5>
              <h6><?= $nouvelle->getDate() ?></h6>
              <p><?=$nouvelle->getDescription()?></p>
              <!-- Si l'image n'est pas stockée dans la BD alors il n'y a pas d'image à afficher -->
              <?php if (file_exists($nouvelle->getImage())) {?>
                <img src="<?= $nouvelle->getImage()?>" alt="riplimage">
              <?php } ?>
              <br>
              <a href="<?= $nouvelle->getUrl()?>"> Article complet </a>
            <br><br><br><br>
        <?php } ?>
  </body>
</html>
<form action="../controler/afficher_nouvelles_img.ctrl.php?RSS_id=<?=$RSS_id?>" style="text-align:right;">
  <input type="submit" value="Images seulement" >
</form>
