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
            <h1 class="text-center">Sản phẩm</h1>
            <a href="./index.php?admin=themSP" data-sp-ma="2" class="btn btn-danger btn-delete-sanpham" style=" margin: 20px;">
                <i class="fa fa-trash" aria-hidden="true"></i> Thêm
            </a>
            <div class="row">
                <div class="col col-md-12">
                    <table class="table table-bordered">
                        <thead>
                            <tr style="background-color: #726364;">
                                <th>STT</th>
                                <th>Ảnh đại diện</th>
                                <th>Tên sản phẩm</th>
                                <th>Giá</th>
                                <th>Hành động</th>
                            </tr>
                        </thead>
                        <tbody id="datarow">
                            <?php
                            $sql = ('SELECT * FROM `sanpham`');
                            $kq = mysqli_query($con, $sql);
                            if (mysqli_num_rows($kq) > 0) {
                                $stt = 0;
                                while ($item = mysqli_fetch_array($kq)) {
                            ?>
                                    <tr>
                                        <td><?php echo ($stt + 1) ?></td>
                                        <td style="text-align: center;">
                                            <img src="../upload/<?php echo $item['anhsanpham'] ?>" style="height:150px;" alt="">
                                        </td>
                                        <td><?php echo $item['tensp']; ?></td>
                                        <td class="text-right"><?php echo number_format($item['giasanpham']); ?> VND</td>
                                        <td>
                                            <!-- Nút xóa, bấm vào sẽ xóa thông tin dựa vào khóa chính `sp_ma` -->
                                            <a href="./index.php?admin=chitietSP&id_sanpham=<?php echo $item['id_sanpham']; ?>" name="dathang" data-sp-ma="2" class="btn btn-danger btn-delete-sanpham" style="margin: 20px;">
                                                <i class="fa fa-trash" aria-hidden="true"></i> Chi tiết
                                            </a>
                                            <a href="./index.php?admin=suaSP&id_sanpham=<?php echo $item['id_sanpham']; ?>" data-sp-ma="2" class="btn btn-danger btn-delete-sanpham" style="margin: 20px;">
                                                <i class="fa fa-trash" aria-hidden="true"></i> Chỉnh sửa
                                            </a>
                                            <a href="./index.php?admin=xoaSP&id_sanpham=<?php echo $item['id_sanpham']; ?>" data-sp-ma="2" class="btn btn-danger btn-delete-sanpham" style="margin: 20px;">
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