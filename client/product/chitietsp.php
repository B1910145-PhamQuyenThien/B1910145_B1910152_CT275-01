<?php
    $id = $_GET['id'];
    $result_prd = $connect -> query("SELECT * FROM products p INNER JOIN brands b ON p.brand_id = b.brand_id
     WHERE prd_id = $id");

    //$result_sl = $connect -> query("SELECT sum(quantity) AS daban FROM pays WHERE prd_id = $id GROUP BY (prd_id)");

    //$row_sl = $result_sl -> fetch();


/*     $sql_prd = "SELECT (pr.quantity - daban) AS hangton FROM products pr 
    INNER JOIN pays p ON pr.prd_id = p.prd_id WHERE pr.prd_id = $id";
    $query_prd = mysqli_query($connect, $sql_prd);
    $row_prd = mysqli_fetch_assoc($query_prd);
var_dump($row_p rd);
   // $hangton = $row_prd['quantity'] - $row_sl['daban'];
    //($hangton);
    //$sql_up = "UPDATE products SET quantity = $hangton WHERE prd_id = $id";
   // $query_up = mysqli_query($connect, $sql_up);
    /* $sql_pay = "SELECT * FROM pays";
    $query_pay = mysqli_query($connect, $sql_pay);
    $row_pay = mysqli_fetch_assoc($query_pay); */


?>

<body>


    <?php include('./header.php') ?>
    <?php  while($row = $result_prd -> fetch()){?>

    <div class="row m-5">

        <div class="col-7">

            <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img class="" style="width:640px;" src="img/<?php echo $row['img'] ;?>">
                    </div>
                    <div class="carousel-item">
                        <img class="" style="width:640px;" src="img/<?php echo $row['img'] ;?>">
                    </div>
                    <div class="carousel-item">
                        <img class="" style="width:640px;" src="img/<?php echo $row['img'] ;?>">
                    </div>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls"
                    data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls"
                    data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
        </div>

        <div class="col-5">
            <h1 class="mb-4"><?php echo $row['prd_name']; ?></h1>
            <h2 class="mb-4"> <?php echo number_format($row['price'],0,",",".");?> VNĐ</h2>
            <h4 class="mb-4"> Trọng lượng: <?php echo $row['specification']; ?> </h4>
            <h4 class="mb-4"> <?php echo $row['brand_name']; ?> </h4>


            <div class="mb-4"><b class="text-success"> Còn hàng:
                </b><b><?php echo $row['quantity']?> kg </b></div>


            <div class="mb-4">Mô tả: <?php echo $row['description']; ?> </div>

            <!--    <form action="index_client.php?page_layout=capnhatgio&id=?php echo $id; ?>" method="POST"
                enctype="multipart/form-data" class="mb-5">
                <span class="input-group">
                    <button type="submit" name="sbm" class="input-group-text btn btn-danger"
                        onclick="this.parentNode.querySelector('input[type=number]').stepDown()"> -
                    </button>

                    <input type="number" name="quantity" required class="form-control w-25 d-inline text-center" min="1"
                        max="100">

                    <button type="submit" name="sbm" class="input-group-text btn btn-success"
                        onclick="this.parentNode.querySelector('input[type=number]').stepUp()"> +
                    </button>
                </span>
            </form> -->


            <a href="index_client.php?page_layout=themgiohang&id=<?php echo $row['prd_id']; ?>"
                class="btn btn-outline-dark btn-lg"><i class='fas fa-shopping-bag'></i> Thêm vào giỏ</a>
            <a href="index_client.php?page_layout=muachitiet&id=<?php echo $row['prd_id']; ?>"
                class="btn btn-outline-dark btn-lg">Mua hàng</a>

        </div>

    </div>
    <?php } ?>


    <?php include('./footer.php') ?>
</body>

<script>
function addCart(id) {
    //alert(id);
    num = $("#num").val();
    alert(num);

}
</script>