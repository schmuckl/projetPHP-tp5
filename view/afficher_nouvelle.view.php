<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
    <link rel="stylesheet" href="../CSS/bootstrap.min.css">
    <link rel="stylesheet" href="../CSS/style.css">
  </head>
  <body>
  <div class="nav-wrapper">
    <a 
      href="../controler/afficher_flux.ctrl.php" 
      class="nav-item">
      Retour à l'acceuil
    </a>
  </div>

    <div class="container-fluid orange ligne">
      <h4><?= $nouvelle->getTitre() ?></h5>
      <h6><?= $nouvelle->getDate() ?></h6>
    </div>

    <p><?=$nouvelle->getDescription()?></p>
    <!-- Si l'image n'est pas stockée dans la BD alors il n'y a pas d'image à afficher -->
    <?php if (file_exists($nouvelle->getImage())) {?>
      <img src="<?= $nouvelle->getImage()?>" alt="riplimage">
    <?php } ?>
    <br>
    <a href="<?= $nouvelle->getUrl()?>"> Article complet </a>
  </body>
</html>
