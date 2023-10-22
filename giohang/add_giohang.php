<?php
if (isset($_GET['id_sanpham'])) {
    $id = $_GET['id_sanpham'];
    $sql = "SELECT * FROM sanpham where id_sanpham = $id";
    $kq = mysqli_query($con, $sql);
    if (mysqli_num_rows($kq) > 0) {
        $row = mysqli_fetch_array($kq);
        // tạo mảng chứa sp
        $list_cart = array('id' => $row['id_sanpham'], 'tensp' => $row['tensp'], 'anhsp' => $row['anhsanpham'], 'giasp' => $row['giasanpham']);
        // add vào giỏ hàng
        if (!isset($_SESSION['cart'])) $_SESSION['cart'] = array();
        $kt = 0;
        for ($i = 0; $i < count($_SESSION['cart']); $i++) {
            if ($_SESSION['cart'][$i]['id'] == $id) {
                $kt++;
                break;
            }
        }
        if ($kt > 0) {
            echo "<script language='javascript'>
                                alert('Sản phẩm đã có trong giỏ hàng, bạn cần thanh toán trước khi thêm sản phẩm mới');
                                window.open('index.php?sp=giohang', '_self', 0);
                            </script>";
        } else {
            array_push($_SESSION['cart'], $list_cart);
            echo "<script language='javascript'>
                                alert('Đã thêm sản phẩm vào giỏ hàng thành công');
                                window.open('./index.php', '_self', 0);
                            </script>";
        }
        // Xóa sản phẩm

    }
} else {
    echo "Đang cập nhật dữ liệu";
}
