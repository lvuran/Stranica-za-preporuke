<?php
include 'connect.php';
$ime = $_POST['ime'];
$prezime = $_POST['prezime'];

$username = $_POST['korisnik'];
$lozinka = $_POST['lozinka'];
$hashed_password = password_hash($lozinka, CRYPT_BLOWFISH);
$razina = 0;
$registriranKorisnik = '';
//
$sql = "SELECT korisnik FROM korisnici WHERE korisnik = ?";
$stmt = mysqli_stmt_init($dbc);
if (mysqli_stmt_prepare($stmt, $sql)) {
mysqli_stmt_bind_param($stmt, 's', $username);
mysqli_stmt_execute($stmt);
mysqli_stmt_store_result($stmt);
}
if(mysqli_stmt_num_rows($stmt) > 0){
echo 'Korisničko ime se već koristi!';
}else{
// 

$sql = "INSERT INTO korisnici (korisnik, lozinka, dozvola, ime, prezime)VALUES (?, ?, ?, ?, ?)";
$stmt = mysqli_stmt_init($dbc);
if (mysqli_stmt_prepare($stmt, $sql)) {
mysqli_stmt_bind_param($stmt, 'ssiss', $username, $hashed_password, $razina, $ime, $prezime);
mysqli_stmt_execute($stmt);
$registriranKorisnik = true;
}
}
mysqli_close($dbc);


//Registracija je prošla uspješno
if($registriranKorisnik == true) {
header("Location: index.php");
echo '<p>Registracija uspješna!</p>';
} else {
//registracija nije protekla uspješno ili je korisnik prvi put došao na
header("Location: registracija.php");
echo '<p>Registracija nije uspjela!</p>';

}
?>