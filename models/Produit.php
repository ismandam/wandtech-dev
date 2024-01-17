<?php
//include_once "../config/Database.php";
class Produit
{
  private $conn;
  private $table_name = "produit";
  public $id_produit;
  public $idUser;
  public $nom_produit;
  public $desc_produit;
  public $detail_produit;
  public $ref_produit;
  public $prix_produit;
  public $image_produit;
  private $baseImg_produit;
  public $stock_produit;
  public $seuil_produit;
  private $categorie;
  public $created_at;


  public function __construct()
  {
    //$this->conn = $db;

  }

  public function get_id_produit()
  {
    return  $this->id_produit;
  }

  public function set_id_produit($id)
  {
    $this->id_produit = (string)$id;
    return $this;
  }

  public function getIdUser()
  {
    return $this->idUser;
  }
  public function setIdUser($idUser)
  {
    $this->idUser = (string)$idUser;
    return $this;
  }
  public function get_nom_produit()
  {
    return $this->nom_produit;
  }
  public function set_nom_produit($nomProduit)
  {
    $this->nom_produit = (string)$nomProduit;
    return $this;
  }
  public function get_desc_produit()
  {
    return $this->desc_produit;
  }
  public function set_desc_produit($descProduit)
  {
    $this->desc_produit = (string)$descProduit;
    return $this;
  }
  public function get_detail_produit()
  {
    return $this->detail_produit;
  }
  public function set_detail_produit($detailProduit)
  {
    $this->detail_produit = (string)$detailProduit;
    return $this;
  }
  public function get_ref_produit()
  {
    return $this->ref_produit;
  }
  public function set_ref_produit($refProduit)
  {
    $this->ref_produit = (string)$refProduit;
    return $this;
  }

  public function get_prix_produit()
  {
    return $this->prix_produit;
  }

  public function set_prix_produit($prixProduit)
  {
    $this->prix_produit = (string)$prixProduit;
    return $this;
  }
  public function get_image_produit()
  {
    return $this->image_produit;
  }
  public function set_image_produit($imgProduit)
  {
    $this->image_produit = (string)$imgProduit;
    return $this;
  }

  public function get_baseImg_produit()
  {
    return $this->baseImg_produit;
  }
  public function set_baseImg_produit($baseImg)
  {
    $this->baseImg_produit = (string)$baseImg;
    return $this;
  }
  public function get_stock_produit()
  {
    return $this->stock_produit;
  }

  public function set_stock_produit($stockProduit)
  {
    $this->stock_produit = (int)$stockProduit;
    return $this;
  }

  public function get_seuil_produit()
  {
    return $this->seuil_produit;
  }
  public function set_seuil_produit($seuilProduit)
  {
    $this->seuil_produit = (int)$seuilProduit;
  }

  public function getCategorie()
  {
    return $this->categorie;
  }
  public function setCategorie($categorie)
  {
    $this->categorie = (string)$categorie;
  }
  public function showError($stmt)
  {
    echo "<pre>";
    print_r($stmt->errorInfo());
    echo "</pre>";
  }

  public function get_created_at()
  {
    return $this->seuil_produit;
  }
  public function set_created_at($createdAt)
  {
    $this->created_at = (string)$createdAt;
  }

  public function produitExist()
  {
    $database = new Database();
    $db = $database->_connect();
    $query = "SELECT id_produit, nom_produit, desc_produit, detail_produit, ref_produit, image_produit,base_image
                FROM produit 
                WHERE  ref_produit = ? 
                LIMIT 0,1";
    $stmt = $db->prepare($query);
    $stmt->execute([$this->get_ref_produit()]);
    $num = $stmt->rowCount();
    if ($num > 0) {
      $row = $stmt->fetch(PDO::FETCH_ASSOC);
      $this->set_id_produit($row['id_produit']);
      $this->set_nom_produit($row['nom_produit']);
      $this->set_desc_produit($row['desc_produit']);
      $this->set_detail_produit($row['detail_produit']);
      $this->set_ref_produit($row['ref_produit']);
      $this->set_image_produit($row['image_produit']);
      $this->set_baseImg_produit($row['base_image']);

      return true;
    }
    return false;
  }
  function create_produit()
  {

    $database = new Database();
    $db = $database->_connect();
    $this->created_at = date('Y-m-d H:i:s');
    $stmt = $db->prepare('INSERT INTO produit  VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?)');
    if ($stmt->execute([
      $this->get_id_produit(),
      $this->getIdUser(),
      $this->get_nom_produit(),
      $this->get_desc_produit(),
      $this->get_detail_produit(),
      $this->get_ref_produit(),
      $this->get_prix_produit(),
      $this->get_image_produit(),
      $this->get_baseImg_produit(),
      $this->get_stock_produit(),
      $this->get_seuil_produit(),
      $this->getCategorie(),
      $this->get_created_at(),
    ])) {
      return true;
    } else {
      $this->showError($stmt);
      return false;
    }
  }

  function delete_produit($deleteProduit)
  {
    $database = new Database();
    $db = $database->_connect();

    $stmt_select = $db->prepare('SELECT * FROM produit WHERE id_produit=:uid');
    $stmt_select->execute(array(':uid' => $deleteProduit));
    $Row = $stmt_select->fetch(PDO::FETCH_ASSOC);
    unlink("../" . $Row['image_produit']);
    unlink("../" . $Row['base_image']);


    $stmt_delete = $db->prepare('DELETE FROM produit WHERE id_produit =?');
    if ($stmt_delete->execute([$deleteProduit])) {
      return true;
    } else {

      $this->showError($stmt_delete);
      return false;
    }
  }
  // modification éffectué
  function update_produit()
  {
    $database = new Database();
    $db = $database->_connect();
    $update_produit = $db->prepare('UPDATE produit SET 
      nom_produit = ?,
      desc_produit=?,
      detail_produit=?,
      ref_produit=?,
      prix_produit=?,
      stock_produit=?,
      seuil_produit=?,
      id_categorie=?
     WHERE id_produit=?');

    if ($update_produit->execute([
      $this->get_nom_produit(),
      $this->get_desc_produit(),
      $this->get_detail_produit(),
      $this->get_ref_produit(),
      $this->get_prix_produit(),
      $this->get_stock_produit(),
      $this->get_seuil_produit(),
      $this->getCategorie(),
      $this->get_id_produit()
    ])) {
      return true;
    } else {
      $this->showError($update_produit);
      return false;
    }
  }
}
