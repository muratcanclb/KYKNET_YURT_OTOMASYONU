
<html>
  <head>

     <meta charset="UTF-8"/>
  <title>ÖĞRENCİ İŞLEMLERİ</title>
</head>


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



    <table border="2" align="center">

        <tr>
            <th>NO</th>
            <th>İSİM</th>
            <th>TC</th>
            <th>ŞİFRE</th>
            <th colspan="2">İŞLEMLER</th>
        </tr>
    <?php

    $sorgu = $connect->query("SELECT * FROM kullanicilar where yetki<1");

    while ($sonuc = $sorgu->fetch_assoc()) {

    $id = $sonuc['id'];
    $ad = $sonuc['ad'];
    $tc= $sonuc['tc'];
    $sif= $sonuc['sifre'];


    ?>

        <tr>
            <td><?php echo $id;  ?></td>
            <td><?php echo $ad; ?></td>
            <td><?php echo $tc; ?></td>
            <td><?php echo $sif; ?></td>

            <td><a href="düzenle.php?id=<?php echo $id; ?>" class="btn btn-primary">Düzenle</a></td>
            <td><a href="sil.php?id=<?php echo $id; ?>" class="btn btn-danger">Sil</a></td>
        </tr>

    <?php
    }

    ?>

    </table>











  </div>


  <div id="taban">
    <div id="alt" align=center><font color=white> 2019 &copy; KYKNET|TÜM HAKLARI SAKLIDIR.</font></div>
  </div>


  </div>

</body>

</html>
