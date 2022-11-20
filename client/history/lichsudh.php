<?php

$resultPay = $connect -> query("SELECT id, code, fullName, sum(quantity*price) AS total, today, state_name, id_order
        FROM pays p INNER JOIN states s ON p.state_id = s.state_id
        GROUP BY (id_order) ORDER BY id DESC");

$resultTong = $connect -> query("SELECT sum(quantity*price) as tong
                FROM pays p INNER JOIN states s ON p.state_id = s.state_id");
$row_tong = $resultTong -> fetch();

//$sql_thanhtien = "SELECT sum(quantity*price) as total FROM pays";
//$query_thanhtien = mysqli_query($connect, $sql_thanhtien);
//$user = (isset($_SESSION['user'])) ? $_SESSION['user'] : [];
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
                        <?php if(isset($_SESSION['user'])){ ?>
                        <a href="index_client.php?page_layout=lichsudh"> <b> Đơn hàng</b></a>
                        <?php } else { ?>
                        <a href="index_client.php?page_layout=dangnhaptk"><b> Đơn hàng</b></a>
                        <?php } ?>
                    </div>
                </div>
            </div>

            <div class="col-10 bg-light">
                <div class="row mb-4 bg-light text-light shadow pl-3 pt-3 pr-3">
                    <div class="col">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item">
                                    <a href="#"><i class="fas fa-home"></i></a>
                                </li>
                                <li class="breadcrumb-item active" aria-current="page">Danh sách đơn hàng</li>
                            </ol>
                        </nav>
                    </div>
                </div>



                <div class="card">
                    <div class="card-header bg-body">
                        <h3>DANH SÁCH ĐƠN HÀNG</h3>
                    </div>

                    <div class="card-body">
                        <table class="table table-bordered">
                            <thead class="table-dark">
                                <th>STT</th>
                                <th>Mã đơn hàng</th>
                                <th>Họ tên</th>
                                <th>Tổng tiền</th>
                                <th>Ngày đặt</th>
                                <th>Trạng thái</th>
                                <th>Chi tiết</th>
                            </thead>
                            <tbody>

                                <?php
                                $i = 1;
                                while ($row = $resultPay -> fetch()) { ?>

                                <tr>
                                    <td>
                                        <?php echo $i++ ?>
                                    </td>
                                    <td>
                                        <?php echo $row['code']; ?>
                                    </td>
                                    <td>
                                        <?php echo $row['fullName']; ?>
                                    </td>
                                    <td>
                                        <b><?php echo number_format($row['total'],0,",",".");?> </b>
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
                                        <?php } else {?>
                                        <b
                                            class="text-white shadow rounded bg-danger"><?php echo $row['state_name']; ?></b>
                                        <?php } ?>
                                    </td>
                                    <td>
                                        <a href="index_client.php?page_layout=chitietdh&id=<?php echo $row['id_order']; ?>"
                                            class="btn btn-success btn-sm"><b> Xem chi tiết</b></a>
                                    </td>
                                </tr>
                                <?php }
                                ?>
                            </tbody>
                        </table>
                        <h4><b>TỔNG TIỀN: <?php echo number_format($row_tong['tong'],0,",",".");?> VNĐ</b></h4>

                    </div>
                </div>

                <h4> Bạn đã đặt <b class="text-danger"><?php echo $i -1; ?> đơn hàng</b></h4>
            </div>
        </div>
    </div>
    <script>
    function Del(name) {
        return confirm("Bạn có chắc chắn muốn xóa đơn hàng của: " + name + " ?");
    }
    </script>