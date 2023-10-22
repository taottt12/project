<?php
include('connect.php');
include('giohang.php');
if (isset($_GET['id_xoa'])) {
    $id_xoa = $_GET['id_xoa'];

    if (count($_SESSION['cart']) == 1) {
        $_SESSION['cart'] = null;
    } else {
        array_splice($_SESSION['cart'], $id_xoa, 1);
    }

    echo "<script language='javascript'>
                                alert('Đã xóa thành công');
                                window.open('index.php?sp=giohang', '_self', 0);
                            </script>";
}
