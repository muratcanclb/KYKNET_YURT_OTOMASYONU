<?php

if ($_GET)
{

    if(isset($_POST['button']))
    {
		$ad=$_POST['ad'];
		$sifre=$_POST['sifre'];
		echo $ad.$sifre;
		$print=mysqli_query($connect,"Select * from kullanicilar ");
		$row=mysqli_fetch_assoc($print);
	    if($ad==$row['ad'] && $sifre==$row['sifre'])

		echo "giris yaptiniz Sayfaya yönlendiriliyorsunuz.";
	}

  include("connect.php");

  if ($connect->query("DELETE FROM kullanicilar WHERE id =".(int)$_GET['id']))

    header("location:ögrencisil.php");
}
?>
