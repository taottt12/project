<?php
include 'connect.php';
$sql = "SELECT * FROM `loaisp`";
$kq = mysqli_query($con, $sql);
if (mysqli_num_rows($kq) > 0) {
    while ($row = mysqli_fetch_array($kq)) {
        $id = $row;
?>
        <li><a href="./index.php?sp=loai&id_loaisp=<?php echo $row['id_loaisp'] ?>"><?php echo $row['ten_loaisp']; ?></a></li>
<?php
    }
}

?>