<?php 

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: GET,POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
    header("Access-Control-Allow-Headers: Content-Type,Access-Control-Allow-Headers,Authorization,X-Requested-With,x-xsr-token");

include("../PHP/utils/MailClass.php");
include_once "../config/Database.php";
include_once  "../models/Functions.php";
include_once  "../models/UserClass.php";
include_once  "../models/Produit.php";
include_once  "../models/Adresses.php";
include_once  "../models/WorkImg.php";
//$postJson=json_decode(file_get_contents('php://input'),true) ;
    $todays=date('Y-m-d H:i:s');
session_start();
// add web user
if (isset($_POST['addUser']) && !empty($_POST['nom_user']) && !empty($_POST['prenom_user']) && !empty($_POST['email_user']) && !empty($_POST['password'])) {
    // if ($_POST){

    $database = new Database();
    $db = $database->_connect();
    $user = new UserClass();

    $function = new Functions();

    $nomUser = $_POST['nom_user'];
    $prenom = $_POST['prenom_user'];
    $email = $_POST['email_user'];
    $password = $_POST['password'];
    $telephone = $_POST['telephone'];

    $images = $_FILES['image']['name'];
    $tmp_dir = $_FILES['image']['tmp_name'];
    $imageSize = $_FILES['image']['size'];
    $upload_dir = 'static/img/profilImg';
    $target_file = $upload_dir . basename($images);

    $imgExt = strtolower(pathinfo($images, PATHINFO_EXTENSION));
    $valid_extensions = array('jpeg', 'jpg', 'png');

    $picProfileP = "";
    do {
        $picProfileP = rand(0, 1000000) . "." . $imgExt;
    } while ($function->imageUserExist($picProfileP));

    $imgProfil = $upload_dir . "/" . $picProfileP;
    $id = rand(0, 10000);
    if ($_FILES['image']['size'] != 0 && $_FILES['image']['name'] !== "" ) {

        if($picProfileP != ""){
            if (in_array($imgExt, $valid_extensions)) {
                if (move_uploaded_file($tmp_dir, "../" . $imgProfil)) {
                    $user->set_id_user("".$id);
                    $user->set_nom_user($nomUser);
                    $user->set_prenom_user($prenom);
                    $user->set_email($email);
                    $user->set_password($password);
                    $user->set_email_token("");
                    $user->set_telephone($telephone);
                    $user->setProfilImage($imgProfil);
                    $user->set_niveau_acces(1);
                    $user->set_status('Customer');
                } else {
                    echo "upload pas ok";
                }
            } else {
                echo "extention non valide";
            }
        }


    } else {

        $user->set_id_user("".$id);
        $user->set_nom_user($nomUser);
        $user->set_prenom_user($prenom);
        $user->set_email($email);
        $user->set_password($password);
        $user->set_email_token("");
        $user->set_telephone($telephone);
        $user->setProfilImage("static/images/logo.png");
        $user->set_niveau_acces(1);
        $user->set_status('Customer');
        echo "valeur null";
    }



 /*  if ($user->emailExists()) {
        $result = json_encode(array('success' => false, 'msg' => "adresse email deja enregistrer"));
        //$result='adresse email deja enregistrer';
        print($result);
    } else {*/

        if ($user->created_user()) {

            $result = json_encode(array('success' => true, 'msg' => "vous avez eté enregistré"));

            $function->notification($email, "Nouveau Membre", "Bienvenue dans l'espace Equipements Medicaux Pro. <br/> Vous pouvez vous connecter avec votre adresse mail ainsi que le mot de passe que vous avez fourni lors de la creation de votre profil.", null, $prenom . " " . $nomUser);
            print($result);
           header("Refresh:0; url='../index1.html'");
        } else {

            $result = json_encode(array('success' => false, 'msg' => "impossible de vous enregistrer. reessayé plus tard"));
            print($result);
        }
   // }*/
}
 // add ionic user/*//////////////////////////////postJson

        
/////////////////////////////////////////////////

//delete user
if (isset($_GET['del_user'])) {
    $id_user = $_GET['del_user'];
    $database = new Database();
    $db = $database->_connect();
    $user = new UserClass();
    $user->delete_user($id_user);
    if ($user->delete_user($id_user)) {
        header("Refresh:0; url='../view/clientSpace.php'");
    }
}

