<?php
  require_once('../model/DAO.class.php');

  $dao = new DAO();

  if (isset($_GET["id"])) {
      $RSS_id = $_GET["id"];
      $nouvelles = $dao->readNouvelleFromFlux($RSS_id);
      if ($nouvelles != NULL) {
          include ('../view/afficher_nouvelles.view.php');
      } else {
        include('../view/afficher_erreur.view.php');
      }
  } else {
    include('../view/afficher_erreur.view.php');
  }
?>
