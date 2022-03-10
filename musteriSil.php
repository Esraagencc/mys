<?php
require_once("database/ayar.php");
if(!isset($_SESSION['girisok'])){
    header("Location: giris.php");  
    die();
  }

$gelenIDno = $_GET['id'];

$musterisil= ORM::for_table('musteriler')->find_one($gelenIDno)->delete();
header("Location: musterilistesi.php");
echo $gelenIDno;?>