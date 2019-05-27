<html>

<head> <title>İZİN ONAY</title>
  <meta charset="UTF-8"></head>

<?php
   include("connect.php");
   session_start();

?>


<link rel="stylesheet" type="text/css" href="css/master.css">
<link rel="stylesheet" type="text/css" href="css/buton.css">

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
  <li><a href="">İZİN ONAY</a></li>
<?php }?>
  <?php }?>


  <li style="float:right"><a class="active" href="login.php">ÇIKIŞ YAP</a></li>
</ul>
    </div>

<div id="mstr">
  <Table Class="Table" border="1">
          <Thead>
          <Tr>
              <Th>
                BAŞLANGIÇ TARİHİ
              </Th>
              <Th>
                BİTİŞ TARİHİ
              </Th>
              <Th>
                ADRES
              </Th>
              <Th>
                  TEL
              </Th>
              <Th>
                  ONAY
              </Th>
              <Th>
                  DURUM
              </Th>
          </Tr>
          </Thead>
          <Tbody>

  <form action="sil.php" method="POST">
              <?Php

               include("connect.php");
               $find=mysqli_query($connect,"SELECT * FROM izinler");
               While ($Row=Mysqli_fetch_assoc($find)) {

                      ?>
                      <input type="hidden" value="<?php echo $Row['id'] ?>" name="id" >
                        <?Php
                  Echo "<Tr>";
                  Echo "<Td>".$Row["btarih"]."</Td>";
                  Echo "<Td>".$Row["tarihb"]."</Td>";
                  Echo "<Td>".$Row["adres"]."</Td>";
                  Echo "<Td>".$Row["tel"]."</Td>";
                  ?>

               <Td><a href="onay.php?id=<?php echo $Row['id'];?>">ONAYLA</a></Td>
               <Td>
        <?php if($Row['onay']==1)
              {
                echo "<img src='img/onay.jpg' width='15' height='15'/>";
               }
                     ?>
                </Td>
               <?php Echo "</Tr>";  }?>


          </form>
          </Tbody>
      </Table>



</div>

  </div>


  <div id="taban">
    <div id="alt" align=center><font color=white> 2019 &copy; KYKNET|TÜM HAKLARI SAKLIDIR.</font></div>
  </div>


  </div>


</body>
</html>
