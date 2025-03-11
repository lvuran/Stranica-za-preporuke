-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 13, 2024 at 09:40 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `seminarski`
--

-- --------------------------------------------------------

--
-- Table structure for table `korisnici`
--

CREATE TABLE `korisnici` (
  `id` int(11) NOT NULL,
  `korisnik` varchar(32) NOT NULL,
  `lozinka` varchar(255) NOT NULL,
  `dozvola` int(1) NOT NULL,
  `ime` varchar(32) NOT NULL,
  `prezime` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `korisnici`
--

INSERT INTO `korisnici` (`id`, `korisnik`, `lozinka`, `dozvola`, `ime`, `prezime`) VALUES
(1, 'lejla_', '$2y$10$8Tse7w9RCSm9lYkPnXaZSeRKNXIiQcRl3zS7b.IB2V9JzwFrA5nLC', 1, 'Lejla', 'Vuran'),
(23, 'korisnik1', '$2y$10$2vkA34yqAFt0qktXBlapVOXtqrzhRX6TWmrNztgHAOlTYMLwciJbK', 0, 'Korisnik', 'Prezime');

-- --------------------------------------------------------

--
-- Table structure for table `vijesti`
--

CREATE TABLE `vijesti` (
  `id` int(11) NOT NULL,
  `naslov` varchar(64) NOT NULL,
  `podnaslov` varchar(500) NOT NULL,
  `tekst` varchar(5000) NOT NULL,
  `kategorija` varchar(25) NOT NULL,
  `prikaz` tinyint(1) NOT NULL,
  `slika` varchar(120) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `vijesti`
--

INSERT INTO `vijesti` (`id`, `naslov`, `podnaslov`, `tekst`, `kategorija`, `prikaz`, `slika`) VALUES
(15, 'Vodič kroz galaksiju za autostopere', 'Vodič je jedna od onih knjiga za koje sam čula nekoliko puta pa sam i posudila. Očekivala sam svašta, ali OVO NISAM.', ' Vodič kroz galaksiju nam donosi priču u kojoj Arthur Dent (zemljanin) i njegov prijatelj Ford Prefekt (vanzemaljac) napuštaju Zemlju (koja potom biva uništena) i odlaze na putovanje galaksijom koju ne vežu zemaljski znanstveni zakoni i zakoni fizike, apsolutno sve je moguće (ako autor tako kaže, a sva ta znanost je objašnjena na neki poseban način da uopće ni ne pomisliš sumnjati u nju .). Knjiga je za mene doista bila iskustvo. Požeta je točno tim nekim nivojem ludosti taman toliko da bude smiješno, ali ne i naporno. Prije ovoga se ne sjećam kad sam se zadnji put toliko ismijala uz knjigu ???? ', 'Knjiga', 1, 'Vodic_kroz_galaksiju_za_autostopere.jpg'),
(16, 'Damin gambit', 'Damin gambit je za mene knjiga 2021. godine.', ' Priča prati Elizabeth Harmon na putu od sirotišta do vrha svjetske šahovske ljestvice. Na tom putu suočava se sa mnoštvom rivala te pokušava balansirati između igre i natjecanja, životnih problema i ovisnosti koja ju prati još od sirotišta. Walter Tevis izvrsno prenosi atmosferu šahovskih turnira što me očaralo budući da sam svojedobno i sama sudjelovala na nekima (doduše na lokalnoj školskoj razini). Ovaj roman je 2020. dobio i izvrsnu adaptaciju u mini-seriju koja tek neznatno odstupa od izvornog materijala, a vizualima donosi atmosferu i autentičnost koja priču možda čini pristupačnijom i publici koja nema iskustva u igri.', 'Knjiga', 1, 'damin_gambit.jpg'),
(17, 'Dina', 'Dina je jedna od onih knjiga koje sam dugo odlagala samo zbog broja stranica.', 'Došla bih u knjižnicu, knjiga bi bila dostupna I na polici, možda bih ju nekad I uzela u ruku, samo da bih vidjela broj stranica ~600 I odustala bih. Nisam bila spremna na preko 2 tjedna kontinuiranog citanja Koliko bi mi trebalo ako bih se držala rasporeda. Ali došlo je ljeto 2022, prošle su mature I knjigu sam posudila. POZITIVNO SAM SE IZNENADILA. Uvijek sam skeptična kad čitam klasike žanra, jer oni su bili prvi, postavili su temelje, prvi su u nizu takvih djela. To znači da se nisu imali s kime usporediti i ugledati pa ni učiti od drugih. Kad se to sve zbroji uglavnom dolazimo do zaključka da je u neku ruku ~loše, odnosno ne ispunjava krtiterije koje su postavili autori koji su došli Ali tu je ostalo samo pitanje: Ako su ovo početci, Što se dogodilo Sfu? Osjeti se Koliko posla je autor uložio u pisanje i stvaranje kultura ovog serijala. Sigurna sam da je imao opsežno istraživanje različitih zemaljskih kultura, jezika i ZNANOSTI, religijama, ideologijama i sve to je vrlo vješto isprepleo u fikciju. Svijet Slobodnjaka zna se do zadnjeg detalja, odvojeno je vrijeme da se čak i sitnice objasne (za razliku od nekih drugih sf romana koji se ne potrude objasniti niti najvažnije stvari svoga svemira, očekuje se da pređem preko svega jer je likovima to “normalno”) . Likovi mi jesu bili ukočeni, previše ovisni o svojim dodjeljenim ulogama, ali oduševljenje kompleksnošću svijeta i dalje prevladava. Moja najveća zamjerka su nenaznačeni timeskipovi od po nekoliko godina. Na jednoj stranici se likovi tek upoznaju, na drugoj vec imaju dijete. Na jednoj stranici se pripremamo za bitku na drugoj vec izlazemo sankcije poraženima. Kriterij je: I want science in my science fiction i Dina ga je svakako ispunila. ', 'Knjiga', 1, 'dina.jpg'),
(18, 'Sedam muževa Evelyn Hugo', 'Oh Sedam muževa Evelyn Hugo. Uživala sam.', 'Evelyn Hugo diva je filmova zlatnog doba Hollywooda. Ova knjiga donosi priču njenog života, od kada je napustila dom da bi se bavila glumom, njenog uspona na ljestvici, preko intriga I spletki hollywoodskog života (od kojih je najpoznatija činjenica da je imala čak sedam muževa), te neizbježnog pada, sve do trenutka kad se povukla iz očiju javnosti. Iako je ova knjiga djelo fikcije, cijelo vrijeme imala sam osjećaj da čitam biografiju stvarne osobe što me oduševilo! Nisam ju željela ispustiti iz ruku! Ova knjiga se dodiče brojnih aktualnih društvenih problema i jako mi je drago što je postala toliko popularna na društvenim mrežama i što ju je toliko ljudi pročitalo. ', 'Knjiga', 1, 'sedam_muzeva.jpg'),
(19, 'Move to Heaven', 'Emotivna serijama koja će vas dirnuti svojom dubinom i načinom iznošenja emocija i ostaviti vas oduševljenima načinom na koji se odnosi prema životu i smrti. ', 'Priča prati tvrtku Move to Heaven, tim koji se bavi skupljanjem stvari koje su ostale iza preminule osobe i traženjem bliskih ljudi preminule osobe pa samim time i otkrivanja tajni preminuloga. Sve stvari se skupljaju u žute kutije koje onda svaka za sebe priča priču koja bez problema dopre do gledatelja izazivajući nagle emocionalne reakcije. Serija dotiče teme prijateljstva, ljubavi, životnog partnerstva i obitelji na posebnim razinama. Svaka se epizoda posvećuje jednom lika, što svakom životu daje jednaku vrijednost.', 'Serija', 1, 'move_to_heaven.png'),
(20, 'Uncanny Counter', 'Još jedna uzbudljiva znastveno-fantastična korejska drama, koja prati trend korejskih serija da ostave veliki dojam na gledateljima odličnim scenarijem, vizualnim efektima i glumačkim performasima. ', ' Glavni lik je srednjoškolac koji je bio jedini preživjeli u prometnoj nesreći u kojoj su poginuli njegovi roditelji. Živi normalnim životom sve dok ne upozna Countere, grupu neljudski snažnih ljudi koji se zajedno bore protiv zlih duhove koje opsjedaju osobe grešne prirode. Serija je prožeta humorom, temama prijateljstva, osvete i neočekivanih preokreta koji zadržavaju gledateljevu pozornost od prve do zadnje epizode.', 'Serija', 1, 'uncanny_counter.png'),
(21, 'Flower of evil', 'Flower of evil je serija koja bez problema zasjedne na prvo mjesto pogledanih serija. ', 'Ova korejska drama koja prikazuje kako izgleda život Baek Hee Sunga, sina serijskog ubojice koji je, iako ne osjećajući emocije, sagradio naizgled savršenu obitelj, suprugu detektivku Cha Ji Won i kćerkicu Baek Eun Ha, o kakvoj mnogi sanjaju. Scenarij je zaista zanimljivo napisan, sadržava jako puno neočekivanih preokreta u životu svih likova čije su emocije glumci izvrsno prenijeli. Preporučam nekoliko ubrusa tijekom gledanja jer sjajno napisane i odglumljene scene pršte emocijama sve od tuge, razočarenja i sažaljenja do smijanja od uha do uha kada se dogode romantični dijelovi koji ovoj drami daju poseban značaj. Uzimajući već sve navedeno i dodajući odličnu glazbu i paletu boja, koja ovu seriju čini uvjerljivijom, u obzir, ova se serija definitivno može nazvati pravim umjetničkim djelom.', 'Serija', 1, 'flower_of_evil.png'),
(22, 'Arcane', 'Arcane je prva animirana serija koja svoju radnju smješta u svemir planetarno popularne igre League of legends. No, to ne znači da je namjenjena isključivo vjernim fanovima I igračima. Seriju se može pogledati I bez ikakvog predznanja o LoLu.', 'Piltower I Zaun su dvije sredine koje se nalaze bok uz bok. Ali dok u Piltoweru ljudi žive u blagostanju I potiču se mladi umovi, u Zaunu vlada zakon jačega, a ljudi se od malih nogu svakodnevno bore da bi preživjeli. Sestre Vi I Jinx dobro su upoznate sa situacijom I drže se skupa, sve dok ih splet nesretnih okolnosti I niz pogrešaka ne razdvoji, a one se za par godina nađu na suprotnim stranama u sukobu Piltowera I Zauna. Osim Vi I Jinx, serija predstavlja čitav spektar šarolikih kvalitetno okarakteriziranih likova I na vidjelo iznosi mnoge društvene probleme. Osim likova I radnje, seriju se isplati pogledati čak I samo radi vizuala. Ovakav stil 3D animacije pomješan sa 2D elementima, širokom paletom boja, detaljnim prikazom I likova I pozadina jednostavno oduzima dah. ', 'Serija', 1, 'arcane.png'),
(28, 'Maus: preživjeli priča', 'Jedan od (trenutno) dva stripa koji su osvojili Pulitzerovu nagradu za književnost', '„Maus je priča o Vladeku Spiegelmanu, Židovu koji je preživio Hitlerovu Europu, i njegovom sinu, crtaču stripova koji pokušava shvatiti oca, njegovu strašnu priču i samu Povijest. Između Poljske i njujorškog Rego Parka, Maus donosi dvije snažne priče: prva je o tome kako su Spiegelmanov otac i majka preživjeli u Hitlerovoj Europi, što je mučan opis pun bezbrojnih bliskih susreta sa smrću, nevjerojatnih bjegova i straha od zatvaranja i izdaje. Druga je autorov složen odnos s ostarjelim ocem dok nastoje voditi normalan život pun sitnih svađa i kratkotrajnih posjeta na podlozi osobnih povijesti koje je teško izmiriti - i o djeci koja preživljavaju čak i preživjele.“ ', 'Strip', 1, 'maus.jpg'),
(29, 'Batman: Bijeli vitez', 'Bijeli vitez jedan je od velikog broja autonomnih serijala smještenih u Gothamu.', 'Bijeli vitez je jedan od velikog broja autonomnih serijala smještenih u Gothamu. Svaki od njih donosi svoju verziju grada, heroja, zlikovaca I jako rijetko se događa da se lik koji igra određenu ulogu poklapa sa likom koji igra tu istu ulogu u nekoj drugoj serilizaciji. Ono što želim reći je da Batman iz ovog stripa I Batman iz “Duge noći vještica” nisu isti lik, isto vrijedi I za Jokera I za Harley Quinn I za Nightwinga. Die hard fanovi Batmana uglavnom odbacuju ovu priču kao alternativni svemir, što zapravo I je točno. Ali! Ako ovu priču gledamo samostalno, zapravo je izvrsna. U ovoj verziji Jocker dijeli tijelo sa Jackom Napierom, imao je kontrolu neko vrijeme tako da je grad upoznat sa Jokerom, ali sada je Napier povratio kontrolu I kandidirao se za vjećnika Gothama. U kampanji tvrdi kako će očistiti grad od zlikovaca, navodeći I žestoko kritizirajući Batmana kao najvećeg neprijatelja grada. Ova intrigantna priča prikazuje da Batman I Joker nisu toliko različiti. Istančano tuširanje I zagasite boje crteža samo doprinose atmosferi priče, a za tako mali broj stranica likovi su izvrsno napisani, te svaki ima vlastiti “tonalitet”. ', 'Strip', 1, 'bijeli_vitez.jpg'),
(30, 'Fullmetal Alchemist', 'Moj najdraži strip i to s razlogom <3', 'Fullmetal Alchemist donosi priču o dva brata alkemičara. Nakon što im je još dok su bili djeca majka preminula, očajnički su ju pokušali oživjeti počinivši time najveći tabuu alkemije. Iako majku nisu oživjeli, jedan je platio cijenu cijelim tijelom, a drugi rukom. Vidjevši da mu nema brata mijenjao je i potkoljenicu kako bi mogao bratovu dušu vezati za prazan oklop. Od tada se trude pronaći način kako da vrate djelove koje su izgubili. Da bi si olakšali potragu jedan se priključio vojsci u kojoj služi kao državni alkemičar. Na svome putu ubrzo otkrivaju i veliku zavjeru koja bi mogla uništiti živote ljudi u cijeloj državi. Fullmetal alchemist je primjer stripa u kojemu crteži odlično odgovaraju tematici i ugođaju priče. Osim toga priča je napisana planski i ima odličan set likova, a svijet u kojem se odvija je također izvrsno razrađen. <3', 'Strip', 1, 'fullmetal_alchemist.jpg'),
(38, 'Y - Posljednji muškarac', 'Y - the last man', 'Vijest', 'Strip', 1, 'ylastman.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `korisnici`
--
ALTER TABLE `korisnici`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `korisnik` (`korisnik`);

--
-- Indexes for table `vijesti`
--
ALTER TABLE `vijesti`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `korisnici`
--
ALTER TABLE `korisnici`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `vijesti`
--
ALTER TABLE `vijesti`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
