<?php
    $id = $_GET['id'];
    $result = $connect -> query ("DELETE FROM carts WHERE id= $id");
    header('location: index_client.php?page_layout=danhsachgiohang');
?>