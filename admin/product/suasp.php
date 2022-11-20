<?php
    $id = $_GET['id'];

    $result_brand = $connect -> query("SELECT * FROM brands");
    $result_category = $connect -> query("SELECT * FROM categorys");
  
    $result_prd = $connect -> query("SELECT * FROM products WHERE prd_id = $id");

    $row_prd = $result_prd -> fetch();
    

    if(isset($_POST['sbm'])){
        $prd_name = $_POST['prd_name'];

        if($_FILES['img']['name'] == ''){
            $img = $row_prd['img'];
        }
        else{
            $img = $_FILES['img']['name'];
            $img_tmp =  $_FILES['img']['tmp_name'];
            move_uploaded_file($img_tmp, 'img/'.$img);
        }
        $category_id = $_POST['category_id'];
        $price = $_POST['price'];
        $specification = $_POST['specification'];
        $quantity = $_POST['quantity'];
        $description = $_POST['description'];
        $brand_id = $_POST['brand_id'];

        $result = $connect -> query(
                "UPDATE products 
                SET prd_name = '$prd_name', img = '$img', category_id = $category_id, price = $price, specification = '$specification', quantity = $quantity, description = '$description' , brand_id = $brand_id 
                WHERE prd_id = $id");
        
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
                <h2>SỬA SẢN PHẨM</h2>
            </div>
            <div class="card-body">
                <form method="POST" enctype="multipart/form-data">
                    <div class="form-group mb-2">
                        <label for="prd_name" class="form-label">Tên sản phẩm</label>
                        <input type="text" name="prd_name" class="form-control" required
                            value="<?php echo $row_prd['prd_name']; ?>">
                    </div>

                    <div class="form-group mb-2">
                        <label for="img" class="form-label">Ảnh</label> <br>
                        <input type="file" name="img" value="<?php echo $row_prd['img']; ?>">
                    </div>

                    <div class="form-group mb-3">
                        <label for="category_id" class="form-label">Danh mục</label>
                        <select class="form-control" name="category_id">
                            <?php
                        while($row_category = $result_category -> fetch()){ ?>
                            <option value="<?php echo $row_category['category_id']; ?>">
                                <?php echo $row_category['category_name']; ?>
                            </option>
                            <?php } ?>
                        </select>
                    </div>

                    <div class="form-group mb-2">
                        <label for="price" class="form-label">Giá</label>
                        <input type="number" name="price" class="form-control" required
                            value="<?php echo $row_prd['price']; ?>">
                    </div>

                    <div class="form-group mb-2">
                        <label for="specification" class="form-label">Quy cách</label>
                        <input type="text" name="specification" class="form-control" required
                            value="<?php echo $row_prd['specification']; ?>">
                    </div>

                    <div class="form-group mb-2">
                        <label for="quantity" class="form-label">Số lượng</label>
                        <input type="number" name="quantity" class="form-control" required
                            value="<?php echo $row_prd['quantity']; ?>">
                    </div>

                    <div class="form-group mb-2">
                        <label for="description" class="form-label">Mô tả</label>
                        <textarea name="description" class="form-control" cols="30"
                            rows="5"><?php echo $row_prd['description']; ?></textarea>
                    </div>

                    <div class="form-group mb-3">
                        <label for="brand_id" class="form-label">Thương hiệu</label>
                        <select class="form-control" name="brand_id">
                            <?php
                         while($row_brand = $result_brand -> fetch()){ ?>
                            <option value="<?php echo $row_brand['brand_id']; ?>">
                                <?php echo $row_brand['brand_name']; ?>
                            </option>
                            <?php } ?>
                        </select>
                    </div>

                    <button type="submit" name="sbm" class="btn btn-primary">Sửa</button>
                </form>
            </div>
        </div>
    </div>
</body>