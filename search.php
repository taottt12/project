<?php
if (isset($_POST['tim'])) {
    $search = $_POST['txtsearch'];
    $sql = "SELECT * FROM sanpham WHERE tensp LIKE '%$search%';";
    $result = mysqli_query($con, $sql);
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            // hiển thị sản phẩm tìm thấy
            echo '<div class="col-md-3">
                    <div class="card">
                        <img src="' . $row['anhsanpham'] . '" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">' . $row['tensp'] . '</h5>
                            <p class="card-text">' . number_format($row['giasanpham']) . ' VNĐ</p>
                            <a href="index.php?sp=chitietsp&id=' . $row['id_sanpham'] . '" class="btn btn-primary">Chi tiết</a>
                        </div>
                    </div>
                </div>';
        }
    } else {
        // thông báo không tìm thấy sản phẩm nào
        echo '<p class="text-center">Không tìm thấy sản phẩm nào</p>';
    }
} else {
    echo "lỗi post";
}
