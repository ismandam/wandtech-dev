<?php
class WorkImg{
private $idImg;
private $descriptionImg;
private $categoriesImg;
private $BaseImgWorck;
private $ImgWorck;

public function __construct(){
}

public function get_idImg_ImgWorck(){

    return $this->idImg;
}

public function set_idImg_ImgWorck($id){
 $this->idImg=$id;
return $this;
}

public function getDescImgWorck(){
    return $this->descriptionImg;
}

public function set_DescImgWorck($desc){
    $this->descriptionImg= $desc;
    return $this;
}

public function getCategorieImgWorck(){
    return $this->categoriesImg;
}

public function set_categorie_ImgWorck($desc){
    $this->categoriesImg= $desc;
    return $this;
}


public function getBaseImgWorck(){
    return $this->BaseImgWorck;
}

public function set_Base_ImgWorck($img){
    $this->BaseImgWorck= $img;
    return $this;
}

public function getImgWorck(){
    return $this->ImgWorck;
}

public function set_ImgWorck($imgW){
    $this->ImgWorck= $imgW;
    return $this;
}

public function showError($stmt)
{
    echo "<pre>";
    print_r($stmt->errorInfo());
    echo "</pre>";
}

function  addImgWorck(){

    $database = new Database();
    $db = $database->_connect();
    $stmt=$db->prepare('INSERT INTO worckImg VALUES(?,?,?,?,?)');
    if($stmt->execute([
       $this->get_idImg_ImgWorck(),
       $this->getDescImgWorck(),
       $this->getCategorieImgWorck(),
       $this->getBaseImgWorck(),
       $this->getImgWorck(),
    ])){

        return true;
    }
    
    else{
        //$this->showError($stmt);
        return false;
    }

}


function delete_img($img_del)
{
    $database = new Database();
    $db = $database->_connect();

    $stmt_select = $db->prepare('SELECT * FROM worckimg WHERE Id=:uid');
    $stmt_select->execute(array(':uid' => $img_del));
    $Row = $stmt_select->fetch(PDO::FETCH_ASSOC);
    unlink("../" . $Row['urlimg']);

    $stmt_delete = $db->prepare('DELETE FROM worckimg WHERE Id =?');
    if ($stmt_delete->execute([$img_del])) {
        return true;
    } else {

        $this->showError($stmt_delete);
        return false;
    }
}





}

?>