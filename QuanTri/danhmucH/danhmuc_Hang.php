<?php
//include('connect.php');
?>
<!DOCTYPE html>
<html lang="vi" class="h-100">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title></title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../vendor/bootstrap/css/bootstrap.min.css" type="text/css">
    <!-- Font awesome -->
    <link rel="stylesheet" href="../vendor/font-awesome/css/font-awesome.min.css" type="text/css">


</head>

<body>


    <main role="main">
        <!-- Block content - Đục lỗ trên giao diện bố cục chung, đặt tên là `content` -->
        <div class="container mt-4 ">
            <div id="thongbao" class="alert alert-danger d-none face" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true"></span>
                </button>
            </div>

            <h1 class="text-center">Hãng sản phẩm</h1>
            <a href="./index.php?admin=themHSP" data-sp-ma="2" class="btn btn-danger btn-delete-sanpham" style=" margin: 20px;">
                <i class="fa fa-trash" aria-hidden="true"></i> Thêm
            </a>
            <div class="row">
                <div class="col col-md-12">
                    <table class="table table-bordered">
                        <thead>
                            <tr style="background-color: #726364;">
                                <th>STT</th>
                                <th>Loại sản phẩm</th>
                                <th>Hành động</th>
                            </tr>
                        </thead>
                        <tbody id="datarow">
                            <?php
                            $sql = ('SELECT * FROM `hangsp`');
                            $kq = mysqli_query($con, $sql);
                            if (mysqli_num_rows($kq) > 0) {
                                $stt = 0;
                                while ($item = mysqli_fetch_array($kq)) {
                            ?>
                                    <tr>
                                        <td><?php echo ($stt + 1) ?></td>
                                        <td><?php echo $item['ten_hangsp']; ?></td>
                                        <td>
                                            <!-- Nút xóa, bấm vào sẽ xóa thông tin dựa vào khóa chính `sp_ma` -->

                                            <a href="./index.php?admin=suaHSP&id_hsp=<?php echo $item['id_hangsp']; ?>" data-sp-ma="2" class="btn btn-danger btn-delete-sanpham" style="margin: 20px;">
                                                <i class="fa fa-trash" aria-hidden="true"></i> Cập nhật
                                            </a>

                                            <a href="./index.php?admin=xoaHSP&id_hsp=<?php echo $item['id_hangsp']; ?>" data-sp-ma="2" class="btn btn-danger btn-delete-sanpham" style="margin: 20px;">
                                                <i class="fa fa-trash" aria-hidden="true"></i> Xóa
                                            </a>

                                        </td>
                                    </tr>
                            <?php
                                    $stt++;
                                }
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <!-- End block content -->
    </main>




</body>

</html>
<?php

?>