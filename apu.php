<?php
$pakolliset = array("title", "author", "isbn", "price", "year", "publisher");
$title = $_POST["title"] ?? "";
$kentta = "title";
$arvo = $title;
if (in_array($kentta, $pakolliset) and empty($title)) {
    $errors[$kentta] = "Nimi puuttuu";
    }
else {
    if (isset($patterns[$kentta]) and !preg_match($patterns[$kentta], $arvo)) {
        $errors[$kentta] = "Nimi ei kelpaa";
        }
    else {
        $title = $yhteys->real_escape_string(strip_tags(trim($arvo)));
        } 
    }

$kentta = "description";
$arvo = $description;
if (in_array($kentta, $pakolliset) and empty($title)) {
    $errors[$kentta] = "Nimi puuttuu";
    }
else {
    if (isset($patterns[$kentta]) and !preg_match($patterns[$kentta], $arvo)) {
        $errors[$kentta] = "Nimi ei kelpaa";
        }
    else {
        $description = $yhteys->real_escape_string(strip_tags(trim($arvo)));
        } 
    }



?>