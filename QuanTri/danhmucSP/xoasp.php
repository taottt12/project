<?php
if (isset($_GET['id_sanpham'])) {
    $id_xoa = $_GET['id_sanpham'];
    $sql = "DELETE FROM `sanpham` WHERE id_sanpham = '$id_xoa'";

    if (mysqli_query($con, $sql) == true) {
        echo "<script language='javascript'>
                            alert('Đã xóa thành công');
                            window.open('./index.php?admin=DSsanpham', '_self', 1);
                        </script>";
    }
}
