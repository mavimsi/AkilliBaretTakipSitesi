<!DOCTYPE html>
<html>
<head>
<style>
#customers {
  font-family: Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

#customers td, #customers th {
  border: 1px solid #ddd;
  padding: 8px;
}

#customers tr:nth-child(even){background-color: #f2f2f2;}

#customers tr:hover {background-color: #ddd;}

#customers th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: left;
  background-color: #04AA6D;
  color: white;
}
</style>
</head>
<body>
<div style="text-align: center;">
        <a href="anasayfa.php">ANA SAYFA</a> - <a href="cikis.php" onclick="if (!confirm('Çıkış Yapmak İstediğinize Emin misiniz?')) return falce;">ÇIKIŞ</a><br><hr><br><br>

    </div>

<h1 style="text-align:center;">Akıllı Baret Kullanıcı Durum Tablosu</h1>

<table id="customers">
  <tr>
    <th>Ad Soyad</th>
    <th>Baret No</th>
    <th>Nem(%)</th>
    <th>Baret Takılı mı?</th>
    <th>Gaz/Duman Durumu</th>
    <th>Isı (Derece)</th>
    <th>Düşme/Çarpma</th>
    <th>Acil Çağrı</th>
  </tr>

  <tr>
    <td>Gökçe VURAL BORAN</td>
    <td>1</td>

    <!--nem sensörü başı-->
    <td><?php

// Firebase Realtime Database URL
$databaseURL = "Firebase Database URL";

// Firebase Realtime Database'ye erişmek için gerekli olan API anahtarı
$databaseSecret = "Firebase Database API anahtarı";

// okunacak verilerin bulunduğu yol
$databasePath = "/gelennemdeger";

// Firebase Realtime Database'ye istek yapmak için curl ayarlar
$curlOptions = array(
    CURLOPT_URL => $databaseURL . $databasePath . ".json?auth=" . $databaseSecret,
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_HEADER => false,
    CURLOPT_FOLLOWLOCATION => true,
    CURLOPT_ENCODING => "",
    CURLOPT_AUTOREFERER => true,
    CURLOPT_CONNECTTIMEOUT => 120,
    CURLOPT_TIMEOUT => 120,
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_HTTPHEADER => array("Content-Type: application/json"),
);

// curl'ü yaratın ve isteği gönderir
$curl = curl_init();
curl_setopt_array($curl, $curlOptions);
$response = curl_exec($curl);

// curl'ü kapatır
curl_close($curl);

// istek sonrası alınan yanıtı JSON'a dönüştürür
$data = json_decode($response, true);

// sonuçları görüntüler
print_r($data);
if ($data > 70) {
    echo "<script>alert('YÜKSEK NEM DEĞERİ!!!');</script>";
  }

echo '<meta http-equiv="refresh" content="10;URL=anasayfa.php">'

?></td>


<!--baret takılı durumu-->
    <td><?php

// Firebase Realtime Database URL
$databaseURL1 = "Firebase Database URL";

// Firebase Realtime Database'ye erişmek için gerekli olan API anahtarı
$databaseSecret1 = "Firebase Database API anahtarı";

// okunacak verilerin bulunduğu yol
$databasePath1 = "/barettak";

// Firebase Realtime Database'ye istek yapmak için curl ayarlarını yapın
$curl1Options = array(
    CURLOPT_URL => $databaseURL1 . $databasePath1 . ".json?auth=" . $databaseSecret1,
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_HEADER => false,
    CURLOPT_FOLLOWLOCATION => true,
    CURLOPT_ENCODING => "",
    CURLOPT_AUTOREFERER => true,
    CURLOPT_CONNECTTIMEOUT => 120,
    CURLOPT_TIMEOUT => 120,
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_HTTPHEADER => array("Content-Type: application/json"),
);

// curl'ü yaratın ve isteği gönderin
$curl1 = curl_init();
curl_setopt_array($curl1, $curl1Options);
$response1 = curl_exec($curl1);

// istek sonrası curl'ü kapatın
curl_close($curl);

// istek sonrası alınan yanıtı JSON'a dönüştürün
$data1 = json_decode($response1, true);

// sonuçları görüntüleyin
//print_r($data);
if ($data1<15 && $data1>0) {
    echo "Takılı";
  }else {
    echo "Takılı değil";
  }

echo '<meta http-equiv="refresh" content="10;URL=anasayfa.php">'

?></td> 



<!--gaz sensör başı-->
    <td><?php

// Firebase Realtime Database URL
$databaseURL2 = "Firebase Database URL";

// Firebase Realtime Database'ye erişmek için gerekli olan API anahtarı
$databaseSecret2 = "Firebase Database API anahtarı";

// okunacak verilerin bulunduğu yol
$databasePath2 = "/geazsensordeger";

// Firebase Realtime Database'ye istek yapmak için curl ayarlar
$curl2Options = array(
    CURLOPT_URL => $databaseURL2 . $databasePath2 . ".json?auth=" . $databaseSecret2,
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_HEADER => false,
    CURLOPT_FOLLOWLOCATION => true,
    CURLOPT_ENCODING => "",
    CURLOPT_AUTOREFERER => true,
    CURLOPT_CONNECTTIMEOUT => 120,
    CURLOPT_TIMEOUT => 120,
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_HTTPHEADER => array("Content-Type: application/json"),
);

