<?php
header('Content-Type: text/html; charset=utf-8');
$server = "localhost";
$korisnik = "root";
$loz = "";
$baza = "seminarski";
// Create connection
$dbc = mysqli_connect($server, $korisnik, $loz, $baza) or die('Error connecting to MySQL server.'.mysqli_error());
mysqli_set_charset($dbc, "utf8");
// Check connection
if (!$dbc) {
echo "Nije moguće povezivanje na bazu.";
}?>