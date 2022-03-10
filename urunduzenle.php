<?php
require_once("database/ayar.php");
if(!isset($_SESSION['girisok'])){
  header("Location: giris.php");  
  die();
}


$gelenID = $_GET['id'];

$urun = ORM::for_table('urunler')->where('id',$gelenID)->find_one();

if($_POST){
    $urunler_id = $_POST['musteri_id'];
    $gelenad = $_POST['urunismi'];
    $gelenucret = $_POST['urunucreti'];
    $urun = ORM::for_table('urunler')->find_one($urunler_id);
    $urun->urunismi = $gelenad;
    $urun->urunucreti= $gelenucret;
    $urun->save();
    if($urun){
      header("Location: urunler.php");
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
            
        <form action="urunduzenle.php" method="POST">
            <input type="hidden" name="musteri_id" value="<?php echo $urun['id'] ?>">
            <div class="mb-3">
              <label for="exampleInputEmail1" class="form-label">Ürün Adı</label>
              <input type="text" name="urunismi" value="<?php echo $urun['urunismi'] ?>" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
              <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
            </div>
            <div class="mb-3">
              <label for="exampleInputPassword1" class="form-label">Ürün Ücreti</label>
              <input type="text" name="urunucreti" value="<?php echo $urun['urunucreti'] ?>"  class="form-control" id="exampleInputPassword1">
            </div>
            <button type="submit" class="btn btn-primary">Düzenle</button>
        </form>

        </div>

     
    
    </div>




    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script> 
  </body>
</html>