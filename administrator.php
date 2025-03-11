<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
    <meta name="author" content="Lejla Vuran"/>
        <meta name="description" content="Naslovnica stranice za projekt"/>
        <link rel = "stylesheet" type="text/css" href = "style.css"/>
       
</head>
<body>
    <header>
    <hr>
    <div id="logo"><img src="images/hand.png"  style="height: 50px;"></div>
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
    <form  method="POST" >
        
        <br>
        Korisničko ime:<br/>
        <input type="text" id="korisnik" name="korisnik" placeholder="Korisnik">
        <br><span id="greska3" class="error"></span>
        <br>
        <br>
        Lozinka:<br/>
        <input type="password" id="lozinka" name="lozinka" autocomplete="new-password">
        <br><span id="greska4" class="error"></span>
        <br>
        <br>
       <input type="submit" id="odjava" name="odjava" value="Odjava"/>

        <input type="reset" id="reset" value="Poništi"/>

<input type="submit" id="submit" name="submit" value="Prijava"/>
    </form>
    <br>
    <br>


    <?php
session_start();
include 'connect.php';
$uspjesnaPrijava = false;

$prijavaImeKorisnika = '';
// Provjera da li je korisnik došao s login forme
if (isset($_POST['odjava'])) {

    $_SESSION['$username'] = '';
$_SESSION['$level'] = '';}
if (isset($_POST['submit'])) {
    echo "hej";
    $_SESSION['$username'] = '';
$_SESSION['$level'] = '';
$korisnikok = false;

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
if(mysqli_stmt_num_rows($stmt) > 0)
$korisnikok = true;
$lozinkaok = false;
if (password_verify($_POST['lozinka'], $lozinkaKorisnika) &&
mysqli_stmt_num_rows($stmt) > 0) {
  
    $lozinkaok = true;
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
    $query = "SELECT * FROM vijesti";
    $result = mysqli_query($dbc, $query);
    while($row = mysqli_fetch_array($result)) {
    echo '<hr><br><form enctype="multipart/form-data" action="" method="POST">
    <div class="form-item">
    <h3><label for="title">Naslov vjesti:</label></h3>
    <div class="form-field">
    <input type="text" name="title" class="form-field-textual"
    value="'.$row['naslov'].'">
    </div><br>
    </div>
    <div class="form-item">
    <label for="about">Kratki sadržaj vijesti (do 50
    znakova):</label>
    <div class="form-field">
    <textarea name="about" id="" cols="30" rows="10" class="form-
    field-textual">'.$row['podnaslov'].'</textarea>
    </div><br>
    </div>
    <div class="form-item">
    <label for="content">Sadržaj vijesti:</label>
    <div class="form-field">
    <textarea name="content" id="" cols="30" rows="10" class="form-field-textual">'.$row['tekst'].'</textarea>
    </div><br>
    </div>
    <div class="form-item">
    <label for="slika">Slika:</label>
    <div class="form-field">
    
    <input type="file" class="input-text" id="_slika" value="images/'.$row['slika'].'" name="slika"/><br>';
    echo '<img  class="slika" src=images/'. $row['slika'].' >';
    // pokraj gumba za odabir slike pojavljuje se umanjeni prikaz postojeće slike
    echo '</div><br>
    </div>
    <div class="form-item">
    <label for="category">Kategorija vijesti:</label>
    <div class="form-field">
    <select name="category" id="" class="form-field-textual"
    value="'.$row['kategorija'].'">
    <option value = "Knjiga" > Knjiga</option>
    <option value = "Serija" > Serija</option>
        <option value = "Strip" > Strip</option>
    </select>
    </div><br>
    </div>
    <div class="form-item">
    <label>Spremiti u arhivu:
    <div class="form-field">';
    if($row['prikaz'] == 1) {
    echo '<input type="checkbox" name="archive" id="archive"/>
    Arhiviraj?';
    } else {
    echo '<input type="checkbox" name="archive" id="archive"
    checked/> Arhiviraj?';
    }
    echo '</div>
    </label>
    </div><br>
    </div>
    <div class="form-item">
    <input type="hidden" name="id" class="form-field-textual"
    value="'.$row['id'].'"><br>
    <button type="reset" value="Poništi">Poništi</button>
    <button type="submit" name="update" value="Prihvati">
    Izmjeni</button>
    <button type="submit" name="delete" value="Izbriši">
    Izbriši</button>
    </div><br><br>
    </form>';}
// Pokaži poruku da je korisnik uspješno prijavljen, ali nije administrator
} else if ($uspjesnaPrijava == true && $admin == false) {
echo '<p>Bok ' . $imeKorisnika . '! Uspješno ste prijavljeni, ali
niste administrator.</p><br>';


} else if (isset($_SESSION['$username']) && $_SESSION['$level'] == 0) {

echo '<p>Bok ' . $_SESSION['$username'] . '! Uspješno ste
prijavljeni, ali niste administrator.</p><br>';

} else if ($prijavaImeKorisnika == '')
{echo "";}
else if ($uspjesnaPrijava == false) {
    if ( $korisnikok == true && $lozinkaok == false)
    {
        echo "<br>Pogrešna lozinka.<br><br>";
    }
    else
    echo "<br>Niste registrirani<br> <br><a style='font-weight: bold;'; href='registracija.php'>Registracija ></a><br><br>";
    }


?>


</section>






</section></content>
</main>
 


<script type="text/javascript" >
        document.getElementById("submit").onclick = function(event) {
           
            var slanje = true;

           
            var korisniktext = document.getElementById("korisnik");
            var korisnik = document.getElementById("korisnik").value;
            var lozinkatext = document.getElementById("lozinka");
            var lozinka = document.getElementById("lozinka").value;
           
            if(korisnik == '')
                {
                    slanje = false;
                korisniktext.style.border = "1px solid red";
                document.getElementById("greska3").innerHTML = "Korisničko ime mora biti uneseno.";
                
                }
                else{

                    korisniktext.style.border = "1px solid black";
                    document.getElementById("greska3").innerHTML = "";
                }
            if(lozinka == '')
                {
                    slanje = false;
                lozinkatext.style.border = "1px solid red";
                document.getElementById("greska4").innerHTML = "Lozinka mora biti unesena";
           
                }
                else{
                    lozinkatext.style.border = "1px solid black";
                    document.getElementById("greska4").innerHTML = "";
                }
                
            if (slanje != true) {
                event.preventDefault();
            }
           
        }
    </script>


</main>
 

<footer>
<div id="white"> <p>Lejla Vuran - lvuran@tvz.hr - 2024.</p></div>
<div id="gray"><p>disclamer: tekstovi su stari preko godinu dana</p></div>
</footer>
</body>
</html>

<?php
if(isset($_POST['delete'])){
$id=$_POST['id'];
$query = "DELETE FROM vijesti WHERE id=$id ";
$result = mysqli_query($dbc, $query);
}
if(isset($_POST['update'])){
    $picture = $_FILES['slika']['name'];
    $title=$_POST['title'];
    $about=$_POST['about'];
    $content=$_POST['content'];
    $category=$_POST['category'];
    if(isset($_POST['archive'])){
    $archive=0;
    }else{
    $archive=1;
    }
    $target_dir = 'images/'.$picture;
    move_uploaded_file($_FILES["slika"]["tmp_name"], $target_dir);
    $id=$_POST['id'];
    $query = "UPDATE vijesti SET naslov='$title', podnaslov='$about', tekst='$content',
    slika='$picture', kategorija='$category', prikaz='$archive' WHERE id=$id ";
    $result = mysqli_query($dbc, $query);
    }


?>