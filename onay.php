<?php
include("connect.php");
$iid= (int)$_GET['id'];
$sql = "UPDATE izinler SET onay=1 where id='$iid'";
$sonuc1= mysqli_query($connect,$sql);
header('location:izinonay.php');

?>
