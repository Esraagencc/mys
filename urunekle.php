<?php
require_once("database/ayar.php");
if(!isset($_SESSION['girisok'])){
  header("Location: giris.php");  
  die();
}



if($_POST){
    $gelenad = $_POST['urunismi'];
    $gelenucret = $_POST['urunucreti'];
    $ekle = ORM::for_table('urunler')->create();
    $ekle->urunismi = $gelenad;
    $ekle->urunucreti = $gelenucret;
    $ekle->save();
    if($ekle){
      header("Location: urunler.php");
    }else{
      echo "Eklenirken Hata Oluştu";
    }

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
            
        <form action="urunekle.php" method="POST">
            <div class="mb-3">
              <label for="exampleInputEmail1" class="form-label">Ürün Adı</label>
              <input type="text" name="urunismi" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
              <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
            </div>
            <div class="mb-3">
              <label for="exampleInputPassword1" class="form-label">Ürün Ücreti</label>
              <input type="text" name="urunucreti"  class="form-control" id="exampleInputPassword1">
            </div>
            <button type="submit" class="btn btn-primary">Ekle</button>
        </form>

        </div>

     
    
    </div>




    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script> 
  </body>
</html>