<?php
session_start();
include('./connect.php');

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <title>Website bán hàng lớp cntt1-21</title>
    <link rel="stylesheet" href="index1.css">
</head>
<?php

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

                    /* input */
                    .search-label {
                        display: flex;
                        align-items: center;
                        box-sizing: border-box;
                        position: relative;
                        border: 1px solid #2b2e30;
                        border-radius: 12px;
                        overflow: hidden;
                        background: #d5dbe0;
                        padding: 9px;
                        cursor: text;
                    }

                    .search-label:hover {
                        border-color: gray;
                    }

                    .search-label input {
                        outline: none;
                        width: 100%;
                        margin: 2px;
                        border: none;
                        background: none;
                        color: #2b2e30;
                    }

                    .search-label input:valid {
                        width: calc(100% - 22px);
                        transform: translateX(20px);
                    }
                </style>
                <img id="img" onclick="changeImage()" src="a1pn.png" alt="">
            </div>
            <script>
                var index = 1;
                changeImage = function() {
                    var imgs = ["upload/a1pn.png", "upload/a2pn.png", "upload/a3pn.png", "upload/a2pn.png"];
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
                    <li><a href="index.php">Trang chủ</a></li>
                    <?php
                    include 'menu_hangsp.php';
                    if (isset($_SESSION["cart"]) && $_SESSION["cart"] != null) {
                        $count = count($_SESSION["cart"]);
                    } else {
                        $count = 0;
                    }
                    ?>
                    <li><a href="./index.php?sp=giohang">Giỏ hàng: <?php echo $count; ?></a></li>

                </ul>
            </nav>
        </div>

        <div class="conten">
            <div class="menu-left">
                <nav>
                    <ul class="menu_top">
                        <li><a href="index.php">Trang chủ</a>
                        </li>
                        <?php
                        include 'menu_loaisp.php';
                        ?>
                    </ul>

                    <!-- <form method="POST" style="text-align: center;" enctype="multipart/form-data">
                        <input class="form-control me-2" type="text" name="txtsearch" placeholder="Nhập tên sản phẩm">
                        <a href="./index.php?sp=tim" name="tim">Tìm kiếm</a>
                    </form> -->
                    <form method="POST" style="text-align: center;" enctype="multipart/form-data">
                        <input class="form-control me-2" type="text" name="txtsearch" placeholder="Nhập tên sản phẩm">
                        <button class="btn btn-outline-success" type="submit" name="tim">Tìm kiếm</button>
                    </form>
                </nav>
            </div>
            <div class="center">

                <div class="col-12 ">
                    <div class="row">
                        <?php
                        if (isset($_POST['tim'])) {
                            $search = $_POST['txtsearch'];
                            $sql = "SELECT * FROM sanpham WHERE tensp LIKE '%$search%';";
                            $result = mysqli_query($con, $sql);
                            if (mysqli_num_rows($result) > 0) {
                                while ($row = mysqli_fetch_assoc($result)) {
                                    // hiển thị sản phẩm tìm thấy
                        ?>
                                    <div class="col-4" Style=" width:33.3%; height: 350px;">
                                        <div class="card" style="margin-top: 5px; height: 340px;">
                                            <img class="card-img-top" src="./upload/<?php echo $row['anhsanpham'] ?>" style="height:150px;" alt="">
                                            <div class="card-body">
                                                <div text-card Style="height: 100px;">
                                                    <h5 class="card-title"><?php echo $row['tensp']; ?></h5>
                                                    <h6 class="card-subtitle mb-1 text-muted"><?php echo number_format($row['giasanpham']); ?> VND</h6>
                                                    <!-- <p class="card-text">Nội dung văn bản trong <code>.card-body</code> này sử dụng <code>.card-text</code>.</p> -->
                                                </div>
                                                <a href="./index.php?sp=sanpham&id_sanpham=<?php echo $row['id_sanpham']; ?>" class=" btn btn-primary" Style="margin-top: 10px;">Thêm</a>
                                                <a href="./index.php?sp=chitietSP&id_sanpham=<?php echo $row['id_sanpham']; ?>" class="btn btn-primary" Style="margin-top: 10px;">Chi tiết</a>
                                            </div>
                                        </div>
                                    </div>
                        <?php
                                }
                            } else {
                                // thông báo không tìm thấy sản phẩm nào
                                echo '<p class="text-center">Không tìm thấy sản phẩm nào</p>';
                                include('./contens.php');
                            }
                        } else {
                            include('./contens.php');
                        }

                        ?>
                    </div>
                </div>
            </div>
            <div class="right">
                <?php
                ?>
                <form action="" method="post">
                    <?php if (isset($_SESSION['username'])) { ?>
                        <p style="text-align: center; background: #48dbfb; color: #F00; padding: 7px; font-weight: bold; font-size: 18px;">Xin chào: <span> <?php echo $_SESSION['username'] ?></span></p>
                        <p style="text-align: center; font-weight: bold; color: white"><a href="./QuanTri/logout.php">Thoát</a></p>
                    <?php } else { ?>

                        <p style="text-align: center; background: #48dbfb; color: #F00; padding: 7px; font-weight: bold; font-size: 18px;">Đăng nhập</p>
                        <table align="center" boder="0" margin-top="50px">
                            <tr style="font-size: 110%;">
                                <td class="search-label"><input type="text" name="user" placeholder="Username"></td>
                                <td></td>
                            </tr>
                            <tr style="font-size: 110%;">
                                <td class="search-label"><input type="password" name="pass" placeholder="Password"></td>
                                <td></td>
                            </tr>
                            <tr style="font-size: 110%;">
                                <td colspan="3" align="center" margin-top="20px">
                                    <button class="btn btn-outline-success" type="submit" name="login">Login</button>
                                </td>
                            </tr>
                        </table>
                        <a href="index.php?sp=dangky">
                            <p style="text-align: center; font-weight: italic;">Đăng ký</p>
                        </a>
                        <?php
                        include("./connect.php");
                        include './QuanTri/login/xuly_dangnhap.php';
                        ?>

                    <?php } ?>
                </form>
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