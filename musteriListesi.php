<?php
require_once("database/ayar.php");
if(!isset($_SESSION['girisok'])){
  //header("Location: giris.php");  
  die();
}


if(isset($_GET["aranan"])){
  $gelenarama=$_GET["aranan"];
  $musteriler = ORM::for_table('musteriler')->where_like('telno','%'.$gelenarama.'%')->find_many();
}else{
  $musteriler = ORM::for_table('musteriler')->find_many();
}


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
                <th>AD</th>
                <th>SOYAD</th>
                <th>E-Mail</th>
                <th>Telefon</th>
                <th>Ev Adresi</th>
                <th>Hızlı İşlem</th>
              </tr>
              <?php foreach($musteriler as $musteri){ ?>
                  <tr>
                    <td><?php echo $musteri["id"] ?></td>
                    <td><?php echo $musteri["ad"] ?></td>
                    <td><?php echo $musteri["soyad"] ?></td>
                    <td><?php echo $musteri["mail"] ?></td>
                    <td><?php echo $musteri["telno"] ?></td>
                    <td><?php echo $musteri["adres"] ?></td>
                    <td>
                        <a href="musteriDuzenle.php?id=<?php echo $musteri["id"] ?>" class="btn btn-info">Düzenle</a> 
                        <a href="musteriSil.php?id=<?php echo $musteri["id"] ?>" class="btn btn-danger">Sil</a> 
                    </td>
                </tr>

              <?php } ?>
             </table>
        </div>

     
    
    </div>




    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script> 
  </body>
</html>