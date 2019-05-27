






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

  <li><a href="#news">İZİN AL</a></li>

<?php }?>
  <?php }?>

  <li><a href="#contact">İZİNLER</a></li>



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

<div id="mstr">

  <?php

  $sorgu = $connect->query("SELECT * FROM kullanicilar WHERE id =".(int)$_GET['id']);


  $sonuc = $sorgu->fetch_assoc(); //sorgu çalıştırılıp veriler alınıyor

  ?>

  <div class="container">
  <div class="col-md-6">

  <form action="" method="post">

      <table class="table" align="center">

        <tr>
           <td>AD</td>
           <td><input type="text" name="ad" class="form-control" value="<?php echo $sonuc['ad'];
                // Veritabanından verileri çekip inputların içine yazdırıyoruz. ?>">
           </td>
       </tr>




          <tr>
              <td>TC</td>
              <td><input type="text"  name="tc" class="form-control" value="<?php echo $sonuc['tc'];
                   // Veritabanından verileri çekip inputların içine yazdırıyoruz. ?>">
              </td>
          </tr>


           <tr>
              <td>ŞİFRE</td>
              <td><input type="text" name="sifre" class="form-control" value="<?php echo $sonuc['sifre'];
                   // Veritabanından verileri çekip inputların içine yazdırıyoruz. ?>">
              </td>
          </tr>





          <tr>
              <td></td>
              <td><input type="submit" class="btn btn-primary" value="Kaydet"></td>
          </tr>

      </table>

  </form>
  </div>
  <div>
  <?php

  if ($_POST) { // Post olup olmadığını kontrol ediyoruz.

      $baslik = $_POST['tc']; // Post edilen değerleri değişkenlere aktarıyoruz

      $ak = $_POST['sifre'];
      $ad=$_POST['ad'];

      if ($baslik<>"" && $ak<>"") { // Veri alanlarının boş olmadığını kontrol ettiriyoruz.

          // Veri güncelleme sorgumuzu yazıyoruz.
          if ($connect->query("UPDATE kullanicilar SET tc = '$baslik',sifre='$ak',ad='$ad'	 WHERE id =".$_GET['id']))
          {
              header("location:ögrencisil.php");
              // Eğer güncelleme sorgusu çalıştıysa ekle.php sayfasına yönlendiriyoruz.
          }
          else
          {
              echo "Hata oluştu"; // id bulunamadıysa veya sorguda hata varsa hata yazdırıyoruz.
          }
      }
  }
  ?>




</div>





  </div>


  <div id="taban">
    <div id="alt" align=center><font color=white> 2019 &copy; KYKNET|TÜM HAKLARI SAKLIDIR.</font></div>
  </div>


  </div>

</body>

</html>
