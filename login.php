<html>

<head>  <meta charset="UTF-8">
<title>GİRİŞ</title>
</head>
<link rel="stylesheet" type="text/css" href="css/login.css">
<body>
<div id="sayfa">
<div id="logo"><img src="img/logo.png"/></div>
<div id="icerik">
  <div id="login">
  <table border="0">
      <td>
         <form action="" method="post">
       <table border="2" align="center" bordercolor="#00FF66" bgcolor="#FFFFFF">
        <tr><td colspan="2" align="center">GİRİŞ YAP</td></tr>
        <tr><td>TC:</td><td><input type="text" name="tc"></td></tr>
        <tr><td>ŞİFRE:</td><td><input type="password" name="sifre"></td></tr>
        <tr><td colspan="2" align="center"><input type="submit" name="gir" value="GİRİŞ YAP"></td></tr>
        </table>
         </form>
       </td>
       </tr></table>
     </div>
</div>


<div id="taban">
  <div id="alt" align=center><font color=white> 2019 &copy; KYKNET|TÜM HAKLARI SAKLIDIR.</font></div>
</div>



</div>


</body>
</html>

<?php
include ("connect.php");
session_start();
if(isset($_POST['gir']))
{
   $tc=$_POST['tc'];
   $sifre=$_POST['sifre'];
echo $tc." ".$sifre;
 if($tc && $sifre)
 {

    $find=mysqli_query($connect,"select*from kullanicilar where tc='$tc' and sifre='$sifre'");
     $row=mysqli_num_rows($find);
     if ($row>0) {


    
     $_SESSION['tc']=$tc;
     header("refresh:1;url=home.php");

   }
 }
}
?>
