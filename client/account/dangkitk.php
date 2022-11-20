<?php
    $result_gender  = $connect -> query ("SELECT * FROM genders");
  
    $err = [];
    if(isset($_POST['sbm'])){
        $fullName= $_POST['fullName'];
        $gender_id = $_POST['gender_id'];
        $phoneNumber = $_POST['phoneNumber'];
        $addRess = $_POST['addRess'];
        $inputEmail = $_POST['inputEmail'];
        //$passWord= password_hash(($_POST['passWord']), PASSWORD_DEFAULT);
       $passWord = $_POST['passWord'];
        
        if(empty($fullName)){
            $err['fullName'] = 'Bạn chưa nhập tên';
        }
        if(empty($gender_id)){
            $err['gender_id'] = 'Bạn chưa chọn giới tính';
        }
        if(empty($phoneNumber)){
            $err['phoneNumber'] = 'Bạn chưa nhập số điện thoại';
        }
        if(empty($addRess)){
            $err['addRess'] = 'Bạn chưa nhập địa chỉ';
        }
        if(empty($inputEmail)){
            $err['inputEmail'] = 'Bạn chưa nhập email';
        }
        if(empty($passWord)){
            $err['passWord'] = 'Bạn chưa nhập mật khẩu';
        }
        //var_dump($err);
        //die();
        if(empty($err)){
            $pass = password_hash($passWord, PASSWORD_DEFAULT);

            $result= $connect -> query("INSERT INTO accounts(fullName, phoneNumber, addRess, inputEmail, passWord, gender_id) 
            VALUES('$fullName', $phoneNumber, '$addRess', '$inputEmail', '$pass', $gender_id)");
         
            if($result){
            header('location: index_client.php?page_layout=dangnhaptk');
            }
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
        <div class="card mt-3">
            <div class="card-header">
                <h2>ĐĂNG KÍ TÀI KHOẢN</h2>
            </div>
            <div class="card-body">
                <form method="POST" enctype="multipart/form-data">
                    <div class="form-group mb-2">
                        <label for="fullName" class="form-label">Họ tên</label>
                        <input type="text" name="fullName" class="form-control">
                        <div>
                            <span class="text-danger"><?php echo (isset($err['fullName']))?$err['fullName']:'' ?></span>
                        </div>
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
                        <div>
                            <span
                                class="text-danger"><?php echo (isset($err['gender_id']))?$err['gender_id']:'' ?></span>
                        </div>
                    </div>

                    <div class="form-group mb-2">
                        <label for="phoneNumber" class="form-label">Số điện thoại</label>
                        <input type="text" name="phoneNumber" class="form-control">
                        <div>
                            <span
                                class="text-danger"><?php echo (isset($err['phoneNumber']))?$err['phoneNumber']:'' ?></span>
                        </div>
                    </div>

                    <div class="form-group mb-2">
                        <label for="addRess" class="form-label">Địa chỉ</label>
                        <input type="text" name="addRess" class="form-control">
                        <div>
                            <span class="text-danger"><?php echo (isset($err['addRess']))?$err['addRess']:'' ?></span>
                        </div>
                    </div>

                    <div class="form-group mb-2">
                        <label for="inputEmail" class="form-label">Email</label>
                        <input type="text" name="inputEmail" class="form-control">
                        <div>
                            <span
                                class="text-danger"><?php echo (isset($err['inputEmail']))?$err['inputEmail']:'' ?></span>
                        </div>
                    </div>

                    <div class="form-group mb-2">
                        <label for="passWord" class="form-label">Mật khẩu</label>
                        <input type="password" name="passWord" class="form-control">
                        <div>
                            <span class="text-danger"><?php echo (isset($err['passWord']))?$err['passWord']:'' ?></span>
                        </div>
                    </div>

                    <div class="form-group mb-2">
                        <button type="submit" name="sbm" class="btn btn-primary">Thêm</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!--  ?php include('./footer.php') ?> -->
</body>