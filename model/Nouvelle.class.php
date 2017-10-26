<?php

class Nouvelle {
  private $titre;   // Le titre
  private $date;    // Date de publication
  private $description; // Contenu de la nouvelle
  private $url;         // Le lien vers la ressource associée à la nouvelle
  private $urlImage;    // URL vers l'image
  private $image;       // chemin relatif vers l'image

  // Pour tests DAO uniquement
  function setTitre($titre) {
    $this->titre = $titre;
  }

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

  function getImage() {
    return $this->image;
  }

  // Charge les attributs de la nouvelle avec les informations du noeud XML
  function update(DOMElement $item) {
    $this->titre = $item->getElementsByTagName('title')->item(0)->textContent;
    $this->date = $item->getElementsByTagName('pubDate')->item(0)->textContent;
    $this->description = $item->getElementsByTagName('description')->item(0)->textContent;
    $this->url = $item->getElementsByTagName('link')->item(0)->textContent;

    if ($item->getElementsByTagName('enclosure')->length != 0) {
      $this->urlImage = $item->getElementsByTagName('enclosure')->item(0);
    } else {
      $this->urlImage = "";
    }
  }

  function downloadImage(DOMElement $item, $imageId) {
    // On suppose que $item est un objet sur le noeud 'enclosure' d'un flux RSS
    // On tente d'accéder à l'attribut 'url'
    $nodeUrl = $item->getElementsByTagName('enclosure')->item(0)->attributes->getNamedItem('url');
    if ($nodeUrl != NULL) {
      // L'attribut url a été trouvé : on récupère sa valeur, c'est l'URL de l'image
      $url = $nodeUrl->nodeValue;
      // On construit un nom local pour cette image : on suppose que $imageId contient un identifiant unique
      $this->image = 'images/'.$imageId.'.jpg';
      // On télécharge l'image à l'aide de son URL, et on la copie localement.
      file_put_contents($this->image, file_get_contents($url));
    }
  }
}

?>
