<?php
    $id = $_GET['id'];
    $result = $connect ->query("DELETE FROM accounts WHERE id_kh= $id");
    header('location: index_admin.php?page_layout=danhsachtk');
?>