<?php
$resultCart = $connect -> query("SELECT * FROM carts");

/* $sql_pay = "SELECT * FROM pays p INNER JOIN states s ON p.state_id = s.state_id";
    $query_pay = mysqli_query($connect, $sql_pay);
    $row_pay = mysqli_fetch_assoc($query_pay); */

//$state_id = $row_pay['state_id'];

if (isset($_POST['sbm'])) {
    $fullName = $_POST['fullName'];
    $phoneNumber = $_POST['phoneNumber'];
    $addRess = $_POST['addRess'];
    $shipCode = $_POST['shipCode'];
    $note = $_POST['note'];
}

$state_id = 1;

$today =  date('Y-m-d H:i:s');

 
$id_order = mt_rand(0,10000);

session_start();
$user = isset($_SESSION['user']) ? $_SESSION['user'] : [];
$id_kh = $user['id_kh'];

$code = bin2hex(random_bytes(5));


while ($row = $resultCart -> fetch()) {
    $prd_id = $row['prd_id'];
    $img = $row['img'];
    $prd_name = $row['prd_name'];
    $price = $row['price'];
    $quantity = $row['quantity'];
    $brand_name = $row['brand_name'];

    $resultPay = $connect -> query(
        "INSERT INTO pays(code, fullName, phoneNumber, addRess, shipCode, img, prd_name, price, quantity, brand_name, note, state_id, id_kh, id_order, prd_id, today) 
        VALUES('$code', '$fullName', $phoneNumber, '$addRess','$shipCode', '$img', '$prd_name', $price, $quantity, '$brand_name', '$note', $state_id, $id_kh, $id_order, $prd_id, '$today')");
}

//header('location: index_client.php?page_layout=danhsachsp');
header('location: index_client.php?page_layout=lichsudh');

?>