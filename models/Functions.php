<?php
//include "../config/Database.php";
include "WorkImg.php";

//include("./config/Database.php");
//include('WorkImg.php'); 

class Functions
{

    public $con;

    /**
     * __construct
     *default constructor
     * @return void
     */
    public function __construct()
    {
        $db = new Database();
        $this->con = $db->_connect();
    }

    /**
     * getAllProduit
     *return array of all Produit
     * @return array
     */
    public function getAllProduit(): array
    {
        //$query_produit="SELECT * FROM produit WHERE   SELECT * FROM cnitab ORDER By Id DESC"
        $listeProduit = array();
        $query_produit = "SELECT * FROM produit ORDER By id DESC";
        $i = 0;
        $statement = $this->con->prepare($query_produit);
        $statement->execute();
        while ($response = $statement->fetch()) {
            $produit = new Produit();
            $produit->set_id_produit($response['id_produit']);
            $produit->set_nom_produit($response['nom_produit']);
            $produit->set_desc_produit($response['desc_produit']);
            $produit->set_detail_produit($response['detail_produit']);
            $produit->set_ref_produit($response['ref_produit']);
            $produit->set_prix_produit($response['prix_produit']);
            $produit->set_image_produit($response['image_produit']);
            $produit->set_stock_produit($response['stock_produit']);
            $produit->set_seuil_produit($response['seuil_produit']);
            $produit->set_created_at($response['created_at']);
            $produit->setCategorie($response['id_categorie']);


            $listeProduit[$i] = $produit;
            $i++;
        }
        return $listeProduit;
    }

