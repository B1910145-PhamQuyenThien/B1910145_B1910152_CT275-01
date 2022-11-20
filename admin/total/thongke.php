<?php
    $resultPay = $connect -> query("SELECT count(id) AS tongdh FROM pays");
    $row = $resultPay -> fetch();
    
    $resulDagiao = $connect -> query("SELECT count(state_id) AS dagiao FROM pays WHERE state_id=4");
    $row_dagiao = $resulDagiao -> fetch();

    $resultAcc = $connect -> query("SELECT count(id_kh) AS user_ac FROM accounts");
    $row_ac = $resultAcc -> fetch();

    $resultTongtien = $connect -> query("SELECT sum(quantity*price) AS tongtien FROM pays WHERE state_id=4");
    $row_tongtien = $resultTongtien -> fetch();


    
if (isset($_POST['sbm'])) {
    $brand = $_POST['brand'];
    $resultBrand =$connect -> query("INSERT INTO brands(brand_name) VALUE ('$brand')");
 
    header('location: index_admin.php?page_layout=thongke');
}

if (isset($_POST['submit'])) {
    $category = $_POST['category'];
    var_dump($category);
    
    $resultCategory =$connect -> query("INSERT INTO categorys(category_name) VALUE ('$category')");

    header('location: index_admin.php?page_layout=thongke');
}
?>

<body>
    <div class="container-fluid">
        <div class="row">
            <div class="col-2 p-3 shadow bg-body text-primary">
                <b>FRUITSHOP</b>
            </div>

            <div class="shadow bg-body col-10 p-3 d-flex flex-row-reverse">
                <div class="dropdown">
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
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-2 pb-3 pr-3 pl-3 shadow bg-body">
                <div class="bg-light shadow row pr-3 pt-3 pb-3">
                    <div>
                        <i class="fas fa-home"></i>
                        <a href="index_admin.php?page_layout=thongke">Dashboard</a>
                    </div>
                </div>
                <p>QUẢN LÍ HÀNG</p>
                <div class="bg-body shadow row pr-3 pt-3 pb-3">
                    <div>
                        <i class="fas fa-gift"></i>
                        <a href="index_admin.php?page_layout=danhsachsp">Sản phẩm</a>
                    </div>
                </div>
                <div class="bg-body shadow row pr-3 pt-3 pb-3">
                    <div>
                        <i class="fas fa-shopping-bag"></i>
                        <a href="index_admin.php?page_layout=danhsachdonhang">Đơn hàng</a>
                    </div>
                </div>
                <div class="bg-body shadow row pr-3 pt-3 pb-3">
                    <div>
                        <i class="fas fa-user"></i>
                        <a href="index_admin.php?page_layout=danhsachtk">Khách hàng</a>
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
                            <li class="breadcrumb-item active" aria-current="page">Thống kê</li>
                        </ol>
                    </nav>
                </div>


                <div class="row m-3">
                    <div class="col bg-primary m-3 rounded shadow-lg text-white" style="height:200px;">
                        <h2><?php echo $row['tongdh']?></h2>
                        <p>Sản phẩm đã được đặt</p>
                    </div>

                    <div class="col bg-info m-3 rounded shadow-lg text-white" style="height:200px;">
                        <h2><?php echo $row_dagiao['dagiao']?></h2>
                        <p>Sản phẩm đã được giao</p>
                    </div>

                    <div class="col bg-success m-3 rounded shadow-lg text-white">
                        <?php if($row_tongtien['tongtien'] > 0) {?>
                        <h2><?php echo number_format($row_tongtien['tongtien'],0,",",".");?> VNĐ</h2>
                        <p>Tổng doanh thu</p>
                        <?php } else {?>
                        <h2><?php echo $row_tongtien['tongtien'];?>0 VNĐ</h2>
                        <p>Tổng doanh thu</p>
                        <?php } ?>
                    </div>
                    <div class="col bg-warning m-3 rounded shadow-lg text-white">
                        <h2><?php echo $row_ac['user_ac'];?></h2>
                        <p>Đăng kí người dùng</p>
                    </div>
                </div>

                <div class="row rounded shadow m-4 p-4">
                    <form method="POST" enctype="multipart/form-data">
                        <div class="form-group mb-2">
                            <label for="brand" class="form-label">Thêm chi nhánh</label>
                            <input type="text" name="brand" class="form-control mb-3" required>

                            <button type="submit" name="sbm" class="btn btn-primary">Thêm</button>
                    </form>
                </div>

            </div>

            <div class="row rounded shadow m-4 p-4">
                <form method="POST" enctype="multipart/form-data">
                    <div class="form-group mb-2">
                        <label for="brand" class="form-label">Thêm danh mục</label>
                        <input type="text" name="category" class="form-control mb-3" required>

                        <button type="submit" name="submit" class="btn btn-primary">Thêm</button>
                </form>
            </div>
        </div>
    </div>
</body>


<script>
function Del(name) {
    return confirm("Bạn có chắc chắn muốn xóa tài khoản: " + name + " ?");
}
</script>