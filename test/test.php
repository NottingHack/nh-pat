<?php
/**
 * Created by PhpStorm.
 * User: Alex
 * Date: 26/05/2018
 * Time: 05:56
 */

session_start();

$insert = "INSERT INTO tests (asset_id, user_id, datetime, inspection, insulation, earth, pass, note) VALUES ('";
$db_name = 'nhpat';
$db_user = 'nhpatdb';
$db_pass = 'nottinghack';
$db_server = 'localhost';

if ($_POST['asset_id']=="") {
    die("No Asset ID");
}
else {
    $insert = $insert . $_POST['asset_id'] . "', '";
}

$insert = $insert . $_SESSION['user_id'] . "', '";

$insert = $insert . date('Y-m-d H:i:s') . "', '";

if ($_POST['passed_inspection']=="") {
    $insert = $insert . "0', '";
}
else {
    $insert = $insert . "1', '";
}

if ($_POST['insulation_resistance']=="") {
    die("No Insulation Resistance");
}
else {
    $insert = $insert . $_POST['insulation_resistance'] . "', '";
}

if ($_POST['earth_bond']=="") {
    die("No Earth Bond");
}
else {
    $insert = $insert . $_POST['earth_bond'] . "', '";
}

if ($_POST['pass']=="") {
    $insert = $insert . "0', '";
}
else {
    $insert = $insert . "1', '";
}

if ($_POST['note']=="") {
    $insert = $insert . "";
}
else {
    $insert = $insert . $_POST['note'];
}

$insert = $insert . "'); ";

$conn = new mysqli($db_server, $db_user, $db_pass, $db_name);
$cmd = $insert;
$conn -> query($cmd);
echo "Success";