    /**
     * getAllProductByFilter 
     *get list  product by filter , value or regex
     * @param array listCategorie
     * @param  mixed $filter
     * @param  mixed $value
     * @param  mixed $regex
     * @return array
     */
    public function getAllProductByFilter($listCategorie, $filter, $value, $regex): array
    {
        //$query_produit="SELECT * FROM produit WHERE   SELECT * FROM cnitab ORDER By Id DESC"
        $counterCategorie = 0;
        if (is_array($listCategorie))
            $counterCategorie = count($listCategorie);

        $listProduct = array();
        $query_produit = "SELECT * FROM produit";
        $param_categorie = "";
        echo "welcome";
        if (($filter == "null" || $filter == null) && ($listCategorie == null || $listCategorie == "null" || $listCategorie[0] == "ul")) {
            //return all product
            $query_produit = "SELECT * FROM produit";
        } else {

            //search 
            if ($filter == "search" && ($value != null || $value != "")) {
                $query_produit = "SELECT * FROM produit WHERE nom_produit LIKE '%$value%' OR desc_produit LIKE '%$value%' OR detail_produit LIKE '%$value%' OR ref_produit LIKE '%$value%' ";
            } else {

                if ($counterCategorie > 0 && $listCategorie[0] != "") {
                    $index = 0;
                    //buil parameter categorie
                    $param_categorie = " id_categorie IN (SELECT id_categorie FROM categories";

                    while ($index < $counterCategorie) {
                        if ($index == 0)
                            $param_categorie .= " WHERE id_categorie = '" . $listCategorie[$index];
                        else
                            $param_categorie .= " OR id_categorie = '" . $listCategorie[$index];

                        $index++;
                    }

                    $param_categorie .= "' ) ";

                    //end build parameter categorie

                    if (($regex == "" || $regex == "null" || $regex == "null") && $counterCategorie > 0) {
                        $query_produit = "SELECT * FROM produit WHERE " . $param_categorie;
                    } else {
                        if ($filter == "prix" && floatval($value) != null) {

                            switch ($regex) {
                                case ">":
                                    $query_produit = "SELECT * FROM produit WHERE " . $param_categorie . " AND  prix_produit > '$value' ORDER By prix_produit DESC";
                                    break;
                                case "<":
                                    $query_produit = "SELECT * FROM produit WHERE " . $param_categorie . " AND prix_produit < '$value' ORDER By prix_produit DESC";
                                    break;
                                case "=":
                                    $query_produit = "SELECT * FROM produit WHERE " . $param_categorie . " AND  prix_produit = '$value' ORDER By prix_produit DESC";
                                    break;
                                default:
                                    $query_produit = "SELECT * FROM produit WHERE " . $param_categorie . " ORDER By prix_produit DESC";
                            }
                        } else {

                            if ($filter == "prix" && (floatval($value) == null || floatval($value) == 0)) {
                                switch ($regex) {
                                    case "<":
                                        $query_produit = "SELECT * FROM produit WHERE " . $param_categorie . " ORDER By prix_produit ASC";
                                        break;
                                    case ">":
                                        $query_produit = "SELECT * FROM produit WHERE " . $param_categorie . " ORDER By prix_produit DESC";
                                        break;
                                }
                            } else {
                                if ($filter == "nom") {
                                    switch ($regex) {
                                        case "<":
                                            $query_produit = "SELECT * FROM produit WHERE " . $param_categorie . " ORDER By nom_produit ASC";
                                            break;
                                        case ">":
                                            $query_produit = "SELECT * FROM produit WHERE " . $param_categorie . " ORDER By nom_produit DESC";
                                            break;
                                    }
                                }
                            }
                        }

                        //end

                    }
                } else {
                    if ($filter == "prix" && floatval($value) != null) {

                        switch ($regex) {
                            case ">":
                                $query_produit = "SELECT * FROM produit WHERE prix_produit > '$value' ORDER By prix_produit DESC";
                                break;
                            case "<":
                                $query_produit = "SELECT * FROM produit WHERE prix_produit < '$value' ORDER By prix_produit DESC";
                                break;
                            case "=":
                                $query_produit = "SELECT * FROM produit WHERE prix_produit = '$value' ORDER By prix_produit DESC";
                                break;
                            default:
                                $query_produit = "SELECT * FROM produit ORDER By prix_produit DESC";
                        }
                    } else {

                        if ($filter == "prix" && (floatval($value) == null || floatval($value) == 0)) {
                            switch ($regex) {
                                case "<":
                                    $query_produit = "SELECT * FROM produit ORDER By prix_produit ASC";
                                    break;
                                case ">":
                                    $query_produit = "SELECT * FROM produit ORDER By prix_produit DESC";
                                    break;
                            }
                        } else {
                            if ($filter == "nom") {
                                switch ($regex) {
                                    case "<":
                                        $query_produit = "SELECT * FROM produit ORDER By nom_produit ASC";
                                        break;
                                    case ">":
                                        $query_produit = "SELECT * FROM produit ORDER By nom_produit DESC";
                                        break;
                                }
                            }
                        }
                    }
                }
            }
        }

        //execute statement
        $i = 0;
        $statement = $this->con->prepare($query_produit);
        $statement->execute();
        while ($response = $statement->fetch()) {
            $product = new Produit();
            $product->set_id_produit($response['id_produit']);
            $product->set_nom_produit($response['nom_produit']);
            $product->set_desc_produit($response['desc_produit']);
            $product->set_detail_produit($response['detail_produit']);
            $product->set_ref_produit($response['ref_produit']);
            $product->set_prix_produit($response['prix_produit']);
            $product->set_image_produit($response['image_produit']);
            $product->set_stock_produit($response['stock_produit']);
            $product->set_seuil_produit($response['seuil_produit']);
            $product->set_created_at($response['created_at']);
            $product->setCategorie($response['id_categorie']);


        
            $listProduct[$i] = $product;
            $i++;
        }

        return $listProduct;
    }

    /**
     * getAllCommande return a array of all Commande
     *
     * @return array
     */
    public function getAllCommande($userId, $param): array
    {
        //execute statement
        $i = 0;
        $listOrder = array();
        $queryOrder = "SELECT * FROM commande";
        if ($userId != null && $userId != "") {
            if ($param == null || $param == '' || $param == 'null') {
                $queryOrder .= "  WHERE id_user = ?";
            } else {
                $queryOrder .= "  WHERE id_user <> ?";
            }
        }


        $statement = $this->con->prepare($queryOrder);
        if ($userId != null && $userId != "")
            $statement->execute([$userId]);
        else
            $statement->execute();

        while ($response = $statement->fetch()) {
            $order = new Commande();
            $order->setIdCommande($response['id_commande']);
            $order->setState($response['state']);
            $order->setIdPaiement($response['id_paiement']);
            $order->setIdLivraison($response['id_livraison']);
            $order->setCreatedAt($response['created_at']);

            //get infos user
            $user = new UserClass();
            $user = $this->getUserById($response['id_user']);
            $order->setIdUser($user->get_prenom_user() . " " . $user->get_nom_user());


            if ($response['id_paiement'] == null)
                $order->setIdPaiement("NON EFFECTUE");

            $listOrder[$i] = $order;
            $i++;
        }

        return $listOrder;
    }

