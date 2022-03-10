
<?php 
require_once("database/ayar.php");
if($_POST){
    $musteri_id = $_POST['musteri_id'];
    $urun_id = $_POST['urun_id'];
    $urunucreti = $_POST['urunucreti'];
    $urunadeti = $_POST['urunadeti'];

    $musteri = ORM::for_table('musteriler')->find_one($musteri_id);
    $urun = ORM::for_table('urunler')->find_one($urun_id);
    $ekle = ORM::for_table('satislar')->create();
    $ekle->musteri_adi = $musteri['ad'];
    $ekle->musteri_soyadi = $musteri['soyad'];
    $ekle->musteri_telefon = $musteri['telno'];
    $ekle->musteri_mail = $musteri['mail'];
    $ekle->musteri_adres = $musteri['adres'];
    $ekle->urun_adi = $urun['urunismi'];
    $ekle->urun_fiyati = $urunucreti;
    $ekle->urun_adeti = $urunadeti;
    $ekle->satis_tarihi = date('Y-m-d');
    $ekle->save();
    if($ekle){
        //yonlendir
        header("Location: giris.php");
    }else{
        //hata
        echo "Ekleme de bir hata oluştu";
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
  
   <?php 
   require_once("layout/header.php");
   $musteriler = ORM::for_table('musteriler')->find_many();
   $urunler=     ORM::for_table('urunler')->find_many();
   ?>
   <div class="container">
    <h3>Satış Yap</h3> <br>
    <form action="satisyap.php" method="post">
        <div class="row">
                <div class="col-3">
                    <select class="form-select" name="musteri_id" >
                        <option selected>Müşteriyi Seçin</option>
                        <?php foreach($musteriler as $musteri){ ?>
                        <option value="<?php echo $musteri["id"]?>"><?php echo $musteri["ad"]." ".$musteri["soyad"]?></option>
                        <?php } ?>
                    </select>
                </div>
                <div class="col-3">
                <select class="form-select" name="urun_id">
                        <option selected>Ürünü Seçin</option>
                        <?php foreach($urunler as $urun){ ?>
                        <option value="<?php echo $urun["id"]?>"><?php echo $urun["urunismi"]." ".$urun["urunucreti"]?></option>
                        <?php } ?>
                    </select>
                </div>
                <div class="col-3">
                <input type="text" class="form-control" placeholder="Ürün Fiyatı" id="exampleInputEmail1" name="urunucreti" aria-describedby="emailHelp">
                </div>
                <div class="col-3">
                <input type="text" class="form-control" placeholder="Ürün Adeti" id="exampleInputEmail1" name="urunadeti" aria-describedby="emailHelp">
                </div>
        </div> <br>
                <div class="row">
                    <div class="col-6"></div>
                    <div class="col-3">
                        <button style="margin-left: -190px;" type="submit" class="btn btn-primary btn-lg">Satış Yap</button>
                    </div>
                </div>
        </div>   

    </form>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script> 
  </body>
</html>

