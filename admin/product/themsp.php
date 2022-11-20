<?php
    $result_brand = $connect -> query("SELECT * FROM brands");

    $result_category = $connect -> query("SELECT * FROM categorys");

    if(isset($_POST['sbm'])){
        $prd_name= $_POST['prd_name'];

        $img= $_FILES['img']['name'];
        $img_tmp= $_FILES['img']['tmp_name'];

        $category_id = $_POST['category_id'];
        $price = $_POST['price'];
        $specification = $_POST['specification'];
        $quantity = $_POST['quantity'];
        $description = $_POST['description'];
        $brand_id = $_POST['brand_id'];

        $result = $connect -> query(
                "INSERT INTO products(prd_name, img, category_id, price, specification, quantity, description, brand_id) 
                VALUES('$prd_name', '$img', $category_id, $price, '$specification', $quantity, '$description', $brand_id)");

        move_uploaded_file($img_tmp, 'img/'.$img);
        
        header('location: index_admin.php?page_layout=danhsachsp');

    }
?>


<style type="text/css">
body {
    background-image: url(../admin/background/anhdong.gif);
}
</style>


<body>
    <div class="container-fluid mt-4 w-50">
        <div class="card">
            <div class="card-header">
                <h2>THÊM SẢN PHẨM</h2>
            </div>
            <div class="card-body">
                <form method="POST" enctype="multipart/form-data">
                    <div class="form-group mb-2">
                        <label for="prd_name" class="form-label">Tên sản phẩm</label>
                        <input type="text" name="prd_name" class="form-control" required>
                    </div>

                    <div class="form-group mb-2">
                        <label for="img" class="form-label">Ảnh</label> <br>
                        <input type="file" name="img">
                    </div>

                    <div class="form-group mb-3">
                        <label for="cetegory_id" class="form-label">Danh mục</label>
                        <select class="form-control" name="category_id">
                            <?php
                        while($row_category = $result_category -> fetch()){?>
                            <option value="<?php echo $row_category['category_id']; ?>">
                                <?php echo $row_category['category_name']; ?>
                            </option>
                            <?php } ?>
                        </select>
                    </div>

                    <div class="form-group mb-2">
                        <label for="price" class="form-label">Giá</label>
                        <input type="number" name="price" class="form-control" required>
                    </div>

                    <div class="form-group mb-2">
                        <label for="specification" class="form-label">Trọng lượng</label>
                        <input type="text" name="specification" class="form-control" required>
                    </div>

                    <div class="form-group mb-2">
                        <label for="quantity" class="form-label">Số lượng</label>
                        <input type="number" name="quantity" class="form-control" required>
                    </div>

                    <div class="form-group mb-2">
                        <label for="description" class="form-label">Mô tả</label>
                        <textarea name="description" class="form-control" required cols="30" rows="5"></textarea>
                    </div>

                    <div class="form-group mb-3">
                        <label for="brand_id" class="form-label">Thương hiệu</label>
                        <select class="form-control" name="brand_id">
                            <?php
                         while($row_brand = $result_brand -> fetch()){?>
                            <option value="<?php echo $row_brand['brand_id']; ?>">
                                <?php echo $row_brand['brand_name']; ?>
                            </option>
                            <?php } ?>
                        </select>
                    </div>

                    <button type="submit" name="sbm" class="btn btn-primary">Thêm</button>
                </form>
            </div>
        </div>
    </div>
</body>