<?php
if (isset($_GET['id_sanpham'])) {
    $id = $_GET['id_sanpham'];
    $sql = "SELECT * FROM sanpham sp INNER JOIN hangsp hsp on sp.id_hangsp=hsp.id_hangsp WHERE id_sanpham=$id;";
    $con = mysqli_connect('localhost', 'root', '', 'quantriwebsite');
    $kq = mysqli_query($con, $sql);
    if (mysqli_num_rows($kq) > 0) {
        $row = mysqli_fetch_array($kq);
?>
        <div>
            <ul style="list-style-type: none; display: block">
                <li style="text-align: center;">
                    <h3 class="card-title"><?php echo $row['tensp']; ?></h3>
                </li>
                <li style="text-align: center; ">
                    <img class="card-img-top" src="../upload/<?php echo $row['anhsanpham'] ?>" style="border: #ff6876 solid 3px; border-radius: 3px; width:600px; height:350px;" alt="">
                </li>
                <li style="text-align: center; ">
                    <div>
                        <h6>Giá: <?php echo number_format($row['giasanpham']); ?> VND</h6>
                        <h6>Hãng <?php echo $row['ten_hangsp']; ?> </h6>
                    </div>
                </li>
                <li>
                    <h6><?php echo $row['mota_sp']; ?> </h6>
                </li>
                <li>
                    <h6>
                        <a href="./index.php?admin=suaSP&id_sanpham=<?php echo $id; ?>" data-sp-ma="2" class="btn btn-danger btn-delete-sanpham" style="margin: 20px;">
                            <i class="fa fa-trash" aria-hidden="true"></i> Chỉnh sửa
                        </a>
                        <a href="#" data-sp-ma="2" class="btn btn-danger btn-delete-sanpham" style="margin: 20px;">
                            <i class="fa fa-trash" aria-hidden="true"></i> Xóa
                        </a>
                    </h6>

                </li>
            </ul>
        </div>
<?php

    }
} else {
    echo "Đang cập nhật dữ liệu";
}
?>