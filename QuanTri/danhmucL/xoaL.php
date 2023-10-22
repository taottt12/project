<?php
if (isset($_GET['id_lsp'])) {
    $id_xoa = $_GET['id_lsp'];
    $sql = "DELETE FROM `loaisp` WHERE id_loaisp = '$id_xoa'";

    if (mysqli_query($con, $sql) == true) {
        echo "<script language='javascript'>
                            alert('Đã xóa thành công');
                            window.open('./index.php?admin=DSloai', '_self', 1);
                        </script>";
    }
}
