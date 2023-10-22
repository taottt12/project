<?php
include('connect.php');
if (isset($_SESSION['cart'])) {
    //echo var_dump($_SESSION['cart']), "<br/>";
    //showcart($_SESSION['cart']);

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
            <div class="container mt-4">
                <div id="thongbao" class="alert alert-danger d-none face" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true"></span>
                    </button>
                </div>

                <h1 class="text-center">Giỏ hàng</h1>
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
                                $stt = 0;
                                $countsp = 0;
                                foreach ($_SESSION['cart'] as $item) {
                                ?>
                                    <tr>
                                        <td><?php echo ($stt + 1) ?></td>
                                        <td style="text-align: center;">
                                            <img src="./upload/<?php echo $item['anhsp'] ?> " style="height:150px;" alt="">
                                        </td>
                                        <td><?php echo $item['tensp']; ?></td>
                                        <td class="text-right"><?php echo number_format($item['giasp']); ?> VND</td>
                                        <td>
                                            <!-- Nút xóa, bấm vào sẽ xóa thông tin dựa vào khóa chính `sp_ma` -->
                                            <a href="./index.php?sp=xoasp&id_xoa=<?php echo $countsp; ?>" data-sp-ma="2" class="btn btn-danger btn-delete-sanpham" style="margin: 20px;">
                                                <i class="fa fa-trash" aria-hidden="true"></i> Xóa
                                            </a>
                                            <a href="./index.php?sp=dathang&id_hang=<?php echo $countsp; ?>" name="dathang" data-sp-ma="2" class="btn btn-danger btn-delete-sanpham" style="margin: 20px;">
                                                <i class="fa fa-trash" aria-hidden="true"></i> Đặt hàng
                                            </a>
                                        </td>
                                    </tr>
                                <?php
                                    $stt++;
                                    $countsp++;
                                }
                                ?>
                            </tbody>
                        </table>
                        <a href="./index.php?sp=dathangall" name="dathangall" style="background-color: #726364;" class="btn btn-md"><i class="fa fa-shopping-cart" aria-hidden="true">
                            </i>&nbsp;Đặt hàng</a>
                    </div>
                </div>
            </div>
            <!-- End block content -->
        </main>




    </body>

    </html>
<?php
} else {
?>
    <p text-center><?php echo "Bạn chưa có sản phẩm nào trong giỏ hàng"; ?></p>
<?php
}
?>