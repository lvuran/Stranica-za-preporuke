<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kategorija</title>
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
include 'connect.php';
define('UPLPATH', 'img/');


if (isset($_GET['id'])) {

$category = $_GET['id'];
}

echo "<h2>$category</h2>";
$query = "SELECT * FROM vijesti WHERE prikaz=1 AND kategorija='$category' ORDER BY id DESC";



$result = mysqli_query($dbc, $query);
$i=0;
while($row = mysqli_fetch_array($result)) {
echo '<article>';

echo '<a href="clanak.php?id='.$row['id'].'"><img  class="slika" src=images/'. $row['slika'].'><br>';
echo '<br><h4 class="naslov">';
echo $row['naslov'];
echo '</h4>';
echo '<p class="podnaslov">';
echo $row['podnaslov'];
echo '</p></a>';
echo '</article>';
}?>


</section>
</content>
</main>
 

<footer>
<div id="white"> <p>Lejla Vuran - lvuran@tvz.hr - 2024.</p></div>
<div id="gray"><p>disclamer: tekstovi su stari preko godinu dana</p></div>
</footer>
</body>
</html>