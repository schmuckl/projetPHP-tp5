<?php
// Test de la classe DAO
require_once('DAO.class.php');

$dao = new DAO();

// Test si l'URL existe dans la BD
$url = 'http://www.lemonde.fr/m-actu/rss_full.xml';

$rss = $dao->readRSSfromURL($url);

// Test méthodes CRUD RSS
if ($rss == NULL) {
  echo $url." n'est pas connu\n";
  echo "On l'ajoute ... \n";
  $rss = $dao->createRSS($url);
} else {
  echo $url." est déjà entré : ";
  // Test de l'update
  /*var_dump($rss);
  echo "on le modifie : ";
  $rss->setTitre('ntmbeg');
  $dao->updateRSS($rss);
  var_dump($dao->readRSSfromURL($url));*/
}

// Mise à jour du flux
$rss->update();
?>
