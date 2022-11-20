<?php
if(isset($_GET['id'])){
    $id_order = $_GET['id'];

    $resultUser = $connect -> query("SELECT code, fullName, phoneNumber, addRess, note, today
            FROM pays p WHERE id_order = $id_order");
    $detail = $resultUser -> fetch();
}

    $resultDetail = $connect -> query("SELECT prd_name, img, quantity, price, (quantity*price) AS thanhtien, state_name
        FROM pays p INNER JOIN states s ON p.state_id = s.state_id WHERE id_order = $id_order"); 

    $resultTong = $connect -> query ("SELECT sum(quantity*price) as tong
                FROM pays p INNER JOIN states s ON p.state_id = s.state_id WHERE id_order = $id_order");
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
                    <div class="col">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item">
                                    <a href="#"><i class="fas fa-home"></i></a>
                                </li>
                                <li class="breadcrumb-item active" aria-current="page">Chi tiết đơn hàng</li>
                            </ol>
                        </nav>
                    </div>
                </div>

                <div class="row bg-white mb-3">
                    <p>Mã đơn hàng: <?php echo $detail['code']; ?></p>
                    <p>Tên khách hàng: <?php echo $detail['fullName']; ?></p>
                    <p>Số điện thoại: 0<?php echo $detail['phoneNumber']; ?></p>
                    <p>Địa chỉ: <?php echo $detail['addRess']; ?></p>
                    <p>Ghi chú: <?php echo $detail['note']; ?></p>
                    <p>Ngày đặt hàng: <?php echo $detail['today']; ?></p>
                </div>

                <div class="card">
                    <div class="card-header bg-body">
                        <h3>HÓA ĐƠN CHI TIẾT</h3>
                    </div>

                    <div class="card-body">
                        <table class="table table-bordered">
                            <thead class="table-dark">
                                <th>#</th>
                                <th>Tên sản phẩm</th>
                                <th>Ảnh</th>
                                <th>Số lượng</th>
                                <th>Giá</th>
                                <th>Thành tiền</th>
                                <th>Trạng thái</th>
                            </thead>
                            <tbody>

                                <?php
                                $i = 1;
                                while ($row = $resultDetail -> fetch()) { ?>
                                <tr>
                                    <td>
                                        <?php echo $i++?>
                                    </td>
                                    <td>
                                        <?php echo $row['prd_name']; ?>
                                    </td>
                                    <td>

                                        <img src="img/<?php echo $row['img'] ;?>" class="img-fluid rounded-start"
                                            style="width:150px; height:120px" alt="...">
                                    </td>
                                    <td>
                                        <?php echo $row['quantity']; ?>
                                    </td>
                                    <td>
                                        <?php echo number_format($row['price'],0,",",".");?>
                                    </td>
                                    <td>
                                        <b><?php echo number_format($row['thanhtien'],0,",",".");?></b>
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

                                </tr>
                                <?php }
                                ?>
                            </tbody>
                        </table>
                        <h4><b>TỔNG TIỀN: <?php echo number_format($row_tong['tong'],0,",",".");?> VNĐ</b></h4>
                    </div>
                </div>

                <h4> Bạn đã mua <b class="text-danger"><?php echo $i -1; ?> sản phẩm</b></h4>
            </div>
        </div>
    </div>
    <script>
    function Del(name) {
        return confirm("Bạn có chắc chắn muốn xóa đơn hàng của: " + name + " ?");
    }
    </script>