<?php
require_once "Nouvelle.class.php";
require_once "DAO.class.php";

class RSS {
  private $titre; // Titre du flux
  private $url;   // Chemin URL pour télécharger un nouvel état du flux
  private $date;  // Date du dernier téléchargement du flux
  private $nouvelles; // Liste des nouvelles du flux dans un tableau d'objets Nouvelle

  // Contructeur
  //function __construct() {
  //}

  function setUrl($url) {
    $this->url = $url;
  }

  function setTitre($titre) {
    $this->titre = $titre;
  }

  // Fonctions getter
  function getTitre() {
    return $this->titre;
  }

  function getUrl() {
    return $this->url;
  }

  function getDate() {
    return $this->date;
  }

  function getNouvelles() {
    return $this->nouvelles;
  }

  // Récupère un flux à partir de son URL
  function update() {
    // Cree un objet pour accueillir le contenu du RSS : un document XML
    $doc = new DOMDocument;

    //Telecharge le fichier XML dans $rss
    $doc->load($this->url);

    // Recupère la liste (DOMNodeList) de tous les elements de l'arbre 'title'
    $nodeList = $doc->getElementsByTagName('title');

    // Met à jour le titre dans l'objet
    $this->titre = $nodeList->item(0)->textContent;

    // Mets à jour date avec la date actuelle
    $this->date = date('l jS \of F Y h:i:s A');

    // Identifiant pour le nom de l'image
    $idImage = 1;

    // On créé un objet DAO pour accéder à la BD et on récupère
    // l'identifiant du RSS
    $dao = new DAO();
    $q = $dao->db()->prepare("SELECT id FROM RSS WHERE url = ?");
    $q->execute(array($this->getUrl()));
    $id = $q->fetch(PDO::FETCH_COLUMN, 0);
    var_dump($id);

    // Récupère tous les items du flux RSS
    foreach ($doc->getElementsByTagName('item') as $node) {
      // Création d'un objet Nouvelle à conserver dans la liste $this->nouvelles
      $nouvelle = new Nouvelle();
      // Modifie cette nouvelle avec l'information téléchargée
      $nouvelle->update($node);
      // On rajoute cette nouvelle à la liste de nouvelles
      $this->nouvelles[] = $nouvelle;
      // Télécharge l'image
      $nouvelle->downloadImage($node, $idImage);
      $idImage += 1;

      // Ajouter dans la BD ?

    }
  }
}

?>
