<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Unos</title>
    <meta name="author" content="Lejla Vuran"/>
        <meta name="description" content="Naslovnica stranice za projekt"/>
        <link rel = "stylesheet" type="text/css" href = "style.css"/>
       
</head>
<body>
    <header>
    <hr>
    <div id="logo"><img src="images/hand.png" style="height: 50px;"></div>
    <nav>
        <a class="gumb" href="index.php">Početna</a>
        <a class="gumb"  href="kategorija.php?id=Knjiga">Knjiga</a>
        <a class="gumb"  href="kategorija.php?id=Serija">Serija</a>
        <a class="gumb"  href="kategorija.php?id=Strip">Strip</a>
        <a class="gumb" href="administrator.php">ADMINISTRACIJA</a>
        <a class="gumb" href="unos.php">UNOS</a>
        <a class="gumb" href="registracija.php">Registracija</a>
    </nav>
</header>
<main>
<content>
<section>
<?php
session_start();
include 'connect.php';
$uspjesnaPrijava = false;

// Provjera da li je korisnik došao s login forme
if (isset($_POST['submit'])) {
    echo "hej";
// Provjera da li korisnik postoji u bazi uz zaštitu od SQL injectiona
$prijavaImeKorisnika = $_POST['korisnik'];
$prijavaLozinkaKorisnika = $_POST['lozinka'];
$sql = "SELECT korisnik, lozinka, dozvola FROM korisnici WHERE korisnik = ?";
$stmt = mysqli_stmt_init($dbc);
if (mysqli_stmt_prepare($stmt, $sql)) {
mysqli_stmt_bind_param($stmt, 's', $prijavaImeKorisnika);
mysqli_stmt_execute($stmt);
mysqli_stmt_store_result($stmt);
}
mysqli_stmt_bind_result($stmt, $imeKorisnika, $lozinkaKorisnika,
$levelKorisnika);
mysqli_stmt_fetch($stmt);
//Provjera lozinke
echo "hej";
if (password_verify($_POST['lozinka'], $lozinkaKorisnika) &&
mysqli_stmt_num_rows($stmt) > 0) {
    echo "hej";
$uspjesnaPrijava = true;

// Provjera da li je admin
if($levelKorisnika == 1) {
$admin = true;
}
else {
$admin = false;
}
//postavljanje session varijabli
$_SESSION['$username'] = $imeKorisnika;
$_SESSION['$level'] = $levelKorisnika;
} else {
$uspjesnaPrijava = false;
}
}
// Brisanje i promijena arhiviranosti


// Pokaži stranicu ukoliko je korisnik uspješno prijavljen i administrator je
if (($uspjesnaPrijava == true && $admin == true) ||
(isset($_SESSION['$username'])) && $_SESSION['$level'] == 1) {
echo '<br>Pozdrav admine.<br><br>';

    echo '<form name="unos" action="skripta.php" method="POST" enctype="multipart/form-data">
        
        <br>
        <label for="naslov" style="font-family:verdana">Naslov:</label>
        <input type="text" id="naslov" name="naslov" placeholder="naslov">
        <br><span id="greska1" class="error"></span>
        <br>
        <br>
       
        Sažetak:<br/>
        <textarea name="podnaslov" id="podnaslov" cols = "25" rows = "5" wrap="on"></textarea>
        <br><span id="greska2" class="error"></span>
        <br>
        <br>
        Vijest:<br/>
        <textarea name="tekst" id="tekst" cols = "25" rows = "5" wrap="on"></textarea>
        <br><span id="greska3" class="error"></span>
        <br>
        <br>
        Kategorija:
        <select name="kategorija" id="kategorija" style="font-family:verdana">
        <option value = "Odaberi" > -odaberi-</option>    
        <option value = "Knjiga" > Knjiga</option>
            <option value = "Serija" > Serija</option>
            <option value = "Strip" > Strip</option>
        </select>
        <br><span id="greska5" class="error"></span>
        <br>
        <br>
        Fotografija: 
        <input type="file" name="slika" id="slika" accept="image/png, image/jpeg"  />
        <br><span id="greska4" class="error"></span>
        <br>
        <br>
        Prikazati vijest:
        <input type="checkbox" name="prikaz" id="prikaz"> <label for="prikaz">Da</label>

        <br>
        <br>
        <input type="reset" id="reset" value="Poništi"/>

<input type="submit" id="submit" value="Pošalji"/>
    </form>';
// Pokaži poruku da je korisnik uspješno prijavljen, ali nije administrator
} else if ($uspjesnaPrijava == true && $admin == false) {
echo '<br><br><p>Bok ' . $imeKorisnika . '! Uspješno ste prijavljeni, ali
niste administrator.</p>';
} else if (isset($_SESSION['$username']) && $_SESSION['$level'] == 0) {

echo '<br><br><p>Bok ' . $_SESSION['$username'] . '! Uspješno ste
prijavljeni, ali niste administrator.</p>';
} else if ($uspjesnaPrijava == false) {
echo "<br>Neuspješna prijava.";
}
?>

    
    <br>
    <br>





