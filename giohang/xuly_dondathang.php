<?php
if (isset($_SESSION['username'])) {

    if (isset($_POST['datdonhang'])) {
        if (
            $_POST['txt_nameKH'] != null || $_POST['txt_cccdKH'] != null || $_POST['txt_addressKH'] != null
            || $_POST['txt_sdt'] != null || $_POST['txt_email'] != null
        ) {
            $tenKH = $_POST['txt_nameKH'];
            $cccdKH = $_POST['txt_cccdKH'];
            $diachiKH = $_POST['txt_addressKH'];
            $sdtKH = $_POST['txt_sdt'];
            $emailKH = $_POST['txt_email'];
            $PTTT = $_POST['rdo_phuongthucTT'];

            $con = mysqli_connect('localhost', 'root', '', 'quantriwebsite');
            mysqli_set_charset($con, 'utf8');


            // $sql_TTKH = "INSERT INTO `thongtinkhachhang`( `tenkhachhang`, `sodienthoai`, `email_kh`, `cancuoccongdan_kh`, `diachi_kh`, `phuongThuc_TT`, `time`)
            // VALUES ('$tenKH','$cccdKH','$diachiKH','$sdtKH','$emailKH', '$PTTT', CURRENT_TIMESTAMP())";
            $sql_TTKH = "INSERT INTO `thongtinkhachhang`(`tenkhachhang`, `sodienthoai`, `email_kh`, `cancuoccongdan_kh`, `diachi_kh`, `phuongThuc_TT`, `time`) 
            VALUES ('$tenKH','$sdtKH','$emailKH','$cccdKH','$diachiKH','$PTTT', CURRENT_TIMESTAMP())";
            //$row = mysqli_query($con, $sql_TTKH);

            if (mysqli_query($con, $sql_TTKH) === TRUE) {
                $sql_idkh = "SELECT id_kh FROM `thongtinkhachhang` ORDER BY time DESC LIMIT 1;";
                $row_id = mysqli_query($con, $sql_idkh);
                $id_kh = mysqli_fetch_array($row_id)['id_kh'];

                $sql_hoadon = "INSERT INTO `hoadon`(`id_kh`, `trangthai_DH`) VALUES ('$id_kh','Chờ xác nhận')";
                mysqli_query($con, $sql_hoadon);

                //xử lý đơn hàng
                $tenSP = $_SESSION['cart'][$id_hang]['tensp'];
                $giaSP = $_SESSION['cart'][$id_hang]['giasp'];
                $anhSP = $_SESSION['cart'][$id_hang]['anhsp'];
                $idsp = $_SESSION['cart'][$id_hang]['id'];
                $sql_TTHD = "INSERT INTO `thongtinsanpham`( `ten_sp_mua`,`anh_sp_mua` , `gia_sp_mua`,`id_sp`, `id_kh`) 
                    VALUES ('$tenSP','$anhSP','$giaSP','$idsp', '$id_kh')";
                mysqli_query($con, $sql_TTHD);
                array_splice($_SESSION['cart'], $id_hang, 1);

?>
                <script>
                    alert("Đặt hàng thành công");
                    window.open('./index.php', '_self', 0);
                </script>
            <?php
            } else {
            ?>
                <script>
                    alert("Đặt hàng không thành công")
                </script>
            <?php
            }
        } else { ?>
            <script>
                alert("Bạn cần phải nhập đầy đủ thông tin")
            </script>
<?php
        }
    }
} else {
    echo "<script language='javascript'>
                            alert('Bạn cần đăng nhập trước khi đặt hàng');
                            window.open('./index.php', '_self', 0);
                        </script>";
}
