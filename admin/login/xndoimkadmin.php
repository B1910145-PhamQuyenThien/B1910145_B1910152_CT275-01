<?php
    $id = $_GET['id'];

    $sql_gender  = "SELECT * FROM genders";
    $query_gender = mysqli_query($connect, $sql_gender);

    $sql_up = "SELECT * FROM accounts WHERE id = $id";
    $query_up = mysqli_query($connect, $sql_up);
    $row_up = mysqli_fetch_assoc($query_up);
    
    if(isset($_POST['sbm'])){
        $fullName= $_POST['fullName'];
        $gender_id = $_POST['gender_id'];
        $phoneNumber = $_POST['phoneNumber'];
        $inputEmail = $_POST['inputEmail'];
        $passWord= password_hash(($_POST['passWord']), PASSWORD_DEFAULT);
        
        $sql = "UPDATE accounts
        SET 
            fullName = '$fullName',
            phoneNumber = '$phoneNumber',
            inputEmail = '$inputEmail',
            passWord = '$passWord',
            gender_id = '$gender_id'
        WHERE id = $id";

        $query = mysqli_query($connect, $sql);
        header('location: index_admin.php?page_layout=danhsachtk');
    }
?>



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