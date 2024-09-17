<?php
$palvelin = "localhost";
$kayttaja = "root";  // tämä on tietokannan käyttäjä, ei tekemäsi järjestelmän
$salasana = "jukka1";
$tietokanta = $tietokanta ?? "autodb"; // (isset($tietokanta)) ? $tietokanta : "autodb";
$yhteys = new mysqli($palvelin, $kayttaja, $salasana, $tietokanta);
if ($yhteys->connect_error) {
   die("Yhteyden muodostaminen epäonnistui: " . $yhteys->connect_error);
   }
// echo "Yhteys muodostettu onnistuneesti!<br>";   
$yhteys->set_charset("utf8");

function mysqli_my_query($query) {
   $yhteys = $GLOBALS['yhteys']; 
   $result = false;
   try {
      $result = $yhteys->query($query); 
      } 
   catch (Exception $e) {
      echo "<p class='alert alert-danger'>Virhe tietokantakyselyssä.</p>";
      debuggeri("Virhe $yhteys->errno kyselyssa $query: " . $e->getMessage());
      }
    return $result;
    }

    
?>