    /**
     * getProduitById return single Produit by ID
     *
     * @param  mixed $id
     * @return Produit
     */
    public function getProduitById($id): Produit
    {
        $query_produit = "SELECT * FROM produit WHERE id_produit='$id' ";
        $statement = $this->con->prepare($query_produit);
        $produit = new Produit();
        $statement->execute();
        while ($response = $statement->fetch()) {
            $produit = new Produit();
            $produit->set_id_produit($response['id_produit']);
            $produit->set_nom_produit($response['nom_produit']);
            $produit->set_desc_produit($response['desc_produit']);
            $produit->set_detail_produit($response['detail_produit']);
            $produit->set_ref_produit($response['ref_produit']);
            $produit->set_prix_produit($response['prix_produit']);
            $produit->set_image_produit($response['image_produit']);
            $produit->set_stock_produit($response['stock_produit']);
            $produit->set_seuil_produit($response['seuil_produit']);
            $produit->setCategorie($response['id_categorie']);
            break;
        }
        return $produit;
    }


    /**
     * 
     * 
     */
    public function getImagebycategories($cat)
    {
        $listeImage = array();
        $query_image = "SELECT * FROM worckimg WHERE categorie=? ";
        $i = 0;
        $statement = $this->con->prepare($query_image);
        $image = new WorkImg();
        $statement->execute([$cat]);
        while ($response = $statement->fetch()) {
           // $image = new WorkImg();
            $image->set_idImg_ImgWorck($response['Id']);
            $image->set_categorie_ImgWorck($response['categorie']);
            $image->set_DescImgWorck($response['descriptionWimg']);
            $image->set_Base_ImgWorck($response['baseimg']);
            $image->set_ImgWorck($response['urlimg']) ;
            $listeImage[$i] = $image;
            $i++;
        }
        return $listeImage;
    }

    public function getImagebyId($Id)
    {
        $listeImage = array();
        $query_image = "SELECT * FROM worckimg WHERE Id=? ";
        $i = 0;
        $statement = $this->con->prepare($query_image);
        $image = new WorkImg();
        $statement->execute([$Id]);
        while ($response = $statement->fetch()) {
           // $image = new WorkImg();
           $image->set_categorie_ImgWorck($response['categorie']);
           $image->set_DescImgWorck($response['descriptionWimg']);
           $image->set_Base_ImgWorck($response['baseimg']);
           $image->set_ImgWorck($response['urlimg']) ;
           $listeImage[$i] = $image;
           break;
       }
       return $listeImage;
   }
           


    public function getAllImage()
    {

        //$database = new Database();
       // $db = $database->_connect();

        $listeImage = array();
        $query_image = "SELECT * FROM worckimg ORDER By Id DESC ";
        $i = 0;
        $statement = $this->con->prepare($query_image);
        $image = new WorkImg();
        $statement->execute();
        while ($response = $statement->fetch()) {
            $image = new WorkImg();
            $image->set_idImg_ImgWorck($response['Id']);
            $image->set_categorie_ImgWorck($response['categorie']);
            $image->set_DescImgWorck($response['descriptionWimg']);
            $image->set_Base_ImgWorck($response['baseimg']);
            $image->set_ImgWorck($response['urlimg']) ;


            $jsf= file_get_contents('../json/folio.json');
            $jsf= json_decode($jsf, true);
            $jsf0[]=$response;
            $jsf= json_encode($jsf0);
            file_put_contents('../json/folio.json', $jsf);

            if($response['categorie']=='folio'){
                $jsf1[]=$response;
                $conception= json_encode($jsf1);
                file_put_contents('../json/conception.json', $conception);

            }else

            if($response['categorie']=='conception'){
                $jsf1[]=$response;
                $conception= json_encode($jsf1);
                file_put_contents('../json/conception.json', $conception);

            }else
            if($response['categorie']=='Travaux executes'){
              
                $jsf2[]=$response;
                $exe= json_encode($jsf2);
                file_put_contents('../json/exe.json', $exe);

            }else
            if($response['categorie']=='Travaux en curs'){
              
                $jsf3[]=$response;
                $exe= json_encode($jsf3);
                file_put_contents('../json/cours.json', $exe);

            }
            
            $listeImage[$i] = $image;
            $i++;

           
        }
        //$data[]=$response;
      
        return $listeImage;
    }

