<?php 

    if(isset($_POST['sbm'])){
        $search= $_POST['search'];
    }

    $result = $connect -> query("SELECT * FROM products p INNER JOIN brands b ON p.brand_id = b.brand_id 
           WHERE description LIKE '%$search%'");

    //header('location: index_client.php?page_layout=ketquatimkiem');
?>

<!DOCTYPE html>
<html>

<body>

    <?php include('./header.php') ?>
    <div class="container-fluid">

        <div class="row">
            <div class="col-2 p-3 shadow bg-body text-dark">
                <b>DANH MỤC</b>
            </div>

            <div class="shadow bg-body col-10 p-3 ">
                <!-- <h3 class="m-3 d-flex flex-row-reverse"><a href="index_client.php?page_layout=dathang" class="text-dark"><i
                            class="fas fa-shopping-bag"></i></a></h3> -->
                <h4>Hi! Chào mừng đến với kênh mua sắm cùng ShopFruit</h4>
            </div>
        </div>

        <div class="row mb-4">
            <div class="col-2 pb-3 pr-3 pl-3 shadow bg-body">
                <div class="bg-light shadow row pr-3 pt-3 pb-3">
                    <div>
                        <i class="fas fa-home"></i>
                        <a href="index_client.php?page_layout=dashboard"> <b> Trang chủ</b></a>
                    </div>
                </div>
                <div class="bg-body shadow row pr-3 pt-3 pb-3">
                    <div>
                        <i class="fas fa-gift"></i>
                        <a href="index_client.php?page_layout=danhsachsp"> <b> Sản phẩm</b></a>
                    </div>
                </div>
                <div class="bg-body shadow row pr-3 pt-3 pb-3">
                    <div>
                        <i class="fas fa-shopping-bag"></i>
                        <a href="index_client.php?page_layout=lichsudh"> <b> Đơn hàng</b></a>
                    </div>
                </div>
            </div>

            <div class="col-10 bg-light">
                <div class="row mb-4 bg-light text-light shadow pl-3 pt-3 pr-3">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="#"><i class="fas fa-home"></i></a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">Danh sách sản phẩm</li>
                        </ol>
                    </nav>
                </div>

                <div class="row">
                    <?php
                        $output = "";
                        while ($row = $result -> fetch()) {
                            $output .= 
                            "<div class='col-md-3 shadow-sm mb-2'>
                                <a class='mb-2' href='index_client.php?page_layout=chitietsp&id=".$row['prd_id']."'>
                                    <img src='img/".$row['img']."' style='height:250px;width:100%;'>
                                    <h5 class='text-secondary text-center'>".$row['prd_name']."</h5>
                                    <h5 class='text-secondary text-center'>".$row['price']." vnđ</h5>
                                    <h5 class='text-secondary mb-3 text-center'>".$row['brand_name']."</h5>
                                    
                                </a>
                                <div class='text-center mb-2'>
                                    <a class='btn btn-outline-success ' href='index_client.php?page_layout=themgiohang&id=".$row['prd_id']."'><i class='fas fa-shopping-bag'></i> Thêm vào giỏ</a>
                                    <a class='btn btn-outline-success ' href='index_client.php?page_layout=muachitiet&id=".$row['prd_id']."'>Mua</a>
                                </div>
                            </div>";
                        }
                        echo $output;
                    ?>
                </div>

            </div>
        </div>
        <?php include('./footer.php') ?>
</body>


</html>