<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Clanak</title>
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
<section >
<?php
include 'connect.php';



if (isset($_GET['id'])) {

$id = $_GET['id'];
}


$query = "SELECT * FROM vijesti WHERE prikaz=1 AND id='$id'";

$result = mysqli_query($dbc, $query);


$result = mysqli_query($dbc, $query);



$row = mysqli_fetch_array($result) ;
echo "<h2 id = 'dva'>". $row['naslov']. "</h2><div id='clanak'>";
echo '<img class="slika2" src=images/'. $row['slika'].'><br><br>';
echo "<h3>". $row['podnaslov']. "</h3><br><br>";
echo "<P>". $row['tekst'] ."</P></div><br><br>";
?>
</section></content>
</main>
 

<footer>
<div id="white"> <p>Lejla Vuran - lvuran@tvz.hr - 2024.</p></div>
<div id="gray"><p>disclamer: tekstovi su stari preko godinu dana</p></div>
</footer>
</body>
</html>