    /**
     * checkUniqId check if a given UniqId in the given table already exist
     *
     * @param  mixed $tableName
     * @param  mixed $idToCheck
     * @param  mixed $regexId
     * @return bool
     */
    public function checkUniqId($tableName, $idToCheck, $regexId): bool
    {
        $sql = "SELECT count(*) FROM $tableName WHERE $regexId = ?";
        $result = $this->con->prepare($sql);
        $result->execute([$idToCheck]);
        $number_of_rows = $result->fetchColumn();

        if ($number_of_rows > 0)
            return true;
        else
            return false;
    }


    /**
     * getAllUser return array of all User
     *
     * @return array
     */
    public function getAllUser($state): array
    {
        $listUser = array();
        $query_user = "SELECT * FROM user ORDER By id_user DESC";
        if ($state != null && $state != "")
            $query_user = "SELECT * FROM user WHERE status = ?  ORDER By id_user DESC";

        $i = 0;

        $statement = $this->con->prepare($query_user);

        if ($state != null && $state != "")
            $statement->execute([$state]);
        else
            $statement->execute();

        while ($response = $statement->fetch()) {
            $user = new UserClass();
            $user->set_id_user($response['id_user']);
            $user->set_nom_user($response['nom_user']);
            $user->set_prenom_user($response['prenom_user']);
            $user->set_email($response['email_user']);
            $user->set_email_token($response['email_verification']);
            $user->set_password($response['password']);
            $user->set_telephone($response['telephone']);
            $user->setProfilImage($response['image']);
            $user->set_niveau_acces($response['niveau_acces']);
            $user->set_status($response['status']);
            $user->set_created_at($response['created_at']);


            $listUser[$i] = $user;
            $i++;
        }
        return $listUser;
    }

    /**
     * getUserById return  User by ID
     *
     * @param  mixed $id
     * @return UserClass
     */
    public function getUserById($id): UserClass
    {
        $connUser = $this->con->prepare('SELECT * FROM user WHERE id_user=? ');
        $connUser->execute([$id]);
        $user = new UserClass();
        while ($response = $connUser->fetch()) {
            $user->set_id_user($response['id_user']);
            $user->set_nom_user($response['nom_user']);
            $user->set_prenom_user($response['prenom_user']);
            $user->set_password($response['password']);
            $user->set_niveau_acces($response['niveau_acces']);
            $user->set_created_at($response['created_at']);
            $user->set_email($response['email_user']);
            $user->set_telephone($response['telephone']);
            $user->setProfilImage($response['image']);
            $user->set_status($response['status']);
        }
        return $user;
    }
    
    /**
     * getUserByEmail
     *return user with the given mail
     * @param  mixed $mail
     * @return UserClass
     */
    public function getUserByEmail($mail): UserClass
    {
        $connUser = $this->con->prepare('SELECT * FROM user WHERE email_user=? ');
        $connUser->execute([$mail]);
        $user = new UserClass();
        while ($response = $connUser->fetch()) {
            $user->set_id_user($response['id_user']);
            $user->set_nom_user($response['nom_user']);
            $user->set_prenom_user($response['prenom_user']);
            $user->set_password($response['password']);
            $user->set_niveau_acces($response['niveau_acces']);
            $user->set_created_at($response['created_at']);
            $user->set_email($response['email_user']);
            $user->set_telephone($response['telephone']);
            $user->setProfilImage($response['image']);
            $user->set_status($response['status']);
        }
        return $user;
    }

