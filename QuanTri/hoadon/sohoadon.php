<?php
$shd = $_GET['id_HD'];
$chuoi = strlen($shd);
if ($chuoi == 10) {
	echo "SHĐ: " . $shd;
} elseif ($chuoi == 9) {
	echo "SHĐ: 0" . $shd;
} elseif ($chuoi == 8) {
	echo "SHĐ: 00" . $shd;
} elseif ($chuoi == 7) {
	echo "SHĐ: 000" . $shd;
} elseif ($chuoi == 6) {
	echo "SHĐ: 0000" . $shd;
} elseif ($chuoi == 5) {
	echo "SHĐ: 00000" . $shd;
} elseif ($chuoi == 4) {
	echo "SHĐ: 000000" . $shd;
} elseif ($chuoi == 3) {
	echo "SHĐ: 0000000" . $shd;
} elseif ($chuoi == 2) {
	echo "SHĐ: 00000000" . $shd;
} else {
	echo "SHĐ: 000000000" . $shd;
}
