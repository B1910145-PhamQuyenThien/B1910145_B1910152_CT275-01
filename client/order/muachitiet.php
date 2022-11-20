<?php
    $id = $_GET['id'];

    $result_prd = $connect ->query("SELECT * FROM products p INNER JOIN brands b ON p.brand_id = b.brand_id
     WHERE prd_id = $id");

    $row = $result_prd -> fetch();
    
    $img =  $row['img'];
    $prd_name = $row['prd_name'];
    $price =  $row['price'];
    $quantity = 1;
    $brand_name = $row['brand_name'];

    $result = $connect -> query("INSERT INTO carts(img, prd_name, price, quantity, brand_name) 
    VALUES('$img','$prd_name', $price, $quantity, '$brand_name')");

header('location: index_client.php?page_layout=dathang');
    
?>