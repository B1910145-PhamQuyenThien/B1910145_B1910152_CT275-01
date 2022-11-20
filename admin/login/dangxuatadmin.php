<?php 
    session_start();
    unset($_SESSION['user']);
    header('location: index_admin.php?page_layout=dangnhapadmin');
?>