    /**
     * getConnectedUser return a User by Email and Password
     *
     * @param  mixed $email
     * @param  mixed $password
     * @return //UserClass
     */
    public function getConnectedUser($email, $password): UserClass
    {
        $connUser = $this->con->prepare('SELECT * FROM user WHERE email=? && password=? ');
        $connUser->execute([$email, sha1($password)]);
        $user = new UserClass();
        while ($response = $connUser->fetch()) {
            $user->set_id_user($response['id_user']);
            $user->set_nom_user($response['nom_user']);
            $user->set_prenom_user($response['prenom_user']);
            $user->set_password($response['password']);
            $user->set_niveau_acces($response['access_level']);
            $user->set_created_at($response['created']);
            $user->set_email($response['email']);
            $user->set_telephone($response['telephone']);
            $user->setProfilImage($response['image']);
            $user->set_status($response['status']);
        }
        return $user;
    }

   
    /**
     * processPayment make payment
     *
     * @param  mixed $amount
     * @param  mixed $payerMail
     * @param  mixed $currency
     * @return void
     */
    public function processPayment($amount, $payerMail, $currency)
    {
        if (isset($_SESSION["currentOrderId"])) {
            $idPaiement = "";
            $state = "SUCCESS";
            $createdAt = date("Y-m-d H:i:s");
            do {
                $idPaiement = uniqid();
            } while ($this->checkUniqId("paiements", $idPaiement, "payment_id") == true);
            $stmt = $this->con->prepare("INSERT INTO paiements  VALUES('',?,?,?,?,?,?)");
            if ($stmt->execute([
                $idPaiement,
                $state,
                $amount,
                $currency,
                $createdAt,
                $payerMail
            ])) {
                $stateUpdate = $this->updateSingleFiled("commande", "id_commande", $_SESSION["currentOrderId"], "id_paiement", $idPaiement);
                if ($stateUpdate == true)
                    return true;
                else
                    return false;
            } else {
                return false;
            }
        } else {
            echo "aucune commande sauvegardee";
        }
    }

    /**
     * updateSingleFiled update single field to given table
     *
     * @param  mixed $table
     * @param  mixed $regexId
     * @param  mixed $idValue
     * @param  mixed $regexField
     * @param  mixed $value
     * @return bool
     */
    public function updateSingleFiled($table, $regexId, $idValue, $regexField, $value): bool
    {
        $up_cmd = $this->con->prepare("UPDATE $table SET $regexField =?  WHERE $regexId = ? ");
        if ($up_cmd->execute([
            $value,
            $idValue
        ])) {
            return true;
        } else {
            return false;
        }
    }

    /**
     * imageExist
     *
     * @param  mixed $image
     * @return bool
     */
    public  function imageExist($image): bool
    {
        $query_image = "SELECT COUNT(*) FROM produit WHERE image_produit = ?";
        $statement = $this->con->prepare($query_image);
        $statement->execute([$image]);
        if ($statement->fetchColumn() != 0)
            return true;
        else
            return false;
    }


    public  function imageUserExist($image): bool
    {
        $query_image = "SELECT COUNT(*) FROM user WHERE image= ?";
        $statement = $this->con->prepare($query_image);
        $statement->execute([$image]);
        if ($statement->fetchColumn() != 0)
            return true;
        else
            return false;
    }

    
    public  function imageWorckExist($image): bool
    {
        $query_image = "SELECT COUNT(*) FROM worckImg WHERE urlimg= ?";
        $statement = $this->con->prepare($query_image);
        $statement->execute([$image]);
        if ($statement->fetchColumn() != 0)
            return true;
        else
            return false;
    }


