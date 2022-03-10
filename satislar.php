<?php
require_once("database/ayar.php");
if(!isset($_SESSION['girisok'])){
  //header("Location: giris.php");  
  die();
}


$satislar = ORM::for_table('satislar')->find_many();


?> 

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Müşteri Yönetim Sistemi</title>
  </head>
  <body>
  
   <?php require_once('layout/header.php') ?>

</div>
    <div class="container">
   

        <div class="row">
             <table class="table table-striped table-hover">
              <tr>
                <th>ID</th>
                <th>MÜŞTERİ ADI SOYADI</th>
                <th>MÜŞTERİ TELEFON</th>
                <th>MÜŞTERİ MAİL</th>
                <th>MÜŞTERİ ADRES</th>
                <th>ÜRÜN ADI</th>
                <th>ÜRÜN ADETİ</th>
                <th>ÜRÜN FİYATI</th>
                <th>TOPLAM TUTAR</th>
                <th>SATIŞ TARİHİ</th>
                <th>HIZLI İŞLEM</th>
              </tr>
              <?php foreach($satislar as $satis){ ?>
                  <tr>
                    <td><?php echo $satis["id"] ?></td>
                    <td><?php echo $satis["musteri_adi"] . ' ' .$satis["musteri_soyadi"] ?></td>
                    <td><?php echo $satis["musteri_telefon"] ?></td>
                    <td><?php echo $satis["musteri_mail"] ?></td>
                    <td><?php echo $satis["musteri_adres"] ?></td>
                    <td><?php echo $satis["urun_adi"] ?></td>
                    <td><?php echo $satis["urun_adeti"] ?></td>
                    <td><?php echo $satis["urun_fiyati"].' ₺'  ?></td>
                    <?php $toplam_tutar =   $satis["urun_adeti"]*$satis["urun_fiyati"]; ?>
                    <td><?php echo $toplam_tutar.' ₺' ?></td>
                    <td><?php echo $satis["satis_tarihi"] ?></td>
                    <td>
                     
                        <a  onclick="return confirm('Silmek istediğinizden emin misiniz ?')"  href="satisSil.php?id=<?php echo $satis["id"] ?>" class="btn btn-danger">Sil</a> 
                    </td>
                </tr>

              <?php } ?>
             </table>
        </div>

     
    
    </div>




    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script> 
  </body>
</html>