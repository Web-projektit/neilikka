<?php
include 'debuggeri.php';

$palvelin = "localhost";
$kayttaja = "root";  // tämä on tietokannan käyttäjä, ei tekemäsi järjestelmän
$salasana = "jukka1";
$tietokanta = "autodb";
register_shutdown_function('debuggeri_shutdown');

   
// luo yhteys
$yhteys = new mysqli($palvelin, $kayttaja, $salasana, $tietokanta);

// jos yhteyden muodostaminen ei onnistunut, keskeytä
if ($yhteys->connect_error) {
   die("Yhteyden muodostaminen epäonnistui: " . $yhteys->connect_error);
}
// aseta merkistökoodaus (muuten ääkköset sekoavat)
$yhteys->set_charset("utf8");
echo "Yhteys muodostettu onnistuneesti!";

$query = "SELECT * FROM henkilo";
$result = $yhteys->query($query);
// jos tulosrivejä löytyi
if ($result->num_rows > 0) {
   // hae joka silmukan kierroksella uusi rivi
   while($row = $result->fetch_assoc()) {
      // taulukon avaimet (hakasuluissa olevat nimet) ovat TIETOKANNAN KENTTIÄ (sarakkeita)
      foreach ($row as $key => $value) {
         debuggeri($row);
         echo "$key: $value<br>";
         }
   }
} else {
   echo "Ei tuloksia";
}

if (isset($_POST["kokonimi"])) {
   $nimi = $yhteys->real_escape_string(strip_tags($_POST["kokonimi"]));
   }
else {
   $nimi = "Matti Meikäläinen";
   }

   $query = "INSERT INTO henkilo (nimi) VALUES ('$nimi')";
   $result = $yhteys->query($query);
   if ($result === TRUE) {
      echo "Henkilö lisätty.";
   } else {
      echo "Virhe: " . $query . "<br>" . $conn->error;
   }

$query = "INSERT INTO auto (rekisterinro, merkki, vari, omistaja) VALUES ('CES-267', 'Volvo', 'sininen','281182-070W')";
$result = $yhteys->query($query);
if ($result === TRUE) {
   echo "Auto lisätty.";
   } 
else {
   echo "Virhe: " . $query . "<br>" . $conn->error;
   }
?>