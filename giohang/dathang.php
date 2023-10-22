<?php

if (isset($_SESSION['username'])) {
?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <title></title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <style>
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
    </head>

    <body>
        <form method="post" enctype="multipart/form-data">
            <h3 style="text-align: center; font-size: 170%;">Thông Tin khách hàng</h3>
            <table align="center" boder="0" margin-top="50px">
                <tr style="font-size: 110%;">
                    <!-- <td></td> -->
                    <td>Nhập tên người nhận:</td>
                    <td class="search-label"><input type="text" name="txt_nameKH" placeholder="Tên người nhận"></td>
                    <td></td>
                </tr>
                <tr style="font-size: 110%;">
                    <!-- <td></td> -->
                    <td>Nhập căn cước công dân:</td>
                    <td class="search-label"><input type="text" name="txt_cccdKH" placeholder="Căn cước công dân"></td>
                    <td></td>
                </tr>
                <tr style="font-size: 110%;">
                    <!-- <td></td> -->
                    <td>Nhập địa chỉ:</td>
                    <td class="search-label"><input type="text" name="txt_addressKH" placeholder="Địa chỉ nhận"></td>
                    <td></td>
                </tr>
                <tr style="font-size: 110%;">
                    <!-- <td></td> -->
                    <td>Nhập số điện thoại:</td>
                    <td class="search-label"><input type="text" name="txt_sdt" placeholder="Số điện thoại"></td>
                    <td></td>
                </tr>
                <tr style="font-size: 110%;">
                    <!-- <td></td> -->
                    <td>Nhập email:</td>
                    <td class="search-label"><input type="text" name="txt_email" placeholder="Email"></td>
                    <td></td>
                </tr>
                <tr style="font-size: 110%;">
                    <!-- <td></td> -->

                    <td>Phương thức thanh toán:</td>
                    <td></td>
                    <td></td>
                </tr>

                <tr style="font-size: 110%;">
                    <!-- <td></td> -->

                    <td> </td>
                    <td><input type="radio" name="rdo_phuongthucTT" value="Thanh toán khi nhận hàng" id="ttNH"><label for="ttNH">Thanh toán khi nhận hàng</label></td>
                    <td></td>
                </tr>
                <tr style="font-size: 110%;">
                    <!-- <td></td> -->

                    <td></td>
                    <td><input type="radio" name="rdo_phuongthucTT" value="Thanh toán online" id="ttTN"><label for="ttTN">Thanh toán online</label></td>
                    <td></td>
                </tr>


                <table class="table table-bordered">
                    <thead>
                        <tr style="background-color: #726364;">
                            <th>STT</th>
                            <th>Ảnh đại diện</th>
                            <th>Tên sản phẩm</th>
                            <th>Giá</th>
                        </tr>
                    </thead>
                    <tbody id="datarow">
                        <?php
                        if (isset($_GET['id_hang'])) {
                            $id_hang = $_GET['id_hang'];
                        ?>
                            <tr>
                                <td><?php echo 1; ?></td>
                                <td style="text-align: center;">
                                    <img src="./upload/<?php echo $_SESSION['cart'][$id_hang]['anhsp'] ?> " style="height:150px;" alt="">
                                </td>
                                <td><?php echo $_SESSION['cart'][$id_hang]['tensp']; ?></td>
                                <td class="text-right"><?php echo number_format($_SESSION['cart'][$id_hang]['giasp']); ?> VND</td>
                            </tr>
                        <?php
                        }
                        ?>
                    </tbody>
                </table>
                <tr style="font-size: 110%;">
                    <!-- <td></td> -->
                    <td></td>
                    <td>Tổng Tiền: <?php echo number_format($_SESSION['cart'][$id_hang]['giasp']); ?> VND
                    </td>
                    <td colspan="3" align="center" margin-top="20px">
                        <input type="submit" style="background-color: #726364;" value="Đặt hàng" name="datdonhang">
                        <!-- <a type="submit" href="./index.php?sp=hoanthanhDH" style="background-color: #726364;" name="datdonhang" class="btn btn-md"><i class="fa fa-shopping-cart" aria-hidden="true"></i>&nbsp;Đặt hàng</a> -->
                    </td>
                </tr>
                <?php include('./giohang/xuly_dondathang.php');
                ?>
                <!-- nút -->


            </table>
        </form>
    </body>

    </html>
<?php
} else {
    echo "<script language='javascript'>
                            alert('Bạn cần đăng nhập trước khi đặt hàng');
                            window.open('./index.php', '_self', 0);
                        </script>";
}
?>