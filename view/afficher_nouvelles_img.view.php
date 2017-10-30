<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Images</title>
    <link rel="stylesheet" href="../CSS/bootstrap.min.css">
    <link rel="stylesheet" href="../CSS/style.css">
  </head>
  <body>

    <div class="container-fluid orange ligne">
      <div class="nav-wrapper">
        <a
          href="../controler/afficher_flux.ctrl.php"
          class="nav-item">
          Retour à l'acceuil
        </a>

        <a
          href="../controler/afficher_nouvelles.ctrl.php?RSS_id=<?=$RSS_id?>"
          class="nav-item">
          Affichage normal
        </a>
      </div>

      <h1 style="text-align:center;">Images du flux</h1>
    </div>

    <?php
    $i = 0;
    while ($i < sizeof($idNouvelles)) { ?>
      <a
        href=" <?= "afficher_nouvelle.ctrl.php?id=".$idNouvelles[$i]?>">
        <img src="<?=$nouvelles[$i]->getImage()?>"
        alt="<?=$nouvelles[$i]->getTitre()?>"><br>
      </a>
    <?php $i = $i+1;
    } ?>

  </body>
</html>
