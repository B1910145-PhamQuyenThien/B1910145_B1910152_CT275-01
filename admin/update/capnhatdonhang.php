<?php
    $id = $_GET['id'];

    $resultState = $connect -> query ("SELECT * FROM states");
  

    $resultPay = $connect -> query("SELECT * FROM pays WHERE id = $id");
    $row_pay = $resultPay -> fetch();
    
    if(isset($_POST['sbm'])){
        $state_id = $_POST['state_id'];
        $result = $connect -> query("UPDATE pays SET state_id = '$state_id' WHERE id_order = $id");
        
        header('location: index_admin.php?page_layout=danhsachdonhang');
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
            <h2>CẬP NHẬT TRẠNG THÁI</h2>
        </div>
        <div class="card-body">
            <form method="POST" enctype="multipart/form-data">
                <div class="form-group mb-2">
                    <label for="state_id" class="form-label">Cập nhật trạng thái</label>
                    <select class="form-control" name="state_id">
                        <?php
                        while($row_state = $resultState -> fetch()) { ?>
                        <option value="<?php echo $row_state['state_id']; ?>">
                            <?php echo $row_state['state_name']; ?>
                        </option>
                        <?php } ?>
                    </select>
                </div>

                <button type="submit" name="sbm" class="btn btn-primary">Sửa</button>
            </form>
        </div>
    </div>
</div>