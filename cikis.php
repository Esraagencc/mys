<?php
session_start();
unset($_SESSION["adsoyad"]);
unset($_SESSION["girisok"]);
header("Location: giris.php");

?>
