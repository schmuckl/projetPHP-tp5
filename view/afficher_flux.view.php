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

    <?php
    foreach ($tab as $key) { ?>
      <a href="<?= $key.getUrl() ?>"> <<?= $key.getTitre() ?> </a> <br>
    <?php } ?>

    <br>
  </body>
</html>
