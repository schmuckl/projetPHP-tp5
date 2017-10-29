<?php
  require_once('../model/DAO.class.php');

  // Aucun sens si pas d'images comme dans Le Figaro

  $dao = new DAO();

  $RSS_id = $_GET["RSS_id"];
  //On récupère les ids des nouvelles du flux donné
  $q = $dao->db()->prepare("SELECT id FROM nouvelle WHERE RSS_id=?");
  $q->execute(array($RSS_id));
  $idNouvelles = $q->fetchAll(PDO::FETCH_COLUMN, 0);

  // On récupère les nouvelles entières
  $nouvelles = $dao->readNouvelleFromFlux($RSS_id);

  include("../view/afficher_nouvelles_img.view.php");
?>
