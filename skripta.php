




<?php
include 'connect.php';
$picture = $_FILES['slika']['name'];
$title=$_POST['naslov'];
$about=$_POST['podnaslov'];
$content=$_POST['tekst'];
$category=$_POST['kategorija'];
if(isset($_POST['prikaz'])){
$prikaz=1;
}else{
$prikaz=0;
}
$target_dir = 'images/'.$picture;
move_uploaded_file($_FILES["slika"]["tmp_name"], $target_dir);
$query = "INSERT INTO vijesti (naslov, podnaslov, tekst, kategorija, prikaz, slika) VALUES ('$title', '$about', '$content',
'$category', '$prikaz', '$picture')";
$result = mysqli_query($dbc, $query) or die('Error querying databese.');
mysqli_close($dbc);
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Clanak</title>
    <meta name="author" content="Lejla Vuran"/>
        <meta name="description" content="Naslovnica stranice za projekt - Seminarski rad"/>
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
<h1><?php echo $_POST['naslov'] ?></h1>
<img class="slika2" src="images/<?php echo $_FILES['slika']['name'] ?>">
<h3><?php echo $_POST['podnaslov'] ?></h3>
<P><?php echo $_POST['tekst'] ?></P>
</section></content>
</main>
 

<footer>
<div id="white"> <p>Lejla Vuran - lvuran@tvz.hr - 2024.</p></div>
<div id="gray"><p>disclamer: tekstovi su stari preko godinu dana</p></div>
</footer>
</body>
</html>