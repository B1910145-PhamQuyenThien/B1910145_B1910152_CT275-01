<?php   
    session_start();
    $user = (isset($_SESSION['user'])) ? $_SESSION['user'] : [];

$result_cart = $connect -> query("SELECT count(id) AS soluong FROM carts");

$row_cart = $result_cart -> fetch();
?>

<nav class="navbar navbar-expand-lg bg-dark">
    <div class="container-fluid">
        <a class="navbar-brand text-white" ref="#">FRUITSHOP</a>
        <button class="navbar-toggler text-white" type="button" data-bs-toggle="collapse"
            data-bs-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false"
            aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active text-white" aria-current="page" href="#"> <b>Trang chủ</b></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="index_client.php?page_layout=danhsachsp"> <b> Sản phẩm</b></a>
                </li>
                <li class="nav-item">
                    <?php if(isset($_SESSION['user'])){ ?>
                    <a href="index_client.php?page_layout=lichsudh" class="nav-link text-white"> <b> Đơn hàng</b></a>
                    <?php } else { ?>
                    <a href="index_client.php?page_layout=dangnhaptk" class="nav-link text-white"><b> Đơn hàng</b></a>
                    <?php } ?>
                </li>
            </ul>


            <?php if(isset($user['inputEmail'])) { ?>
            <div class="dropdown">
                <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown"
                    aria-expanded="false">
                    <?php echo $user['fullName'] ?>
                </button>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="index_client.php?page_layout=dangxuatclient">Đăng xuất</a></li>
                </ul>
            </div>
            <?php } else {?>
            <div class="dropdown">
                <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown"
                    aria-expanded="false">
                    Tài khoản
                </button>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="index_client.php?page_layout=dangnhaptk">Đăng nhập</a></li>
                    <li><a class="dropdown-item" href="index_client.php?page_layout=dangkitk">Đăng kí</a></li>
                </ul>
            </div>

            <?php } ?>

            <form class="d-flex" role="search" action="index_client.php?page_layout=timkiem" method="POST"
                enctype="multipart/form-data">
                <input name="search" class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                <button name="sbm" class="btn btn-outline-white text-white" type="submit">Search</button>
            </form>
        </div>
        <button type="button" class="btn btn-white">
            <a href="index_client.php?page_layout=dangnhaptk">
                <i class="fas fa-user text-white"></i>
            </a>
        </button>

        <button type="button" class="btn btn-white position-relative">
            <a href="index_client.php?page_layout=dathang" class="text-dark">
                <i class="fas fa-shopping-bag text-white"></i></a>
            <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                <?php echo $row_cart['soluong'];?>
                <span class="visually-hidden">unread messages</span>
            </span>
        </button>


        <!--  <div class="dropdown">
            <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown"
                aria-expanded="false">
                Dropdown
            </button>
            <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="index_admin.php?page_layout=dangnhapadmin">Đăng nhập</a></li>
                <li><a class="dropdown-item" href="index_admin.php?page_layout=dangxuatadmin">Đăng xuất</a></li>
                <li><a class="dropdown-item" href="index_admin.php?page_layout=danhsachadmin">Danh sách tài
                        khoản Admin</a></li>
            </ul>
        </div> -->
        <!-- <h4>
            <a href="index_client.php?page_layout=dathang" class="text-dark">
                <i class="fas fa-shopping-bag text-dark"></i></a>
        </h4>
        <span class="badge text-bg-secondary">?php echo $row_cart['soluong'];?></span> -->
    </div>
</nav>