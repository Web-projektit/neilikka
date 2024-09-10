<?php
if (isset($_GET['painike'])) {
$tietokanta = "sakila";
include 'debuggeri.php';
include 'tietokantarutiinit.php';
register_shutdown_function('debuggeri_shutdown');
$hakuavain = $_GET['hakuavain'];
$hakuavain = $yhteys->real_escape_string(strip_tags($hakuavain));
$query = "SELECT * FROM film WHERE title LIKE '$hakuavain%'";
$result = mysqli_my_query($query);
if ($result->num_rows > 0) {
   while($row = $result->fetch_assoc()) {
      foreach ($row as $key => $value) {
         echo "$key: $value<br>";
         }
      }
    } 
else {
   echo "Ei tuloksia";
 }
}
?>
<DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Sakila-haku</title>
</head>
<body>
<h1>Sakila-haku</h1>
<form>
   <label for="hakuavain">Hakusana:</label>
   <input type="text" name="hakuavain" id="hakuavain">
   <input type="submit" name="painike" value="Hae">
</form>
