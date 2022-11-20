<?php
    $id = $_GET['id'];
    $result =$connect -> query("DELETE FROM pays WHERE id_order= $id");
    header('location: index_admin.php?page_layout=danhsachdonhang');
?>