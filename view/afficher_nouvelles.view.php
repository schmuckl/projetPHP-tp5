<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Nouvelles</title>
  </head>
  <body>
        <?php foreach ($nouvelles as $nouvelle) { ?>
            <!-- Pour le moment on affiche juste tout sans lien !-->
              <h4><?= $nouvelle->getTitre() ?></h5>
              <h6><?= $nouvelle->getDate() ?></h6>
              <p><?=$nouvelle->getDescription()?></p>
              <img src="<?= $nouvelle->getImage()?>" alt="riplimage">
              <br>
              <a href="<?= $nouvelle->getUrl()?>"> Article complet </a>
            <br><br><br><br>
        <?php } ?>
  </body>
</html>
