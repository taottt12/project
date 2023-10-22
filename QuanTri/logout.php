<?php
session_start();
unset($_SESSION['phanquyen']);
unset($_SESSION['username']);
unset($_SESSION['idnd']);
echo "
    <script language='javascript'>
        window.open('../index.php','_parent' ,1);
    </script>
";
