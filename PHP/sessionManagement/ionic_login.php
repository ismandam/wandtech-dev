<?php
include_once("../../models/ionic_user.php");
include_once("../../models/Adresses.php");
include_once("../../config/Database.php");
include_once("../../models/Functions.php");

header("Access-Control-Allow-Origin: *");
	header("Content-Type: application/json; charset=UTF-8");
	header("Access-Control-Allow-Methods:PUT,GET,POST,DELETE,OPTIONS");
	header("Access-Control-Max-Age: 3600");
	header("Access-Control-Allow-Headers: Content-Type,Access-Control-Allow-Headers,Authorization,X-Requested-With,x-xsr-token");
 


if (isset($_POST["email"]) && isset($_POST["password"])) {


    $current_user = new Functions();

    $user =  $current_user->getConnectedUser($_POST["email"], $_POST["password"]);
    $userAdress = $current_user->getAdresse($user->get_id_user());
    if ($user->get_id_user() != "")
        header("Refresh:0; url='sessionStart.php?currentUserId=" . $user->get_id_user() . "&email=" . $user->get_email() . " &nom=" . $user->get_nom_user() . "&prenom=" . $user->get_prenom_user() . "&image=" . $user->getProfilImage() . "&telephone=" . $user->get_telephone() . "&pays=" . $userAdress->getPays() . "&ville=" . $userAdress->getVille() . "&code=" . $userAdress->getCodePost() . "&appart=" . $userAdress->getNumeroAppart() . "&acces=" . $user->get_niveau_acces() . "'");
    else
        header("Refresh:0; url='../../index.php'");
     $result = json_encode(array('success' => true, 'msg' => "cool"));
            print($result);
} else {
    echo " <div class='row'><div class='col s12'>Willkommen</div></div> ";
     $result = json_encode(array('success' => false, 'msg' => "impossible de vous enregistrer. reessayé plus tard"));
            print($result);
}
