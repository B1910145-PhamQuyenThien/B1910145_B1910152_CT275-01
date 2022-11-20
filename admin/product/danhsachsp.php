<?php
    $result = $connect -> query ("SELECT * FROM products p
    INNER JOIN brands b ON p.brand_id = b.brand_id
    INNER JOIN categorys c ON p.category_id = c.category_id ORDER BY prd_id DESC"); 
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

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
                            <li class="breadcrumb-item active" aria-current="page">Danh sách sản phẩm</li>
                        </ol>
                    </nav>
                </div>

                <div class="card">
                    <div class="card-header bg-body">
                        <h2>DANH SÁCH SẢN PHẨM</h2>
                    </div>

                    <div class="card-body">
                        <div class="mb-2">
                            <a href="index_admin.php?page_layout=themsp" class="btn btn-primary">+ THÊM SẢN PHẨM</a>
                        </div>
                        <table class="table table-bordered">
                            <thead class="table-dark">
                                <th>#</th>
                                <th>Tên sản phẩm</th>
                                <th>Ảnh</th>
                                <th>Danh mục</th>
                                <th>Giá</th>
                                <th>Quy cách</th>
                                <th>Số lượng</th>
                                <th>Thương hiệu</th>
                                <th>Mô tả</th>
                                <th>Thao tác</th>

                            </thead>
                            <tbody>
                                <?php
                        $i = 1;
                       while($row = $result -> fetch()){?>
                                <tr>
                                    <td>
                                        <?php echo $i++;?>
                                    </td>
                                    <td>
                                        <?php echo $row['prd_name']; ?>
                                    </td>
                                    <td>
                                        <img class="img-fluid" style="width: 150px"
                                            src="img/<?php echo $row['img'] ;?>">
                                    </td>
                                    <td>
                                        <?php echo $row['category_name']; ?>
                                    </td>
                                    <td>
                                        <?php echo number_format($row['price'],0,",",".")?>
                                    </td>
                                    <td>
                                        <?php echo $row['specification']; ?>
                                    </td>
                                    <td>
                                        <?php echo $row['quantity']; ?> kg
                                    </td>
                                    <td>
                                        <?php echo $row['brand_name']; ?>
                                    </td>
                                    <td>
                                        <?php echo $row['description']; ?>
                                    </td>

                                    <td>
                                        <a href="index_admin.php?page_layout=suasp&id=<?php echo $row['prd_id']; ?>"
                                            class="btn btn-primary">Sửa</a>
                                        <a onclick="return Del('<?php echo $row['prd_name']?>')"
                                            href="index_admin.php?page_layout=xoasp&id=<?php echo $row['prd_id']; ?>"
                                            class="btn btn-danger">Xóa</a>
                                    </td>

                                </tr>
                                <?php $dbh = null; ?>
                                <?php } ?>


                            </tbody>
                        </table>
                    </div>
                </div>

            </div>

        </div>
    </div>


    <script>
    function Del(name) {
        return confirm("Bạn có chắc chắn muốn xóa sản phẩm: " + name + " ?");
    }
    </script>


</body>

</html>