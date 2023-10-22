<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <title>Website bán hàng lớp cntt1-21</title>
    <link rel="stylesheet" href="./index.css">
</head>
<?php
session_start();
include('../connect.php');
?>

<body>

    <div class="main">
        <div class="banner">


            <div class="nhan">
                <style>
                    .nhan {
                        background-color: rgb(178, 2, 2);
                        text-align: center;
                    }

                    .nhan img {
                        width: 100%;
                        height: 150px;
                    }
                </style>
                <img id="img" onclick="changeImage()" src="a1pn.png" alt="">
            </div>
            <script>
                var index = 1;
                changeImage = function() {
                    var imgs = ["../upload/a1pn.png", "../upload/a2pn.png", "../upload/a3pn.png", "../upload/a2pn.png"];
                    document.getElementById('img').src = imgs[index];
                    index++;
                    if (index == 4) {
                        index = 0;
                    }
                }
                setInterval(changeImage, 1000);
            </script>
        </div>
        <div class="menu-ngang">
            <nav>
                <ul class="menu_top">

                    <p style="height:30px; text-align: right; font-weight: bold; size: 90%; color: red">Chào: Sếp</p>
                    <p style="height:30px; text-align: right; font-weight: bold; size: 90%; color: white"><a href="./logout.php">Thoát</a></p>
                </ul>
            </nav>
        </div>

        <div class="conten">
            <div class="menu-left">
                <nav>
                    <ul class="menu_top">
                        <li><a href="?admin=DSsanpham">Danh mục sản phẩm</a></li>
                        <li><a href="?admin=DShang">Danh mục hãng</a></li>
                        <li><a href="?admin=DSloai">Danh mục loại</a></li>
                        <li><a href="?admin=Khachhang">Khách hàng</a></li>
                        <li><a href="?admin=QLDonhang">Quản lý đơn hàng</a></li>
                    </ul>
                </nav>
            </div>
            <div class="center">
                <?php
                //include('./QuangTri/conten_admin.php');
                if (isset($_GET['admin']))
                    switch ($_GET['admin']) {
                        case 'DSsanpham':
                            include("./danhmucSP/danhmuc_SP.php");
                            break;
                        case 'DShang':
                            include("./danhmucH/danhmuc_Hang.php");
                            break;
                        case 'DSloai':
                            include("./danhmucL/danhmuc_Loai.php");
                            break;
                        case 'Khachhang':
                            include("./khachhang/thongtinKH.php");
                            break;
                        case 'QLDonhang':
                            include("./hoadon/quanly_DH.php");
                            break;
                        case 'chitietSP':
                            include('./danhmucSP/chitietsanpham.php');
                            break;
                        case 'xoaSP':
                            include('./danhmucSP/xoasp.php');
                            break;
                        case 'suaSP':
                            include('./danhmucSP/fr_suasp.php');
                            break;
                        case 'themSP':
                            include('./danhmucSP/fr_themsp.php');
                            break;
                        case 'xl_suaSP':
                            include('./danhmucSP/suasp.php');
                            break;
                        case 'themLSP':
                            include('./danhmucL/fr_themL.php');
                            break;
                        case 'xoaLSP':
                            include('./danhmucL/xoaL.php');
                            break;
                        case 'suaLSP':
                            include('./danhmucL/fr_suaL.php');
                            break;
                        case 'themHSP':
                            include('./danhmucH/fr_themH.php');
                            break;
                        case 'xoaHSP':
                            include('./danhmucH/xoaH.php');
                            break;
                        case 'suaHSP':
                            include('./danhmucH/fr_suaH.php');
                            break;
                        case 'chitietHD':
                            include('./hoadon/ql_chitietHD.php');
                            break;
                    }
                ?>

                <div class="col-12 bg-secondary">
                    <div class="row">

                    </div>
                </div>
            </div>



        </div>
        <footer>
            <div style="background-color: #0091ff; text-align: center;">
                <h3>Công ty TNHH Truyền Thông Số</h3>
                <img src="https://www.webike.vn/frontend/moto-v2/pc/img/logo-moto.png?159169869320200827" style="size: 50%; margin-top: 30px; margin-bottom: 30px;" alt="">
                <p>Số ĐKKD: 0304710474</p>
                <p>Văn Phòng: 427 Trường Chinh, P.14, Q.Tân Bình, Tp.HCM
                    Địa chỉ làm việc: 309 Vườn Lài,
                    P.Phú Thọ Hòa, Q.Tân Phú, Tp.HCM</p>
            </div>
        </footer>
    </div>
    </div>
</body>

</html>