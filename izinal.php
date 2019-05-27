<html>

<head> <title>İZİN AL</title>
  <meta charset="UTF-8"></head>

<?php
   include("connect.php");
   session_start();

?>


<link rel="stylesheet" type="text/css" href="css/master.css">

<body>
  <div id="sayfa">

  <div id="logo"><img src="img/logo.png"/></div>

  <div id="icerik">


    <div id="menü">
<ul>
  <li><a href="home.php">ANASAYFA</a></li>
<?php
  if(isset($_SESSION['tc']))
  		{
  	    $tc=$_SESSION['tc'];

  		    $adminsor=mysqli_query($connect,"select*from kullanicilar where tc='$tc'");
          $admincek=mysqli_fetch_assoc($adminsor);
      if($admincek['yetki']>="0")
  	 {?>

  <li><a href="izinal.php">İZİN AL</a></li>

<?php }?>
  <?php }?>

  <li><a href="izinler.php">İZİNLER</a></li>



  <?php
    if(isset($_SESSION['tc']))
    		{
    	    $tc=$_SESSION['tc'];

    		    $adminsor=mysqli_query($connect,"select*from kullanicilar where tc='$tc'");
            $admincek=mysqli_fetch_assoc($adminsor);
         if($admincek['yetki']=="1")
    	 {?>
  <li><a href="ögrencisil.php">ÖĞRENCİ SİL</a></li>
  <li><a href="#contact">İZİN ONAY</a></li>
<?php }?>
  <?php }?>


  <li style="float:right"><a class="active" href="login.php">ÇIKIŞ YAP</a></li>
</ul>
    </div>

<div id="mstr">
<form action="" method="post">
<table border="2" align="center">

<tr><td colspan="2" align="center">İZİN AL</td></tr>
<tr><td>İZİN BAŞLANGIÇ TARİHİ</td><td><input type="date" name="btarih"></td></tr>
<tr><td>İZİN BİTİŞ TARİHİ</td><td><input type="date" name="tarihb"></td></tr>
<tr><td>ADRES</td><td><input type="text" name="adres"></td></tr>
<tr><td>TEL</td><td><input type="text" name="tel"></td></tr>
<tr><td colspan="2" align="center"><input type="submit" name="al" value="İZİN AL"></td></tr>

</table>
</form>



</div>





  </div>


  <div id="taban">
    <div id="alt" align=center><font color=white> 2019 &copy; KYKNET|TÜM HAKLARI SAKLIDIR.</font></div>
  </div>


  </div>

</body>

</html>


<?php
include("connect.php");
if(isset($_POST['al']))
{

 $btarih = date_format(date_create($_POST['btarih']), 'Y-m-d');
 $tarihb = date_format(date_create($_POST['tarihb']), 'Y-m-d');
 $adres=$_POST['adres'];
 $tel=$_POST['tel'];

 $sqlekle="INSERT INTO izinler (btarih,tarihb,adres,tel)VALUES('$btarih','$tarihb','$adres','$tel') ";
 $sonuc=mysqli_query($connect,$sqlekle);

 if ($sonuc==0)
 { echo "Eklenemedi, kontrol ediniz";}

 else
 {
    echo "Başarıyla eklendi";
    echo $btarih." ".$tarihb." ".$adres." ".$tel;
 }
}
?>
