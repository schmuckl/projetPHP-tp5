<?php
    require_once('../model/DAO.class.php');

    $dao = new DAO();

    if (isset($_GET["id"])) {
      $nouvelle = $dao->readNouvelleFromId($_GET["id"]);
      if ($nouvelle != NULL) {
        include('../view/afficher_nouvelle.view.php');
      }
      else {
        include('../view/afficher_erreur.view.php');
      }
    } else {
      include('../view/afficher_erreur.view.php');
    }
?>
