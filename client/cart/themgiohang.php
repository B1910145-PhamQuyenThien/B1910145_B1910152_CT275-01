<?php
    $id = $_GET['id'];

    $result_brand = $connect -> query(
        "SELECT * FROM products p INNER JOIN brands b ON p.brand_id = b.brand_id
        WHERE prd_id = $id");

    $row = $result_brand -> fetch();
    $prd_id = $row['prd_id'];
    $img =  $row['img'];
    $prd_name = $row['prd_name'];
    $price =  $row['price'];
    $quantity = 1;
    $brand_name = $row['brand_name'];

    $result = $connect -> query("INSERT INTO carts(prd_id, prd_name, img, price, quantity, brand_name) 
    VALUES($prd_id, '$prd_name', '$img', $price, $quantity, '$brand_name')");

header('location: index_client.php?page_layout=danhsachsp');
    
?>