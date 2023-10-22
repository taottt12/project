<?php
if (isset($_GET['id_hsp'])) {
    $id_xoa = $_GET['id_hsp'];
    $sql = "DELETE FROM `hangsp` WHERE id_hangsp = '$id_xoa'";

    if (mysqli_query($con, $sql) == true) {
        echo "<script language='javascript'>
                            alert('Đã xóa thành công');
                            window.open('./index.php?admin=DShang', '_self', 1);
                        </script>";
    }
}
