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


    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <title>Trang Index Client</title>
</head>

<body>
    <?php
        if(isset($_GET['page_layout'])){
            switch ($_GET['page_layout']) {
                case 'chitietdh':
                    require_once 'detail/chitietdh.php';
                    break;
                case 'capnhatdonhang':
                    require_once 'update/capnhatdonhang.php';
                    break;
                case 'trangchu':
                    require_once 'product/trangchu.php';
                    break;
                case 'timkiem':
                    require_once 'search/timkiem.php';
                    break;
                case 'sapxep':
                    require_once 'search/sapxep.php';
                    break;
                case 'danhsachsp':
                    require_once 'product/danhsachsp.php';
                    break;
                case 'chitietsp':
                    require_once 'product/chitietsp.php';
                    break;
                case 'themgiohang':
                    require_once 'cart/themgiohang.php';
                    break;
                case 'danhsachgiohang':
                    require_once 'cart/danhsachgiohang.php';
                    break;
                case 'xoagiohang':
                    require_once 'cart/xoagiohang.php';
                    break;
                case 'xoatatca':
                    require_once 'cart/xoatatca.php';
                    break;
                case 'capnhatgio':
                    require_once 'cart/capnhatgio.php';
                    break;
                case 'dathang':
                    require_once 'order/dathang.php';
                    break;
                case 'xoadathang':
                    require_once 'order/xoadathang.php';
                    break;
                case 'muachitiet':
                    require_once 'order/muachitiet.php';
                    break;
                case 'diachigiaohang':
                    require_once 'address/diachigiaohang.php';
                    break;
                case 'thanhtoan':
                    require_once 'pay/thanhtoan.php';
                    break;
                case 'lichsudh':
                    require_once 'history/lichsudh.php';
                    break;
                case 'chitietdh':
                    require_once 'history/chitietdh.php';
                    break;
                case 'dangnhaptk':
                    require_once 'account/dangnhaptk.php';
                    break;
                case 'dangkitk':
                    require_once 'account/dangkitk.php';
                    break;
                case 'suatk':
                    require_once 'account/suatk.php';
                    break;
                case 'xoatk':
                    require_once 'account/xoatk.php';
                    break;
                case 'doimk':
                    require_once 'account/doimk.php';
                    break;
                case 'xacnhandoimk':
                    require_once 'account/xacnhandoimk.php';
                    break;
                case 'dangxuatclient':
                    require_once 'account/dangxuatclient.php';
                    break; 
                case 'donhang':
                    require_once 'donhang.php';
                    break;  
                default:
                    require_once 'product/danhsachsp.php';
                    break;
            }
        }
        else{
            require_once 'product/danhsachsp.php';
        }
    ?>
</body>

</html>