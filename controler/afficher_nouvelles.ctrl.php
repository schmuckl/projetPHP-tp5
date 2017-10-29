<?php
  require_once('../model/DAO.class.php');

  $dao = new DAO();

  if (isset($_GET["RSS_id"])) {
      $RSS_id = $_GET["RSS_id"];
      // On récupère le nom du flux juste pour l'affichage
      $q = $dao->db()->prepare("SELECT titre FROM rss WHERE id=?");
      $q->execute(array($RSS_id));
      $titre = $q->fetch(PDO::FETCH_COLUMN, 0);
      // On fait passer l'id du flux plutot que de passer toutes les nouvelles
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
