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

  // On actualise le(s) flux dans la BD
  foreach ($flux as $flu) {
    $dao->createRSS($flu->getUrl());
  }

  // On met à jour ses attributs
  // A
  // DEPLACER,
  // CHARGER
  // QUAND
  // CLIQUE
  // UNIQUEMENT
  $leMonde->update();
  $dao->updateRSS($leMonde);
  $figaro->update();
  $dao->updateRSS($figaro);

  // On récupère tous les flux RSS à afficher dans afficher_flux.view.php
  $q = $dao->db()->prepare('SELECT * FROM RSS');
  $q->execute();
  $tabRss = $q->fetchAll(PDO::FETCH_CLASS, "RSS");

  // On récupère un tab d'id
  $q = $dao->db()->prepare('SELECT id FROM RSS');
  $q->execute();
  $tabId = $q->fetchAll(PDO::FETCH_COLUMN, 0);

  include('../view/afficher_flux.view.php');
?>
