<?php
    if(isset($_POST['sbm'])){
        $code = $_POST['code'];
        $resultSearch = $connect -> query (
            "SELECT id, code, fullName, sum(quantity*price) AS total, today, state_name, id_order
             FROM pays p INNER JOIN states s ON p.state_id = s.state_id
             WHERE code ='$code' GROUP BY (id_order)");
    }
    $resultTong = $connect -> query("SELECT sum(quantity*price) as tong
            FROM pays WHERE code = '$code'");

    $row_tong = $resultTong -> fetch();
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
                            <li class="breadcrumb-item active" aria-current="page">Danh sách đơn hàng</li>
                        </ol>
                    </nav>
                </div>



                <div class="card">
                    <div class="card-header bg-body">
                        <h3 class="mb-3">DANH SÁCH ĐƠN HÀNG</h3>
                        <div class="row">
                            <div class="col-5">
                                <form action="index_admin.php?page_layout=timdonhang" method="POST"
                                    enctype="multipart/form-data">
                                    <div class="input-group mb-3">
                                        <input name="code" type="text" class="form-control"
                                            placeholder="Nhập mã đơn hàng cần tìm">
                                        <button name="sbm" class="input-group-text">Search</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                    <div class="card-body">
                        <table class="table table-bordered">
                            <thead class="table-dark">
                                <th>ID</th>
                                <th>Mã đơn hàng</th>
                                <th>Họ tên</th>
                                <th>Tổng tiền</th>
                                <th>Ngày đặt</th>
                                <th>Trạng thái</th>
                                <th>Cập nhật</th>
                            </thead>
                            <tbody>

                                <?php
                                while ($row = $resultSearch -> fetch()) { ?>

                                <tr>
                                    <td>
                                        <?php echo $row['id']; ?>
                                    </td>
                                    <td>
                                        <?php echo $row['code']; ?>
                                    </td>
                                    <td>
                                        <?php echo $row['fullName']; ?>
                                    </td>
                                    <td>
                                        <b><?php echo number_format($row['total'],0,",",".") ?></b>
                                    </td>
                                    <td>
                                        <?php echo $row['today']; ?>
                                    </td>
                                    <td>
                                        <?php if ($row['state_name'] == 'Đặt thành công') {?>
                                        <b
                                            class="text-white shadow rounded bg-primary"><?php echo $row['state_name']; ?></b>
                                        <?php } elseif ($row['state_name'] == 'Đang gói hàng') { ?>
                                        <b
                                            class="text-white shadow rounded bg-info"><?php echo $row['state_name']; ?></b>
                                        <?php } elseif ($row['state_name'] == 'Đang giao hàng') { ?>
                                        <b
                                            class="text-white shadow rounded bg-warning"><?php echo $row['state_name']; ?></b>
                                        <?php } elseif ($row['state_name'] == 'Đã giao') { ?>
                                        <b
                                            class="text-white shadow rounded bg-success"><?php echo $row['state_name']; ?></b>
                                        <?php } else { ?>
                                        <b
                                            class="text-white shadow rounded bg-danger"><?php echo $row['state_name']; ?></b>
                                        <?php } ?>
                                    </td>
                                    <td>
                                        <a href="index_admin.php?page_layout=capnhatdonhang&id=<?php echo $row['id_order']; ?>"
                                            class="btn btn-primary btn-sm">Cập nhật</a>
                                        <a href="index_admin.php?page_layout=chitietdh&id=<?php echo $row['id_order']; ?>"
                                            class="btn btn-primary btn-sm">Chi tiết</a>
                                        <a onclick="return Del('<?php echo $row['fullName']; ?>')"
                                            href="index_admin.php?page_layout=xoadonhang&id=<?php echo $row['id_order']; ?>"
                                            class="btn btn-danger btn-sm">Xóa</a>

                                    </td>
                                </tr>
                                <?php }
                                ?>
                            </tbody>
                        </table>
                        <h4><b>TỔNG TIỀN: <?php echo number_format($row_tong['tong'],0,",",".") ?> VNĐ</b></h4>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
    function Del(name) {
        return confirm("Bạn có chắc chắn muốn xóa đơn hàng của: " + name + " ?");
    }
    </script>