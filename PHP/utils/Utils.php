<?php

    session_start();
    include_once("../../config/Database.php");
    include_once("../../models/Livraison.php");
    include_once("../../models/Commande.php");
    include_once("../../models/Messages.php");
    include("../../PHP/utils/MailClass.php");
    include("../../models/Functions.php"); 

    $functions = new Functions();
    //update delivry adress
    if(isset($_GET["id"]) && isset($_GET["name"]) && isset($_GET["firstName"]) 
        && isset($_GET["country"]) && isset($_GET["city"]) && isset($_GET["street"]) 
        && isset($_GET["phone"])){

            $delivry = new Livraison();
            $delivry->setIdLivraison($_GET["id"]);
            $delivry->setNomClient($_GET["name"]);
            $delivry->setPrenomClient($_GET["firstName"]);
            $delivry->setPaysLivraison($_GET["country"]);
            $delivry->setVilleLivraison($_GET["city"]);
            $delivry->setRueLivraison($_GET["street"]);
            $delivry->setTelefonClient($_GET["phone"]);


            $msgload = "<table>
            <thead>
                    <tr>
                        <th>Nom</th>
                        <th>Prenom</th>
                        <th>Pays</th>
                        <th>Ville</th>
                        <th>Rue</th>
                        <th>Telephone</th>
                    </tr>
            </thead>
            <tbody>
                    <tr>
                        <td>".$_GET["name"]."</td>
                        <td>".$_GET["firstName"]."</td>
                        <td>".$_GET["country"]."</td>
                        <td>".$_GET["city"]."</td>
                        <td>".$_GET["street"]."</td>
                        <td>".$_GET["phone"]."</td>
                    </tr>
            </tbody>
            </table>";
            if($delivry->updateDelivry())
                $functions->notification($_SESSION["email"],"Mise a jour de l'adresse de Livraison","Votre adresse de livraison pour la Livraison N° ".$_GET["id"]." vient d'etre mise a jour. <br/> La nouvelle adresse est la suivante : <br/> ".$msgload,null,$_SESSION["prenom"]." ".$_SESSION["nom"]);
                //echo"<script>alert('Nouvelle adresse de Livraison mise a Jour');</script>";


        }

    
        //update Order state
        if(isset($_GET["delivry_state"]) && isset($_GET["delivry_id"]) 
            && isset($_GET["date_delivry"]) && isset($_GET["order_id"]) && isset($_GET["order_state"])){
                $delivry = new Livraison();
                $delivry->setIdLivraison($_GET["delivry_id"]);
                $delivry->setEtat($_GET["delivry_state"]);
                $delivry->setDateLivraison($_GET["date_delivry"]);

                //get order by id
               // $order = $function->getO
               $current_order = $functions->getOrderById($_GET["order_id"]);

                //get delivery by order
                $order_delivery = $functions->getDelivryInfoById($current_order->getIdLivraison());


                if($delivry->updateStateDelivry()){
                    $functions->notification($order_delivery->getMailClient(),"Mise de l'Etat de Livraison de votre commande","Votre livraison de la commande N° ".$_GET["order_id"]." vient d'etre mise a jour. <br/>Nouvel Etat : ".$_GET['delivry_state'],null,$order_delivery->getNomClient()." ".$order_delivery->getPrenomClient());
                   
                    $order = new Commande();
                    $order->setIdCommande($_GET["order_id"]);
                    $order->setState($_GET["order_state"]);

                    if($order->updateStateOrder())
                        $functions->notification($order_delivery->getMailClient(),"Mise de l'Etat de la commande","Votre livraison de la commande N° ".$_GET["order_id"]." vient d'etre mise a jour. <br/>Nouvel Etat : ".$_GET['order_state'],null,$order_delivery->getNomClient()." ".$order_delivery->getPrenomClient());
                }

            }

        //send mail from contact Page
        if(isset($_GET["action"]) && $_GET["action"] == "contactMail"){
            $from = $_GET["from"];
            $msg = $_GET["msg"];
            $senderName = $_GET["senderName"];

            $rate = $_GET["rate"];

            $function = new Functions();
            $message = new Message();
            $createdAt = date("Y-m-d H:i:s");

            if(isset($_SESSION['currentUserId']))
                 $message->setIdUser($_SESSION['currentUserId']);
            else
                if(isset($_GET["from"]))
                    $message->setIdUser($_GET["from"]);

            $message->setTypeMessage('Feedback');
            $message->setMessage($_GET["msg"]);
            
            if(isset($rate))
                $message->setJauge($rate);
            else
                $message->setJauge(1);

            $message->setDateMessage($createdAt);

            if($message->addMessage() == true){
                $response = $functions->notification("feedback@emp-release.online","Feedback Client",$msg."<p>Mail du client : <b><i>".$from."</i></b></p>",null,$senderName);

                if($response){
                    $functions->notification($from,"Accuse de reception","Votre Message a ete recu. <p></p>",null,$senderName);
                }
                else
                    echo "<i style='color:yellow;'>Veuillez reessayer plutard</i>";
            }

        }

        //set Feedback visibility
        if(isset($_GET['setMessageVisibility']) && isset($_GET['idMessage']) && isset($_GET['state']) ){
            $setVisibility = $_GET['setMessageVisibility'];
            
            if($setVisibility == "true"){
                $functions = new Functions();
                $idMessage = $_GET['idMessage'];
                $state = intval($_GET['state']);

                $state = ($state == 0) ? 1 : 0;

                if($functions->setVisibility($idMessage,$state))
                    echo "success";
                else
                    echo "failed";

            }
        }
?>