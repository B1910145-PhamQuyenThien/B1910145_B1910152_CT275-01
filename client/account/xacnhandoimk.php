<?php 
    session_start();
    $user = $_SESSION['user'];
    $inputEmail = $user['inputEmail']; 

    //var_dump($user);
    var_dump($inputEmail);

    if(isset($_POST['sbm'])){
        $passWord = $_POST['passWord'];
    }
    //var_dump($passWord);
    $sql = "UPDATE accounts
    SET 
        passWord = '$passWord'
    WHERE inputEmail = '$inputEmail'";

    $query = mysqli_query($connect, $sql);
    header('location: index_client.php?page_layout=dangnhaptk');
?>

<body>
    <?php include('./header.php') ?>
    <div class="container-fluid">
        <div class="card">
            <div class="card-header">
                <h2>XÁC NHẬN ĐỔI MẬT KHẨU</h2>
            </div>
            <div class="card-body">
                <form method="POST" enctype="multipart/form-data">
                    <div class="form-group mb-2">
                        <label for="passWord" class="form-label">Nhập mật khẩu mới</label>
                        <input type="password" name="passWord" class="form-control" required>
                    </div>
                    <button type="submit" name="sbm" class="btn btn-primary">Xác nhận</button>
                </form>
            </div>
        </div>
    </div>
</body>