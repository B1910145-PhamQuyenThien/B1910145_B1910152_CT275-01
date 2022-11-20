<?php 
    if(isset($_POST['inputEmail'])){
        $inputEmail = $_POST['inputEmail'];
        $passWord = $_POST['passWord'];

        $sql = "SELECT * FROM accounts WHERE inputEmail = '$inputEmail' ";
        $query = mysqli_query($connect, $sql);
        $data = mysqli_fetch_assoc($query);
        $checkEmail = mysqli_num_rows($query);
        if($checkEmail == 1){
            $checkPass = password_verify($passWord, $data['passWord']);
            
            if($checkPass){
                SESSION_START();
                $_SESSION['user'] = $data;
                header('location: index_client.php?page_layout=xacnhandoimk');
            }
            else{
                echo "Mật khẩu sai!";
            }
        }
        else{
            echo "Email không tồn tại";
        }

    }
?>

<body>


    <?php include('./header.php') ?>
    <div class="container-fluid">
        <div class="card my-5">
            <div class="card-header">
                <h2>ĐỔI MẬT KHẨU</h2>
            </div>
            <div class="card-body">
                <form method="POST" enctype="multipart/form-data">
                    <div class="form-group mb-2">
                        <label for="inputEmail" class="form-label">Nhập Email cũ</label>
                        <input type="text" name="inputEmail" class="form-control" required>
                    </div>

                    <div class="form-group mb-2">
                        <label for="passWord" class="form-label">Nhập mật khẩu cũ</label>
                        <input type="password" name="passWord" class="form-control" required>
                    </div>

                    <button type="submit" name="gui" class="btn btn-primary">Gửi</button>
                </form>
            </div>
        </div>
    </div>
    <?php include('./footer.php') ?>
</body>