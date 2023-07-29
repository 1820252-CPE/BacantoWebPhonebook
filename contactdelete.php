<?php



if(isset($_GET["id"]) ) {
    $id = $_GET ["id"];

    $servername= "localhost";
    $username = "id21003525_dominique";
    $password = "CDominique_826";
    $database ="id21003525_credentials";

    $connection = new mysqli($servername, $username, $password, $database);
    
    
    $sql = "DELETE FROM dcontacts WHERE id=$id";
    $connection->query($sql);


}

header("location: cphonebook.php");
exit;
?>