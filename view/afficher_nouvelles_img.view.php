<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Images</title>
  </head>
  <body>
    <h1>Images du flux</h1>
    <form action="../controler/afficher_flux.ctrl.php">
	<input type="submit" value="Retour à l'acceuil">
    </form>
    <h3><a href="../controler/afficher_nouvelles.ctrl.php?RSS_id=<?=$RSS_id?>">Affichage normal</a></h3>
    <br/>
    <?php
    $i = 0;
    while ($i < sizeof($idNouvelles)) { ?>
      <a href=" <?= "afficher_nouvelle.ctrl.php?id=".$idNouvelles[$i]?>"><img src="<?= $nouvelles[$i]->getImage() ?>" alt="<?=$nouvelles[$i]->getTitre()?>   -   "></a>
    <?php $i = $i+1;
    } ?>

  </body>
</html>
