<html>

<head> <title>ANASAYFA</title>
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
  <li><a href="izinonay.php">İZİN ONAY</a></li>
<?php }?>
  <?php }?>


  <li style="float:right"><a class="active" href="login.php">ÇIKIŞ YAP</a></li>
</ul>
    </div>


KYKNET HOŞGELDİNİZ : :
<?php
 $tc=$_SESSION['tc'];
$sorgu=mysqli_query($connect,"SELECT * FROM kullanicilar where tc='$tc' ");
$cek=mysqli_fetch_assoc($sorgu);
$isim=$cek['ad'];
echo $isim;


  ?>
    <div id="kutucuk">
  <div class="kutu"><img src="img/icerik/idare.png" /></div>

  <div class="kutu"><img src="img/icerik/tahsilat.png" /></div>

  <div class="kutu"><img src="img/icerik/basvuru.png" /></div>

  <div class="kutu"><img src="img/icerik/misafir.png" /></div>

  <div class="kutu"><img src="img/icerik/strateji.png" /></div>
  </div>

  </div>


  <div id="taban">
    <div id="alt" align=center><font color=white> 2019 &copy; KYKNET|TÜM HAKLARI SAKLIDIR.</font></div>
  </div>


  </div>

</body>

</html>