if (isset($_POST['update_user'])) {

    $nom_user = $_POST['nom'];
    $prenom_user = $_POST['prenom'];
    $email = $_POST['email'];
    $telephone = $_POST['telephone'];
    $pays = $_POST['pays'];
    $ville = $_POST['ville'];
    $codePost = $_POST['code_poste'];
    $numAppart = $_POST['num_appart'];
    $id_user = $_SESSION['currentUserId'];

    //$email_token=$_GET['update_user'];
    //$password = $_POST['update_pass'];

    // $niveau_acces = 1;
    //$status = 'Customer';
    $created_at = date('Y-m-d H:i:s');

    $database = new Database();
    $db = $database->_connect();
    $user = new UserClass();
    $commande = new Adresse($db);
    $function = new Functions();
    //$password_hash = password_hash($password, PASSWORD_BCRYPT);
    $user->set_id_user($id_user);
    $user->set_nom_user($nom_user);
    $user->set_prenom_user($prenom_user);
    $user->set_email($email);
    // $user->set_email_token($email_token);
    //$user->set_password($password_hash);
    $user->set_telephone($telephone);
    //$user->set_niveau_acces($niveau_acces);
    // $user->set_status($status);
    $user->set_created_at($created_at);
    $id = rand(0, 10000);

    $commande->setIdAdrsse($id);
    $commande->setIdUser($id_user);
    $commande->setPays($pays);
    $commande->setVille($ville);
    $commande->setCodePost($codePost);
    $commande->setNumeroAppart($numAppart);

    if ($user->update_user() && $commande->AddAdrsse()) {
        $result = json_encode(array('success' => false, 'msg' => "update ok"));
        $_SESSION['nom'] = $nom_user;
        $_SESSION['prenom'] = $prenom_user;
        $_SESSION['email'] = $email;
        $_SESSION["currentUserId"] = $id_user;
        $function->notification($email, "Mise a jour du Membre", "Vous avez realise des mises a jours sur vos infos personnelles. <br/> Vous pouvez vous connecter pour verifier les nouvelles infos.", null, $prenom_user . " " . $nom_user);
        header("Refresh:0; url='../view/clientSpace.php'");
    } else {

        $result = json_encode(array('success' => false, 'msg' => "impossible "));
    }
}
if (isset($_GET['level_user'])) {
    $id_user = $_GET['level_user'];
    $database = new Database();
    $db = $database->_connect();
    $user = new UserClass();
    $user->set_niveau_acces(4);
    $user->set_status('Admin');
    $user->level_user($id_user);
    if ($user->level_user($id_user)) {
        header("Refresh:0; url='../view/clientSpace.php'");
    }
}
//enregistrement produit

 
//traitement adrsse
 


   /////message visiteur///////////////////////////// 

if(isset($_POST['msg_submit']))
{
        $message= array();
        $message['nom']=$_POST['Name'];
        $message['email']=$_POST['Email'];
        $message['msg']=$_POST['Message'];
        $message['subj']=$_POST['Sujet'];
        $message['date']=date("d/m/Y à Hh:i");
        $message['id']=date("dmYHis");
        $js= file_get_contents('../json/message.json');
        $js= json_decode($js, true);
        $js[]=$message;
        $js= json_encode($js);
        file_put_contents('../json/message.json', $js);
        
        header("Refresh:0; url='../index1.php'");
}
else if  (isset($_GET['delmsg'])) {
    $message= file_get_contents('../json/message.json');
    $message=json_decode($message,true);

    $verifier = array( );
    for($i=0; $i<count($message);$i++)
    {
    if($message[$i]['id']!=$_GET['delmsg']){

        $verifier[]= $message[$i];
    }
    
    }


    $verifier= json_encode($verifier);
    file_put_contents('../json/message.json', $verifier);

    header("Refresh:0; url='../Admin/index.php'");


}

    //////traitement image////////////////////

if(isset($_POST['sendImg0']) && !empty($_POST['desc'])){

    $database = new Database();
    $db = $database->_connect();
    $WorkImg = new WorkImg();
    $function = new Functions();

    $description= $_POST['desc'];
    $categorie=$_POST['select'];

    $images = $_FILES['image']['name'];
    $tmp_dir = $_FILES['image']['tmp_name'];
    $imageSize = $_FILES['image']['size'];
    $upload_dir = 'static/img/WorkImg/';
    $target_file = $upload_dir.basename($images);

        
    $imgExt = strtolower(pathinfo($images, PATHINFO_EXTENSION));
    $valid_extensions = array('jpeg','jpg','png');

    $picProfileP = "";

    do {
        $picProfileP = rand(0, 1000000) . "." . $imgExt;
    } while ($function->imageWorckExist($picProfileP));

    $WorckImg0 = $upload_dir . $picProfileP;
    
    $id = rand(0, 10000);
    if ($_FILES['image']['size'] != 0 && $_FILES['image']['name'] !== "" ) {

        if($picProfileP != ""){
            if (in_array($imgExt, $valid_extensions)) {

            

                if (move_uploaded_file($tmp_dir, "../" . $WorckImg0)) {

                    $WorkImg->set_idImg_ImgWorck("".$id);
                    $WorkImg->set_DescImgWorck($description);
                    $WorkImg->set_categorie_ImgWorck($categorie);
                    $WorkImg->set_ImgWorck($WorckImg0);
                    $WorkImg->set_Base_ImgWorck($target_file);
                } else {
                    echo "upload pas ok   $images  $target_file   $tmp_dir";
                }
            
            } else {
                echo "extention non valide $WorckImg0 $imgExt  $categorie    $images";
            }
        } 


    }else {

        $WorkImg->set_idImg_ImgWorck("".$id);
        $WorkImg->set_DescImgWorck($description);
        $WorkImg->set_categorie_ImgWorck($categorie);
        $WorkImg->set_ImgWorck($WorckImg0);
        $WorkImg->set_Base_ImgWorck($target_file);

    }

    if($WorkImg->addImgWorck()){

        $result = json_encode(array('success' => true, 'msg' => "image  enregistré"));
    
    
    
    header("Refresh:0; url='../Admin/index.php'");
    } else {

        $result = json_encode(array('success' => false, 'msg' => "impossible . reessayé plus tard"));
        print($result);
    }
    // }*/

}

    /////////delet image//////////

if(ISSET($_GET['delImg'])){

    $id_img = $_GET['delImg'];
    $database = new Database();
    $db = $database->_connect();
    $img = new WorkImg($db);
    //$produit->delete_produit($id_produit);

    if ($img->delete_img($id_img)) {
        header("Refresh:0; url='../Admin/index.php'");
    }

}


    

 
?>