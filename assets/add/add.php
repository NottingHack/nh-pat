<?php
/**
 * Created by PhpStorm.
 * User: Alex
 * Date: 26/05/2018
 * Time: 05:56
 */

session_start();

$insert = "INSERT INTO assets VALUES ('";
$db_name = 'nhpat';
$db_user = 'nhpatdb';
$db_pass = 'nottinghack';
$db_server = 'localhost';

if ($_POST['asset_id']=="") {
    die('No Asset ID');
}
else {
    $insert = $insert . $_POST['asset_id'] . "', '";
}
if ($_POST['description']=="") {
    die('No Description');
}
else {
    $insert = $insert . $_POST['description'] . "', '";
}
if ($_POST['location']=="") {
    die('No Location');
}
else {
    $insert = $insert . $_POST['location'] . "', '";
}
if ($_POST['class']=="") {
    die('No Class');
}
else {
    $insert = $insert . $_POST['class'] . "', '";
}
$insert = $insert . "1";
// ADDED BY HERE

$insert = $insert . "'); ";

$conn = new mysqli($db_server, $db_user, $db_pass, $db_name);
$cmd = $insert;
$conn -> query($cmd);

echo "Success";