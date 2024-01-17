<?php 
    session_start();
    include("../models/Produit.php");
    include("../PHP/utils/MailClass.php");
    include("../config/Database.php");
    include("../models/Functions.php");
    if(isset($_GET["currentCart"])){

       //build array
       $tmp_str = str_replace("\"","",(substr($_GET["currentCart"],1,(strlen($_GET["currentCart"]) - 2 ))));
        $tmp_array = explode(",",$tmp_str);
        $i = 0;
        if(count($tmp_array) > 0){
            $functions = new Functions();
            $summe = 0;
            $productId = "";
            echo"<ul>";
                while( $i < count($tmp_array)){
                    $product = $functions->getProduitById($tmp_array[$i]);
                    $productId =  strval($product->get_id_produit());
                    if($productId !== null && $productId !== "")
                        echo"<li>
                                <div>
                                    <div class='col s1' id='colImgProduct'><img src='".$product->get_image_produit()."' class='circle responsive-img' /></div>
                                    <div class='col s9' id='colNameProduct'><span>".$product->get_nom_produit()."</span><span>".$product->get_desc_produit()."</span></div>
                                    <div class='col s1' id='colPriceProduct'><span>".$product->get_prix_produit()."<i class='material-icons'>euro_symbol</i></span></div>
                                    <div class='col s1' id='colBtnProduct'><a class='btn-floating btn-large waves-effect' id='btnRemove' onclick='removeItemToCart(\"$productId\")' ><i class='material-icons'>delete</i></a></div>
                                </div>
                            </li>";
                    $summe += floatval($product->get_prix_produit());
                    $i++;
                    //second possible visualisation
                    /*echo "
                        <div class='col s12'>
                        <div class='card-panel grey lighten-5 z-depth-1'>
                        <div class='row valign-wrapper'>
                            <div class='col s2'>
                            <img src='".$product->get_image_produit()."' alt='' class='circle responsive-img'> <!-- notice the 'circle' class -->
                            </div>
                            <div class='col s6'>
                                <span class='black-text'>
                                    <span>".$product->get_nom_produit()."</span><span>".$product->get_desc_produit()."</span>
                                </span>
                            </div>
                            <div class='col s2'>
                              <div id='colPriceProduct'><span>".$product->get_prix_produit()."<i class='material-icons'>euro_symbol</i></span></div>
                            </div>

                            <div class='col s2'>
                                <div  id='colBtnProduct'><a class='btn-floating btn-large waves-effect' id='btnRemove' onclick='removeItemToCart(\"$productId\")' ><i class='material-icons'>delete</i></a></div>
                            </div>
                        </div>
                        </div>
                    </div>
                    ";*/
                }
            echo"</ul>";
            $_SESSION["currentBalance"] = $summe;

            echo "<script> setBalance(".$summe."); </script>";
           
        }

       
    } else {
        echo"<p>No data</p>";
    }
?>