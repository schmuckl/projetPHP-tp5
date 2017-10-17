<?php

class Nouvelle {
  private $titre;   // Le titre
  private $date;    // Date de publication
  private $description; // Contenu de la nouvelle
  private $url;         // Le lien vers la ressource associée à la nouvelle
  private $urlImage;    // URL vers l'image

  // Fonctions getter

  function getTitre() {
    return $this->titre;
  }

  function getDate() {
    return $this->date;
  }

  function getDescription() {
    return $this->description;
  }

  function getUrl() {
    return $this->url;
  }

  function getUrlImage() {
    return $this->urlImage;
  }


  function __construct(array $tab) {
    $tab->titre = $titre;
    $tab->date = $date;
    $tab->description = $description;
    $tab->url = $url;
    $tab->urlImage = $urlImage;
  }

  // Charge les attributs de la nouvelle avec les informations du noeud XML
  function update(DOMElement $item) {
    $titre = $item->getElementsByTagName('title')->item(0)->textContent;
    $date = $item->getElementsByTagName('pubDate')->item(0)->textContent;
    $description = $item->getElementsByTagName('description')->item(0)->textContent;
    $url = $item->getElementsByTagName('link')->item(0)->textContent;
    $urlImage = $item->getElementsByTagName('enclosure');
  }
}

?>
