<?php
include 'debuggeri.php';
include 'tietokantarutiinit.php';
register_shutdown_function('debuggeri_shutdown');

$query = "SELECT count(*) FROM auto";
$result = $yhteys->query($query);
[$count] = $result->fetch_row();
echo "Autoja on $count kpl<br>";

$query = "SELECT * FROM henkilo";
$result = $yhteys->query($query);
// jos tulosrivejä löytyi
if ($result->num_rows > 0) {
   // hae joka silmukan kierroksella uusi rivi
   while($row = $result->fetch_assoc()) {
      // taulukon avaimet (hakasuluissa olevat nimet) ovat TIETOKANNAN KENTTIÄ (sarakkeita)
      foreach ($row as $key => $value) {
         // debuggeri($row);
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

/*   $query = "INSERT INTO henkilo (nimi) VALUES ('$nimi')";
   $result = $yhteys->query($query);
   if ($result === TRUE) {
      echo "Henkilö lisätty.";
   } else {
      echo "Virhe: " . $query . "<br>" . $conn->error;
   }*/

$query = "INSERT INTO auto (rekisterinro, merkki, vari, omistaja) VALUES ('CES-267', 'Volvo', 'sininen','281182-070W')";
$result = mysqli_my_query($query);
if ($yhteys->affected_rows > 0){
   echo "<p class='alert alert-success'>Lisäys onnistui.</p>";
   }
else {
   echo "<p class='alert alert-danger'>Lisäystä ei tehty.</p>";
   }

$henkilo = "Autoilija";
$query = "DELETE FROM henkilo WHERE nimi LIKE '%$henkilo'";
$result = mysqli_my_query($query);
if ($yhteys->affected_rows > 0){
      echo "<p class='alert alert-success'>Henkilö $henkilo on poistettu.</p>";
      }
   else {
      echo "<p class='alert alert-danger'>Henkilöä $henkilo ei poistettu.</p>";
      }

   $query = "INSERT INTO sakko (henkilo,auto,pvm,summa,syy) SELECT hetu,rekisterinro,CURDATE(),160,'Ylinopeus' 
      FROM henkilo LEFT JOIN auto ON omistaja = hetu WHERE nimi = 'Jaana Autoilija'";    
   $result = mysqli_my_query($query);
   if ($yhteys->affected_rows > 0){
      echo "<p class='alert alert-success'>Sakko lisätty.</p>";
      }
   else {
      echo "<p class='alert alert-danger'>Sakkoa ei lisätty.</p>";
      }     

?>