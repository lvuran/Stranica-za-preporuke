
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registracija</title>
    <meta name="author" content="Lejla Vuran"/>
        <meta name="description" content="Registracija stranice za projekt"/>
        <link rel = "stylesheet" type="text/css" href = "style.css"/>
       
</head>
<body>
    <header>
    <hr>
    <div id="logo"><img src="images/hand.png"  style="height: 50px;"></div>
    <nav>
        <a class="gumb" href="index.php">Početna</a>
        <a class="gumb"  href="kategorija.php?id=knjiga">Knjiga</a>
        <a class="gumb"  href="kategorija.php?id=serija">Serija</a>
        <a class="gumb"  href="kategorija.php?id=Strip">Strip</a>
        <a class="gumb" href="administrator.php">ADMINISTRACIJA</a>
        <a class="gumb" href="unos.php">UNOS</a>
        <a class="gumb" href="registracija.php">Registracija</a>
    </nav>
</header>
<main>
    <content>
<section>



    <form action="reg.php" method="POST" >
        
        <br>
        <label for="ime" style="font-family:verdana">Ime:</label><br>
        <input type="text" id="ime" name="ime" placeholder="Ime">
        <br><span id="greska1" class="error"></span>
        <br>
        <br>
       
        Prezime:<br/>
        <input type="text" id="prezime" name="prezime" placeholder="Prezime">
        <br><span id="greska2" class="error"></span>
        <br>
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
        Ponovi lozinku:<br/>
        <input type="password" id="ponovljeno" name="ponovljeno" autocomplete="new-password">
        <br><span id="greska5" class="error"></span>
        <br>
        <input type="reset" id="reset" value="Poništi"/>
        
<input type="submit" id="submit" value="Pošalji"/>
    </form>
    
    <br>
    <br>





</section></content>
</main>
 

<footer>
<div id="white"> <p>Lejla Vuran - lvuran@tvz.hr - 2024.</p></div>
<div id="gray"><p>disclamer: tekstovi su stari preko godinu dana</p></div>
</footer>
</body>
</html>

<script type="text/javascript" >
        document.getElementById("submit").onclick = function(event) {
           
            var slanje = true;

            var imetext = document.getElementById("ime");
            var ime = document.getElementById("ime").value;
            var prezimetext = document.getElementById("prezime");
            var prezime = document.getElementById("prezime").value;
            var korisniktext = document.getElementById("korisnik");
            var korisnik = document.getElementById("korisnik").value;
            var lozinkatext = document.getElementById("lozinka");
            var lozinka = document.getElementById("lozinka").value;
            var ponovljenotext = document.getElementById("ponovljeno");
            var ponovljeno = document.getElementById("ponovljeno").value;
         
           
            if (ime == '') {
                slanje = false;
                imetext.style.border = "1px solid red";
                document.getElementById("greska1").innerHTML = "Ime mora biti uneseno";
            }
            else{
                imetext.style.border = "1px solid black";
                document.getElementById("greska1").innerHTML = "";
            }
            if(prezime == '')
            {
                slanje = false;
                prezimetext.style.border = "1px solid red";
                document.getElementById("greska2").innerHTML = "Prezime mora biti uneseno";
            }
            else{
                prezimetext.style.border = "1px solid black";
                document.getElementById("greska2").innerHTML = "";
            }
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
            if(lozinka.length < 8)
                {
                    slanje = false;
                lozinkatext.style.border = "1px solid red";
                document.getElementById("greska4").innerHTML = "Lozinka mora imati barem 8 znakova";
           
                }
                else{
                    lozinkatext.style.border = "1px solid black";
                    document.getElementById("greska4").innerHTML = "";
                }
                if(ponovljeno == '')
                {
                    slanje = false;
                ponovljenotext.style.border = "1px solid red";
                document.getElementById("greska5").innerHTML = "Ponovite lozinku";
           
                }
                else{
                    if(ponovljeno != lozinka)
                {
                    slanje = false;
                ponovljenotext.style.border = "1px solid red";
                document.getElementById("greska5").innerHTML = "Lozinke se ne poklapaju";
           
                }
                else{

                    lozinkatext.style.border = "1px solid black";
                    document.getElementById("greska5").innerHTML = "";
                }}
            if (slanje != true) {
                event.preventDefault();
            }
           
        }
    </script>





</body>
</html>

