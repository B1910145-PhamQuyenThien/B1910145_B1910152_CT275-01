<?php 
    session_start();
    unset($_SESSION['user']);
    header('location: index_client.php?page_layout=danhsachsp');
?>