<?php
    $result_gender  = $connect -> query ("SELECT * FROM genders");

    if(isset($_POST['sbm'])){
        $fullName= $_POST['fullName'];
        $gender_id = $_POST['gender_id'];
        $phoneNumber = $_POST['phoneNumber'];
        $inputEmail = $_POST['inputEmail'];
        $addRess = $_POST['addRess'];
        $passWord= password_hash(($_POST['passWord']), PASSWORD_DEFAULT);

        $result= $connect -> query("INSERT INTO loginads(fullName, phoneNumber, addRess, inputEmail, passWord, gender_id) 
            VALUES('$fullName', $phoneNumber, '$addRess', '$inputEmail', '$passWord', $gender_id)");
         
        if($result){
            header('location: index_admin.php?page_layout=danhsachadmin');
        }
        
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
            <h2>THÊM TÀI KHOẢN ADMIN</h2>
        </div>
        <div class="card-body">
            <form method="POST" enctype="multipart/form-data">
                <div class="form-group mb-2">
                    <label for="fullName" class="form-label">Họ tên</label>
                    <input type="text" name="fullName" class="form-control" required>
                </div>

                <div class="form-group mb-2">
                    <label for="gender_id" class="form-label">Giới tính</label>
                    <select class="form-control" name="gender_id">
                        <?php
                        while($row_gender =  $result_gender -> fetch()){?>
                        <option value="<?php echo $row_gender['gender_id']; ?>">
                            <?php echo $row_gender['gender_name']; ?>
                        </option>
                        <?php } ?>
                    </select>
                </div>

                <div class="form-group mb-2">
                    <label for="phoneNumber" class="form-label">Số điện thoại</label>
                    <input type="text" name="phoneNumber" class="form-control" required>
                </div>

                <div class="form-group mb-2">
                    <label for="addRess" class="form-label">Địa chỉ</label>
                    <input type="text" name="addRess" class="form-control" required>
                </div>

                <div class="form-group mb-2">
                    <label for="inputEmail" class="form-label">Email</label>
                    <input type="text" name="inputEmail" class="form-control" required>
                </div>

                <div class="form-group mb-2">
                    <label for="passWord" class="form-label">Mật khẩu</label>
                    <input type="password" name="passWord" class="form-control" required>
                </div>

                <button type="submit" name="sbm" class="btn btn-primary">Thêm</button>
            </form>
        </div>
    </div>
</div>