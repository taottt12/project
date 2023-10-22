<?php
include 'connect.php';
$sql = "SELECT * FROM hangsp";
$kq = mysqli_query($con, $sql);
if (mysqli_num_rows($kq) > 0) {
    while ($row = mysqli_fetch_array($kq)) {
        $id = $row;
?>
        <li>
            <a href="./index.php?sp=hang&id_hangsp=<?php echo $row['id_hangsp'] ?>"><?php echo $row['ten_hangsp']; ?></a>
        </li>
<?php
    }
}
?>