<?php
    $id = $_GET['id'];

    $result_gender = $connect -> query ( "SELECT * FROM genders");

    $result_acc = $connect -> query ("SELECT * FROM accounts WHERE id_kh = $id");

    $row_up = $result_acc -> fetch();
    
    if(isset($_POST['sbm'])){
        $fullName= $_POST['fullName'];
        $gender_id = $_POST['gender_id'];
        $phoneNumber = $_POST['phoneNumber'];
        $addRess = $_POST['addRess'];
        $inputEmail = $_POST['inputEmail'];
        $passWord= password_hash(($_POST['passWord']), PASSWORD_DEFAULT);
        
        $result_up = $connect -> query("UPDATE accounts
        SET 
            fullName = '$fullName',
            phoneNumber = '$phoneNumber',
            inputEmail = '$inputEmail',
            addRess = '$addRess',
            passWord = '$passWord',
            gender_id = '$gender_id'
        WHERE id_kh = $id");


        header('location: index_admin.php?page_layout=danhsachtk');
    }
?>

<style type="text/css">
body {
    background-image: url(../admin/background/anhdong.gif);
}
</style>


<div class="container-fluid mt-5 mb-4 w-50 h-100">
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
                        while($row_gender = $result_gender -> fetch()) { ?>
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
                    <label for="addRess" class="form-label">Địa chỉ</label>
                    <input type="text" name="addRess" class="form-control" required
                        value="<?php echo $row_up['addRess']; ?>">
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