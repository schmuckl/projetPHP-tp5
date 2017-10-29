<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Nouvelles</title>
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
      <a 
       href="../controler/afficher_nouvelles_img.ctrl.php?RSS_id=<?=$RSS_id?>"
       class="nav-item">
        Images
      </a>

    </div>
    
    <h1 style="text-align:center;"> <?= $titre?> </h1>
        
    <?php foreach ($nouvelles as $nouvelle) { ?>
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
      <br><br><br><br>
    <?php } ?>
  </body>
</html>
