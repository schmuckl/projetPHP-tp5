<?php



  // Chercher un moyen pour éviter de déclarer un DAO a chaque fois




  require_once('../model/DAO.class.php');

  $dao = new DAO();

  // On créé les flux
  $flux = array();
  $leMonde = new RSS();
  $leMonde->setUrl('http://www.lemonde.fr/m-actu/rss_full.xml');
  $flux[] = $leMonde;
  $figaro = new RSS();
  $figaro->setUrl('http://www.lefigaro.fr/rss/figaro_sante.xml');
  $flux[] = $figaro;

  // On créé tous le(s) flux dans la BD (ne fait rien si déjà créé)
  // Et on met à jour ses attributs
  foreach ($flux as $flu) {
    $dao->createRSS($flu->getUrl());
    $flu->update();
    $dao->updateRSS($flu);
  }

  // On récupère un tab d'id
  $q = $dao->db()->prepare('SELECT id FROM RSS');
  $q->execute();
  $tabId = $q->fetchAll(PDO::FETCH_COLUMN, 0);

  include('../view/afficher_flux.view.php');
?>
