<?php
require_once("database/ayar.php");
if(!isset($_SESSION['girisok'])){
  //header("Location: giris.php");  
  die();
}


if(isset($_GET["aranan"])){
  $gelenarama=$_GET["aranan"];
  $urunler = ORM::for_table('urunler')->where_like('urunismi','%'.$gelenarama.'%')->find_many();
}else{
  $urunler = ORM::for_table('urunler')->find_many();
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
                <th>ÜRÜN ADI</th>
                <th>SOYAD</th>
                <th>HIZLI İŞLEM</th>
              </tr>
              <?php foreach($urunler as $urun){ ?>
                  <tr>
                    <td><?php echo $urun["id"] ?></td>
                    <td><?php echo $urun["urunismi"] ?></td>
                    <td><?php echo $urun["urunucreti"] ?></td>
                    <td>
                        <a href="satisyap.php?id=<?php echo $urun["id"] ?>" class="btn btn-text-success">Satış Yap</a> 
                        <a href="urunduzenle.php?id=<?php echo $urun["id"] ?>" class="btn btn-info">Düzenle</a> 
                        <a href="urunsil.php?id=<?php echo $urun["id"] ?>" class="btn btn-danger">Sil</a> 
                    </td>
                </tr>

              <?php } ?>
             </table>
        </div>

     
    
    </div>




    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script> 
  </body>
</html>