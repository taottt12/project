<?php
include('connect.php');

// Số lượng sản phẩm trên mỗi trang
$limit = 12;

// Tổng số sản phẩm
$sql_count = "SELECT COUNT(*) AS total FROM `sanpham`";
$result_count = mysqli_query($con, $sql_count);
$row_count = mysqli_fetch_assoc($result_count);
$total_items = $row_count['total'];

// Tổng số trang
$total_pages = ceil($total_items / $limit);

// Trang hiện tại
$current_page = isset($_GET['page']) ? $_GET['page'] : 1;

// Vị trí bắt đầu lấy sản phẩm
$start = ($current_page - 1) * $limit;

// Lấy sản phẩm
$sql = "SELECT * FROM `sanpham` LIMIT $start, $limit";
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
                    </div>
                    <a href="./index.php?sp=sanpham&id_sanpham=<?php echo $row['id_sanpham']; ?>" class="btn btn-primary" Style="margin-top: 10px;">Thêm</a>
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
        <table class="table" style="margin-left: 30px; color: red">
            <tr>
                <td>
                    <?php if ($current_page > 1) { ?>
                        <a href="./index.php?page=<?php echo $current_page - 1; ?>" Style="margin-top: 10px;">Trang trước</a>
                    <?php } ?>
                </td>

                <?php for ($i = 1; $i <= $total_pages; $i++) { ?>
                    <?php if ($i == $current_page) { ?>
                        <td>
                            <a Style="margin-top: 10px;"><?php echo $i; ?></a>
                        </td>
                    <?php } else { ?>
                        <td>
                            <a href="./index.php?page=<?php echo $i; ?>" Style="margin-top: 10px;"><?php echo $i; ?></a>
                        </td>
                    <?php } ?>
                <?php } ?>
                <?php if ($current_page < $total_pages) { ?>
                    <td>
                        <a href="./index.php?page=<?php echo $current_page + 1; ?>" Style="margin-top: 10px;">Trang sau</a>
                    </td>
                <?php } ?>
            </tr>
        </table>
    </div>
<?php
}
?>