<?php
session_start();
$_SESSION["nom"] = $_GET["nom"];
$_SESSION["prenom"] = $_GET["prenom"];
$_SESSION["acces"] = $_GET["acces"];
$_SESSION["email"] = $_GET["email"];
$_SESSION["image"] = $_GET["image"];
$_SESSION["telephone"] = $_GET["telephone"];
//$_SESSION["pays"] = $_GET["pays"];
//$_SESSION["ville"] = $_GET["ville"];
//$_SESSION["code"] = $_GET["code"];
//$_SESSION["appart"] = $_GET["appart"];
$_SESSION["currentUserId"] = $_GET["currentUserId"];

//echo "<script src='../../static/js/scriptHome.js'>initShop(); pushMateriel(null);</script>";
if (intval($_SESSION["acces"]) == 4)
    header("Refresh:0; url='../../index1.html'");
else
echo $_SESSION["acces"];
    header("Refresh:0; url='../../Admin/index.PHP?Admin=true'");