    /**
     * getAllOrderItem
     *return array of all item for the given Order ID
     * @param  mixed $orderId
     * @return array
     */
    public function getAllOrderItem($orderId): array
    {
        $listItem = array();
        //get relations
        $query_rel = "SELECT * FROM rel_commande_produit WHERE id_commande = ?";
        $stmt_rel = $this->con->prepare($query_rel);
        $stmt_rel->execute([$orderId]);
        $i = 0;
        while ($response = $stmt_rel->fetch()) {
            $product = new Produit();
            $product = $this->getProduitById($response['id_produit']);

            //set prix_produit with order_price ,and stock_produit with order_qty
            $product->set_prix_produit($response['prix_achat']);
            $product->set_stock_produit($response['qte_produit']);

            $listItem[$i] = $product;
            $i++;
        }

        return $listItem;
    }

    
    /**
     * getAllOrderThatContaintProductId
     *
     * @param  mixed $productId
     * @return array of Product
     */
    public function getAllOrderThatContaintProductId($productId): array{
        $listOrder = array();

        //get all orderId 
        $query_list_order = "SELECT id_commande FROM commande";
        $stmt_list_order = $this->con->prepare($query_list_order);
        $stmt_list_order->execute();

        $i = 0;
        $listElement = array();
        while($response = $stmt_list_order->fetch()){
            $listOrder[$i] = $response['id_commande'];
            //check for each order if the given productId is in the orderItemList
            $listItem = array();
            $listItem = $this->getAllOrderItem($response['id_commande']);

            $j = 0;
            $found = false;
            $tmpList = array();
            while($j < (count($listItem) -1)){

                if($listItem[$j]->get_id_produit() == $productId)
                    $found = true;
                else
                    if(!in_array($listItem[$j],$tmpList))
                         array_push($tmpList,$listItem[$j]);
                
                $j++;
            }

            //fill list Element here
            if(count($tmpList) > 0){
                $x = 0;
                while($x <= count($tmpList) - 1){
                    if(!in_array($tmpList[$x],$listElement))
                         array_push($listElement,$tmpList[$x]);
                    $x++;
                }

            }

            $i++;
        }

        return $listElement;
    }

   
    /**
     * send notification to client
     *
     * @param  mixed $to
     * @param  mixed $from
     * @param  mixed $subject
     * @param  mixed $message
     * @param  mixed $listOrder
     * @param  mixed $sub_header
     * @param  mixed $userName
     * @return bool
     */
    public function notification($to, $subject, $message, $listOrder, $userName): bool
    {
        $headers = "MIME-Version: 1.0" . "\r\n";
        $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

        $headers .= 'From: no-reply@emp-release.online' . "\r\n";
        $headers .= 'Cc: snm16@tu-clausthal.de' . "\r\n";

        $msg_head = "
            <html>
                <head>
                    <title>Equipements Medicaux Pro</title>
                </head>
                <body style='font-family:Comic Sans MS;'>
                    <p style='font-size:1.6rem; color:#15AA6F;'>Hi $userName !</p>
                    <p style='text-align:justify; font-size:1.2rem;'>$message</p>

        ";

        $msg_content = "";
        if ($listOrder !== null) {
            $msg_content .= "<p style='text-align:center; color:#15AA6F;'>Votre Commande </p>";
            $i = 0;
            $sum = 0;
            if (is_array($listOrder)) {
                $msg_content .= "
                <table>
                    <tr>
                        <th>N°</th>
                        <th>Equipement</th>
                        <th>Description</th>
                        <th>Prix Unitaire</th>
                        <th>Qantite</th>
                        <th>Total</th>
                    </tr>
            ";
                while ($i < (count($listOrder))) {
                    $order = new Commande();
                    $order = $listOrder[$i];
                    $listOrderItems = array();
                    $listOrderItems = $this->getAllOrderItem($order->getIdCommande());

                    $j = 0;
                    $sum = 0;
                    while ($j < (count($listOrderItems))) {
                        $item = $listOrderItems[$j];
                        $sub_total = 0;
                        $sub_total = floatval($item->get_prix_produit()) *  intval($item->get_stock_produit());
                        $sum += $sub_total;

                        $msg_content .= "
                        <tr>
                            <th>" . ($j + 1) . "</th>
                            <th>" . $item->get_nom_produit() . "</th>
                            <th>" . $item->get_desc_produit() . "</th>
                            <th>" . $item->get_prix_produit() . "</th>
                            <th>" . $item->get_stock_produit() . "</th>
                            <th>" . $sub_total . " €</th>
                        </tr>
                    ";
                        $j++;
                    }

                    //add row total
                    $msg_content .= "
                            <tr style='text-align:center; color:#15AA6F; font-size:1.6rem;'>
                                <td colspan='5'>Total</td>
                                <td>" . $sum . " €</td>
                            </tr>
                        </table>
                    ";
                    $i++;
                }
            } else
                throw "ListOrder doit etre un tableau de commande\n";
        }

        $msg_footer = "
            <span>Merci pour votre confiance</span>
            <p style='font-size:1.6rem; color:#15AA6F;'><a href='https://equipementmedicauxpro.com/'>Decouvrez plein d'autres Equipements a bas prix.</a></p>
            <img src='http://www.emp-release.online/static/images/logo.png' />
            </body>
        </html>
        ";


        $msg = $msg_head . "" . $msg_content . "" . $msg_footer;

        $mail = new Mail();
        $mail->setTo($to);
        $mail->setFrom("no-reply@emp-release.online");
        $mail->setSubject($subject);
        $mail->setMessage($msg);
        $mail->setHeader($headers);

        if ($mail->send())
            return true;
        else
            return false;
    }


