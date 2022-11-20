<?php
   
    $resultCart = $connect ->query("SELECT * FROM carts");

    $result_tongtien = $connect ->query ("SELECT SUM((quantity*price)) AS thanhtien FROM carts");
    $tongtien = $result_tongtien -> fetch();

    $sl_cart = $connect -> query ("SELECT count(id) AS sl FROM carts");
    $cart = $sl_cart -> fetch();
    ///var_dump($cart['sl']);
    //$thien = $result_cart ->fetch();
    //var_dump($cart);
?>

<body>
    <?php include('./header.php') ?>
    <?php if($cart['sl'] > 0) {?>
    <div class="row m-3">
        <div class="col-8">
            <div class="card my-3 shadow">
                <div class="card-header bg-body">
                    <h2>ĐẶT HÀNG</h2>
                </div>
                <div class="card-body">
                    <?php
                    $i = 1;
                    while($row = $resultCart ->fetch()) { ?>

                    <div class="card mb-3 shadow" style="max-width: 540px;">
                        <div class="row g-0">
                            <div class="col-3">
                                <img src="img/<?php echo $row['img'] ;?>" class="img-fluid rounded-start" alt="...">
                            </div>
                            <div class="col-3">
                                <div class="card-body">
                                    <h5 class="card-title"><?php echo $row['prd_name']; ?></h5>
                                    <p class="card-text"><?php echo number_format($row['price'],0,",","."); ?> vnđ</p>
                                    <p><?php echo $row['brand_name']; ?></p>
                                </div>
                            </div>
                            <div class="col-6 mt-5">
                                <form action="index_client.php?page_layout=capnhatgio&id=<?php echo $row['id']; ?>"
                                    method="POST" enctype="multipart/form-data">
                                    <span class="input-group">
                                        <button type="submit" name="sbm" class="input-group-text btn btn-danger"
                                            onclick="this.parentNode.querySelector('input[type=number]').stepDown()"> -
                                        </button>

                                        <input type="number" name="quantity" required
                                            value="<?php echo $row['quantity']; ?>"
                                            class="form-control w-25 d-inline text-center" min="1" max="100">
                                        <button type="submit" name="sbm" class="input-group-text btn btn-success"
                                            onclick="this.parentNode.querySelector('input[type=number]').stepUp()"> +
                                        </button>

                                        <a onclick="return Del('<?php echo $row['prd_name']?>')"
                                            href="index_client.php?page_layout=xoadathang&id=<?php echo $row['id']; ?>"
                                            class="btn btn-danger"><i class="fas fa-trash-alt"></i>
                                        </a>
                                    </span>

                                </form>
                            </div>
                        </div>
                    </div>
                    <?php $i++; ?>
                    <?php } ?>
                </div>
                <div class="col m-4">
                    <a href="index_client.php?page_layout=danhsachsp" class="btn btn-primary">TIẾP TỤC MUA HÀNG</a>
                    <a onclick="return DeleteAll()" href="index_client.php?page_layout=xoatatca"
                        class="btn btn-danger"><i class="fas fa-trash-alt"></i> XÓA TẤT CẢ</a>
                </div>
            </div>
            <h2> Giỏ hàng của bạn có <b class="text-danger"><?php echo $i-1;?> sản phẩm</b></h2>
        </div>

        <div class="col-4">
            <div class="card my-3 shadow">
                <div class="card-header bg-body">
                    <h2>TỔNG TIỀN GIỎ HÀNG</h2>
                </div>

                <div class="card-body">
                    <p>Tổng sản phẩm: <?php echo $i-1;?></p>
                    <p>Tổng tiền hàng: <?php echo number_format($tongtien['thanhtien'],0,",",".");?> vnđ</p>
                    <h5>
                        <p>Thành tiền: <?php echo number_format($tongtien['thanhtien'],0,",",".");?> vnđ</p>
                    </h5>
                    <div>
                        <?php if(isset($_SESSION['user'])){ ?>
                        <a href="index_client.php?page_layout=diachigiaohang" class="btn btn-primary"> ĐẶT HÀNG </a>
                        <?php } else { ?>
                        <a href="index_client.php?page_layout=dangnhaptk" class="btn btn-primary"> ĐẶT HÀNG</a>
                        <?php } ?>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <?php } else {?>
    <div class="shadow m-4 rounded p-5">
        <h4>GIỎ HÀNG CỦA BẠN HIỆN TẠI RỖNG</h4>
        <p>Vui lòng bấm <a href="index_client.php?page_layout=danhsachsp" class="btn btn-primary btn-sm "> Vào đây </a>
            để
            quay về
            trang sản phẩm!</p>
    </div>
    <?php } ?>
    <script>
    function Del(name) {
        return confirm("Bạn có chắc chắn muốn xóa sản phẩm: " + name + " ?");
    }

    function DeleteAll() {
        return confirm("Bạn có chắc chắn muốn tất cả sản phẩm khỏi giỏ hàng chứ?");
    }
    </script>
    <?php include('./footer.php') ?>
</body>