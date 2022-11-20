<?php
    $id = $_GET['id'];
    $sql = "DELETE FROM loginads WHERE id= $id";
    $query = mysqli_query($connect, $sql);
    header('location: index_admin.php?page_layout=danhsachadmin');
?>