    /**
     * getAllOrderByUser
     *Return list of all Order for the given User
     * @param  mixed $idUser
     * @return array
     */
    public function getAllOrderByUser($idUser): array
    {
        $myOrder = array();
        $queryOrder = "SELECT * FROM commande WHERE id_user = ?";
        $statement = $this->con->prepare($queryOrder);
        $statement->execute([$idUser]);
        $i = 0;
        while ($response = $statement->fetch()) {
            $order = new Commande();
            $order->setIdCommande($response['id_commande']);
            $order->setState($response['state']);
            $order->setIdPaiement($response['id_paiement']);
            $order->setIdLivraison($response['id_livraison']);
            $order->setCreatedAt($response['created_at']);
            $order->setIdUser($response['id_user']);

            $myOrder[$i] = $order;
            $i++;
        }

        return $myOrder;
    }

    /**
     * getOrderById
     *
     * @param  mixed $orderId
     * @return Commande
     */
    public function getOrderById($orderId): Commande
    {
        $order = new Commande();
        $queryOrder = "SELECT * FROM commande WHERE id_commande = ?";
        $statement = $this->con->prepare($queryOrder);
        $statement->execute([$orderId]);
        while ($response = $statement->fetch()) {

            $order->setIdCommande($response['id_commande']);
            $order->setState($response['state']);
            $order->setIdPaiement($response['id_paiement']);
            $order->setIdLivraison($response['id_livraison']);
            $order->setCreatedAt($response['created_at']);
            $order->setIdUser($response['id_user']);
        }

        return $order;
    }
    
   
   
    
    /**
     * getAllFeedback
     *return the array of all Feedback
     * @return array
     */
    public function getAllFeedback(): array
    {
        $feedback = array();
        $queryFeedback = "SELECT * FROM message ORDER BY date_message DESC";
        $statement = $this->con->prepare($queryFeedback);
        $statement->execute();
        $i = 0;
        while ($response = $statement->fetch()) {
            $message = new Message();
            $message->setIdMessage($response['id_message']);
            $message->setIdUser($response['id_user']);
            $message->setTypeMessage($response['id_type_msg']);
            $message->setJauge($response['jauge']);
            $message->setMessage($response['message_user']);
            $message->setDateMessage($response['date_message']);
            $message->setState($response['state']);

            $feedback[$i] = $message;
            $i++;
        }

        return $feedback;
    }
    
    /**
     * getAllPositivFeedback
     *
     * @return array
     */
    public function getAllPositivFeedback(): array
    {
        $feedback = array();
        $queryFeedback = "SELECT * FROM message WHERE state = 1 ORDER BY jauge DESC";
        $statement = $this->con->prepare($queryFeedback);
        $statement->execute();
        $i = 0;
        while ($response = $statement->fetch()) {
            $message = new Message();
            $message->setIdMessage($response['id_message']);
            $message->setIdUser($response['id_user']);
            $message->setTypeMessage($response['id_type_msg']);
            $message->setJauge($response['jauge']);
            $message->setMessage($response['message_user']);
            $message->setDateMessage($response['date_message']);
            $message->setState($response['state']);

            $feedback[$i] = $message;
            $i++;
        }

        return $feedback;
    }

    /**
     * setVisibility for the Message that have the given Id
     * 
     * @param  mixed $idMessage
     * @return bool
     */
    public function setVisibility($idMessage,$state):bool {
        $msg_update = $this->con->prepare('UPDATE message SET state = ?  WHERE id_message = ?');
        if($msg_update->execute([$state,$idMessage]))
            {
                return true;
            }else {
                return false;
            }
    }
    
   
}
