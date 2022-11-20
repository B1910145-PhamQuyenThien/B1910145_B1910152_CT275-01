<?php
    require_once 'config/db.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://getbootstrap.com/docs/5.2/assets/css/docs.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" />
    <link rel="stylesheet" href="./css/style.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"></script>
    <title>Trang Index Admin</title>
</head>

<body>
    <?php
        if(isset($_GET['page_layout'])){
            switch ($_GET['page_layout']) {
                case 'thongke':
                    require_once 'total/thongke.php';
                    break;
                case 'danhsachdonhang':
                    require_once 'update/danhsachdonhang.php';
                    break;
                case 'capnhatdonhang':
                    require_once 'update/capnhatdonhang.php';
                    break;
                case 'xoadonhang':
                    require_once 'update/xoadonhang.php';
                    break;
                case 'danhsachdonhang':
                    require_once 'update/danhsachdonhang.php';
                    break;
                case 'danhsachadmin':
                    require_once 'login/danhsachadmin.php';
                    break;
                case 'dangnhapadmin':
                    require_once 'login/dangnhapadmin.php';
                    break;
                case 'dangxuatadmin':
                    require_once 'login/dangxuatadmin.php';
                    break;
                case 'themadmin':
                    require_once 'login/themadmin.php';
                    break;
                case 'suaadmin':
                    require_once 'login/suaadmin.php';
                    break;
                case 'xoaadmin':
                    require_once 'login/xoaadmin.php';
                    break;
                case 'doimkadmin':
                    require_once 'login/doimkadmin.php';
                    break;
                case 'xndoimkadmin':
                    require_once 'login/xndoimkadmin.php';
                    break;
                case 'danhsachsp':
                    require_once 'product/danhsachsp.php';
                    break;
                case 'themsp':
                    require_once 'product/themsp.php';
                    break;
                case 'suasp':
                    require_once 'product/suasp.php';
                    break;
                case 'xoasp':
                    require_once 'product/xoasp.php';
                    break;
                case 'danhsachtk':
                    require_once 'account/danhsachtk.php';
                    break;
                case 'themtk':
                    require_once 'account/themtk.php';
                    break;
                case 'suatk':
                    require_once 'account/suatk.php';
                    break;
                case 'xoatk':
                    require_once 'account/xoatk.php';
                    break;
                case 'chitietdh':
                    require_once 'detail/chitietdh.php';
                    break;
                case 'timdonhang':
                    require_once 'search/timdonhang.php';
                    break;
               
                default:
                    require_once 'login/dangnhapadmin.php';
                    break;
            }
        }
        else{
            require_once 'login/dangnhapadmin.php';
        }
    ?>
</body>

</html>