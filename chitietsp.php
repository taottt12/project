<?php
include('connect.php');
if (isset($_GET['id_sanpham'])) {
    $id = $_GET['id_sanpham'];
    // $sql = "SELECT sanpham.id_sanpham, sanpham.tensp, sanpham.anhsanpham, sanpham.giasanpham,
    // sanpham.mota_sp, loaisp.ten_loaisp, hangsp.ten_hangsp
    // FROM sanpham, loaisp, hangsp WHERE sanpham.id_loaisp=loaisp.id_loaisp
    // AND sanpham.id_hangsp=hangsp.id_hangsp
    // AND sanpham.id_sanpham = $id;";
    $sql = "SELECT * FROM sanpham sp INNER JOIN hangsp hsp on sp.id_hangsp=hsp.id_hangsp WHERE id_sanpham=$id;";
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

                    <img class="card-img-top" src="./upload/<?php echo $row['anhsanpham'] ?>" style="border: #ff6876 solid 3px; border-radius: 3px; width:600px; height:350px;" alt="">

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
                    <h6><a href="./index.php?sp=sanpham&id_sanpham=<?php echo $row['id_sanpham']; ?>" class=" btn btn-primary" Style="margin-top: 10px;">Thêm vào giỏ hàng</a>

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