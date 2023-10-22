<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <title>Website bán hàng lớp cntt1-21</title>
    <link rel="stylesheet" href="index.css">
</head>

<body>
    <div class="container bg-light">
        <div class="row bg-dark">
            <img src="https://adi.admicro.vn/adt/adn/2023/01/980x9-adx63b501511b068.gif" alt="">
        </div>
        <div class="row bg-light">
            <ul class="menu_top">
                <li><a href="index.php">Trang chủ</a>
                </li>
                <?php
                include 'menu_hangsp.php';
                ?>
            </ul>
        </div>
        <!-- Khu vực chứa sản phẩm -->
        <div class="row">
            <div class="col-2">
                <ul class="menu_left">
                    <li><a href="index.php">Trang chủ</a></li>
                    <?php
                    include 'menu_loaisp.php';
                    ?>
                </ul>
            </div>
            <div class="col-8 bg-primary">
                <div class="row">


                    <?php // include('layallsp.php') 
                    ?>
                    <?php
                    //include 'lay_allsp.php';
                    if (isset($_GET['action'])) {
                        $action = $_GET['action'];
                    } else
                        $action = "";
                    if (isset($_GET['sp'])) {
                        switch ($_GET['sp']) {
                            case 'hang': {
                                    include('./layallsp_hang.php');
                                    break;
                                }
                            case 'loai':
                                include('./layallsp_loai.php');
                                break;
                            default:
                                break;
                        }
                    } else {
                        include("./layallsp.php");
                    }
                    ?>

                </div>
            </div>
            <div class="col-2">
                <?php include('./QuangTri/fr_dangnhap.php'); ?>
            </div>


            <p>Chào mừng các bạn đến vs cntt1-21</p>
        </div>
</body>

</html>