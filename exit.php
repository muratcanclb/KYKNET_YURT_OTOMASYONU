<?php
session_start();
session_destroy();
if($_SESSION['tc']){
header('location:../login.php');
}
else{
    header('location:../home.php');
}
echo 'Admin Hesabından Çıkış Yapıldı';
?>
