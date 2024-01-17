function loadCommande(param){
    $("#myList").load('allCommande.php?param='+param);

    $("#id_banner").html("Commandes  <i class='material-icons prefix'>shopping_basket</i>");
     document.getElementById('add').style.display = "none"; 
}

function loadCustomer(param){
    $("#myList").load('allCustomer.php');

    $("#id_banner").html("Clients Enregistre  <i class='material-icons prefix'>group</i>");
    document.getElementById('add').style.display = "none";
    document.getElementById('followUpClient').style.display = "none";
}
