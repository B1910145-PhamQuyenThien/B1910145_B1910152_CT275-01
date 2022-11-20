<?php
    $id = $_GET['id'];
//var_dump($id);
    if(isset($_POST['sbm'])){
        $quantity= $_POST['quantity'];
    }
    
    $result= $connect -> query("UPDATE carts SET quantity = $quantity WHERE id = $id");

    header('location: index_client.php?page_layout=dathang');
    
?>