</section></content>
</main>
 

<footer>
<div id="white"> <p>Lejla Vuran - lvuran@tvz.hr - 2024.</p></div>
<div id="gray"><p>disclamer: tekstovi su stari preko godinu dana</p></div>
</footer>

<script type="text/javascript" >
        document.getElementById("submit").onclick = function(event) {
            console.log(1);
            var slanje = true;

           

            var naslovtext = document.getElementById("naslov");
            var naslov = document.getElementById("naslov").value;
            var podnaslovtext = document.getElementById("podnaslov");
            var podnaslov = document.getElementById("podnaslov").value;
            var teksttext = document.getElementById("tekst");
            var tekst = document.getElementById("tekst").value;
            var slikatext = document.getElementById("slika");
            var slika = document.getElementById("slika").value;
            var kategorijatext = document.getElementById("kategorija");
            //kategorija
            //slika
           
            if (naslov.length < 5 || naslov.length > 30) {
                slanje = false;
                naslovtext.style.border = "1px solid red";
                document.getElementById("greska1").innerHTML = "Naslov mora biti između 5 i 30 znakova.";
            }
            else{
                naslovtext.style.border = "1px solid black";
                document.getElementById("greska1").innerHTML = "";
            }
            if(podnaslov.length < 10 || podnaslov.length > 100)
            {
                slanje = false;
                podnaslovtext.style.border = "1px solid red";
                document.getElementById("greska2").innerHTML = "Podnaslov mora biti između 10 i 100 znakova.";
            }
            else{
                podnaslovtext.style.border = "1px solid black";
                document.getElementById("greska2").innerHTML = "";
            }
            if(tekst == '')
                {
                    slanje = false;
                teksttext.style.border = "1px solid red";
                document.getElementById("greska3").innerHTML = "Tekst ne smije biti prazan";
           
                }
                else{
                    teksttext.style.border = "1px solid black";
                    document.getElementById("greska3").innerHTML = "";
                }
            if(slika.length == 0)
                {
                    slanje = false;
                slikatext.style.border = "1px solid red";
                document.getElementById("greska4").innerHTML = "Slika mora biti odabrana.";
           
                }
                else{
                    slikatext.style.border = "1px solid black";
                    document.getElementById("greska4").innerHTML = "";
                }
            if(document.getElementById("kategorija").selectedIndex == 0)
                {
                    slanje = false;
                kategorijatext.style.border = "1px solid red";
                document.getElementById("greska5").innerHTML = "Kategorija mora biti odabrana.";
           
                }
                else{
                    kategorijatext.style.border = "1px solid black";
                    document.getElementById("greska5").innerHTML = "";
                }
            if (slanje != true) {
                event.preventDefault();
            }
           
        }
    </script>





</body>
</html>



