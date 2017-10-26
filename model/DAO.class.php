<?php

require_once('RSS.class.php');
require_once('Nouvelle.class.php');

class DAO {
  private $db; // L'objet de la base de donnée

  function db() {
    return $this->db;
  }

  // Ouverture de la base de donnée
  function __construct() {
    $dsn = 'sqlite:/users/info/etu-s3/boulangn/public_html/ProgWeb/projetPHP-tp5/model/data/rss.db'; // Data source name
    try {
      $this->db = new PDO($dsn);
    } catch (PDOException $e) {
      exit("Erreur ouverture BD : ".$e->getMessage());
    }
  }

  //////////////////////////////////////////////////////////
  // Methodes CRUD sur RSS
  //////////////////////////////////////////////////////////

  // Crée un nouveau flux à partir d'une URL
  // Si le flux existe déjà on ne le créé pas
  function createRSS($url) {
    $rss = $this->readRSSfromURL($url);
    if ($rss == NULL) {
      try {
        $q = "INSERT INTO RSS (url) VALUES ('$url')";
        $r = $this->db->exec($q);
        if ($r == 0) {
          die("createRSS error: no rss inserted\n");
        }
        return $this->readRSSfromURL($url);
      } catch (PDOException $e) {
        die("PDO Error :".$e->getMessage());
      }
    } else {
      // Retourne l'objet existant
      return $rss;
    }
  }

  // Acces à un objet RSS à partir de son URL
  function readRSSfromURL($url) {
    $q = $this->db->prepare("SELECT * FROM RSS WHERE url = :url");
    $q->setFetchMode(PDO::FETCH_CLASS, 'RSS');
    $q->execute(array($url));

    // On retourne l'objet trouvé
    return $q->fetch(PDO::FETCH_CLASS);
}

  // Met à jour un flux
  function updateRSS(RSS $rss) {
    // Met à jour uniquement le titre et la date
    $titre = $this->db->quote($rss->getTitre());
    $q = "UPDATE RSS SET titre=$titre, date='".$rss->getDate()."' WHERE url='".$rss->getUrl()."'";
    var_dump($q);
    try {
      $r = $this->db->exec($q);
      var_dump($r);
      if ($r == 0) {
        die("updateRSS error: no rss updated\n");
      }
    } catch (PDOException $e) {
      die("PDO Error :".$e->getMessage());
    }
  }

  //////////////////////////////////////////////////////////
  // Methodes CRUD sur Nouvelle
  //////////////////////////////////////////////////////////

  // Acces à une nouvelle à partir de son titre et l'ID du flux
  function readNouvellefromTitre($titre,$RSS_id) {
    $q = $this->db->prepare("SELECT * FROM nouvelle WHERE titre=:titre AND RSS_id=:RSS_id");
    $q->execute(array($titre,$RSS_id));

    // On retourne l'objet trouvé
    $result = $q->fetchAll(PDO::FETCH_CLASS, "nouvelle");
    return $result;
  }

  // Crée une nouvelle dans la base à partir d'un objet nouvelle
  // et de l'id du flux auquelle elle appartient
  function createNouvelle(Nouvelle $n, $RSS_id) {
    $nouvelle = $this->readNouvellefromTitre($n->getTitre(), $RSS_id);
    if ($nouvelle == NULL) {
      try {
        $q = "INSERT INTO nouvelle (date, titre, description, url, image, RSS_id) values ('" . $n->getDate() . "', '" . $n->getTitre() . "', '" . $n->getDescription() . "', '" . $n->getUrl() . "', '" . $n->getImage() . "', '" . $RSS_id . "')";
        $r = $this->db->exec($q);
        if ($r == 0) {
          die("createNouvelle error: no nouvelle inserted\n");
        }
        return $this->readNouvellefromTitre($n->getTitre(), $RSS_id);
      } catch (PDOException $e) {
        die("PDO Error :".$e->getMessage());
      }
    } else {
      // Retourne l'objet existant
      return $nouvelle;
    }
  }
}
?>
