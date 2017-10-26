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

$q = $dao->db()->prepare('SELECT * FROM RSS');
$q->execute();

$tab = $q->fetchAll(PDO::FETCH_CLASS, "RSS");

include('../view/afficher_flux.view.php');

?>
