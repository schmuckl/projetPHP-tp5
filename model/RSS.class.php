<?php

class RSS {
  private $titre; // Titre du flux
  private $url;   // Chemin URL pour télécharger un nouvel état du flux
  private $date;  // Date du dernier téléchargement du flux
  private $nouvelles; // Liste des nouvelles du flux dans un tableau d'objets Nouvelle

  // Contructeur
  function __construct($url) {
    $this->url = $url;
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

    // Mets à jour date avec la date de l'arbre
    //$this->date = $doc->getElementsByTagName('date')->item(0)->textContent;

    // Mets à jour date avec la date actuelle
    $this->date = date('l jS \of F Y h:i:s A');

    // On récupère la liste des nouvelles
    $this->nouvelles = $doc->getElementsByTagName('item');
  }

}

?>
