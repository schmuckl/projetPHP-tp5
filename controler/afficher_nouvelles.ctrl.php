<?php
require_once('../model/DAO.class.php');

$dao = new DAO();

$nouvelles = $dao->readNouvelleFromFlux($_GET["id"]);

include ('../view/afficher_nouvelles.view.php');
?>
