<?php
include('connect.php');
if (isset($_GET['id_hangsp'])) {
    $id = $_GET['id_hangsp'];
    $limit = 12; // Số lượng sản phẩm trên mỗi trang
    $page = isset($_GET['page']) ? $_GET['page'] : 1; // Trang hiện tại

    // Tính toán số sản phẩm và số trang
    $sql_count = "SELECT COUNT(*) AS total FROM sanpham WHERE id_hangsp = $id";
    $result_count = mysqli_query($con, $sql_count);
    $row_count = mysqli_fetch_assoc($result_count);
    $total_items = $row_count['total'];
    $total_pages = ceil($total_items / $limit);

    // Lấy sản phẩm ứng với trang hiện tại
    $offset = ($page - 1) * $limit;
    $sql = "SELECT * FROM sanpham WHERE id_hangsp = $id LIMIT $offset, $limit";
    $result = mysqli_query($con, $sql);

    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_array($result)) {
?>
            <div class="col-4" Style=" width:33.3%; height: 350px;">
                <div class="card" style="margin-top: 5px; height: 340px;">
                    <img class="card-img-top" src="./upload/<?php echo $row['anhsanpham'] ?>" style="height:150px;" alt="">
                    <div class="card-body">
                        <div text-card Style="height: 100px;">
                            <h5 class="card-title"><?php echo $row['tensp']; ?></h5>
                            <h6 class="card-subtitle mb-1 text-muted"><?php echo number_format($row['giasanpham']); ?> VND</h6>
                            <!-- <p class="card-text">Nội dung văn bản trong <code>.card-body</code> này sử dụng <code>.card-text</code>.</p> -->
                        </div>
                        <a href="./index.php?sp=sanpham&id_sanpham=<?php echo $row['id_sanpham'] ?>" class=" btn btn-primary" Style="margin-top: 10px;">Thêm</a>
                        <a href="./index.php?sp=chitietSP&id_sanpham=<?php echo $row['id_sanpham']; ?>" class="btn btn-primary" Style="margin-top: 10px;">Chi tiết</a>
                    </div>
                </div>
            </div>
        <?php
        }
    }

    // Hiển thị các nút chuyển trang
    if ($total_pages > 1) {
        ?>
        <div class="pagination">
            <?php if ($page > 1) { ?>
                <a href="./index.php?id_hangsp=<?php echo $id; ?>&page=<?php echo $page - 1; ?>">Trang trước</a>
            <?php } ?>
            <?php for ($i = 1; $i <= $total_pages; $i++) { ?>
                <?php if ($i == $page) { ?>
                    <a class="active"><?php echo $i; ?></a>
                <?php } else { ?>
                    <a href="./index.php?id_hangsp=<?php echo $id; ?>&page=<?php echo $i; ?>"><?php echo $i; ?></a>
                <?php } ?>
            <?php } ?>
            <?php if ($page < $total_pages) { ?>
                <a href="./index.php?id_hangsp=<?php echo $id; ?>&page=<?php echo $page + 1; ?>">Trang sau</a>
            <?php } ?>
        </div>
<?php
    }
} else {
    echo "Đang cập nhật dữ liệu";
}
?>