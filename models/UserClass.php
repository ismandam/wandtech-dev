<?php
class UserClass
{
    // private $con;
    private $table_name = "user";
    private $id;
    private $nom_user;
    private $prenom_user;
    private $email;
    private $email_token; //verification de l'email
    private $password;
    private $telephone;
    private $niveau_acces;
    private $status;
    public $created_at;
    public $profilImg;
    private  $user_id;

    public function __construct()
    {
        //$this->con = $db;
    }
    public function get_id_user()
    {
        return $this->id;
    }
    public function set_id_user($idUser)
    {
        $this->id = (string)$idUser;
        return $this;
    }

    public function get_nom_user()
    {
        return $this->nom_user;
    }
    public function set_nom_user($nomUser)
    {
        $this->nom_user = (string)$nomUser;
        return $this;
    }
    public function get_prenom_user()
    {
        return $this->prenom_user;
    }
    public function set_prenom_user($prenomUser)
    {
        $this->prenom_user = (string)$prenomUser;
        return $this;
    }
    public function get_email()
    {
        return $this->email;
    }
    public function set_email($_email)
    {
        $this->email = (string)$_email;
        return $this;
    }
    public function get_email_token()
    {
        return $this->email_token;
    }
    public function set_email_token($emailToken)
    {
        $this->email_token = (string)$emailToken;
        return $this;
    }

    public function get_password()
    {
        return $this->password;
    }
    public function set_password($_password)
    {
        $this->password = (string)$_password;
        return $this;
    }
    public function get_telephone()
    {
        return $this->telephone;
    }
    public function set_telephone($_telephone)
    {
        $this->telephone = (string)$_telephone;
        return $this;
    }

    public function getProfilImage()
    {
        return $this->profilImg;
    }

    public function setProfilImage($_profilImg)
    {
        $this->profilImg = (string)$_profilImg;
        return $this;
    }
    public function get_niveau_acces()
    {
        return $this->niveau_acces;
    }
    public function set_niveau_acces($niveauAcces)
    {
        $this->niveau_acces = (int)$niveauAcces;
        return $this;
    }
    public function get_status()
    {
        return $this->status;
    }

    public function set_status($_status)
    {
        $this->status = (string)$_status;
        return $this;
    }
    public function get_created_at()
    {
        return $this->created_at;
    }
    public function set_created_at($createdAt)
    {
        $this->created_at = (string)$createdAt;
        return $this;
    }
    // test de l'existance de l'email
    public  function emailExists()
    {
        $database = new Database();
        $db = $database->_connect();
        $query = "SELECT id_user, nom_user, prenom_user, niveau_acces, password,telephone,image, status
                FROM " . $this->table_name . "
                WHERE email_user = ?
                LIMIT 0,1";
        $stmt = $db->prepare($query);
        $stmt->execute([$this->get_email()]);
        $num = $stmt->rowCount();
        if ($num > 0) {
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            $this->set_id_user($row['id_user']);
            $this->set_nom_user($row['nom_user']);
            $this->set_prenom_user($row['prenom_user']);
            $this->set_niveau_acces($row['niveau_acces']);
            $this->set_password($row['password']);
            $this->set_telephone($row['telephone']);
            $this->setProfilImage($row['image']);
            $this->set_status($row['status']);
            return true;
        }
        return false;
    }
    // crée l'user $todays=date('Y-m-d H:i:s');
        
    function created_user()
    {	
        $database = new Database();
        $db = $database->_connect();
        $this->created_at = date('Y-m-d H:i:s');
        $stmt = $db->prepare('INSERT INTO user  VALUES(?,?,?,?,?,?,?,?,?,?,?)');

        $password_hash = sha1($this->get_password());
        if ($stmt->execute([
            $this->get_id_user(),
            $this->get_nom_user(),
            $this->get_prenom_user(),
            $this->get_email(),
            $this->get_email_token(),
            $password_hash,
            $this->get_telephone(),
            $this->getProfilImage(),
            $this->get_niveau_acces(),
            $this->get_status(),
            $this->created_at
        ])) {
            return true;
        } else {
            $this->showError($stmt);
            return false;
        }
    }
    public function showError($stmt)
    {
        echo "<pre>";
        print_r($stmt->errorInfo());
        echo "</pre>";
    }

    function delete_user($user_del)
    {
        $database = new Database();
        $db = $database->_connect();

        $stmt_select = $db->prepare('SELECT * FROM user WHERE id_user=:uid');
        $stmt_select->execute(array(':uid' => $user_del));
        $Row = $stmt_select->fetch(PDO::FETCH_ASSOC);
        unlink("../" . $Row['image']);

        $stmt_delete = $db->prepare('DELETE FROM user WHERE id_user =?');
        if ($stmt_delete->execute([$user_del])) {
            return true;
        } else {

            $this->showError($stmt_delete);
            return false;
        }
    }


    ///à modifier
    function update_user()
    {
        $database = new Database();
        $db = $database->_connect();
        $update = "UPDATE user SET 
        nom_user=?,
         prenom_user=?,
         email_user=?,
         telephone=?,
         created_at=? 
          WHERE id_user=?";
        $stmt_update = $db->prepare($update);
        if ($stmt_update->execute([
            $this->get_nom_user(),
            $this->get_prenom_user(),
            $this->get_email(),
            $this->get_telephone(),
            $this->get_created_at(),
            $this->get_id_user(),
        ])) {
            return true;
        } else {

            $this->showError($stmt_update);
            return false;
        }
    }

    function level_user($levelUser)
    {
        $database = new Database();
        $db = $database->_connect();

        $update = "UPDATE user SET niveau_acces=?, status=? WHERE id_user=?";
        $result = $db->prepare($update);
        //$result->bindparam(':id',$_GET['btn-user_lev']);




        if ($result->execute([
            $this->get_niveau_acces(),
            $this->get_status(),
            $levelUser,
        ])) {
            return true;
        } else {

            $this->showError($result);
            return false;
        }
    }
}
