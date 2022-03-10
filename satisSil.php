<?php
require_once("database/ayar.php");
if(!isset($_SESSION['girisok'])){
    header("Location: giris.php");  
    die();
  }

$gelenIDno = $_GET['id'];

$satissil= ORM::for_table('satislar')->find_one($gelenIDno)->delete();
header("Location: satislar.php");
echo $gelenIDno;?>