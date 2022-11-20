<?php
    $result = $connect -> query("SELECT * FROM carts");
?>

<body>
    <?php include('./header.php') ?>
    <div class="card m-5">
        <div class="card-header bg-body">
            <h2>DANH SÁCH GIỎ HÀNG</h2>
        </div>

        <div class="card-body">
            <table class="table table-bordered">
                <thead class="table-dark">
                    <th>#</th>
                    <th>Tên sản phẩm</th>
                    <th>Ảnh</th>
                    <th>Số lượng</th>
                    <th>Giá</th>
                    <th>Thương hiệu</th>
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
                            <img class="img-fluid" style="width: 150px" src="img/<?php echo $row['img'] ;?>">
                        </td>
                        <td>
                            <?php echo $row['quantity']; ?> kg
                        </td>
                        <td>
                            <?php echo $row['price']; ?> vnd
                        </td>
                        <td>
                            <?php echo $row['brand_name']; ?>
                        </td>

                        <td>
                            <a onclick="return Del('<?php echo $row['prd_name']?>')"
                                href="index_client.php?page_layout=xoagiohang&id=<?php echo $row['id']; ?>"
                                class="btn btn-danger"><i class="fas fa-trash-alt"></i></a>
                        </td>

                    </tr>
                    <?php } ?>
                </tbody>
            </table>
            <div class="mb-2">
                <a href="index_client.php?page_layout=danhsachsp" class="btn btn-primary">TIẾP TỤC MUA HÀNG</a>
            </div>

        </div>
    </div>

    <h2 class="mb-5"> Giỏ hàng của bạn có <b class="text-danger"><?php echo $i-1;?> sản phẩm</b></h2>

    <script>
    function Del(name) {
        return confirm("Bạn có chắc chắn muốn xóa sản phẩm: " + name + " ?");
    }
    </script>

    <?php include('./footer.php') ?>
</body>