<?php 

require_once("database/ayar.php");  
if(isset($_SESSION['girisok'])){
    echo "Giriş Yapıldı";
    header("Location: musteriListesi.php");
}
if($_POST){
  $gelenemail=$_POST["email"];
  $gelensifre=$_POST["sifre"];
  $varMi=ORM::for_table("kullanicilar")->where("email",$gelenemail)->where("sifre",$gelensifre)->find_one();
  if($varMi){
      $_SESSION["girisok"]=1;
      $_SESSION["adsoyad"]=$varMi["adsoyad"];
         header("Location: musteriListesi.php");
     }
  else{
          echo "Kullanıcı adı ve şifre hatalı";
      }
  }
  else{
  echo " ";
  }
  


?>




<html>
    <head>
        <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<title>Müşteri Yönetim Sistemi</title>
    </head>
    <body>
       
       <div class="container">
    
            <div class="row">
                <div class="col-3"></div>
                <div class="col-6">
                <form action="giris.php" method="post">
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Email address</label>
                        <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                        <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Password</label>
                        <input type="password" name="sifre" class="form-control" id="exampleInputPassword1">
                    </div>
                    
                    <button type="submit" class="btn btn-dark">Submit</button>
                    </form>
                </div>
                <div class="col-3"></div>
            </div>
            
       </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script> 
    </body>
</html>