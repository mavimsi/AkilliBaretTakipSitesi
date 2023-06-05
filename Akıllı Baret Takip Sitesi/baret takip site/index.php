<?php
    session_start();
    include("baglan.php");
    if ($_POST) {
        $kullanici=$_POST["kullanici"];
        $sifre=$_POST["sifre"];

        $sorgu=$baglan->query("select * from kullanici where (kullanici='$kullanici' && sifre='$sifre')");
        $kayitsay=$sorgu->num_rows;

        if ($kayitsay>0) {
            $_SESSION["giris"]=sha1(md5("var")); //sha1 ve md5 güvenlik için şifreleme
            echo "<script> window.location.href='anasayfa.php';</script>";

        } else {
            echo "<script> allert('HATALI KULLANICI BİLGİSİ!'); window.location.href='index.php';</script>";

        }

    } 


?>


<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<!-- Add icon library -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
body {font-family: Arial, Helvetica, sans-serif;}
* {box-sizing: border-box;}

.input-container {
  display: -ms-flexbox; /* IE10 */
  display: flex;
  width: 100%;
  margin-bottom: 15px;
}

.icon {
  padding: 10px;
  background: dodgerblue;
  color: white;
  min-width: 50px;
  text-align: center;
}

.input-field {
  width: 100%;
  padding: 10px;
  outline: none;
}

.input-field:focus {
  border: 2px solid dodgerblue;
}

/* Set a style for the submit button */
.btn {
  background-color: dodgerblue;
  color: white;
  padding: 15px 20px;
  border: none;
  cursor: pointer;
  width: 100%;
  opacity: 0.9;
}

.btn:hover {
  opacity: 1;
}
</style>
</head>
<body>

<form action="" method="post" style="max-width:500px;margin:auto">
  <h2>Panel Girişi</h2>
  <div class="input-container">
    <i class="fa fa-user icon"></i>
    <input class="input-field" type="text" placeholder="Kullanıcı Adı" name="kullanici">
  </div>

  
  <div class="input-container">
    <i class="fa fa-key icon"></i>
    <input class="input-field" type="password" placeholder="Parola" name="sifre">
  </div>

  <button type="submit" class="btn">Giriş Yap</button>
</form>

</body>
</html>