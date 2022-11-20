<?php 
    if(isset($_POST['inputEmail'])){
        $inputEmail = $_POST['inputEmail'];
        $passWord = $_POST['passWord'];

        $result  = $connect -> query ("SELECT * FROM accounts WHERE inputEmail = '$inputEmail' ");
    
        $data = $result -> fetch();
        
        $checkEmail = $result ->rowCount();
     

        if($checkEmail == 1){
            $checkPass = password_verify($passWord, $data['passWord']);
            
            if($checkPass){
                SESSION_START();
                $_SESSION['user'] = $data;
                header('location: index_client.php?page_layout=danhsachsp');
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


<style type="text/css">
body {
    background-image: url(../admin/background/anhdong.gif);
}
</style>

<body>
    <!--     ?php include('./header.php') ?> -->
    <div class="container-fluid mt-4 w-50">
        <div class="card my-5">
            <div class="card-header">
                <h2>ĐĂNG NHẬP TÀI KHOẢN</h2>
            </div>
            <div class="card-body">
                <form method="POST" enctype="multipart/form-data">
                    <div class="form-group mb-2">
                        <label for="inputEmail" class="form-label">Nhập Email</label>
                        <input type="text" name="inputEmail" class="form-control" required>
                    </div>

                    <div class="form-group mb-2">
                        <label for="passWord" class="form-label">Nhập mật khẩu</label>
                        <input type="password" name="passWord" class="form-control" required>
                    </div>

                    <button type="submit" name="dangnhap" class="btn btn-primary">Đăng nhập</button>
                </form>
                <div>
                    <a href="index_client.php?page_layout=doimk">Quên mật khẩu</a>
                </div>
                <div>
                    Nếu chưa có tài khoản vui lòng <a href="index_client.php?page_layout=dangkitk">Đăng kí tại đây!</a>
                </div>

            </div>
        </div>
    </div>
    <!--  ?php include('./footer.php') ?> -->
</body>