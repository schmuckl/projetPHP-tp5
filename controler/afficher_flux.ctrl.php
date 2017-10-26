<?php
  require_once('../model/DAO.class.php');

  // On charge le flux du Monde
  $rss = new RSS();
  $rss->setUrl('http://www.lemonde.fr/m-actu/rss_full.xml');

  $dao = new DAO();
  // On rajoute le flux dans la BD
  $dao->createRSS($rss->getUrl());
  // On met à jour ses attributs
  $rss->update();
  $dao->updateRSS($rss);

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
