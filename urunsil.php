<?php
require_once("database/ayar.php");
if(!isset($_SESSION['girisok'])){
    header("Location: giris.php");  
    die();
  }

$gelenIDno = $_GET['id'];

$urunsil= ORM::for_table('urunler')->find_one($gelenIDno)->delete();
header("Location: urunler.php");
echo $gelenIDno;?>