<?php 
  
   $sql = "SELECT * FROM loginads l
           INNER JOIN genders g ON l.gender_id = g.gender_id";
   $query = mysqli_query($connect, $sql);
   $row = mysqli_fetch_assoc($query);

    if(isset($_POST['inputEmail'])){
        $inputEmail = $_POST['inputEmail'];
        $passWord = $_POST['passWord'];
        $repassWord= password_hash(($_POST['repassWord']), PASSWORD_DEFAULT);
       
        $sql = "SELECT * FROM loginads WHERE inputEmail = '$inputEmail' ";
        $query = mysqli_query($connect, $sql);
        $data = mysqli_fetch_assoc($query);
        $checkEmail = mysqli_num_rows($query);
        if($checkEmail == 1){
            $checkPass = password_verify($passWord, $data['passWord']);
            
            if($checkPass){
                SESSION_START();
                $_SESSION['user'] = $data;
               // header('location: index_admin.php?page_layout=danhsachsp');
            }
            else{
                echo "Mật khẩu sai!";
            }
        }
        else{
            echo "Email không tồn tại";
        }

        $sql_passWord = "UPDATE loginads SET passWord = '$repassWord' WHERE inputEmail = $inputEmail";
        $query = mysqli_query($connect, $sql_passWord);
        header('location: index_admin.php?page_layout=dangnhapadmin');
    
    }
?>





<div class="container-fluid">
    <div class="card">
        <div class="card-header">
            <h2>ĐỔI MẬT KHẨU ADMIN</h2>
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

                <div class="form-group mb-2">
                    <label for="repassWord" class="form-label">Nhập mật khẩu mới</label>
                    <input type="password" name="repassWord" class="form-control" required>
                </div>

                <button type="submit" name="sbm" class="btn btn-primary">Gửi</button>
            </form>
        </div>
    </div>
</div>