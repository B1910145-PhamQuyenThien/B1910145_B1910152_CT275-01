<?php
    $resultTongtien = $connect -> query("SELECT SUM((quantity*price)) as thanhtien from carts");
    $tongtien = $resultTongtien ->fetch();

    $resultCart  =$connect -> query("SELECT count(id) as cart FROM carts");
    $count = $resultCart ->fetch();

    //session_start();
    $user = (isset($_SESSION['user'])) ? $_SESSION['user'] : [];

?>

<body>

    <?php include('./header.php') ?>

    <div class="container-fluid">
        <div class="row mt-3">
            <?php if(isset($user['inputEmail'])){ ?>
            <div class="col-7">
                <div class="card my-3 shadow">
                    <div class="card-header bg-body">
                        <h3>ĐỊA CHỈ GIAO HÀNG</h3>
                    </div>

                    <div class="card-body">
                        <form action="index_client.php?page_layout=thanhtoan" method="POST"
                            enctype="multipart/form-data">
                            <div class="form-group mb-2">
                                <label for="fullName" class="form-label">Họ tên</label>
                                <input type="text" name="fullName" class="form-control" required
                                    value="<?php echo $user['fullName']; ?>">
                            </div>

                            <div class="form-group mb-2">
                                <label for="phoneNumber" class="form-label">Số điện thoại</label>
                                <input type="text" name="phoneNumber" class="form-control" required
                                    value="<?php echo $user['phoneNumber']; ?>">
                            </div>

                            <div class="form-group mb-2">
                                <label for="addRess" class="form-label">Địa chỉ</label>
                                <input type="text" name="addRess" class="form-control" required
                                    value="<?php echo $user['addRess']; ?>">
                            </div>

                            <div class="form-group mb-2">
                                <label for="shipCode" class="form-label">Hình thức ship</label>
                                <input type="text" name="shipCode" class="form-control" required>
                            </div>

                            <div class="form-group mb-2">
                                <label for="note" class="form-label">Ghi chú</label>
                                <textarea name="note" class="form-control" required cols="30" rows="5"></textarea>
                            </div>

                            <button type="submit" name="sbm" class="btn btn-primary">HOÀN THÀNH</button>
                        </form>
                    </div>
                </div>
            </div>
            <?php } else { ?>
            <div class="col-7">
                <div class="card my-3 shadow">
                    <div class="card-header bg-body">
                        <h3>ĐỊA CHỈ GIAO HÀNG</h3>
                    </div>

                    <div class="card-body">
                        <form action="index_client.php?page_layout=thanhtoan" method="POST"
                            enctype="multipart/form-data">
                            <div class="form-group mb-2">
                                <label for="fullName" class="form-label">Họ tên</label>
                                <input type="text" name="fullName" class="form-control" required>
                            </div>

                            <div class="form-group mb-2">
                                <label for="phoneNumber" class="form-label">Số điện thoại</label>
                                <input type="text" name="phoneNumber" class="form-control" required>
                            </div>

                            <div class="form-group mb-2">
                                <label for="addRess" class="form-label">Địa chỉ</label>
                                <input type="text" name="addRess" class="form-control" required>
                            </div>

                            <div class="form-group mb-2">
                                <label for="shipCode" class="form-label">Hình thức ship</label>
                                <input type="text" name="shipCode" class="form-control" required>
                            </div>

                            <div class="form-group mb-2">
                                <label for="note" class="form-label">Ghi chú</label>
                                <textarea name="note" class="form-control" required cols="30" rows="5"></textarea>
                            </div>

                            <button type="submit" name="sbm" class="btn btn-primary">HOÀN THÀNH</button>
                        </form>
                    </div>


                </div>
            </div>
            <?php } ?>

            <div class="col-5">
                <div class="card my-3 shadow">
                    <div class="card-header bg-body">
                        <h3>TỔNG TIỀN GIỎ HÀNG</h3>
                    </div>

                    <div class="card-body">
                        <p>Tổng sản phẩm: <?php echo $count['cart'];?></p>
                        <p>Tổng tiền hàng: <?php echo number_format($tongtien['thanhtien'],0,",",".");?> vnđ</p>

                        <h5>
                            <p> Thành tiền: <?php echo number_format($tongtien['thanhtien'],0,",",".");?> vnđ</p>
                        </h5>

                    </div>

                </div>
            </div>
        </div>
    </div>
    <?php include('./footer.php') ?>
</body>