<?php
    $id = $_GET['id'];
    $result_delete = $connect -> query("DELETE FROM products WHERE prd_id= $id");
    header('location: index_admin.php?page_layout=danhsachsp');
?>