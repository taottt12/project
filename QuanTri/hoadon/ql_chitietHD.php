<?php
$con = mysqli_connect('localhost', 'root', '', 'quantriwebsite');

if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
    exit();
}

if (isset($_GET['id_HD'])) {
    $id = $_GET['id_HD'];
    $sql = "SELECT * FROM thongtinkhachhang  where id_kh = $id";
    $kq = mysqli_query($con, $sql);
    if (mysqli_num_rows($kq) > 0) {
        $row1 = mysqli_fetch_array($kq);


?>
        <div class="quanlysp">
            <h3 style="font-weight: bold; text-align: center; margin-top: 30px">CHI TIẾT ĐƠN HÀNG</h3>
            <p style="margin-left: 35%;"><?php echo "Tên khách hàng: " . $row1['tenkhachhang'];
                                            echo "</br>"; ?></p>
            <p style="margin-left: 35%;"><?php echo "Địa chỉ: " . $row1['diachi_kh'] . " ";
                                            echo "</br>"; ?></p>
            <p style="margin-left: 35%;"><?php echo "Điện thoại: 0" . $row1['sodienthoai'];
                                            echo "</br>"; ?></p>
            <p style="margin-left: 35%;"><?php echo "Ngày giao hàng: " . date("d/m/Y");
                                            echo "</br>"; ?></p>
            <p style="margin-left: 35%;"><?php echo "Phương thức thanh toán: " . $row1['phuongThuc_TT']; ?></p>

        </div>


        <table class="table table-bordered p-3">
            <thead>
                <tr style="background-color: #726364;">
                    <td style="text-align: center; font-weight: bold;">STT</td>
                    <td style="text-align: center; font-weight: bold;">Mã HD</td>
                    <td style="text-align: center;font-weight: bold;">Tên sản phẩm</td>
                    <td style="text-align: center;font-weight: bold;">Giá</td>
                </tr>
            </thead>
            <tbody id="datarow">
                <?php
                $sql = ("SELECT * FROM thongtinsanpham where id_kh = $id;");
                $kq = mysqli_query($con, $sql);
                $tong = 0;
                if (mysqli_num_rows($kq) > 0) {
                    $stt = 0;
                    while ($item = mysqli_fetch_array($kq)) {
                ?>
                        <tr>
                            <td style="text-align: center;"><?php echo ($stt + 1) ?></td>
                            <td style="text-align: center;"><?php echo $item['id_kh'] ?></td>
                            <td style="text-align: center;"><?php echo $item['ten_sp_mua']; ?></td>
                            <td style="text-align: center;"><?php echo number_format($item['gia_sp_mua']); ?></td>

                        </tr>
                <?php
                        $stt++;
                        $tong += $item['gia_sp_mua'];
                    }
                }
                ?>
                <tr style="background-color: #8c9089;">
                    <td colspan=4 style="text-align: center; ">Tổng tiền (chưa bao gồm thuế VAT): <?php echo number_format($tong) ?> VND</td>
                </tr>
            </tbody>
        </table>
        <div>
            <?php
            $sql = "SELECT * FROM hoadon  where id_kh = $id";
            $kq = mysqli_query($con, $sql);
            $itemhd = mysqli_fetch_array($kq);
            $trangthai_DH = $itemhd['trangthai_DH'];
            if ($itemhd['trangthai_DH'] == 'Chờ xác nhận') {
            ?>
                <form method="POST" enctype="multipart/form-data">
                    <p style="display: block; float:right; margin-top:10px; padding-right:30px;">Trạng thái:

                        <select name="trangthai">
                            <?php
                            $sql_hd = "SELECT `trangthai_DH` FROM `hoadon` WHERE `id_kh` = $id";
                            $result_hd = mysqli_query($con, $sql_hd);
                            $row_hd = mysqli_fetch_array($result_hd);
                            $trangthai_DH = $row_hd['trangthai_DH'];
                            ?>
                            <option value="Chờ xác nhận"><?php echo $trangthai_DH; ?></option>
                            <option value="Hủy đơn" <?php if ($trangthai_DH == 'Hủy đơn') echo 'selected'; ?>>Hủy đơn</option>
                            <option value="Đã xác nhận" <?php if ($trangthai_DH == 'Đã xác nhận') echo 'selected'; ?>>Đã xác nhận</option>
                            <option value="Chờ lấy hàng" <?php if ($trangthai_DH == 'Chờ lấy hàng') echo 'selected'; ?>>Chờ lấy hàng</option>
                            <option value="Đang giao hàng" <?php if ($trangthai_DH == 'Đang giao hàng') echo 'selected'; ?>>Đang giao hàng</option>
                            <option value="Đã giao hàng" <?php if ($trangthai_DH == 'Đã giao hàng') echo 'selected'; ?>>Đã giao hàng</option>
                            <option value="Đã thanh toán" <?php if ($trangthai_DH == 'Đã thanh toán') echo 'selected'; ?>>Đã thanh toán</option>
                        </select>
                    </p>

                    <!-- <button type="submit" name="xacnhan" style=" display: flex;">Xác nhận</button> -->
                    <button type="submit" class="btn-signin" style="color: red;" name="xacnhan">Xác nhận</button>
                </form>
            <?php
            } else if ($itemhd['trangthai_DH'] == 'Đã thanh toán' || $itemhd['trangthai_DH'] == 'Hủy đơn') {
            ?>
                <p style="float:right; margin-top:10px; padding-right:30px; font-weight: bold;"><?php echo $itemhd['trangthai_DH']; ?></p>
                <p style="float:right; margin-top:10px; padding-right:30px;">Trạng thái: </p>
            <?php
            } else {
            ?>
                <form method="POST" enctype="multipart/form-data">
                    <p style="display: block; float:right; margin-top:10px; padding-right:30px;">Trạng thái:

                        <select name="trangthai">
                            <?php
                            $sql_hd = "SELECT `trangthai_DH` FROM `hoadon` WHERE `id_kh` = $id";
                            $result_hd = mysqli_query($con, $sql_hd);
                            $row_hd = mysqli_fetch_array($result_hd);
                            $trangthai_DH = $row_hd['trangthai_DH'];
                            ?>
                            <option value="Chờ xác nhận"><?php echo $trangthai_DH; ?></option>
                            <option value="Hủy đơn" <?php if ($trangthai_DH == 'Hủy đơn') echo 'selected'; ?>>Hủy đơn</option>
                            <option value="Đã xác nhận" <?php if ($trangthai_DH == 'Đã xác nhận') echo 'selected'; ?>>Đã xác nhận</option>
                            <option value="Chờ lấy hàng" <?php if ($trangthai_DH == 'Chờ lấy hàng') echo 'selected'; ?>>Chờ lấy hàng</option>
                            <option value="Đang giao hàng" <?php if ($trangthai_DH == 'Đang giao hàng') echo 'selected'; ?>>Đang giao hàng</option>
                            <option value="Đã giao hàng" <?php if ($trangthai_DH == 'Đã giao hàng') echo 'selected'; ?>>Đã giao hàng</option>
                            <option value="Đã thanh toán" <?php if ($trangthai_DH == 'Đã thanh toán') echo 'selected'; ?>>Đã thanh toán</option>
                        </select>
                    </p>

                    <!-- <button type="submit" name="xacnhan" style=" display: flex;">Xác nhận</button> -->
                    <button type="submit" class="btn-signin" style="color: red;" name="xacnhan">Xác nhận</button>
                </form>
                <p style="float:right; margin-top:10px; padding-right:30px;"><a href="./hoadon/inHD.php?id_HD=<?php echo $id ?>" target="_blank">In hoá đơn</a></p>
            <?php
            }
            ?>
        </div>

<?php
    }
}
if (isset($_POST['xacnhan'])) {
    $trangthai = isset($_POST['trangthai']) ? $_POST['trangthai'] : '';
    if ($trangthai == '') {
        echo "<script language='javascript'>
                            alert('Xác nhận thất bại, bạn cần chọn lại');
                        </script>";
    } else {
        $sql_hd = ("UPDATE `hoadon` SET `trangthai_DH`='$trangthai' WHERE id_kh = $id");
        if (mysqli_query($con, $sql_hd)) {
            echo "<script language='javascript'>
                            alert('Xác nhận thành công');
                            window.location.href='./index.php?admin=chitietHD&id_HD=$id';
                        </script>";
        } else {
            echo "<script language='javascript'>
                            alert('Xác nhận thất bại');
                        </script>";
        }
    }
}
?>