// curl'ü yaratın ve isteği gönderin
$curl2 = curl_init();
curl_setopt_array($curl2, $curl2Options);
$response2 = curl_exec($curl2);

// istek sonrası curl'ü kapatın
curl_close($curl2);

// istek sonrası alınan yanıtı JSON'a dönüştürün
$data2 = json_decode($response2, true);

// sonuçları görüntüleyin
print_r($data2);
if ($data2 > 200) {
    echo "<script>alert('YÜKSEK GAZ/DUMAN DEĞERİ!!!');</script>";
  }
echo '<meta http-equiv="refresh" content="10;URL=anasayfa.php">'
?>
</td> <!--gaz sensör -->



<!--ısı sensor başı -->
    <td><?php

// Firebase Realtime Database URL
$databaseURL3 = "Firebase Database URL";

// Firebase Realtime Database'ye erişmek için gerekli olan API anahtarı
$databaseSecret3 = "Firebase Database API anahtarı";

// okunacak verilerin bulunduğu yol
$databasePath3 = "/gelenisideger";

// Firebase Realtime Database'ye istek yapmak için curl ayarlar
$curl3Options = array(
    CURLOPT_URL => $databaseURL3 . $databasePath3 . ".json?auth=" . $databaseSecret3,
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_HEADER => false,
    CURLOPT_FOLLOWLOCATION => true,
    CURLOPT_ENCODING => "",
    CURLOPT_AUTOREFERER => true,
    CURLOPT_CONNECTTIMEOUT => 120,
    CURLOPT_TIMEOUT => 120,
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_HTTPHEADER => array("Content-Type: application/json"),
);

// curl'ü yaratın ve isteği gönderin
$curl3 = curl_init();
curl_setopt_array($curl3, $curl3Options);
$response3= curl_exec($curl3);

// istek sonrası curl'ü kapatın
curl_close($curl3);

// istek sonrası alınan yanıtı JSON'a dönüştürün
$data3 = json_decode($response3, true);

// sonuçları görüntüleyin
print_r($data3);
if ($data3 > 25) {
    echo "<script>alert('YÜKSEK ISI DEĞERİ!!!');</script>";
  }
echo '<meta http-equiv="refresh" content="10;URL=anasayfa.php">'
?></td>



<!--düşme için ivme -->
    <td><?php

// Firebase Realtime Database URL
$databaseURL5 = "Firebase Database URL";

// Firebase Realtime Database'ye erişmek için gerekli olan API anahtarı
$databaseSecret5 = "Firebase Database API anahtarı";

// okunacak verilerin bulunduğu yol
$databasePath5 = "/dustu";

// Firebase Realtime Database'ye istek yapmak için curl ayarlar
$curl5Options = array(
    CURLOPT_URL => $databaseURL5 . $databasePath5 . ".json?auth=" . $databaseSecret5,
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_HEADER => false,
    CURLOPT_FOLLOWLOCATION => true,
    CURLOPT_ENCODING => "",
    CURLOPT_AUTOREFERER => true,
    CURLOPT_CONNECTTIMEOUT => 120,
    CURLOPT_TIMEOUT => 120,
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_HTTPHEADER => array("Content-Type: application/json"),
);

// curl'ü yaratın ve isteği gönderin
$curl5 = curl_init();
curl_setopt_array($curl5, $curl5Options);
$response5 = curl_exec($curl5);

// istek sonrası curl'ü kapatın
curl_close($curl5);

// istek sonrası alınan yanıtı JSON'a dönüştürün
$data5 = json_decode($response5, true);

// sonuçları görüntüleyin
if ($data5==1) {
  echo "Düşme Algılandı!!!";
  echo "<script>alert('ACİL DURUM!!!');</script>";
} else {
  echo "Düşme Yok";

}

echo '<meta http-equiv="refresh" content="10;URL=anasayfa.php">'

?></td>


<!--Acil Çağrı için-->    
    <td><?php

// Firebase Realtime Database URL
$databaseURL4 = "Firebase Database URL";

// Firebase Realtime Database'ye erişmek için gerekli olan API anahtarı
$databaseSecret4 = "Firebase Database API anahtarı";

// okunacak verilerin bulunduğu yol
$databasePath4 = "/butonbasili";

// Firebase Realtime Database'ye istek yapmak için curl ayarlar
$curl4Options = array(
    CURLOPT_URL => $databaseURL4 . $databasePath4 . ".json?auth=" . $databaseSecret4,
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_HEADER => false,
    CURLOPT_FOLLOWLOCATION => true,
    CURLOPT_ENCODING => "",
    CURLOPT_AUTOREFERER => true,
    CURLOPT_CONNECTTIMEOUT => 120,
    CURLOPT_TIMEOUT => 120,
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_HTTPHEADER => array("Content-Type: application/json"),
);

// curl'ü yaratın ve isteği gönderin
$curl4 = curl_init();
curl_setopt_array($curl4, $curl4Options);
$response4 = curl_exec($curl4);

// istek sonrası curl'ü kapatın
curl_close($curl4);

// istek sonrası alınan yanıtı JSON'a dönüştürün
$data4 = json_decode($response4, true);

// sonuçları görüntüleyin
if ($data4==1) {
    echo "Aktif";
    echo "<script>alert('ACİL DURUM!!!');</script>";
  } else {
    echo "Pasif";
  }


?></td>
  </tr>



</table>

</body>
</html>