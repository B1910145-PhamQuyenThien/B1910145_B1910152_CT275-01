<?php
    $id = $_GET['id'];

    $sql_gender  = "SELECT * FROM genders";
    $query_gender = mysqli_query($connect, $sql_gender);

    $sql_up = "SELECT * FROM loginads WHERE id = $id";
    $query_up = mysqli_query($connect, $sql_up);
    $row_up = mysqli_fetch_assoc($query_up);
    
    if(isset($_POST['sbm'])){
        $fullName= $_POST['fullName'];
        $gender_id = $_POST['gender_id'];
        $phoneNumber = $_POST['phoneNumber'];
        $inputEmail = $_POST['inputEmail'];
        $passWord= password_hash(($_POST['passWord']), PASSWORD_DEFAULT);
        
        $sql = "UPDATE loginads
        SET 
            fullName = '$fullName',
            phoneNumber = '$phoneNumber',
            inputEmail = '$inputEmail',
            passWord = '$passWord',
            gender_id = '$gender_id'
        WHERE id = $id";

        $query = mysqli_query($connect, $sql);
        header('location: index_admin.php?page_layout=danhsachadmin');
    }
?>

<div class="container-fluid">
    <div class="card">
        <div class="card-header">
            <h2>SỬA TÀI KHOẢN</h2>
        </div>
        <div class="card-body">
            <form method="POST" enctype="multipart/form-data">
                <div class="form-group mb-2">
                    <label for="fullName" class="form-label">Họ tên</label>
                    <input type="text" name="fullName" class="form-control" required
                        value="<?php echo $row_up['fullName']; ?>">
                </div>

                <div class="form-group mb-2">
                    <label for="gender_id" class="form-label">Giới tính</label>
                    <select class="form-control" name="gender_id">
                        <?php
                        while($row_gender = mysqli_fetch_assoc($query_gender)) { ?>
                        <option value="<?php echo $row_gender['gender_id']; ?>">
                            <?php echo $row_gender['gender_name']; ?>
                        </option>
                        <?php } ?>
                    </select>
                </div>

                <div class="form-group mb-2">
                    <label for="phoneNumber" class="form-label">Số điện thoại</label>
                    <input type="number" name="phoneNumber" class="form-control" required
                        value="<?php echo $row_up['phoneNumber']; ?>">
                </div>

                <div class="form-group mb-2">
                    <label for="inputEmail" class="form-label">Email</label>
                    <input type="text" name="inputEmail" class="form-control" required
                        value="<?php echo $row_up['inputEmail']; ?>">
                </div>

                <div class="form-group mb-2">
                    <label for="passWord" class="form-label">Mật khẩu</label>
                    <input type="password" name="passWord" class="form-control" required
                        value="<?php echo $row_up['passWord']; ?>">
                </div>

                <button type="submit" name="sbm" class="btn btn-primary">Sửa</button>
            </form>
        </div>
    </div>
</div>