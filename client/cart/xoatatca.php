<?php 
    $result = $connect -> query ("DELETE FROM carts");
    header('location: index_client.php?page_layout=dathang');
?>